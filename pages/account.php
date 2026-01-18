<?php
include '../backend/config.php';
session_start();
$username = $_SESSION['username'];
$userID = $_SESSION['userID'];
$userRole = $_SESSION['userRole'];

// fetch username and role use for sidebar
$sqlUser = "SELECT * FROM users WHERE user_id = '$userID'";
$queryUser = mysqli_query($conn, $sqlUser);
$rowUser = mysqli_fetch_array($queryUser);

// fetch data user fot local
$sqlAccount = "
SELECT username, full_name , users.role as roleID, ut.name as role
FROM users 
JOIN user_type ut ON users.role = ut.id
WHERE user_id = '$userID'";
$queryAccount = mysqli_query($conn, $sqlAccount);
$rowAccount = mysqli_fetch_array($queryAccount);

// translate role to thai
if ($rowAccount['role'] === 'admin') {
    $rowAccount['role'] = "ผู้ดูแลระบบ";
} else if ($rowAccount['role'] === 'staff') {
    $rowAccount['role'] = "พนักงานขาย";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/account.css">

    <title>My account</title>
</head>

<body class="min-vh-100">

    <div class="d-flex min-vh-100">
        <!-- Sidebar  -->
        <?php include '../components/sidebar.php'; ?>
        <!-- Content -->
        <div class="d-flex flex-grow-1 flex-column">
            <!-- Navbar -->
            <?php include '../components/navbar.php' ?>

            <main>
                <div class="container-account">
                    <!-- header page -->
                    <div class="header-page">
                        <h4><i class="bi bi-card-checklist"></i>หน้าโปรไฟล์ของฉัน</h4>
                    </div>
                    <!-- content -->
                    <div class="content">
                        <div class="d-flex w-100" style="gap: 2rem">
                            <!-- profile -->
                            <div class="profile">
                                <p>
                                    <i class="bi bi-person-circle"></i> <br>
                                    <span style="font-size: 18pt"><?php echo $rowAccount['username'] ?></span> <br>
                                    <span
                                        style="font-size: 14pt; color: gray;"><?php echo "@" . $rowAccount['full_name'] ?></span>
                                    <br>

                                    <span
                                        style="font-size: 12pt; background: red; color: white; padding: 0.2rem 1rem 0.4rem 1rem;"
                                        class="rounded-pill">
                                        <?php if ($rowAccount['roleID'] === '1') {
                                            echo "ผู้ดูแลระบบ";
                                        } else if ($rowAccount['roleID'] === '2') {
                                            echo "พนักงานขาย";
                                        } ?>
                                    </span>
                                </p>
                            </div>
                            <!-- form container -->
                            <div class="form-container">
                                <form action="" method="post">
                                    <h5><i class="bi bi-person-gear"></i>ข้อมูลส่วนตัว</h4>
                                    <hr>
                                    <!-- username -->
                                    <div class="mb-3">
                                        <label for="">ชื่อผู้ใช้ <span
                                                class="text-secondary fs-6 ps-1">(ไม่สามารถเปลี่ยนชื่อผู้ใช้ได้)</span></label>
                                        <input type="text" class="text-secondary" value="<?php echo $rowAccount['username'] ?>" readonly>
                                    </div>
                                    <!-- fullName -->
                                    <div class="mb-3">
                                        <label for="">ชื่อ - นามสกุล</label>
                                        <input type="text" name="full_name" value="<?php echo $rowAccount['full_name'] ?>">
                                    </div>
                                    <!-- role -->
                                    <div class="mb-3">
                                        <label for="">สิทธิ์การใช้งาน</label>
                                        <input type="text" class="text-secondary" value="<?php echo $rowAccount['role'] ?>">
                                    </div>
                                    <!-- btn -->
                                    <div class="btn-save-data">
                                        <input type="hidden" value="<?php echo $userID ?>" name="userID">
                                        <button type="submit" name="save-data"><i class="bi bi-floppy"></i>บันทึกข้อมูล</button>
                                    </div>
                                </form>

                                <form action="" method="post">
                                    <h5><i class="bi bi-key"></i>เปลี่ยนรหัสผ่าน</h4>
                                    <hr>
                                    <!-- current password -->
                                    <div class="mb-3">
                                        <label for="">รหัสผ่านปัจจุบัน</label>
                                        <input type="password" name="password" required>
                                    </div>
                                    <!-- new password -->
                                    <div class="mb-3">
                                        <label for="">รหัสผ่านใหม่</label>
                                        <input type="password" name="nPassword" required>
                                    </div>
                                    <!-- confirm password -->
                                    <div class="mb-3">
                                        <label for="">ยืนยันรหัสผ่านใหม่</label>
                                        <input type="password" name="cPassword" required>
                                    </div>
                                    <!-- btn -->
                                    <div class="btn-save-password">
                                        <input type="hidden" value="<?php echo $userID ?>" name="userID">
                                        <button type="submit" name="save-password"><i class="bi bi-key"></i>เปลี่ยนรหัสผ่าน</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <?php include '../components/footer.php'; ?>
        </div>
    </div>

</body>

</html>
<?php include '../backend/action_account.php' ?>