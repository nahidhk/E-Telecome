    <?php
    include("errCK.php");
        $valueData   = "value";
        $keywordData = "keyword";
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
    change_ndsql_info($_POST);
}
?>
    <details>
        <summary class="flex beet">
            <div>
                <i class="fa-solid fa-display"></i> Frontend :: Website Nav Setting
            </div>
            <div>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </summary>
        <hr>
        <form action="" method="POST">
            <table class="inputTab">
                <tbody>
                    <tr>
                        <td>
                            <label for="<?php echo ndsql_info(2)[$keywordData] ?>"> Site Name :</label>
                        </td>
                        <td>
                            <input id="<?php echo ndsql_info(2)[$keywordData] ?>" type="text"
                                name="<?php echo ndsql_info(2)[$keywordData] ?>"
                                value="<?php echo ndsql_info(2)[$valueData] ?>" class="input">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="<?php echo ndsql_info(1)[$keywordData] ?>">Site Title :</label>
                        </td>

                        <td>
                            <input id="<?php echo ndsql_info(1)[$keywordData] ?>"
                                name="<?php echo ndsql_info(1)[$keywordData] ?>" type="text"
                                value="<?php echo ndsql_info(1)[$valueData] ?>" class="input">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="<?php echo ndsql_info(3)[$keywordData] ?>">Nav Bar Logo:</label>
                        </td>

                        <td>
                            <img src="<?php echo ndsql_info(3)[$valueData] ?>" id="previweImg" alt="NdSQL web System"
                                class="settingImg"><br>
                            <div class="flex center medel">
                                <input
                                    oninput="imgChenger({inputTagID: '<?php echo ndsql_info(3)[$keywordData] ?>' , imgTagID: 'previweImg'})"
                                    id="<?php echo ndsql_info(3)[$keywordData] ?>"
                                    name="<?php echo ndsql_info(3)[$keywordData] ?>" type="text"
                                    value="<?php echo ndsql_info(3)[$valueData] ?>" class="input">
                                <div class="gBtn flex center medel"
                                    onclick="openGallery('<?php echo ndsql_info(3)[$keywordData] ?>')">
                                    <i class="fa-regular fa-images"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
$navLinks = json_decode(ndsql_info(4)['value'], true) ?? [];
?>

                    <tr>
                        <td>
                            <label>Site Nav Link :</label>
                        </td>

                        <td>

                            <!-- New Add Row -->
                            <div class="flex center medel">
                                <input type="text" id="newNavName" class="input" placeholder="Setup Name">

                                <input type="text" id="newNavLink" class="input" placeholder="/page-url">

                                <div class="gBtn flex center medel" onclick="addNavRow()">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>

                            <!-- Existing Rows -->
                            <div id="navContainer">

                                <?php foreach($navLinks as $i=>$item): ?>

                                <div class="flex center medel navRow">

                                    <input type="text" class="input" name="site_nav_link[<?= $i ?>][name]"
                                        value="<?= htmlspecialchars($item['name']) ?>">

                                    <input type="text" class="input" name="site_nav_link[<?= $i ?>][link]"
                                        value="<?= htmlspecialchars($item['link']) ?>">

                                    <div class="gBtn flex center medel" onclick="deleteNavRow(this)">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </div>

                                </div>

                                <?php endforeach; ?>

                            </div>

                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="btn">Save Change</button>
        </form>
    </details>

    <script>
let navIndex =
    document.querySelectorAll('.navRow').length;

function addNavRow() {

    const name =
        document.getElementById(
            'newNavName'
        ).value.trim();

    const link =
        document.getElementById(
            'newNavLink'
        ).value.trim();

    if (!name || !link) {
        return;
    }

    const html = `
        <div class="flex center medel navRow">

            <input
                type="text"
                class="input"
                name="site_nav_link[${navIndex}][name]"
                value="${name}">

            <input
                type="text"
                class="input"
                name="site_nav_link[${navIndex}][link]"
                value="${link}">

            <div
                class="gBtn flex center medel"
                onclick="deleteNavRow(this)">

                <i class="fa-solid fa-trash-can"></i>

            </div>

        </div>
    `;

    document
        .getElementById('navContainer')
        .insertAdjacentHTML(
            'beforeend',
            html
        );

    navIndex++;

    document.getElementById(
        'newNavName'
    ).value = '';

    document.getElementById(
        'newNavLink'
    ).value = '';
}

function deleteNavRow(btn) {
    btn.parentElement.remove();
}
    </script>