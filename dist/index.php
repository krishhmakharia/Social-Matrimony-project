<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SevenVerse - Find Your Perfect Match</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 
    <link rel="stylesheet" href="custom.css">
  </head>
  <body class="tw-bg-black tw-text-white" id="index">
    <?php 
      if(isset($_GET["Regsuccess"])){
        echo "<div class='alert alert-success tw-mt-24 tw-mx-4 tw-flex tw-justify-between fixed-top' id='alertbar' role='alert'>
        <span><strong>Success!</strong> Registration successful. Please login to continue.</span>
        <i class='fa-solid fa-xmark fa-xl tw-mt-[10px]  ' id='crossalert'></i>
      </div>";
      }else if(isset($_GET["error"])){
        echo "<div class='alert alert-danger tw-mt-24 tw-mx-4 tw-flex tw-justify-between fixed-top' id='alertbar' role='alert'>
        <span><strong>Error!</strong> Something went wrong. Please try again.</span>
        <i class='fa-solid fa-xmark fa-xl tw-mt-[10px]  ' id='crossalert'></i>
      </div>";
    }
    ?>
    <!-- <div class="alert alert-success tw-mt-24 tw-mx-4 tw-flex tw-justify-between fixed-top" role="alert">
      <span><strong>Success!</strong> Indicates a successful or positive action.</span>
      <i class="fa-solid fa-xmark fa-xl tw-mt-[10px]  "></i>
    </div> -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">SevenVerse</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon text-light"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#about">About</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="#stories">Success Stories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hover:tw-cursor-pointer" data-bs-toggle="modal" data-bs-target="#myModal" >Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
          <div class="card shadow-lg md:w-100  tw-p-4 modal-content" >
            <div class="card-body tw-relative ">
            <button type="button" class="btn-close tw-absolute tw-top-0 tw-right-0 tw-m-4" data-bs-dismiss="modal"></button>
                <div class="text-center"> 
                    <h1 class="card-title h3 tw-text-indigo-500  tw-font-bold ">SevenVerse</h1>
                    <p class="card-text text-muted">Login below to access your account</p>
                </div>
                <?php 
                  if(isset($_GET["invalid"])){
                    echo "<div class='alert alert-danger tw-mt-4 tw-mx-2 tw-flex tw-justify-center' id='alertbar' role='alert'>
                    <span><strong>Invalid id!</strong> Please use valid Registered email</span>
                    
                  </div>";
                  }else if(isset($_GET["invalidpass"])){
                    echo "<div class='alert alert-danger tw-mt-4 tw-mx-2 tw-flex tw-justify-center' id='alertbar' role='alert'>
                    <span><strong>Invalid Password!</strong> Please use valid Password</span>
                   
                  </div>";
                }
                ?>
                <div class="mt-4">
                    <form action="check.php" method="post">
                        <div class="mb-4">
                            <label for="email" class="form-label text-muted">Email Address</label>
                            <input type="email" class="form-control tw-cursor-auto" name="email" id="email" placeholder="Email Address" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label text-muted">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark btn-lg">Login</button>
                        </div>
                        <p class="text-center text-muted mt-4">Don't have an account yet?
                            <a href="registration.php" class="text-decoration-none">Sign up</a>.
                        </p>
                    </form>
                </div>
            </div>
          </div>
      
    </div>
  </div>
    <!-- Hero Carousel -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="imgs/banner.jpg" class="d-block w-100" alt="Wedding">
          <div class="carousel-caption ">
            <h1 class="tw-cursor-pointer tw-text-indigo-400 tw-text-4xl">Find Your Perfect Match</h1>
            <p>Begin your journey to forever with SevenVerse</p>
            <button class="tw-mt-2 tw-p-2 tw-bg-transparent tw-border tw-border-indigo-400 tw-text-indigo-400  tw-rounded-lg hover:tw-bg-indigo-400 hover:tw-text-white hover:tw-text-lg transition" data-bs-toggle="modal" data-bs-target="#myModal">Join Now</button>
          </div>
        </div>
      </div>
    </div>

    

    <!-- Services -->
    <section id="services" class="py-5  ">
      <div class="container">
        <h2 class="text-center mb-5">Our Services</h2>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card text-center h-100  tw-bg-slate-800  tw-rounded-xl">
              <div class="card-body  tw-bg-slate-800 tw-rounded-xl tw-text-white tw-p-4">
                <i class="fas fa-user-shield fa-3x mb-3 tw-text-[#818cf8]"></i>
                <h5 class="card-title">Profile Verification</h5>
                <p class="card-text">All profiles are thoroughly verified to ensure a safe and genuine experience.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card text-center h-100  tw-bg-slate-800  tw-rounded-xl">
              <div class="card-body  tw-bg-slate-800 tw-rounded-xl tw-text-white tw-p-4">
                <i class="fas fa-heart fa-3x mb-3 tw-text-[#818cf8]"></i>
                <h5 class="card-title">Smart Matching</h5>
                <p class="card-text">Our advanced algorithm helps you find compatible matches based on your preferences.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4 ">
            <div class="card text-center h-100  tw-bg-slate-800  tw-rounded-xl">
              <div class="card-body tw-bg-slate-800 tw-rounded-xl tw-text-white tw-p-4">
                <i class="fas fa-comments fa-3x mb-3 tw-text-[#818cf8]"></i>
                <h5 class="card-title">Private Messaging</h5>
                <p class="card-text">Secure and private messaging system to communicate with your matches.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Us -->
    <section id="about" class="tw-p-5 tw-justify-center tw-justify-items-center">
      <div class="tw-flex tw-flex-col tw-justify-center tw-justify-items-center tw-w-full   tw-h-auto hover:tw-bg-slate-900  tw-rounded-2xl">
        <div class="tw-flex tw-flex-col tw-p-4 tw-justify-items-center tw-justify-center">
          <div class="tw-text-center"><h2 class="text-center mb-2">About</h2></div>
          <div class="tw-justify-items-center tw-text-center"><h5 class="superHeading">Seven Verse</h5></div>
        </div>
        <div class="tw-p-0  tw-pt-0">
          <p class="tw-text-wrap tw-p-6 tw-pb-0 ubuntu-light tw-font-ligt tw-text-center tw-text-xl tw-mx-2 ">
            SevenVerse is a premium matrimonial platform designed to help you find your ideal life partner with ease and confidence. Our advanced matching algorithm goes beyond basic filters, offering personalized match suggestions based on your values, preferences, and lifestyle.
            With a secure, user-friendly interface and verified profiles, we ensure a safe and trustworthy environment for building genuine connections. Whether you seek a partner with traditional values or modern outlooks, SevenVerse supports your journey with care, innovation, and commitment.
            <p class=" tw-text-wrap tw-mt-0 tw-pt-0 ubuntu-light tw-font-ligt tw-text-center tw-text-2xl ">Find <b class="tw-text-red-500 tw-text-inherit">love</b>, Build <b class="tw-text-indigo-400 ">trust</b>, Start your story with SevenVerse.</p>
          </p>        
        </div>
      </div>
    </section>
    <!-- Success Stories -->
    <section id="stories" class="py-5">
      <div class="container">
        <h2 class="text-center mb-5">Success Stories</h2>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card h-100  tw-bg-slate-800 tw-rounded-xl tw-text-white">
              <div class="card-body">
                <div class="text-center mb-3">
                  <img src="imgs/couple-2.jpg" class="rounded-circle couple-img" alt="Couple">
                </div>
                <h5 class="card-title text-center">David & Maria</h5>
                <p class="card-text">"We found each other on SevenVerse and instantly connected. After 6 months of dating, we knew we were meant to be together forever."</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100  tw-bg-slate-800 tw-rounded-xl tw-text-white">
              <div class="card-body">
                <div class="text-center mb-3">
                  <img src="imgs/couple-3.jpg" class="rounded-circle couple-img" alt="Couple">
                </div>
                <h5 class="card-title text-center">Robert & Lisa</h5>
                <p class="card-text">"Thanks to SevenVerse's matching algorithm, we found our perfect match. We're now happily married for 2 years!"</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100  tw-bg-slate-800 tw-rounded-xl tw-text-white">
              <div class="card-body">
                <div class="text-center mb-3">
                  <img src="imgs/couple-4.jpg" class="rounded-circle couple-img" alt="Couple">
                </div>
                <h5 class="card-title text-center">James & Sophie</h5>
                <p class="card-text">"Our love story began with a simple message on SevenVerse. Now we're planning our wedding and couldn't be happier!"</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-4">
            <h5>SevenVerse</h5>
            <p>Finding your perfect match made easy.</p>
          </div>
          <div class="col-md-4 mb-4">
            <h5>Quick Links</h5>
            <ul class="list-unstyled">
              <li><a href="#about">About Us</a></li>
              <li><a href="#services">Services</a></li>
              <li><a href="#stories">Success Stories</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-4 mb-4">
            <h5>Connect With Us</h5>
            <div class="social-links">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
          </div>
        </div>
        <hr>
        <div class="text-center">
          <p>&copy; 2024 SevenVerse. All rights reserved.</p>
        </div>
      </div>
    </footer>
    <script src="main.js" defer ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
  </body>
</html>