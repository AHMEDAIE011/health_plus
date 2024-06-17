<?php

function getUser($select, $table, $condition = "", $params = array())
{
    global $con;

    $query = "SELECT $select FROM $table";

    if (!empty($condition)) {
        $query .= " WHERE $condition";
    }

    $stmt = $con->prepare($query);

    if (!empty($params)) {
        $stmt->execute($params);
    } else {
        $stmt->execute();
    }

    $rows = $stmt->fetch();

    return $rows;
}

// انشاء اداه لرفع البيانات الي قاعده البيانات

function insertdatatotabul($table, $condition, $values, $params = array())
{
    global $con;

    // إنشاء الاستعلام الأساسي للإدخال
    $query = "INSERT INTO $table";

    // تحقق مما إذا كانت الشروط موجودة لإضافتها إلى الاستعلام
    if (!empty($condition)) {
        $query .= " ($condition)";
    }

    // إضافة قيم البيانات
    $query .= " VALUES ($values)";

    $stmt = $con->prepare($query);

    $success = false;

    if (!empty($params)) {
        $success = $stmt->execute($params);
    } else {
        $success = $stmt->execute();
    }

    return $success;
}

// داله لتعديل البيانات
function updateDataInTable($table, $set_values, $condition, $params = array())
{
    global $con;

    if (empty($set_values) || empty($condition)) {
        return false;
    }

    $query = "UPDATE $table SET $set_values WHERE $condition";

    $stmt = $con->prepare($query);

    $success = false;

    if (!empty($params)) {
        $success = $stmt->execute($params);
    } else {
        $success = $stmt->execute();
    }

    return $success;
}

//  دالة للحصول على بيان
function getUseronpy($select, $table, $condition = "", $orderBy = "", $params = array())
{
    global $con;

    $query = "SELECT $select FROM $table";

    if (!empty($condition)) {
        $query .= " WHERE $condition";
    }

    if (!empty($orderBy)) {
        $query .= " ORDER BY $orderBy";
    }


    $stmt = $con->prepare($query);

    if (!empty($params)) {
        $stmt->execute($params);
    } else {
        $stmt->execute();
    }

    $rows = $stmt->fetch();

    return $rows;
}

// جلب جميع البيانات من قاعده البيانات
function getall($select, $table, $condition = "", $orderBy = "", $limit = "", $params = array())
{
    global $con;

    $query = "SELECT $select FROM $table";

    if (!empty($condition)) {
        $query .= " WHERE $condition";
    }

    if (!empty($orderBy)) {
        $query .= " ORDER BY $orderBy";
    }

    if (!empty($limit)) {
        $query .= " limit $limit ";
    }

    $stmt = $con->prepare($query);

    if (!empty($params)) {
        $stmt->execute($params);
    } else {
        $stmt->execute();
    }

    $rows = $stmt->fetchAll();

    return $rows;
}
// DESC ASC

// جلب الصور v2
function getavatar($tableName, $imagePath, $colname, $condition = "", $params = array())
{
    global $con;

    try {

        $query = "SELECT * FROM $tableName";

        if (!empty($condition)) {
            $query .= " WHERE $condition";
        }

        $stmt = $con->prepare($query);

        if (!empty($params)) {
            $stmt->execute($params);
        } else {
            $stmt->execute();
        }

        $row = $stmt->fetch();

        $avatar_count = $stmt->rowCount();

        if ($avatar_count > '0') {
            $avatar = $imagePath . $row[$colname];
        } else {
            $avatar = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhyhj1gUUYu1c8817GfPwApJbYzW9lJdjSXQ&usqp=CAU';
        }

        return $avatar;
    } catch (PDOException $e) {
        echo "Error fetching avatar: " . $e->getMessage();
        return false;
    }
}

// جلب عدد table 
function countItems($item, $table, $condition = "", $params = array())
{
    global $con;

    $query = "SELECT COUNT($item) FROM $table";

    if (!empty($condition)) {
        $query .= " WHERE $condition";
    }

    $stmt = $con->prepare($query);

    if (!empty($params)) {
        $stmt->execute($params);
    } else {
        $stmt->execute();
    }

    $rows = $stmt->fetchColumn();

    return $rows;
}

// جلب الوقت الفعلي
function getTime($time)
{
    $now = time();
    $eventTime = strtotime("@$time");
    $diff = $now - $eventTime;

    if ($diff < 0) {
        return 'في المستقبل';
    }

    $units = array(
        'سنة' => 31536000,
        'شهر' => 2592000,
        'يوم' => 86400,
        'ساعة' => 3600,
        'دقيقة' => 60
    );

    foreach ($units as $unit => $seconds) {
        if ($diff >= $seconds) {
            $count = floor($diff / $seconds);
            return "منذ $count $unit" . ($count > 1 ? '' : '');
        }
    }

    return 'الآن';
}


function calculateAge($birthDate)
{
    $birthDate = new DateTime($birthDate);
    $today = new DateTime();
    $age = $today->diff($birthDate);
    return $age->y;
}

function isSubscriptionExpireddata($expiryDate)
{
    $expiryDateTime = new DateTime($expiryDate);
    $currentDateTime = new DateTime();

    return $currentDateTime > $expiryDateTime;
}

function isSubscriptionExpiredAndValid($expiryDate, $subscriptionPrice)
{

    $expiryDateTime = new DateTime($expiryDate);
    $currentDateTime = new DateTime();
    $isFutureExpiryDate = $currentDateTime < $expiryDateTime;

    $isValidSubscriptionPrice = $subscriptionPrice > 0;

    return $isFutureExpiryDate && $isValidSubscriptionPrice;
}

// مسح المستخدم
function deleteUserAndSupportData($table, $condition = "", $params = array())
{
    global $con;

    $query = "SELECT * FROM $table";

    if (!empty($condition)) {
        $query .= " WHERE $condition";
    }

    $stmt = $con->prepare($query);

    if (!empty($params)) {
        $stmt->execute($params);
    } else {
        $stmt->execute();
    }

    $rows = $stmt->fetchColumn();


    if ($rows > 0) {
        $query = "DELETE FROM $table";

        if (!empty($condition)) {
            $query .= " WHERE $condition";
        }

        $stmt = $con->prepare($query);

        if (!empty($params)) {
            $suc = $stmt->execute($params);
        } else {
            $suc = $stmt->execute();
        }
        return $suc;
    }
}

// حساب الفارق
function calculateDateDifference($end_date)
{
    $now = new DateTime();
    $end_date_obj = new DateTime($end_date);

    $diff = $now->diff($end_date_obj);

    return $diff->days;
}

function calculateDateDifferencein1($tarikh_min, $end_date)
{
    // تحويل $tarikh_min إلى كائن DateTime
    $now = new DateTime($tarikh_min);
    $end_date_obj = new DateTime($end_date);

    $diff = $now->diff($end_date_obj);

    if ($diff->days <= 0) {
        return 1;
    }

    return $diff->days;
}

function canDisburse($disbursement_date)
{
    $today = new DateTime();

    $disbursement_date_obj = new DateTime($disbursement_date);

    $interval = $today->diff($disbursement_date_obj);
    $days_diff = $interval->days;

    if ($days_diff >= 30) {
        return '1';
    } else {
        return '0';
    }
}