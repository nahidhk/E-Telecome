</div>


<div class="serverInfo">
    <div class="flex center medel">
        <h3>Server Info</h3>
    </div>
    <hr>

    <div class="icon-btn">
        <i class="fa-solid fa-server"></i>
        <b>Server:</b> <?php echo $_SERVER['SERVER_SOFTWARE']; ?>
    </div>

    <div class="icon-btn">
        <i class="fa-solid fa-chart-diagram"></i>
        <b>PORT:</b>
        <?php echo $_SERVER['SERVER_PORT']; ?>
    </div>

    <div class="icon-btn">
        <i class="fa-brands fa-php"></i>
        <b>PHP V :</b>
        <?php echo phpversion(); ?>
    </div>


    <div class="icon-btn">
        <i class="fa-solid fa-network-wired"></i>
        <b>Server IP :</b>
        <?php
          $serverIp = ! empty($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : $_SERVER['REMOTE_ADDR'];
          echo $serverIp;
      ?>
    </div>

    <div class="icon-btn">
        <i class="fa-solid fa-server"></i>
        <b>MySQL Version :</b>
        <?php
            try {
                echo $conn->getAttribute(PDO::ATTR_SERVER_VERSION);
            } catch (PDOException $e) {
                echo "N/A";
            }
        ?>
    </div>

    <div class="icon-btn">
        <i class="fa-brands fa-linux"></i>
        <b>OS :</b>
        <?php echo php_uname('s') . ' ' . php_uname('r'); ?>
    </div>

    <div class="icon-btn">
        <i class="fa-solid fa-folder-open"></i>
        <b>Document Root :</b>
        <?php echo $_SERVER['DOCUMENT_ROOT']; ?>
    </div>


    <div class="icon-btn">
        <i class="fa-solid fa-lock"></i>
        <b>HTTPS :</b>
        <?php echo(! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'Enabled ✅' : 'Disabled ❌'; ?>
    </div>
    <div class="icon-btn">
        <i class="fa-solid fa-house-laptop"></i>
        <b>Hostname :</b>
        <?php echo gethostname(); ?>
    </div>

</div>
</div>


<!-- popup in gallery   -->
<?php include 'components/gallery.php'?>


</body>

</html>