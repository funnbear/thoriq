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
<title>WEB Galeri SMK 1 TRIPLE J</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
        .image-container {
            display: flex;
            align-items: center;
        }
        .image {
            width: 700px; 
            height: 300px; 
            border: 10px solid #575D63;
            padding: 10px;
            margin-right: 20px;
            margin-left: 50px;
        }
        .description {
            width: 460px;
            height: 300px; 
            font-size: 18px;
            border: 10px solid #575D63;
            background-color: #808080;
            padding: 10px;
            color: #F5F5DC;
            font-family: "Papyrus";
            flex-grow: 0;
            text-align: center;
        } 
        .description p {
            font-family: "Papyrus";
            font-size: 20px;
        }
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
            color: rgb(255, 0, 0, 0.5);
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
    </style>
</head>

<body>
    <!-- header -->
    <nav>
  <div class="nav-bg"></div>
  <ul>
    <li><a href="galeri.php"><h3>Galeri</h3></a></li>
    <li><a href="login.php"><h3>Login Admin</h3></a></li>
  </ul>
</nav>
<div class="hero">
<h1><a href="index.php">WEB GALERI SMK 1 TRIPLE J</a></h1>
</div>
<div class="content-wrapper">
</div>

<div class="container">
    
    <div class="container">
       <h3>GALERI KEGIATAN SEKOLAH</h3>
       <div class="box">
          <?php
              $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 ORDER BY image_id DESC LIMIT 8");
			  if(mysqli_num_rows($foto) > 0){
				  while($p = mysqli_fetch_array($foto)){
		  ?>
          <a href="detail-image.php?id=<?php echo $p['image_id'] ?>">
          <div class="col-4">
              <img src="foto/<?php echo $p['image'] ?>" height="150px" />
              <p class="nama"><?php echo substr($p['image_name'], 0, 30)  ?></p>
              <p class="admin">Nama User : <?php echo $p['admin_name'] ?></p>
              <p class="nama"><?php echo $p['date_created']  ?></p>
          </div>
          </a>
          <?php }}else{ ?>
              <p>Foto tidak ada</p>
          <?php } ?>
       </div>
    </div>

    <div class="section">
        <div class="container">
        <h3>INFORMASI TERKINI</h3>
            <div class="box">
                <div class="col-4">
                <?php
              $foto = mysqli_query($conn, "SELECT * FROM posts WHERE image_status = 1 ORDER BY id_posts DESC LIMIT 8");
			  if(mysqli_num_rows($foto) > 0){
				  while($p = mysqli_fetch_array($foto)){
		  ?>
            <p class="nama"><?php echo substr($p['posts_info'], 0, 30)  ?></p>
            <img src="foto/<?php echo $p['image'] ?>" height="150px"/>
            <p>Deskripsi :<?php echo $p->posts_deskripsi ?><br />
           </p>
          <?php }}else{ ?>
              <p>Foto tidak ada</p>
          <?php } ?>
            </div>
          </div>
          <div class="box">
                <div class="col-2">
                   <h3>AGENDA SEKOLAH </h3>
                   <p>Deskripsi : Dialogue (sometimes spelled dialog in American English)[1] is a written or spoken conversational exchange between two or more people, and a literary and theatrical form that depicts such an exchange. As a philosophical or didactic device, it is chiefly associated in the West with the Socratic dialogue as developed by Plato, but antecedents are also found in other traditions including Indian literature<br />
                        <?php echo $p->image_description ?>
                   </p>
                </div>
            </div>
        </div>
    </div>

    <div class="image-container">
        <img src="foto/denah.png" class="image" >
        <div class="description">
            <h3><i>PETA SEKOLAH</i></h3>
            <p>Ini adalah denah sekolah SMK 1 TRIPLE J, ada macam-macam ruangan dan ini hanya 1 lantai blm lanai 2,3,4</p>
        </div>
    </div>

    <!-- footer -->
     <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web TEFA RPL.</small>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Auto slide
            setInterval(function() {
                $('.slider').animate({marginLeft: '-=700px'}, 1000, function() {
                    $(this).append($('.slide:first')).css({marginLeft: 0});
                });
            }, 4000); // Change slide every 3 seconds
        });
    </script>
</body>
</html>