<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Provides bike hire for a wide range of bicycles at a low cost" />
	<meta name="keywords" content="HTML5, CSS, Bike, Bicycle, Hire" />
	<meta name="author" content="Tabitha Leimonis" />
	<title>Receipt</title>
	<!-- References to external CSS files-->
		<link href= "styles/style.css" rel="stylesheet" />
</head>

<body>

<?php 
session_start();

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $email1 = $_SESSION['email1'];
    $street = $_SESSION['street'];
    $suburb = $_SESSION['suburb'];
    $state = $_SESSION['state'];
    $postcode = $_SESSION['postcode'];
    $contactdetails = $_SESSION['contactdetails'];
    $phone1 = $_SESSION['phone1'];
    $bike = $_SESSION['bike'];
    $quantity = $_SESSION['quantity'];
    $extras = $_SESSION['extras'];
    $helmet = $_SESSION['helmet'];
    $basket = $_SESSION['basket'];
    $lights = $_SESSION['lights'];
    $comment = $_SESSION['comment'];
    $cardname = $_SESSION['cardname'];
    $cardtype = $_SESSION['cardtype'];
    $cardnumber = $_SESSION['cardnumber'];
    $cardexpiry = $_SESSION['cardexpiry'];
	$cardcvv = $_SESSION['cardcvv'];
    $ordercost = $_SESSION['ordercost'];


include 'settings.php';
include 'header.inc';
include 'menu.inc';

    $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    );

    if (!$conn) {
        echo "<p>Database connection failure</p>";
    } else {
    // $sql_table="orders";

    // $query = "select order_number, order_date, order_cost, firstname, lastname, order_status FROM orders ORDER BY order_number";

    // $result = mysqli_query($conn, $query);

    // if(!$result) {
    //     echo echo "<p>Something is wrong with ", $query, "</p>";
    // }

    $cardname = str_repeat("*", strlen($cardname));
    $cardtype = str_repeat("*", strlen($cardtype));
    $cardcvv = str_repeat("*", strlen($cardcvv));
    $cardnumber = str_repeat("*", strlen($cardnumber));
    $cardexpiry = str_repeat("*", strlen($cardexpiry));


    echo  
    "<p>Name: $fname $lname <br/>
    Email: $email1 <br/>
    Address: $street $suburb $state $postcode <br/>
    Contact Details: $contactdetails <br/>
    Phone number: $phone1 <br/>
    Bike: $bike $extras <br/>
    Quantity: $quantity <br/>
    Comments: $comment <br/>
    Cost: $$ordercost <br/>
    Cardname: $cardname <br/>
    Cardtype: $cardtype <br/>
    CardCVV: $cardcvv <br/>
    Cardnumber: $cardnumber <br/>
    Cardexpiry: $cardexpiry </p>";
    }
?>

</body>
</html>