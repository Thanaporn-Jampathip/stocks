<?php
include '../../../backend/config.php';

// get proID form url 
if(isset($_GET['id'])){
    $proID = $_GET['id'];
}

// fetch data pro by proID
$sqlPro = "
SELECT p.*, c.category_id as typeID , category_name as type 
FROM products p
JOIN categories c ON p.category_id = c.category_id
WHERE p.product_id = $proID;
";
$queryPro = mysqli_query($conn,$sqlPro);
$rowPro = mysqli_fetch_array($queryPro);

// fetch type
$sqlType = "SELECT category_id as id , category_name as name FROM categories WHERE status = 'enabled'";
$queryType = mysqli_query($conn,$sqlType);

// fetch brand
$sqlBrand = "SELECT * FROM brands WHERE status = 'enabled'";
$queryBrand = mysqli_query($conn,$sqlBrand);

// Debug
// echo "Unit value: [" . $rowPro['unit'] . "]<br>";
// echo "Length: " . strlen($rowPro['unit']) . "<br>";
// echo "Bytes: " . bin2hex($rowPro['unit']) . "<br>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../css/forms/editProduct.css">
    <title>edit product</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="form-edit-pro">
                <form action="" method="post">
                    <h5>แก้ไขสินค้า</h5>
                    <!-- code pro and name pro -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="">รหัสสินค้า <span class="text-danger">*</span></label>
                                <input type="text" name="proCode" value="<?php echo $rowPro['product_code'] ?>" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="">ชื่อสินค้า <span class="text-danger">*</span></label>
                                <input type="text" name="proName" value="<?php echo $rowPro['product_name'] ?>" required>
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
                                        <option value="<?php echo $rowType['id'] ?>" <?php echo ($rowType['id' === $rowPro['typeID']]) ? 'selected' : '' ?>>
                                            <?php echo $rowType['name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="">แบรนด์ <span class="text-danger">*</span></label>
                                <select name="brand" id="">
                                    <option value="" selected disabled>เลือกแบรนด์</option>
                                    <?php while($rowBrand = mysqli_fetch_array($queryBrand)){ ?>
                                    <option value="<?php echo $rowBrand['id'] ?>" <?php echo ($rowPro['brand_id'] === $rowBrand['id']) ? 'selected' : ''; ?>><?php echo $rowBrand['name'] ?></option>
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
                                    <option value="ขวด" <?php echo ($rowPro['unit'] === 'ขวด') ? 'selected' : '' ;?>>ขวด</option>
                                    <option value="ตลับ" <?php echo ($rowPro['unit'] === 'ตลับ') ? 'selected' : '' ;?>>ตลับ</option>
                                    <option value="ซอง" <?php echo ($rowPro['unit'] === 'ซอง') ? 'selected' : '' ;?>>ซอง</option>
                                    <option value="แท่ง" <?php echo ($rowPro['unit'] === 'แท่ง') ? 'selected' : '' ;?>>แท่ง</option>
                                    <option value="กระปุก" <?php echo ($rowPro['unit'] === 'กระปุก') ? 'selected' : '' ;?>>กระปุก</option>
                                    <option value="กล่อง" <?php echo ($rowPro['unit'] === 'กล่อง') ? 'selected' : '' ;?>>กล่อง</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="">สต็อกขั้นต่ำ <span class="text-danger">*</span></label>
                                <input type="int" name="min_stock" value="<?php echo $rowPro['min_stock'] ?>" placeholder="จำนวนเต็มเท่านั้น" required>
                            </div>
                        </div>
                    </div>
                    <!-- description -->
                    <div class="mb-4">
                        <label for="">รายละเอียด</label>
                        <textarea name="description" id="" rows="2" value="<?php echo $rowPro['description'] ?>"></textarea>
                    </div>
                    <!-- btn -->
                    <div class="btn-edit-pro mb-2">
                        <input type="hidden" name="proID" value="<?php echo $rowPro['product_id'] ?>">
                        <button type="submit" name="editProduct">แก้ไข</button>
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