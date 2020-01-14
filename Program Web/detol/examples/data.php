<?php
include 'koneksi.php';
$query = sprintf("SELECT playerid, score FROM score ORDER BY playerid");

//execute query
$result = $conn->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$conn->close();

//now print the data
print json_encode($data);
?>