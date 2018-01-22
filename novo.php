<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    require ("./temp/head_temp.php");
    require("./class/Sql.php");
    ?>

</head>

<body>

<!-- Navigation -->
<?php
require ("./temp/nav_temp.php");
?>

<!-- Page Content -->
<div class="container" style="padding: 0;">
    <!--SLIDER-->
    <?php
    require ("./temp/slider.php");
    ?>

    <!-- Projects Row -->
    <div class="row articlemovie">
        <!--ARTICLE-->
        <?php

        $sql = new Sql();
        $limit = 12;
        $page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
        $count = $sql->countAllNovo('movie');
        $numberOfPages = ceil(intval($count) / $limit);
        if ($page <=1) {
            $page = 1;
        }
        $offset = $page - 1;
        $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
        $movies = $sql->findAllNovo( 'movie', $limit, $offset, $search);
        foreach ($movies as $movie)
        {
            $image = $movie->image ? $movie->image : 'http://placehold.it/180x270';
            $placeholdeit = "http://placehold.it/180x270";
            $imagelink = "uploads/";
            $name = htmlspecialchars($movie->name);
            $description = htmlspecialchars($movie->description);
            $year = htmlspecialchars($movie->year);
            echo '<div class="col-md-2 portfolio-item">
                <a href="movie.php?id='.$movie->id.'">
                    <img class="img-responsive" src="'.$imagelink.$image.'" alt="'.$placeholdeit.'" width="180" height="270">
                    <b>' .$name.'&nbsp;</b><span>'.$year.'</span>
                </a>
                
            </div>';
        }
        ?>

    </div>
    <!-- /.row -->

    <hr>
    <?php
    if ($numberOfPages > 1) {
        $prev = $page > 1 ? $page - 1 : 1;
        $next = $page < $numberOfPages ? $page + 1 : $numberOfPages;
        echo '<div class="row text-center">
                    <div class="col-lg-12">
                        <ul class="pagination">
                            <li>
                                <a href="' .htmlspecialchars($_SERVER["PHP_SELF"]) .'?page='.$prev.'">&laquo;</a>
                            </li>';
        for($i=1; $i <= $numberOfPages; $i++) {
            $active = $i == $page ? 'active' : '';
            echo '<li class = "'.$active.'">
                        <a href="' .htmlspecialchars($_SERVER["PHP_SELF"]) .'?page='.$i.'">'. $i .'</a>
                      </li>';
        }

        echo '          <li>
                                <a href="' .htmlspecialchars($_SERVER["PHP_SELF"]) .'?page='.$next.'">&raquo;</a>
                            </li>
                        </ul>
                    </div>
                </div>';
    }
    ?>



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
