<?php
    include "errCK.php";
    $valueData   = "value";
    $keywordData = "keyword";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        change_ndsql_info($_POST);
    }
?>

    <hr>
    <form action="" method="POST" id="navSettingForm">
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
                        <img src="<?php echo ndsql_info(3)[$valueData] ?>" id="previweImg<?php echo ndsql_info(3)[$keywordData] ?>" alt="NdSQL web System"
                            class="settingImg"><br>
                        <div class="flex center medel">
                            <input
                                oninput="imgChenger({inputTagID: '<?php echo ndsql_info(3)[$keywordData] ?>' , imgTagID: 'previweImg<?php echo ndsql_info(3)[$keywordData] ?>'})"
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
                    $navLinks = json_decode(ndsql_info(4)[$valueData], true) ?? [];
                ?>

                <tr>
                    <td>
                        <label>Site Nav Link :</label>
                    </td>

                    <td>
                       <input name="<?php echo ndsql_info(4)[$keywordData] ?>" id="navLinksField" type="hidden" value='<?php echo htmlspecialchars(ndsql_info(4)[$valueData], ENT_QUOTES) ?>'>

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

                            <?php foreach ($navLinks as $i => $item): ?>

                            <div class="flex center medel navRow">

                                <input type="text" class="input navName"
                                    value="<?php echo htmlspecialchars($item['name']) ?>">

                                <input type="text" class="input navLink"
                                    value="<?php echo htmlspecialchars($item['link']) ?>">

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
        <button class="btn" type="submit">Save Change</button>
    </form>


<script>
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
                class="input navName"
                value="${name}">

            <input
                type="text"
                class="input navLink"
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

function syncNavLinksField() {

    const rows = document.querySelectorAll('#navContainer .navRow');

    const navData = [];

    rows.forEach(row => {

        const name = row.querySelector('.navName').value.trim();
        const link = row.querySelector('.navLink').value.trim();

        if (name && link) {
            navData.push({ name: name, link: link });
        }

    });

    document.getElementById('navLinksField').value = JSON.stringify(navData);
}

document
    .getElementById('navSettingForm')
    .addEventListener('submit', function (e) {
        syncNavLinksField();
    });
</script>

