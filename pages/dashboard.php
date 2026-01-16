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
// $pageTitle = 'Dashboard';

// // ดึงข้อมูลสถิติ
// $stats = [
//     'total_products' => 0,
//     'total_stock' => 0,
//     'low_stock' => 0,
//     'out_stock' => 0
// ];

// // นับจำนวนสินค้าทั้งหมด
// $result = $conn->query("SELECT COUNT(*) as total FROM products");
// $stats['total_products'] = $result->fetch_assoc()['total'];

// // นับสต็อกรวม
// $result = $conn->query("SELECT SUM(quantity) as total FROM inventory");
// $row = $result->fetch_assoc();
// $stats['total_stock'] = $row['total'] ?? 0;

// // สินค้าใกล้หมด (quantity <= min_stock)
// $result = $conn->query("
//     SELECT COUNT(*) as total 
//     FROM inventory i 
//     JOIN products p ON i.product_id = p.product_id 
//     WHERE i.quantity <= p.min_stock AND i.quantity > 0
// ");
// $stats['low_stock'] = $result->fetch_assoc()['total'];

// // สินค้าหมด
// $result = $conn->query("SELECT COUNT(*) as total FROM inventory WHERE quantity = 0");
// $stats['out_stock'] = $result->fetch_assoc()['total'];

// // ดึงรายการสินค้าที่ต้องเร่งสั่ง
// $lowStockProducts = $conn->query("
//     SELECT p.product_code, p.product_name, i.quantity, p.min_stock, p.unit
//     FROM products p
//     JOIN inventory i ON p.product_id = i.product_id
//     WHERE i.quantity <= p.min_stock
//     ORDER BY i.quantity ASC
//     LIMIT 10
// ");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">

    <title>Dashboard</title>
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
                asdas
            </main>

            <!-- Footer -->
            <?php include '../components/footer.php'; ?>
        </div>
    </div>

</body>

</html>