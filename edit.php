<?php





if( isset($_REQUEST['btnSubmit'] ))
{
    $id = $_REQUEST["id"];

    
	try
	{
    $pdo = new PDO("mysql:host=localhost;dbname=db_test", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e)
    {
    die("ERROR: Could not connect. " . $e->getMessage());
    }
	
	

 $txtfname = $_REQUEST['txtfname'];
 $txtlname = $_REQUEST['txtlname'];
 $txtcity    = $_REQUEST['txtcity']; 
 

 $sql = "update  student set first_name='$txtfname',last_name='$txtlname',user_city='$txtcity' where user_id='$id'";

 //echo $sql;

     $pdo->exec($sql);
	 
	  header("location:list.php");

}


    try{
    $pdo = new PDO("mysql:host=localhost;dbname=db_test", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
} 

 $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : '' ;
$str1 = "select * from student where user_id='$id'";

   $result1 = $pdo->query($str1);
   //$row = mysql_fetch_array($result1);
    $row = $result1->fetch()


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


<form class="form-horizontal" method="post">


<div class="form-group">
      <label class="control-label col-sm-2">FirstName:</label>
     
	  <div class="col-sm-10">
        <input required value="<?php echo $row["first_name"] ?>" type="text" class="form-control"  name="txtfname">
      </div>
	  
 </div>
 
 
 <div class="form-group">
      <label class="control-label col-sm-2">LastName:</label>
     
	  <div class="col-sm-10">
        <input required value="<?php echo $row["last_name"] ?>" type="text" class="form-control"  name="txtlname">
      </div>
	  
 </div>
 
 
 <div class="form-group">
      <label class="control-label col-sm-2">City:</label>
     
	  <div class="col-sm-10">
        <input required value="<?php echo $row["user_city"] ?>" type="text" class="form-control"  name="txtcity">
      </div>
	  
 </div>
 



<div class="form-group">
      
     
	  <div class="col-sm-offset-2 col-sm-10">
        <input  class="btn btn-primary" type="submit" name="btnSubmit" value="Update" />
      </div>
	  
 </div>

</form>




</div>












</body>
</html>
