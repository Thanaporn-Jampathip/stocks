<?php
// fetch data admin
$sqlUsers = "SELECT user_id as id , username , full_name , role , created_at FROM users";
$queryUsers = mysqli_query($conn, $sqlUsers);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tables/allUserTable.css">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อผู้ใช้งาน</th>
                <th>ชื่อ - นามสกุล</th>
                <th>บทบาท</th>
                <th>สร้างขึ้นเมื่อ</th>
            </tr>
        </thead>
        <?php while ($rowUsers = mysqli_fetch_array($queryUsers)) { ?>
            <tbody>
                <tr>
                    <td><?php echo $rowUsers['id'] ?></td>
                    <td><?php echo $rowUsers['username'] ?></td>
                    <td><?php echo $rowUsers['full_name'] ?></td>
                    <td>
                        <?php if ($rowUsers['role'] === '1') {
                            echo "<span class='text-light bg-danger px-3 py-1 rounded-pill'>แอดมิน</span>";
                        } else {
                            echo "<span class='text-light bg-success px-3 py-1 rounded-pill'>พนักงาน</span>";
                        } ?>
                    </td>
                    <td><?php echo $rowUsers['created_at'] ?></td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</body>

</html>