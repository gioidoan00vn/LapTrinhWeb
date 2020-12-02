<?php
    require_once('header.php');
    include "database.php";
    $conn=ConnectDB();
    $sql="Select Email from user";
    $result = $conn->query($sql);
    $success='';
    $error ='';
    $username = '';
    $pass = '';
    $hoTen='';
    $date ='';
    $email='';
    $phone='';
    if ($result->num_rows > 0) {
    // output data of each row
        while ($row = $result->fetch_assoc()) {
            if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['name'])
                && isset($_POST['date']) && isset($_POST['mail']) && isset($_POST['phone'])) {
                $username = $_POST['user'];
                $pass = $_POST['pass'];
                $hoTen = $_POST['name'];
                $date = $_POST['date'];
                $email = $_POST['mail'];
                $phone = $_POST['phone'];
                if (empty($username)) {
                    $error = 'Hãy nhập username';
                } else if (intval($pass) < 6) {
                    $error = 'Hãy nhập password trên 6 kí tự';
                } else if (empty($pass)) {
                    $error = 'Hãy nhập password';
                } else if (empty($hoTen)) {
                    $error = 'Hãy nhập Họ Tên';
                } else if (empty($date)) {
                    $error = 'Hãy chọn ngày sinh';
                } else if (empty($email)) {
                    $error = 'Hãy nhập email';
                } else if ($email === $row['Email']) {
                    $error='Email đã tồn tại';
                } else if (empty($phone)) {
                    $error = 'Hãy nhập số điện thoại';
                } else {

                    $sql = "INSERT INTO user (username, password, HoTen, NgaySinh, Email, SoDienThoai, ChucVu)
                        VALUES ('$username', '$pass', '$hoTen', '$date','$email', '$phone', 'HocVien')";
                    if (mysqli_query($conn, $sql)) {
                        $success = "Đăng kí thành công";
                    } else {
                        
                    }
                }
            }
        }
    }
?>
<body>
<div class="register-page">
    <form class="register-form" action="" method="post">
        <h2>ĐĂNG KÍ CLASSROOM</h2>
        <table>
            <tr>
                <td><input class="input-login" name="user" value="<?= $username?>" type="text" placeholder="Enter username"/></td>
            </tr>
            <tr>
                <td><input class="input-login" name="pass" value="<?= $pass?>" type="password" placeholder="Enter password"/></td>
            </tr>
            <tr>
                <td><input class="input-login" name="name" value="<?= $hoTen?>" type="text" placeholder="Enter Full name"/></td>
            </tr>
            <tr>
                <td><input class="input-login" name="date" value="<?= $date?>" type="date" placeholder="22/02/2000"/></td>
            </tr>
            <tr>
                <td><input class="input-login" name="mail" value="<?= $email?>" type="text" placeholder="Enter email address"/></td>
            </tr>
            <tr>
                <td><input class="input-login" name="phone" value="<?= $phone?>" type="text" placeholder="Enter your phone 0-9"></td>
            </tr>
            <tr>
                <td><button type="submit" id="button-login">Create</button></td>
            </tr>
            <tr>
                <div class="form-group">
                    <?php
                    if (!empty($error)) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                    ?>
                </div>
            </tr>
            <tr>
                <td><p class="message">Already registered? <a href="Login.php">Sign In</a></p></td>
            </tr>
            <div class="form-group">
                <?php
                if (!empty($success)) {
                    echo "<div class='alert alert-success'>$success</div>";
                }
                ?>
            </div>
        </table>

    </form>

</div>
</body>
</html>