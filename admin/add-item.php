<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>اضافه قسم</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <?php
    include '../assets/conact/conact.php';
    include '../assets/templet/fun/fun.php';
    $allcat = getall('*', 'category');


    if (isset($_POST['additem'])) {
        $catid = $_POST['catid'];
        $proprice = $_POST['proprice'];
        $proname = $_POST['proname'];

        $imgname = $_FILES['img']['name'];
        $imgnametemp = $_FILES['img']['tmp_name'];
        $imgssize = $_FILES['img']['size'];
        $maxFileSize = 5 * 1024 * 1024;

        $allowedExtensions = array("jpeg", "png", "jpg", "gif");

        $imgExtension = pathinfo($imgname, PATHINFO_EXTENSION);
        $imgExtension = strtolower($imgExtension);
        $er_arrore = array();

        if (!in_array($imgExtension, $allowedExtensions)) {
            $er_arrore[] = "خطأ: نوع الصورة غير مسموح. يرجى تحميل صورة من نوع jpeg، png، jpg، أو gif.";
        }
        if (empty($imgname)) {
            $er_arrore[] = 'يوجد خطاء في حقل الصورة';
        }

        if (!empty($er_arrore)) {

        } else {
            $add = insertdatatotabul(
                'products',
                'categoryid,productname,price,imge',
                ':zcat,:zproname,:zprice,:zimge',
                array(
                    'zcat' => $catid,
                    'zproname' => $proname,
                    'zprice' => $proprice,
                    'zimge' => $imgname
                )
            );
            $uploadPath = "files/" . $imgname;
            move_uploaded_file($imgnametemp, $uploadPath);
            
        }
    }
    ?>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <?php
            include 'assets/head/nav.php';
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Basic form elements</h4>
                                    <p class="card-description"> Basic form elements </p>
                                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group rtl ">
                                            <label for="exampleInputName1">اسم المنتج</label>
                                            <input type="text" class="form-control" name="proname"
                                                id="exampleInputName1" placeholder="Name">
                                        </div>
                                        <div class="form-group rtl ">
                                            <label for="exampleInputName1">سعر المنتج</label>
                                            <input type="text" class="form-control" name="proprice"
                                                id="exampleInputName1" placeholder="Name">
                                        </div>

                                        <div class="form-group rtl ">
                                            <label for="exampleSelectGender">التصنيف</label>
                                            <select class="form-select" name="catid" id="exampleSelectGender">
                                                <?php
                                                foreach ($allcat as $cat) {
                                                    ?>
                                                    <option value="<?= $cat['id'] ?>"><?= $cat['categoryname'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group rtl">
                                            <label>File upload</label>
                                            <input type="file" name="img" class="form-control file-upload-info"
                                                placeholder="Upload Image">
                                        </div>

                                        <button type="submit" name="additem"
                                            class="btn btn-primary me-2">Submit</button>
                                        <a href="index.html">
                                            <button class="btn btn-light" type="button">الصفحه الرئسيه</button>
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a
                    href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from
                BootstrapDash.</span>
            <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2023. All rights
                reserved.</span>
        </div>
    </footer>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="../../assets/vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
    <!-- End custom js for this page-->
</body>

</html>