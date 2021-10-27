<?php
ob_start();
use App\classes\Category;

include('header.php') ?>
<?php

    require_once('../vendor/autoload.php');
    $category = new Category;

    if (isset($_GET['update'])) {
        $showCategoryID = $_GET['update'];
        $fetchData = $category->showCategory($showCategoryID);

        if (mysqli_num_rows($fetchData) == 1) {
            $row = mysqli_fetch_assoc($fetchData);
        }

    }

    if (isset($_POST['update_category'])) {
        $categoryError = $category->updateCategory($_POST);
    }

?>
    <div class="row">
        <div class="col-lg-6">
            <section class="card">
                <header class="text-center card-header">
                    Update Category
                </header>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="category_name" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">

                                <input type="hidden" class="form-control" id="category_id" name="category_id" value="<?= $row['id'] ?>">

                                <input type="text" class="form-control" id="category_name" name="category_name" value="<?= $row['category_name'] ?>">

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
                                <button type="submit" class="btn btn-primary" name="update_category">Update</button>
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