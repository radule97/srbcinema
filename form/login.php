<?php
require ("../class/Sql.php");
if(isset($_POST['username']) and isset($_POST['password']))
{
    if($_POST['username']=="" or $_POST['password']=="")
    {
        echo "Niste uneli potrebne podatke";
        die();
    }
    else
    {
        $sql = new Sql();
        $connection = $sql->getConn();
        $username = \mysqli_real_escape_string($connection, $_POST['username']);

        $q = "SELECT * FROM users WHERE username = '".$username."' LIMIT 1";
        $result = mysqli_query($connection, $q);
        if(!$result || mysqli_num_rows($result)==0)
        {
            echo "Username or Password is not match!";
            die();
        }
        else
        {
            $password = $_POST['password'];
            $obj = mysqli_fetch_object($result);
            if (password_verify($password, $obj->password)) {
                /* Valid */
                session_start();
                $_SESSION['user'] = $obj;
                header("Location: ../admin/index.php");
            } else {
                /* Invalid */
                echo "Username or Password is not match!";
                die();
            }

        }
    }
} else {
    $action = htmlspecialchars($_SERVER["PHP_SELF"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    
    <?php require("../temp/head_temp.php"); ?>
   
</head>

<body>

    <!-- Navigation -->
    <?php
        require ("../temp/nav_temp.php");
	?>
	

	<div class="container" >
			<div class="row main">
			
				<div class="main-login main-center col-sm-6 col-lg-6 col-md-6 col-lg-offset-3 col-sm-offset-3 col-md-offset-3">
				<div id="formdivl">
				<h2 id="loginheader">Please Login to SRBCinema:</h2>
					<form class="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" target="_self">

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa iconcolor" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg iconcolor" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>


						<div class="form-group ">
							<button type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button">Login</button>
						</div>
						<p class="loginp">Don't have account? Please <a href="form/register.php">Register</a> before Login.</p>
					</form>
				</div>
			</div>
			</div>
		</div>




	<!-- Footer -->




    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>

</html>
<?php

}
?>
