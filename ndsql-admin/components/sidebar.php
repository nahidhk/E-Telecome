<?php
$phpFile = $_GET['i'] ?? '';
?>
<div class="sideBar" id="sideBar">
    <br><br><br><br><br>
    <div onclick="callthisLink('')" class="icon-btn <?= ($phpFile === '') ? 'active' : '' ?>">
        <i class="fa-solid fa-chart-column"></i>
        Dashbord
    </div>
    <div onclick="callthisLink('upload.php')"  class="icon-btn <?= ($phpFile === 'upload.php') ? 'active' : '' ?>">
        <i class="fa-regular fa-images"></i>
        Media
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
