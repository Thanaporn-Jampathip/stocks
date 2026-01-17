<?php
include '../../../backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../css/forms/addCategory.css">
    <title>add product</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="form-add-pro">
                <form action="" method="post">
                    <h5>เพิ่มรายการหมวดหมู่สินค้า</h5>
                    <!-- category name -->
                    <div class="mb-3">
                        <label for="">ชื่อหมวดหมู่ <span class="text-danger">*</span></label>
                        <input type="text" name="typeName" required>
                    </div>
                    <!-- description -->
                    <div class="mb-4">
                        <label for="">รายละเอียด <span class="text-danger">*</span></label>
                        <textarea name="description" id="" rows="2" required></textarea>
                    </div>
                    <!-- btn -->
                    <div class="btn-add-pro mb-2">
                        <button type="submit" name="addType">เพิ่ม</button>
                    </div>
                    <div class="btn-back">
                        <a href="../../manage_type.php">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php include '../../../backend/action_manage_category.php' ?>