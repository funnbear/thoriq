<?php
    session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="dashboard.php">WEB GALERI SMK 1 TRIPLE J</a></h1>
        <ul>
           <li><a href="dashboard.php">Dashboard</a></li>
           <li><a href="profil.php">Profil</a></li>
           <li><a href="data-image.php">Data Foto</a></li>
           <li><a href="posts.php">Posts</a></li>
           <li><a href="Keluar.php">Keluar</a></li>
        </ul>
        </div>
    </header>

    <div class="section">
        <div class="container">
            <h3> Data Informasi </h3>
            <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
            <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br />
            <input type="submit" name="submit" value="Submit" class="btn">
               </form>
               <?php
                   if(isset($_POST['submit'])){
					   
					   // print_r($_FILES[gambar']);
					   // menampung inputan dari form
					   $deskripsi = $_POST['deskripsi'];

                       $insert = mysqli_query($conn, "INSERT INTO agenda VALUES (
                        null,
                        '".$deskripsi."',
                        null
                            ) ");
                            
            if($insert){
                echo '<script>alert("Tambah agenda")</script>';
                echo '<script>window.location="posts.php"</script>';
            }else{
                echo 'gagal'.mysqli_error($conn);
                
            }
        }

        
        
     ?>
</div>
</div>
</div>

<footer>
<div class="container">
<small>Copyright &copy; 2024 - Web TEFA RPL.</small>
</div>
</footer>
</body>
</html>