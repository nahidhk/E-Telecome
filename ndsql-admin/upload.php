<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include 'hader.php';
    if (isset($_FILES["imgData"])) {
    $result = ndsql_upload("imgData");

    if ($result) {
        $redirect = isset($_GET['r']) ? $_GET['r'] : 'upload.php?i=upload.php';
        header("Location: " . $redirect);
        exit();
    }
    }
    $images = ndsql_get_images();
?>
<div class="box flex medel center column">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="imgData">
            <div class="galleryImg flex center medel column uploader">
                <div id="xxx" class="flex center medel column">
                    <i class="fa-solid fa-cloud-arrow-up uploadIcon"></i>
                    <p>Drop and Select</p>
                </div>
                <img id="previewImg" class="galleryImg none">
            </div>
        </label>
        <input onchange="imageUpload()" name="imgData" id="imgData" type="file" hidden accept="image/*">
        <div class="flex center medel">
            <button type="submit" class="btn none" id="blockBtn">Upload </button>
        </div>
    </form>
    <div class="flex center medel box wrap">
        <?php foreach($images as $img): ?>
        <img class="galleryImg" src="<?= $imgData . $img['file_path'] ?>" alt="image">
        <?php endforeach; ?>
    </div>
</div>

<script src="/other/javascript/media.js"></script>
<?php include 'footer.php'?>