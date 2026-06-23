<?php

function ndsql_info($nd_info_id){
    global $conn; // PDO connection

    $sql = "SELECT * FROM ndsql_info WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nd_info_id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

