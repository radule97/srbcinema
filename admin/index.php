<!DOCTYPE html>
<html lang="en">

<head>

	<?php
	require ("../temp/head_temp.php");
    require("../class/Sql.php");
	?>

</head>

<body>
<?php
session_start();
$user = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
if ($user) {
   $welcomeMessage = "Welcome {$user->username}" ;
} else {
    header("Location: ../form/login.php");
}
?>
    <!-- Navigation -->
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand img-responsive" href="index.php"><img height="20" width="150" src="./img/srbcinema.png"></a>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav">
                    <li>
                        <a href="admin/insert_movie.php">Insert Movie</a>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="form/Logout.php">Logout</a>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container" style="padding: 0;">

        <?php echo $welcomeMessage; ?>

        <h2>WELCOME TO ADMINISTRATOR PANEL</h2>
        <p>Be careful with inserting, updateing and deleting articles!</p>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
