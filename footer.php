<div>
    <br><br><br><br>
</div>
<div class="footer flex around medel column">
    <div class="flex center medel column">
        <p style="font-size:38px;">Subscribe To Our Website</p>
        <p style="font-size:25px">Stay in touch with the latest Products and releases</p>
        <form action="/subcribe.php" method="post">
            <div class="flex medel subx">
                <input class="inputSubx" type="email" name="email" placeholder="Enter Your Email">
                <button class="btnSubx">Subscribe</button>
            </div>
        </form>
    </div>
    <br><br>
    <div class="grapic"></div>
    <div class="flex around w100">
        <div class="footerBox">
            <h1>
                <?php echo ndsql_info(2)['value'] ?>
            </h1>
            <p>
                <?php echo ndsql_info(9)['value'] ?>
            </p>
        </div>
        <div class="footerBox">
            <p style="font-size:22px">Quick Links</p>
            <hr>
            <?php
                  $json = ndsql_info(4)["value"];
                  $data = json_decode($json, true);

                  foreach ($data as $item) {
                      echo '<a class="footerLink" href="/page/?p=' . $item["link"] . '">' . $item["name"] . '</a><br>';
                  }
              ?>
        </div>
        <div class="footerBox">
            <p style="font-size:22px">Contact Us</p>
            <hr>
            <p><i class="fa-solid fa-phone"></i> <?php echo ndsql_info(10)['value'] ?></p>
            <p><i class="fa-solid fa-envelope"></i> <?php echo ndsql_info(11)['value'] ?></p>
            <p><i class="fa-solid fa-location-dot"></i> <?php echo ndsql_info(12)['value'] ?></p>

        </div>
    </div>
    <div class="grapic"></div>
    <br><br>
    <div class="flex center medel">
        <p style="font-size:18px">Copyright © <?php echo date('Y'); ?> <?php echo ndsql_info(2)['value'] ?>. All rights
            reserved.</p>
    </div>
</div>
<script src="/other/javascript/haderScript.js"></script>
</body>

</html>