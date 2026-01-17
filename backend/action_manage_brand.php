<?php
// add brand
if (isset($_POST['addBrand'])) {
    $brandName = $_POST['ิbrandName'];

    // check brand name is already exist
    $sqlCheck = "SELECT name FROM brands WHERE name = '$brandName'";
    $queryCheck = mysqli_query($conn, $sqlCheck);

    if (mysqli_num_rows($queryCheck) == 1) {
        echo "<script>alert('แบรนด์นี้มีแล้ว'); window.location.href='add.php'</script>";
        exit();
    }

    // insert brand
    $sqlInsertBrand = "INSERT INTO brands (name, created_at) VALUES ('$brandName' , NOW())";
    $queryInsertBrand = mysqli_query($conn, $sqlInsertBrand);

    if ($queryInsertBrand) {
        echo "<script>alert('เพิ่มสำเร็จ'); window.location.href='../../manage_brand.php'</script>";
        exit();
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด'); window.location.href='add.php'</script>";
        exit();
    }
}

// edit brand
if(isset($_POST['editBrand'])){
    $brandName = $_POST['ิbrandName'];
    $status = $_POST['status'];
    $brandID = $_POST['brandID'];

    // check brand name is already exist
    $sqlCheck = "SELECT name FROM brands WHERE name = '$brandName' AND id != '$brandID'";
    $queryCheck = mysqli_query($conn,$sqlCheck);

    if(mysqli_num_rows($queryCheck) == 1){
        echo "<script>alert('แบรนด์นี้มีแล้ว'); window.location.href='edit.php?id=$brandID'</script>";
        exit();
    }

    // edit brand 
    $sqlEditBrand = "UPDATE brands SET name = '$brandName' , status = '$status' WHERE id = '$brandID'";
    $queryEditBrand = mysqli_query($conn,$sqlEditBrand);

    if($queryEditBrand){
        echo "<script>alert('แก้ไขสำเร็จ'); window.location.href='../../manage_brand.php'</script>";
        exit();
    }else{
        echo "<script>alert('เกิดข้อผิดพลาด'); window.location.href='edit.php'</script>";
        exit();
    }
}
?>