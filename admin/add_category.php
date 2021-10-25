<?php

use App\classes\Category;

include('header.php') ?>
<?php

    require_once('../vendor/autoload.php');
    $category = new Category;

    if (isset($_POST['save_category'])) {
        $categoryError = $category->addCategory($_POST);
    }

?>
    <div class="row">
        <div class="col-lg-6">
            <section class="card">
                <header class="text-center card-header">
                    Create Category
                </header>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="category_name" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="category name">
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
                                <button type="submit" class="btn btn-primary" name="save_category">Save</button>
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