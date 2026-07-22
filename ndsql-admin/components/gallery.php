<!-- gallery.php -->
<?php 
$images = ndsql_get_images();
?>

<div id="gallery" class="gallery">
    <div class="flex medel beet padding">
        <div>
            <h1>All Media</h1>
        </div>
        <div onclick="closeGllery()" class="icon-btn">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    <hr>
    <div class="flex wrap yScroll gImg">
    <div onclick="pageCall('upload.php')" class="galleryImg flex center medel column uploader">
        <i class="fa-solid fa-cloud-arrow-up uploadIcon"></i>
        <p>Click and upload</p>
    </div>
        <?php foreach($images as $img): ?>
        <img onclick="setImage('<?= $imgData . $img['file_path'] ?>')" class="galleryImg" src="<?= $imgData . $img['file_path'] ?>" alt="image">
        <?php endforeach; ?>
    </div>
</div>
<script src="/other/javascript/media.js"></script>
