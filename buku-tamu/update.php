<?php
    include '../koneksi.php';

    session_start();
    if($_SESSION['status'] != "login"){
        header("location: ../index.php");
    }

    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM buku_tamu WHERE id='$id'");
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
				<label>Nama Tamu:</label>
				<input type="text" name="nama_tamu" id="nama_tamu" value="<?php echo $data['nama_tamu']; ?>" required />
			</div>
			<div>
				<label>No Telp:</label>
				<input type="text" name="no_telp" id="no_telp" value="<?php echo $data['no_telp']; ?>" required />
			</div>
			<div>
				<label>No Ruangan:</label>
				<input type="text" name="no_ruangan" id="no_ruangan" value="<?php echo $data['no_ruangan']; ?>" required />
			</div>
			<div>
				<label>Check In:</label>
				<input type="date" name="tgl_check_in" id="tgl_check_in" value="<?php echo $data['tgl_check_in']; ?>" required />
			</div>			
			<div>
				<label>Check Out:</label>
				<input type="date" name="tgl_check_out" id="tgl_check_out" value="<?php echo $data['tgl_check_out']; ?>" required />
			</div>		
			<div>
				<label>Biaya:</label>
				<input type="text" name="biaya" id="biaya" value="<?php echo $data['biaya']; ?>" required />
			</div>			
			<div>
				<input type="submit" value="Perbarui" name="btn_update" class="tombol">
			</div>
		</form>

        <?php 
            if(isset($_POST['btn_update'])){
                $nama_tamu = $_POST['nama_tamu'];
                $no_telp = $_POST['no_telp'];
                $no_ruangan = $_POST['no_ruangan'];
                $tgl_check_in = $_POST['tgl_check_in'];
                $tgl_check_out = $_POST['tgl_check_out'];
                $biaya = $_POST['biaya'];

                $sql = "UPDATE buku_tamu SET nama_tamu='$nama_tamu', no_telp='$no_telp', no_ruangan='$no_ruangan', tgl_check_in='$tgl_check_in', tgl_check_out='$tgl_check_out', biaya='$biaya' WHERE id='$id'";
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