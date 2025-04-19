<?php
include("db.php");
if (isset($_COOKIE["login"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Settings</title>
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
            <div class="tw-flex-1 tw-ml-0 md:tw-ml-64  tw-mt-8 tw-mb-8 md:tw-mt-0 tw-text-white">
                <h1 class="tw-font-bold ubuntu-bold tw-mt-3 tw-p-6 ">Settings</h1>

                <div class=" tw-p-0">
                    <table class="tw-table-auto tw-w-full tw-border-separate tw-border-spacing-y-4 tw-h-80  " >
                        <tbody class="tw-text-left  tw-w-full tw-bg-slate-300 tw-bg-opacity-10">
                            <tr class="tw-h-20  md:tw-h-24  tw-text-white  hover:tw-bg-violet-300 hover:tw-bg-opacity-20">
                                <td class="tw-font-medium tw-text-2xl ubuntu-bold tw-pl-4 hover:tw-cursor-pointer"><a href="edit.php" class="tw-no-underline tw-text-inherit tw-flex tw-gap-4"> <img src="imgs/edit_profile.svg" class="img-fluid tw-h-10  tw-w-10" alt=""> Edit Profile</a></td>
                            </tr>
                            <tr class="tw-h-20  md:tw-h-24  tw-text-white  hover:tw-bg-violet-300 hover:tw-bg-opacity-20">
                                <td class="tw-font-medium tw-text-2xl ubuntu-bold tw-pl-4 hover:tw-cursor-pointer"><a href="change_pass.php" class="tw-no-underline tw-text-inherit tw-flex tw-gap-4"> <img src="imgs/password.svg" class="img-fluid tw-h-10  tw-w-10" alt=""> Change Password</a></td>
                            </tr>
                            <tr class="tw-h-20  md:tw-h-24  tw-text-white  hover:tw-bg-violet-300 hover:tw-bg-opacity-20">
                                <td class="tw-font-medium tw-text-2xl ubuntu-bold tw-pl-4 hover:tw-cursor-pointer"><a href="connection.php" class="tw-no-underline tw-text-inherit tw-flex tw-gap-4"> <img src="imgs/manage_connection.svg" class="img-fluid tw-h-10  tw-w-10" alt=""> Manage Connections</a></td>
                            </tr>
                            <tr class="tw-h-20  md:tw-h-24  tw-text-white  hover:tw-bg-violet-300 hover:tw-bg-opacity-20">
                                <td class="tw-font-medium tw-text-2xl ubuntu-bold tw-pl-4 hover:tw-cursor-pointer"><a href="block.php" class="tw-no-underline tw-text-inherit tw-flex tw-gap-4"> <img src="imgs/block.svg" class="img-fluid tw-h-10  tw-w-10" alt=""> Blocked Users</a></td>
                            </tr>
                            <tr class="tw-h-20  md:tw-h-24  tw-text-white  hover:tw-bg-violet-300 hover:tw-bg-opacity-20">
                                <td class="tw-font-medium tw-text-2xl ubuntu-bold tw-pl-4 hover:tw-cursor-pointer"><a href="logout.php" class="tw-no-underline tw-text-inherit tw-flex tw-gap-4"> <img src="imgs/logout.svg" class="img-fluid tw-h-10  tw-w-10" alt=""> Logout</a></td>
                            </tr>
                            
                        </tbody>
                    </table>
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
    exit();
}
?>