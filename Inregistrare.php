<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Login.css">
	<title>Inregistrare</title>
</head>
<body align="center">
<form action="Inregistrare.php" method="post">
		<pre class="text">Introduceti mai jos login-ul dorit</pre>
		<br>
		<input type="text" name="text1" size="20" class="input_text">
		<br>
		<pre class="text">Introduceti mai jos password-ul dorit</pre>
		<br>
		<input type="text" name="text2" size="20" class="input_text">
		<br>
		<input type="submit" name="input" value="Inregistreaza-te" class="input_submit">
		<br>
	</form>
</body>
</html>

<?php  

if (!(isset($_POST['text1'])) || !(isset($_POST['text2'])))
{
	$login = '-';
	$password = '-';
} 
else 
{
	$login = $_POST['text1'];
	$password = $_POST['text2'];
}

if ($login != "-" && $password != "-")
{
	$conn = new mysqli('localhost', 'root', '', 'fastConfig');

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT Login FROM logins Where Login = '$login'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo "<script>
				window.open('Inregistrare.php', '_self');
				window.alert('Un asemenea utilizator deja exista')
			  </script>";
	} else {
		echo "
	    <script>
	    	window.open('Main.php', '_self');
	    </script>";

	    $sql = "INSERT Into logins(Login, Parola) Values ('$login', '$password');";
		$result = mysqli_query($conn, $sql);


		echo "
	    <script>
	    	window.alert('Ati fost inregistrat cu success');
	    </script>";

	}
}

?>