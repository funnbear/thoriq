<?php
    error_reporting(0);
    include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
	$a = mysqli_fetch_object($kontak);
	
	$produk = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style> 
        body {
            margin: 0;
            padding: 0;
            background: purple;
        
        }

        nav {
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 35px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: .2em 2em;
            float: right;
        }

        nav ul li {
            display: inline-block;
            margin: 0;
            padding: .2em .7em;
        }

        nav a {
            width: 100%;
            height: 100%;
            color: white;
            text-decoration: none;
            font-family: Ubuntu;
            font-size: 1.15em;
            font-weight: lighter;
            letter-spacing: 1px;
            transition: .25s ease-in-out;
        }

        nav a:hover {
            color: rgba(255, 0, 0, 0.5);
        }

        .nav-bg {
            content: '';
            position: absolute;
            display: block;
            top: -100%;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: rgb(50, 50, 50);
            transition: .45s ease-in-out;
        }

        .bg-hidden {
            top: -100%;
            opacity: 0;
        }

        .bg-visible {
            top: 0;
            opacity: 1;
        }

        h1 {
            text-align: center;
            font-family: Ubuntu;
            letter-spacing: 1px;
        }

        .hero {
            position: relative;
            width: 100%;
            height: 500px;
            background: rgb(50, 50, 50);
            background: url(foto/sekolah.jpg) no-repeat 50% 50% fixed;
            background-size: 130%;
            overflow: hidden;
        }

        .hero h1 {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            padding: .3em;
            font-size: 3em;
            font-weight: lighter;
        }

        .content-wrapper {
            width: 80%;
            padding: 1em 10%;
        }

        .content-wrapper h1 {
            margin: 0;
            color: rgb(220, 120, 0);
        }

        .content-wrapper p {
            font-family: "Open Sans";
            text-indent: 1.5em;
        }
        </style>
</head>

<body>
   <!-- header -->
   <nav>
  <div class="nav-bg"></div>
  <ul>
    <li><a href="galeri.php">Galeri</a></li>
    <li><a href="login.php">Login Admin</a></li>
  </ul>
</nav>
<div class="hero">
<h1><a href="index.php">WEB GALERI SMK 1 TRIPLE J</a></h1>
</div>
<div class="content-wrapper">
</div>
    
    <!-- product detail -->
    <div class="section">
        <div class="container">
             <h3>Detail Foto</h3>
            <div class="box">
                <div class="col-2">
                   <img src="foto/<?php echo $p->image ?>" width="100%" /> 
                </div>
                <div class="col-2">
                   <h3><?php echo $p->image_name ?><br />Kategori : <?php echo $p->category_name  ?></h3>
                   <h4>Nama User : <?php echo $p->admin_name ?><br />
                   Upload Pada Tanggal : <?php echo $p->date_created  ?></h4>
                   <p>Deskripsi :<br />
                        <?php echo $p->image_description ?>
                   </p>
                   
                </div>
            </div>
        </div>
    </div>
    
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web TEFA RPL.</small>
        </div>
    </footer>
</body>
</html>