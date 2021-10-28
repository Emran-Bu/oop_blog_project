<?php

use App\classes\Blog;
use App\classes\Category;

include('header.php') ?>
<?php

    require_once('../vendor/autoload.php');
    $blog = new Blog;
    $category = new Category;
    $statusFetchData = $category->allActiveCategory();

    if (isset($_GET['update'])) {
        $showBlogID = $_GET['update'];
        $fetchData = $blog->showBlog($showBlogID);

        if (mysqli_num_rows($fetchData) == 1) {
            $row = mysqli_fetch_assoc($fetchData);
        }

    }

    if (isset($_POST['update_blog'])) {
        $blogUpdateMsg = $blog->updateBlog($_POST);
    }

?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="text-center card-header">
                    Update Blog
                </header>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <?php
                        if (isset($blogUpdateMsg)) {
                    ?>
                        <h6 class="text-center text-danger"><?= $blogUpdateMsg ?></h6>
                    <?php       
                        }
                    ?>
                        
                        <input class="form-control" type="hidden" name="id" id="title" value="<?= $row['id'] ?>">

                        <div class="form-group row">
                            <label for="cat_id" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="cat_id" id="cat_id">
                                <option value="">Select category</option>
                                    <?php
                                        while ($row1 = mysqli_fetch_assoc($statusFetchData)) {
                                    ?>
                                        <option value="<?= $row1['id'] ?>" <?= $row1['id'] == $row['cat_id'] ? 'selected':'' ?>><?= $row1['category_name'] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="title" class="col-sm-3 col-form-label">Blog Tittle</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="title" id="title" value="<?= $row['title'] ?>">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="content" class="col-sm-3 col-form-label">Content</label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" name="content" id="content" cols="30" rows="10"><?= $row['content'] ?></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" name="photo" id="photo">
                                <img class="mt-2 border  border-primary img-fluid" height="150px" width="100px" src="../upload/<?= $row['photo'] ?>" alt="img">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="name" class="col-sm-3 col-form-label">Blogger Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="name" id="name" value="<?= $row['name'] ?>">
                            </div>
                        </div>
                        
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="active" value="1" <?= $row['status'] == 1 ? 'checked':'' ?>>
                                        <label class="form-check-label" for="active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="inactive" value="0" <?= $row['status'] == 0 ? 'checked':'' ?>>
                                        <label class="form-check-label" for="inactive">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="update_blog">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
<?php include('footer.php') ?>