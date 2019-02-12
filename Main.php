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
    <!-- <link rel="stylesheet" href="public/assets/css/auth.css"> -->
    <!-- <link rel="stylesheet" href="/css/main.css"> -->

<!-- <script type="text/javascript">
    function OpenCreate()
    {
        $selected = $_POST['selected'];

        if ($selected == 'Mikrotik') {window.open('Create.php', '_self');}
            else {window.open('CreateCisco.php', '_self');}
    }
</script>
 -->

</head>

<body data-gr-c-s-loaded="true">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">
                    Config-it
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
        <div class="row">
            <div class="col-lg-12">
				<div class="form-group">
					<p class="text-dark text-center display-4">Create a config for:
					<form action="Main.php" method="post">
					<select class="form-control" id="exampleFormControlSelect1" name="selected">
					<option value="Mikrotik">Mikrotik</option>	
					<option value="Cisco">Cisco</option>
					</select>
					</p>
				</div>
            </div>
			<div class="col text-center">
			         <input type="submit" class="btn btn-primary col-lg-3" value="Create">
                </form>
			</div>
        </div>
<?php  
error_reporting(0);
    $selected = $_POST['selected'];

    if ($selected == 'Mikrotik') {
                echo "<script>
                        window.open('Create.php', '_self');
                      </script>";}
                elseif ($selected == 'Cisco') {
                    echo "<script>
                           window.open('CreateCisco.php', '_self');
                        </script>";}
?>
</body>
</html>