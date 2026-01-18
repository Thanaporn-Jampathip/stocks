<?php
// save data
if (isset($_POST['save-data'])) {
    $fullName = $_POST['full_name'];
    $userID = $_POST['userID'];

    $sqlUpdate = "UPDATE users SET full_name = '$fullName' WHERE user_id = '$userID'";
    $queryUpdate = mysqli_query($conn, $sqlUpdate);

    if ($queryUpdate) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จ'); window.location.href='account.php'</script>";
        exit();
    } else {
        echo "<script>alert('เกิดข้แผิดพลาด'); window.location.href='account.php'</script>";
        exit();
    }
}

// edit password
if (isset($_POST['save-password'])) {
    $password = $_POST['password'];
    $Npassword = $_POST['nPassword'];
    $Cpassword = $_POST['cPassword'];
    $userID = $_POST['userID'];

    // check current password
    $sqlCheckCurrentPassword = "SELECT password FROM users WHERE user_id = '$userID' AND password = '$password'";
    $queryCheck = mysqli_query($conn, $sqlCheckCurrentPassword);

    if (mysqli_num_rows($queryCheck) > 0) {
        // check new password match confirm password
        if ($Npassword === $Cpassword) {
            // update password
            $sqlUpdate = "UPDATE users SET password = '$Npassword' WHERE user_id = '$userID'";
            $queryUser = mysqli_query($conn, $sqlUpdate);
            if ($queryUser) {
                echo "<script>alert('เปลี่ยนรหัสผ่านสำเร็จ'); window.location.href='account.php'</script>";
                exit();
            } else {
                echo "<script>alert('เกิดข้อผิดพลาด'); window.location.href='account.php'</script>";
                exit();
            }
        } else {
            echo "<script>alert('รหัสผ่านใหม่ไม่ตรงกัน'); window.location.href='account.php'</script>";
            exit();
        }
    } else {
        echo "<script>alert('รหัสผ่านปัจจุบันไม่ถูกต้อง'); window.location.href='account.php'</script>";
        exit();
    }
}
?>