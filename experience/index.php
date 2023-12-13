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

    <div class="content">
        <center class="jarak">
            <a href="create.php" class="tombol-create">Tambahkan Data Experience</a>
        </center>
        
        <table border="1" width="80%" align="center" cellpadding="20" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Tools</th>
                <th>Aksi</th>
            </tr>
            
            <?php
            $i=1;
            $sql = mysqli_query($koneksi, "SELECT * FROM experience");
            while($data = mysqli_fetch_assoc($sql)){
        ?>

        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $data['title']; ?></td>
            <td><?php echo $data['tools']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $data['id']; ?>" class="tombol-edit">Edit</a>
                <a href="delete.php?id=<?php echo $data['id']; ?>" class="tombol-hapus">Hapus</a>
            </td>
        </tr>
        <?php } ?>

        </table>
    </div>

    <div id="copyright">
        <div class="wrapper">
            &copy; 2023. <b>FaridatulHasanah</b> All Rights Reserved.
        </div>
    </div>
    
</body>
</html>