<?php

include '../backend/config.php';

// // ตรวจสอบการ Login
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = clean($_POST['username']);
//     $password = $_POST['password'];
    
//     // ดึงข้อมูล User จากฐานข้อมูล
//     $sql = "SELECT * FROM users WHERE username = '$username'";
//     $result = $conn->query($sql);
    
//     if ($result->num_rows > 0) {
//         $user = $result->fetch_assoc();
        
//         // ตรวจสอบรหัสผ่าน (ใช้ MD5 ตามที่กำหนดใน SQL)
//         if (md5($password) == $user['password']) {
//             // Login สำเร็จ - เก็บข้อมูลใน Session
//             $_SESSION['user_id'] = $user['user_id'];
//             $_SESSION['username'] = $user['username'];
//             $_SESSION['full_name'] = $user['full_name'];
//             $_SESSION['role'] = $user['role'];
            
//             setAlert('success', 'เข้าสู่ระบบสำเร็จ');
//             redirect('dashboard.php');
//         } else {
//             $error = "รหัสผ่านไม่ถูกต้อง";
//         }
//     } else {
//         $error = "ไม่พบชื่อผู้ใช้นี้ในระบบ";
//     }
// }
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - ระบบคลังสินค้า เขมจิรา</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="login-card">
        <div class="card">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <i class="fas fa-store fa-3x text-primary mb-3"></i>
                    <h2 class="fw-bold" style="color: #667eea;">เขมจิรา บิวตี้ช็อป</h2>
                    <p class="text-muted">ระบบจัดการคลังสินค้า</p>
                </div>

                <form method="post" action="">
                    <div class="mb-3">
                        <label class="form-label">ชื่อผู้ใช้</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">รหัสผ่าน</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>

                    <button type="submit" name="login" class="btn btn-primary w-100 py-2">
                        <i class="fas fa-sign-in-alt me-2"></i>เข้าสู่ระบบ
                    </button>
                </form>

                <div class="mt-4 p-3 bg-light rounded">
                    <small class="text-muted">
                        <strong>ทดลองใช้งาน:</strong><br>
                        Admin: <code>admin</code> / <code>admin123</code><br>
                        Staff: <code>staff01</code> / <code>staff123</code>
                    </small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include '../backend/action_login.php' ?>