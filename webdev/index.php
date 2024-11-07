<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grace's Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     

</head>
<body>

<div class="container-fluid">
<!-- membuat menu -->
<style>
  .navbar{
    background-color: #fff;
    font-weight: bold;
  }
  .navbar-brand,
  .nav-link {
    font-weight: timesnewroman;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Grace's Website</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori Wisata
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            
            <?php 
            include "../include/config.php";

            $kategori = mysqli_query($connection, "select kategoriNAMA from kategoriwisata"); 
            $travel = mysqli_query($connection, "select * from travel"); 
            $foto = mysqli_query($connection, "select * from fotodestinasi"); 
            $grace1 = mysqli_query($connection, "select * from grace1"); 
            


            if (!$kategori) {
              print("Error: " . mysqli_error($connection));
          }
            while ($row = mysqli_fetch_array($kategori)) {

            $destinasi = mysqli_query($connection, "select * from kategoriwisata,destinasi 
            where kategoriwisata.kategoriKODE = destinasi.kategoriKODE");
              
            ?>
              <li><a class="dropdown-item" href="#"><?php echo $row['kategoriNAMA'] ?></a></li>
            <?php
            }
            ?>

            
          </ul>
        </li>



        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Travel
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            
            <?php 
            include "../include/config.php";

            $kategori = mysqli_query($connection, "select nama from travel");
            if (!$kategori) {
              print("Error: " . mysqli_error($connection));
          }
            while ($row = mysqli_fetch_array($kategori)) {

            $travel = mysqli_query($connection, "select * from travel
            where nama = nama");
              
            ?>
              <li><a class="dropdown-item" href="#"><?php echo $row['nama'] ?></a></li>
            <?php
            }
            ?>

            
          </ul>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Restaurant
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            
            <?php 
            include "../include/config.php";

            $kategori = mysqli_query($connection, "select namaresto from restaurant");
            if (!$kategori) {
              print("Error: " . mysqli_error($connection));
          }
            while ($row = mysqli_fetch_array($kategori)) {

            $restaurant = mysqli_query($connection, "select * from restaurant
            where nama = nama");
              
            ?>
              <li><a class="dropdown-item" href="#"><?php echo $row['namaresto'] ?></a></li>
            <?php
            }
            ?>

            
          </ul>
        </li>



        <li class="nav-item dropdown">
 
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
 
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
 
            <li><a class="dropdown-item" href="../oleholeh.php">Oleh-Oleh</a></li>
            <li><a class="dropdown-item" href="../restaurant.php">Restaurant</a></li>
            <li><a class="dropdown-item" href="../travel.php">Travel</a></li>
 
            <li><hr class="dropdown-divider"></li>
 
            <li><a class="dropdown-item" href="#">Something else here</a></li>
 
          </ul>
 
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- akhir menu -->

<!-- membuat slider -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <style>
  .carousel-inner img {
    width: 10%;
  }

  .carousel-caption h5,
  .carousel-caption p {
    font-size: 24px;
  }
</style>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../images/pantai1.jpg" class="d-block w-100" alt="Gambar Tidak Ada">
      <div class="carousel-caption d-none d-md-block">
        <h5>Laut Flores</h5>
        <p>Laut ini berada di Provinsi Nusa Tenggara Timur</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../images/labuan.jpg" class="d-block w-100" alt="Gambar Tidak Ada">
      <div class="carousel-caption d-none d-md-block">
        <h5>Labuan Bajo</h5>
        <p>Kawasan wisata di Kecamatan Komodo, Provinsi Nusa Tenggara Timur</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../images/pantai.jpg" class="d-block w-100" alt="Gambar Tidak Ada">
      <div class="carousel-caption d-none d-md-block">
        <h5>Pantai Nihiwatu</h5>
        <p>Pantai yang berada di wilayah Sumba Barat, Provinsi Nusa Tenggara Timur</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- akhir slider -->

<!-- membuat kolom berita -->
<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <?php 
      if (mysqli_num_rows($destinasi)>0)
      {
        while ($row=mysqli_fetch_array($destinasi))
      {
      ?>

    <div class="d-flex mt-5">
      <div class="flex-shrink-0">
        <img style="width:250px; height:165px; margin-top:40px;"
         src="../images/<?php echo $row ['destinasiFOTO'];?>"> 

       </div>
       <div class="flex-grow-1 ms-3">
        <h5><?php echo $row ["destinasiNAMA"];?>
        <small class:"text-muted"><i>kategori</i></small></h5>
        <p><?php echo substr($row["destinasiKET"],0,250);?></p> 
        <a href="#" class="btn btn-primary mb-3">Read More</a>
    
      </div>
    </div>
    <?php }} ?>
    
  </div>
  <div class="col-sm-3 mt-5 d-flex flex-column justify-content-center align-items-center">
  <div class="row align-self-center">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Pusat Oleh-Oleh</h5>
        <p class="card-text">Bingung mau makan enak tapi duit lagi pas-pasan? Tenang saja, 
          reservasi restoran disini lagi ada diskon hingga 20% nih. 
          Buruan datang dan nikmati sajian makanan yang lezat.</p>
        <a href="../oleholeh.php" class="btn btn-primary">Go to Oleh-oleh</a>
      </div>
    </div>
  </div>

  <div class="row mt-3 align-self-center">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Travel</h5>
        <p class="card-text">Liburan telah tiba! Ayo rencanakan liburan bareng keluarga.
          Hanya disini Anda bisa memesan tiket travel dengan harga yang terjangkau lho. 
          Buruan pesan tiket sekarang juga!</p>
        <a href="../travel.php" class="btn btn-primary">Go to Travel</a>
      </div>
    </div>
  </div>
</div>

      

    </div>
  </div> <!--penutup row -->
</div>  <!--penutup container-->
<!-- akhir kolom berita -->  
<!-- Carousel wrapper -->
 
<!-- Foto -->
<div class="container-fluid">
<div class="judul" w-bold>
<h1 style="text-align: center; padding: 30px 0 10px 30px; color: black; font-weight: bold;">
    Photo Destination
  </h1>

</div>
 
<div class="container-fluid" style="margin: 10px;; padding: 30px;">
  <div class="row">
  <?php
      if (mysqli_num_rows($foto) > 0) {
        while ($row = mysqli_fetch_array($foto)) {
   
      ?>
    <div class="col-sm-4">
      <figure class="figure">
        <div class="zoom">
          <img src="../images/<?php echo $row["namafile"]?>" class="figure-img img-fluid rounded"  style="width:450px; height: 250px;" alt="tidak ada foto">
          <figcaption class="figure-caption text-right"><?php echo $row["namafoto"]?></figcaption>
        </div>
      </figure>
    </div>
          <?php } } ?>
  </div>
</div>
</div>  



<div
  id="carouselMultiItemExample"
  class="carousel slide carousel-dark text-center"
  data-mdb-ride="carousel"
>
  <!-- Controls -->
  <div class="d-flex justify-content-center mb-4">
    <button
      class="carousel-control-prev position-relative"
      type="button"
      data-mdb-target="#carouselMultiItemExample"
      data-mdb-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next position-relative"
      type="button"
      data-mdb-target="#carouselMultiItemExample"
      data-mdb-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Inner -->
  <div class="carousel-inner py-4">
    <!-- Single item -->


    <!-- tampilan bebas 1-->
    <div class="label-news">
      <h1 class="fw-bold fs-3">Restaurant Recommendation</h4>
    <div class = "container">
        <main class = "grid">
          <article>
            <img src = "../images/union.jpg" style="width:100%; height:225px; ">
            <div class = "konten">
              <h2>Union Plaza Senayan</h2>
              <p>American brasserie, bakery & bar serving quality food, beverages and baked goods.<p>
  </div>
    </article>
          <article>
            <img src = "../images/henshin.jpg" style="width:100%; height:225px;">
            <div class = "konten">
              <h2>Henshin Jakarta</h2>
              <p> Henshin serves authentic Nikkei cuisine, a bold combination of Peruvian and Japanese cuisine.</p>
  </div>
  </article>
          <article>
          <img src = "../images/sofia.jpg" style="width:100%; height:225px;">
          <div class = "konten">
              <h2>Sofia at The Gunawarman</h2>
              <p>A palatial restaurant / gourmet market / patisserie opens at the heart of south Jakarta. </p>
              </div>
    </article>
  </main>
</div>

  <style>
  .grid{
   display: grid;
   grid-template-columns: repeat(3,1fr);
   margin: 80px;
   align-items: center;  
   grid-gap: 30px;
  }

  .img{
    object-fit: cover;
  }

  .grid > article{
    box-shadow: 10px 5px 5px 0px #d1d1d1;
    border-radius: 30px;
    text-align: center;
    background: #f0efeb;
    width: 300px;
    
  }

  .grid > article img{
    border-top-left-radius:30px;
    border-top-right-radius: 30px;
  }

  .grid > article h2 {
    font-family: 'Your Desired Font', sans-serif;
    font-weight: bold; 
    font-size: 18px; 
    margin-top: 20px; 
  }

  .grid > article p {
    font-family: 'Your Desired Font', sans-serif; 
    font-size: 14px; 
  }
 
</style>

 <!-- akhir tampilan bebas -->

 

      <!-- tampilan bebas 2 -->

    
    <div class="label-news">
      <h1 class="fw-bold fs-3 mb-5">Label News</h4>
    <div class="row">
  <div class="col-sm-6">
    <div class="card" style="width: 100%; max-width: 700px;">
    <img
                src="../images/finns.jpg"
                style="width: 100%; height: 300px; object-fit: cover;"
                class="card-img-top"
                alt="Waterfall"
              />
      <div class="card-body">
        <h5 class="card-title">Kategori Wisata</h5>
        <p class="card-text">Eksplorasi yang Tak Terlupakan <br> Harga Terbaik untuk Pemesanan Awal!</p>
        <a href="../kategoriwisata.php" class="btn btn-primary">Go Kategori Wisata</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card" style="width: 100%; max-width: 700px;">
    <img
                src="../images/villa.jpg"
                style="width: 100%; height: 300px; object-fit: cover;"
                class="card-img-top"
                alt="Waterfall"
              />
      <div class="card-body">
        <h5 class="card-title">Destinasi Wisata</h5>
        <p class="card-text">Jelajahi Keindahan Alam <br> Penawaran Spesial untuk Destinasi Wisata Pilihan</p>
        <a href="../destinasiwisata.php" class="btn btn-primary">Go Destinasi Wisata</a>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-sm-6">
    <div class="card" style="width: 100%; max-width: 700px;">
    <img
                src="../images/langham.jpg"
                style="width: 100%; height: 300px; object-fit: cover;"
                class="card-img-top"
                alt="Waterfall"
              />
      <div class="card-body">
        <h5 class="card-title">Hotel</h5>
        <p class="card-text">Nikmati Kenyamanan Terbaik <br> Penawaran Istimewa untuk Tamu Setia!</p>
        <a href="../hotel.php" class="btn btn-primary">Go Hotel</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card" style="width: 100%; max-width: 700px;">
    <img
                src="../images/oleholeh.jpg"
                style="width: 100%; height: 300px; object-fit: cover;"
                class="card-img-top"
                alt="Waterfall"
              />
      <div class="card-body">
        <h5 class="card-title">Oleh-Oleh</h5>
        <p class="card-text">Hadiah dari Destinasi Anda <br> Nikmati Diskon untuk Oleh-Oleh Pilihan</p>
        <a href="../oleholeh.php" class="btn btn-primary">Go Oleh-Oleh</a>
      </div>
    </div>
  </div>
</div>


<div class="row mb-5">
  <div class="col-sm-6">
    <div class="card" style="width: 100%; max-width: 700px;">
    <img
                src="../images/moon.jpg"
                style="width: 100%; height: 300px; object-fit: cover;"
                class="card-img-top"
                alt="Waterfall"
              />
      <div class="card-body">
        <h5 class="card-title">Restaurant</h5>
        <p class="card-text">Eksplorasi Kuliner Terbaik di Berbagai Kota <br> Diskon Hebat untuk Pilihan Menu Terbaik</p>
        <a href="../restaurant.php" class="btn btn-primary">Go Restaurant</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card" style="width: 100%; max-width: 700px;">
    <img
                src="../images/plane.jpg"
                style="width: 100%; height: 300px; object-fit: cover;"
                class="card-img-top"
                alt="Waterfall"
              />
      <div class="card-body">
        <h5 class="card-title">Travel</h5>
        <p class="card-text">Eksplorasi Tanpa Batas <br> Nikmati Petualangan dengan Harga Terbaik</p>
        <a href="../travel.php" class="btn btn-primary">Go Travel</a>
      </div>
    </div>
  </div>
</div>

<style>
    .card {
        margin: 5px; 
    }

   
    .label-news {
        padding: 20px; 
    }
</style>
 
  <!-- akhir tampilan bebas 2 -->

  <div class="container text-center">
  <h2 class="fw-bold fs-3 mt-4 mb-4">Grace</h2>
 
  <div class="row justify-content-center">
 
    <?php
    if (mysqli_num_rows($grace1) > 0) {
      $count = 0; // Counter untuk melacak jumlah kartu
      while ($row = mysqli_fetch_array($grace1)) {
    ?>
 
        <div class="col-sm-3 mt-2 mb-2">
          <div class="card shadow mb-3" style="width: 18rem;">
            <img class="card-img-top mt-4 mb-4 mx-auto" style="width:257px; height:150px; display: block;" src="../images/<?php echo $row["fotoFILE"] ?>" alt="Gambar Tidak Ada">
 
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["fotoFILE"]; ?></h5>
            </div>
          </div>
        </div>
 
        <?php
        $count++;
        // Periksa apakah dua kartu sudah ditampilkan, jika ya, mulai baris baru
        if ($count % 4 === 0) {
          echo '</div><div class="row justify-content-center">';
        }
      }
    }
    ?>
  </div>
</div>
  
  <!-- tampilan bebas 3 -->

      <div class="label-news">
      <h1 class="fw-bold fs-3 mb-5">Hotel Recommendation</h4>
  <div class="container text-center">
  <div class="card mx-auto mb-3" style="max-width: 1100px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="../images/hotel3.jpg" 
        style="width: 100%; height: 225px; object-fit: cover;"
        class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">The Apurva Kempinski Bali</h5>
          <p class="card-text">This resort is the perfect choice for couples seeking a romantic getaway or a honeymoon retreat. Enjoy the most memorable nights with your loved one by staying at The Apurva Kempinski Bali.</p>
          <p class="card-text"><small class="text-muted">The Apurva Kempinski Bali is a resort in a good neighborhood, which is located at Nusa Dua Beach.
            The resort has a very good location, also near the Ngurah Rai International Airport (DPS), which is only 10.57 km away.</small></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container text-center">
  <div class="card mx-auto mb-3" style="max-width: 1100px;">
    <div class="row g-0">
      <div class="col-md-4">
      <img src="../images/bali.jpg" 
        style="width: 100%; height: 225px; object-fit: cover;"
        class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Daun Bali Seminyak Hotel</h5>
          <p class="card-text">If you plan to have a long-term stay, staying at Daun Bali Seminyak Hotel is the right choice for you. Providing wide range of facilities and great service quality, this accommodation certainly makes you feel at home.</p>
            <p class="card-text"><small class="text-muted">Have fun with various entertaining facilities for you and the whole family at Daun Bali Seminyak Hotel, a wonderful accommodation for your family holiday</small></p>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

<div class="container text-center">
  <div class="card mx-auto mb-3" style="max-width: 1100px;">
    <div class="row g-0">
      <div class="col-md-4">
      <img src="../images/hotel1.jpg" 
        style="width: 100%; height: 225px; object-fit: cover;"
        class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Grand Hyatt Bali</h5>
          <p class="card-text">Whether you are planning an event or other special occasions, Grand Hyatt Bali is a great choice for you with a large and well-equipped function room to suit your requirements.</p>
          <p class="card-text"><small class="text-muted">Have fun with various entertaining facilities for you and the whole family at Grand Hyatt Bali, a wonderful accommodation for your family holiday</small></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container text-center">
  <div class="card mx-auto mb-3" style="max-width: 1100px;">
    <div class="row g-0">
      <div class="col-md-4">
      <img src="../images/hotel4.jpg" 
        style="width: 100%; height: 225px; object-fit: cover;"
        class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Swiss BelHotel Rainforest</h5>
          <p class="card-text">If you plan to have a long-term stay, staying at Swiss Belhotel Rainforest is the right choice for you. 
            Providing wide range of facilities and great service quality, 
            this accommodation certainly makes you feel at home.</p>
            <p class="card-text"><small class="text-muted">Have an enjoyable and relaxing day at the pool, whether you’re traveling solo or with your loved ones.</small></p>
        </div>
      </div>
    </div>
  </div>
</div>


      <!-- akhir tampilan bebas 3 -->
    

      
      
    <div class="carousel-item active mt-3">
    <h1 class="fw-bold fs-3 mb-5">Pilihan Destinasi Wisata</h4>
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <img
                src="../images/picture1.jpg"
                style="width: 100%; height: 250px; object-fit: cover;"
                class="card-img-top"
                alt="Waterfall"
              />
              <div class="card-body">
                <h5 class="card-title">Pantai Indah Kapuk</h5>
                <p class="card-text">
                Pantai Indah Kapuk atau biasa disingkat menjadi PIK 1 (awalnya Pantai Indah Kapuk Waterfront City), adalah sebuah kawasan terencana yang terletak di Penjaringan,
                 Jakarta Utara; Kapuk, Cengkareng, Jakarta Barat; dan Kabupaten Tangerang, Banten
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 d-none d-lg-block">
            <div class="card">
              <img
                src="../images/picture2.jpg"
                style="width: 100%; height: 250px; object-fit: cover;"
                class="card-img-top"
                alt="Sunset Over the Sea"
              />
              <div class="card-body">
                <h5 class="card-title">Amsterdam</h5>
                <p class="card-text">
                Amsterdam merupakan kota terbesar di Belanda sekaligus menjadi ibu kota negara pada tahun 1806. 
                Letak kota Amsterdam berada sisi barat Belanda, dan secara administratif masuk Provinsi Holland Utara.
            
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 d-none d-lg-block">
            <div class="card">
              <img
                src="../images/picture3.jpg"
                style="width: 100%; height: 250px; object-fit: cover;"
                class="card-img-top"
                alt="Sunset over the Sea"
              />
              
              <div class="card-body">
                <h5 class="card-title">Changi Airport</h5>
                <p class="card-text">
                Bandar Udara Changi Singapura adalah bandara internasional yang melayani Singapura. 
                Bandara ini terletak di daerah Changi di bagian ujung timur pulau Singapura dan merupakan salah satu fasilitas
                penerbangan terbaik di Asia.
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    

    <!-- Single item -->
    <div class="carousel-item">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-12">
            <div class="card">
              <img
                src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp"
                class="card-img-top"
                alt="Fissure in Sandstone"
              />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk
                  of the card's content.
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 d-none d-lg-block">
            <div class="card">
              <img
                src="https://mdbcdn.b-cdn.net/img/new/standard/nature/185.webp"
                class="card-img-top"
                alt="Storm Clouds"
              />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk
                  of the card's content.
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 d-none d-lg-block">
            <div class="card">
              <img
                src="https://mdbcdn.b-cdn.net/img/new/standard/nature/186.webp"
                class="card-img-top"
                alt="Hot Air Balloons"
              />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk
                  of the card's content.
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <div class="card">
              <img
                src="https://mdbcdn.b-cdn.net/img/new/standard/nature/187.webp"
                class="card-img-top"
                alt="Peaks Against the Starry Sky"
              />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk
                  of the card's content.
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4 mb-lg-0 d-none d-lg-block">
            <div class="card">
              <img
                src="https://mdbcdn.b-cdn.net/img/new/standard/nature/188.webp"
                class="card-img-top"
                alt="Bridge Over Water"
              />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk
                  of the card's content.
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4 mb-lg-0 d-none d-lg-block">
            <div class="card">
              <img
                src="https://mdbcdn.b-cdn.net/img/new/standard/nature/189.webp"
                class="card-img-top"
                alt="Purbeck Heritage Coast"
              />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk
                  of the card's content.
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Inner -->
</div>
<!-- Carousel wrapper -->

    
</div> 
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<footer class="bg-dark text-light pt-5 mt-5">
    <div class="container px-5">
        <div class="row">
            <div class="col-6 col-lg-4">
                <h3 class="fw-bold">About Us</h3>
                <p class="pt-2">Inventore veritatis et quasi architecto beatae dicta sed ut perspiciatis unde omnis iste natus laudantium.</p>
                <p>Sed ut perspiciatis unde omnis iste natus volup tatem fringilla tempor dignissim at, pretium et.</p>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-2 mx-auto">
            <h6 class="fw-bold fs-3">Input</h6>
            <p><a class="text-white">Oleh-Oleh</a></p>
            <p><a class="text-white">Restaurant</a></p>
            <p><a class="text-white">Travel</a></p>
            <p><a class="text-white">Berita</a></p>
          </div>
      

          <hr class="w-100 clearfix d-md-none" />

   
          <hr class="w-100 clearfix d-md-none" />

    
          <div class="col-md-4 col-lg-4 col-xl-3 mx-auto">
            <h6 class="fw-bold fs-3">Contact</h6>
            <p><i class="fas fa-home mr-3"></i> Jakarta, 1 Desember 2023</p>
            <p><i class="fas fa-envelope mr-3"></i> gracetrifosaa@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i> + 08 234 567 88</p>
            <p><i class="fas fa-print mr-3"></i> + 08 234 567 89</p>
          </div>
          <div class="col-md-4 col-lg-4 col-xl-3 mx-auto">
    <h4 class="fw-bold fs-3">Social Media Links</h4>
    <div class="social-media d-flex pt-2">
        <a href="#" class="text-dark fs-2 me-3"><img src="../images/facebook1.jpeg" alt="Facebook" style="height: 27px;"></a>
        <a href="#" class="text-dark fs-2 me-3"><img src="../images/wa.png" alt="Whatsapp" style="height: 27px;"></a>
        <a href="#" class="text-dark fs-2 me-3"><img src="../images/twitter1.jpeg" alt="Twitter" style="height: 27px;"></a>
        <a href="#" class="text-dark fs-2 me-3"><img src="../images/instagram1.jpeg" alt="Instagram" style="height: 27px;"></a>
    </div>
</div>
</div>

        <hr>
        <div class="d-sm-flex justify-content-between align-items-center py-1">
          <p>Grace's Website 2023 ©</p>

        <div class="d-flex justify-content-end mb-3">
            <a href="#" class="text-light text-decoration-none pe-4">Terms of use</a>
            <a href="#" class="text-light text-decoration-none">Privacy policy</a>
        </div>
        </div>
</footer>
</html>