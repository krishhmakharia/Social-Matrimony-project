<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SevenVerse~Edit-Profile</title>
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
                <li class="tw-p-3  tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="profile.php" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/profile.svg" alt=""><p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1"> Profile</p></a></li>
                <li class="tw-p-3  tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="search.php" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/search.svg" alt=""> <p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1">Search</p></a></li>
                <li class="tw-p-3 tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="notification.php" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/notification.svg" alt=""><p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1">Notifications</p></a></li>
                <li class="tw-p-3  tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="connection.php" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/connection.svg" alt=""> <p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1">Connections </p> </a></li>
                <li class="tw-p-3 tw-cursor-pointer hover:tw-bg-slate-900 tw-flex"><a href="setting.php" class="tw-no-underline tw-text-inherit tw-flex tw-items-center"><img class="tw-w-[24px]" src="imgs/settings.svg" alt=""> <p class="tw-hidden md:tw-block tw-font-semibold tw-text-lg tw-m-1">Settings </p></a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="tw-flex-1 tw-ml-0 md:tw-ml-64 tw-p-6 tw-mt-8 md:tw-mt-0  tw-text-white">
            <?php
                include("db.php");
                if(isset($_COOKIE["login"])){
                    $email=$_COOKIE["login"];
                    $query=mysqli_query($conn,"SELECT * FROM details WHERE email='$email' ");
                    if($row=mysqli_fetch_array($query)){
                        $gender2="";
                        if($row['gender']=="male"){
                            $gender2="female";
                        }
                        else{
                            $gender2="male";
                        }

                    ?>
                    <h3 class="ubuntu-medium tw-text-left  ">Edit profile</h3>
                <div class=" tw-flex tw-flex-col md:tw-flex-row tw-p-5 tw-justify-evenly">
                    <div class="tw-flex tw-flex-col tw-w-60  tw-h-72 tw-bg-gray-500 tw-bg-opacity-35 tw-justify-center  tw-p-2 tw-rounded-lg ">
                        <img src="profilePic/<?=$row['code']?>.jpg" class="tw-rounded-full tw-w-40 tw-h-40 tw-border-4 tw-border-white tw-border-opacity-50 tw-border-dashed tw-mx-3 tw-p-1  " alt="Profile pic"> 
                        <div class="tw-p-2">
                            <form method="post" action="updateDp.php" class="tw-flex-row tw-gap-2 tw-justify-items-center  " enctype="multipart/form-data">
                                <input type="file" name="pic" class="form-control tw-w-52  tw-text-sm" required>
                                <input type="submit" value="Change image"  class=" tw-mt-3 tw-text-sm tw-p-2  ubuntu-bold-italic  tw-bg-transparent tw-border tw-border-white tw-text-white tw-rounded-lg hover:tw-bg-red-600  hover:tw-text-white  transition tw-shadow-sm tw-shadow-white">
                            </form>
                         </div>
                    </div>
                    <div>
                    <form class="tw-p-4" action="updateProfile.php" method="post">
                        <label for="Fname" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">First Name</label>
                        <input type="text" class="form-control tw-bg-white  tw-text-black tw-font-normal " name="fname" value="<?=$row['fname']?>"  required><br>
                        <label for="Lname" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">Last Name</label>
                        <input type="text" class="form-control tw-bg-white  tw-text-black tw-font-normal " name="lname" value="<?=$row['lname']?>"  required><br>
                        <label for="Gender" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">Gender</label>
                        <select class="form-control tw-bg-white  tw-text-black tw-font-normal " name="gender" required>
                            <option  value="<?=$row['gender']?>"> <?=$row['gender']?> </option>
                            <option  value="<?=$gender2?>"> <?=$gender2?> </option>
                            <option  value="notSay"> Not prefer to say </option>
                        </select> <br>
                        <label for="Bio" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0">Bio</label>
                        <textarea class="form-control tw-text-wrap  tw-bg-white  tw-text-black  tw-font-normal tw-h-36" placeholder="20-100" name="bio" required><?=$row['bio']?></textarea>
                        <label for="DOB" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">DOB</label>
                        <input type="date" class="form-control tw-bg-white  tw-text-black tw-font-normal  focus:tw-border-pink-700  focus:tw-ring focus:tw-ring-pink-300  focus:tw-ring-opacity-50" name="birth" value="<?=$row['birth']?>"> <br>
                        <label for="Caste" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">Caste</label>
                        <input type="text" class="form-control tw-bg-white  tw-text-black tw-font-normal " name="caste" value="<?=$row['caste']?>" required><br>
                        <label for="Religion" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">Religion</label>
                        <select class="form-select tw-bg-white  tw-text-black tw-font-normal " name="religion" required>
                            <option  value="hindu"> hindu </option>
                            <option  value="Muslim"> muslim </option>
                            <option  value="Christian"> christian </option>
                            <option  value="jain"> jain </option>
                            <option  value="sikh"> sikh </option>
                        </select> <br>
                        <label for="Occupation" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">Occupation</label>
                        <select class="form-select tw-bg-white  tw-text-black tw-font-normal " name="occupation" required>
                            <option  value="Engineer"> Engineer </option>
                            <option  value="Musician"> Musician </option>
                            <option  value="FreeLencer"> Free Lencer </option>
                            <option  value="Accountant"> Accountant </option>
                            <option  value="Self-business"> Self-Business </option>
                        </select> <br>
                        <div class="tw-flex tw-flex-wrap tw-gap-1 tw-justify-items-stretch ">
                            <label for="City" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 ">City</label>
                            <input type="text" class="form-control tw-bg-white  tw-text-black tw-font-normal " name="city" value="<?=$row['city']?>"  required><br><br>
                            <div class="tw-flex">
                                <label for="State" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 tw-w-14 tw-mt-4 ">State</label>
                                <input type="text" class="form-control tw-bg-white  tw-text-black tw-font-normal tw-w-28 tw-mt-4 " name="state" value="<?=$row['state']?>"  required>
                            </div>
                            <div class="tw-flex">
                                <label for="Country" class="form-control tw-bg-transparent tw-border-0 tw-text-white ubuntu-regular tw-font-medium tw-left-0 tw-w-20  tw-mt-4 ">Country</label>
                                <input type="text-field" class="form-control tw-bg-white  tw-text-black tw-font-normal tw-w-28 tw-mt-4 " name="country" value="<?=$row['country']?>"  required>
                            </div>                
                        </div>
                        <div class="tw-flex tw-justify-end  tw-justify-items-start     ">
                            <input type="submit" value="Save Changes" class=" tw-text-lg tw-w-auto  ubuntu-bold-italic tw-p-2 tw-bg-transparent tw-border tw-border-indigo-400 tw-text-indigo-400  tw-rounded-lg hover:tw-bg-indigo-400 hover:tw-text-white hover:tw-text-xl   tw-shadow-white transition" >
                        </div>
                    </form>
                    </div>
                </div>
                    <?php
                    }
                }
                else{
                    header("location:logout.php");
                }
                ?>
                <div class="tw-border-t-2  tw-border-gray-400 tw-border-opacity-35   ">
                
                </div>
                <?php
            ?>
        </div>

        <!-- top bar -->
        <div id="topBar" class="tw-fixed md:tw-hidden tw-top-0  tw-w-full tw-h-14 tw-border-b-[1px]  tw-border-gray-700 tw-bg-black tw-text-white ">
            <!-- <button id="toggleBtn" class="tw-absolute tw-top-0 tw-right-0 tw-text-white tw-px-2 tw-py-2 tw-rounded tw-mb-4">☰</button> -->
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>