<?php
include_once($_SERVER['DOCUMENT_ROOT'])."/crud/config.php";

use Farija\Banner;
$_banner = new Banner;
$banners = $_banner->trash_index();

/*echo"<pre>";
print_r($banners);
echo"</pre>";*/
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>List</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="justify-content-center fs-4">
                <?php
                echo $_SESSION['message'];
                $_SESSION['message']="";
                ?>
            </div>
            <h1 class="text-center">Trash List</h1>
            <div class="my-3">
            <ul class="nav justify-content-center fs-2">
                <li class="nav-item">
                   <button class="btn btn-info"> <a class="nav-link text-dark" href="index.php" >List item</a></button>
                </li>
                |
                <li class="nav-item">
                   <button type="button" class="btn btn-info"><a class="nav-link text-dark" href="#">Trashed Item</a></button>
                </li>
            </ul>
            </div>

            <table class="table table-bordered border border-info">
                <thead>
                <tr>
                    <th scope="col" class="text-primary">Title</th>
                    <th scope="col" class="text-info">Status</th>
                    <th scope="col" class="text-info"> Delete Status</th>
                    <th scope="col" class="text-success">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(count($banners)>0):
                foreach($banners as $banner):
                ?>
                <tr>

                    <td><?=$banner['title'];?></td>
                    <td><?=$banner['is_active']? 'Active':'Deactive';?></td>
                    <td><?=$banner['is_deleted']? 'Deleted':'Not Deleted';?></td>
                    <td>
                        <button class="btn btn-success"><a href="show.php?id=<?=$banner['id'];?>" class="text-light">SHOW</a></button>
                        |
                        <button class="btn btn-warning"><a href="delete.php?id=<?=$banner['id'];?>" class="text-dark">DELETE</a></button>
                        |
                        <button class="btn btn-danger"><a href="restore.php?id=<?=$banner['id'];?>" onclick="return confirm('Do you sure to restore?')" class="text-light">RESTORE</a></button>
                    </td>
                </tr>
                   <?php
                   endforeach;
                   else:
                   ?>
                <tr>
                    <td colspan="2">No Banner is available.<a href="index.php">Click here to add One</a></td>
                </tr>
                <?php
                endif;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>
