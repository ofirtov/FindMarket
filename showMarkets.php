<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "markets");
$output = '';

$output .= '<label class="text-success">' . '</label>';
$select_query = "SELECT * FROM market_location ORDER BY id ASC";
$result = mysqli_query($db, $select_query);
$output .= '
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>street Number</th>
        <th>City</th>
        <th>Zip</th>
        <th>Country</th>
    </tr>
    ';
while ($row = mysqli_fetch_array($result)) {
    $output .= '
    <tr>
        <td>' . $row["name"] . '</td> . <td>' . $row["address"] . '</td> . <td>' . $row["street_number"] . '</td> . <td>' . $row["city"] . '</td>
        . <td>' . $row["zipcode"] . '</td> . <td>' . $row["country"] . '</td>
        <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>
    </tr>
    ';
}
$output .= '</table>';

echo $output;
?>