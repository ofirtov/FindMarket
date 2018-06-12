<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "markets");
if (isset($_POST)) {
    $data = [];
    $result = mysqli_query($db, "SELECT * FROM market_location");
    while ($record = mysqli_fetch_array($result)) {
        $data[] = $record;
    }
    echo json_encode($data);
}
?>