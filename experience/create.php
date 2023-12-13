<?php
    include '../koneksi.php';

    session_start();
    if($_SESSION['status'] != "login"){
        header("location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web profile faridatul</title>
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js" defer></script>
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href='../dashboard/'>Faridatul H</a></div>
            <a href="#" class="tombol-menu">
                <span class="garis"></span>
                <span class="garis"></span>
                <span class="garis"></span>
            </a>
            <div class="menu">
                <ul>
                    <li><a href="../user/">User</a></li>
                    <li><a href="../buku-tamu/">Buku Tamu</a></li>
                    <li><a href="../experience/">Experience</a></li>
                    <li><a href="../feedback/">Feedback</a></li>
                    <li><a href="../kategori/">Kategori</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>    

    <div class="form">
		<form method="POST">
			<div>
				<label>Title:</label>
				<input type="text" name="title" id="title" required />
			</div>	
			<div>
				<label>Tools:</label>
				<input type="text" name="tools" id="tools" required />
			</div>	
			<div>
				<input type="submit" value="Tambahkan" name="btn_create" class="tombol">
			</div>
		</form>

        <?php 
            if(isset($_POST['btn_create'])){
                $title = $_POST['title'];
                $tools = $_POST['tools'];

                $sql = "INSERT INTO experience (title, tools) VALUES('$title', '$tools')";
                mysqli_query($koneksi, $sql);
                header('location:index.php');
            }
        ?>
	</div>

    <div id="copyright">
        <div class="wrapper">
            &copy; 2023. <b>FaridatulHasanah</b> All Rights Reserved.
        </div>
    </div>
    
</body>
</html>