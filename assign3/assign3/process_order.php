<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Processing Order" />
    <meta name="keywords" content="PHP, MySql" />
    <title>Processing Order</title>
    <link href= "styles/style.css" rel="stylesheet"/>
    <script src="scripts/part2.js"></script>
</head>
<body>
<?php
    include 'header.inc';
    include 'menu.inc';
    include 'settings.php';

    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

//https://www.w3schools.com/php/php_sessions.asp
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
    $cardname = $_SESSION['cardname'];
    $cardtype = $_SESSION['cardtype'];
    $cardnumber = $_SESSION['cardnumber'];
    $cardexpiry = $_SESSION['cardexpiry'];
    $cardcvv = $_SESSION['cardcvv'];
    $ordercost = $_SESSION['ordercost'];    
    //checks if went straight to page
    //enquire

    $errMsg = false;
    //credit card validation

//---------cardcvv---------
    if (isset ($_POST["cardcvv"])) {
            $cardcvv = sanitise_input($_POST["cardcvv"]);
            $_SESSION['cardcvv'] = $cardcvv;
        } else {
            header("location: enquire.php");
        }
    if (!$cardcvv){
            $_SESSION['cardcvv'] = "Please enter a CVV";
            $errMsg = true;
        }
//---------cardname------------
//do post thing
    if (isset ($_POST["cardname"])) {
            $cardname = sanitise_input($_POST["cardname"]);
            $_SESSION['cardname'] = $cardname;
        }
    if (!$cardname) {
             $_SESSION['cardname'] = "Please enter the name on the card";
             $errMsg = true;
        }
    if (strlen($cardname > 40 || $cardname) < 1) {
             $_SESSION['cardname'] = "Card name must be 40 characters or less";
            $errMsg = true;
        }
    if (!preg_match("/[A-Za-z ]/", $cardname)) {
             $_SESSION['cardname'] = "Must be alphabetical characters only";
            $errMsg = true;
     }
 //---------cardnumber----------
    if (isset ($_POST["cardnumber"])) {
            $cardnumber = sanitise_input($_POST["cardnumber"]);
            $_SESSION['cardnumber'] = $cardnumber;
        }
    if (!$cardnumber) {
             $_SESSION['cardnumber'] = "Please enter the number on the card";
             $errMsg = true;
        }
    //MASTERCARD
    $cardstart = substr($cardnumber, 0, 2);
    if ($cardtype == "mastercard") {
        if ($cardstart < 51 || $cardstart > 55) {
            $_SESSION['cardnumber'] = "These numbers do not match Mastercard";
            $errMsg = true;
        }
    }

    if ($cardtype == "mastercard") {
        if (strlen($cardnumber) != 16 ) {
            $_SESSION['cardnumber'] = "Card number must be 16 digits";
            $errMsg = true;
        }
    }
    if ($cardtype == "mastercard") {
        if (strlen($cardcvv) != 3) {
            $_SESSION['cardnumber'] = "CVV must be 3 digits";
            $errMsg = true;
        }
    }

    //VISA
    $cardstartvisa = substr($cardnumber, 0, 1);
    if ($cardtype == "visa") {
        if ($cardstartvisa != 4) {
            $_SESSION['cardnumber'] = "These numbers do not match Visa";
            $errMsg = true;
        }
    }

    if ($cardtype == "visa") {
        if (strlen($cardnumber) != 16 ) {
            $_SESSION['cardnumber'] = "Card number must be 16 digits";
            $errMsg = true;
        }
    }
    if ($cardtype == "visa") {
        if (strlen($cardcvv) != 3) {
            $_SESSION['cardcvv'] = "CVV must be 3 digits";
            $errMsg = true;
        }
    }

    //AMERICAN EXPRESS
    if ($cardtype == "americanexpress") {
        if ($cardstart != 37 || $cardstart != 34) {
            $_SESSION['cardnumber'] = "These numbers do not match AmericanExpress";
            $errMsg = true;
        }
    }

    if ($cardtype == "americanexpress") {
        if (strlen($cardnumber) != 15 ) {
            $_SESSION['cardnumber'] = "Card number must be 15 digits";
            $errMsg = true;
        }
    }
    if ($cardtype == "americanexpress") {
        if (strlen($cardcvv) != 4) {
            $_SESSION['cardnumber'] = "CVV must be 4 digits";
            $errMsg = true;
        }
    }
    
