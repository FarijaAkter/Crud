<?php
include_once($_SERVER['DOCUMENT_ROOT'])."/crud/config.php";

use Farija\Cart;

$_cart = new Cart();
$carts= $_cart->index() ;
/*echo "<pre>";
print_r($carts);
echo "</pre>";*/
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

    <title>List</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="justify-content-center text-success fs-3">
                    <?php
                    echo $_SESSION['message'];
                    $_SESSION['message']="";
                    ?>
                </div>
                <h1 class="text-center">Cart List</h1>
                <ul class="nav justify-content-center fs-2">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="create.php">Add an item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trash_index.php">All trashed item</a>
                    </li>
                </ul>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Product_Title</th>
                        <th scope="col">Status</th>
<!--                        <th scope="col">Quantity</th>-->
                        <th scope="col">Unit_Price</th>
                        <th scope="col">Total_Price</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(count($carts)>0):
                        foreach($carts as $cart):
                            ?>
                            <tr>
                                <!--<td>
                                    <?/*=$cart['is_draft']? 'Drafted':'Not-Draft';*/?>
                                </td>-->

                                <td><?= $cart['product_title'];?></td>
                                <td>
                                    <?=$cart['is_active']? 'Active':'Not Active';?>
                                </td>
                              <!--  <td>
                                    <?/*=$cart['is_deleted']? 'Deleted':'Not Deleted';*/?>
                                </td>-->
                                <td><?= $cart['qty'];?></td>
                                <td><?= $cart['unite_price'];?></td>
                                <td><?= $cart['total_price'];?></td>
                                <td>
                                    <button class="btn btn-success"><a href="show.php?id=<?=$cart['id'];?>" class="text-light">Show</a></button>|
                                    <button class="btn btn-primary"><a href="edit.php?id=<?=$cart['id'];?>"class="text-light">Edit</a></button>|
                                    <button class="btn btn-danger"><a href="delete.php?id=<?=$cart['id'];?>" onclick="return confirm('Are you sure you want to delete?')" class="text-dark">Delete</a></button>|
                                    <button class="btn btn-warning"><a href="trash.php?id=<?=$cart['id'];?>" onclick="return confirm('Are you sure you want send it in trash?')" class="text-dark">Trash</a></button>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                    else:
                        ?>
                        <tr>
                            <td colspan="2">No Product is available.
                                <a href="create.php">
                                    Click here to add one.
                                </a>
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

