<?php
    // maps function in main menu
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css Link -->
    <link rel="stylesheet" href="other/style/style.main.css">
    <title><?php echo ndsql_info(1)["value"] ?></title>
    <!-- CDN FontAsome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"
        integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <nav class="navBar">
        <div class="flex around">
            <div class="flex center medel">
                <div onclick="linkCall('/')">
                    <!-- Nav Logo -->
                    <img class="nav_logo" src="<?php echo ndsql_info(3)["value"] ?>" alt="<?= ndsql_info(2)['value'] ?>">
                </div>
            </div>

            <!-- Site Link  -->
            <div class="flex nav-link mbNone">
                <div class="flex medel around mbFlex">
                    <div onclick="linkCall('/')">
                        <!-- Nav Logo -->
                        <img class="nav_logo" src="<?php echo ndsql_info(3)["value"] ?>" alt="NdSQL site logo">
                    </div>
                    <div class="flex">
                        <div class="dateBox">
                            <?php echo date("h:i A d F l ") ?>
                        </div>
                        <div class="nav-menu-icon" onclick="openMenu('close')">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </div>
                </div>
                <hr>
                <?php
                    $json = ndsql_info(4)["value"];
                    $data = json_decode($json, true);

                    foreach ($data as $item) {
                        echo '<a href="' . $item["link"] . '">' . $item["name"] . '</a><br>';
                    }
                ?>
            </div>
            <div class="flex center medel">
                <!-- Data and time in BD -->
                <div class="dateBox">
                    <?php echo date("h:i A d F l ") ?>
                </div>
                <div class="nav-menu-icon" onclick="openMenu('open')">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>

        </div>
    </nav>
<script src="other/javascript/haderScript.js"></script>
</body>

</html>