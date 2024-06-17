<!DOCTYPE html>
<html lang="en">

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
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background-color: #05091E;
        }
    </style>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include 'assets/conact/conact.php';
    include 'assets/templet/fun/fun.php';
    include 'assets/templet/nav/nav.php';

    $allitem = getall('*', 'card', 'userid = ?', '', '', array($_SESSION['clintid']));

    ?>
    <div class="cart_user">
        <div class="card">
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id='showCart'>
                        <?php
                        foreach ($allitem as $card) {
                            $allcat = getUser('*', 'products', 'id = ?', array($card['productid']));
                            ?>
                            <tr>
                                <td><img src="admin/files/<?= $allcat['imge'] ?>" alt="Product 1"></td>
                                <td><?= $allcat['productname'] ?></td>
                                <td>$<?= $allcat['price'] ?></td>
                                <td><?= $card['num'] ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" value="<?= $card['id'] ?>" name="id">
                                        <button type="submit" name="Remove">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td style="text-align: right;"><strong>Total:</strong></td>
                            <td id="totalPrice">$0.00</td>

                            <td colspan="3" style="text-align: right;">
                                <form action="checkout.php" method="get">
                                    <input type="hidden" name="totle" id="totelchackout">
                                    <button type="submit">Checkout</button>
                                </form>
                            </td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['Remove'])) {
        $id = $_POST['id'];

        $del = deleteUserAndSupportData('card', 'id = ?', array($id));

        if ($del) {
            ?>
            <script>
                setInterval(function () {
                    location.href = 'viewcart.php';
                }, 1500);
            </script>
            <?php
        }
    }
    ?>
    <script>
        function calculateTotal() {
            var rows = document.getElementById('showCart').getElementsByTagName('tr');
            var total = 0;
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                var priceCell = cells[2]; // الخلية التي تحتوي على السعر
                var quantityCell = cells[3]; // الخلية التي تحتوي على الكمية
                if (priceCell && quantityCell) {
                    var price = parseFloat(priceCell.textContent.replace('$', '').trim()); // سعر المنتج بدون العملة
                    var quantity = parseInt(quantityCell.textContent.trim()); // الكمية
                    if (!isNaN(price) && !isNaN(quantity)) {
                        total += price * quantity;
                    }
                }
            }
            return total.toFixed(2);
        }

        // عرض القيمة الإجمالية
        function displayTotal() {
            var total = calculateTotal();
            var totalPrice = document.getElementById('totalPrice');
            var show = document.getElementById('totelchackout');
            totalPrice.innerHTML = '$' + total;
            show.value = total;
        }

        // استدعاء الدالة لعرض القيمة الإجمالية
        displayTotal();

    </script>
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
    <!-- <?php
    include ('footer.php');
    ?> -->
    <!-- End Footer -->
</body>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.6.0.js"></script>
<script src="js/lang.js"></script>
<script src="js/script.js"></script>

</html>