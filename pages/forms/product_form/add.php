<?php
include '../../../backend/config.php';

// fetch all type
$sqlType = "SELECT category_id as id , category_name as name FROM categories";
$queryType = mysqli_query($conn, $sqlType);

// fetch all brand
$sqlBrand = "SELECT * FROM brands";
$queryBrand = mysqli_query($conn, $sqlBrand);
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
                    <h5>เพิ่มรายการสินค้า</h5>
                    <!-- code pro and name pro -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="">รหัสสินค้า <span class="text-danger">*</span></label>
                                <input type="text" name="proCode" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="">ชื่อสินค้า <span class="text-danger">*</span></label>
                                <input type="text" name="proName" required>
                            </div>
                        </div>
                    </div>
                    <!-- type and brand -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="">หมวดหมู่ <span class="text-danger">*</span></label>
                                <select name="type" id="" required>
                                    <option value="" selected disabled>เลือกหมวดหมู่</option>
                                    <?php while ($rowType = mysqli_fetch_array($queryType)) { ?>
                                        <option value="<?php echo $rowType['id'] ?>"><?php echo $rowType['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="">แบรนด์ <span class="text-danger">*</span></label>
                                <select name="brand" id="">
                                    <option value="" selected disabled>เลือกแบรนด์</option>
                                    <?php while ($rowBrand = mysqli_fetch_array($queryBrand)) { ?>
                                        <option value="<?php echo $rowBrand['id'] ?>">
                                            <?php echo $rowBrand['name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- unit and min stock -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="">หน่วย <span class="text-danger">*</span></label>
                                <select name="unit" id="" required>
                                    <option value="" selected disabled>เลือกหน่วย</option>
                                    <option value="ขวด">ขวด</option>
                                    <option value="ตลับ">ตลับ</option>
                                    <option value="ซอง">ซอง</option>
                                    <option value="แท่ง">แท่ง</option>
                                    <option value="กระปุก">กระปุก</option>
                                    <option value="กล่อง">กล่อง</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="">สต็อกขั้นต่ำ <span class="text-danger">*</span></label>
                                <input type="int" name="min_stock" placeholder="จำนวนเต็มเท่านั้น" required>
                            </div>
                        </div>
                    </div>
                    <!-- description -->
                    <div class="mb-4">
                        <label for="">รายละเอียด</label>
                        <textarea name="description" id="" rows="2"></textarea>
                    </div>
                    <!-- btn -->
                    <div class="btn-add-pro mb-2">
                        <button type="submit" name="addProduct">เพิ่ม</button>
                    </div>
                    <div class="btn-back">
                        <a href="../../manage_product.php">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php include '../../../backend/action_manage_product.php' ?>