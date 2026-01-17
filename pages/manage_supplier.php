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

// fetch supplier 
$sqlSupplier = "SELECT * FROM suppliers";
$querySupplier = mysqli_query($conn, $sqlSupplier);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/manage_supplier.css">

    <title>Manage Supplier</title>
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
                <div class="container-manageSupplier">
                    <!-- header page -->
                    <div class="header-page">
                        <h4><i class="bi bi-card-checklist"></i>หน้าจัดการซัพพลายเออร์</h4>
                    </div>
                    <!-- content -->
                    <div class="content">
                        <!-- btn_add_supplier -->
                        <div class="btn_add_supplier">
                            <a href="./forms/supplier_form/add.php">เพิ่มซัพพลายเออร์</a>
                        </div>

                        <!-- table-container -->
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ชื่อซัพพลายเออร์</th>
                                        <th>ผู้ติดต่อ</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>อีเมล</th>
                                        <th>ที่อยู่</th>
                                        <th>รับสินต้า</th>
                                        <th>สร้างขึ้นเมื่อ</th>
                                        <th class="text-center">การจัดการ</th>
                                    </tr>
                                </thead>

                                <?php while ($rowSupplier = mysqli_fetch_array($querySupplier)) { ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $rowSupplier['supplier_id'] ?></td>
                                            <td><?php echo $rowSupplier['supplier_name'] ?></td>
                                            <td><?php echo $rowSupplier['contact_person'] ?></td>
                                            <td><?php echo $rowSupplier['phone'] ?></td>
                                            <td><?php echo $rowSupplier['email'] ?></td>
                                            <td>
                                                <?php if (empty($rowSupplier['address'])) {
                                                    echo "ไม่มี";
                                                } else {
                                                    echo $rowSupplier['address'];
                                                } ?>
                                            </td>
                                            <td>adad</td>
                                            <td><?php echo $rowSupplier['created_at'] ?></td>
                                            <td>
                                                <div class="manage">
                                                    <div class="btn-edit">
                                                        <a
                                                            href="forms/supplier_form/edit.php?id=<?php echo $rowSupplier['supplier_id'] ?>"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                    </div>
                                                    <div class="btn-delete">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="supplierID"
                                                                value="<?php echo $rowSupplier['supplier_id'] ?>">
                                                            <button type="submit" name="deleteSupplier"><i
                                                                    class="bi bi-trash"></i></button>
                                                        </form>
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
<?php include '../backend/action_manage_supplier.php' ?>