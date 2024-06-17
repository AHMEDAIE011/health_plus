<!DOCTYPE html>
<html lang="ar" dir="ltr">

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
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background-color: #05091E;
            color: white;
        }

        .contact {
            max-width: 1150px;
            display: flex;
            justify-content: center;
            margin: 94px auto;
            direction: rtl;
        }
    </style>
</head>

<body>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include 'assets/conact/conact.php';
    include 'assets/templet/fun/fun.php';
    include 'assets/templet/nav/nav.php';

    if (isset($_POST['ACTIVE'])) {
        $totel = $_GET['totle'];
        $code = rand(100000, 1000000);
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $adress = $_POST['adress'];
        $city = $_POST['city'];
        $By_Method = $_POST['By_Method'];

        $add = insertdatatotabul(
            'orders',
            'code,name,city,addres,totel_mony',
            ':code,:name,:city,:addres,:totel_mony',
            array(
                'code' => $code,
                'name' => $firstName . ' ' . $lastName,
                'city' => $city,
                'addres' => $adress,
                'totel_mony' => $totel
            )
        );

        if ($add) {

            $allitem = getall('*', 'card', 'userid = ?', '', '', array($_SESSION['clintid']));
            foreach ($allitem as $item) {
                $add_active = insertdatatotabul(
                    'active_card',
                    'order_id,user_id,product_id,num',
                    ':order_id,:user_id,:product_id,:num',
                    array(
                        'order_id' => $code,
                        'user_id' => $_SESSION['clintid'],
                        'product_id' => $item['productid'],
                        'num' => $item['num']
                    )
                );

                if ($add_active) {
                    deleteUserAndSupportData('card', 'userid = ?', array($_SESSION['clintid']));

                    ?>
                    <script>
                        setTimeout(() => {
                            alert('تم الشراء بنجاح');
                            setTimeout(() => {
                                location.href = 'profile.php';
                            }, 1500);
                        }, 1000);
                    </script>
                    <?php
                }

            }



        }

    }


    ?>
    <section class="contact">
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">بيانات الدفع</h4>
            <form method="post" action="">
                <div class="row g-3"> <!-- الموضع 1 -->
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">الاسم</label>
                        <input type="text" name="firstName" class="form-control" id="firstName">
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">الكنية</label>
                        <input type="text" name="lastName" class="form-control" id="lastName">
                    </div>

                    <div class="col-12">
                        <label for="username" class="form-label">المدينه</label>
                        <div class="input-group"> <!-- الموضع 2 -->
                            <input type="text" name="city" class="form-control" id="username" placeholder="المدينه">
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">العنوان</label>
                        <textarea class="form-control" name="adress" id=""></textarea>
                    </div>

                </div>

                <hr class="my-4"> <!-- الموضع 3 -->

                <h4 class="mb-3">الدفع</h4>

                <div class="my-3">
                    <select name="By_Method" style="width: 100%;
                    padding: 5px;" id="">
                        <option value="فيزه">فيزه</option>
                        <option value="كاش">كاش</option>
                    </select>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" name="ACTIVE" type="submit">الدفع</button>
                <!-- الموضع 4 -->
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>