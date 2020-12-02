<?php
    require_once('header.php');
    session_start();
    include "database.php";
    function clicksend($maLop) {
        $_SESSION['class-clicked'] = $maLop;
    }
    
    if (isset($_SESSION['class-clicked'])){
        $conn = ConnectDB();
        $maLop = $_SESSION['class-clicked'];
        $giaovien = $_SESSION['tengiaovien'];
        $sql = "select * from lophoc where MaLopHoc = $maLop";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $TenLop = $row['TenLopHoc'];
            $MonHoc = $row['MonHoc'];
            $MaLopHoc = $row['MaLopHoc'];
        }
        
    }
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
                <a class="nav-link" onclick='<?php clicksend($maLop);?>' href="people.php">People</a>
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
    
    <div class="banner-image">
        <h1><?php echo $MonHoc;?></h1>
        <p><?php echo $giaovien;?></p>
        <p><?php echo $TenLop;?></p>
        <p><?php echo $MaLopHoc;?></p>
    </div>
    <div class="card-stream mt-3">
        <br>
        <textarea id="textarea" placeholder="Chia sẻ với lớp học"></textarea>
        <button class="mt-2" id="btn-send">Đăng</button>
        <br>
    </div>
    <div class="card-stream mt-3 mb-3">
        <br>
        <h4 class="ml-2">Tên người dùng</h4>
        <p class="ml-2">Nội dung</p>
        <input class="input-stream" type="text" placeholder="Thêm nhận xét của bạn">
        <br>
    </div>
</div>
</body>
</html>