<?php

    use App\classes\Category;
    use App\classes\Blog;

    require_once('../vendor/autoload.php');
    $category = new Category;
    $blog = new Blog;

    if (isset($_GET['delete_cat'])) {
        $deleteCatID = $_GET['delete_cat'];
        $category->deleteCategory($deleteCatID);
    }

    if (isset($_GET['delete_blog'])) {
        $deleteBlogID = $_GET['delete_blog'];
        $blog->deleteBlog($deleteBlogID);
    }

?>