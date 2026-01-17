<?php
// add product
if (isset($_POST['addProduct'])) {
    $proCode = $_POST['proCode'];
    $proName = $_POST['proName'];
    $typeID = $_POST['type'];
    $brand = $_POST['brand'];
    $unit = $_POST['unit'];
    $minStock = $_POST['min_stock'];
    $description = $_POST['description'] ?? null;

    // check code product already exist
    $sqlCheckCode = "SELECT product_code FROM products WHERE product_code = '$proCode'";
    $queryCheckCode = mysqli_query($conn, $sqlCheckCode);

    if (mysqli_num_rows($queryCheckCode) == 1) {
        echo '<script>alert("this code is used"); window.location.href="add.php"</script>';
        exit();
    }

    // check name product already exist
    $sqlCheckName = "SELECT product_name FROM products WHERE product_name = '$proName'";
    $queryCheckName = mysqli_query($conn, $sqlCheckName);

    if (mysqli_num_rows($queryCheckName) == 1) {
        echo '<script>alert("this name is used"); window.location.href="add.php"</script>';
        exit();
    }

    // insert pro
    $sqlInsertPro = "INSERT INTO products (product_code, product_name, category_id , brand_id , unit , min_stock, description, created_at) VALUES ('$proCode' , '$proName' , '$typeID' ,'$brand' , '$unit' , '$minStock','$description',NOW())";
    $queryInsertPro = mysqli_query($conn, $sqlInsertPro);

    if ($queryInsertPro) {
        echo '<script>alert("เพิ่มสำเร็จ"); window.location.href="../../manage_product.php"</script>';
    } else {
        echo '<script>alert("เกิดข้อผิดพลาด"); window.location.href="add.php"</script>';
    }
}

// edit product
if (isset($_POST['editProduct'])) {
    $proCode = $_POST['proCode'];
    $proName = $_POST['proName'];
    $typeID = $_POST['type'];
    $brandID = $_POST['brand'];
    $unit = $_POST['unit'];
    $min_stock = $_POST['min_stock'];
    $description = $_POST['description'] ?? null;

    $proID = $_POST['proID'];

    // check name is already exist
    $sqlCheckName = "SELECT product_name FROM products WHERE product_name = '$proName' AND product_id != '$proID'";
    $queryCheckName = mysqli_query($conn, $sqlCheckName);

    if (mysqli_num_rows($queryCheckName) >= 1) {
        echo "<script>alert('ชื่อนี้ถูกใช้ไปแล้ว'); window.location.href='edit.php?id=$proID'</script>";
    }

    // check pro code is already exist
    $sqlCheckCode = "SELECT product_code FROM products WHERE product_code = '$proCode' AND product_id != '$proID'";
    $queryCheckCode = mysqli_query($conn, $sqlCheckCode);

    if (mysqli_num_rows($queryCheckCode) >= 1) {
        echo "<script>alert('รหัสสินค้านี้ถูกใช้ไปแล้ว'); window.location.href='edit.php?id=$proID'</script>";
    }

    // edit product
    $sqlEdit = "UPDATE products SET product_code = '$proCode', product_name = '$proName' , category_id = '$typeID' , brand_id = '$brandID' , unit = '$unit' , min_stock = '$min_stock' , description = '$description' WHERE product_id = '$proID'";
    $queryEdit = mysqli_query($conn, $sqlEdit);

    if ($queryEdit) {
        echo "<script>alert('แก้ไขสำเร็จ'); window.location.href='../../manage_product.php'</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด'); window.location.href='edit.php'</script>";
    }
}

// delete product
if (isset($_POST['deletePro'])) {
    $proID = $_POST['proID'];

    // delete product in inventory table
    $sqlDeleteInventory = "DELETE FROM inventory WHERE product_id = '$proID'";
    $queryDeleteInventory = mysqli_query($conn,$sqlDeleteInventory);

    // delete product in products table
    $sqlDeletePro = "DELETE FROM products WHERE product_id = '$proID'";
    $queryDeletePro = mysqli_query($conn, $sqlDeletePro);

    if ($queryDeletePro) {
        echo '<script>alert("ลบสำเร็จ"); window.location.href="manage_product.php"</script>';
    } else {
        echo '<script>alert("ลบสำเร็จ"); window.location.href="manage_product.php"</script>';
    }
}
?>