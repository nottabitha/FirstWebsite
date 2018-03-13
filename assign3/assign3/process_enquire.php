<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Processing Order" />
    <meta name="keywords" content="PHP, MySql" />
    <title>Processing Enquire</title>
    <link href= "styles/style.css" rel="stylesheet"/>
    <script src="scripts/part2.js"></script>
</head>
<body>


<?php


     include 'header.inc';
	 include 'menu.inc';
	 include 'settings.php';


//http://php.net/manual/en/function.session-destroy.php
//https://www.w3schools.com/php/php_sessions.asp

session_start();
session_destroy();

    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
session_start();

    // $fname = $_SESSION['fname'];
    // $lname = $_SESSION['lname'];
    // $email1 = $_SESSION['email1'];
    // $street = $_SESSION['street'];
    // $suburb = $_SESSION['suburb'];
    // $state = $_SESSION['state'];
    // $postcode = $_SESSION['postcode'];
    // $contactdetails = $_SESSION['contactdetails'];
    // $phone1 = $_SESSION['phone1'];
    // $bike = $_SESSION['bike'];
    // $quantity = $_SESSION['quantity'];
    // $helmet = $_SESSION['helmet'];
    // $basket = $_SESSION['basket'];
    // $lights = $_SESSION['lights'];
    // $comment = $_SESSION['comment'];

    $errMsg = false;
    //------first name------------

    if (isset ($_POST["fname"])) {
         $fname = sanitise_input($_POST["fname"]);
         $_SESSION['fname'] = $fname;
        }
        else{
            header("location: enquire.php");
        }
    if (!$fname) {
            $_SESSION['fname'] = "Please enter your first name";
            $errMsg = true;
        }
    if (strlen($fname) > 25) {
        $_SESSION['fname'] = "Your first name must not be over 25 characters";
        $errMsg = true;
    }
    
    if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
            $_SESSION['fname'] = "Only alpha characters are allowed";
            $errMsg = true;
        }
//----------last name--------------
    if (isset ($_POST["lname"])) {
            $lname = sanitise_input($_POST["lname"]);
            $_SESSION['lname'] = $lname;
            
        }
    if (!$lname) {
            $_SESSION['lname'] = "Please enter a last name";
            $errMsg = true;
        }
    if (strlen($lname) > 25) {
        $_SESSION['lname'] = "Your last name must not be over 25 characters";
        $errMsg = true;
    }
    if (!preg_match("/^[a-zA-Z-]*$/",$lname)) {
            $_SESSION['lname'] = "Only alpha letters and hyphens allowed in your last name";
            $errMsg = true;
        }
//-------------email--------------
// email validation https://www.w3schools.com/php/php_form_url_email.asp
    if (isset ($_POST["email"])) {
            $email1 = sanitise_input($_POST["email"]);
            $_SESSION['email1'] = $email1;
            
        }
    if (!$email1) {
            $_SESSION['email1'] = "Please enter an email";
            $errMsg = true;
        }
    if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email1'] = "Please enter a valid email address";
        $errMsg = true;
    }
//--------------street---------------
    if (isset ($_POST["street"])) {
            $street = sanitise_input($_POST["street"]);
           $_SESSION['street'] = $street;
           
        }
    if (!(strlen($street) <= 40)) {
            $_SESSION['street'] = "Must be less than or equal to 40 characters";
            $errMsg = true;
        }
    if (!$street) {
            $_SESSION['street'] = "You must enter a street";
            $errMsg = true;
    }
//-----------suburb----------
    if (isset ($_POST["suburb"])) {
            $suburb = sanitise_input($_POST["suburb"]);
            $_SESSION['suburb'] = $suburb;
            
        }
    if (!(strlen($suburb) <= 20)) {
            $_SESSION['suburb'] = "Must be less than or equal to 20 characters";
            $errMsg = true;
    }
    if (!$suburb) {
            $_SESSION['suburb'] = "Please enter a suburb";
            $errMsg = true;
    }
//------------state----------
    if (isset ($_POST["state"])) {
            $state = ($_POST["state"]);
            $_SESSION['state'] = $state;
            
        }
    if (!$state) {
            $_SESSION['state'] = "You must enter a state";
            $errMsg = true;
    }
//------------postcode-----------
    if (isset ($_POST["postcode"])) {
            $postcode = sanitise_input($_POST["postcode"]);
            $_SESSION['postcode'] = $postcode;
        }

    $postcodestart = substr($postcode, 0, 1);
    if ($postcodestart == 3 || $postcodestart == 8) {
        if ($state != "VIC"){
            $_SESSION['postcode'] = "Must select VIC";
            $errMsg = true;
        }
    }
    if ($postcodestart == 1 || $postcodestart == 2) {
        if ($state != "NSW"){
            $_SESSION['postcode'] = "Must select NSW";
            $errMsg = true;
        }
    }
    if ($postcodestart == 4 || $postcodestart == 9) {
        if ($state != "QLD"){
            $_SESSION['postcode'] = "Must select QLD";
            $errMsg = true;
        }
    }
    if ($postcodestart == 0) {
        if ($state != "NT") {
            $_SESSION['postcode'] = "Must select NT";
            $errMsg = true;
        }
    }
    if ($postcodestart == 6) {
        if ($state != "WA") {
            $_SESSION['postcode'] = "Must select WA";
            $errMsg = true;
        }
    }
    if ($postcodestart == 5) {
        if ($state != "SA") {
            $_SESSION['postcode'] = "Must select SA";
            $errMsg = true;
        }
    }
    if ($postcodestart == 7) {
        if ($state != "TAS") {
            $_SESSION['postcode'] = "Must select TAS";
            $errMsg = true;
        }
    }
    if ($postcodestart == 0) {
        if ($state != "ACT") {
            $_SESSION['postcode'] = "Must select ACT";
            $errMsg = true;
        }
    }
    if (!$postcode) {
            $_SESSION['postcode'] = "You must enter a postcode";
            $errMsg = true;
    }
    if (!(is_numeric($postcode))) {
            $_SESSION['postcode'] = "Postcode must be a number";
            $errMsg = true;
    }
    if (!(strlen($postcode) == 4)) {
            $_SESSION['postcode'] = "Postcode must be 4 characters long";
            $errMsg = true;
    }
