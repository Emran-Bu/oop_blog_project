<?php

    namespace App\classes;

    class Category
    {
        // add Category table data
        public function addCategory($data)
        {
            $category_name = $data['category_name'];
            $status = isset($data['status']);

            if ($category_name == '' or $status == '') {
                $categoryError = "Category Name and status required";
                return $categoryError;
            } else {
                $sql = "INSERT INTO category (category_name, status) values ('{$category_name}', '{$status}')";

                $result = mysqli_query(Database::dbConn(), $sql);

                if ($result) {
                    $categoryError = "Category Saved Successfully";
                    return $categoryError;
                } else {
                    die('Query Unsuccessfully');
                }
            }
            
        }

        // update Category table data
        public function updateCategory($data)
        {
            $category_id = $data['category_id'];
            $category_name = $data['category_name'];
            $status = $data['status'];

            if ($category_name == '' or $status == '') {
                $categoryError = "Category Name and status required";
                return $categoryError;
            } else {
                $sql = "UPDATE category set category_name = '$category_name', status = '$status' where id = '{$category_id}'";

                $result = mysqli_query(Database::dbConn(), $sql);

                if ($result) {
                    $categoryError = "Category update Successfully";
                    header('location: manage_category.php');
                    return $categoryError;
                } else {
                    die('Query Unsuccessfully');
                }
            }
            
        }

        // show Category data blog page in select option
        public function allActiveCategory()
        {
            $sql = "SELECT * FROM category where status = 1";
            $result = mysqli_query(Database::dbConn(), $sql);
            return $result;
            
        }

        // show Category data update manage page
        public function allCategory()
        {
            $sql = "SELECT * FROM category";
            $result = mysqli_query(Database::dbConn(), $sql);
            return $result;
            
        }

        // show Category data Category update page
        public function showCategory($showCategoryID)
        {
            $sql = "SELECT * FROM category where id = $showCategoryID";
            $result = mysqli_query(Database::dbConn(), $sql);
            return $result;
            
        }

        // active Category table data
        public function active($activeId)
        {
            $sql = "UPDATE category set status = 1 where id = '{$activeId}'";
            $result = mysqli_query(Database::dbConn(), $sql);
            if (isset($result)) {
                header('location: manage_category.php');
                return $result;
            }
            
        }

        // inactive Category table data
        public function inactive($inactiveId)
        {
            $sql = "UPDATE category set status = 0 where id = '{$inactiveId}'";
            $result = mysqli_query(Database::dbConn(), $sql);
            if (isset($result)) {
                header('location: manage_category.php');
                return $result;
            }
        }

        // delete Category table data
        public function deleteCategory($deleteID)
        {
            $sql = "DELETE FROM category where id = $deleteID";
            $result = mysqli_query(Database::dbConn(), $sql);
            if (isset($result)) {
                header('location: manage_category.php');
                return $result;
            }
        }
    }

?>