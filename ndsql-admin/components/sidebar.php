<?php
$phpFile = $_GET['i'] ?? '';
?>
<div class="sideBar">
    <div onclick="callthisLink('')" class="icon-btn <?= ($phpFile === '') ? 'active' : '' ?>">
        <i class="fa-solid fa-chart-column"></i>
        Dashbord
    </div>
    <div onclick="callthisLink('setting.php')"  class="icon-btn <?= ($phpFile === 'setting.php') ? 'active' : '' ?>">
        <i class="fa-solid fa-gear"></i>
        Site Setting
    </div>
</div>

<script>
function callthisLink(linkData) {
    window.location.href ="/ndsql-admin/" + linkData + "?i=" + linkData;
}
</script>