//----------cardtype--------
    if (isset ($_POST["cardtype"])) {
            $cardtype = sanitise_input($_POST["cardtype"]);
            $_SESSION['cardtype'] = $cardtype;
        } 
    if (!$cardtype) {
            $_SESSION['cardtype'] = "Please enter the card type";
            $errMsg = true;
        }
//---------cardexpire------------
    if (isset ($_POST["cardexpiry"])) {
            $cardexpiry = sanitise_input($_POST["cardexpiry"]);
            $_SESSION['cardexpiry'] = $cardexpiry;
        }
    if (!$cardexpiry) {
            $_SESSION['cardexpiry'] = "Please enter the expiry date on the card";
            $errMsg = true;
        }
    if (!preg_match("/((0[1-9])|1[0-2])[-][0-9]{2}/",$cardexpiry)) {
            $_SESSION['cardexpiry'] = "The expiry date format is not correct";
            $errMsg = true;
        }
        $curdate = getdate();
        $curyear = substr($curdate.year,2,2);
        $expmonth = substr($cardexpiry,0,2);
        $expyear = substr($cardexpiry,3,2);
     if ($expyear < $curyear || ($expyear == $curyear && $expmonth < $curdate.mon)) {
            $_SESSION['cardexpire'] = "The expiry date has passed";
            $errMsg = true;
    }

//resetting CC session variables and errMsg in order to move on


    $errMsg = false;

    $cardname = $_SESSION['cardname'];
    $cardtype = $_SESSION['cardtype'];
    $cardnumber = $_SESSION['cardnumber'];
    $cardexpiry = $_SESSION['cardexpiry'];
    $cardcvv = $_SESSION['cardcvv'];



// //------first name------------

//     if (isset ($_POST["fname"])) {
//             $_SESSION['fname'] = $fname;
            
//         }
//     if (!$fname) {
//             $_SESSION['fname'] = "Please enter your first name";
//             $errMsg = true;
//         }
//     if (strlen($fname) > 25) {
//         $_SESSION['fname'] = "Your first name must not be over 25 characters";
//         $errMsg = true;
//     }
    
//     if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
//             $_SESSION['fname'] = "Only alpha characters are allowed";
//             $errMsg = true;
//         }
// //----------last name--------------
//     if (isset ($_POST["lname"])) {
//             $_SESSION['lname'] = $lname;
            
//         }
//     if (!$lname) {
//             $_SESSION['lname'] = "Please enter a last name";
//             $errMsg = true;
//         }
//     if (strlen($lname) > 25) {
//         $_SESSION['fname'] = "Your last name must not be over 25 characters";
//         $errMsg = true;
//     }
//     if (!preg_match("/^[a-zA-Z-]*$/",$lname)) {
//             $_SESSION['lname'] = "Only alpha letters and hyphens allowed in your last name";
//             $errMsg = true;
//         }
// //-------------email--------------
// // email validation https://www.w3schools.com/php/php_form_url_email.asp
//     if (isset ($_POST["email1"])) {
//             $_SESSION['email1'] = $email1;
            
//         }
//     if (!$email1) {
//             $_SESSION['email1'] = "Please enter an email";
//             $errMsg = true;
//         }
//     if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
//         $_SESSION['email1'] = "Please enter a valid email address";
//         $errMsg = true;
//     }
// //--------------street---------------
//     if (isset ($_POST["street"])) {
//            $_SESSION['street'] = $street;
           
//         }
//     if (!strlen($street) <= 40) {
//             $_SESSION['street'] = "Must be less than or equal to 40 characters";
//             $errMsg = true;
//         }
//     if (!$street) {
//             $_SESSION['street'] = "You must enter a street";
//             $errMsg = true;
//     }
// //-----------suburb----------
//     if (isset ($_POST["suburb"])) {
//             $_SESSION['suburb'] = $suburb;
            
//         }
//     if (!strlen($suburb) <= 20) {
//             $_SESSION['suburb'] = "Must be less than or equal to 20 characters";
//             $errMsg = true;
//     }
//     if (!$suburb) {
//             $_SESSION['suburb'] = "Please enter a suburb";
//             $errMsg = true;
//     }
// //------------state----------
//     if (isset ($_POST["state"])) {
//             $_SESSION['state'] = $state;
            
//         }
//     if (!$state) {
//             $_SESSION['state'] = "You must enter a state";
//             $errMsg = true;
//     }
// //------------postcode-----------
//     if (isset ($_POST["postcode"])) {
//             $_SESSION['postcode'] = $postcode;
//             $errMsg = true;
//         }

