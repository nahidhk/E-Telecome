 </div>
      <div class="serverInfo">
            <div class="flex center medel">
                <h3>Server Info</h3>
            </div>
            <hr>
            <div class="icon-btn">
                <i class="fa-solid fa-server"></i>
               <b> Server:</b> <?php echo  $_SERVER['SERVER_SOFTWARE'] ?>
            </div>
            <div class="icon-btn">
                <i class="fa-solid fa-bore-hole"></i>
                <b>PORT:</b>
                <?php echo $_SERVER['SERVER_PORT'] ?>
            </div>
            <div class="icon-btn">
                <i class="fa-brands fa-php"></i>
                <b>PHP V :</b>
                <?php echo phpversion() ?>
            </div>
        </div>
    </div>
</body>
</html>