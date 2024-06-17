<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./dashboard css/Dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>health+</title>
</head>

<body>
    <?php
    include '../assets/conact/conact.php';
    include '../assets/templet/fun/fun.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $products = getall('*', 'products', '', '', '4');

    if (!isset($_SESSION['adminid'])) {
        header("Location: index.php");
        exit();
    }

    if (isset($_POST['dalete'])) {
        $id = $_POST['id'];

        $del = deleteUserAndSupportData('products', 'id = ?', array($id));

        if ($del) {

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

    <div class="menu">
        <ul>
            <li class="profile">
                <div class="img-box">
                    <img src="./profile.png" alt="profile" target="_blank">
                </div>
                <h2 title="admin">admin</h2>

            </li>

            <li>
                <a class="active" href="./index.html" target="_blank">
                    <i class="fas fa-home"></i>
                    <p>Home</p>
                </a>
            </li>


            <!-- <li>
                <a href="">
                    <i class="fa-solid fa-address-card"></i>
                    <p>Profile</p>
                </a>
            </li> -->

            <li>
                <a href="./add_item.php" target="_blank">

                    <i class="fa-solid fa-heart-circle-bolt"></i>
                    <p>اضافه منتج</p>
                </a>
            </li>

            <li>
                <a href="add_cat.php" target="_blank">
                    <i class="fa-solid fa-heart-circle-bolt"></i>
                    <p>اضافه قسم جديد</p>
                </a>
            </li>

            <li>
                <a href="./orders.php" target="_blank">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <p>Orders</p>
                </a>
            </li>

            <!-- <li>
                <a href="./invoices.html" target="_blank" style="margin:6px;"> <i class="fa-solid fa-file-invoice"></i>
                    <p>invoice</p>
            </li> -->

            <li class="log-out">
                <a href="logout.php">
                    <i class="fas fa-sign-out"></i>
                    <p>Log Out</p>
                </a>
            </li>

        </ul>
    </div>



    <div class="content">
        <div class="title-info">
            <p>Dash board</p>
            <i class="fas fa-chart-bar"></i>
        </div>

        <div class="data-info">
            <div class="box">
                <i class="fas fa-user"></i>
                <a href="./user.html" target="_blank" style="text-decoration: none;">
                    <div class="data">
                        <p>user</p>
                        <span><?= countItems('id', 'users'); ?></span>
                    </div>
            </div>

            <div class="box">
                <i class="fa-solid fa-cart-shopping"></i>
                <a href="./orders.html" target="_blank" style="text-decoration: none;">
                    <div class="data">
                        <p>products</p>
                        <span><?= countItems('id', 'products'); ?></span>
                    </div>
            </div>
            <div class="box">
                <i class="fa-solid fa-cart-shopping"></i>
                <a href="./orders.html" target="_blank" style="text-decoration: none;">
                    <div class="data">
                        <p>orders</p>
                        <span><?= countItems('id', 'orders'); ?></span>
                    </div>
            </div>


        </div>

        <div class="title-info">
            <p>products</p>
            <i class="fas fa-table"></i>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Products</th>
                    <th>Price</th>
                    <th class="editing">Editing</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $pro) {
                    ?>
                    <tr>
                        <td><?= $pro['productname'] ?></td>
                        <td><span class="price">جنيه<?= $pro['price'] ?></span></td>
                        <td>

                            <a href="edite.php?id=<?= $pro['id'] ?>">
                                <button class="edit"><i class="fa-solid fa-pen-to-square"
                                        style="color: rgb(255, 255, 255); margin-right: 30px; margin-top: 5px;"></i>تعديل</button>
                            </a>
                            <form style="width: auto;margin: auto;padding: initial;" action="" method="post">
                                <input type="hidden" name="id" value="<?= $pro['id'] ?>">
                                <button class="del" type="submit" name="dalete"><i class="fa-solid fa-trash"
                                        style="color: rgb(255, 255, 255); margin-right: 30px; margin-top: 5px;"></i>حذف</button>
                            </form>

                        </td>
                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>


    </div>





</body>

</html>