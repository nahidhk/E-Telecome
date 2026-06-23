<?php
    include "hader.php";
    $valueData = "value";
    $keywordData = "keyword";
?>

<div class="box">
    <h2>
        General Settings
    </h2>
    <br>
    <form action="">
        <table class="inputTab">
            <tbody>
                <tr>
                    <td>
                        <label for="<?= ndsql_info(2)[$keywordData]?>"> Site Name :</label>
                    </td>
                    <td>
                        <input id="<?= ndsql_info(2)[$keywordData]?>" type="text" name="<?= ndsql_info(2)[$keywordData]?>" value="<?= ndsql_info(2)[$valueData] ?>" class="input">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="<?= ndsql_info(1)[$keywordData] ?>">Site Title :</label>
                    </td>

                    <td>
                        <input id="<?= ndsql_info(1)[$keywordData] ?>" name="<?= ndsql_info(1)[$keywordData] ?>" type="text" value="<?=ndsql_info(1)[$valueData] ?>" class="input">
                    </td>
                </tr>
                      <tr>
                    <td>
                        <label for="<?= ndsql_info(3)[$keywordData] ?>">Nav Bar Logo:</label>
                    </td>

                    <td>
                        <img src="<?= ndsql_info(3)[$valueData]?>" id="previweImg" alt="NdSQL web System" class="settingImg"><br>
                        <div class="flex center medel">
                            <input onchange="imgChenger({inputTagID: '<?= ndsql_info(3)[$keywordData] ?>' , imgTagID: 'previweImg'})" id="<?= ndsql_info(3)[$keywordData] ?>" name="<?= ndsql_info(3)[$keywordData] ?>" type="text" value="<?=ndsql_info(3)[$valueData] ?>" class="input">
                            <div class="gBtn flex center medel" onclick="openGallery()">
                                <i class="fa-regular fa-images"></i>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>


<!-- script -->
 <script src="/other/javascript/media.js"></script>
 <script src="/other/javascript/admin-setting.js"></script>
<?php echo include 'footer.php' ?>