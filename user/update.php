<?php
    include '../koneksi.php';

    session_start();
    if($_SESSION['status'] != "login"){
        header("location: ../index.php");
    }

    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);
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
				<label>Nama:</label>
				<input type="text" name="nama" id="nama" value="<?php echo $data['nama']; ?>" required />
			</div>
			<div>
				<label>Username:</label>
				<input type="text" name="username" id="username" value="<?php echo $data['username']; ?>" required />
			</div>
			<div>
				<label>Password Baru:</label>
				<input type="password" name="passwords" id="password" required />
			</div>			
			<div>
				<input type="submit" value="Perbarui" name="btn_update" class="tombol">
			</div>
		</form>

        <?php 
            if(isset($_POST['btn_update'])){
                $nama = $_POST['nama'];
                $username = $_POST['username'];
                $password = MD5($_POST['passwords']);

                $sql = "UPDATE user SET nama='$nama', username='$username', passwords='$password' WHERE id='$id'";
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