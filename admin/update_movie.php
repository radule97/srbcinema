<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	require ("../class/Sql.php");
    require("../class/File.php");

    $sql = new Sql();

    $movieId = isset($_GET['id']) ? intval($_GET['id']) : NULL;

    $movie = NULL;

    if ($movieId) {
        $movie = $sql->findById($movieId, 'movie');
    }
	?>

	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<?php
	require ("../temp/head_temp.php");

	?>

</head>

<body>

<div class="container">
    <div class="jumbotron formlab">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <?php
                if (empty($_POST) && $movie) { ?>
                    <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                          enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="name" class="control-label">Name</label><br>
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($movie->name); ?>"
                                   placeholder="Enter your Name"/>
                        </div>

                        <!--						 <div class="form-group">-->
                        <!--							<label for="image" class="control-label">Image</label><br>-->
                        <!--							<input type="text" class="form-control" name="image" id="image"  placeholder="Enter Image"/>-->
                        <!--						</div>-->
                        <div class="form-group">
                            <label for="image" class="control-label">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image">
                                <span class="custom-file-control"></span>
                            </div>
                        </div>

                        <!--                        <div class="form-group">-->
                        <!--                            <label for="background" class="control-label">Background</label><br>-->
                        <!--                            <input type="text" class="form-control" name="background" id="background"-->
                        <!--                                   placeholder="Enter Background"/>-->
                        <!--                        </div>-->
                        <div class="form-group">
                            <label for="background" class="control-label">Background</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="background" id="background">
                                <span class="custom-file-control"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="control-label">Description</label><br>
                            <textarea class="form-control" name="description" id="description"
                                      placeholder="Enter Description" cols="10" rows="10"><?php echo htmlspecialchars($movie->description); ?></textarea></div>

                        <div class="form-group">
                            <label for="year" class="control-label">Year</label><br>
                            <input type="number" class="form-control" name="year" id="year" placeholder="Enter Year" value="<?php echo htmlspecialchars($movie->year); ?>"/>
                        </div>

                        <div class="form-group">
                            <label for="raiting" class="control-label">Raiting</label><br>
                            <input type="number" class="form-control" name="raiting" id="raiting" value="<?php echo htmlspecialchars($movie->raiting); ?>"
                                   placeholder="Enter Raiting"/>
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg" name="update" id="update"
                                    value="Update">Update
                            </button>

                            <!--<button type="submit" class=" btn btn-secondary btn-lg" name="update" id="update"  value="update">Update</button>
                            <button type="submit" class=" btn btn-secondary btn-lg" name="delete" id="delete"  value="delete">Delete</button>-->
                        </div>

                    </form>
                <?php } else {

                    if (isset($_POST['update'])) {
                        $sql = new Sql();
                        $image = new File();
                        $imagePath = $image->upload('image');
                        $background = new File();
                        $backgroundPath = $image->upload('background');
                        $data = array(
                            'name' => $_POST['name'],
                            'description' => $_POST['description'],
                            'year' => $_POST['year'],
                            'raiting' => $_POST['raiting'],
                        );
                        if ($imagePath) {
                            $data['image'] = $imagePath;
                        }
                        if ($backgroundPath) {
                            $data['background'] = $backgroundPath;
                        }
                        if ($sql->update('movie', $data)) {
                            echo "<h1>{$_POST['name']} update succesfully</h1>";
                        } else {
                            echo "<h1>{$_POST['name']} failed to update</h1>";
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