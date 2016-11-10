<?php
include "dboperation.php";
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
$searchTerm = $_GET['term'];
$query = $db->query("SELECT * FROM religion WHERE religion LIKE '%".$searchTerm."%' ORDER BY religion ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['religion'];
}
echo json_encode($data); 



?>