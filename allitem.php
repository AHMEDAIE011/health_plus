<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>health+</title>
    <link rel="stylesheet">
    <link rel="icon" href="images/l.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include 'assets/conact/conact.php';
    include 'assets/templet/fun/fun.php';
    include 'assets/templet/nav/nav.php';

    $allitem = getall('*', 'products');
    ?>
    <!-- products -->


    <div class="pro1">
        <?php
        foreach ($allitem as $item) {
            ?>
            <div class="pro2">
                <img src="admin/files/<?= $item['imge'] ?>">
                <h3><?= $item['productname'] ?></h3>
                <p>60Serv</p>
                <h6>LE <?= $item['price'] ?></h6>
                <form action="" method="post" style="width: 100%;padding: 0;">
                    <input type="number" name="num" style="width:90%;" value="1" min="1" max="10">
                    <input type="hidden" name="price" value="<?= $item['price'] ?>">
                    <input type="hidden" name="itemid" value="<?= $item['id'] ?>">
                    <input type="hidden" name="clintid" value="<?php if (isset($_SESSION['clintid'])) {
                        echo $_SESSION['clintid'];
                    } else {
                    } ?>">

                    <?php if (isset($_SESSION['clintid'])) {
                        ?>
                        <button class="Buy-1" name="addtocard" type="submit">Add to cart</button>
                        <?php
                    } else {
                        ?>
                        <button class="Buy-1" name="addtocard" onclick="alert('يجب تسجيل الدخول')" type="button">Add to
                            cart</button>
                        <?php
                    } ?>

                </form>
            </div>
            <?php
        }
        ?>

        <?php
        if (isset($_POST['addtocard'])) {
            $num = $_POST['num'];
            $price = $_POST['price'];
            $itemid = $_POST['itemid'];
            $clintid = $_POST['clintid'];
            $totel = $num * $price;

            $add = insertdatatotabul(
                'card',
                'productid,userid,num,totel',
                ':zproductid,:zuserid,:znum,:ztotel',
                array(
                    'zproductid' => $itemid,
                    'zuserid' => $clintid,
                    'znum' => $num,
                    'ztotel' => $totel
                )
            );
        }
        ?>

    </div>
    <?php
    include ('footer.php');
    ?>
    <!-- End Footer -->
</body>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.6.0.js"></script>
<script src="js/lang.js"></script>
<script src="js/script.js"></script>

</html>