//---------------contactdetails----------
    if (isset ($_POST["contact"])) {
            $contactdetails = ($_POST["contact"]);
            $_SESSION['contactdetails'] = $contactdetails;
        }else{
             $_SESSION['contactdetails'] = "";
        }
//--------------phone-------------------
    if (isset ($_POST["phone"])) {
            $phone1 = sanitise_input($_POST["phone"]);
            $_SESSION['phone1'] = $phone1;
        }
            
    if (!$phone1) {
            $_SESSION['phone1'] = "Please enter a phone number";
            $errMsg = true;
    }
    elseif (!is_numeric($phone1)) {
            $_SESSION['phone1'] = "Phone number must be numbers only";
            $errMsg = true;
    }
   elseif (!(strlen($phone1) == 10)) {
            $_SESSION['phone1'] = "Phone number must be 10 characters long";
            $errMsg = true;
    }
//--------------bike------------------
    if (isset ($_POST["bike"])) {
            $bike = ($_POST["bike"]);
            $_SESSION['bike'] = $bike;
        }
    if (!$bike) {
            $_SESSION['bike'] = "Please select a bike";
            $errMsg = true;
    }
//--------------quantity-------------
    if (isset ($_POST["quantity"])) {
            $quantity = sanitise_input($_POST["quantity"]);
            $_SESSION['quantity'] = $quantity;
        }
    if ($quantity < 1) {
            $errMsg = true;
    }
    if (!$quantity) {
            $errMsg = true;
    }
    if (!(is_numeric($quantity))) {
            $errMsg = true;
    }
// --------------comments-----------
    if(isset($_POST["comment"])) {
            $comment = sanitise_input($_POST["comment"]);
            $_SESSION['comment'] = $comment;
    }
//--------sanitise_input--------

    // $fname = sanitise_input($_POST['fname']);
    // $lname = sanitise_input($_POST['lname']);
    // $email1 = sanitise_input($_POST['email1']);
    // $street = sanitise_input($_POST['street']);
    // $suburb = sanitise_input($_POST['suburb']);
    // $state = sanitise_input($_POST['state']);
    // $postcode = sanitise_input($_POST['postcode']);
    // $contactdetails = sanitise_input($_POST['contactdetails']);
    // $phone1 = sanitise_input($_POST['phone1']);
    // $bike = sanitise_input($_POST['bike']);
    // $quantity = sanitise_input($_POST['quantity']);
    // $comment = sanitise_input($_POST['comment']);

//------------------- cost-------------
    $extras = "";
    $cost = 0;
    //helmet
    $_SESSION['helmet'] = "";
    if (isset ($_POST["helmet"])) 
    if ($_POST['helmet'] == 'helmet') {
        $extras = $extras. "Helmet";
        $_SESSION['helmet'] = "checked";
        $cost += 20;
    }
    //basket
    $_SESSION['basket'] = "";
    if (isset ($_POST["basket"])) 
    if ($_POST['basket'] == 'basket') {
        $extras = $extras. "basket";
        $_SESSION['basket'] = "checked";
        $cost += 20;
    }
    //lights
    $_SESSION['lights'] = "";
    if (isset ($_POST["lights"])) 
    if ($_POST['lights'] == 'lights') {
        $extras = $extras. "lights";
        $_SESSION['lights'] = "checked";
        $cost += 20;
    }

    if ($extras) {
        $_SESSION['extras'] = $extras;
     } else {
             $_SESSION['extras'] = "";
        }

    //bikes 

    if ($_POST['bike'] == 'Strattos') {
        $cost += 80;
    }
    if ($_POST['bike'] == 'Fixie') {
        $cost += 30;
    }
    if ($_POST['bike'] == 'Surge') {
        $cost += 45;
    }
    if ($_POST['bike'] == 'Totem') {
        $cost += 55;
    }
    if ($_POST['bike'] == 'Sierra') {
        $cost += 55;
    }
    if ($_POST['bike'] == 'Path1') {
        $cost += 70;
    }
    if ($_POST['bike'] == 'Heist') {
        $cost += 80;
    }
    if ($_POST['bike'] == 'Rove') {
        $cost += 85;
    }
    if ($_POST['bike'] == 'Apollo') {
        $cost += 90;
    }
    if ($_POST['bike'] == 'Merida') {
        $cost += 40;
    }
    if ($_POST['bike'] == 'Avalance') {
        $cost += 30;
    }
    if ($_POST['bike'] == 'Jet') {
        $cost += 45;
    }

    $ordercost = ($cost * $quantity);
    if ($ordercost) {
        $_SESSION['ordercost'] = $ordercost;
    }

    if ($errMsg){
        header('location:fix_enquire.php'); 
    }
    else {
        header('location: payment.php');
    }
?>
</body>
</html>