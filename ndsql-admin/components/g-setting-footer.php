<?php
    include "errCK.php";

    $valueData   = "value";
    $keywordData = "keyword";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    change_ndsql_info($_POST);
    }

?>

<hr>
<form action="" method="post">
    <table>
        <tr>
            <td>
                Footer Info
            </td>
            <td>
                <input name="<?php echo ndsql_info(9)[$keywordData] ?>" class="input"
                    value="<?php echo ndsql_info(9)[$valueData] ?>" type="text">
            </td>
        </tr>
        <tr>
            <td>
                Site Phone Number
            </td>
            <td>
                <input name="<?php echo ndsql_info(10)[$keywordData] ?>" class="input"
                    value="<?php echo ndsql_info(10)[$valueData] ?>" type="text">
            </td>
        </tr>
        <tr>
            <td>
                Site Email Address
            </td>
            <td>
                <input name="<?php echo ndsql_info(11)[$keywordData] ?>" class="input"
                    value="<?php echo ndsql_info(11)[$valueData] ?>" type="text">
            </td>
        </tr>
        <tr>
            <td>
                Site Office Address
            </td>
            <td>
                <input name="<?php echo ndsql_info(12)[$keywordData] ?>" class="input"
                    value="<?php echo ndsql_info(12)[$valueData] ?>" type="text">
            </td>
        </tr>
    </table>
    <button type="submit" class="btn">Save Change</button>
</form>