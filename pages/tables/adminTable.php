<?php
// fetch data admin
$sqlAdmin = "SELECT user_id as id , username , full_name , created_at FROM users WHERE role = '1'";
$queryAdmin = mysqli_query($conn, $sqlAdmin);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tables/adminTable.css">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อผู้ใช้งาน</th>
                <th>ชื่อ - นามสกุล</th>
                <th>สร้างขึ้นเมื่อ</th>
            </tr>
        </thead>
        <?php while ($rowAdmin = mysqli_fetch_array($queryAdmin)) { ?>
            <tbody>
                <tr>
                    <td><?php echo $rowAdmin['id'] ?></td>
                    <td><?php echo $rowAdmin['username'] ?></td>
                    <td><?php echo $rowAdmin['full_name'] ?></td>
                    <td><?php echo $rowAdmin['created_at'] ?></td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</body>

</html>