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
    <link rel="stylesheet" href="../../../css/forms/addBrand.css">
    <title>add product</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="form-add-brand">
                <form action="" method="post">
                    <h5>เพิ่มรายการแบรนด์</h5>
                    <!-- brand name -->
                    <div class="mb-4">
                        <label for="">ชื่อแบรนด์ <span class="text-danger">*</span></label>
                        <input type="text" name="ิbrandName" required>
                    </div>
                    <!-- btn -->
                    <div class="btn-add-brand mb-2">
                        <button type="submit" name="addBrand">เพิ่ม</button>
                    </div>
                    <div class="btn-back">
                        <a href="../../manage_brand.php">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php include '../../../backend/action_manage_brand.php' ?>