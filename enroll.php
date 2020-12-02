<?php
    require_once('header.php');
    session_start();
    $error = '';
    $id_lop = '';
    $user = $_SESSION['username'];
    if (isset($_POST['id_lop']))
    {
        $id_lop = $_POST['id_lop'];       
        if (empty($id_lop)) {
            $error = 'Hãy nhập tên lớp học';
        }
        else {
            include "database.php";
            $conn = ConnectDB();
            $sql = "INSERT INTO enrollment (username, MaLopHoc)
                VALUES ('$user', '$id_lop')";
            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>alert('Đăng kí vào lớp thành công');</script>";
                
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
?>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8 border rounded my-5 p-4  mx-3">
            <p class="mb-5"><a href="Home.php">Quay lại</a></p>
            <h3 class="text-center text-secondary mt-2 mb-3 mb-3">Tham gia lớp học</h3>
            <form method="post" action="" novalidate enctype="multipart/form-data">

                <div class="form-group">
                    <label for="id_lop">Mã Lớp học</label>
                    <input required class="form-control" name="id_lop" type="text" placeholder="Mã Lớp Học" id="id_lop">
                </div>
                <div class="form-group">
                    <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    ?>
                    <button type="submit" class="btn btn-primary px-5 mr-2">Enroll</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

?>
</body>
</html>