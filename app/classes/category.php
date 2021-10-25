<?php

    namespace App\classes;

    class Category
    {
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

        public function allCategory()
        {
            $sql = "SELECT * FROM category";
            $result = mysqli_query(Database::dbConn(), $sql);
            return $result;
            
        }

        public function active($activeId)
        {
            $sql = "UPDATE category set status = 1 where id = '{$activeId}'";
            $result = mysqli_query(Database::dbConn(), $sql);
            if (isset($result)) {
                header('location: manage_category.php');
                return $result;
            }
            
        }

        public function inactive($inactiveId)
        {
            $sql = "UPDATE category set status = 0 where id = '{$inactiveId}'";
            $result = mysqli_query(Database::dbConn(), $sql);
            if (isset($result)) {
                header('location: manage_category.php');
                return $result;
            }
        }
    }

?>