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

// count all pro
$sqlCountPro = "SELECT COUNT(product_id) as total FROM products";
$queryCountPro = mysqli_query($conn, $sqlCountPro);
$rowCountPro = mysqli_fetch_array($queryCountPro);

// count all pro is almost sold out
$sqlCountProAlmost = "SELECT COUNT(product_id) as total FROM inventory WHERE quantity <= 10 AND quantity > 0";
$queryCountProAlmost = mysqli_query($conn, $sqlCountProAlmost);
$rowCountProAlmost = mysqli_fetch_array($queryCountProAlmost);

// count all pro is sold out
$sqlCountProSoldOut = "SELECT COUNT(product_id) as total FROM inventory WHERE quantity = 0";
$queryCountProSoldOut = mysqli_query($conn, $sqlCountProSoldOut);
$rowCountProSoldOut = mysqli_fetch_array($queryCountProSoldOut);

// fetch category
$sqlCategory = "SELECT category_id as id , category_name as name FROM categories WHERE status = 'enabled'";
$queryCategory = mysqli_query($conn, $sqlCategory);

// fetch all pro - แก้ไข: เพิ่ม category_id
$sqlPro = "
SELECT p.product_id as proID, p.product_name as proName , p.unit , p.product_code as proCode ,
p.category_id as categoryId,
c.category_name as categoryName ,
i.quantity,
b.name as brand
FROM products as p
JOIN categories as c ON p.category_id = c.category_id
JOIN brands as b ON p.brand_id = b.id
JOIN inventory as i ON i.product_id = p.product_id
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
    <link rel="stylesheet" href="../css/storage.css">

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
                <div class="container-storage">
                    <!-- header page -->
                    <div class="header-page">
                        <h4><i class="bi bi-box-seam"></i>หน้าสต็อกคงเหลือ</h4>
                    </div>
                    <!-- content -->
                    <div class="content">
                        <!-- dashboard -->
                        <div class="dashboard">
                            <!-- all products -->
                            <div class="allPro">
                                <div>
                                    <p>
                                        สินค้าทั้งหมด <br>
                                        <span class="fs-4 text-primary"><?php echo $rowCountPro['total']; ?></span>
                                        อย่าง
                                    </p>
                                </div>
                                <div class="ms-auto">
                                    <i class="bi bi-boxes"></i>
                                </div>
                            </div>
                            <!-- almost sole out -->
                            <div class="almost-sold-out">
                                <p>
                                    สิ้นค้าใกล้หมด <br>
                                    <span class="fs-4 text-warning"><?php echo $rowCountProAlmost['total']; ?></span>
                                    อย่าง
                                </p>
                                <div class="ms-auto">
                                    <i class="bi bi-exclamation-triangle"></i>
                                </div>
                            </div>
                            <!-- sold out -->
                            <div class="sold-out">
                                <p>
                                    สิ้นค้าหมด <br>
                                    <span class="fs-4 text-danger"><?php echo $rowCountProSoldOut['total']; ?></span>
                                    อย่าง
                                </p>
                                <div class="ms-auto">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-4 mb-1 align-items-center">
                            <div>
                                <h5>รายการสต็อกสินค้า</h5>
                            </div>
                            <div class="ms-auto d-flex gap-3">
                                <!-- filter -->
                                <div class="filter">
                                    <select name="category" id="filterCategory">
                                        <option value="" selected disabled>เลือกหมวดหมู่</option>
                                        <option value="">ทั้งหมด</option>
                                        <?php
                                        mysqli_data_seek($queryCategory, 0); // รีเซ็ต pointer
                                        while ($rowCategory = mysqli_fetch_assoc($queryCategory)) { ?>
                                            <option value="<?php echo $rowCategory['id']; ?>">
                                                <?php echo $rowCategory['name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="filter">
                                    <select name="status" id="filterStatus">
                                        <option value="" selected disabled>เลือกสถานะ</option>
                                        <option value="">ทั้งหมด</option>
                                        <option value="almost_sold_out">ใกล้หมด</option>
                                        <option value="sold_out">หมด</option>
                                        <option value="in_stock">มีสินค้า</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- table-container -->
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>รหัสสินค้า</th>
                                        <th>ชื่อสินค้า</th>
                                        <th>หมวดหมู่</th>
                                        <th>แบรนด์</th>
                                        <th>จำนวนคงเหลือ</th>
                                        <th class='text-center'>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody id="productTableBody">
                                    <?php while ($rowPro = mysqli_fetch_array($queryPro)) {
                                        // กำหนดสถานะของสินค้า
                                        if ($rowPro['quantity'] == 0) {
                                            $status = 'sold_out';
                                            $statusBadge = "<span class='bg-danger py-1 px-2 rounded-pill text-light'>หมด</span>";
                                        } elseif ($rowPro['quantity'] <= 10) {
                                            $status = 'almost_sold_out';
                                            $statusBadge = "<span class='bg-warning py-1 px-2 rounded-pill text-light'>ใกล้หมด</span>";
                                        } else {
                                            $status = 'in_stock';
                                            $statusBadge = "<span class='bg-success py-1 px-2 rounded-pill text-light'>มีสินค้า</span>";
                                        }
                                        ?>
                                        <tr data-category="<?php echo $rowPro['categoryId']; ?>"
                                            data-status="<?php echo $status; ?>">
                                            <td><?php echo $rowPro['proCode']; ?></td>
                                            <td><?php echo $rowPro['proName']; ?></td>
                                            <td><?php echo $rowPro['categoryName']; ?></td>
                                            <td><?php echo $rowPro['brand']; ?></td>
                                            <td><?php echo $rowPro['quantity'] . " " . $rowPro['unit']; ?></td>
                                            <td class="text-center">
                                                <?php echo $statusBadge; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
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
<script src="../js/filterProByStatusAndCategory.js"></script>
<?php include '../backend/action_manage_product.php' ?>