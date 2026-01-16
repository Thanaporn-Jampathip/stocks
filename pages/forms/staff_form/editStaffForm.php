<?php
include '../../../backend/config.php';
// get staff id form url
if(isset($_GET['id'])){
    $staffID = $_GET['id'];
}

// fetch data staff by staff id
$sqlStaff = "SELECT username , password , full_name FROM users WHERE user_id = $staffID";
$queryStaff = mysqli_query($conn,$sqlStaff);
$rowStaff = mysqli_fetch_array($queryStaff);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../css/forms/staffForm.css">

    <title>Form Add Admin</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="form-add-admin">
                <form action="" method="post">
                    <h5>แก้ไขรายชื่อพนักงาน</h5>
                    <div class="mb-3">
                        <label for="">ชื่อผู้ใช้งาน</label>
                        <input type="text" name="username" value="<?php echo $rowStaff['username'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="">ชื่อ - นามสกุล</label>
                        <input type="text" name="fullname" value="<?php echo $rowStaff['full_name'] ?>" required>
                    </div>
                    <!-- <div class="mb-4">
                        <label for="">รหัสผ่าน</label>
                        <input type="text" name="password" required>
                    </div> -->
                    <!-- btn -->
                    <div class="btn-add-admin mb-2">
                        <input type="hidden" name="staffID" value="<?php echo $staffID; ?>">
                        <button type="submit" name="editStaff">แก้ไข</button>
                    </div>
                    <div class="btn-back">
                        <a href="../../manage_user.php?role=staff">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php include '../../../backend/action_manage_people.php' ?>