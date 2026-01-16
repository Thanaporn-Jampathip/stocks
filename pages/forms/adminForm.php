<?php
include '../../backend/config.php';
session_start();
$username = $_SESSION['username'];
$userID = $_SESSION['userID'];
$userRole = $_SESSION['userRole'];

// fetch username and role
$sqlUser = "SELECT * FROM users WHERE user_id = '$userID'";
$queryUser = mysqli_query($conn, $sqlUser);
$rowUser = mysqli_fetch_array($queryUser);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/forms/adminForm.css">

    <title>Form Add Admin</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="form-add-admin">
                <form action="" method="post">
                    <h5>เพิ่มรายชื่อแอดมิน</h5>
                    <div class="mb-3">
                        <label for="">ชื่อผู้ใช้งาน</label>
                        <input type="text" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="">ชื่อ - นามสกุล</label>
                        <input type="text" name="fullname" required>
                    </div>
                    <div class="mb-4">
                        <label for="">รหัสผ่าน</label>
                        <input type="text" name="password" required>
                    </div>
                    <!-- btn -->
                    <div class="btn-add-admin mb-2">
                        <button type="submit" name="addAdmin">เพิ่ม</button>
                    </div>
                    <div class="btn-back">
                        <a href="../manage_user.php?role=admin">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php include '../../backend/action_manage_people.php' ?>