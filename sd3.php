<html>
<?php
extract($_POST);
       $query="select * from login where name='".$name."' and password='".$pass."'";
       if (!( $database = mysql_connect( "localhost", "root", "" ) ) )
            die( "Could not connect to database" );

        // open Products database
         if ( !mysql_select_db( "test", $database ) )
            die( "Could not open Products database" );
      
         if ( !( $result = mysql_query( $query, $database ) ) )
       {
            print( "Could not execute query! <br />" );
            die( mysql_error() );
        }
		$i=0; 
            // fetch each record in result sett
            for ( $counter = 0;$row = mysql_fetch_row( $result ); $counter++ )
           {
               foreach ( $row as $key => $value ) 
               {

                  if($i==0)
                  print( "The name is $value" );
                  else
                  print(" and password is  $value");
 
                 $i+=1;

              }
            }
			
			if($i > 0){
		
		echo "<script> window.location.assign('new2.html'); </script>";
	}
	else{
		echo "<script type='text/javascript'>alert('failed!')</script>";
	}
			
			
			
			
			
			
            mysql_close( $database );
?>
</html>