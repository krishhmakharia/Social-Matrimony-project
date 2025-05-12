<?php
include("db.php");
if (isset($_COOKIE["login"])) {
    $email = $_COOKIE["login"];
    $code = md5($email);
    $month=array(1=>"Jan",2=>"Feb",3=>"Mar",4=>"Apr",5=>"May",6=>"Jun",7=>"Jul",8=>"Aug",9=>"Sep",10=>"Oct",11=>"Nov",12=>"Dec");
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
    </head>

    <body class="tw-bg-slate-950   ">
        <div class="tw-flex tw-flex-col-reverse md:tw-flex-row tw-flex-wrap ">
            <!-- Sidebar and bottom bar -->
            <div id="sidebar" class="tw-fixed tw-z-[9999] md:tw-top-0  tw-bottom-0 md:tw-left-0 tw-w-full md:tw-w-64 tw-border-t-[1px] md:tw-border-r-[1px] tw-border-gray-700 tw-h-14  md:tw-h-full tw-bg-black  tw-text-white ">
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
            <div class='tw-grid-cols-1  tw-mt-14 md:tw-ml-64 tw-w-full  md:tw-mt-0  tw-bg-slate-950   tw-justify-center tw-justify-items-center p-2 ' id='crossbar'>
                <!-- <div class='tw-bg-red-400 tw-rounded-lg tw-h-16 tw-w-full tw-flex tw-justify-between tw-items-center tw-p-4 tw-mt-6 tw-text-white'>
                    <span><strong>Success!</strong> Registration successful. Please login to continue.</span>
                    <i class='fa-solid fa-xmark fa-xl' id='crossalert'></i>
                </div> -->
                <?php 
                    if(isset($_GET["albsuccess"])){
                        echo "<div id='alertbar' class='tw-bg-green-400 tw-rounded-lg tw-h-16 tw-w-full tw-flex tw-justify-between tw-items-center tw-p-4 tw-mt-6 tw-text-white'>
                        <span><strong>Success!</strong> Album created successfully.</span>
                        <i class='fa-solid fa-xmark fa-xl hover:tw-cursor-pointer' id='crossalert'></i>
                    </div>";
                    }else if(isset($_GET["albagain"])){
                        echo "<div id='alertbar' class='tw-bg-red-400 tw-rounded-lg tw-h-16 tw-w-full tw-flex tw-justify-between tw-items-center tw-p-4 tw-mt-6 tw-text-white'>
                        <span><strong>Failed!</strong> Album creation failed.</span>
                        <i class='fa-solid fa-xmark fa-xl hover:tw-cursor-pointer ' id='crossalert'></i>
                    </div>";
                    }
                ?>    
            <!--Profile header-->
                <div class="tw-grid tw-grid-cols-2 tw-p-4 md:tw-mt-14 md:tw-mb-10 md:tw-w-1/2 ">
                    
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM details WHERE email='$email' ");
                    if ($row = mysqli_fetch_array($query)) {
                        $user_name = $row["fname"] . " " . $row["lname"];
                        $bio = $row["bio"];
                        $address = " : " . $row["city"] . ", " . $row["state"];
                        $connections = 0;
                        $posts = 0;
                    ?>
                        <div class="tw-mx-12  md:tw-mx-0 tw-justify-center  ">
                            <img src="profilePic/<?= $code ?>.jpg" class="tw-rounded-full tw-w-24 tw-h-24 md:tw-w-40 md:tw-h-40" alt="Profile pic">
                        </div>
                        <div>
                            <div class="md:tw-flex tw-gap-2 tw-w-full tw-whitespace-nowrap">
                                <h4 class="ubuntu-medium tw-font-bold tw-text-white tw-w-full"><?= $user_name ?></h4>
                                <a href="edit.php" class="tw-w-full"><button class=" tw-bg-white tw-bg-opacity-25  tw-text-gray-200 tw-p-2 tw-h-8 md:tw-w-full tw-rounded-lg tw-text-sm ubuntu-regular hover:tw-bg-opacity-20">Edit profile</button></a>
                                <button class=" tw-bg-white tw-bg-opacity-25  tw-text-gray-200 tw-p-2 tw-h-8 tw-rounded-lg tw-text-sm ubuntu-regular hover:tw-bg-opacity-20 md:tw-w-full">Share</button>
                            </div>
                            <div class="tw-p-1 tw-flex tw-text-white tw-pb-0">
                                <p class="ubantu-regular tw-font-normal">From</p>
                                <p class="ubantu-light tw-font-light tw-text-gray-400"><?= $address ?></p>
                            </div>
                            <div class="tw-p-1 tw-flex tw-text-white tw-gap-1">
                                <p class="ubantu-regular tw-font-normal">43</p>
                                <p class="ubantu-light tw-font-light tw-text-gray-400 tw-mr-3">Posts</p>
                                <p class="ubantu-regular tw-font-normal">3</p>
                                <p class="ubantu-light tw-font-light tw-text-gray-400 tw-mr-3">Albums</p>
                                <p class="ubantu-regular tw-font-normal">67</p>
                                <p class="ubantu-light tw-font-light tw-text-gray-400">Connections</p>
                            </div>
                            <div class="tw-p-1 ">
                                <div class="tw-bg-gray-600  tw-bg-opacity-35   tw-rounded-lg tw-w-52 md:tw-w-72  tw-h-24">
                                    <p class="ubantu-light tw-font-light tw-text-white tw-text-[12px] tw-p-2"><?= $bio ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>

                <!--Album content -->
                <div class="tw-border-t-2 tw-border-white tw-border-opacity-50 tw-w-full tw-p-2 tw-text-white">
                    <div class="tw-my-4 tw-p-2">
                        <h5>Create Album</h5>
                        <form action="createAlbum.php" method="post" class="tw-flex tw-gap-2 tw-whitespace-nowrap">
                            <input type="text" name="album" class="form-control" placeholder="Album name" required><br>
                            <input type="submit" value="Create" class="btn btn-dark">
                        </form>
                    </div>
                    <div class="tw-w-full tw-grid tw-grid-cols-2 md:tw-grid-cols-3 tw-gap-12  tw-p-3 md:tw-px-4 tw-mb-14  ">
                        <?php
                        $query = mysqli_query($conn, "Select * from Album where email='$email'");
                        while ($row = mysqli_fetch_array($query)) {
                            $album_name = $row["album_name"];
                            $album_code = $row["album_code"];
                            $d=explode("-",$row["album_date"]);
                            $album_date = $month[(int)$d[1]].", ".$d[2]." ".$d[0];
                            // echo $month[(int)$d[1]];
                            
                            $q = mysqli_query($conn, "Select sn from galleries where email='$email' AND album_code='$album_code'");
                            $src = "imgs/folder.svg";
                            if ($r = mysqli_fetch_array($q)) {
                                $src = "gallery/$code/$album_code/$r[0].jpg";
                            }
                        ?>
                            <!--album-->
                            <div id="<?= $album_name ?>" rel="<?= $album_code ?>" class="album  tw-flex tw-flex-col tw-w-60 md:tw-w-80 tw-bg-white tw-bg-opacity-20 tw-rounded-lg tw-gap-2 tw-shadow-transparent hover:tw-bg-opacity-55 tw-aspect-[4/4]  hover:tw-cursor-pointer tw-pt-0 ">

                                <div class="tw-relative tw-overflow-hidden ">
                                    <img src="<?= $src ?>" class="tw-rounded-t-lg   tw-object-cover  tw-aspect-[4/3]   " alt="Album">
                                    <img src="imgs/menu3.svg" class=" menubtn img-fluid  tw-absolute  tw-h-10  tw-w-10  tw-top-2  tw-right-0 hover:tw-cursor-pointer hover:tw-w-12 hover:tw-h-12 hover:tw-right-0 " id="<?= $album_name ?>" alt="menubtn">
                                    <div class="menuBox  tw-hidden tw-absolute tw-right-2 tw-top-2 tw-bg-slate-700 tw-w-24 tw-h-[88px] tw-rounded-md tw-shadow-md tw-shadow-black  tw-flex-col tw-gap-2 " id="<?= $album_name ?>">
                                        <table class="tw-justify-items-center tw-text-center  tw-mt-2 tw-p-3 tw-pb-0 tw-text-sm table-striped">
                                            <tr class=" tw-border-white tw-border-b-2   ">
                                                <td class=""><img src="imgs/menus2.svg" class="menubtn tw-ml-16    img-fluid   tw-h-6  tw-w-6  hover:tw-cursor-pointer hover:tw-w-7  hover:tw-h-7 " id="<?= $album_name ?>" alt="menubtn"></td>
                                            </tr>
                                            <tr class="hover:tw-bg-slate-50   hover:tw-text-black ">
                                                <td> Rename</td>
                                            </tr>
                                            <tr class="hover:tw-bg-red-500    hover:tw-text-white ">
                                                <td class="delete" rel="<?= $album_code ?>" id="<?= $album_name ?>"> Delete</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="tw-flex tw-flex-col tw-whitespace-nowrap tw-p-2 text-white tw-justify-between ">
                                    <div class="tw-flex tw-gap-1 tw-items-center tw-justify-items-start">
                                        <h4 class=" tw-whitespace-nowrap ">
                                            Title :
                                        </h4>
                                        <a href="gallery.php?id=<?= $album_code ?>" class="tw-no-underline tw-overflow-hidden tw-font-bold tw-p-1 tw-mb-1  tw-text-xl "> <?= $album_name ?></a>
                                    </div>
                                    <p><?=$album_date?></p>
                                </div>
                            </div>

                        <?php
                        }
                        ?>
                    </div>
                </div>

            </div>

            <!-- top bar -->
            <div id="topBar" class="tw-fixed md:tw-hidden tw-top-0  tw-w-full tw-h-14 tw-border-b-[1px]  tw-border-gray-700 tw-bg-black tw-text-white ">
                <!-- <button id="toggleBtn" class="tw-absolute tw-top-0 tw-right-0 tw-text-white tw-px-2 tw-py-2 tw-rounded tw-mb-4">☰</button> -->
            </div>
        </div>
        <script src="x.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php
}
else {
    header("location:logout.php");
    exit();
}
?>