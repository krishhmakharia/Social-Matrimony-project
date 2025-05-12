<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 
    <link rel="stylesheet" href="custom.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&family=Tektur:wght@400..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet"></body>

</head>
<body class="tw-h-screen tw-bg-[url('imgs/bg-3.jpg')] tw-bg-cover tw-bg-center" id="reg">
<?php 
      if(isset($_GET["mismatch"])){
        echo "<div class='alert alert-warning tw-mt-20 tw-mx-4 tw-flex tw-justify-between fixed-top' id='alertbar' role='alert'>
        <span><strong>Mismatch!</strong> Password mismatched </span>
        <i class='fa-solid fa-xmark fa-xl tw-mt-[10px]  ' id='crossalert'></i>
      </div>";
      }
?>
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">SevenVerse</a>
        <button class="navbar-toggler" type="button" id="toggleBtn" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon text-light"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item disabled">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="registration.php">Registration</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?login=1">Or Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--Form-->    
    <div class="tw-conatiner tw-px-4 tw-mt-28 tw-mb-32">
        <div class=" tw-rounded-lg tw-p-4 tw-border-1 tw-border-black tw-bg-black tw-bg-opacity-75  tw-mx-10 md:tw-mx-80 tw-shadow-md tw-shadow-black ">
            <div class="tw-text-white tw-text-center tw-mt-2 tw-mb-2 ">
                <h1 class=" tw-font-bold md:tw-text-2xl tw-text-xl ubuntu-medium">Resgistration of SevenVerse</h1>
            </div>
            <form class="tw-p-4" action="register.php" method="post" enctype="multipart/form-data" >
                <div id=" " class="block1 tw-relative">
                  <label for="Fname" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">First Name</label>
                  <input type="text" class="form-control tw-bg-white  tw-font-normal " name="fname" placeholder="Enter your first name"  required><br>
                  <label for="Lname" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">Last Name</label>
                  <input type="text" class="form-control tw-bg-white tw-font-normal " name="lname" placeholder="Enter your last name"  required><br>
                    <div class=" tw-p-2 tw-pb-0 tw-pl-0 tw-pt-0 tw-font-normal tw-text-gray-200 ">
                        <label for="Gender" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">Gender</label>
                        <input type="Radio" class="tw-mx-2 tw-mt-0" name="gender" value="male">  Male <input type="Radio" class="tw-mx-2" name="gender" value="female"> Female <br>
                    </div>
                  <label for="DOB" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">DOB</label>
                  <input type="date" class="form-control tw-bg-white  tw-font-normal  focus:tw-border-pink-700  focus:tw-ring focus:tw-ring-pink-300  focus:tw-ring-opacity-50" name="birth"> <br>
                  <label for="Caste" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">Caste</label>
                  <input type="text" class="form-control tw-bg-white  tw-font-normal " name="caste" placeholder="Enter your Caste"  required><br>
                  <label for="Religion" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">Religion</label>
                  <select class="form-select tw-bg-white  tw-font-normal " name="religion" required>
                      <option  value="hindu"> hindu </option>
                      <option  value="muslim"> muslim </option>
                      <option  value="christian"> christian </option>
                      <option  value="jain"> jain </option>
                      <option  value="sikh"> sikh </option>
                  </select> <br>
                  <label for="Occupation" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">Occupation</label>
                  <select class="form-select tw-bg-white  tw-font-normal " name="occupation" required>
                      <option  value="engineer"> Engineer </option>
                      <option  value="musician"> Musician </option>
                      <option  value="freeLancing"> Free Lancing </option>
                      <option  value="accountent"> Accountant </option>
                      <option  value="business"> Business </option>
                  </select> <br>
                  <div class="tw-flex tw-flex-wrap tw-gap-1 tw-justify-items-stretch ">
                      <label for="City" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">City</label>
                      <input type="text" class="form-control tw-bg-white  tw-font-normal " name="city" placeholder="City"  required><br><br>
                      <div class="tw-flex">
                          <label for="State" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 tw-w-14 tw-mt-4 ">State</label>
                          <input type="text" class="form-control  tw-font-normal tw-w-28 tw-mt-4 " name="state" placeholder="State"  required>
                      </div>
                      <div class="tw-flex">
                          <label for="Country" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 tw-w-20  tw-mt-4 ">Country</label>
                          <input type="text" class="form-control tw-bg-white  tw-font-normal tw-w-28 tw-mt-4 " name="country" placeholder="Country"  required>
                      </div>                
                  </div>
                  <br>
                  <label for="profilePic" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">Your Picture</label>
                  <input type="file" name="pic" class="form-control tw-bg-white  tw-font-normal" required><br><br><br>
                 
                 <div id="next" class="tw-absolute  tw-right-1  tw-bottom-0 tw-text-center  tw-text-lg ubuntu-bold-italic tw-p-2 tw-bg-transparent tw-border tw-w-20   tw-border-indigo-400 tw-text-indigo-400  tw-rounded-lg hover:tw-bg-indigo-400 hover:tw-text-white hover:tw-text-xl hover:tw-cursor-pointer transition" > Next</div>
                  
                </div>
                <div class="block2 tw-hidden">
                  <label for="Email" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">Email</label>
                  <input type="email" class="form-control tw-bg-white  tw-font-normal " name="email" placeholder="Enter your email" required><br>
                  <label for="Password" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">Password</label>
                  <input type="password" class="form-control tw-bg-white  tw-font-normal " name="pass" placeholder="Enter your password"  required><br>
                  <label for="Password" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">Recheck Password</label>
                  <input type="password" class="form-control tw-bg-white  tw-font-normal " name="repass" placeholder="Confirm your password"  required><br>
                  <div id="pre" class="tw-text-lg ubuntu-bold-italic tw-p-2 tw-bg-transparent tw-border tw-w-16     tw-border-indigo-400 tw-text-indigo-400  tw-rounded-lg hover:tw-bg-indigo-400 hover:tw-text-white hover:tw-text-xl hover:tw-cursor-pointer transition" >Back</div>

                  <div class="tw-flex tw-justify-center tw-items-center tw-h-36  ">
                    <input type="submit" value="Register now" class=" tw-text-lg ubuntu-bold-italic tw-p-2 tw-bg-transparent tw-border tw-border-indigo-400 tw-text-indigo-400  tw-rounded-lg hover:tw-bg-indigo-400 hover:tw-text-white hover:tw-text-xl transition" >
                  </div>
                </div>
                
            </form>
        </div>
    </div>
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