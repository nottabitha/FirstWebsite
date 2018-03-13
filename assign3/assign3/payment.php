<?php
/**
* Author: Tabitha Leimonis
* Target: register.html
* Purpose: 
* Created: 15 April 2017
* Last updated: 26 April 2017
* Credits: 
*/
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
    $helmet = $_SESSION['helmet'];
    $basket = $_SESSION['basket'];
    $lights = $_SESSION['lights'];
	$extras = $_SESSION['extras'];
    $comment = $_SESSION['comment'];
	$ordercost = $_SESSION['ordercost'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Provides bike hire for a wide range of bicycles at a low cost" />
	<meta name="keywords" content="HTML5, CSS, Bike, Bicycle, Hire" />
	<meta name="author" content="Tabitha Leimonis" />
	<title>Payment</title>
	<script src="scripts/part2.js"></script>
	<link href= "styles/style.css" rel="stylesheet"/>
	<!--<script src="scripts/enhancements.js"></script>-->
	<!-- References to external CSS files-->
</head>
<body>

	<?php include 'header.inc';?>
	<?php include 'menu.inc';?>

<form id="paymentform" method="post" action="process_order.php" novalidate="novalidate">
	<fieldset>
		<legend><h3>Your Payment</h3></legend>
		<p>Your Name: <?php echo $fname?> <?php echo $lname?></p>
		<p>Email: <?php echo $email1?></p>
		<p>Address: <?php echo $street?> <?php echo $suburb?> <?php echo $state?> <?php echo $postcode?> </p>
		<p>Contact Details: <?php if($_SESSION['contactdetails'] == 'email'){echo 'email';} if($_SESSION['contactdetails'] == 'post'){echo 'post';} if($_SESSION['contactdetails'] == 'phone'){echo 'phone';}?></p>
		<p>Phone: <?php echo $phone1?></p>
		<p>Order: <?php echo $bike ?> <?php echo $extras ?> </p>
		<p>Quantity: <?php echo $quantity?></span></p>
		<p>Comments:<?php echo $comment?></p>
		<p>Total Cost: $<?php echo $ordercost?></p>
		<input type="hidden" name="fname" id="fname" />
		<input type="hidden" name="lname" id="lname" />
		<input type="hidden" name="email1" id="email1" />
		<input type="hidden" name="street" id="street" />
		<input type="hidden" name="suburb" id="suburb" />
		<input type="hidden" name="state" id="state" />
		<input type="hidden" name="postcode" id="postcode" />
		<input type="hidden" name="contactdetails" id="contactdetails" />
		<input type="hidden" name="phone1" id="phone1" />
		<input type="hidden" name="bike" id="bike" />
		<input type="hidden" name="quantity" id="quantity" />
		<input type="hidden" name="extras" id="extras" />
		<input type="hidden" name="comment" id="comment" />

		<input type="hidden" name="cost" id="cost" />

			<!-- Credit card inspiration from https://designmodo.com/create-credit-card-ui/ -->
			<h3>Credit Card Details</h3>

			<p>
			<select name="cardtype" id="cardtype">
				<option value="none">Please Select</option>
				<option value="visa">Visa</option>
				<option value="mastercard">Mastercard</option>
				<option value="americanexpress">American Express</option>
			</select>
			</p>
			<p><input type="text" name="cardname" placeholder="Name on card" id="cardname"/></p>
			<p><input type="text" name="cardnumber" placeholder="Card Number" id="cardnumber"/></p>
			<p>
			<input type="text" placeholder="mm-yy" name="cardexpiry"  id="cardexpiry" maxlength="5" size="5"/>
			<input type="text" placeholder="CVV" name="cardcvv" id="cardcvv" maxlength="4" size="3"/>
			</p>

		<input type="submit" value="Check Out" />
		<button type="button" id="cancelButton">Cancel Order</button>
		<!--<button type="button" id="backButton">Back</button>-->
    </fieldset>
</form>
	<?php include 'footer.inc';?>
</body>

</html>