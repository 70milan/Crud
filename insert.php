


<?php

if( isset($_REQUEST['btnSubmit'] ))
{

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=db_test", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt insert query execution
try{


    $txtfname = $_REQUEST['txtfname'];
 $txtlname = $_REQUEST['txtlname'];
 $txtcity    = $_REQUEST['txtcity']; 
 

 $sql = "Insert into student(first_name,last_name,user_city)values('$txtfname','$txtlname','$txtcity')";
	
	 
    $pdo->exec($sql);
    echo "Records inserted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>


<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/bootstrap.min.css">




</head>

<body>

<div class="container">

 <a href="list.php">
  
   <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span>List</button>
  
  </a>


<form class="form-horizontal" method="post">


<div class="form-group">
      <label class="control-label col-sm-2">FirstName:</label>
     
	  <div class="col-sm-10">
        <input required type="text" class="form-control"  name="txtfname">
      </div>
	  
 </div>
 
 
 <div class="form-group">
      <label class="control-label col-sm-2">LastName:</label>
     
	  <div class="col-sm-10">
        <input required type="text" class="form-control"  name="txtlname">
      </div>
	  
 </div>
 
 
 <div class="form-group">
      <label class="control-label col-sm-2">City:</label>
     
	  <div class="col-sm-10">
        <input required type="text" class="form-control"  name="txtcity">
      </div>
	  
 </div>
 



<div class="form-group">
      
     
	  <div class="col-sm-offset-2 col-sm-10">
        <input class="btn btn-primary" type="submit" name="btnSubmit" value="Register" />
      </div>
	  
 </div>

</form>




</div>












</body>
</html>
