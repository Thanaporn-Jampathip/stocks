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

// fetch brand
$sqlBrand = "SELECT * FROM brands";
$queryBrand = mysqli_query($conn, $sqlBrand);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/manage_brand.css">

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
                <div class="container-manageProduct">
                    <!-- header page -->
                    <div class="header-page">
                        <h4><i class="bi bi-bag"></i>หน้าจัดการแบรนด์</h4>
                    </div>
                    <!-- content -->
                    <div class="content">
                        <div class="btn_add_pro">
                            <a href="./forms/brand_form/add.php">เพิ่มแบรนด์</a>
                        </div>
                        <!-- table container -->
                        <div class="table-container table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>รายชื่อแบรนด์</th>
                                        <th class="text-center">สถานะ</th>
                                        <th>สร้างขึ้นเมื่อ</th>
                                        <th class="text-center">การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php while ($rowStatus = mysqli_fetch_array($queryBrand)) { ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $rowStatus['id'] ?></td>
                                            <td><?php echo $rowStatus['name'] ?></td>
                                            <td class="text-center">
                                                <?php if ($rowStatus['status'] === 'disabled') {
                                                    echo "<span class='text-light px-3 py-1 rounded-pill bg-danger'>ปิดการมองเห็น</span>";
                                                } elseif ($rowStatus['status'] === 'enabled') {
                                                    echo "<span class='text-light px-3 py-1 rounded-pill bg-success'>เปิดการมองเห็น</span>";
                                                } ?>
                                            </td>
                                            <td><?php echo $rowStatus['created_at'] ?></td>
                                            <td>
                                                <div class="manage">
                                                    <div class="btn-edit">
                                                        <a
                                                            href="forms/brand_form/edit.php?id=<?php echo $rowStatus['id'] ?>"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
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