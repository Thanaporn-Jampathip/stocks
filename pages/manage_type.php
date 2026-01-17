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

// fetch type 
$sqlType = "SELECT * FROM categories";
$queryType = mysqli_query($conn, $sqlType);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/manage_type.css">

    <title>Manage type</title>
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
                <div class="container-manageType">
                    <!-- header page -->
                    <div class="header-page">
                        <h4><i class="bi bi-card-checklist"></i>หน้าจัดการหมวดหมู่สินค้า</h4>
                    </div>
                    <!-- content -->
                    <div class="content">
                        <!-- btn_add_type -->
                        <div class="btn_add_type">
                            <a href="./forms/category_form/add.php">เพิ่มหมวดหมู่</a>
                        </div>

                        <!-- table-container -->
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ชื่อหมวดหมู่</th>
                                        <th>คำอธิบาย</th>
                                        <th>สร้างขึ้นเมื่อ</th>
                                        <th class="text-center">การจัดการ</th>
                                    </tr>
                                </thead>

                                <?php while ($rowType = mysqli_fetch_array($queryType)) { ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $rowType['category_id'] ?></td>
                                            <td><?php echo $rowType['category_name'] ?></td>
                                            <td><?php echo $rowType['description'] ?></td>
                                            <td><?php echo $rowType['created_at'] ?></td>
                                            <td>
                                                <div class="manage">
                                                    <div class="btn-edit">
                                                        <a
                                                            href="forms/category_form/edit.php?id=<?php echo $rowType['category_id'] ?>"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                    </div>
                                                    <!-- <div class="btn-delete">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="typeID"
                                                                value="<?php echo $rowType['category_id'] ?>">
                                                            <button type="submit" name="deleteType"><i
                                                                    class="bi bi-trash"></i></button>
                                                        </form>
                                                    </div> -->
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
<?php include '../backend/action_manage_category.php' ?>