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

// fetch category for filter data in table
$sqlCategory = "SELECT * FROM categories";
$queryCategory = mysqli_query($conn, $sqlCategory);

// fetch product
$sqlPro = "
SELECT p.* , c.category_id as typeID ,c.category_name as type , b.name as brand
FROM products p
LEFT JOIN categories c ON p.category_id = c.category_id
JOIN brands b ON p.brand_id = b.id
ORDER BY p.product_id ASC
";
$queryPro = mysqli_query($conn, $sqlPro);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/manage_product.css">

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
                        <h4><i class="bi bi-box-seam"></i>หน้าจัดการสินค้า</h4>
                    </div>
                    <!-- content -->
                    <div class="content">
                        <div class="btn_add_pro">
                            <a href="./forms/product_form/add.php">เพิ่มสินค้า</a>
                            <!-- filter -->
                            <div class="filter">
                                <select name="" id="" onchange="filterByCategory(this.value)">
                                    <option value="">ทั้งหมด</option>
                                    <?php while ($rowCategory = mysqli_fetch_array($queryCategory)) { ?>
                                        <option value="<?php echo $rowCategory['category_id'] ?>">
                                            <?php echo $rowCategory['category_name'] ?>
                                        </option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- table container -->
                        <div class="table-container table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>รหัสสินค้า</th>
                                        <th>ชื่อสินค้า</th>
                                        <th>หมวดหมู่</th>
                                        <th>แบรนด์</th>
                                        <th>หน่วย</th>
                                        <th>คำอธิบาย</th>
                                        <th>สร้างขึ้นเมื่อ</th>
                                        <th class="text-center">การจัดการ</th>
                                    </tr>
                                </thead>
                                <?php while ($rowPro = mysqli_fetch_array($queryPro)) { ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $rowPro['product_id'] ?></td>
                                            <td><?php echo $rowPro['product_code'] ?></td>
                                            <td><?php echo $rowPro['product_name'] ?></td>
                                            <td><?php echo $rowPro['type'] ?></td>
                                            <td><?php echo $rowPro['brand'] ?></td>
                                            <td><?php echo $rowPro['unit'] ?></td>
                                            <td>
                                                <?php if (empty($rowPro['description'])) {
                                                    echo "ไม่มี";
                                                } else {
                                                    echo $rowPro['description'];
                                                } ?>
                                            </td>
                                            <td><?php echo $rowPro['created_at'] ?></td>
                                            <td>
                                                <div class="manage">
                                                    <div class="btn-edit">
                                                        <a
                                                            href="forms/product_form/edit.php?id=<?php echo $rowPro['product_id'] ?>"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                    </div>
                                                    <div class="btn-delete">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="proID"
                                                                value="<?php echo $rowPro['product_id'] ?>">
                                                            <button type="submit" name="deletePro"><i
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
<!-- <script src="../js/filterProductByCategory.js"></script> -->
<?php include '../backend/action_manage_product.php' ?>