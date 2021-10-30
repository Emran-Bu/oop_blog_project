<?php

    
    require_once('vendor/autoload.php');

    $cat = new \App\classes\Category;

    $cathData = $cat->allActiveCategory();
    $postData = $cat->allActivePost();

    $singlePost = $cat->singlePost($_GET['id']);
    $row1 = mysqli_fetch_assoc($singlePost);

    require_once('header.php');

?>
        <!-- Page content-->
        <div class="container">
            <div class="row mt-5">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="upload/<?= $row1['photo'] ?>" alt="img" /></a>
                        <div class="card-body">
                            <div class="small text-muted">Posted On <?= date('d-M-Y', strtotime($row1['createtime'])) ?> by <a href="#" class="text-decoration-none"><?= $row1['name'] ?></a></div>
                            <h2 class="card-title"><?= $row1['title'] ?></h2>
                            <p class="card-text"><?= $row1['content'] ?></p>
                        </div>
                    </div>
                </div>
                <?php require_once('widget.php');?>
            </div>
        </div>
        
        <?php require_once('footer.php');?>