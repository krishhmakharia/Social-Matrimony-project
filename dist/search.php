<?php
include("db.php");
if (isset($_COOKIE["login"])) {
    $email = mysqli_real_escape_string($conn, $_COOKIE["login"]);
    $code = md5($email);
    $month = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SevenVerse-Home</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="stylesheet" href="custom.css">
        <!--jQuery-->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script>
            $(document).on("click", ".connect", function() {
                var code = $(this).attr("rel");
                $(this).prop("disabled", true);

                $.post("connect.php", { id: code }, function(data) {
                    if (data.trim() === "success") {
                        $("#" + code).fadeOut(1000); 
                    } else {
                        alert("Something went wrong. Try again.");
                    }
                }).fail(function() {
                    alert("Failed to connect to the server.");
                });
            });

        </script>
    </head>

    <body class="tw-bg-black  ">
        <div class="tw-flex tw-flex-col-reverse md:tw-flex-row tw-flex-wrap  ">

            <!-- Sidebar and bottom bar -->
            <div id="sidebar" class="tw-fixed md:tw-top-0 tw-bottom-0 md:tw-left-0 tw-w-full md:tw-w-64 tw-border-t-[1px] md:tw-border-r-[1px] tw-border-gray-700 tw-h-14  md:tw-h-full tw-bg-black      tw-text-white ">
                <!-- <button id="toggleBtn" class="tw-absolute tw-top-0 tw-right-0 tw-text-white tw-px-2 tw-py-2 tw-rounded tw-mb-4">☰</button> -->
                <div class="tw-hidden md:tw-block tw-relative tw-p-4 tw-text-2xl tw-font-bold hover:tw-text-indigo-400">
                    SevenVerse
                </div>
                <ul class="tw-flex md:tw-flex-col  md:tw-mt-4 tw-ml-[-25px]  tw-justify-between">
                    <li class="tw-p-3  tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="profile.php" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/profile.svg" alt="">
                            <p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1"> Profile</p>
                        </a></li>
                    <li class="tw-p-3  tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="search.php" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/search.svg" alt="">
                            <p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1">Search</p>
                        </a></li>
                    <li class="tw-p-3 tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="notification.php" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/notification.svg" alt="">
                            <p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1">Notifications</p>
                        </a></li>
                    <li class="tw-p-3  tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="connection.php" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/connection.svg" alt="">
                            <p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1">Connections </p>
                        </a></li>
                    <li class="tw-p-3 tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="setting.php" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/settings.svg" alt="">
                            <p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1">Settings </p>
                        </a></li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="tw-flex tw-ml-0 md:tw-ml-64 tw-p-6 tw-mt-8 md:tw-pt-0 md:tw-mt-0 tw-text-white tw-w-full">
                <div class="md:tw-mt-4 tw-mt-28   tw-flex tw-flex-col tw-gap-4  tw-w-full md:tw-w-3/4   ">
                    <?php

                    if (isset($_POST["gender"]) && isset($_POST["caste"]) && isset($_POST["religion"])) {
                        $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
                        $caste = mysqli_real_escape_string($conn, $_POST["caste"]);
                        $religion = mysqli_real_escape_string($conn, $_POST["religion"]);
                       // echo $gender." ".$caste." ".$religion;
                        $q = "SELECT * FROM details 
                                    WHERE email <> '$email' 
                                      AND (
                                            code NOT IN (SELECT code FROM intrested WHERE email = '$email')  
                                            AND email NOT IN (SELECT email FROM intrested WHERE code = '$code')
                                          )
                                      AND gender = '$gender' 
                                      AND caste = '$caste' 
                                      AND religion = '$religion' ";
                                    
                        
                    } else {
                        $q = "SELECT * FROM details 
                                    WHERE email <> '$email' 
                                      AND (
                                            code NOT IN (SELECT code FROM intrested WHERE email = '$email')  
                                            AND email NOT IN (SELECT email FROM intrested WHERE code = '$code')
                                          )
                                    ORDER BY RAND() 
                                    LIMIT 0,5";
                        
                    }

                    $query = mysqli_query($conn, $q);

                    while ($row = mysqli_fetch_array($query)) {
                        $username = $row["fname"] . " " . $row["lname"];
                        $gender = $row["gender"];
                        $dob = explode("-", $row["birth"]);
                        $dob = $dob[2] . " " . $month[(int)$dob[1]] . ", " . $dob[0];
                        $occupation = $row["occupation"];
                        $user_code = $row["code"];
                        $bio = $row["bio"];
                    ?>
                        <div class="<?= $user_code ?> md:tw-w-full md:tw-h-[278px]  tw-bg-transparent tw-border-[1px] tw-border-opacity-35 hover:tw-border-opacity-65 hover:tw-bg-slate-800  tw-border-white tw-rounded-xl tw-flex tw-w-full  tw-p-4 tw-gap-4" id="<?= $user_code ?>">
                            <div>
                                <img src="profilePic/<?= $user_code ?>.jpg" class="tw-h-10 tw-w-10  md:tw-w-20  md:tw-h-20 tw-rounded-full tw-m-2" alt="">
                            </div>
                            
                               
                                <div class="tw-relative  tw-overflow-hidden  tw-flex tw-flex-col  tw-w-full tw-gap-4  ">
                                    <div class="tw-flex tw-flex-col tw-justify-items-stretch       ">
                                        <h3 class="tw-font-bold ubuntu-bold tw-text-lg tw-text-white tw-m-0"><?= $username ?></h3>
                                        <p class="tw-text-gray-400 tw-m-0"><?= $gender ?> | <?= $dob ?></p>
                                        <div class="tw-flex tw-gap-2"> 
                                            <p class="ubuntu-regular tw-font-medium ">Occupation :</p>
                                            <p class="tw-text-gray-400 tw-m-0"><?= $occupation ?></p>
                                        </div>
                                        <p class="tw-text-gray-400 tw-m-0  tw-h-8 tw-overflow-auto md:tw-overflow-visible "><?= $bio ?></p>
                                    </div>
                                    <div class="tw-flex tw-p-2 tw-gap-4 tw-justify-evenly md:tw-absolute   md:tw-bottom-1 tw-overflow-y-hidden tw-z-0 ">
                                        <a href="view_profile.php?id=<?= $user_code ?>" class="tw-no-underline tw-text-white tw-font-semibold tw-bg-indigo-400 tw-rounded-md tw-p-3 tw-flex tw-gap-2   tw-transition tw-delay-150 tw-duration-300 tw-ease-in-out hover:tw-translate-y-1 hover:tw-scale-110 "><img src="imgs/profile.svg" class="img-fluid tw-w-5 tw-h-5" alt=""> View profile</a>
                                        <button class="connect tw-no-underline tw-text-white tw-font-semibold tw-bg-red-700  tw-rounded-md tw-p-3 tw-flex tw-gap-2 tw-transition tw-delay-150 tw-duration-300 tw-ease-in-out hover:tw-translate-y-1 hover:tw-scale-110 tw-overflow-hidden tw-z-0  " rel="<?= $user_code ?>"><img src="imgs/add_friend.svg" class="img-fluid tw-w-5 tw-h-5" alt="">Connect</button>
                                    </div>
                                </div>
                               
                            

                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="">
                    <div class="tw-hidden md:tw-flex tw-flex-col tw-fixed tw-right-0 tw-bg-black tw-text-white tw-border-white tw-border-l-2 tw-border-opacity-25   tw-h-full tw-p-4 ">
                        <h3 class="tw-font-bold ubuntu-regular  tw-opacity-100   tw-mt-3 tw-text-start "> Filter :</h3>
                        <form action="search.php" method="post">
                            <label for="Gender" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 tw-opacity-65 ">Gender</label>
                            <input type="Radio" class="tw-mx-2 tw-mt-0" name="gender" value="male"> Male <input type="Radio" class="tw-mx-2" name="gender" value="female"> Female <br>
                            <label for="Caste" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 tw-opacity-65 tw-mt-4 ">Caste</label>
                            <input type="text" class="form-control tw-bg-white  tw-text-black tw-font-normal " name="caste" placeholder="Enter Caste" required><br>
                            <label for="Religion" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 tw-opacity-65 ">Religion</label>
                            <select class="form-select tw-bg-white  tw-text-black tw-font-normal " name="religion" required>
                                <option value="hindu"> hindu </option>
                                <option value="Muslim"> muslim </option>
                                <option value="Christian"> christian </option>
                                <option value="jain"> jain </option>
                                <option value="sikh"> sikh </option>
                            </select> <br>
                            <input type="submit" class="tw-bg-red-700 tw-text-emerald-100 tw-font-medium tw-p-2 tw-rounded-lg tw-mt-2 tw-ml-2" value="Search">
                        </form>
                    </div>
                </div>

            </div>

            <!-- filter bar -->
            <div class="tw-fixed md:tw-hidden tw-top-[17px]  tw-mt-7  tw-w-full tw-h-28  tw-border-[1px]  tw-border-gray-700 tw-bg-black tw-text-white  ">
                <form action="search.php" method="post" class="tw-flex tw-justify-between tw-items-center tw-p-4 ">
                    <div>
                        <label for="Gender" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium  tw-opacity-65 ">Gender</label>
                        <input type="Radio" class="tw-mx-2" name="gender" value="male"> Male<br>
                        <input type="Radio" class="tw-mx-2" name="gender" value="female">Female
                    </div>
                    <div>
                        <label for="Caste" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-opacity-65 ">Caste</label>
                        <input type="text" class="form-control tw-bg-white  tw-text-black tw-font-normal " name="caste" placeholder="Enter Caste" required>
                    </div>
                    <div>
                        <label for="Religion" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-opacity-65 ">Religion</label>
                        <select class="form-select tw-bg-white  tw-text-black tw-font-normal " name="religion" required>
                            <option value="hindu"> hindu </option>
                            <option value="Muslim"> muslim </option>
                            <option value="Christian"> christian </option>
                            <option value="jain"> jain </option>
                            <option value="sikh"> sikh </option>
                        </select>
                    </div>
                    <div>
                        <input type="submit" class="tw-bg-red-700 tw-text-emerald-100 tw-font-medium tw-p-2 tw-rounded-lg tw-mt-8 " value="Search">
                    </div>
                </form>
            </div>
            <div id="topBar" class="tw-fixed md:tw-hidden tw-top-0 tw-left-0 tw-w-full tw-h-14 tw-border-b-[1px]  tw-border-gray-700 tw-bg-black tw-text-white ">

                <!-- <button id="toggleBtn" class="tw-absolute tw-top-0 tw-right-0 tw-text-white tw-px-2 tw-py-2 tw-rounded tw-mb-4">☰</button> -->
            </div>
        </div>

    </body>

    </html>
<?php
} else {
    header("location:logout.php");
}
?>