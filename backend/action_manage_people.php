<?php
// add admin 
if (isset($_POST['addAdmin'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];

    // check username already exist
    $sqlCheck = "SELECT username FROM users WHERE username = '$username'";
    $queryCheck = mysqli_query($conn, $sqlCheck);

    if (mysqli_num_rows($queryCheck) == 1) {
        echo "<script>alert('ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว'); window.location.href='adminForm.php'</script>";
        exit();
    }

    // insert admin
    $sqlInsertAdmin = "INSERT INTO users (username , password , full_name , role , created_at) VALUES ('$username' , '$password' , '$fullname' , 'admin' , NOW())";
    $queryInsertAdmin = mysqli_query($conn, $sqlInsertAdmin);

    if ($queryInsertAdmin) {
        echo "<script>alert('เพิ่มสำเร็จ'); window.location.href='../manage_user.php?role=admin'</script>";
        exit();
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด'); window.location.href='../manage_user.php?role=admin'</script>";
        exit();
    }
}

// delete admin from super admin ??

// add staff

?>