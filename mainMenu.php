
    <nav class='navbar navbar-expand-md bg-light navbar-light'>
    <a class='navbar-brand' href='Home.php'>Lớp học</a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
        <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='collapsibleNavbar'>
        <ul class='navbar-nav ml-auto'>
<?php        
    include "database.php";
    $conn=ConnectDB();
    if($_SESSION["ChucVu"]==="HocVien"){

    }else if($_SESSION["ChucVu"]==="GiaoVien"){
        echo "<li class='nav-item'>";
        echo "<a class='nav-link' href='AddClass.php'>Tạo lớp học</a>";
        echo "</li>";
    }else if($_SESSION["ChucVu"]==="Admin") {
        echo "<li class='nav-item'>";
        echo "<a class='nav-link' href='PhanQuyen.php'>Phân quyền</a>";
        echo "</li>";
        echo "<li class='nav-item'>";
        echo "<a class='nav-link' href='AddClass.php'>Tạo lớp học</a>";
        echo "</li>";
    }
?>
            <li class="nav-item">
                <a class="nav-link" href="enroll.php">Tham gia vào lớp học</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Logout.php">Đăng xuất</a>
            </li>
            <li class="nav-item">
                <p class="navbar-brand" > <?php echo $_SESSION["username"] ?></p>
            </li>
        </ul>
    </div>
</nav>"
