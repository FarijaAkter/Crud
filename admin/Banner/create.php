<?php
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Create</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <h1 class="text-center">Add An Item</h1>
            <form method="post" action="store.php" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="inputId" class="col-md-2 col-form-label"></label>
                    <div class="col-md-10">
                        <input type="hidden"
                               class="form-control"
                               placeholder="Enter an ID"
                               id="inputId"
                               name="id"
                               value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTitle" class="col-md-2 col-form-label">Title :</label>
                    <div class="col-md-10">
                        <input type="text"
                               class="form-control"
                               placeholder="Enter an Title"
                               id="inputTitle"
                               name="title"
                               value="">
                    </div>
                </div>
                <div class="mb-3 row form-check">
                    <div class="col-md-9">
                        <input type="checkbox"
                               class="form-check-input"
                               id="inputIsActive"
                               name="is_active"
                               value="1">
                    </div>
                    <label for="inputIsActive" class="col-md-3 form-check-label">Is_Active :</label>
                </div>
                <div class="mb-3 row form-check">
                    <div class="col-md-9">
                        <input type="checkbox"
                               class="form-check-input"
                               id="inputIsDeleted"
                               name="is_deleted"
                               value="1">
                    </div>
                    <label for="inputIsDeleted" class="col-md-3 form-check-label">Is_Deleted:</label>
                </div>
                <div class="mb-3 row">
                    <label for="inputImage" class="col-md-2 col-form-label">Picture:</label>
                    <div class="col-md-10">
                        <input type="file"
                               class="form-control"
                               id="inputImage"
                               name="picture"
                               value="">
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
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
