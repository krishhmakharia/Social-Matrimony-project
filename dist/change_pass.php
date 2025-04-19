<?php
include("db.php");
if (isset($_COOKIE["login"])) {
    $email = mysqli_real_escape_string($conn, $_COOKIE["login"]);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change-password</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="stylesheet" href="custom.css">
    </head>

    <body class="tw-bg-black  ">
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
            <div class="tw-flex-1 tw-ml-0 md:tw-ml-64 tw-p-6 tw-mt-8 md:tw-mt-0 tw-text-white  tw-justify-items-center">
                <div class="tw-absolute  tw-justify-items-start"><h1 class="tw-font-bold ubuntu-bold tw-mt-3  tw-text-start tw-left-1 tw-mb-4 ">Settings : <i class="tw-text-gray-400 tw-stroke-black ">Change-password</i></h1></div>
                <div class="tw-w-full md:tw-w-1/2   tw-h-auto  tw-bg-white tw-bg-opacity-20 tw-rounded-lg tw-shadow-md tw-p-6  hover:tw-bg-opacity-30 tw-mt-20   ">
                        <form action="update_pass.php" method="post" class="tw-p-2">
                            <label for="old_pass" class="tw-font-bold ubuntu-bold tw-text-white tw-m-2">Current Password</label>
                            <input type="password" class="form-control tw-m-2 tw-mt-0 tw-w-full   " name="cp" required>
                            <label for="old_pass" class="tw-font-bold ubuntu-bold tw-text-white tw-m-2">New Password</label>
                            <input type="password" class="form-control tw-m-2 tw-mt-0   " name="np" required>
                            <label for="old_pass" class="tw-font-bold ubuntu-bold tw-text-white tw-m-2">Confirm Password</label>
                            <input type="password" class="form-control tw-m-2 tw-mt-0  " name="rp" required>
                            <input type="submit" class="tw-bg-red-700 tw-text-emerald-100 tw-font-medium tw-p-2 tw-rounded-lg tw-mt-2 tw-ml-2" value="Change Password">
                        </form>
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
}
else{
    header("location:logout.php");
}
?>