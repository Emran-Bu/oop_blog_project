<?php

    
    require_once('vendor/autoload.php');

    $cat = new \App\classes\Category;

    $cathData = $cat->allActiveCategory();
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    
    $pagination = $cat->pagination($page);

    $postData = $cat->allActivePost();

    require_once('header.php');

?>
        <!-- Page header with logo and tagline-->
        <?php
            if (isset($_GET['search'])) {
                # code...
            } else {
        ?>
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                </div>
            </div>
        </header>
        <?php
            }
        ?>
        <!-- Page content-->
        <div class="container">
            <div class="row mt-5">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <?php
                        if (isset($_GET['search'])) {
                            $search = $_GET['search'];
                            $search = $cat->searchPost($search);
                            // print_r($search);

                            if (mysqli_num_rows($search) > 0) {
                           
                                while ($searchRow = mysqli_fetch_assoc($search)) {
                        ?>

                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="upload/<?= $searchRow['photo'] ?>" alt="img" /></a>
                            <div class="card-body">
                                <div class="small text-muted">Posted On <?= date('d-M-Y', strtotime($searchRow['createtime'])) ?> by <a href="#" class="text-decoration-none"><?= $searchRow['name'] ?></a></div>
                                <h2 class="card-title"><?= $searchRow['title'] ?></h2>
                                <p class="card-text"><?= substr($searchRow['content'], 0, 700)
                                #$searchRow['content'] ?>...</p>
                                <a class="btn btn-primary" href="post.php?id=<?= $searchRow['id'] ?>">Read more →</a>
                            </div>
                        </div>

                        <?php
                                }
                            } else {
                                ?>
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <p class="card-text text-center text-muted">No Search Post Found</p>
                                        </div>
                                    </div>
                        <?php
                            }

                        } else {
                    ?>
                    <?php
                        if (mysqli_num_rows($pagination) > 0) {
                           
                        while ($row1 = mysqli_fetch_assoc($pagination)) {
                    ?>
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="upload/<?= $row1['photo'] ?>" alt="img" /></a>
                        <div class="card-body">
                            <div class="small text-muted">Posted On <?= date('d-M-Y', strtotime($row1['createtime'])) ?> by <a href="#" class="text-decoration-none"><?= $row1['name'] ?></a></div>
                            <h2 class="card-title"><?= $row1['title'] ?></h2>
                            <p class="card-text"><?= substr($row1['content'], 0, 700)
                            #$row1['content'] ?>...</p>
                            <a class="btn btn-primary" href="post.php?id=<?= $row1['id'] ?>">Read more →</a>
                        </div>
                    </div>
                    <?php 
                            }

                        ?>
                            <!-- Pagination-->
                            <nav aria-label="Pagination">
                                <hr class="my-0" />
                                <ul class="pagination justify-content-center my-4">
                                    <?php
                                        if ($page > 1){
                                    ?>
                                        <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1" aria-disabled="true">Prev</a></li>
                                    <?php
                                        }
                                    ?>
                                    
                                    <?php
                                        if (mysqli_num_rows($postData) > 0) {
                                            $total_records = mysqli_num_rows($postData);
                                            $limit = 2;
                                            $total_pages = ceil($total_records/$limit);
                                        
                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            if ($i == $page) {
                                                $active = "active";
                                            } else {
                                                $active = "";
                                            }
                                            
                                    ?>
                                    <li class="page-item <?= $active ?>" aria-current="page"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                                    <?php
                                        }
                                    } else {
                                    ?>
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <p class="card-text text-center text-muted">No post found</p>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($total_pages > $page){
                                    ?>
                                        <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>" tabindex="-1" aria-disabled="true">Next</a></li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </nav>
                        <?php

                        } else {
                            ?>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <p class="card-text text-center text-muted">No Post Found</p>
                                    </div>
                                </div>
                            <?php
                        }
                    } 
                    
                    ?>
                    
                </div>
                <?php require_once('widget.php');?>
            </div>
        </div>
        
        <?php require_once('footer.php');?>