//     $postcodestart = substr($postcode, 0, 1);
//     if ($postcodestart == 3 || $postcodestart == 8) {
//         if ($state != "VIC"){
//             $_SESSION['postcode'] = "This does not match VIC";
//             $errMsg = true;
//         }
//     }
//     if ($postcodestart == 1 || $postcodestart == 2) {
//         if ($state != "NSW"){
//             $_SESSION['postcode'] = "This does not match NSW";
//             $errMsg = true;
//         }
//     }
//     if ($postcodestart == 4 || $postcodestart == 9) {
//         if ($state != "QLD"){
//             $_SESSION['postcode'] = "This does not match QLD";
//             $errMsg = true;
//         }
//     }
//     if ($postcodestart == 0) {
//         if ($state != "NT") {
//             $_SESSION['postcode'] = "This does not match NT";
//             $errMsg = true;
//         }
//     }
//     if ($postcodestart == 6) {
//         if ($state != "WA") {
//             $_SESSION['postcode'] = "This does not match WA";
//             $errMsg = true;
//         }
//     }
//     if ($postcodestart == 5) {
//         if ($state != "SA") {
//             $_SESSION['postcode'] = "This does not match SA";
//             $errMsg = true;
//         }
//     }
//     if ($postcodestart == 7) {
//         if ($state != "TAS") {
//             $_SESSION['postcode'] = "This does not match TAS";
//             $errMsg = true;
//         }
//     }
//     if ($postcodestart == 0) {
//         if ($state != "ACT") {
//             $_SESSION['postcode'] = "This does not match ACT";
//             $errMsg = true;
//         }
//     }
//     if (!$postcode) {
//             $_SESSION['postcode'] = "You must enter a postcode";
//             $errMsg = true;
//     }
//     if (!is_numeric($postcode)) {
//             $_SESSION['postcode'] = "Postcode must be a number";
//             $errMsg = true;
//     }
//     if (!strlen($postcode == 4)) {
//             $_SESSION['postcode'] = "Postcode must be 4 characters long";
//             $errMsg = true;
//     }
// //---------------contactdetails----------
//     if (isset ($_POST["contactdetails"])) {
//             $_SESSION['contactdetails'] = $contactdetails;
//             $errMsg = true;
//         }
//     if (!$contactdetails) {
//             $_SESSION['contactdetails'] = "Please select a preferred contact method";
//             $errMsg = true;
//     }
// //--------------phone-------------------
//     if (isset ($_POST["phone1"])) {
//             $_SESSION['phone1'] = $phone1;
//             $errMsg = true;
//         }
//     if (!$phone1) {
//             $_SESSION['phone1'] = "Please enter a phone number";
//             $errMsg = true;
//     }
//     if (!is_numeric($phone1)) {
//             $_SESSION['phone1'] = "Phone number must be numbers only";
//             $errMsg = true;
//     }
//     if (!strlen($phone1) == 10) {
//             $_SESSION['phone1'] = "Phone number must be 10 characters long";
//             $errMsg = true;
//     }
// //--------------bike------------------
//     if (isset ($_POST["bike"])) {
//             $_SESSION['bike'] = $bike;
//             $errMsg = true;
//         }
//     if (!$bike) {
//             $_SESSION['bike'] = "Please select a bike";
//             $errMsg = true;
//     }
// //--------------quantity-------------
//     if (isset ($_POST["quantity"])) {
//             $_SESSION['quantity'] = $quantity;
//             $errMsg = true;
//         }
//     if ($quantity < 1) {
//             $_SESSION['quantity'] = "The quantity must be a positive integer";
//             $errMsg = true;
//     }
//     if (!$quantity) {
//              $_SESSION['quantity'] = "You must enter a quantity";
//             $errMsg = true;
//     }
//     if (!is_numeric($quantity)) {
//             $_SESSION['quantity'] = "Quantity must be a number";
//             $errMsg = true;
//     }

// //------------------- cost-------------
//     $extras = "";
//     $cost = 0;
//     //helmet
//     $_SESSION['helmet'] = "";
//     if (isset ($_POST["helmet"])) 
//     if ($_POST['helmet'] == 'helmet') {
//         $extras = $extras. "Helmet";
//         $_SESSION['helmet'] = "checked";
//         $cost += 20;
//     }
//     //basket
//     $_SESSION['basket'] = "";
//     if (isset ($_POST["basket"])) 
//     if ($_POST['basket'] == 'basket') {
//         $extras = $extras. "basket";
//         $_SESSION['basket'] = "checked";
//         $cost += 20;
//     }
//     //lights
//     $_SESSION['lights'] = "";
//     if (isset ($_POST["lights"])) 
//     if ($_POST['lights'] == 'lights') {
//         $extras = $extras. "lights";
//         $_SESSION['lights'] = "checked";
//         $cost += 20;
//     }

