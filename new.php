<?php
$con = mysql_connect("localhost","","");
if (!$con)
{

  die('Could not connect: ' . mysql_error());
}
$db="test";
mysql_select_db($db, $con);
$name=$_POST['search'];
//echo $name;
$c=3;
$sql="select count from avail where book_name='$name' or author='$name'";
 
$conn=mysql_query($sql,$con);
 
while ($row = mysql_fetch_object($conn)) {
    $a=$row->count;
	$a=$a+1;
	$s="update avail set count='$a' where book_name='$name' or author='$name'";
	$cone=mysql_query($s,$con);
	echo "<script type='text/javascript'>
                alert('you have returned the book');
            </script>";
	echo "Thank You";
}
 
mysql_close($con)

?>
