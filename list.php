<?php


        try{
    $pdo = new PDO("mysql:host=localhost;dbname=db_test", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
} 



if(isset($_REQUEST["id"]))
{
  $id = $_REQUEST["id"];
  
  $str ="delete from student where user_id='$id'  ";
  
   $pdo->exec($str);
  
}




$str = "select * from student";

   $result = $pdo->query($str);



//$result = mysql_query( $str);
//object





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
	
}
</style>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>



<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->

<meta name="viewport" content="width=device-width, initial-scale=1">



</head>

<body>

<div class="container">
  <form method="post">
  
  
  <a href="insert.php">
  
   <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Add</button>
  
  </a>
  
  
  <table border="1">
    <tr>
       <th> UserId</th>
       <th>FirstName</th>
	    <th>LastName</th>
		 <th>City</th>
       <th> Delete</th>
	    <th> Edit</th>
    </tr>
    
    
    <?php
	   while($row = $result->fetch())
	  {
	?>
    <tr>
      <td> <?php echo $row["user_id"] ?> </td>
      <td> <?php echo $row["first_name"] ?> </td>
	   <td> <?php echo $row["last_name"] ?> </td>
	  <td> <?php echo $row["user_city"] ?> </td>
	 
      <td> <a class="glyphicon glyphicon-trash" href="list.php?id=<?php echo $row["user_id"] ?>"></a> </td>
	  
	  <td> <a class="glyphicon glyphicon-edit" href="edit.php?id=<?php echo $row["user_id"] ?>"></a> </td>
      
    </tr>
    <?php
	}
	?>
  </table>
  </form>
</div>



</body>
</html>
