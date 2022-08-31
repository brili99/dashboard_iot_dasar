<?php

require_once("conn.php");

$params = $columns = $totalRecords = $data = array();

$params = $_REQUEST;

$columns = array(
    0 => 'created',
    1 => 'id',
    2 => 'data1',
    3 => 'data2',
    4 => 'data3',
    5 => 'data4'
);

$where_condition = $sqlTot = $sqlRec = "";

if (!empty($params['search']['value'])) {
    // $where_condition .= " WHERE id > 1100 AND ";
    $where_condition .= " AND ( id LIKE '%" . $params['search']['value'] . "%' ";
    $where_condition .= " OR created LIKE '%" . $params['search']['value'] . "%' )";
}

// $sql_query = " SELECT * FROM status WHERE id > 1100 AND ";
$sql_query = " SELECT * FROM device_log WHERE 1 ";

$sqlTot .= $sql_query;
$sqlRec .= $sql_query;

if (isset($where_condition) && $where_condition != '') {

    $sqlTot .= $where_condition;
    $sqlRec .= $where_condition;
}

if ($params['length'] == -1) {
    $sqlRec .=  " ORDER BY " . $columns[$params['order'][0]['column']] . "   " . $params['order'][0]['dir'] . " ";
} else {
    $sqlRec .=  " ORDER BY " . $columns[$params['order'][0]['column']] . "   " . $params['order'][0]['dir'] . "  LIMIT " . $params['start'] . " ," . $params['length'] . " ";
}


$queryTot = mysqli_query($conn, $sqlTot) or die("Database Error:" . mysqli_error($conn));

$totalRecords = mysqli_num_rows($queryTot);

$queryRecords = mysqli_query($conn, $sqlRec) or die("Error to Get the Post details.");
while ($row = mysqli_fetch_row($queryRecords)) {
    $data[] = $row;
}

$json_data = array(
    "draw"            => intval($params['draw']),
    "recordsTotal"    => intval($totalRecords),
    "recordsFiltered" => intval($totalRecords),
    "data"            => $data
);

echo json_encode($json_data);
