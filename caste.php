<?php
include "dboperation.php";
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
$searchTerm = $_GET['term'];
$query = $db->query("SELECT * FROM caste WHERE caste LIKE '%".$searchTerm."%' ORDER BY caste ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['caste'];
}
echo json_encode($data); 
?>