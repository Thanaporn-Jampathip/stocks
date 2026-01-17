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
    <link rel="stylesheet" href="../../../css/forms/addProduct.css">
    <title>add product</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="form-add-pro">
                <form action="" method="post">
                    <h5>เพิ่มรายการซัพพลายเออร์</h5>
                    <!-- name co. or store -->
                    <div class="mb-3">
                        <label for="">ชื่อบริษัท / ร้านค้า <span class="text-danger">*</span></label>
                        <input type="text" name="nameSupplier" required>
                    </div>
                    <!-- contact and tel -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="">ชื่อผู้ติดต่อ <span class="text-danger">*</span></label>
                                <input type="text" name="contact" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                <input type="text" name="tel" required>
                            </div>
                        </div>
                    </div>
                    <!-- email -->
                    <div class="mb-3">
                        <label for="">อีเมล <span class="text-danger">*</span></label>
                        <input type="email" name="email" required>
                    </div>
                    <!-- address -->
                    <div class="mb-4">
                        <label for="">ที่อยู่ <span class="text-danger">*</span></label>
                        <textarea name="address" id="" rows="2" required></textarea>
                    </div>
                    <!-- btn -->
                    <div class="btn-add-pro mb-2">
                        <button type="submit" name="addSupplier">เพิ่ม</button>
                    </div>
                    <div class="btn-back">
                        <a href="../../manage_supplier.php">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php include '../../../backend/action_manage_supplier.php' ?>