
<?php
//http://findnerd.com/list/view/How-to-sort-column-by-clicking-on-column-header-iin-PHP/15952/
//provides ability to select a column heading and resort table in order.
    include 'settings.php';

$conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    );
// Check connection
if(!$conn) {
        echo "<p>Database connection failure</p>";
} else {

    
    $action = '';    
    $sql = "SELECT * from employee";
    $where = '';
    if(isset($_GET["id"]))
    {
    
        $id     = $_GET["id"];   //geting id value which we are passing from table headers
        $action = $_GET["action"]; // geting action value which we are passing from table headers
    
        //we are checking condition if $action value is ASC then $action will set to DESC otherwise it will remain ASC
        if($action == 'ASC')
        { 
            $action='DESC';
        }
     else  
     { 
        $action='ASC';
     }
    if($_GET['id']=='id') 
    {
        $id = "e_id";
    }
    elseif($_GET['id']=='name') 
    {
        $id = "name";
    }
    elseif($_GET['id']=='department') 
    {
        $id="department";
    }
    elseif($_GET['id']=='salary') 
    {
        $id="salary";
    }
        $where = " ORDER BY  $id $action ";
        $sql = "SELECT * FROM employee " . $where;
    }
   
?>
<html>
<body>
        
    <table>
        <tr>
          //on click on <th> tag we are passing id and action values
        <th><a href="employee_record.php?id=<?php echo 'id';?>&action=<?php echo $action;?>">ID</a></th>
        <th><a href="employee_record.php?id=<?php echo 'name';?>&action=<?php echo $action;?>">NAME</a></th>
        <th><a href="employee_record.php?id=<?php echo 'department';?>&action=<?php echo $action;?>">DEPARTMENT</a></th>
        <th><a href="employee_record.php?id=<?php echo 'salary';?>&action=<?php echo $action;?>">SALARY</a></th>
    </tr>
    
<?php
$result = $conn->query($sql);
if ($result->num_rows > 0) { 
  
// Fetch a result row as an associative array
     while($row = $result->fetch_assoc()) { ?>
          <tr>
             <td><?php echo $row["e_id"];?></td>
             <td><?php echo $row["name"];?></td>
             <td><?php echo $row["department"];?></td>
             <td><?php echo "$".$row["salary"];?></td>
         </tr> 
        
<?php 
        
     }
         echo '</table>';
         echo '</div>';
     } 
     else 
     {
       echo "0 results";
     }
           
$conn->close();
?>
</body>
</html>