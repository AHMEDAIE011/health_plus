<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dashboard css/Dashboard.css">
    <title>ADD</title>
</head>

<body>
    <?php
    include '../assets/conact/conact.php';
    include '../assets/templet/fun/fun.php';

    if (isset($_POST['addcat'])) {
        $catname = $_POST['catname'];
        $add = insertdatatotabul(
            'category',
            'categoryname',
            ':zcat',
            array('zcat' => $catname)
        );
        if ($add) {
            ?>
            <script>
                setInterval(function () {
                    location.href = 'index.php';
                }, 1000);
            </script>
            <?php
        }
    }
    ?>
    <form class="add_product" action="" method="post" enctype="multipart/form-data">
        <center>
            <label for="product_name">اسم المنتج</label>
            <input type="text" id="product_name" name="catname"><br><br>

            <input type="submit" name="addcat" value="أضف قسم جديد">
        </center>

    </form>


</body>

</html>