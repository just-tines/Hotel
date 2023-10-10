<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <!-- Include Bootstrap and jQuery libraries -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="index.css" />
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-sm">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">
          <img src="./images/logo.jpg" alt="Logo" />
        </a>
        <ul class="navbar-nav fs-5 ml-auto">
          <!-- Use ml-auto class to push the list to the right -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#rooms-section">Hotels</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#contact-section">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./components/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./components/register.php">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/luzon.jpg" class="d-block w-100" alt="Luzon">
      </div>
      <div class="carousel-item">
        <img src="images/visayas.jpg" class="d-block w-100" alt="Visayas">
      </div>
      <div class="carousel-item">
        <img src="images/mindanao.jpg" class="d-block w-100" alt="Mindanao">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <nav class="navbar bg-body-tertiary">
    <div id="rooms-section" class="container my-2">
      <span class="navbar-text">
        <h2 class="text-dark">HOTEL</h2>
      </span>
    </div>
    <div class="container my-3">
      <div class="row">
        <div class="col-md-4">
          <div class="card h-100">
            <img src="images/luzon.jpg" class="card-img-top img-fluid" alt="..." style="height: 100%;">
            <div class="card-body">
              <h5 class="card-title">Hotel Name</h5>
              <strong> HOTEL DESCRIPTION </strong>
              <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="./components/login.php" class="btn btn-primary">Book Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100">
            <img src="images/visayas.jpg" class="card-img-top img-fluid" alt="..." style="height: 100%;">
            <div class="card-body">
              <h5 class="card-title">Hotel Name</h5>
              <strong> HOTEL DESCRIPTION </strong>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="./components/login.php" class="btn btn-primary">Book Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100">
            <img src="images/mindanao.jpg" class="card-img-top img-fluid" alt="..." style="height: 100%;">
            <div class="card-body">
              <h5 class="card-title">Hotel Name</h5>
              <strong> HOTEL DESCRIPTION </strong>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="./components/login.php" class="btn btn-primary">Book Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div id="contact-section" class="container my-2">
    <span class="navbar-text">
      <h2 class="my-3">Contact Us</h2>
    </span>
    <form class="row g-3 body-bg-secondary">
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">First Name</label>
        <input type="text" class="form-control" id="firstname">
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastname">
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" placeholder="1234 Main St">
      </div>
      <div class="col-md-6">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" class="form-control" id="inputCity">
      </div>
      <div class="col-md-2">
        <label for="inputZip" class="form-label">Zip</label>
        <input type="text" class="form-control" id="inputZip">
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>

  <?php

  require('./components/footer.php')

  ?>
</body>

</html>