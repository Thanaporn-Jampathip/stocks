<?php
include '../../../backend/config.php';

// get supplier id from url
if(isset($_GET['id'])){
    $supplierID = $_GET['id'];
}

// fetch supplier
$sqlSupplier = "SELECT * FROM suppliers WHERE supplier_id = '$supplierID'";
$querySupplier = mysqli_query($conn,$sqlSupplier);
$rowSupplier = mysqli_fetch_array($querySupplier);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../css/forms/editSupplier.css">
    <title>add product</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="form-edit-supplier">
                <form action="" method="post">
                    <h5>แก้ไขรายการซัพพลายเออร์</h5>
                    <!-- name co. or store -->
                    <div class="mb-3">
                        <label for="">ชื่อบริษัท / ร้านค้า <span class="text-danger">*</span></label>
                        <input type="text" name="nameSupplier" value="<?php echo $rowSupplier['supplier_name'] ?>" required>
                    </div>
                    <!-- contact and tel -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="">ชื่อผู้ติดต่อ <span class="text-danger">*</span></label>
                                <input type="text" name="contact" value="<?php echo $rowSupplier['contact_person'] ?>" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                <input type="text" name="tel" value="<?php echo $rowSupplier['phone'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <!-- email -->
                    <div class="mb-3">
                        <label for="">อีเมล <span class="text-danger">*</span></label>
                        <input type="email" name="email" value="<?php echo $rowSupplier['email'] ?>" required>
                    </div>
                    <!-- address -->
                    <div class="mb-4">
                        <label for="">ที่อยู่ <span class="text-danger">*</span></label>
                        <textarea name="address" id="" rows="2" required><?php echo $rowSupplier['address'] ?></textarea>
                    </div>
                    <!-- btn -->
                    <div class="btn-edit-supplier mb-2">
                        <input type="hidden" name="supplierID" value="<?php echo $rowSupplier['supplier_id'] ?>">
                        <button type="submit" name="editSupplier">แก้ไข</button>
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