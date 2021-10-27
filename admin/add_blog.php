<?php

use App\classes\Category;

include('header.php') ?>
<?php

    require_once('../vendor/autoload.php');
    $category = new Category;

    if (isset($_POST['save_blog'])) {
        $categoryError = $category->addCategory($_POST);
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
                        <div class="form-group row">
                            <label for="cat_id" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="cat_id" id="cat_id">
                                    <option value="">Select category</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="blog_title" class="col-sm-3 col-form-label">Blog Tittle</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="blog_title" id="blog_title">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="content" class="col-sm-3 col-form-label">Content</label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" name="content" id="content" cols="30" rows="10"></textarea>
                                <!-- <textarea class="form-control" type="text" name="content" id="content"> -->
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" name="photo" id="photo">
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