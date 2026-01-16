<?php
include '../backend/config.php';
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
    <link rel="stylesheet" href="../css/manage_user.css">

    <title>Manage User</title>
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
                <div class="container-manageUser">
                    <!-- header page -->
                    <div class="header-page">
                        <h4><i class="bi bi-person-circle"></i>หน้าจัดการผู้ใช้งาน</h4>
                    </div>
                    <!-- content -->
                    <div class="content">
                        <div class="d-flex">
                            <div class="link">
                                <a href="manage_user.php" class="btn_all">ทั้งหมด</a>
                                <a href="?role=admin" class="btn_admin">แอดมิน</a>
                                <a href="?role=staff" class="btn_staff">พนักงาน</a>
                            </div>

                            <!-- check role for show btn add people  -->
                            <?php $role = $_GET['role'] ?? null;
                            // btn add admin
                            if ($role === 'admin') { ?>
                                <div class="btn_add_admin">
                                    <a href="./forms/admin_form/adminForm.php"><i
                                            class="bi bi-person-plus"></i>เพิ่มแอดมิน</a>
                                </div>
                                <!-- btn add staff -->
                            <?php } elseif ($role === 'staff') { ?>
                                <div class="btn_add_staff">
                                    <a href="./forms/staff_form/staffForm.php"><i
                                            class="bi bi-person-plus"></i>เพิ่มพนักงาน</a>
                                </div>
                            <?php } ?>
                        </div>

                        <!-- table check role for show data -->
                        <div class="table-container">
                            <?php $role = $_GET['role'] ?? null;
                            if ($role === 'admin') {
                                include './tables/adminTable.php';
                            } elseif ($role === 'staff') {
                                include './tables/staffTable.php';
                            }else{
                                include './tables/allUserTable.php';
                            }
                            ?>
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