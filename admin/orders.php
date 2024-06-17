<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جدول معلومات عن المنتجات المباعة</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./dashboard css/table order.css">
</head>

<body>

    <?php
    include '../assets/conact/conact.php';
    include '../assets/templet/fun/fun.php';
    $allcat = getall('*', 'orders');
    if (isset($_POST['dalete'])) {
        $id = $_POST['id'];

        $del = deleteUserAndSupportData('orders', 'code = ?', array($id));

        if ($del) {
            $del = deleteUserAndSupportData('active_card', 'order_id = ?', array($id));

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
    <header>
        <h1>Orders</h1>
    </header>
    <main>
        <center>
            <table border="1">
                <tr>

                    <th class="edit_del">تعديلات</th>
                    <th>كود</th>
                    <th>اسم العميل</th>
                    <th>المدينه</th>
                    <th>الاجمالي</th>
                    <th>المنتجات</th>
                </tr>

                <?php
                foreach ($allcat as $order) {
                    $get_pro = getall('*', 'active_card', 'order_id = ?', '', '', array($order['code']));
                    ?>
                    <tr>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $order['code'] ?>">
                                <button name="dalete" class="edit">حذف<i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                        <td><?= $order['code'] ?></td>
                        <td><?= $order['name'] ?> </td>
                        <td><?= $order['city'] ?></td>
                        <td><?= $order['totel_mony'] . 'جنيه' ?></td>
                        <td>
                            <?php
                            foreach ($get_pro as $pro) {
                                $pro_data = getUser('*', 'products', 'id = ?', array($pro['product_id']));

                                echo $pro_data['productname'] . '  الكميه  (' . $pro['num'] . ') <br>';
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>

            </table>
        </center>
    </main>

</body>

</html>