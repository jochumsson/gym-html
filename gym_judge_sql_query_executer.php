<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$conn = new mysqli("localhost", "judge", "password", "gym_db");
mysqli_set_charset($conn,"utf8");

if ($conn->connect_error) {
    echo json_encode("connection failed");
} 

$result = $conn->query($obj->sql_query);
$outp = array();
while($row = mysqli_fetch_assoc($result)) {
	 array_map("utf8_encode", $row);
    $outp[] = $row;
}
$result->close();
$conn->close();

echo json_encode($outp);
#var_dump("test: " . $outp);
?>

