<?php
include_once($_SERVER['DOCUMENT_ROOT'])."/crud/config.php";

use Farija\User;
$_user = new User();
$user = $_user->edit();

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5">
                <h1 class="text-center">Edit</h1>
                <form method="post" action="update.php" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="inputId" class="col-md-2 col-form-label"></label>
                        <div>
                            <input type="hidden"
                                   class="form-control"
                                   id="inputId"
                                   name="id"
                                   value="<?=$user['id'];?>"
                            >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputFullname" class="col-md-2 col-form-label">Fullname:</label>
                        <div>
                            <input type="text"
                                   class="form-control"
                                   name="fullname"
                                   id="inputFullname"
                                   value="<?=$user['fullname'];?>"
                            >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputUserName" class="col-md-2 col-form-label">Username:</label>
                        <div>
                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter your User Name"
                                   name="username"
                                   id="inputUserName"
                                   value="<?=$user['username'];?>"
                            >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputEmail" class="col-md-2 col-form-label">Email:</label>
                        <div>
                            <input type="email"
                                   class="form-control"
                                   placeholder="Enter your Email"
                                   name="email"
                                   id="inputEmail"
                                   value="<?=$user['email'];?>"
                            >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPhone" class="col-md-2 col-form-label">Phone:</label>
                        <div>
                            <input type="number"
                                   class="form-control"
                                   placeholder="Enter your Contact Number"
                                   name="phone"
                                   id="inputPhone"
                                   value="<?=$user['phone'];?>"
                            >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-md-2 col-form-label">Password:</label>
                        <div>
                            <input type="password"
                                   class="form-control"
                                   placeholder="Enter your password"
                                   name="password"
                                   id="inputPassword"
                                   value="<?=$user['password'];?>"
                            >
                        </div>
                    </div>

                    <div class="mb-3 row form-check">
                        <div class="col-md-9">
                            <?php
                            if($user['is_deleted'] == 0){
                                ?>
                                <input type="checkbox"
                                       class="form-check-input"
                                       name="is_deleted"
                                       id="inputIsDeleted"
                                       value="1"
                                >
                                <?php
                            }else{
                                ?>
                                <input type="checkbox"
                                       class="form-check-input"
                                       name="is_deleted"
                                       id="inputIsDeleted"
                                       value="1"
                                       checked>
                                <?php
                            }
                            ?>
                        </div>
                        <label for="inputIsDeleted" class="col-md-2 form-check-label">Is_Deleted:</label>
                    </div>

                        <div class="col-auto">
                            <button
                                type="submit"
                                class="btn btn-primary mb-3">Submit
                            </button>
                        </div>
                </form>
                <dl class="row">

                    <dd class="col-md-9 fs-2">
                        Go to  <a href="index.php" >List</a>
                    </dd>
                </dl>
            </div>
        </div>
    </div>




</section>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>
