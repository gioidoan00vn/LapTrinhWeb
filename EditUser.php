<?php
    require_once('header.php');
    session_start();
    
    include "database.php";
    $conn=ConnectDB();
    $sql="Select * from user";
    $result = $conn->query($sql);
    $user='';
    $display_username = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_EMAIL);

?>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h3 class="text-center text-secondary mt-5 mb-3">Reset Password</h3>
            <?php
            if(!empty($error)){
                echo "<div class='alert alert-danger'>$error</div>";
            }else{
                ?>
                <form novalidate method="post" action="" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                    <div class="form-group">
                        <label for="user">username</label>
                        <input readonly value="<?= $_SESSION["user"] ?>" name="user" id="user" type="text" class="form-control" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input readonly name="pass" required class="form-control" type="password" placeholder="Password" id="pass">
                    </div>
                    <div class="form-group">
                        <label for="pass2">Confirm Password</label>
                        <input name="pass-confirm" required class="form-control" type="password" placeholder="Confirm Password" id="pass2">
                        <div class="invalid-feedback">Password is not valid.</div>
                    </div>
                    <div class="form-group">
                        <?php
                        if(!empty($post_error)){
                            echo "<div class='alert alert-danger'>$post_error</div>";
                        }
                        ?>
                        <button class="btn btn-success px-5">Change password</button>
                    </div>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<!--
<div>
    <form action="" method="post">
        <h2>Edit</h2>
        <table>
            <tr>
                <td><label>username</label></td>
                <td><input readonly value="<?= $display_username ?>" class="input-login" name="user" type="text" placeholder="Enter username"/></td>
            </tr>
            <tr>
                <td><label>password</label></td>
                <td><input class="input-login" name="pass" type="password" placeholder="Enter password"/></td>
            </tr>
            <tr>
                <td><label>HoTen</label></td>
                <td><input class="input-login" name="name" type="text" placeholder="Enter Full name"/></td>
            </tr>
            <tr>
                <td><label>NgaySinh</label></td>
                <td><input class="input-login" name="date" type="date" placeholder="22/02/2000"/></td>
            </tr>
            <tr>
                <td><label>user</label></td>
                <td><input class="input-login" name="mail" type="text" placeholder="Enter user address"/></td>
            </tr>
            <tr>
                <td><label>SoDienThoai</label></td>
                <td><input class="input-login" name="phone" type="text" placeholder="Enter your phone 0-9"></td>
            </tr>
            <tr>
                <td><label>ChucVu</label></td>
                <td><input class="input-login" name="phone" type="text" placeholder="Enter your phone 0-9"></td>
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
-->
</body>
</html>