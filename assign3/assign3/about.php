<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Provides bike hire for a wide range of bicycles at a low cost" />
	<meta name="keywords" content="HTML5, CSS, Bike, Bicycle, Hire" />
	<meta name="author" content="Tabitha Leimonis" />
	<title>Tabitha's Bike Hire</title>
	<!-- References to external CSS files-->
		<link href= "styles/style.css" rel="stylesheet" />
</head>
<body>
	<?php include 'header.inc';?>
	<?php include 'menu.inc';?>
	
	<section id="authordetails">
		<h2>Author Details</h2>
	<div id="authordetailsdiv">
			<dl>
				<dt>Author</dt>
					<dd>Tabitha Leimonis</dd>
				<dt>Student ID</dt>
					<dd>101635296</dd>
				<dt>Course</dt>
					<dd>Bachelor of Computer Science</dd>
			</dl>
		<p>Please contact me at my <a href="mailto:101635296@student.swin.edu.au" id="studentemail">student email</a></p>
	</div>
		<figure><figcaption>An image of the author, Tabitha Leimonis</figcaption>
		<a href="images/Tabitha_Leimonis.jpg"> <img src="images/Tabitha_Leimonis.jpg" alt="Tabitha's Bike Hire" width="200" /></a></figure>

	</section>
	<section id="timetable">
		<!-- Table inspired by http://www.lovelycoding.org/2013/05/create-weekly-timetable-using-css-and-html.html -->
		<h2>Timetable</h2>
			<table>
				<thead>
					<tr>
						<th id="blank"></th>
						<th class="timetable-title">Monday</th>
						<th class="timetable-title">Tuesday</th>
						<th class="timetable-title">Wednesday</th>
						<th class="timetable-title">Thursday</th>
						<th class="timetable-title">Friday</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th class="timetable-side">8:00</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">8:30</th>
							<td class="no-class"></td>
							<td class="cos10011" rowspan="4">
							<p>COS10011</p>
							<p>Lecture - EN313</p>
							</td>
							<td class="cos10003" rowspan="4">
							<p>COS10003</p>
							<p>Lecture - ATC101</p>
							</td>
							<td class="no-class"></td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">9:00</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">9:30</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">10:00</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">10:30</th>
							<td class="no-class"></td>
							<td class="tne10006" rowspan="4">
							<p>TNE10006</p>
							<p>Lecture - ATC101</p>
							</td>
							<td class="no-class"></td>
							<td class="cos10009" rowspan="4">
							<p>COS10003</p>
							<p>Lecture - ATC101</p>
							</td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">11:00</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">11:30</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="tne10006" rowspan="6">
							<p>TNE10006</p>
							<p>Practical - ATC329</p>
							</td>
					</tr>
					<tr>
						<th class="timetable-side">12:00</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">12:30</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="cos10009" rowspan="4">
							<p>COS10009</p>
							<p>Lab - ATC625</p>
							</td>
					</tr>
					<tr>
						<th class="timetable-side">1:00</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">1:30</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="cos10003" rowspan="4">
							<p>COS10003</p>
							<p>Tutorial - BA305</p>
							</td>
					</tr>
					<tr>
						<th class="timetable-side">2:00</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">2:30</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">3:00</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">3:30</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="cos10011" rowspan="4">
							<p>COS10011</p>
							<p>Lab - BA407</p>
							</td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">4:00</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">4:30</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
					</tr>
					<tr>
						<th class="timetable-side">5:00</th>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
							<td class="no-class"></td>
					</tr>
				</tbody>
			</table>
	</section>
	
	<section id="requirements">
		<div id="requirements1">
			<h3>HTML List</h3>
				<h4>Index page</h4>
					<ul>
						<li id="indexpage1"><a href="index.html#nav">Header and Menu</a></li>
					</ul>
				<h4>Product page</h4>
					<ul>
						<li id="productpage1"><a href="product.html#information">Headings - Level 1</a></li>
						<li id="productpage2"><a href="product.html#information">Headings - Level 2</a></li>
						<li id="productpage3"><a href="product.html#information">Section 1</a></li>
						<li id="productpage4"><a href="product.html#bikeinfo">Section 2</a></li>
						<li id="productpage5"><a href="product.html#tables">Section 3</a></li>
						<li id="productpage6"><a href="product.html#aside">Aside</a></li>
						<li id="productpage7"><a href="product.html#information">Ordered List</a></li>
						<li id="productpage8"><a href="product.html#information">Unordered List</a></li>
						<li id="productpage9"><a href="product.html#tables">Table</a></li>
						<li id="productpage10"><a href="product.html#bikeinfo">Content Graphic</a></li>
					</ul>
				<h4>Enquire page</h4>
					<ul>
						<li id="enquirepage1"><a href="enquire.html#form">Form - All 12 Elements</a></li>
					</ul>
				<h4>About page</h4>
					<ul>
						<li id="aboutpage1"><a href="#authordetails">Definition List</a></li>
						<li id="aboutpage2"><a href="#timetable">Timetable</a></li>
						<li id="aboutpage3"><a href="#authordetails">Photo</a></li>
						<li id="aboutpage4"><a href="#authordetails">Email</a></li>
						<li id="aboutpage5"><a href="#requirements">HTML List</a></li>
						<li id="aboutpage6"><a href="#requirements">CSS List</a></li>
						<li id="aboutpage7"><a href="#reflection">Reflection</a></li>
					</ul>
	</div>
		<div id="requirements2">
			<h3>CSS List</h3>
				<h4>Index Page</h4>
					<ul>
						<li id="indexpage2"><a href="index.html#nav">Menu Format and Background</a></li>
						<li id="indexpage3"><a href="index.html#home">Background Graphic On Page</a></li>
						<li id="indexpage4"><a href="index.html/footer">Footer Text Small and Centred</a></li>
					</ul>
				<h4>Product Page</h4>
					<ul>
						<li id="productpage11"><a href="product.html#aside">Aside</a></li>
						<li id="productpage12"><a href="product.html#tables">Table Colour and Data</a></li>
						<li id="productpage13"><a href="product.html/footer">Footer Width</a></li>
					</ul>
				<h4>About Page</h4>
					<ul>
						<li id="aboutpage8"><a href="about.html#authordetails">Styled Definition List + Email</a></li>
						<li id="aboutpage9"><a href="about.html#authordetails">Photo</a></li>
						<li id="aboutpage10"><a href="about.html#timetable">Table</a></li>
					</ul>
	</div>
	</section>
	
	<section id="reflection">
		<h3>Reflection</h3>
			<p>	While doing the HTML part of the assignment I found it fairly easy, however most times I still had to refer
			to previous labs in order to remind myself of what to use in order to achieve the set requirements. There were 
			some areas that I found difficult, but these were mainly because I did not know how to present my content in such 
			a way, such as unordered and ordered lists for my product page. 
			</p>
			<p>Furthermore, with the CSS, I found it fairly difficult to improvise. As a result, I was regularly looking at labs and other websites
			for some inspiration. Although, I still have an understanding of CSS and was able to make such elements of my CSS unique and fit the
			requirements of my page.
			</p>
			<p>Overall, the assignment took a very long time to complete, suprisingly. However, most of the HTML and CSS was very fun to code,
			except when it did not work after 50 tries...
			</p>
	</section>
	
	<?php include 'footer.inc';?>
</body>

</html>