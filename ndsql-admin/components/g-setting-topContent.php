<?php
    include "errCK.php";
    $valueData   = "value";
    $keywordData = "keyword";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    change_ndsql_info($_POST);
    }
?>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

<hr>




<form action="" method="post" <table class="inputTab">
    <tbody>
        <tr>
            <td>
                <label for="<?php echo ndsql_info(6)[$keywordData] ?>"> Site Top Content: </label>
            </td>
            <td>
                <textarea class="editor" name="<?php echo ndsql_info(6)[$keywordData] ?>" id="<?php echo ndsql_info(6)[$keywordData] ?>">
                    <?php echo htmlspecialchars(ndsql_info(6)[$valueData]); ?>
                 </textarea>
            </td>
        </tr>

        <tr>
            <td>
                <label for="<?php echo ndsql_info(5)[$keywordData] ?>"> Site Background Photo: </label>
            </td>
            <td>
                <img src="<?php echo ndsql_info(5)[$valueData] ?>"
                    id="previweImg<?php echo ndsql_info(5)[$keywordData] ?>" alt="NdSQL web System" class="settingImg">
                <div class="flex center medel">
                    <input
                        oninput="imgChenger({inputTagID: '<?php echo ndsql_info(5)[$keywordData] ?>' , imgTagID: 'previweImg<?php echo ndsql_info(5)[$keywordData] ?>'})"
                        id="<?php echo ndsql_info(5)[$keywordData] ?>" name="<?php echo ndsql_info(5)[$keywordData] ?>"
                        type="text" value="<?php echo ndsql_info(5)[$valueData] ?>" class="input">
                    <div class="gBtn flex center medel"
                        onclick="openGallery('<?php echo ndsql_info(5)[$keywordData] ?>')">
                        <i class="fa-regular fa-images"></i>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
    </table>
    <button class="btn" type="submit">Save Change</button>


</form>





<script>
$(function() {
    $('.editor').summernote({
        height: 400,
        placeholder: 'Write here...',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video', 'table']],
            ['view', ['codeview']]
        ]
    });
});
</script>