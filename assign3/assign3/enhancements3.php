<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Provides bike hire for a wide range of bicycles at a low cost" />
	<meta name="keywords" content="HTML5, CSS, Bike, Bicycle, Hire" />
	<meta name="author" content="Tabitha Leimonis" />
	<title>Enhancements</title>
	<!-- References to external CSS files-->
		<link href= "styles/style.css" rel="stylesheet" />
</head>

<body>
	<?php include 'header.inc';?>
	<?php include 'menu.inc';?>
	
	<section id="enhancement5">
		<h2> Sessions </h2>
			<p> I used sessions for two of my enhancements.

                In my first enhancement I used php sessions to pass data back to my fix order page from the process order
                php. This acts as an enhancement as it passes back the credit card details when there are errors and keeps the
                values that were recorded previously in paymenr or fix order.

                The second way I used sessions for an extra enhancement was by processing forms in two stages,
                whilst simultaneously using sessions. Data that was put into the enquire page was passed to fix enquire
                if errors were found. The data that was correct remained in the input boxes, while the others displayed errors if
                errors were found. When all the data is valid, it is then passed to the payment page, where the credit card 
                information can be interted and validated.
			</p>
			<p>A link to the enhancement:</p>
			<ul>
				<li><a href="enquire.php">Sessions(Credit Card)</a></li>
                <li><a href="payment.php">Sessions(Enquire)</a></li>
			</ul>
	</section>