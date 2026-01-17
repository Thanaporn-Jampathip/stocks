<?php
// add supplier
if (isset($_POST['addSupplier'])) {
    $nameSupplier = $_POST['nameSupplier'];
    $contact = $_POST['contact'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // check supplier has already
    $sqlCheck = "SELECT supplier_name FROM suppliers WHERE supplier_name = '$nameSupplier'";
    $queryCheck = mysqli_query($conn, $sqlCheck);

    if (mysqli_num_rows($queryCheck) == 1) {
        echo "<script>alert('มีซัพพลายเออร์นี้อยู่แล้ว'); window.location.href='add.php'</script>";
        exit();
    }

    // insert supplier
    $sqlInsertSupplier = "INSERT INTO suppliers (supplier_name , contact_person , phone , email , address , created_at) VALUES ('$nameSupplier' , '$contact' , '$tel' , '$email' ,'$address' , NOW())";
    $queryInsertSupplier = mysqli_query($conn, $sqlInsertSupplier);

    if ($queryInsertSupplier) {
        echo "<script>alert('เพิ่มสำเร็จ'); window.location.href='../../manage_supplier.php'</script>";
        exit();
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด'); window.location.href='add.php'</script>";
        exit();
    }
}

// edit supplier
if (isset($_POST['editSupplier'])) {
    $nameSupplier = $_POST['nameSupplier'];
    $contact = $_POST['contact'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $supplierID = $_POST['supplierID'];

    // check supplier name is alreadt exist
    $sqlCheck = "SELECT supplier_name FROM suppliers WHERE supplier_name = '$nameSupplier' AND supplier_id != '$supplierID'";
    $queryCheck = mysqli_query($conn, $sqlCheck);

    if (mysqli_num_rows($queryCheck) == 1) {
        echo "<script>alert('มีซัพพลายเออร์นี้อยู่แล้ว'); window.location.href='edit.php?id=$supplierID'</script>";
        exit();
    }

    // edit supplier 
    $sqlEditSupplier = "UPDATE suppliers SET supplier_name = '$nameSupplier' , contact_person = '$contact' , phone = '$tel' , email = '$email', address = '$address' WHERE supplier_id = '$supplierID'";
    $queryEditSupplier = mysqli_query($conn, $sqlEditSupplier);

    if ($queryEditSupplier) {
        echo "<script>alert('แก้ไขสำเร็จ'); window.location.href='../../manage_supplier.php'</script>";
        exit();
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด'); window.location.href='edit.php?id=$supplierID'</script>";
        exit();
    }
}

// delete supplier 
if (isset($_POST['deleteSupplier'])) {
    $supplierID = $_POST['supplierID'];

    // delete supplier
    $sqlDelete = "DELETE FROM suppliers WHERE supplier_id = '$supplierID'";
    $queryDelete = mysqli_query($conn, $sqlDelete);

    if ($queryDelete) {
        echo "<script>alert('ลบสำเร็จ'); window.location.href='manage_supplier.php'</script>";
        exit();
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด'); window.location.href='manage_supplier.php'</script>";
        exit();
    }
}
?>