<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<div class="container-fluid">
<!-- membuat menu -->
<style>
  .navbar-brand,
  .nav-link {
    font-weight: timesnewroman;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori Wisata
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            
            <?php 
            include "include/config.php";

            $kategori = mysqli_query($connection, "select kategoriNAMA from kategoriwisata");
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
 
            Dropdown
 
          </a>
 
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
 
            <li><a class="dropdown-item" href="../oleholeh.php">Oleh-Oleh</a></li>
            <li><a class="dropdown-item" href="restaurant.php">Restaurant</a></li>
            <li><a class="dropdown-item" href="travel.php">Travel</a></li>
 
            <li><hr class="dropdown-divider"></li>
 
            <li><a class="dropdown-item" href="#">Something else here</a></li>
 
          </ul>
 
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
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
      <img src="images/pantai1.jpg" class="d-block w-100" alt="Gambar Tidak Ada">
      <div class="carousel-caption d-none d-md-block">
        <h5>Laut Flores</h5>
        <p>Laut ini berada di Provinsi Nusa Tenggara Timur</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/labuan.jpg" class="d-block w-100" alt="Gambar Tidak Ada">
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
    <div class="col-sm-3 mt-5">
      <div class="row">
      <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>

  <div class="row">
  <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
      

    </div>
  </div> <!--penutup row -->
</div>  <!--penutup container-->
<!-- akhir kolom berita -->  
<!-- Carousel wrapper -->
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
    <div class="carousel-item active">
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
                penerbangan terbaik di Asia dan dunia.
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
</html>