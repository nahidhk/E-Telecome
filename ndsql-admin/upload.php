<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include 'hader.php';
    if (isset($_FILES["imgData"])) {
        $result = ndsql_upload("imgData");

        if ($result) {
            echo "<script>window.location.href='upload.php?i=upload.php';</script>";
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
        <?php foreach($images as $i => $img): ?>
            
       <div class="">
         <img onclick="photoDekharJnno(this)" class="galleryImg galleryThumb " data-index="<?= $i ?>"
            src="<?= $imgData .   $img['file_path'] ?>" alt="<?= htmlspecialchars($img['file_path']) ?>" accesskey="ndsql_fz56rsnxtTeX0D5USp4SVu2814dKpNVn" id="<?= $img['id'] ?>">
       </div>
        <?php endforeach; ?>
    </div>
</div>




<script>
const galleryImages = Array.from(document.querySelectorAll('.galleryThumb')).map(img => ({
    src: img.src,
    alt: img.alt
}));
let currentIndex = 0;

function photoDekharJnno(img) {
    currentIndex = parseInt(img.dataset.index, 10);
    renderPreview();
}

function renderPreview() {
    const old = document.querySelector('.xpolire');
    if (old) old.remove();

    const item = galleryImages[currentIndex];
    console.log(item)
    const html = `
<div class="popup xpolire flex center medel">
 
<div class="boxio">


    <div class="flex center medel w100">
        <img src="${item.src}" alt="${item.alt}" class="popViewImg">
    </div>

<br>

     <div class="flex center medel w100">
      <div class="topxxx flex medel around">
    <button onclick="prevImg()"  style="font-size: 24px;" class="buttonIcon"><i class="fa-solid fa-chevron-left"></i></button>
    <div class="flex center medel">
    <button onclick="closeImgPreview()" class="buttonIcon"><i style="color: red;font-size: 24px;" class=" fa-solid fa-xmark"></i></button>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button onclick='deleteImg(${JSON.stringify(item.alt)})' class="buttonIcon deleate">
    <i class="fa-solid fa-trash"></i>
</button>
    </div>
    <button onclick="nextImg()" style="font-size: 24px;" class="buttonIcon"><i class="fa-solid fa-chevron-right"></i></button>
  </div>
     </div>



</div>

</div>

    `;
    document.body.insertAdjacentHTML('beforeend', html);
}



function deleteImg(imageName) {
    const confirmation = confirm(`Are you sure you want to delete the image: ${imageName}?`);
    if (confirmation === true) {
       window.location.href = `drop_img.php?image=${encodeURIComponent(imageName)}`;
    }
}


function nextImg() {
    currentIndex = (currentIndex + 1) % galleryImages.length;
    renderPreview();
}

function prevImg() {
    currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
    renderPreview();
}

function closeImgPreview() {
    const box = document.querySelector('.xpolire');
    if (box) box.remove();
}

document.addEventListener('keydown', (e) => {
    if (!document.querySelector('.xpolire')) return;
    if (e.key === 'ArrowRight') nextImg();
    if (e.key === 'ArrowLeft') prevImg();
    if (e.key === 'Escape') closeImgPreview();
});
</script>
<script src="/other/javascript/media.js"></script>
<?php include 'footer.php'?>