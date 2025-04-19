<?php
include("db.php");
if (isset($_COOKIE["login"])) {
    $email = mysqli_real_escape_string($conn, $_COOKIE["login"]);
    $code = md5($email);
    if ($_GET["id"]) {
        $album_code = mysqli_real_escape_string($conn, $_GET["id"]);
        $query = mysqli_query($conn, "SELECT album_name FROM album WHERE album_code='$album_code' ");
        if ($query) {
            $row = mysqli_fetch_assoc($query); // Fetch the first row as an associative array
            $album_name = $row['album_name'];  // Extract album_name
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

            <body class="tw-bg-black  ">
                <div class="tw-flex tw-flex-col-reverse md:tw-flex-row tw-flex-wrap tw-gap-2 ">
                    <!-- Sidebar and bottom bar -->
                    <div id="sidebar" class=" tw-fixed tw-z-[9999] md:tw-top-0 tw-bottom-0 md:tw-left-0 tw-w-full md:tw-w-64 tw-border-t-[1px] md:tw-border-r-[1px] tw-border-gray-700 tw-h-14  md:tw-h-full tw-bg-black  tw-text-white ">
                        <!-- <button id="toggleBtn" class="tw-absolute tw-top-0 tw-right-0 tw-text-white tw-px-2 tw-py-2 tw-rounded tw-mb-4">☰</button> -->
                        <div class="tw-hidden md:tw-block tw-relative tw-p-4 tw-text-2xl tw-font-bold hover:tw-text-indigo-400">
                            SevenVerse
                        </div>
                        <ul class="tw-flex md:tw-flex-col  md:tw-mt-4 tw-ml-[-25px]  tw-justify-between">
                            <li class="tw-p-3  tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="profile.php" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/profile.svg" alt="">
                                    <p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1"> Profile</p>
                                </a></li>
                            <li class="tw-p-3  tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/search.svg" alt="">
                                    <p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1">Search</p>
                                </a></li>
                            <li class="tw-p-3 tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/notification.svg" alt="">
                                    <p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1">Notifications</p>
                                </a></li>
                            <li class="tw-p-3  tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/connection.svg" alt="">
                                    <p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1">Connections </p>
                                </a></li>
                            <li class="tw-p-3 tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="setting.php" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/settings.svg" alt="">
                                    <p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1">Settings </p>
                                </a></li>
                        </ul>
                    </div>
                    <!-- Main Content -->
                    <div class="tw-flex-1 tw-ml-0 md:tw-ml-64 tw-p-6 tw-mt-8 md:tw-mt-0 tw-text-white">
                        <div>
                            <h1 class="tw-font-bold ubuntu-bold tw-mt-3 ">Album : <i class="tw-text-gray-400 tw-stroke-black "><?= $album_name ?></i></h1>
                            <form class=" tw-bg-gray-500 tw-bg-opacity-35 tw-p-4  tw-rounded-lg" action="uploadAlbumImage.php?id=<?= $album_code ?>" method="post" enctype="multipart/form-data">
                                <label for="File" class="tw-font-bold ubuntu-bold ">Upload Image</label>
                                <div class="tw-flex tw-flex-wrap tw-p-2 tw-gap-3">
                                    <input type="file" class="form-control tw-w-60 " name="pic" required>
                                    <input type="submit" class="tw-bg-red-700 tw-text-emerald-100 tw-font-medium tw-p-2 tw-rounded-lg " value="upload">
                                </div>
                            </form>
                        </div>
                        <div class="tw-grid tw-grid-cols-2 md:tw-grid-cols-4 tw-gap-1  tw-my-4 tw-pt-4 tw-border-t-0  tw-border-white tw-border-opacity-75">
                            <?php
                            $g = mysqli_query($conn, "SELECT * FROM galleries WHERE email='$email' AND album_code='$album_code'");
                            while ($row = mysqli_fetch_array($g)) {
                                $src = "gallery/$code/$album_code/" . $row['sn'] . ".jpg";
                                ?>
                                <div>
                                    <div class=" tw-relative tw-overflow-hidden tw-aspect-[3/4]" id="<?=$row[0]?>">
                                        <img src="<?= $src ?>" alt="Image" data-bs-toggle="modal" data-bs-target="#myModal<?=$row[0]?>" class="tw-w-full tw-h-full  tw-object-cover">
                                        <img src="imgs/cross5.svg" class="crossbtn img-fluid tw-h-6  tw-w-6  tw-border-2 tw-rounded-full   tw-border-white tw-absolute  tw-top-2  tw-right-2 hover:tw-cursor-pointer" alt="Close"  id="<?=$album_code?>" rel="<?=$row[0]?>" >
                                    </div>
                                </div>
                                <!--Modal-->
                                <div class="modal fade" id="myModal<?=$row[0]?>">
                                    <div class="modal-dialog  modal-dialog-centered ">
                                        <div class="card tw-shadow-lg tw-shadow-black tw-p-0 tw-relative tw-aspect-[4/3]" >
                                            <button type="button" class="btn-close tw-absolute tw-top-0 tw-right-0 tw-m-4" data-bs-dismiss="modal"></button>                                                    
                                            <img src="<?=$src?>" alt="Image"class="tw-w-full tw-h-full  tw-object-cover">                                   
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <!-- top bar -->
                    <div id="topBar" class="tw-fixed md:tw-hidden tw-top-0  tw-w-full tw-h-14 tw-border-b-[1px]  tw-border-gray-700 tw-bg-black tw-text-white ">
                        <!-- <button id="toggleBtn" class="tw-absolute tw-top-0 tw-right-0 tw-text-white tw-px-2 tw-py-2 tw-rounded tw-mb-4">☰</button> -->
                    </div>
                </div>
                <!-- The Modal -->
                    
                <script src="x.js"></script>            
                        
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            </body>

            </html>
<?php
        }
    } else {
        header("location:profile.php?empty=1");
    }
} else {
    header("location:logout.php");
}
?>