<?php
    session_start();
    require_once('header.php');
    $error = '';
    $lop = '';
    $mon = '';
    $phong = '';
    $user = $_SESSION['username'];
    if (isset($_POST['lop']) && isset($_POST['mon']) && isset($_POST['phong']))
    {
        $lop = $_POST['lop'];
        $mon = $_POST['mon'];
        $phong = $_POST['phong'];
        
        

        if (empty($lop)) {
            $error = 'Hãy nhập tên lớp học';
        }
        else if(empty($mon)) {
            $error = 'Hãy nhập tên môn học';
        }
        else if (empty($phong)) {
            $error = 'Hãy nhập tên phòng học';
        }
        else {
            include "database.php";
            $conn = ConnectDB();
            $sql = "INSERT INTO lophoc (TenLopHoc, MonHoc, PhongHoc,Creater)
                VALUES ('$lop', '$mon', '$phong', '$user')";
            if (mysqli_query($conn, $sql)) {
                $last_id = $conn->insert_id;
                $sql = "INSERT INTO enrollment (username, MaLopHoc)
                VALUES ('$user', '$last_id')";
                mysqli_query($conn, $sql);
                echo "<script type='text/javascript'>alert('Thêm lớp thành công');</script>";
                
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
            <h3 class="text-center text-secondary mt-2 mb-3 mb-3">Thêm lớp học mới</h3>
            <form method="post" action="" novalidate enctype="multipart/form-data">

                <div class="form-group">
                    <label for="id_tenlop">Tên lớp học</label>
                    <input required class="form-control" name="lop" type="text" placeholder="Tên lớp học" id="id_tenlop">
                </div>
                <div class="form-group">
                    <label for="id_tenmon">Môn học</label>
                    <input required class="form-control" name="mon" type="text" placeholder="Môn học" id="id_tenmon">
                </div>
                <div class="form-group">
                    <label for="id_phong">Phòng học</label>
                    <input required class="form-control" name="phong" type="text" placeholder="Phòng học" id="id_phong">
                </div>
                <div class="form-group">
                    <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    ?>
                    <button type="submit" class="btn btn-primary px-5 mr-2">Tạo</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

?>
</body>
</html>