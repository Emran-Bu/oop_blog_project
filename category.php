<?php

    
    require_once('vendor/autoload.php');

    $cat = new \App\classes\Category;

    $cathData = $cat->allActiveCategory();
    $postData = $cat->allActivePost();

    $catPost = $cat->catPost($_GET['id']);

    require_once('header.php');

?>
        <!-- Page content-->
        <div class="container">
            <div class="row mt-5">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <?php
                        if (mysqli_num_rows($catPost) > 0) {
                            
                        while ($row1 = mysqli_fetch_assoc($catPost)) {
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
                                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                                <li class="page-item"><a class="page-link" href="#!">2</a></li>
                                <li class="page-item"><a class="page-link" href="#!">3</a></li>
                                <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                                <li class="page-item"><a class="page-link" href="#!">15</a></li>
                                <li class="page-item"><a class="page-link" href="#!">Older</a></li>
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
                    ?>
                    
                </div>
                <?php require_once('widget.php');?>
            </div>
        </div>
        
        <?php require_once('footer.php');?>