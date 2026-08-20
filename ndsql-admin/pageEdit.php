<?php
include "./hader.php";
$getlink = $_GET['link_address'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $retrunData = ndsql_update_page($_POST,$getlink);
   
}

$pageixData = ndsql_get_pages($getlink);
$linkAddresses = array_column($pageixData, 'link_address');
 
?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
<div class="box">
    <?php echo $data ?>
    <div class="flex medel">
        <div onclick="callBack()" class="backBtn">
            <i class="fa-solid fa-arrow-left"></i>
        </div>
        <div>
            &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <h2>
            Edit page info
        </h2>
    </div>
    <br><br>
    <form  method="POST">
        <table>
            <tr>
                <td>
                    <label for="link_address">Link Address:</label>
                </td>
                <td>
                    <select onchange="macthLinkAddress()" name="link_address" id="link_address" class="input">
                        <option value="<?php echo $pageixData['link_address'] ?>">
                            <?php echo $pageixData['link_address'] ?></option>
                    </select>
                    <p id="error"></p>
                    <button
                        onclick="window.location.href='pageEdit.php?i=pages.php&link_address=' + document.getElementById('link_address').value"
                        id="shox" type="button" class="btn none"> </button>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="title">Title:</label>
                </td>
                <td>
                    <input type="text" class="input" id="title" name="title" value="<?php echo $pageixData['title'] ?>"
                        placeholder="Enter Title">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="content">Content:</label>
                </td>
                <td>
                    <textarea class="editor" name="content" id="content"><?php echo $pageixData['content']?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="meta_title">Meta Title:</label>
                </td>
                <td>
                    <input type="text" value="<?php echo $pageixData['meta_title'] ?>" class="input" id="meta_title"
                        name="meta_title" placeholder="Enter Meta Title">
                    <input type="text" name="editor" value="<?php echo $_SESSION['admin_name'] ?>" hidden>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="meta_description">Meta Description:</label>
                </td>
                <td>
                    <input value="<?php echo $pageixData['meta_description'] ?>" type="text" class="input"
                        id="meta_description" name="meta_description" placeholder="Enter Meta Description">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="keywords">Keywords:</label>
                </td>
                <td>
                    <input value="<?php echo $pageixData['keywords'] ?>" type="text" class="input" id="keywords"
                        name="keywords" placeholder="Enter Keywords">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="status">Status:</label>
                </td>
                <td>
                    <select onchange="passin()" name="status" id="status" class="input">
                        <option value="published" <?= $pageixData['status'] == 'published' ? 'selected' : '' ?>>
                            Published</option>
                        <option value="draft" <?= $pageixData['status'] == 'draft' ? 'selected' : '' ?>>Draft</option>
                        <option value="private" <?= $pageixData['status'] == 'private' ? 'selected' : '' ?>>Private
                        </option>
                        <option value="trash" <?= $pageixData['status'] == 'trash' ? 'selected' : '' ?>>Trash</option>
                    </select>
                </td>
            </tr>
            <tr id="password" class="none">
                <td>
                    <label for="password">Password</label>
                </td>
                <td>
                    <input type="text" class="input" name="password" placeholder="Enter Password">
                </td>
            </tr>
        </table>
        <div class="flex center medel">
            <button  type="submit" class="btn btn-primary">Save Change</button>
        </div>
    </form>
</div>




<script>
$(function() {
    $('.editor').summernote({
        height: 400,
        placeholder: 'Enter Content and HTML code .....',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'table']],
            ['view', ['codeview']]
        ]
    });
});




function passin() {
    const inputData = document.getElementById('status').value;
    if (inputData === 'private') {
        document.getElementById('password').style.display = "block";
    } else {
        document.getElementById('password').style.display = "none";
    }
}
</script>

<?php include "./footer.php" ?>