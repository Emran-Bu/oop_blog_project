<?php

use App\classes\Blog;
use App\classes\Category;

include('header.php') ?>
<?php

    require_once('../vendor/autoload.php');
    $blog = new Blog;
    $category = new Category;
    $statusFetchData = $category->allActiveCategory();

    if (isset($_POST['save_blog'])) {
        $blogInsertMsg = $blog->addBlog($_POST);
    }

?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="text-center card-header">
                    Create Blog
                </header>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <?php
                        if (isset($blogInsertMsg)) {
                    ?>
                        <h6 class="text-center text-danger"><?= $blogInsertMsg ?></h6>
                    <?php       
                        }
                    ?>
                        <div class="form-group row">
                            <label for="cat_id" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="cat_id" id="cat_id">
                                <option value="">Select category</option>
                                    <?php
                                        while ($row = mysqli_fetch_assoc($statusFetchData)) {
                                    ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['category_name'] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="title" class="col-sm-3 col-form-label">Blog Tittle</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="title" id="title">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="content" class="col-sm-3 col-form-label">Content</label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" name="content" id="content" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" name="photo" id="photo">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="name" class="col-sm-3 col-form-label">Bloger Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="name" id="name">
                            </div>
                        </div>
                        
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="active" value="1">
                                        <label class="form-check-label" for="active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="inactive" value="0">
                                        <label class="form-check-label" for="inactive">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="save_blog">Save</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 offset-sm-3">
                                <div class="text-center">
                                    <?php
                                    if(isset($categoryError)){
                                    ?>
                                        <p class="text-danger"> <?= (isset($categoryError))? $categoryError : ''; ?> </p>

                                    <?php
                                     }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
<?php include('footer.php') ?>