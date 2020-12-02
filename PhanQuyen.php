<?php
session_start();
require_once('header.php');
?>
<body>
<?php
    require_once("mainMenu.php");
?>
<div class="container">
    <h3>Admin</h3>

    <table class="table table-hover">
        <tr>
            <th>username</th>
            <th>password</th>
            <th>HoTen</th>
            <th>NgaySinh</th>
            <th>Email</th>
            <th>SoDienThoai</th>
            <th>ChucVu</th>
        </tr>
        <tr>
            <?php
            $sql="Select * from user";
            $result = $conn->query($sql);
            $email='';
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>" . $row['HoTen'] . "</td>";
                        echo "<td>" . $row['NgaySinh'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['SoDienThoai'] . "</td>";
                        echo "<form method='post' action='PhanQuyen.php'>";
                        echo '<td><select name="ChucVu">';
                        echo "<option value='Admin' selected='selected'>Admin</option>";
                        echo "<option value='GiaoVien'>GiaoVien</option>";
                        echo "<option value='HocVien'>HocVien</option>";
                        echo "</select></td>";
                        echo "<td><button type='submit' name='update'>Update ChucVu</button></td>";
                        echo "</form>";
                        echo "</tr>";
                    
                }
            }
            if (isset($_POST['update'])) {
                $value = $_POST['ChucVu'];
                $email = $row['Email'];
                $sql = "update user set ChucVu='$value' when Email='$email'";
                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>Cập nhật thành công</div>";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
            ?>
        </tr>
    </table>
</div>
<?php


?>
</body>
</html>