<?php
include "./hader.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pageid = ndsql_insert_page($_POST);
    if ($pageid) {
        echo "<script>alert('Page added successfully.'); window.location.href='pages.php?i=pages.php';</script>";
    } else {
        echo "<script>alert('Failed to add page. Please try again.'); window.location.href='pageNew.php?i=pageNew.php';</script>";
    }
}
$pageixData = ndsql_get_pages();
$linkAddresses = array_column($pageixData, 'link_address');
?>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>


<div class="box">
    <div class="flex medel">
        <div onclick="callBack()" class="backBtn">
            <i class="fa-solid fa-arrow-left"></i>
        </div>
        <div>
            &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <h2>
            Add New Pages info
        </h2>
    </div>
    <br><br>





    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="link_address">Link Address:</label>
                </td>
                <td>
                    <select onchange="macthLinkAddress()" name="link_address" id="link_address" class="input">
                        <option disabled selected>Required Select link address</option>
                        <?php
                        $json = ndsql_info(4)["value"];
                        $data = json_decode($json, true);

                        foreach ($data as $item) {
                            echo '<option value="' . $item["link"] . '">' . $item["name"] . '</option>';
                        }
                        ?>
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
                    <input type="text" class="input" id="title" name="title" placeholder="Enter Title">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="content">Content:</label>
                </td>
                <td>
                    <textarea class="editor" name="content" id="content"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="meta_title">Meta Title:</label>
                </td>
                <td>
                    <input type="text" class="input" id="meta_title" name="meta_title" placeholder="Enter Meta Title">
                    <input type="text" name="editor" value="<?php echo $_SESSION['admin_name'] ?>" hidden>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="meta_description">Meta Description:</label>
                </td>
                <td>
                    <input type="text" class="input" id="meta_description" name="meta_description"
                        placeholder="Enter Meta Description">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="keywords">Keywords:</label>
                </td>
                <td>
                    <input type="text" class="input" id="keywords" name="keywords" placeholder="Enter Keywords">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="status">Status:</label>
                </td>
                <td>
                    <select onchange="passin()" name="status" id="status" class="input">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                        <option value="private">Private</option>
                        <option value="">Trash</option>
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
            <button id="ifCeker" type="submit" class="btn btn-primary">Save Page</button>

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



function macthLinkAddress() {
    const linkAddressSelect = document.getElementById('link_address');
    const selectedLinkAddress = linkAddressSelect.value;
    const linkAddresses = <?php echo json_encode($linkAddresses); ?>;
    // Check if the selected link address exists in the array
    if (linkAddresses.includes(selectedLinkAddress)) {
        document.getElementById('ifCeker').style.display = 'none';
        document.getElementById('shox').style.display = 'block';
        document.getElementById('shox').innerText = `Edit ${selectedLinkAddress} Link page info`;
        linkAddressSelect.style.border = '2px solid red';
        document.getElementById('error').innerText =
            'The selected link address already exists. Please choose a different one.';
        document.getElementById('error').style.color = 'red';
    } else {
        document.getElementById('ifCeker').style.display = 'block';
        document.getElementById('shox').style.display = 'none';
        linkAddressSelect.style.border = '';
        document.getElementById('error').innerText = '';

    }
}

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