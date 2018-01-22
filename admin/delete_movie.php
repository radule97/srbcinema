<!DOCTYPE html>
<html lang="en">

<head>

    <?php
//
//echo '<pre>';
//    print_r($_SERVER);
//    echo '</pre>';
    require ("../class/Sql.php");
    require("../class/File.php");

    $sql = new Sql();

    $movieId = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : NULL;

    $movie = NULL;

    if ($movieId) {
        $movie = $sql->findById($movieId, 'movie');
    }
    ?>



    <?php
    require ("../temp/head_temp.php");

    ?>

</head>

<body>

<div class="container">
    <div class="">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <?php
                if (empty($_POST) && $movie) { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Delete</button>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                                      enctype="multipart/form-data">

                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($movie->id); ?>"/>
                                        <input type="hidden" name="name" value="<?php echo htmlspecialchars($movie->name); ?>"/>
                                        <input type="hidden" name="hash" value="<?php echo htmlspecialchars(md5("{$movie->name}-{$movie->id}")); ?>"/>
                                        <p>Are you shure that you want to delete movie <?php echo htmlspecialchars($movie->name); ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit"  name="delete"  value="delete">Yes</button>
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                <?php } else {

                    $hash = htmlspecialchars(md5("{$movie->name}-{$movie->id}"));
                    if ($_REQUEST['hash'] !== $hash ) {
                        echo "<h1>wrong hash</h1>";
                    }elseif (isset($_POST['delete']) && $movieId) {

                        $sql = new Sql();

                        if ($sql->delete('movie', "id=$movieId")) {
                            echo "<h1>{$movie->name} deleted succesfully</h1>";
                        } else {
                            echo "<h1>{$movie->name} failed to delete</h1>";
                        }
                    } elseif(!isset($_REQUEST['id'])) {
                        echo "<h1>You must provide movie id</h1>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>