<?php
    $valueData = "value";

?>
<br><br>
<div class="mar-body">
    <div class="marquee">
        <div class="marquee__group">
                  <?php
                $images = json_decode(ndsql_info(8)[$valueData], true);

                foreach ($images as $img) {
                    echo '<img src="' . $img . '" alt="" />';
                }
            ?>
        </div>

        <div aria-hidden="true" class="marquee__group">
                        <?php
                $images = json_decode(ndsql_info(8)[$valueData], true);

                foreach ($images as $img) {
                    echo '<img src="' . $img . '" alt="" />';
                }
            ?>
        </div>
    </div>

    <div class="marquee marquee--borders" style="--duration: 100s">
        <div class="marquee__group">
            <p><?php echo ndsql_info(7)[$valueData] ?></p>
            <!-- <p aria-hidden="true">The Dogs of Unsplash1</p>
            <p aria-hidden="true">The Dogs of Unsplash1</p> -->
            <p aria-hidden="true"><?php echo ndsql_info(7)[$valueData] ?></p>
            <p aria-hidden="true"><?php echo ndsql_info(7)[$valueData] ?></p>
        </div>

        <div aria-hidden="true" class="marquee__group">
            <!-- <p>The Dogs of Unsplash</p>
            <p>The Dogs of Unsplash</p>
            <p>The Dogs of Unsplash</p> -->
            <p><?php echo ndsql_info(7)[$valueData] ?></p>
        </div>
    </div>

    <div class="marquee marquee--reverse">
        <div class="marquee__group">
            <?php
                $images = json_decode(ndsql_info(8)[$valueData], true);

                foreach ($images as $img) {
                    echo '<img src="' . $img . '" alt="" />';
                }
            ?>
        </div>

        <div aria-hidden="true" class="marquee__group">
                       <?php
                $images = json_decode(ndsql_info(8)[$valueData], true);

                foreach ($images as $img) {
                    echo '<img src="' . $img . '" alt="" />';
                }
            ?>
        </div>
    </div>
</div>
<br><br>