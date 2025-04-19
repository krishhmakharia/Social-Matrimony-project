<?php
include("db.php");
if (isset($_COOKIE["login"])) {
    $email = $_COOKIE["login"];
    $code = md5($email);
    $month = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");
    if (isset($_GET["id"])) {
        $user_code = mysqli_real_escape_string($conn, $_GET["id"]);
        $user_email;
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>user profile</title>
            <link rel="stylesheet" href="style.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
            <link rel="stylesheet" href="custom.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).on('click', '.connect', function() {
                    var code = $(this).attr('data');
                    
                    $.post(
                        "connect.php",
                        { id: code },
                        function(data) {
                            if (data === "success") {
                                alert("Request send successfull");
                                window.location.href = "search.php";
                            }
                        }
                    );
                });

                $(document).on('click','.blocked',function(){
                    var code=$(this).attr('data');
                    //alert(code);
                    $.post(
                        "blocked_connection.php",
                        { id: code },
                        function(data) {
                            if (data === "success") {
                                alert("Blocked successfull");
                            }
                        }
                    );
                })
                $(document).on('click','.unfollow',function(){
                    var code=$(this).attr('data');
                    //alert(code);
                    $.post(
                        "remove_connection.php",
                        { id: code },
                        function(data) {
                            if (data === "success") {
                                alert("disconnected successfull");
                                window.location.href = "view_profile.php?id="+code;
                            }
                        }
                    );
                })
            </script>
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
                <div class="tw-grid-cols-1  tw-mt-14 md:tw-ml-64 tw-w-full  md:tw-mt-0  tw-bg-slate-950   tw-justify-center tw-justify-items-center ">
                    <!--Profile header-->
                    <div class="tw-grid tw-grid-cols-2 tw-p-4  md:tw-w-1/2 ">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM details WHERE code='$user_code'") or die (mysqli_error($conn));
                        if ($row = mysqli_fetch_array($query)) {
                            $user_email=$row["email"];
                            $user_name = $row["fname"] . " " . $row["lname"];
                            $bio = $row["bio"];
                            $address = " : " . $row["city"] . ", " . $row["state"];
                            $connections = 0;
                            $posts = 0;

                        ?>
                            <div class="tw-mx-12  md:tw-mx-0 tw-justify-center  ">
                                <img src="profilePic/<?= $user_code ?>.jpg" class="tw-rounded-full tw-w-24 tw-h-24 md:tw-w-40 md:tw-h-40" alt="Profile pic">
                            </div>
                            <div>
                                <div class="md:tw-flex tw-gap-2 tw-w-full tw-whitespace-nowrap">
                                    <h4 class="ubuntu-medium tw-font-bold tw-text-white tw-w-full"><?= $user_name ?></h4>
                                    <button class=" tw-bg-white tw-bg-opacity-25  tw-text-gray-200 tw-p-2 tw-h-8 tw-rounded-lg tw-text-sm ubuntu-regular hover:tw-bg-opacity-20 md:tw-w-full">Share</button>
                                </div>
                                <div class="tw-p-1 tw-flex tw-text-white">
                                    <p class="ubantu-regular tw-font-normal">Place</p>
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
                    <?php
                        //$z="SELECT * FROM details WHERE code IN (SELECT code FROM intrested WHERE email='$email' AND intrest=1 ) OR email IN (SELECT email FROM intrested WHERE code='$user_code' AND intrest=1)";
                        // $z="Select * from intrested where (code='$code' AND email='$user_email' AND intrest=1) OR (code='$user_code' AND email='$email' AND intrest=1) ";
                        // $result=mysqli_query($conn,$z ) or die(mysqli_error($conn));
                        $result=mysqli_query($conn,"Select * from intrested where (code='$code' AND email='$user_email' AND intrest=1 AND (blockby='' OR blockby='$email')) OR (code='$user_code' AND email='$email' AND intrest=1 AND (blockby='' OR blockby='$email')) ");
                        if($r=mysqli_fetch_array($result)){                            
                            // echo $email. " ". $code." ".$user_email." ".$user_code;
                            $blockBy=$r["blockBy"];
                    ?>
                        <div class="tw-flex tw-justify-center tw-gap-4 tw-border-b-2 tw-border-white tw-border-opacity-50 tw-w-full tw-p-2 tw-text-white">
                                <button data="<?=$user_code?>" class="unfollow tw-p-3 tw-w-auto  tw-h-auto   tw-bg-yellow-500   hover:tw-bg-yellow-700   tw-text-white tw-font-medium tw-rounded-xl tw-shadow-lg tw-flex tw-gap-2 hover:tw-cursor-pointer"><img src="imgs/unfollow.svg" class="img-fluid tw-w-5 tw-h-5" alt="">Disconnect</button>
                                <button class="blocked tw-p-3 tw-w-24   tw-h-auto   tw-bg-red-700 hover:tw-bg-red-950   tw-text-white tw-font-medium tw-rounded-xl tw-shadow-lg tw-flex tw-gap-2 hover:tw-cursor-pointer"><img src="imgs/block1.svg" class="img-fluid tw-w-5 tw-h-5" alt="">Block</button>
                        </div>
                        <div class="tw-border-t-2 tw-border-white tw-border-opacity-50 tw-w-full tw-p-2 tw-text-white">
                            <h4 class="tw-text-2xl tw-font-bold tw-text-center tw-mt-2">Albums</h4>
                            
                            <div class="tw-w-full tw-grid tw-grid-cols-2 md:tw-grid-cols-3 tw-gap-12  tw-p-3 md:tw-px-4 tw-mb-14  ">
                                <?php
                                // echo $user_code . " " . $user_email;
                                $query = mysqli_query($conn, "Select * from Album where email='$user_email'");
                                while ($row = mysqli_fetch_array($query)) {
                                    $album_name = $row["album_name"];
                                    $album_code = $row["album_code"];
                                    $d = explode("-", $row["album_date"]);
                                    $album_date = $month[(int)$d[1]] . ", " . $d[2] . " " . $d[0];
                                    // echo $month[(int)$d[1]];

                                    $q = mysqli_query($conn, "Select sn from galleries where email='$user_email' AND album_code='$album_code'");
                                    $src = "imgs/folder.svg";

                                    if ($ra = mysqli_fetch_array($q)) {
                                        $src = "gallery/$user_code/$album_code/$ra[0].jpg";
                                    }
                                ?>
                                    <!--album-->
                                    <div class="album  tw-flex tw-flex-col tw-w-60 md:tw-w-80 tw-bg-white tw-bg-opacity-20 tw-rounded-lg tw-gap-2 tw-shadow-transparent hover:tw-bg-opacity-55 tw-aspect-[4/4]  hover:tw-cursor-pointer tw-pt-0 ">
                                        <div class="tw-relative tw-overflow-hidden ">
                                            <img src="<?= $src ?>" class="tw-rounded-t-lg   tw-object-cover  tw-aspect-[4/3]   " alt="Album">
                                        </div>
                                        <div class="tw-flex tw-flex-col tw-whitespace-nowrap tw-p-2 text-white tw-justify-between ">
                                            <div class="tw-flex tw-gap-1 tw-items-center tw-justify-items-start">
                                                <h4 class=" tw-whitespace-nowrap ">
                                                    Title :
                                                </h4>
                                                <a href="view_gallery.php?id=<?= $album_code ?>&uid=<?=$user_code?>" class="tw-no-underline tw-overflow-hidden tw-font-bold tw-p-1 tw-mb-1  tw-text-xl "> <?= $album_name ?></a>
                                            </div>
                                            <p><?= $album_date ?></p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    else {
                        if(empty($blockBy)){
                            ?>
                            <div class="tw-flex tw-justify-center tw-gap-4 tw-border-b-2 tw-border-white tw-border-opacity-50 tw-w-full tw-p-2 tw-text-white">
                                <button data="<?=$user_code?>" class="connect tw-p-3 tw-w-auto  tw-h-auto   tw-bg-green-700 hover:tw-bg-green-900   tw-text-white tw-font-medium tw-rounded-xl tw-shadow-lg tw-flex tw-gap-2 hover:tw-cursor-pointer"><img src="imgs/add_friend.svg" class="img-fluid tw-w-5 tw-h-5" alt="">Connect</button>
                                <!-- <button data="" class="blocked tw-p-3 tw-w-24   tw-h-auto   tw-bg-red-700 hover:tw-bg-red-900   tw-text-white tw-font-medium tw-rounded-xl tw-shadow-lg tw-flex tw-gap-2 hover:tw-cursor-pointer"><img src="imgs/block1.svg" class="img-fluid tw-w-5 tw-h-5" alt="">Block</button> -->
                            </div>
                            <div class="tw-flex tw-justify-center tw-mt-6 tw-gap-4">
                                <div class="tw-h-12 tw-w-12  tw-rounded-full tw-border-white tw-border-2 tw-p-2">
                                    <img src="imgs/lock.svg" class="img-fluid tw-h-9 tw-w-9  " alt="">
                                </div>
                                <div class="tw-flex tw-flex-col tw-gap-0">
                                    <h4 class="tw-text-white ubuntu-medium ">This account is private </h4>
                                    <p class="tw-text-gray-400 ubantu-light tw-mt-0" >Connect to see their albums</p>
                                </div>
                            </div>
                        <?php
                        }else{
                            ?>
                                <div class="tw-flex tw-justify-center tw-mt-6 tw-gap-4">
                                    <div class="tw-h-12 tw-w-12  tw-rounded-full tw-border-white tw-border-2 tw-p-2">
                                        <img src="imgs/block1.svg" class="img-fluid tw-h-9 tw-w-9  " alt="">
                                    </div>
                                    <div class="tw-flex tw-flex-col tw-gap-0">
                                        <h4 class="tw-text-white ubuntu-medium ">You have being Blocked </h4>
                                        
                                    </div>
                                </div>
                            <?php
                        }

                    }
                    ?>

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
    } else {
        header("location:search.php?view_profile_error=1");
    }
} else {
    header("location:logout.php");
    exit();
}
?>