<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Login.css">
	<title>FastConfig</title>
</head>
<body align="center">
<div>
	<pre class="title">FastConfig</pre>
	<hr>
</div>
<div>
	<form action="Logare.php" method="post">
		<pre class="text">Login</pre>
		<br>
		<input type="text" name="text1" size="20" class="input_text">
		<br>
		<pre class="text">Password</pre>
		<br>
		<input type="text" name="text2" size="20" class="input_text">
		<br>
		<input type="submit" name="input" value="Enter" class="input_submit">
		<br>
	</form>	
</div>
<div>
	<form action="Inregistrare.php" method="post">
		<input type="submit" name="input" value="Inregistrare" class="input_submit2">
	</form>
</div>
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
	$conn = new mysqli('localhost', 'root', '', 'FastConfig');

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT Login,Parola FROM Logins Where Login = '$login' && Parola = '$password'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo "<script>
				window.open('Main.php', '_self');
			  </script>";
	    // while($row = mysqli_fetch_assoc($result)) {
	    //     echo "Login: " . $row["Login"]. "<br>". "Password: " . $row["Parola"];
	    //}

	} else {
		echo "
	    <script>
	    	window.open('Logare.php', '_self')
	    	window.alert('Login sau parola incorecta');
	    </script>";
	}
}

// $sql = "SELECT pret FROM Mihaela Where produs = '$select2'";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//         echo "<h4>" . $row["pret"] * $number2 . " lei</h4><br>";
//         $suma = $suma + $row["pret"] * $number2;
//     }
// }
?>

</body>
</html>