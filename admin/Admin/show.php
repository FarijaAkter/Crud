<?php
include_once($_SERVER['DOCUMENT_ROOT'])."/crud/config.php";

use Farija\Admin;

$_admin = new Admin();
$admin = $_admin->show() ;
/*echo"<pre>";
print_r($admin);
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

    <title>Show</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <h1 class="text-center">Show</h1>
            <dl class="row">
                <dt class="col-md-3">ID:</dt>
                <dd class="col-md-9"><?=$admin['id'];?></dd>
            </dl>
            <dl class="row">
                <dt class="col-md-3">Name:</dt>
                <dd class="col-md-9"><?=$admin['name'];?></dd>
            </dl>
            <dl class="row">
                <dt class="col-md-3">Email:</dt>
                <dd class="col-md-9"><?=$admin['email'];?></dd>
            </dl>
            <dl class="row">
                <dt class="col-md-3">Password:</dt>
                <dd class="col-md-9"><?=$admin['password'];?></dd>
            </dl>
            <dl class="row">
                <dt class="col-md-3">Phone:</dt>
                <dd class="col-md-9"><?=$admin['phone'];?></dd>
            </dl>

            <dl class="row">

                <dd class="col-md-9">
                    Go to  <a href="index.php">List</a>
                </dd>
            </dl>
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


