<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Manager Page" />
<meta name="keywords" content="PHP, MySql" />
<title>Manager Page</title>
<link href= "styles/style.css" rel="stylesheet"/>
<script src="scripts/part2.js"></script>
</head>


<body>
    <?php include 'header.inc'; ?>
    <?php include 'menu.inc'; ?>

    <h1>Manager Page</h1>
    <form method="post" action="manager.php">
    <fieldset><legend>Order Details Search:</legend>
        <p>If you wish to search by customer or product, please enter both the 
            first name and last name of the customer, or the product and then click the corresponding button
        </p>
        <p class="row">	<label for="search">Search: </label>
			<input type="text" name="search" id="search" /></p>
        <p><label for="display">Display:</label>
            <select name="display" id="display">
                <option value="allorder">All Orders</option>
                <option value="customerorder">Customer Orders</option>
                <option value="productorder">Product Orders</option>
                <option value="pendingorder">Pending Orders</option>
                <option value="costorder">Order by Total Cost</option>
            </select>
        </p>
        <input type="submit" value="Search"/>
    </fieldset>
    </form>
<?php
    // set all to if with no else and the add query free result and sql close
    // function sanitise_input($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }

    //sanitise input


    include 'settings.php';

    $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    );

    // if(!$conn) {
    //     echo "<p>Database connection failure</p>";
    // }
    $search = "";
    $display = "";
    if (isset ($_POST["display"])) {
        $display = $_POST["display"];
    }
    if (isset ($_POST["search"])) {
        $search = $_POST["search"];
    }

    //https://www.w3schools.com/php/php_switch.asp
    switch ($display) {
        case "allorder":

        $sql_table="orders";

        //$query = "select order_id, order_time, order_cost, firstname, lastname, order_status FROM orders ORDER BY order_number";
        $query = "select * FROM orders";
        if(!$conn) {
            echo "<p>Database connection failure</p>";
    }
        $result = mysqli_query($conn, $query);

        if(!$result) {
            echo "<p>Something is wrong with ", $query, "</p>";
        } else {
            echo "<table border=\"1\">\n";
            echo "<tr>\n "
                ."<th scope=\"col\">Order ID</th>\n "
                ."<th scope=\"col\">Order Time</th>\n "
                ."<th scope=\"col\">Bike</th>\n "
                ."<th scope=\"col\">Order Cost</th>\n "
                ."<th scope=\"col\">Firstname</th>\n "
                ."<th scope=\"col\">Lastname</th>\n "
                ."<th scope=\"col\">Order Status</th>\n "
                ."<th scope=\"col\">Delete</th>\n "
                ."</tr>\n ";
            while ($row = mysqli_fetch_assoc($result)) {
                 echo "<tr>\n ";
                echo "<td>",$row["order_id"],"</td>\n ";
                echo "<td>",$row["order_time"],"</td>\n ";
                echo "<td>",$row["bike"],"</td>\n ";
                echo "<td>",$row["order_cost"],"</td>\n ";
                echo "<td>",$row["firstname"],"</td>\n ";
                echo "<td>",$row["lastname"],"</td>\n ";
                echo "<td>",$row["order_status"],"</td>\n ";
                echo "<td><a href=\"delete.php?order_id=".$row['order_id']."\">Delete</a></td>";
                echo "</tr>\n ";
            }
            echo "</table>\n ";
            }
            break;
        case "customerorder":

            $sql_table="orders";

            $query = "select * FROM $sql_table where firstname like '$search%'  ORDER BY order_id DESC";

            $result = mysqli_query($conn, $query);

            if(!$result) {
                echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";          
            } else {
                echo "<table border=\"1\">\n";
                echo "<tr>\n "
                    ."<th scope=\"col\">Order ID</th>\n "
                    ."<th scope=\"col\">Order time</th>\n "
                    ."<th scope=\"col\">Bike</th>\n "
                    ."<th scope=\"col\">Order Cost</th>\n "
                    ."<th scope=\"col\">Firstname</th>\n "
                    ."<th scope=\"col\">Lastname</th>\n "
                    ."<th scope=\"col\">Order Status</th>\n "
                    ."<th scope=\"col\">Delete</th>\n "
                    ."</tr>\n ";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n ";
                    echo "<td>",$row["order_id"],"</td>\n ";
                    echo "<td>",$row["order_time"],"</td>\n ";
                    echo "<td>",$row["bike"],"</td>\n ";
                    echo "<td>",$row["order_cost"],"</td>\n ";
                    echo "<td>",$row["firstname"],"</td>\n ";
                    echo "<td>",$row["lastname"],"</td>\n ";
                    echo "<td>",$row["order_status"],"</td>\n ";
                    echo "<td><a href=\"delete.php?order_id=".$row['order_id']."\">Delete</a></td>";
                    echo "</tr>\n ";
                }
            echo "</table>\n ";
            }  
            break;
        case "productorder":   
            $sql_table="orders";

            $query = "select * from $sql_table where bike like '$search%'";

            $result = mysqli_query($conn, $query);

            if(!$result) {
                echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";          
            } else {
                echo "<table border=\"1\">\n";
                echo "<tr>\n "
                    ."<th scope=\"col\">Order ID</th>\n "
                    ."<th scope=\"col\">Order time</th>\n "
                    ."<th scope=\"col\">Bike</th>\n "
                    ."<th scope=\"col\">Order Cost</th>\n "
                    ."<th scope=\"col\">Firstname</th>\n "
                    ."<th scope=\"col\">Lastname</th>\n "
                    ."<th scope=\"col\">Order Status</th>\n "
                    ."<th scope=\"col\">Delete</th>\n "
                    ."</tr>\n ";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n ";
                    echo "<td>",$row["order_id"],"</td>\n ";
                    echo "<td>",$row["order_time"],"</td>\n ";
                    echo "<td>",$row["bike"],"</td>\n ";
                    echo "<td>",$row["order_cost"],"</td>\n ";
                    echo "<td>",$row["firstname"],"</td>\n ";
                    echo "<td>",$row["lastname"],"</td>\n ";
                    echo "<td>",$row["order_status"],"</td>\n ";
                    echo "<td><a href=\"delete.php?order_id=".$row['order_id']."\">Delete</a></td>";
                    echo "</tr>\n ";
                }
            echo "</table>\n ";
                }      
            break;
        case "pendingorder":
            $sql_table="orders";
            //searches for all orders that are pending (find out how to do this as it searches for all orders with an order status right now)
            $query = "select * FROM $sql_table WHERE order_status like '$search%' ORDER BY order_id DESC";

            $result = mysqli_query($conn, $query);

            if(!$result) {
                echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";          
            } else {
                echo "<table border=\"1\">\n";
                echo "<tr>\n "
                    ."<th scope=\"col\">Order id</th>\n "
                    ."<th scope=\"col\">Order time</th>\n "
                    ."<th scope=\"col\">Bike</th>\n "
                    ."<th scope=\"col\">Order Cost</th>\n "
                    ."<th scope=\"col\">Firstname</th>\n "
                    ."<th scope=\"col\">Lastname</th>\n "
                    ."<th scope=\"col\">Order Status</th>\n "
                    ."<th scope=\"col\">Delete</th>\n "
                    ."</tr>\n ";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n ";
                    echo "<td>",$row["order_id"],"</td>\n ";
                    echo "<td>",$row["order_time"],"</td>\n ";
                    echo "<td>",$row["bike"],"</td>\n ";
                    echo "<td>",$row["order_cost"],"</td>\n ";
                    echo "<td>",$row["firstname"],"</td>\n ";
                    echo "<td>",$row["lastname"],"</td>\n ";
                    echo "<td>",$row["order_status"],"</td>\n ";
                    echo "<td><a href=\"delete.php?order_id=".$row['order_id']."\">Delete</a></td>";
                    echo "</tr>\n ";
                }
            echo "</table>\n ";
            }  
            break;
        case "costorder":
            $sql_table="orders";

            $query = "select * FROM $sql_table ORDER BY order_cost DESC";

            $result = mysqli_query($conn, $query);

            if(!$result) {
                echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";          
            } else {
                echo "<table border=\"1\">\n";
                echo "<tr>\n "
                    ."<th scope=\"col\">Order id</th>\n "
                    ."<th scope=\"col\">Order time</th>\n "
                    ."<th scope=\"col\">Bike</th>\n "
                    ."<th scope=\"col\">Order Cost</th>\n "
                    ."<th scope=\"col\">Firstname</th>\n "
                    ."<th scope=\"col\">Lastname</th>\n "
                    ."<th scope=\"col\">Order Status</th>\n "
                    ."<th scope=\"col\">Delete</th>\n "
                    ."</tr>\n ";
                while ($row = mysqli_fetch_assoc($result)) {
                   // echo "<tr><form action="manager.php" method="post">\n ";
                    echo "<td>",$row["order_id"],"</td>\n ";
                    echo "<td>",$row["order_time"],"</td>\n ";
                    echo "<td>",$row["bike"],"</td>\n ";
                    echo "<td>",$row["order_cost"],"</td>\n ";
                    echo "<td>",$row["firstname"],"</td>\n ";
                    echo "<td>",$row["lastname"],"</td>\n ";
                    echo "<td>",$row["order_status"],"</td>\n ";
                    echo "<td><a href=\"delete.php?order_id=".$row['order_id']."\">Delete</a></td>";
                    //commented out above and below are same 
                    //echo "<td><select name='order_status' id='order_status' value='$row["order_status"]'><option value='pending'</td>\n ";
                    echo "</tr>\n ";
                }
            echo "</table>\n ";
            }
            break;
        }
            


    // if (isset($_POST['allorder'])) {
    //     //displays all orders

    //         $sql_table="orders";

    //         $query = "select order_id, order_time, order_cost, firstname, lastname, order_status FROM orders ORDER BY order_id";

    //         $result = mysqli_query($conn, $query);

    //         if(!$result) {
    //             echo "<p>Something is wrong with ", $query, "</p>";
    //         } else {
    //             echo "<table border=\"1\">\n";
    //             echo "<tr>\n "
    //                 ."<th scope=\"col\">Order id</th>\n "
    //                 ."<th scope=\"col\">Order time</th>\n "
    //                 ."<th scope=\"col\"Bike</th>\n "
    //                 ."<th scope=\"col\">Order Cost</th>\n "
    //                 ."<th scope=\"col\">Firstname</th>\n "
    //                 ."<th scope=\"col\">Lastname</th>\n "
    //                 ."<th scope=\"col\">Order Status</th>\n "
    //                 ."</tr>\n ";
    //             while ($row = mysqli_fetch_assoc($result)) {
    //                 echo "<tr>\n ";
    //                 echo "<td>",$row["order_id"],"</td>\n ";
    //                 echo "<td>",$row["order_time"],"</td>\n ";
    //                 echo "<td>",$row["bike"],"</td>\n ";
    //                 echo "<td>",$row["order_cost"],"</td>\n ";
    //                 echo "<td>",$row["firstname"],"</td>\n ";
    //                 echo "<td>",$row["lastname"],"</td>\n ";
    //                 echo "<td>",$row["order_status"],"</td>\n ";
    //                 echo "</tr>\n ";
    //             }
    //             echo "</table>\n ";


    //         }
    //     }
    // } else if (isset($_POST['customerorder'])) {
    //     //displays a customers orders
    //     $sql_table="orders";

    //     $query = "select * FROM $sql_table where firstname like '$firstname%' and lastname like '$lastname%' ORDER BY order_id DESC";

    //         $result = mysqli_query($conn, $query);

    //         if(!$result) {
    //             echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";          
    //         } else {
    //             echo "<table border=\"1\">\n";
    //             echo "<tr>\n "
    //                 ."<th scope=\"col\">Order id</th>\n "
    //                 ."<th scope=\"col\">Order time</th>\n "
    //                 ."<th scope=\"col\"Bike</th>\n "
    //                 ."<th scope=\"col\">Order Cost</th>\n "
    //                 ."<th scope=\"col\">Firstname</th>\n "
    //                 ."<th scope=\"col\">Lastname</th>\n "
    //                 ."<th scope=\"col\">Order Status</th>\n "
    //                 ."</tr>\n ";
    //             while ($row = mysqli_fetch_assoc($result)) {
    //                 echo "<tr>\n ";
    //                 echo "<td>",$row["order_id"],"</td>\n ";
    //                 echo "<td>",$row["order_time"],"</td>\n ";
    //                 echo "<td>",$row["bike"],"</td>\n ";
    //                 echo "<td>",$row["order_cost"],"</td>\n ";
    //                 echo "<td>",$row["firstname"],"</td>\n ";
    //                 echo "<td>",$row["lastname"],"</td>\n ";
    //                 echo "<td>",$row["order_status"],"</td>\n ";
    //                 echo "</tr>\n ";
    //             }
    //         echo "</table>\n ";
    //         }           
    // } else if (isset($_POST['productorder'])) {
    //     //displays the orders of a product
    //         $sql_table="orders";

    //         $query = "select * from $sql_table where bike like '$bike%'";

    //         $result = mysqli_query($conn, $query);

    //         if(!$result) {
    //             echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";          
    //         } else {
    //             echo "<table border=\"1\">\n";
    //             echo "<tr>\n "
    //                 ."<th scope=\"col\">Order id</th>\n "
    //                 ."<th scope=\"col\">Order time</th>\n "
    //                 ."<th scope=\"col\"Bike</th>\n "
    //                 ."<th scope=\"col\">Order Cost</th>\n "
    //                 ."<th scope=\"col\">Firstname</th>\n "
    //                 ."<th scope=\"col\">Lastname</th>\n "
    //                 ."<th scope=\"col\">Order Status</th>\n "
    //                 ."</tr>\n ";
    //             while ($row = mysqli_fetch_assoc($result)) {
    //                 echo "<tr>\n ";
    //                 echo "<td>",$row["order_id"],"</td>\n ";
    //                 echo "<td>",$row["order_time"],"</td>\n ";
    //                 echo "<td>",$row["bike"],"</td>\n ";
    //                 echo "<td>",$row["order_cost"],"</td>\n ";
    //                 echo "<td>",$row["firstname"],"</td>\n ";
    //                 echo "<td>",$row["lastname"],"</td>\n ";
    //                 echo "<td>",$row["order_status"],"</td>\n ";
    //                 echo "</tr>\n ";
    //             }
    //         echo "</table>\n ";
    //         }    
    // } else if (isset($_POST['pendingorder'])) { 
    //         //searches for orders that are pending, not finished
    //         $sql_table="orders";
    //         //searches for all orders that are pending (find out how to do this as it searches for all orders with an order status right now)
    //         $query = "select * FROM $sql_table WHERE order_status like '$order_status%' ORDER BY order_id DESC";

    //         $result = mysqli_query($conn, $query);

    //         if(!$result) {
    //             echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";          
    //         } else {
    //             echo "<table border=\"1\">\n";
    //             echo "<tr>\n "
    //                 ."<th scope=\"col\">Order id</th>\n "
    //                 ."<th scope=\"col\">Order time</th>\n "
    //                 ."<th scope=\"col\"Bike</th>\n "
    //                 ."<th scope=\"col\">Order Cost</th>\n "
    //                 ."<th scope=\"col\">Firstname</th>\n "
    //                 ."<th scope=\"col\">Lastname</th>\n "
    //                 ."<th scope=\"col\">Order Status</th>\n "
    //                 ."</tr>\n ";
    //             while ($row = mysqli_fetch_assoc($result)) {
    //                 echo "<tr>\n ";
    //                 echo "<td>",$row["order_id"],"</td>\n ";
    //                 echo "<td>",$row["order_time"],"</td>\n ";
    //                 echo "<td>",$row["bike"],"</td>\n ";
    //                 echo "<td>",$row["order_cost"],"</td>\n ";
    //                 echo "<td>",$row["firstname"],"</td>\n ";
    //                 echo "<td>",$row["lastname"],"</td>\n ";
    //                 echo "<td>",$row["order_status"],"</td>\n ";
    //                 echo "</tr>\n ";
    //             }
    //         echo "</table>\n ";
    //         }  
    //     //sorts table by cost
    //     //http://stackoverflow.com/questions/20376315/php-sorting-database-items-with-order-by-query-mysql
    // } else if (isset($_POST['costorder'])) { 

    //         $sql_table="orders";

    //         $query = "select * FROM $sql_table ORDER BY order_cost DESC";

    //         $result = mysqli_query($conn, $query);

    //         if(!$result) {
    //             echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";          
    //         } else {
    //             echo "<table border=\"1\">\n";
    //             echo "<tr>\n "
    //                 ."<th scope=\"col\">Order id</th>\n "
    //                 ."<th scope=\"col\">Order time</th>\n "
    //                 ."<th scope=\"col\"Bike</th>\n "
    //                 ."<th scope=\"col\">Order Cost</th>\n "
    //                 ."<th scope=\"col\">Firstname</th>\n "
    //                 ."<th scope=\"col\">Lastname</th>\n "
    //                 ."<th scope=\"col\">Order Status</th>\n "
    //                 ."</tr>\n ";
    //             while ($row = mysqli_fetch_assoc($result)) {
    //                // echo "<tr><form action="manager.php" method="post">\n ";
    //                 echo "<td>",$row["order_id"],"</td>\n ";
    //                 echo "<td>",$row["order_time"],"</td>\n ";
    //                 echo "<td>",$row["bike"],"</td>\n ";
    //                 echo "<td>",$row["order_cost"],"</td>\n ";
    //                 echo "<td>",$row["firstname"],"</td>\n ";
    //                 echo "<td>",$row["lastname"],"</td>\n ";
    //                 echo "<td>",$row["order_status"],"</td>\n ";
    //                 //commented out above and below are same 
    //                 //echo "<td><select name='order_status' id='order_status' value='$row["order_status"]'><option value='pending'</td>\n ";
    //                 echo "</tr>\n ";
    //             }
    //         echo "</table>\n ";
    //         }
    //     }
    // $firstname = sanitise_input($firstname);
    // $lastname = sanitise_input($lastname);
    // $product = sanitise_input($product);
     include 'footer.inc'; 
?> 
</body>
</html>