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
    $gatid = $_GET['cat'];
    $allitem = getall('*', 'products', 'categoryid = ?', '', '', array($gatid));
    $allcat = getUser('*', 'category', 'id = ?', array($gatid));
    ?>
    <!-- products -->



    <div class="catogory">
        <div class="list">
            <h1 style="color: #fff;
    margin-top: 20px;
    font-size: 30px;
    font-weight: 600;"><?= $allcat['categoryname'] ?></h1>
        </div>
    </div>


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

    <!-- Start Footer -->
    <div class="form-popup"></div>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6 data-i18n="About">About</h6>
                    <p data-i18n="pabout">
                        موقع مكملات غذائية هو وجهتك الموثوقة لاستكشاف وتحديد أفضل المكملات الغذائية التي تلبي احتياجاتك
                    </p>
                    <hr />

                    <p data-i18n="pabout1">
                        التحقق من الجودة والتأثير الفعّال نحن نساعدك علي تحقيق هدفك ونوفر لك جميع احتياجات جسمك اليومية
                    </p>
                </div>

                <div class="col-xs-6 col-md-6">
                    <h6 data-i18n="ah1">Branches</h6>
                    <ul class="footer-links">
                        <li><a href="#">Cairo</a></li>
                        <li><a href="#">Giza</a></li>
                        <br>
                        <hr>
                        <h6 data-i18n="ah12">nasayih</h6>
                        <li><a href="nasayih.html">Tips page</a></li>

                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 ">
                    <p class="copyright-text">
                        <i class="fas fa-phone"></i>
                        <a href="tel:01033572895"> Call Us: 01033572895</a>
                        <br>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:ahmedcheck6699@gmail.com"> <span
                                class="text">ahmedcheck6699@gmail.com</span></a>
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 ">
                    <br>
                    <br>
                    <ul class="social-icons">
                        <li><a class="facebook" href="https://www.facebook.com/Ahmed11ibrahem/" target="_blank"><i
                                    class="fab fa-facebook"></i></a></li>
                        <li><a class="twitter" href="https://www.facebook.com/Ahmed11ibrahem/" target="_blank"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li><a class="instagram" href="https://www.facebook.com/Ahmed11ibrahem/" target="_blank"><i
                                    class="fab fa-instagram"></a></i>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- End Footer -->
</body>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.6.0.js"></script>
<script src="js/lang.js"></script>
<script src="js/script.js"></script>

</html>