<?php
ob_start();
use App\classes\Category;

include('header.php') ?>
<?php

    require_once('../vendor/autoload.php');
    $category = new Category;
    $fetchCategory = $category->allCategory();

    if (isset($_GET['active'])) {
        $activeId = $_GET['active'];
        $category->active($activeId);
    }

    if (isset($_GET['inactive'])) {
        $inactiveId = $_GET['inactive'];
        $category->inactive($inactiveId);
    }

?>
<div class="row">
    <div class="col-sm-12">
    <section class="card">
    <header class="card-header">
        Dynamic Table
    <span class="tools pull-right">
    <a href="javascript:;" class="fa fa-chevron-down"></a>
    <a href="javascript:;" class="fa fa-times"></a>
    </span>
    </header>
    <div class="card-body">
    <div class="adv-table">
    <table  class="display table table-bordered table-striped" id="dynamic-table">

    <thead>
        <tr>
            <th>Sl No.</th>
            <th>Category Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if (mysqli_num_rows($fetchCategory) > 0) {
                $sl = 1;
                while ($row = mysqli_fetch_assoc($fetchCategory))
                {
        ?>
            <tr class="gradeX">
                <td><?= $sl;  //$row['id'] ?></td>
                <td><?= $row['category_name'] ?></td>
                <td><?= $row['status'] == 1 ? 'Active':'Inactive' ?></td>
                <td>
                    <a class="btn btn-sm btn-success" href="update_cat.php?update=<?= $row['id'] ?>"> <i class="fa fa-pencil-square-o"></i> Update</a>

                    <a class="btn btn-sm btn-danger" href="delete.php?delete_cat=<?= $row['id'] ?>"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>

                    <?php
                        if ($row['status'] == 1) {
                            
                    ?>
                        <a class="btn btn-sm btn-warning" href="?inactive=<?= $row['id'] ?>"> <i class="fa fa-arrow-down" aria-hidden="true"></i> Inactive</a>
                    <?php
                    }
                    ?>

                    <?php
                        if ($row['status'] == 0) {
                            
                    ?>
                        <a class="btn btn-sm btn-info" href="?active=<?= $row['id'] ?>"> <i class="fa fa-arrow-up" aria-hidden="true"></i> Active</a>
                    <?php
                    }
                    ?>
                </td>
            </tr>

        <?php
              $sl++;       
        }
            } else {
                echo "No record Found";
            }
        ?>
    </tbody>

    </table>
    </div>
    </div>
    </section>
    </div>
    </div>
<?php include('footer.php') ?>