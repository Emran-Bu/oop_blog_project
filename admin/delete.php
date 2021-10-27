<?php

    use App\classes\Category;

    require_once('../vendor/autoload.php');
    $category = new Category;

    if (isset($_GET['delete'])) {
        $deleteID = $_GET['delete'];
        $category->deleteCategory($deleteID);
    }

?>