<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require("../class/Sql.php");
    require("../class/File.php");
    ?>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <?php
    require("../temp/head_temp.php");
    ?>
</head>

<body>

    <!-- Navigation -->
    <?php
    require ("../temp/nav_temp.php");
    ?>
	

	<div class="container" >
			<div class="row main">
			
				<div class="main-login main-center col-sm-6 col-lg-6 col-md-6 col-lg-offset-3 col-sm-offset-3 col-md-offset-3">
				<div id="formdiv">
				<h2 id="loginheader">Please Register to stepheN:</h2>
                    <?php if (empty($_POST)) { ?>
                    <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
						
						<div class="form-group">
							<label for="firstname" class="cols-sm-2 control-label">First Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa iconcolor" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="firstname" id="firstname"  placeholder="Enter your First Name"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="cols-sm-2 control-label">Last Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa iconcolor" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter your Last Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa iconcolor" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

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

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg iconcolor" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm_password" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>
                        <div class="form-group">
                            <label for="image" class="control-label">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image">
                                <span class="custom-file-control"></span>
                            </div>
                        </div>


                        <div class="form-group ">
                            <button type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button">Register</button>
                        </div>
						<p class="registerp">Alredy have account? Go to <a href="form/login.php">Login</a>.</p>
					</form>
                    <?php }
                    else
                    {


                        $sql = new Sql();
                        if (count($sql->findByColumnName('username',$_POST['username'], 'users' )) > 0)
                        {
                             echo "<h1> User {$_POST['username']} already exists</h1>";
                        }
                        else if ($_POST['password'] !== $_POST['confirm_password'])
                        {
                            echo "<h1>Passwords do not match</h1>";
                        }
                        else
                        {
                            $image = new File();
                            $imagePath = $image->upload('image', '../uploads/');
                            $hash = password_hash( $_POST['password'], PASSWORD_BCRYPT);
                            $data = array(
                                'firstname' => $_POST['firstname'],
                                'lastname' => $_POST['lastname'],
                                'username' => $_POST['username'],
                                'password' => $hash,
                                'image' => $imagePath ? $imagePath : '',
                                'email' => $_POST['email'],
                                'permission' => 0,
                            );
                            if ($sql->insert('users', $data)) {
                                echo "<h1>{$_POST['firstname']}{$_POST['lastname']} inserted succesfully</h1>";
                            }
                            else
                            {
                                echo "<h1>{$_POST['firstname']}{$_POST['lastname']} failed to  insert</h1>";
                            }
                        }
                    }
                    ?>
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
