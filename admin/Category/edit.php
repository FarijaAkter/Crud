<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/crud/config.php");

use Farija\Category;

$_category = new Category();
$category = $_category->edit();


/*echo "<pre>";
print_r($product);
echo "</pre>";*/

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit Category</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h1 class="text-center mb-4">Edit Category</h1>
                <form method="post" action="update.php" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="inputId" class="col-md-3 col-form-label"></label>
                        <div class="col-md-9">
                            <input
                                type="hidden"
                                class="form-control"
                                id="inputId"
                                name="id"
                                value="<?=$category['id']?>"
                            >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputName" class="col-md-3 col-form-label">Name:</label>
                        <div class="col-md-9">
                            <input
                                type="text"
                                class="form-control"
                                id="inputName"
                                name="name"
                                value="<?=$category['name']?>"
                            >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputName" class="col-md-3 col-form-label">Link:</label>
                        <div class="col-md-9">
                            <input
                                type="text"
                                class="form-control"
                                id="inputLink"
                                name="link"
                                value="<?=$category['link']?>"
                            >
                        </div>
                    </div>
                    <div class="mb-3 row form-check">
                        <div class="col-md-9">
                            <?php
                            if ($category['is_draft'] == 0) {
                                ?>
                                <input type="checkbox"
                                       class="form-check-input"
                                       id="inputIsDraft"
                                       name="is_draft"
                                       value="1"
                                >
                                <?php
                            } else {
                                ?>
                                <input type="checkbox"
                                       class="form-check-input"
                                       id="inputIsDraft"
                                       name="is_draft"
                                       value="1"
                                       checked
                                >
                                <?php
                            }
                            ?>
                        </div>
                        <label for="inputIsDraft" class="col-md-3  form-check-label">Is Draft:</label>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Submit</button>
                        </div>
                    </div>
                </form>
                <dl class="row">

                    <dd class="col-md-9">
                        Go to  <a href="index.php">List</a>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

