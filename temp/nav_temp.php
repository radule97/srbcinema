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
					<a href="index.php">Pocetna</a>
				</li>
				<li>
					<a href="novo.php">Novo</a>
				</li>
				<li>
					<a href="popularno.php">Popularno</a>
				</li>
			</ul>
            <?php
            session_start();
            if (!$_SESSION){
                echo '
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="form/login.php">Login</a>
                        </li>
                        <li>
                            <a href="form/register.php">Register</a>
                        </li>
                    </ul>
                    ';
            }
            else
            {

                echo '
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="admin/index.php">'. (isset($_SESSION['user']) ? $_SESSION['user']->username : 'bla') .'</a>
                        </li>
                    </ul>
                    ';
            }

            ?>

			<ol class="nav navbar-nav navbar-right">
				<li>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="search-form margin">
						<div class="form-group has-feedback">
							<label for="search" class="sr-only">Search</label>
							<input type="text" class="form-control" name="search" id="search" placeholder="Search" value="<?php echo htmlspecialchars(isset($_REQUEST['search']) ? $_REQUEST['search'] : ''); ?>">
							<span class="glyphicon glyphicon-search form-control-feedback" id="searchcolor"></span>
						</div>
					</form>
				</li>
			</ol>

		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>