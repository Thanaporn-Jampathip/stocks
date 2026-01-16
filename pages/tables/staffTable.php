<?php
// fetch data staff
$sqlStaff = "SELECT user_id as id , username , full_name , created_at FROM users WHERE role = 'staff'";
$queryStaff = mysqli_query($conn, $sqlStaff);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tables/staffTable.css">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อผู้ใช้งาน</th>
                <th>ชื่อ - นามสกุล</th>
                <th>สร้างขขึ้นเมื่อ</th>
            </tr>
        </thead>
        <?php while ($rowStaff = mysqli_fetch_array($queryStaff)) { ?>
            <tbody>
                <tr>
                    <td>
                        <?php echo $rowStaff['id'] ?>
                    </td>
                    <td>
                        <?php echo $rowStaff['username'] ?>
                    </td>
                    <td>
                        <?php echo $rowStaff['full_name'] ?>
                    </td>
                    <td>
                        <?php echo $rowStaff['created_at'] ?>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</body>

</html>