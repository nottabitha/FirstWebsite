<?php
/**
* Author: Tabitha Leimonis
* Target: fix_enquire.php
* Purpose: 
* Created: 15 May 2017
* Last updated: 26 May 2017
* Credits: 
*/
//undefined variable fix
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
    $comment = $_SESSION['comment'];
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
	<?php include 'settings.php';?>

<form id="fixorderform" method="post" action="process_enquire.php"  novalidate="novalidate">
<section>
	<fieldset>
		<legend><h3>Basic Details</h3></legend>
			<p><label for="fname">First Name:</label>
				<input type="text" value="<?php echo $fname?>" name="fname" id="fname" maxlength="25" size="25" pattern="[A-Za-z- ]*" required="required" />
			</p>
			<p><label for="lname">Last Name:</label>
				<input type="text" value="<?php echo $lname?>" name="lname" id="lname" maxlength="25" size="25" pattern="[A-Za-z- ]*" required="required" />
			</p>
			<p><label for="email1">Email:</label>
				<input type="email" value="<?php echo $email1?>" name="email" id="email1" size="30" required="required" />
			</p>
	</fieldset>
	<fieldset>
		<legend><h3>Address</h3></legend>
			<p><label for="street">Street Address:</label>
				<input type="text" value="<?php echo $street?>" name="street" id="street" maxlength="40" size="40" required="required" />
			</p>
			<p><label for="suburb">Suburb/Town:</label>
				<input type="text" value="<?php echo $suburb?>" name="suburb" id="suburb" maxlength="20" size="25" required="required" />
			</p>
			<p><label for="state">State:</label>
				<select name="state" id="state">
					<option value="<?php echo $state?>"><?php echo $state?></option>
					<option value="VIC">VIC</option>
					<option value="NSW">NSW</option>
					<option value="QLD">QLD</option>
					<option value="TAS">TAS</option>
					<option value="SA">SA</option>
					<option value="NT">NT</option>
					<option value="WA">WA</option>
					<option value="ACT">ACT</option>
				</select>
			</p>
			<p><label for="postcode">Postcode:</label>
				<input type="text" name="postcode" value="<?php echo $postcode?>" id="postcode" maxlength="4" size="15" pattern="[0-9]{4}" required="required" />
			</p>
	</fieldset>
	<fieldset>
		<legend><h3>Contact Details</h3></legend>
		<section id="contactdetails">
			<p>
				<label>Preferred Contact Method:</label>
				<label for="email">Email</label>
				<input type="radio" name="contact" id="email" value="email" <?php if($_SESSION['contactdetails'] == 'email'){echo 'checked="checked"';}?> />
				<label for="post">Post</label>
				<input type="radio" name="contact" id="post" value="post" <?php if($_SESSION['contactdetails'] == 'post'){echo 'checked="checked"';}?> />
				<label for="phone">Phone</label>
				<input type="radio" name="contact" id="phone" value="contact" <?php if($_SESSION['contactdetails'] == 'phone'){echo 'checked="checked"';}?>/>
			</p>
		</section>
			<p><label for="phone1">Phone Number:</label>
				<input type="text" name="phone" value="<?php echo $phone1?>" id="phone1" maxlength="10" size="25" pattern="[0-9]{10}" placeholder="04********" required="required" />
			</p>
	</fieldset>
	<fieldset>
		<legend><h3>Bike&apos;s for hire</h3></legend>
			<h4>Please select the product you wish to hire and refer to our Bike&apos; page for more information</h4>
			
			<section id="bikes">
			<p> <label for="bike">Bike:</label>
				<select name="bike" id="bike">
					<option value="<?php echo $bike?>"><?php echo $bike?></option>
					<option value="Strattos">Polygon Strattos S2 - $80</option>
					<option value="Fixie">Fixie Orange - $30</option>
					<option value="Surge">Surge Hi Vis Green - $45</option>
					<option value="Totem">Totem Spark 27.5 - $55</option>
					<option value="Sierra">Polygon Sierra AX 24 - $55</option>
					<option value="Path1">2017 Polygon Path 1 29er City Bike - $70</option>
					<option value="Heist">Polygon Heist 2.0 29er Hybrid Commuter Bike - $80</option>
					<option value="Rove">Giant Liv Rove 3 2017 - $85</option>
					<option value="Apollo">Apollo Nouveau 7 - $90</option>
					<option value="Merida">Merida City 3.0 - $40</option>
					<option value="Avalanche">Avalanche DV8 Freestyle BMX - $30</option>
					<option value="Jet">Jet BMX Jet Generate BMX 2017 - $45</option>
				</select>
			</p>
			</section>

			<p>
				<label>Quantity:</label>
					<input type="number" name="quantity" value="<?php echo $quantity?>" id="quantity" min="1" required="required"/> 
			</p>
			<section id="extras">
			<p> <label>Extras ($20 each):</label>
					<label for="helmet">Helmet</label>
						<input type="checkbox" id="helmet" value="helmet" name="helmet" <?php echo $helmet?>  />
					<label for="basket">Basket</label>
						<input type="checkbox" id="basket" value="basket" name="basket" <?php echo $basket?> />
					<label for="lights">Lights</label>
						<input type="checkbox" id="lights" value="lights" name="lights" <?php echo $lights?> />
			</p>
			</section>
			<p><label>Comments:</label>
				<textarea id="comment" name="comment" rows="5" cols="50" placeholder="Please type here..."><?php echo $comment?></textarea>
			</p>
</fieldset>
</section>	
		<input type="submit" value="Pay Now"/>
		<input type="reset" value="Reset Form"/>
</form>
</body>
</html>