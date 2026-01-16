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
        echo "<script>alert('เพิ่มสำเร็จ'); window.location.href='../../manage_user.php?role=admin'</script>";
        exit();
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด'); window.location.href='../../manage_user.php?role=admin'</script>";
        exit();
    }
}

// delete admin from super admin ??

// add staff
if (isset($_POST['addStaff'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];

    // check username already exist
    $sqlCheck = "SELECT username FROM users WHERE username = '$username' AND role = 'staff'";
    $queryCheck = mysqli_query($conn, $sqlCheck);

    if (mysqli_num_rows($queryCheck) == 1) {
        echo "<script>alert('ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว'); window.location.href='staffForm.php'</script>";
        exit();
    }

    // insert staff
    $sqlInsertAdmin = "INSERT INTO users (username , password , full_name , role , created_at) VALUES ('$username' , '$password' , '$fullname' , 'staff' , NOW())";
    $queryInsertAdmin = mysqli_query($conn, $sqlInsertAdmin);

    if ($queryInsertAdmin) {
        echo "<script>alert('เพิ่มสำเร็จ'); window.location.href='../../manage_user.php?role=staff'</script>";
        exit();
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด'); window.location.href='../../manage_user.php?role=staff'</script>";
        exit();
    }
}

// edit staff
if (isset($_POST['editStaff'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $staffID = $_POST['staffID'];

    // check username already exist
    $sqlCheck = "SELECT username FROM users WHERE username = '$username'";
    $queryCheck = mysqli_query($conn, $sqlCheck);

    if (mysqli_num_rows($queryCheck) == 1) {
        echo "<script>alert('ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว'); window.location.href='editStaffForm.php?id=$staffID</script>";
        exit();
    }

    // edit staff
    $sqlEditStaff = "UPDATE users SET username = '$username' , full_name = '$fullname' WHERE user_id = $staffID AND role = 'staff'";
    $queryEditStaff = mysqli_query($conn, $sqlEditStaff);

    if ($queryEditStaff) {
        echo "<script>alert('แก้ไขสำเร็จ'); window.location.href='../../manage_user.php?role=staff'</script>";
        exit();
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด'); window.location.href='manage_user.php?role=staff'</script>";
        exit();
    }
}

// delete staff
if (isset($_POST['deleteStaff'])) {
    $staffID = $_POST['staffID'];

    $sqlDelete = "DELETE FROM users WHERE user_id = $staffID";
    $queryDelete = mysqli_query($conn, $sqlDelete);

    if ($queryDelete) {
        echo "<script>alert('ลบสำเร็จ'); window.location.href='manage_user.php?role=staff'</script>";
        exit();
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด'); window.location.href='manage_user.php?role=staff'</script>";
        exit();
    }
}
?>