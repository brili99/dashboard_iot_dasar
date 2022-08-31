<?php
if (
    isset($_GET['id']) &&
    isset($_GET['data1']) ||
    isset($_GET['data2']) ||
    isset($_GET['data3']) ||
    isset($_GET['data4'])
) {
    require_once "conn.php";
    $id = $conn->real_escape_string($_GET['id']);
    $data1 = isset($_GET['data1']) ? $conn->real_escape_string($_GET['data1']) : "";
    $data2 = isset($_GET['data2']) ? $conn->real_escape_string($_GET['data2']) : "";
    $data3 = isset($_GET['data3']) ? $conn->real_escape_string($_GET['data3']) : "";
    $data4 = isset($_GET['data4']) ? $conn->real_escape_string($_GET['data4']) : "";

    $sql = "UPDATE device_status SET data1 = '$data1', data2 = '$data2', data3 = '$data3', data4 = '$data4' WHERE id = '$id'; ";
    $sql .= "INSERT INTO device_log (id, data1, data2, data3, data4) VALUES ('$id', '$data1', '$data2', '$data3', '$data4')";
    if ($conn->multi_query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error";
    }
    $conn->close();
}
