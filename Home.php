<?php
    require_once('header.php');
    session_start();
    if(!isset($_SESSION["ChucVu"])){
    header('Location: ./Login.php', true, 301);}
?>
<body>

<?php
    require_once("mainMenu.php");
    function clickclasses($a,$giaovien) {
        $_SESSION['class-clicked'] = $a;
        $_SESSION['tengiaovien']= $giaovien;
    }
    
?>

<div class="container">
    <div class="row">
        
        <?php 
            $user = $_SESSION['username'];
            $sql="Select MaLopHoc from enrollment where username = '$user'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                        $maLop = $row['MaLopHoc'];
                        $sql="Select * from lophoc where MaLopHoc = '$maLop'";
                        $result2 = $conn->query($sql);
                        while($row2 = $result2->fetch_assoc()) {
                            $monhoc = $row2['MonHoc'];
                            $giaovien = $row2['Creater'];
                            $sql = "Select * from user where username = '$giaovien'";
                            $result3 = $conn->query($sql);      
                            while($row3 = $result3->fetch_assoc()) {
                                $giaovien = $row3['HoTen'];
                            }
                            echo "<div  class='card-monhoc col-lg-4 col-md-6 col-sm-6 mt-3 mb-3'>";
        ?>
                                    <a onclick='<?= clickclasses($maLop,$giaovien)?>' href='Stream_Class.php' style='color: black'>
        <?php
                                        echo "<div class='card'>
                                            <div class='card-body'>
                                                <h4 class='card-title'>$monhoc</h4>
                                                <p class='card-text'>$giaovien</p>
                                            </div>
                                            <div class='image'></div>
                                        </div>
                                    </a>
                                </div>";
        
                        }
                }
            }
        ?>
        
        <!-- <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-3">
            <a href="Stream_Class.php" style="color: black">
                <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tên môn học</h4>
                            <p class="card-text">Tên giáo viên</p>
                        </div>
                    <div class="image"></div>
                </div>
            </a>
        </div>
        -->
        
    </div>
</div>
</body>
</html>