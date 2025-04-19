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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).on("click",".accept",function(){
                var code=$(this).attr("data-id");
                //alert(code);
                $.post(
                    "req_accept.php",
                    {
                        id:code
                    },
                    function(data){
                        if(data=="success"){
                            $("#"+code).fadeOut(1000);
                        }
                    }     
                );
            });
            $(document).on("click",".reject",function(){
                var code=$(this).attr("data-id");
                //alert(code);
                $.post(
                    "req_reject.php",
                    {
                        id:code
                    },
                    function(data){
                        if(data=="success"){
                            $("#"+code).fadeOut(1000);
                        }
                    }     
                );
            });
        </script>
    </head>

    <body class="tw-bg-black ">
        <div class="tw-flex tw-flex-col-reverse md:tw-flex-row tw-flex-wrap  ">

            <!-- Sidebar and bottom bar -->
            <div id="sidebar" class="tw-fixed md:tw-top-0 tw-bottom-0 md:tw-left-0 tw-w-full md:tw-w-64 tw-border-t-[1px] md:tw-border-r-[1px] tw-border-gray-700 tw-h-14  md:tw-h-full tw-bg-black  tw-text-white ">
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
            <div class="tw-flex-1 tw-ml-0 md:tw-ml-64 tw-p-6 tw-mt-10  md:tw-mt-0 tw-text-white">
                <h1 class="ubuntu-bold tw-font-bold tw-text-white tw-flex  tw-gap-4 " > <img src="imgs/notification1.svg" class="img-fluid tw-w-11 tw-h-11 " alt=""> Notifications</h1>
                <div class=" tw-w-full tw-flex tw-flex-col tw-gap-4 tw-p-2">
                    <?php 
                        $query=mysqli_query($conn,"SELECT * FROM details WHERE email IN (SELECT email from intrested where code='$code' AND intrest=0 )");
                        while($row=mysqli_fetch_array($query)){
                            $username=$row["fname"]." ".$row["lname"];
                            $gender=$row["gender"];
                            $dob=explode("-", $row["birth"]);
                            $dob=$dob[2]." ".$month[(int)$dob[1]].", ".$dob[0];
                            $occupation=$row["occupation"];
                            $user_code=$row["code"];
                            $bio=$row["bio"];
                            $pic="profilePic/$user_code.jpg";
                            ?>
                            <div id="<?=$user_code?>" class=" tw-relative tw-overflow-hidden tw-z-10  tw-w-full md:tw-w-3/4 tw-border-[1px] tw-border-white tw-border-opacity-35 hover:tw-border-opacity-75 tw-p-4 tw-flex tw-rounded-3xl tw-gap-4 ">
                                <div><img src="<?=$pic?>" class="img-fluid tw-rounded-full tw-w-24 tw-h-24 tw-border-double" alt=""></div>
                                <div class="tw-flex tw-flex-col">
                                    <div><h3><?=$username?></h3></div>
                                    <div><p class="tw-text-gray-400 tw-m-0"><?=$gender?> | <?=$dob?></p></div>
                                </div>

                                <div class="tw-flex tw-absolute tw-right-10  tw-mt-6 tw-gap-4">
                                    <div data-id="<?=$user_code?>" class="md:tw-p-4 tw-p-2 hover:tw-bg-indigo-600 tw-rounded-full hover:tw-border-[1px]  hover:tw-bg-opacity-80 hover:tw-border-opacity-60 hover:tw-shadow-sm   hover:tw-border-white"><a  href="view_profile.php?id=<?=$user_code?>"><img src="imgs/view.svg" class="img-fluid tw-w-6 tw-h-6  md:tw-w-8  md:tw-h-8" alt=""></a></div>
                                    <div data-id="<?=$user_code?>" class="accept md:tw-p-4 tw-p-2 hover:tw-bg-green-600 tw-rounded-full hover:tw-border-[1px] hover:tw-bg-opacity-80 hover:tw-border-opacity-60 hover:tw-shadow-sm   hover:tw-border-white"><img src="imgs/accept2.svg" class="img-fluid tw-w-6 tw-h-6  md:tw-w-8  md:tw-h-8" alt=""></div>
                                    <div data-id="<?=$user_code?>" class="reject md:tw-p-4 tw-p-2 hover:tw-bg-red-600 tw-rounded-full hover:tw-border-[1px] hover:tw-bg-opacity-80 hover:tw-border-opacity-60 hover:tw-shadow-sm   hover:tw-border-white"><img src="imgs/reject2.svg" class="img-fluid tw-w-6 tw-h-6 md:tw-w-8  md:tw-h-8" alt=""></div>
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

       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php
} else {
    header("location:logout.php");
}

?>