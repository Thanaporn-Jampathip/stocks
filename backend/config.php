<?php
// ตั้งค่า Timezone เป็นเวลาประเทศไทย
date_default_timezone_set('Asia/Bangkok');

// ตั้งค่าการเชื่อมต่อฐานข้อมูล
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'stock');

// สร้างการเชื่อมต่อ
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ตั้งค่า Character Set เป็น UTF-8 เพื่อรองรับภาษาไทย
$conn->set_charset("utf8mb4");

?>