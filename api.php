<?php
$ret = [];
header('Content-Type: application/json; charset=utf-8');
if (isset($_REQUEST['action'])) {
    require_once "conn.php";
    if ($_REQUEST['action'] == "getStatus") {
        $sql = "SELECT id, updated, data1, data2, data3, data4 FROM device_status";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $ret["msg"] = "success";
            $ret["data"] = [];
            while ($row = $result->fetch_assoc()) {
                $ret["data"][] = $row;
            }
        }
    }
}
echo json_encode($ret);
