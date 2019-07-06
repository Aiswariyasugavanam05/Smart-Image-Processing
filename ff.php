<html>
<body>
<?php
$con = mysql_connect("localhost","","");
if (!$con)
{

  die('Could not connect: ' . mysql_error());
}
mysql_select_db("test", $con);





$UploadedFileName=$_FILES['img']['name'];
if($UploadedFileName!='')
{
  $upload_directory = "img/"; //This is the folder which you created just now
  $TargetPath=time().$UploadedFileName;
/*  if(move_uploaded_file($_FILES['files']['tmp_name'], $upload_directory.$TargetPath)){    
   

// $QueryInsertFile="INSERT INTO TableName SET ImageColumnName='$TargetPath'"; 
    // Write Mysql Query Here to insert this $QueryInsertFile   .                   
  
$TargetPath=msql_real_escape_string($TargetPath);
*/
$sql="INSERT INTO logs(name, venue,gname,department,coordinators,img)

VALUES

('$_POST[fname]','$_POST[lname]','$_POST[guest]','$_POST[aa]','$_POST[Coordinators]','$UploadedFileName')";

 if (!mysql_query($sql,$con))

  {

  die('Error: ' . mysql_error());

  }

echo '<a href="C:\\wamp\\www\\new2.html">Please Click Here to Search Again</a>';
  }

mysql_close($con);

?>

</body>

</html>

