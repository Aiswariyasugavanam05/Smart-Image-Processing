<html>
<head>
<style>
.hi{
width:1350px;
border:2px solid blue;
padding:10px;
margin:10px;}
img{
width:230px;
border:5px solid blue;
padding:10px;
margin:10px;
}
</style>
<body>
<div class="hi">
<?php
   $dbhost = 'localhost';
   $dbuser = '';
   $dbpass = '';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   $name=$_POST['search_entered'];
   $name=strtoupper($name);
   $sql = "SELECT * FROM logs where event LIKE '$name%' or venue LIKE '$name%' or guest LIKE '$name%'  or dept LIKE '$name%' or coordinators LIKE'$name%'";
     //$sql = "SELECT * FROM logs where name LIKE '$name%'"; 
   mysql_select_db('test');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   //$dir="uploads/"
    while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
      //echo '<img src="{$row['img']}" width="200" height="200" />';
	echo "<img src=\"uploads/".$row['file_name']."\" width=200 height=200>";
   }
  
   //echo "Fetched data successfully\n";
   
   mysql_close($conn);
?>
</div>
</body>
</html>
