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

      if ($add) {
        $uploadPath = "files/" . $imgname;
        move_uploaded_file($imgnametemp, $uploadPath);
        ?>
        <script>
          setInterval(function () {
            location.href = 'add_item.php';
          }, 1000);
        </script>
        <?php
      }
    }
  }
  ?>
  <form class="add_product" action="" method="post" enctype="multipart/form-data">
    <center>
      <label for="product_name">اسم المنتج</label>
      <input type="text" id="product_name" name="proname"><br><br>
      <label for="product_name"></label>
      <label> اضافة تصنيف</label>
      <select style="    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #cccccc9f;
    color: rgb(255, 255, 255);
    font-size: 20px;
    background-color: #001;" name="catid" id="">
        <?php
        foreach ($allcat as $cat) {
          ?>
          <option value="<?= $cat['id'] ?>"><?= $cat['categoryname'] ?></option>
          <?php
        }
        ?>
      </select>

      <label for="product_price">سعر المنتج</label>
      <input type="number" id="product_price" name="proprice"><br><br>
      <label for="product_image">صورة المنتج</label>
      <input type="file" id="product_image" name="img"><br><br>
      <input type="submit" name="additem" value="أضف المنتج">
    </center>

  </form>


</body>

</html>