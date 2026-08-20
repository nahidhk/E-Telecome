<?php
function ndsql_info($nd_info_id){
    global $conn; // PDO connection

    $sql = "SELECT * FROM ndsql_info WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nd_info_id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function ndsql_upload($fieldName) {
    global $conn;

    if (!isset($_FILES[$fieldName]) || $_FILES[$fieldName]['error'] !== 0) {
        return false;
    }

    $file      = $_FILES[$fieldName];
    $fileName  = "ndsql_image_" . time() . ".png";
    $uploadDir = 'uploads/';
    $filePath  =$uploadDir . $fileName;

    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        $stmt = $conn->prepare("INSERT INTO images (file_path) VALUES (?)");
        $stmt->execute([$fileName]); 
        return true;
    }

    return false;
}
function ndsql_get_images() {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM images ORDER BY id DESC");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function change_ndsql_info($data){

    global $conn; // PDO connection

    foreach($data as $keyword => $value){

        if(is_array($value)){
            $value = json_encode(
                array_values($value),
                JSON_UNESCAPED_UNICODE
            );
        }

        $sql = "
            UPDATE ndsql_info
            SET value = ?
            WHERE keyword = ?
        ";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            $value,
            $keyword
        ]);
    }

    return true;
}


function ndsql_get_developer($id = null) {
    global $conn; // PDO connection

    try {
        if ($id) {
            // নির্দিষ্ট একজন ডেভেলপার আনো
            $sql = "SELECT * FROM developers WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                $data['skills']  = json_decode($data['skills'], true);
                $data['socials'] = json_decode($data['socials'], true);
            }

            return $data;
        } else {
            // সব ডেভেলপার আনো
            $sql = "SELECT * FROM developers";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as &$row) {
                $row['skills']  = json_decode($row['skills'], true);
                $row['socials'] = json_decode($row['socials'], true);
            }

            return $rows;
        }
    } catch (PDOException $e) {
        error_log("ndsql_get_developer error: " . $e->getMessage());
        return false;
    }
}


function ndsql_insert_developer($data){
    global $conn;

    try{

        foreach($data as $key => $value){
            if(is_array($value)){
                $data[$key] = json_encode($value, JSON_UNESCAPED_UNICODE);
            }
        }

        $columns = array_keys($data);
        $placeholders = array_fill(0, count($columns), '?');

        $sql = "INSERT INTO developers (".implode(",", $columns).")
                VALUES (".implode(",", $placeholders).")";

        $stmt = $conn->prepare($sql);
        $stmt->execute(array_values($data));

        return $conn->lastInsertId();
    }catch(PDOException $e){
        die($e->getMessage());
    }
}



function ndsql_update_developer($id, $data)
{
    global $conn;

   
    if (empty($data['socials'])) {
        $data['socials'] = '{}';
    }

    if (empty($data['skills'])) {
        $data['skills'] = '[]';
    }

    $set = [];

    foreach ($data as $key => $value) {
        $set[] = "$key = :$key";
    }

    $sql = "UPDATE developers
            SET " . implode(', ', $set) . "
            WHERE id = :id";

    $stmt = $conn->prepare($sql);

    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
}

function ndsql_delete_developer($id)
{
    global $conn;

    $stmt = $conn->prepare("DELETE FROM developers WHERE id = ?");
    return $stmt->execute([$id]);
}

function page_title($title = null)
{
    global $page_title;

    if ($title !== null) {
        $page_title = $title;
    }

    return $page_title;
}

function ndsql_get_pages($data = null) {
    global $conn; // PDO connection

    try {
        if ($data) {
            
            $sql = "SELECT * FROM pages WHERE link_address = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$data]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                $data['skills']  = json_decode($data['skills'], true);
                $data['socials'] = json_decode($data['socials'], true);
            }

            return $data;
        } else {
            $sql = "SELECT * FROM pages";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rows;
        }
    } catch (PDOException $e) {
        error_log("ndsql_get_developer error: " . $e->getMessage());
        return false;
    }
}


function ndsql_page_views_count($keyword, $value){
    global $conn; // PDO connection
        if(is_array($value)){
            $value = json_encode(
                array_values($value),
                JSON_UNESCAPED_UNICODE
            );
        }
        $sql = "
            UPDATE pages
            SET views = ?
            WHERE link_address = ?
        ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $value,
            $keyword
        ]);
    return true;
}

function ndsql_insert_page($data){
    global $conn;

    try{

        foreach($data as $key => $value){
            if(is_array($value)){
                $data[$key] = json_encode($value, JSON_UNESCAPED_UNICODE);
            }
        }

        $columns = array_keys($data);
        $placeholders = array_fill(0, count($columns), '?');

        $sql = "INSERT INTO pages (".implode(",", $columns).")
                VALUES (".implode(",", $placeholders).")";

        $stmt = $conn->prepare($sql);
        $stmt->execute(array_values($data));

        return $conn->lastInsertId();
    }catch(PDOException $e){
        die($e->getMessage());
    }
}


function ndsql_update_page($data , $linkAddress){
      global $conn;

   

    $set = [];

    foreach ($data as $key => $value) {
        $set[] = "$key = :$key";
    }

    $sql = "UPDATE pages
            SET " . implode(', ', $set) . "
            WHERE link_address = :linkAddress";

    $stmt = $conn->prepare($sql);

    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }

    $stmt->bindValue(':linkAddress', $linkAddress, PDO::PARAM_INT);

    return $stmt->execute();
}

function ndsql_usersio_add($data){
    global $conn;
    try{
        foreach($data as $key => $value){
            if(is_array($value)){
                $data[$key] = json_encode($value, JSON_UNESCAPED_UNICODE);
            }
        }
        $columns = array_keys($data);
        $placeholders = array_fill(0, count($columns), '?');

        $sql = "INSERT INTO ndsql_subscribers (".implode(",", $columns).")
                VALUES (".implode(",", $placeholders).")";

        $stmt = $conn->prepare($sql);
        $stmt->execute(array_values($data));
        return true;
    }catch(PDOException $e){
        die($e->getMessage());
    }
}
