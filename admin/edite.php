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
    $date_pro = getUser('*', 'products', 'id = ?', array($_GET['id']));
    if (isset($_POST['edite'])) {
        $id = $_POST['id'];
        $proname = $_POST['proname'];
        $proprice = $_POST['proprice'];

        $update = updateDataInTable('products', 'productname = ?,price=?', 'id = ?', array($proname, $proprice, $id));

        if ($update) {
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
        <input type="hidden" name="id" value="<?= $date_pro['id'] ?>">
        <center>
            <label for="product_name">اسم المنتج</label>
            <input type="text" id="product_name" value="<?= $date_pro['productname'] ?>" name="proname"><br><br>

            <label for="product_price">سعر المنتج</label>
            <input type="number" id="product_price" value="<?= $date_pro['price'] ?>" name="proprice"><br><br>

            <input type="submit" name="edite" value="تعديل المنتج">
        </center>

    </form>


</body>

</html>