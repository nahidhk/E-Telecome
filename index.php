<?php
require_once("./ndsql-admin/config.php");

page_title(ndsql_info(1)["value"]); // আগে সেট কর

include_once("./hader.php");

include_once("./components/home-content.php");
include_once("./components/marquee.php");
include_once("./components/bCard.php");
include_once("./footer.php");
?>