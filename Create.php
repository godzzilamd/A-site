<!DOCTYPE html>
<html lang="en" class="gr__getbootstrap_com">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Badrajan Alen, Damaschin Mihai">
    <title>Configer</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    <link rel="stylesheet" href="public/assets/css/main.css">
    <!-- <link rel="stylesheet" href="/css/main.css"> -->

</head>

<body data-gr-c-s-loaded="true">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="Main.php">
                    Config-it Mikrotik
            </a>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <div class="input-group col-lg-4">
                </div>
                <div class="ml-auto">
                    <a class="navbar-brand col-lg-3" href="Cabinet.php" role="button">
                            <img src="public/assets/imgs/icons8-customer-50.png" width="30" height="30">
                    </a>
                    <a class="navbar-brand col-lg-3" href="Logare.php" role="button">
                        <img src="public/assets/imgs/icons8-exit-50.png" width="30" height="30">
                    </a>

                </div>
            </div>
        </nav>
    <br>
    <br>
    <br>
    <br>
    <form action="Create.php" method="post">
  <div class="form-group">
    <h2>Adresa Ip Locala</h2>
    <input type="text" name="staticIp" class="form-control" id="staticIp" aria-describedby="emailHelp" placeholder="Adresa Ip Locala Statica">
    <hr>
    <input type="text" name="manualIp" class="form-control" id="manualIp" aria-describedby="emailHelp" placeholder="Adresa Ip Locala Manuala">
    <input type="text" name="gateway" class="form-control" id="gateway" aria-describedby="emailHelp" placeholder="Gateway-ul">
    <input type="text" name="netmask" class="form-control" id="netmask" aria-describedby="emailHelp" placeholder="Masca de retea">
    <small id="emailHelp" class="form-text text-muted">Introduceti toate campurile doar dintr-o sectiune (statica/manuala)</small>
  </div>
  <div class="form-group">
    <h2>Numele retelei</h2>
    <input type="text" name="networkName" class="form-control" id="exampleInputPassword1" placeholder="Numele Retelei">
    <small id="emailHelp" class="form-text text-muted">NB! : Numele retelei va fi configurat ca si numele wireless si hostname</small>

  </div>
  <div class="form-group">
    <h2>Login & Parola </h2>
    <input type="text"      name="routerLogin" class="form-control" id="exampleInputPassword1" placeholder="Loginul routerului">
    <input type="password"  name="routerPass" class="form-control" id="exampleInputPassword1" placeholder="Parola routerului">
  </div>
  <div class="form-group">
    <h2> Parola  Wifi</h2>
    <input type="password"  name="wifiPass" class="form-control" id="exampleInputPassword1" placeholder="Parola Wifi">
  </div>
  <button type="submit" name="generate" class="btn btn-primary">Genereaza</button>
  
  <button type="submit" class="btn btn-secondary"><a href="CreateAvansat.php"> Avansat</a></button>

</form>
    </div>
    
</body>
</html>


<?php
	$conn = new mysqli('localhost', 'root', '', 'fastConfig');

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
    }
    
    if(isset($_POST['generate'])) {
        $staticIp = $_POST['staticIp'];

        $manualIp = $_POST['manualIp'];
        $gateway = $_POST['gateway'];
        $netmask = $_POST['netmask'];

        $networkName = $_POST['networkName'];

        $routerLogin = $_POST['routerLogin'];
        $routerPass = $_POST['routerPass'];

        $wifiPass = $_POST['wifiPass'];
        if ($staticIp && $manualIp || $staticIp && $gateway || $staticIp && $netmask) {
            echo "
            <script>
                window.alert('Alegeti doar un Ip static sau un Ip manual');
            </script>";
            exit();
        } else {
            $final_str = '';
            //IP
            if ($staticIp && !$manualIp) {
                $final_str .= 'ip address add address="' . $staticIp .'" interface=ether2;<br>';
            } elseif (!$staticIp && $manualIp) {
                $final_str .= 'ip address add address="' . $manualIp .'" netmask '. $netmask .' interface=ether2;<br>' ;
                $final_str .= 'ip route add gateway=' . $gateway .';<br>';
                // $final_str .= 'wangateway "' . $gateway .'";\n';
            }
            
            //Numele retelei
            $final_str .= 'system identity set name=' . $networkName . ';<br>';

            //Loghinul si parola 
            $final_str .= 'user add name=' . $routerLogin . ' password="' . $routerPass. '" group=full' . '";<br>';
            $final_str .= 'user set ' . $routerLogin .' password="' . $routerPass. '";<br>';

            //wifi pass
            // ??? TODO: ???
            

            echo '<hr>' . $final_str;
            
        }

    }

?>