<?php
/*
  @author: Shahrukh Khan
  @website: http://www.thesoftwareguy.in
  @facebook fanpage: https://www.facebook.com/Thesoftwareguy7
 */
error_reporting(E_ALL & ~E_NOTICE);
@ini_set('post_max_size', '64M');
@ini_set('upload_max_filesize', '64M');

/* * *********************************************** */
// database constants
define('DB_DRIVER', 'mysql');
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'image_test');

$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
  $DB = new PDO(DB_DRIVER . ':host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, $dboptions);
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="php, mysql, thumbnail,upload image, check mime type">
    <title>Upload multiple images </title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <style>
      .files{height: 30px; margin: 10px 10px 0 0;width: 250px; }
      .add{ font-size: 14px; color: #EB028F; border: none; }
      .rem a{ font-size: 14px; color: #f00; border: none; }
      .submit{width: 110px; height: 30px; background: #6D37B0; color: #fff;text-align: center;}
    </style>
    <script language="javascript" type="text/javascript">
window.onload = function () {
    var fileUpload = document.getElementById("fileupload");
    fileUpload.onchange = function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = document.getElementById("dvPreview");
            dvPreview.innerHTML = "";
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            for (var i = 0; i < fileUpload.files.length; i++) {
                var file = fileUpload.files[i];
                if (regex.test(file.name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = document.createElement("IMG");
                        img.height = "100";
                        img.width = "100";
                        img.src = e.target.result;
                        dvPreview.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                } else {
                    alert(file.name + " is not a valid image file.");
                    dvPreview.innerHTML = "";
                    return false;
                }
            }
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    }
};
</script>
  </head>
  <body>
    <div id="container">
      <div id="body">
        <div class="mainTitle" >Upload images</div>
        <div class="height20"></div>
        <article>
          <?php echo $msg; ?>
          <div class="height20"></div>
          <div style="width: 380px; margin: 0 auto;">
            <h3 style="text-align: center;">Image will be resized to 100px X 100px </h3>
            <form name="f1" action="upload.php" method="post" enctype="multipart/form-data">            
              <fieldset>
                <legend>Demo1</legend>
                Attach multiple Files:
		  <input type="file" name="files[]" multiple ><br><br><div class="height10"></div>
                               <div></div>
              </fieldset> 
            	</br>
		Enter the name of the Event:
		<input type="text" name="fname" required/>
		</br>
		</br>
		Enter the Venue of the Event:
		<input type="text" name="lname" required/>
		</br>
		</br>
		Enter the Cheif Guest of the Event:
		<input type="text" name="guest"/>
		</br>
		</br>
		Enter the department that conduct the Event:
		<select name="aa" id="dropdownlist" onchange()=fun() >
			<option value="Default">Default</option>
			<option value="Mech">Mech</option>
			<option value="EEE">EEE</option>
			<option value="ECE">ECE</option>
			<option value="CSE">CSE</option>
			<option value="IT">IT</option>
			<option value="FT">FT</option>
			<option value="other">others</option>
		</select>
		</br>
		</br>
		Enter the coordinatoors of the Event: 
		<input type="text" name="Coordinators"/>
		</br>
		</br>
		<input type="submit" name="submit" value="UPLOAD"/>
		</form>
            <div style="width: 380px; margin: 0 auto;">
                          </div>
          </div>
          
          <div class="height10"></div>
        </article>
          </div>
	<hr />
<b>Live Preview</b>
<br />
<br />
<div id="dvPreview">
</div>
</body>
</html>
<?php

function errorMessage($str) {
  return '<div style="width:50%; margin:0 auto; border:2px solid #F00;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function successMessage($str) {
  return '<div style="width:50%; margin:0 auto; border:2px solid #06C;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}
?>