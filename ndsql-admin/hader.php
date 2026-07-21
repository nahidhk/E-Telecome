<?php
    session_start();
    include "config.php";

    if (! isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] !== true) {
    header("Location: login.php");
    exit();
    }

    // Linux system e service status check

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $admin_name ?></title>
    <link rel="stylesheet" href="/other/style/style.main.css">
    <!-- CDN FontAsome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"
        integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="/other/javascript/system.js"></script>
        <script src="js/admin-script.js"></script>
</head>

<body>
    <nav class="navBar flex beet medel">
        <div>
            <h2 class="flex medel" style="padding:10px">
                <span onclick="sideBarTogelMenu()" id="navMenuBtn" class="nav-menu-btn">
                    <i class="fa-solid fa-bars"></i> &nbsp;&nbsp;
                </span>
                <span class="mbBlock">
                    NdSQL
                </span>
                <span class="pcBlock">
                    NdSQL Admin Panel
                </span>
            </h2>
        </div>
        <div style="padding:10px">
            <div class="account-icon" id="accountIconBtn">
                <i class="fa-regular fa-user"></i>
            </div>
        </div>

        <div class="outside" id="outsideMenu">
            <div class="flex center medel">
                <h3><?php echo $_SESSION['admin_name'] ?></h3>
            </div>
            <hr>
            <div class="icon-btn">
                <i class="fa-solid fa-gear"></i>
                Account Setting
            </div>
            <div class="icon-btn">
                <i class="fa-brands fa-react fa-spin"></i>
                Developer
            </div>
            <div class="icon-btn">
                <i class="fa-regular fa-circle-question"></i>
                Need Help?
            </div>
            <div onclick="logout()" class="icon-btn">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Sign Out
            </div>
        </div>
    </nav>
    <div>
        <?php include "components/sidebar.php"?>
        <div class="flex center medel w100">
            <script>
            const accountIconBtn = document.getElementById('accountIconBtn');
            const outsideMenu = document.getElementById('outsideMenu');
            const navMenuBtn = document.getElementById('navMenuBtn');
            const sideBar = document.getElementById('sideBar');

            accountIconBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                outsideMenu.classList.toggle('show');
            });
            navMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                sideBar.classList.toggle('show');
            });


            document.addEventListener('click', function(e) {
                if (!outsideMenu.contains(e.target) && !accountIconBtn.contains(e.target)) {
                    outsideMenu.classList.remove('show');
                    sideBar.classList.remove('show');
                }
            });
            function logout() {
                window.location.href = "logout.php"
            }
            </script>