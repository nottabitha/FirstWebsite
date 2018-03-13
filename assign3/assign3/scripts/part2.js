/**
* Author: Tabitha Leimonis
* Target: register.html
* Purpose: 
* Created: 15 April 2017
* Last updated: 26 April 2017
* Credits: 
*/
/*
"use strict"
//TO STOP VALIDATION. GLOBAL VARIABLE
//var debug = document.getElementById("debug").checked;

var debug = true;

function validateEnquire(){

    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email1 = document.getElementById("email1").value;
    var street = document.getElementById("street").value;
    var suburb = document.getElementById("suburb").value;
    var postcode = document.getElementById("postcode").value;
    var state = document.getElementById("state").value;
    var contactdetails = document.getElementById("contactdetails").value;
    var phone1 = document.getElementById("phone1").value;
    var bike = document.getElementById("bike").value;
    var quantity = document.getElementById("quantity").value;
    var comment = document.getElementById("comment").value;
    var helmet = document.getElementById("helmet").checked;
    var basket = document.getElementById("basket").checked;
    var lights = document.getElementById("lights").checked;

    var errMsg = "";
    var result = true;


    var contactdetails = "";
    if (document.getElementById("email").checked === true){
        contactdetails = "email"
    }

    if (document.getElementById("post").checked === true){
        contactdetails = "post"
    }

    if (document.getElementById("phone").checked === true){
        contactdetails = "phone"
    }

    var email = document.getElementById("email").checked;
    var post = document.getElementById("post").checked;
    var phone = document.getElementById("phone").checked;

    //postcodeStart is the first digit of the postcode string
    //compares the string to string suggested and ensures it is the same
    var postCodeStart = postcode.substring(0,1);

    if (postCodeStart == 3 || postCodeStart == 8) {
        if (state != "VIC"){
            errMsg = errMsg + "If starting with 3 or 8, please select VIC\n";
            result = false;
        }
    }
    if (postCodeStart == 1 || postCodeStart == 2) {
        if (state != "NSW"){
            errMsg = errMsg + "If starting with 1 or 2, please select NSW\n";
            result = false;
        }
    }
    if (postCodeStart == 4 || postCodeStart == 9) {
        if (state != "QLD") {
            errMsg = errMsg + "If starting with 4 or 9, please select QLD\n";
            result = false;
        }
    }
    if (postCodeStart == 0) {
        if (state != "NT") {
            errMsg = errMsg + "If starting with 0, please select NT\n";
            result = false;
        }
    }
    if (postCodeStart == 6) {
        if (state != "WA") {
            errMsg = errMsg + "If starting with 6, please select WA\n";
            result = false;
        }
    }
    if (postCodeStart == 5) {
        if (state != "SA") {
            errMsg = errMsg + "If starting with 5, please select SA\n";
            result = false;
        }
    }
    if (postCodeStart == 7) {
        if (state != "TAS") {
            errMsg = errMsg + "If starting with 7, please select TAS\n";
            result = false;
        }
    }
    if (postCodeStart == 0) {
        if (state != "ACT") {
            errMsg = errMsg + "If starting with 0, please select ACT\n";
        }
    }
    if (!fname.match(/^[a-zA-Z]+$/)) {
        errMsg = errMsg + "Your first name must only contain alpha characters\n";
        result = false;
    }

    if (!lname.match(/^[a-zA-Z-]+$/)) {
        errMsg = errMsg + "Your last name must only contain alpha characters and hyphens\n";
        result = false;
    }

    if (quantity <= 0) {
        errMsg = errMsg + "The quantity must be a positive integer\n";
        result = false;
    }

    if (fname == "") {
        errMsg = errMsg + "You must enter a first name\n";
        result = false;
    }

    if (lname == "") {
        errMsg = errMsg + "You must enter a last name\n";
        result = false;
    }

    if (email1 == "") {
        errMsg = errMsg + "You must enter an email\n";
        result = false;
    }

    if (street == "") {
        errMsg = errMsg + "You must enter a street\n";
        result = false;
    }

    if (suburb == "") {
        errMsg = errMsg + "You must enter a suburb\n";
        result = false;
    }

    if (phone1 == "") {
        errMsg = errMsg + "You must enter a phone number\n";
        result = false;
    }

    if (quantity == "") {
        errMsg = errMsg + "You must enter a quantity\n";
        result = false;
    }
    
    if (debug) {errMsg = ""; result = true;}
    if (result) {
        storeBooking(fname, lname, email1, street, suburb, postcode, state, contactdetails, helmet, basket, lights, phone1, bike, extras, quantity, comment);
    }
    if (errMsg != ""){ 
        alert(errMsg);
    }
    return result;
}

function storeBooking( fname, lname, email1, street, suburb, postcode, state, contactdetails, helmet, basket, lights, phone1, bike, extras, quantity, comment) {
    var extras = "";
    if(helmet) extras += " helmet";
    if(basket) extras += " basket";
    if(lights) extras += " lights";
    sessionStorage.fname = fname;
    sessionStorage.lname = lname;
    sessionStorage.email1 = email1;
    sessionStorage.street = street;
    sessionStorage.suburb = suburb;
    sessionStorage.postcode = postcode;
    sessionStorage.state = state;
    sessionStorage.phone1 = phone1;
    sessionStorage.bike = bike;
    sessionStorage.extras = extras;
    sessionStorage.quantity = quantity;
    sessionStorage.comment = comment;

    sessionStorage.contactdetails = contactdetails;

    sessionStorage.helmet = helmet;
    sessionStorage.basket = basket;
    sessionStorage.lights = lights;
    
    
}

function validatePayment() {

    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email1 = document.getElementById("email1").value;
    var street = document.getElementById("street").value;
    var suburb = document.getElementById("suburb").value;
    var postcode = document.getElementById("postcode").value;
    var state = document.getElementById("state").value;
    var contactdetails = document.getElementById("contactdetails").value;
    var phone1 = document.getElementById("phone1").value;
    var bike = document.getElementById("bike").value;
    var quantity = document.getElementById("quantity").value;
    var comment = document.getElementById("comment").value;

    var errMsg = "";
    var result = true;

    var cardcvv = document.getElementById("cardcvv").value;

    var cardtype = document.getElementById("cardtype").value;
    if(document.getElementById("cardtype").value == "none") {
        errMsg = errMsg + "You must enter a card type\n";
        result = false;
    }

    var cardname = document.getElementById("cardname").value;
    if (!cardname.match(/[A-Za-z ]/)) {
        errMsg = errMsg + "Your card name must be alphabetical characters only\n";
        result = false;
    }

    if (cardcvv == "") {
        errMsg = errMsg + "You must enter your card CVV\n";
        result = false;
    }

    if (cardname.length > 40) {
        errMsg = errMsg + "Your card must be less than or equal to 40 characters long\n";
        result = false;
    }

    var cardnumber = document.getElementById("cardnumber").value;
    if (cardnumber == "") {
        errMsg = "Card number must be either 15 or 16 digits\n";
        result = false;
    }

    // Inspiration from http://stackoverflow.com/questions/32931526/how-to-use-javascript-to-validate-credit-card-expire-datemm-yy-must-not-expire
    var cardexpiry = document.getElementById("cardexpiry").value;
    if (!cardexpiry.match(/((0[1-9])|1[0-2])[-][0-9]{2}/)){
        errMsg = "The expire date format is not correct!\n";
        result = false;
    }
//card expiry date after current date
   if (cardexpiry.match(/((0[1-9])|1[0-2])[-]0[0-9]/) || cardexpiry.match(/((0[1-9])|1[0-2])[-]1[0-6]/) || cardexpiry.match(/(0[1-3])[-]17/)) {
        errMsg = "The expiry date has passed\n";
        result = false;
    }

    // javascript starts with method https://www.w3schools.com/jsref/jsref_startswith.asp 
    // sub string help https://www.w3schools.com/jsref/jsref_substring.asp
    //extracts characters from a string 0 = first character and 2 = second character 
    //.length counts the length of the text 
    //check https://www.w3schools.com/jsref/jsref_length_string.asp
    var cardstart = cardnumber.substring(0, 2);
    
    //mastercard
    if (cardstart > 50 && cardstart < 56){
        if (cardnumber.length != 16 ) {
            errMsg = errMsg + "Card number must be 16 digits\n";
            result = false;
        }

        if (cardcvv.length != 3) {
            errMsg = errMsg + "CVV must be 3 digits\n";
            result = false;
        }
        if (cardtype != "mastercard") {
            errMsg = errMsg + "If starting at 51 to 55, please select MasterCard\n";
            result = false;
        }
     }
 
    //americanexpress
    if (cardstart == 37 || cardstart == 34) {
        if (cardnumber.length != 15){
            errMsg = errMsg + "Card number must be 15 digits\n";
            result = false;
        }
        if (cardcvv.length != 4) {
            errMsg = errMsg + "CVV must be 4 digits\n";
            result = false;
        }
        if (cardtype != "americanexpress") {
            errMsg = errMsg + "If starting with 37 or 24, please select American Express\n";
            result = false;
        }
    }
    //visa
   if (cardstart.startsWith("4"))  {

        if (cardtype != "visa") {
            errMsg = errMsg + "If starting with 4, please select Visa\n";
            result = false;
        }
        
        if (cardnumber.length != 16) {
            errMsg = errMsg + "Card number must be 16 digits\n";
            result = false;
        }
        if (cardcvv.length != 3) {
            errMsg = errMsg + "Card CVV is not proper length\n";
            result = false;
        }
    }
    if (debug) {errMsg = ""; result = true;}
    if (errMsg != ""){
        alert(errMsg);
    }

    return result;
}

function calcCost(bike, extras, quantity) {
    var cost = 0
    if (bike.search("Strattos") != -1) cost += 80;
    if (bike.search("Fixie") != -1) cost += 30;
    if (bike.search("Surge") != -1) cost += 45;
    if (bike.search("Totem") != -1) cost += 55;
    if (bike.search("Sierra") != -1) cost += 55;
    if (bike.search("Path1") != -1) cost += 70;
    if (bike.search("Heist") != -1) cost += 80;
    if (bike.search("Rove") != -1) cost += 85;
    if (bike.search("Apollo") != -1) cost += 90;
    if (bike.search("Merida") != -1) cost += 40;
    if (bike.search("Avalance") != -1) cost += 30;
    if (bike.search("Jet") != -1) cost += 45;
    if (extras.search("helmet") != -1) cost += 20;
    if (extras.search("basket") != -1) cost += 20;
    if (extras.search("lights") != -1) cost += 20;
    return cost * quantity;
}

function getBooking(){
    var cost = 0;
    if(sessionStorage.fname != undefined){ 
        document.getElementById("confirm_name").textContent = sessionStorage.fname + " " + sessionStorage.lname;
        document.getElementById("confirm_email").textContent = sessionStorage.email1;
        document.getElementById("confirm_address").textContent = sessionStorage.street + " " + sessionStorage.suburb + " " + sessionStorage.postcode + " " + sessionStorage.state;
        document.getElementById("confirm_contactdetails").textContent = sessionStorage.contactdetails;
        document.getElementById("confirm_phone").textContent = sessionStorage.phone1;
        document.getElementById("confirm_order").textContent = sessionStorage.bike + " " + sessionStorage.extras;
        document.getElementById("confirm_quantity").textContent = sessionStorage.quantity;
        document.getElementById("confirm_comment").textContent = sessionStorage.comment;
        cost = calcCost(sessionStorage.bike, sessionStorage.extras, sessionStorage.quantity);
        document.getElementById("confirm_cost").textContent = cost;
        //fill hidden fields
        document.getElementById("fname").value = sessionStorage.fname;
        document.getElementById("lname").value = sessionStorage.lname;
        document.getElementById("email1").value = sessionStorage.email1;
        document.getElementById("street").value = sessionStorage.street;
        document.getElementById("suburb").value = sessionStorage.suburb;
        document.getElementById("postcode").value = sessionStorage.postcode;
        document.getElementById("state").value = sessionStorage.state;
        document.getElementById("contactdetails").value = sessionStorage.contactdetails;
        document.getElementById("phone1").value = sessionStorage.phone1;
        document.getElementById("bike").value = sessionStorage.bike;
        document.getElementById("extras").value = sessionStorage.extras;
        document.getElementById("quantity").value = sessionStorage.quantity;
        document.getElementById("comment").value = sessionStorage.comment;

        document.getElementById("cost").value = cost;
    }
}
// from lab07
function cancelBooking() {
    var cancelButton = document.getElementById("cancelButton").value;
	window.location = "index.html";
    sessionStorage.clear();
}

function init () {

//if payment page
if(document.getElementById("paymentform") != undefined){
    var paymentform = document.getElementById("paymentform");
    paymentform.onsubmit = validatePayment
    //TO STOP VALIDATION
    //if (!debug) {paymentform.onsubmit = validatePayment};
    cancelButton.onclick = cancelBooking;
    getBooking();
}
//if enquire
if(document.getElementById("enquireform") != undefined){
    var enquireform = document.getElementById("enquireform")
    enquireform.onsubmit = validateEnquire
    //TO STOP VALIDATION
    //if (!debug) {enquireform.onsubmit = validateEnquire};
    }
}
window.onload = init;
*/