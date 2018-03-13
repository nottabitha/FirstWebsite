<?php

include 'settings.php';
//https://stackoverflow.com/questions/26107666/delete-a-specific-row-of-a-table-using-php

$conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    );
// Check connection
if (!$conn) {
    echo "Failed to connect to database";
}

$order_id = $_POST['order_id'];


$query = "DELETE FROM orders WHERE order_id='$order_id'";


$result = mysqli_query($conn, $query);

mysqli_close($conn);

header("Location: manager.php");

?> 