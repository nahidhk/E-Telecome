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