<?php
    require_once('header.php');
    session_start();
    include "database.php";
?>
<body>
<nav class="navbar navbar-expand-md bg-light navbar-light">
    <a class="navbar-brand" href="Home.php">Lớp học</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Stream</a>
            </li>
            <li class="nav-item hidden">
                <a class="nav-link" href="#">Classwork</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">People</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Grades</a>
            </li>
            <li class="nav-item">
                <p class="navbar-brand"  ><?php echo $_SESSION["username"] ?></p>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div>
        <h1>Danh sách lớp</h1>
    <div>
    <div class="card-stream mt-3">
        <br>
            <h5>Giáo viên</h5>
            <ul>
            <?php
               if (isset($_SESSION['class-clicked'])){
                    $conn = ConnectDB();
                    $maLop = $_SESSION['class-clicked'];
                    $sql = "select * from enrollment where MaLopHoc = $maLop";
                    $result = $conn->query($sql);
                    
                    while($row = $result->fetch_assoc()) {
                        $user = $row['username'];
                        $sql = "select * from user where username = '$user' and ChucVu='GiaoVien'";
                        $result2 = $conn->query($sql);
                        while($row2 = $result2->fetch_assoc()) {
                            $Ten = $row2['HoTen'];
                            echo "<li>$Ten</li>";
                        }
                    }
        
                } 
            ?>
            </ul>
        <br>
    </div>
    <div class="card-stream mt-3">
        <br>
            <h5>Học viên</h5>
            <ul>
                <?php 
                if (isset($_SESSION['class-clicked'])){
                    $conn = ConnectDB();
                    $maLop = $_SESSION['class-clicked'];
                    $sql = "select * from enrollment where MaLopHoc = $maLop";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        $user = $row['username'];
                        $sql = "select * from user where username = '$user' and ChucVu='Hocvien'";
                        $result2 = $conn->query($sql);
                        while($row2 = $result2->fetch_assoc()) {
                            $Ten = $row2['HoTen'];
                            echo "<li>$Ten</li>";
                        }
                    }
                }
                ?>
            </ul>
        <br>
    </div>
</div>
</body>
</html>