//     if ($extras) {
//         $_SESSION['extras'] = $extras;
//      }

//     //bikes 

//     if ($_POST['bike'] == 'Strattos') {
//         $cost += 80;
//     }
//     if ($_POST['bike'] == 'Fixie') {
//         $cost += 30;
//     }
//     if ($_POST['bike'] == 'Surge') {
//         $cost += 45;
//     }
//     if ($_POST['bike'] == 'Totem') {
//         $cost += 55;
//     }
//     if ($_POST['bike'] == 'Sierra') {
//         $cost += 55;
//     }
//     if ($_POST['bike'] == 'Path1') {
//         $cost += 70;
//     }
//     if ($_POST['bike'] == 'Heist') {
//         $cost += 80;
//     }
//     if ($_POST['bike'] == 'Rove') {
//         $cost += 85;
//     }
//     if ($_POST['bike'] == 'Apollo') {
//         $cost += 90;
//     }
//     if ($_POST['bike'] == 'Merida') {
//         $cost += 40;
//     }
//     if ($_POST['bike'] == 'Avalance') {
//         $cost += 30;
//     }
//     if ($_POST['bike'] == 'Jet') {
//         $cost += 45;
//     }

//     $ordercost = ($cost * $quantity);
//     if ($ordercost) {
//         $_SESSION['ordercost'] = $ordercost;
//     }
    //payment

    // if (isset ($_POST["cardcvv"])) {
    //         $cardcvv = $_POST["cardcvv"];
    //     }
    // else {
    //         echo "<p>Error: Enter data in the <a href=\"enquire.php\">form</a></p>";
    //     }
    // if (isset ($_POST["cardname"])) {
    //         $cardname = $_POST["cardname"];
    //     }
    // else {
    //         echo "<p>Error: Enter data in the <a href=\"enquire.php\">form</a></p>";
    //     }
    // if (isset ($_POST["cardnumber"])) {
    //         $cardnumber = $_POST["cardnumber"];
    //     }
    // else {
    //         echo "<p>Error: Enter data in the <a href=\"enquire.php\">form</a></p>";
    //     }
    // if (isset ($_POST["cardtype"])) {
    //         $cardtype = $_POST["cardtype"];
    //     }
    // else {
    //         echo "<p>Error: Enter data in the <a href=\"enquire.php\">form</a></p>";
    //     }
    // if (isset ($_POST["cardexpiry"])) {
    //         $cardexpiry = $_POST["cardexpiry"];
    //     }
    // else {
    //         echo "<p>Error: Enter data in the <a href=\"enquire.php\">form</a></p>";
    //     }

    //sanitise input
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

    //input validations

    //enquire page

    // $errMsg = "";

    // if ($fname=="") {
    //         $errMsg .= "<p>You must enter your first name.</p>";
    //     }
    //  else if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
    //         $errMsg .= "<p>Only alpha letters allowed in your first name. </p>";
    //     }
    // if ($lname=="") {
    //         $errMsg .= "<p>You must enter your last name.</p>";
    //     }
    // else if (!preg_match("/^[a-zA-Z-]*$/",$lname)) {
    //         $errMsg .= "<p>Only alpha letters and hyphens allowed in your last name. </p>";
    //     }
    // if ($quantity < 1) {
    //         $errMsg .= "<p>The quantity must be a positive integer.</p>";
    // }
    // else if ($quantity=="") {
    //          $errMsg .= "<p>You must enter a quantity.</p>";
    // }
    // else if (!is_numeric($quantity)) {
    //         $errMsg .= "<p>Quantity must be a number</p>";
    // }
    // if ($email1=="") {
    //         $errMsg .= "<p>You must enter an email.</p>";
    //     }
    // if ($street=="") {
    //         $errMsg .= "<p>You must enter your street.</p>";
    //     }
    // if ($suburb=="") {
    //         $errMsg .= "<p>You must enter your suburb.</p>";
    //     }
    // if ($phone1=="") {
    //         $errMsg .= "<p>You must enter your phone number.</p>";
    //     }
    //postcode validation
    // $postcodestart = substr($postcode, 0, 1);
    // if ($postcodestart == 3 || $postcodestart == 8) {
    //     if ($state != "VIC"){
    //         $errMsg = "<p>If starting with 3 or 8, please select VIC</p>";
    //     }
    // }
    // if ($postcodestart == 1 || $postcodestart == 2) {
    //     if ($state != "NSW"){
    //         $errMsg = "<p>If starting with 1 or 2, please select NSW</p>";
    //     }
    // }
    // if ($postcodestart == 4 || $postcodestart == 9) {
    //     if ($state != "QLD"){
    //         $errMsg = "<p>If starting with 4 or 9, please select QLD</p>";
    //     }
    // }
    // if ($postcodestart == 0) {
    //     if ($state != "NT") {
    //         $errMsg = "<p>If starting with 0, please select NT</p>";
    //     }
    // }
    // if ($postcodestart == 6) {
    //     if ($state != "WA") {
    //         $errMsg = "<p>If starting with 6, please select WA</p>";
    //     }
    // }
    // if ($postcodestart == 5) {
    //     if ($state != "SA") {
    //         $errMsg = "<p>If starting with 5, please select SA</p>";
    //     }
    // }
    // if ($postcodestart == 7) {
    //     if ($state != "TAS") {
    //         $errMsg = "<p>If starting with 7, please select TAS</p>";
    //     }
    // }
    // if ($postcodestart == 0) {
    //     if ($state != "ACT") {
    //         $errMsg = "<p>If starting with 0, please select ACT</p>";
    //     }
    // }
    // payment page
    // string length http://php.net/manual/en/function.strlen.php
    // http://stackoverflow.com/questions/1141629/php-check-if-variable-length-equals-a-value
    //  if ($cardtype == "none") {
    //      $errMsg .= "<p>You must enter a card type</p>";
    //  }
    //  if ($cardname=="") {
    //         $errMsg .= "<p>You must enter the name on your card.</p>";
    //     }
    //  if ($cardcvv=="") {
    //         $errMsg .= "<p>You must enter your card CVV.</p>";
    //     }
    //  if ($cardnumber=="") {
    //         $errMsg .= "<p>You must enter the number on your card.</p>";
    //     }
    //  if ($cardexpiry=="") {
    //         $errMsg .= "<p>You must enter your card expiry date.</p>";
    //     }
    //  if (strlen($cardname > 40 || $cardname < 0)) {
    //         $errMsg .= "<p>Your name must be 40 characters or less.</p>";
    //     }
    //  else if (!preg_match("/[A-Za-z ]/", $cardname)) {
    //         $errMsg .= "<p>Your name must be alphabetical characters only</p>";
    //  }
    //  if (!preg_match("/((0[1-9])|1[0-2])[-][0-9]{2}/",$cardexpiry)) {
    //         $errMsg .= "<p>The expire date format is not correct!</p>";
    //     }
    //     $curdate = getdate();
    //     $curyear = substr($curdate.year,2,2);
    //     $expmonth = substr($cardexpiry,0,2);
    //     $expyear = substr($cardexpiry,3,2);
    //  if ($expyear < $curyear || ($expyear == $curyear && $expmonth < $curdate.mon)) {
    //         $errMsg .= "<p>The expiry date has passed</p>";
    // }
    //credit card validation
    //mastercard
    
    // $cardstart = substr($cardnumber, 0, 2);
    // if ($cardstart > '50' && $cardstart < '56') {
    //     echo ("<p>Works</p>");
    //     if (strlen($cardnumber != 16 )) {
    //         $errMsg .= "<p>Card number must be 16 digits</p>";
    //     }
    //     if (strlen($cardcvv != 3)) {
    //         $errMsg .= "<p>CVV must be 3 digits</p>";
    //     }
    //     if (strlen($cardtype != "mastercard")) {
    //         $errMsg .= "<p>If starting at 51 to 55, please select MasterCard</p>";
    //     }
    // }
    //americanexpress
    // if ($cardstart == 37 || $cardstart == 34) {
    //     if (strlen($cardnumber != 15)) {
    //         $errMsg .= "<p>Card number must be 15 digits</p>";
    //     }
    //     if (strlen($cardcvv != 4)) {
    //         $errMsg .= "<p>CVV must be 4 digits</p>";
    //     }
    //     if ($cardtype != "americanexpress") {
    //         $errMsg .= "<p>If starting with 37 or 24, please select American Express</p>";
    //     }
    // }
    // //visa
    // if ($cardstart == 4) {
    //     if ($cardtype != "visa") {
    //         $errMsg .= "<p>If starting with 4, please select Visa</p>";
    //     }
    //     if (strlen($cardnumber != 16)) {
    //         $errMsg .= "<p>Card number must be 16 digits</p>";
    //     }
    //     if (strlen($cardcvv != 3)) {
    //         $errMsg .= "<p>Card CVV is not proper length</p>";
    //     }
    // }
    //gets the cost from payment
    
    // $cost = $_POST['cost'];

    if ($errMsg) {
            header('Location: fix_order.php');
            //?fname=$fname&lname=$lname&email1=$email1&street=$street&suburb=$suburb&state=$state&postcode=$postcode&contactdetails=$contactdetails&phone1=$phone1&bike=$bike&quantity=$quantity&errMsg=$errMsg');
    } else {

        $conn = @mysqli_connect($host,
            $user,
            $pwd,
            $sql_db
         );
         //checks if connection is successful
         if (!$conn) {
             echo "<p>Database connection failure</p>";

         } else {

                        $sql_table="orders";

                        $query = "insert into $sql_table (firstname, lastname, email, street, suburb, postcode, state, contact_details, phone, bike, extras, quantity, comment, order_cost, cardtype, cardname, cardnumber, cardexpiry, cardcvv) values ('$fname', '$lname', '$email1', '$street', '$suburb', '$postcode', '$state', '$contactdetails', '$phone1', '$bike', '$extras', '$quantity', '$comment', '$ordercost', '$cardtype', '$cardname', '$cardnumber', '$cardexpiry', '$cardcvv')";

                        $result = mysqli_query($conn, $query);

                        if(empty($result)) {

                            $query = "CREATE TABLE orders (
                                order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    	                        order_cost FLOAT NOT NULL ,
                                order_status ENUM('Pending', 'Fulfilled', 'Paid', 'Archived') default 'Pending' NOT NULL ,
                                order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
                                firstname VARCHAR(25) NOT NULL ,
                                lastname VARCHAR(25) NOT NULL ,
                                email VARCHAR(25) NOT NULL ,
                                street VARCHAR(40) NOT NULL ,
                                suburb VARCHAR(20) NOT NULL ,
                                postcode VARCHAR(4) NOT NULL ,
                                state ENUM('VIC', 'NSW', 'QLD', 'TAS', 'SA', 'NT', 'WA', 'ACT') default 'VIC' NOT NULL ,
                                contact_details VARCHAR(10) NOT NULL ,
                                phone VARCHAR(10) NOT NULL ,
                                bike ENUM('Strattos', 'Fixie', 'Surge', 'Totem', 'Sierra', 'Path1', 'Heist', 'Rove', 'Apollo', 'Merida', 'Avalanche', 'Jet') NOT NULL ,
                                extras VARCHAR(10) NOT NULL , 
                                quantity INT NOT NULL , 
                                comment VARCHAR(25) NOT NULL ,
                                cardtype ENUM('Visa', 'Mastercard', 'AmericanExpress') NOT NULL ,
                                cardname VARCHAR(40) NOT NULL ,
                                cardnumber VARCHAR(16) NOT NULL ,
                                cardexpiry VARCHAR(5) NOT NULL ,
                                cardcvv VARCHAR(4) NOT NULL 
                                )";

                            $result = mysqli_query($conn, $query);

                            $sql_table="orders";

                            $query = "insert into $sql_table (firstname, lastname, email, street, suburb, postcode, state, contact_details, phone, bike, extras, quantity, comment, order_cost, cardtype, cardname, cardnumber, cardexpiry, cardcvv) values ('$fname', '$lname', '$email1', '$street', '$suburb', '$postcode', '$state', '$contactdetails', '$phone1', '$bike', '$extras', '$quantity', '$comment', '$ordercost', '$cardtype', '$cardname', '$cardnumber', '$cardexpiry', '$cardcvv')";

                            $result = mysqli_query($conn, $query);
                            
                        }

                        if(!$result) {
                            echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
                        } else {
                            echo "<p class=\"ok\">Successfully added new orders record</p>";
                        }

                        //close the database connection_aborted
                        mysqli_close($conn);
                 } // if successful database connection

        header('Location: receipt.php'); 
    }

    
?>
</body>
</html>