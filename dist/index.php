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
  <body class="tw-bg-black tw-text-white">
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
                    <h1 class="card-title h3 ">Sign in</h1>
                    <p class="card-text text-muted">Sign in below to access your account</p>
                </div>
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
                            <button type="submit" class="btn btn-dark btn-lg">Sign in</button>
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
        <div class="tw-p-4">
          <pre class="tw-text-wrap tw-p-4 ubuntu-light tw-font-normal tw-text-lg ">
SevenVerse is a premium matrimonial platform designed to bring people closer to their ideal life partner. We understand that choosing a life partner is one of the most significant decisions in a person's life, and our platform is built to support and guide users every step of the way. With a user-friendly interface and a seamless experience, SevenVerse makes the journey of finding love smooth, secure, and enjoyable.

At the heart of SevenVerse lies our advanced matching algorithm, which goes beyond basic filters to truly understand individual preferences, values, and compatibility factors. Our technology is crafted to provide accurate and personalized match suggestions, ensuring that users connect with people who share similar life goals, interests, and cultural backgrounds. This intelligent matchmaking process increases the chances of meaningful and long-lasting relationships.

We take immense pride in maintaining a high-quality and verified database of profiles. Every user on SevenVerse undergoes a thorough verification process to ensure authenticity and reliability. This helps foster a safe and trustworthy environment, where individuals can interact with confidence and peace of mind. Our commitment to security and privacy is unwavering, so users can focus on building connections without any concerns.

SevenVerse is more than just a matchmaking service — it’s a community that values love, trust, and lifelong companionship. Whether you're seeking a partner based on traditional values or modern preferences, our platform caters to diverse needs. With dedicated support and continuous innovations, SevenVerse is your trusted companion in the journey of love and togetherness.          </pre>
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