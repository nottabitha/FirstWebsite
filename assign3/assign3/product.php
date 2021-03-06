<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Provides bike hire for a wide range of bicycles at a low cost" />
	<meta name="keywords" content="HTML5, CSS, Bike, Bicycle, Hire" />
	<meta name="author" content="Tabitha Leimonis" />
	<title>Tabitha's Bike Hire</title>
	<!-- References to external CSS files-->
		<link href= "styles/style.css" rel="stylesheet"/>
</head>

<body>
	<?php include 'header.inc';?>
	<?php include 'menu.inc';?>
	
	<section id="information">
		<h2>Information about our product</h2>
			<aside id="aside">
				<p> Everyone has a different preference in bike. Whether you like the smooth ride, or the edgy look,
					we have heaps of bikes to cater to individual interests. Because of this we allow you to come in and look
					at our bikes and even give them a test ride!
				</p>
			</aside>
		<h3>When choosing which bike to hire, please remember:</h3>
			<ul>
				<li>Always have a bike helmet, it is illegal to ride without one. We provide these for a small extra fee.</li>
				<li>If you are planning on travelling at night, we recommend hiring some lights for your bike, which we also provide for a small fee</li>
				<li>If any significant damage is done to the bike, we will charge however much it costs to repair. Please keep in mind this can value to more than $600 depending on the bike hired and damage</li>
				<li>We will ask for the location you are taking the bike, as we must make sure our product is not stolen or taken too far of a location for us to keep track</li>
				<li>The difference in prices for each category indicate overall quality. I higher priced bike means that the quality is better than that of the lower. However,
					all our bikes are at an exceptional quality overall.</li>
			</ul>
		<h3>Also please remember we offer three extra items that can also be hired for a cost of $20 each:</h3>
			<ol>
				<li>Helmet</li>
				<li>Lights</li>
				<li>Basket (for cruiser and city bikes)</li>
			</ol>
	</section>
	
	<section id="bikeinfo">
	<div id="roadinfo">
	<!-- Information on bikes from http://centurycycles.com/buyers-guides/bicycle-types-how-to-pick-the-best-bike-for-you-pg9.htm -->
		<h3>Road Bikes</h3>
			<p>Road bikes are generally used,you guessed it, on the road. They are specifically designed to provide the rider a nice fast-spaced yet smooth ride along the road. 
				Therefore, if you are planning on riding a long distance, you would generally go for the road bike, especially when riding on longer roads. Such bikes can also be used
				in sport, usually being used by cyclists.
			</p>
			<!-- Image from http://www.bicycleus.com/product/polygon-bikes-strattos-s2-road-bicycles-blackred-53cmmedium/ -->
			<a href="images/polygon_strattos_s2.jpg"> <img src="images/polygon_strattos_s2.jpg" alt="Road Bike" class="roadpic" title="Polygon Strattos S2" width="300" /></a>
	</div>

	<div id="mountaininfo">
		<h3>Mountain Bikes</h3>
			<p>If you are planning on riding on rough terrain, generally mountains, then you would usually go for the mountain bike. These come with a better suspension to ensure
				the rider is still riding with ease and has complete control of the bike. Furthermore, the wheels are usually a lot more wider in order to deal with the rough terrain.
			</p>
			<!-- Image from http://ktm-bikes.net/kategoria/rowery-ktm-2017/hardtail-rowery-ktm-2017/ -->
			<a href="images/surge_hivis_green.jpg"> <img src="images/surge_hivis_green.jpg" alt="Mountain Bike" class="mountainpic" width="300" title="Surge Hi Vis Green" /></a>
	</div>
	
	<div id="cityinfo">
		<h3>City Bikes</h3>
			<p>City bikes are not exactly a type of bike, however it is a term used for bikes that are of course, ridden in the city. With an edgy look and urban design, these bikes are
				great for when you plan to ride in the city, while stilling looking good.
			</p>
			<!-- Image from https://www.bicyclesonline.com.au/polygon-sierra-ax-24-inch-city-bike -->
			<a href="images/polygon_sierra_ax_24_inch.jpg"> <img src="images/polygon_sierra_ax_24_inch.jpg" alt="City Bike" class="citypic" width="300" title="Polygon Sierra AX 24 inch" /></a>
	</div>
	
	<div id="hybridinfo">
		<h3>Hybrid Bikes</h3>
			<p>Hybrid bikes are a combination of both mountain and road bikes. Of course they achieve some of the advantages that both may offer, while simulateously lacking in some small areas.
				Therefore, if you plan on going on one particular trail, we suggest either mountain or road bikes. If you plan on going down both however, then we would definitely suggest the hybrid model.
			</p>
			<!-- http://www.bikesale.com/giant-rove-3-step-through-womens-bike-2017.aspx -->
			<a href="images/hybrid_bike.jpg"> <img src="images/hybrid_bike.jpg" alt="Hybrid Bike" class="hybridpic" width="300" title="Giant Liv Rove 3 2017" /></a>
	</div>
	
	<div id="cruiserinfo">
		<h3>Cruiser Bikes</h3>
			<p>Cruiser Bikes are rather casual. They offer a very large seat for comfort, the pedals are placed a lot more forward in order to maintain a comfortable experience, and the handlebars are spread a lot more wider.
				Thus, if you wish to have a more relaxing riding experience along the coast and a slower pace, whilst still maintaining a comfortable attitude, then cruiser bikes are your go to.
			</p>
			<!-- http://www.suggest-keywords.com/YXBvbGxvIGV4Y2VlZCAyMA/ -->
			<a href="images/cruiser_bike.jpg"> <img src="images/cruiser_bike.jpg" alt="Cruiser Bike" class="cruiserpic" width="300" title="Apollo Nouveau 7" /></a>
	</div>
	
	<div id="bmxinfo">
		<h3>BMX Bikes</h3>
			<p>BMX bikes are smaller and lighter bicycles, generally used to perform tricks both on the dirt and on the road (usually a skate park), however these bikes are generally not ridden anywhere else, as they can usually be 
				very uncomfortable. Thus, they should only be used if you plan on performing any stunts.
			</p>
			<!-- http://www.kidsmegamart.com.au/avalanche-dv8-freestyle-20-bike-black-blue -->
			<a href="images/bmx_bike.jpg"> <img src="images/bmx_bike.jpg" alt="BMX Bike" class="bmxpic" width="300" title="Avalanche DV8 Freestyle BMX" /></a>
	</div>
	</section>
	<!-- Websites used to insure the image map:
		https://www.w3schools.com/tags/tag_map.asp
		http://imagemap-generator.dariodomi.de/ -->
		
	<section id="imagemap">
		<p>The easiest way to get to our store is to travel by transport, due to the lack of parking spaces, 
			specifically during weekdays. We suggest getting off at Glenferrie Station and walking to the store at Swinburne University. Click the specific areas in the image to be redirected to a larger map of that area :</p>
		<img src="images/hawthorn.gif" alt="hawthorn" usemap="#hawthorn" />
		<map name="hawthorn" id="hawthorn">
				<area alt="Glenferrie" title="Glenferrie Railway Station" href="https://www.google.com.au/maps/search/swinburne/@-37.821309,145.0351807,18.17z" shape="rect" coords="4,37,26,68" />
				<area alt="Swinburne University" title="Swinburne University of Technology" href="https://www.google.com.au/maps/search/swinburne/@-37.8221787,145.0390315,17.17z" shape="rect" coords="43,51,75,78" />
		</map>
	</section>
	
	<section id="tables"> 
		<!-- Layout for product hire inspired by https://cyclesgalleria.com.au/pages/rentals-->
		
		<h2>Our bicycle range</h2>
		<table> 
			<thead>
				<tr>
					<th class="table-title">Bike</th>
					<th class="table-title">Price(per day)</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th colspan="2" class="table-subheading">Road Bikes</th>
				</tr>
				<tr>
					<td>Polygon Strattos S2</td>
					<td>$80</td>
				</tr>
				<tr>
					<td>Fixie Orange</td>
					<td>$30</td>
				</tr>
				<tr>
					<th colspan="2" class="table-subheading">Mountain Bikes</th>
				</tr>
				<tr>
					<td>Surge Hi Vis Green</td>
					<td>$45</td>
				</tr>
				<tr>
					<td>Totem Spark 27.5</td>
					<td>$55</td>
				</tr>
				<tr>
					<th colspan="2" class="table-subheading">City Bikes</th>
				</tr>
				<tr>
					<td>Polygon Sierra AX 24 inch</td>
					<td>$55</td>
				</tr>
				<tr>
					<td>2017 Polygon Path 1 - 29er City Bike</td>
					<td>$70</td>
				</tr>
				<tr>
					<th colspan="2" class="table-subheading">Hybrid Bikes</th>
				</tr>
				<tr>
					<td>Polygon Heist 2.0 29er Hybrid Commuter Bike</td>
					<td>$80</td>
				</tr>
				<tr>
					<td>Giant Liv Rove 3 2017</td>
					<td>$85</td>
				</tr>
				<tr>
					<td colspan="2" class="table-subheading">Cruiser Bikes</td>
				</tr>
				<tr>
					<td>Apollo Nouveau 7</td>
					<td>$90</td>
				</tr>
				<tr>
					<td>Merida City 3.0</td>
					<td>$40</td>
				</tr>
				<tr>
					<th colspan="2" class="table-subheading">BMX Bikes</th>
				</tr>
				<tr>
					<td>Avalanche DV8 Freestyle BMX</td>
					<td>$30</td>
				</tr>
				<tr>
					<td>Jet BMX Jet Generate BMX 2017</td>
					<td>$45</td>
				</tr>
			</tbody>
		</table>
	</section>

	<?php include 'footer.inc';?>
</body>

</html>