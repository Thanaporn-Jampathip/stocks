<?php
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sqlLogin = "SELECT user_id , role ,username , password FROM users WHERE username = '$username' AND password = '$password'";
    $queryLogin = mysqli_query($conn, $sqlLogin);

    if (mysqli_num_rows($queryLogin) == 1) {
        $user = mysqli_fetch_array($queryLogin);
        $_SESSION['userRole'] = $user['role'];
        $_SESSION['userID'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];

        echo '<script>alert("เข้าสู่ระบบสำเร็จ")</script>';
        echo '<script>window.location.href="dashboard.php"</script>';
    } else {
        echo '<script>alert("เกิดข้อผิดพลาด")</script>';
        echo '<script>window.location.href="login.php"</script>';
    }
}
?>