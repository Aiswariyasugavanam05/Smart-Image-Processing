<html>
<head>
<head>
<body>
	<form action="ff.php" method="POST">
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
		<input type="submit" value="Submit"/>
	</body>