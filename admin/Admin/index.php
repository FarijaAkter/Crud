<?php
include_once($_SERVER['DOCUMENT_ROOT'])."/crud/config.php";

use Farija\Admin;

$_admin = new Admin();
$admins = $_admin->index() ;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="fs-3 text-success">
                    <?php
                    echo $_SESSION['message'];
                    $_SESSION['message'] = "";
                    ?>
                </div>
                <h1 class="text-center mb-4">Admin</h1>
                <ul class="nav justify-content-center fs-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="create.php">
                            Add Admin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <table class="table table-bordered border border-danger">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">password</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (count($admins) > 0):
                        foreach ($admins as $admin):
                            ?>

                            <tr>
                                <!-- php echo = '=' same work-->
                                <td><?= $admin['name']?></td>
                                <td><?= $admin['email']?></td>
                                <td><?= $admin['password']?></td>
                                <td><a href="show.php?id=<?=$admin['id'];?>">Show</a>
                                    |
                                    <a href="edit.php?id=<?=$admin['id'];?>">Edit</a>
                                    |
                                    <a href="delete.php?id=<?=$admin['id'];?>"
                                       onclick="return confirm('Are you sure you want to delete?')">
                                        Delete
                                    </a>
                                </td>
                            </tr>

                        <?php
                        endforeach;
                    else:
                        ?>
                        <tr>
                            <td colspan="2">No Product is available.
                                <a href="create.php"> Click here to add one.</a>
                            </td>
                        </tr>
                    <?php
                    endif;
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
