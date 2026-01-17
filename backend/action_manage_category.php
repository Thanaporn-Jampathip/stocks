<?php
// add type
if (isset($_POST['addType'])) {
    $typeName = $_POST['typeName'];
    $description = $_POST['description'];

    // check type name is already exist
    $sqlCheck = "SELECT category_name FROM categories WHERE category_name = '$typeName'";
    $queryCheck = mysqli_query($conn, $sqlCheck);

    if (mysqli_num_rows($queryCheck) == 1) {
        echo "<script>alert('ชื่อหมวดหมู่นี้ถูกใช้ไปแล้ว'); window.location.href='add.php'</script>";
        exit();
    }

    // insert category
    $sqlInsert = "INSERT INTO categories (category_name , description , created_at) VALUES ('$typeName' , '$description' , NOW())";
    $queryInsert = mysqli_query($conn, $sqlInsert);

    if ($queryInsert) {
        echo "<script>alert('เพิ่มสำเร็จ'); window.location.href='../../manage_type.php'</script>";
        exit();
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด'); window.location.href='add.php'</script>";
        exit();
    }
}

// edit type
if (isset($_POST['editType'])) {
    $typeName = $_POST['typeName'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $typeID = $_POST['typeID'];

    // check type name is already exist
    $sqlCheck = "SELECT category_name FROM categories WHERE category_name ='$typeName' AND category_id != '$typeID'";
    $queryCheck = mysqli_query($conn, $sqlCheck);

    if (mysqli_num_rows($queryCheck) >= 1) {
        echo "<script>alert('ชื่อหมวดหมู่นี้ถูกใช้ไปแล้ว'); window.location.href='edit.php?id=$typeID'</script>";
        exit();
    }

    // edit type
    $sqlEditType = "UPDATE categories SET category_name = '$typeName' , description = '$description' , status = '$status' WHERE category_id = '$typeID'";
    $queryEditType = mysqli_query($conn, $sqlEditType);

    if ($queryEditType) {
        echo "<script>alert('แก้ไขสำเร็จ'); window.location.href='../../manage_type.php'</script>";
        exit();
    } else {
        echo "<script>alert('แก้ไขสำเร็จ'); window.location.href='edit.php?id=$typeID'</script>";
        exit();
    }
}
?>