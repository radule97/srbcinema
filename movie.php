<!DOCTYPE html>
<html lang="en">

<head>

	<?php
	require ("./temp/head_temp.php");

    require ("class/Sql.php");
    require("class/File.php");

    $sql = new Sql();

    $movieId = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : NULL;

    $movie = NULL;

    $error = '';

    if ($movieId) {
        $movie = $sql->findById($movieId, 'movie');
    }
    if ($movie && !empty($_POST)) {
        $hash = htmlspecialchars(md5("{$movie->name}-{$movie->id}"));
        if ($_REQUEST['hash'] !== $hash) {
            echo "<h1>wrong hash</h1>";
        } elseif (isset($_POST['delete']) && $movieId) {

            $sql = new Sql();

            if ($sql->delete('movie', "id=$movieId")) {
                header("Location: index.php");
            } else {
                $error .= "<h1>{$movie->name} failed to delete</h1>";
            }
        } elseif (!isset($_REQUEST['id'])) {
            $error .= "<h1>You must provide movie id</h1>";
        }

    }
    ?>

</head>

<body>

    <!-- Navigation -->
    <?php
    require ("./temp/nav_temp.php");
    ?>

    <!-- Page Content -->
    <div class="container">
        <!-- Projects Row -->
        
        <div class="row">
            <?php
                if ($movie) {
//                        if (!empty($_POST)) {
//                        $hash = htmlspecialchars(md5("{$movie->name}-{$movie->id}"));
//                        if ($_REQUEST['hash'] !== $hash ) {
//                            echo "<h1>wrong hash</h1>";
//                        }elseif (isset($_POST['delete']) && $movieId) {
//
//                            $sql = new Sql();
//
//                            if ($sql->delete('movie', "id=$movieId")) {
//                                echo "<h1>{$movie->name} deleted succesfully</h1>";
//                            } else {
//                                echo "<h1>{$movie->name} failed to delete</h1>";
//                            }
//                        } elseif(!isset($_REQUEST['id'])) {
//                            echo "<h1>You must provide movie id</h1>";
//                        }
//                    }

                    $name = htmlspecialchars($movie->name);
                    $year = htmlspecialchars($movie->year);
                    $rating = htmlspecialchars($movie->raiting);
                    $description = htmlspecialchars($movie->description);
                    $video = htmlspecialchars($movie->video);
                    $image = htmlspecialchars($movie->image ? $movie->image : 'http://placehold.it/300x435');
                    $imagelink = "uploads/".$image;
                    $background = htmlspecialchars($movie->background ? $movie->background : NULL);
                    $errorMsg = strlen($error) > 0 ? "<h1>{$error}</h1>" : '';
                    $backgroundCss = <<<EOT
                   <style type="text/css">
                    body {
                        background-image:    url({$background});
                        background-size:     cover;
                        background-repeat:   no-repeat;
                        background-position: center center;
                    }
                    </style>
EOT;
                    $backgroundCss =  $background ? $backgroundCss : '';
                    $user = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
                    $editLink = $user && $user->permission == 3 ? '<a class="edit-movie-link" href="admin/update_movie.php?id=' . $movie->id . '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>' : '';
                    $deleteLink = $user && $user->permission == 3 ? '<a class="delete-movie-link" href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>' : '';
                    $action = htmlspecialchars($_SERVER["PHP_SELF"]);
                    $movieId = htmlspecialchars($movie->id);
                    $deleteHash = htmlspecialchars(md5("{$movie->name}-{$movie->id}"));
                    $movieName = htmlspecialchars($movie->name);
                   echo <<<EOT
                   <style type="text/css">
                    {$backgroundCss}
                    </style>
                    <div class="col-md-3" style="padding: 0px;">
                        <img class="img-responsive" src="{$imagelink}" alt="">
                    </div>
                    <div class="col-md-9 moviebg">
                        <h3><b>{$name}</b> {$year}&nbsp;{$editLink}&nbsp;{$deleteLink}</h3>
                        <h4>{$rating}</h4>
                        <p>{$description}</p>

                        <div class="panel-group">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse1">Play Movie <i class="fa fa-play"
                                                                                                  style="font-size:15px"></i></a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <!--<iframe allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" width="100%" height="500px"
                                                src="https://openload.co/embed/O_iJtXnV3k4/Generation.Iron.2013.720p.BluRay.x264.YIFY.mp4">
                                        </iframe>-->
                                        <div id="container"></div>
                                        <script>
                                            jwplayer("container").setup({
                                                file: "{$video}"
                                            });
                                        </script>
                                    </div>
                                    <!--<div class="panel-footer">Panel Footer</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    {$errorMsg}
                     <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete {$movieName}</h4>
                                    </div>
                                    <form class="" action="{$action}" method="post"
                                          enctype="multipart/form-data">

                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="{$movieId}/>
                                            <input type="hidden" name="name" value="{$movieName}"/>
                                            <input type="hidden" name="hash" value="{$deleteHash}"/>
                                            <p>Are you shure that you want to delete movie {$movieName}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit"  name="delete"  value="delete">Yes</button>
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
EOT;
                } else {
                    // write error messages
                    ?>
                    <div class="col-md-9 moviebg">
                        <h3>No Movie</h3>
                        <h4>Subheading</h4>
                        <p>Invalid movie id</p>

                        <div class="panel-group">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse1">Play Movie <i class="fa fa-play"
                                                                                                  style="font-size:15px"></i></a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <!--<iframe allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" width="100%" height="500px"
                                                src="https://openload.co/embed/O_iJtXnV3k4/Generation.Iron.2013.720p.BluRay.x264.YIFY.mp4">
                                        </iframe>-->
                                        <div id="container"></div>
                                        <script>
                                            jwplayer("container").setup({
                                                file: "https://www.youtube.com/watch?v=0sRh4BYl0aE&index=6&list=RDb1XNN7BLWZM"
                                            });
                                        </script>
                                    </div>
                                    <!--<div class="panel-footer">Panel Footer</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>

        </div>
        <!-- Footer -->
        <footer>

        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>






