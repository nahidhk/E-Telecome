<?php
    include "errCK.php";

    $valueData   = "value";
    $keywordData = "keyword";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    change_ndsql_info($_POST);
    }

    $images = json_decode(ndsql_info(8)[$valueData], true);

    if (! is_array($images)) {
    $images = [];
    }
?>

<hr>

<form action="" method="post">

    <table class="inputTab">
        <tbody>

            <tr>
                <td>
                    Marquee Title :
                </td>
                <td>
                    <input id="<?php echo ndsql_info(7)[$keywordData] ?>" type="text"
                        name="<?php echo ndsql_info(7)[$keywordData] ?>"
                        value="<?php echo htmlspecialchars(ndsql_info(7)[$valueData]); ?>" class="input">
                </td>
            </tr>

            <tr>
                <td>
                    Marquee Top Image :
                </td>

                <td>

                    <!-- JSON Save -->
                    <textarea class="hadi" id="<?php echo ndsql_info(8)[$keywordData] ?>"
                        name="<?php echo ndsql_info(8)[$keywordData] ?>" class="input" rows="8"><?php
                                 echo json_encode($images, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                                 ?></textarea>

                 

   

                    <!-- All Images -->
                    <div id="allImages">

                        <?php foreach ($images as $img) {?>

                        <div class="cover">
                            <img src="<?php echo htmlspecialchars($img); ?>">
                            <!-- Delate -->
                            <div class="delete" onclick="deleteImage(<?php echo $index; ?>)">
                                <i class="fa-regular fa-trash-can"></i>
                            </div>
                        </div>

                        <?php }?>

                    </div>
                       <!-- Add Image -->
                    <div class="flex center medel">

                        <input id="newImage" type="text" class="input" placeholder="Image URL">

                        <div class="gBtn flex center medel margin" onclick="openGallery('newImage')">
                            <i class="fa-regular fa-images"></i>
                        </div>

                        <div class="gBtn flex center medel" onclick="addImage()">
                            <i class="fa-solid fa-plus"></i>
                        </div>

                    </div>

                </td>

            </tr>

        </tbody>
    </table>

    <button class="btn" type="submit">
        Save Change
    </button>

</form>

<script>
function addImage() {

    let input = document.getElementById("newImage");
    let textarea = document.getElementById("<?php echo ndsql_info(8)[$keywordData] ?>");
    let preview = document.getElementById("previweImg");
    let allImages = document.getElementById("allImages");

    let url = input.value.trim();

    if (url == "") {
        alert("Image URL লিখুন");
        return;
    }

    let arr = [];

    try {
        arr = JSON.parse(textarea.value);

        if (!Array.isArray(arr)) {
            arr = [];
        }

    } catch (e) {
        arr = [];
    }

    arr.push(url);

    textarea.value = JSON.stringify(arr, null, 4);

    if (arr.length == 1) {
        preview.src = url;
    }

 renderImages();
    input.value = "";
}
function deleteImage(index){

    let textarea = document.getElementById("<?php echo ndsql_info(8)[$keywordData] ?>");

    let arr = [];

    try{
        arr = JSON.parse(textarea.value);

        if(!Array.isArray(arr)){
            arr = [];
        }

    }catch(e){
        arr = [];
    }

    // Remove Image
    arr.splice(index,1);

    // Update Textarea
    textarea.value = JSON.stringify(arr,null,4);

    // Reload Preview
    renderImages();
}

function renderImages(){

    let textarea = document.getElementById("<?php echo ndsql_info(8)[$keywordData] ?>");
    let allImages = document.getElementById("allImages");

    let arr = [];

    try{
        arr = JSON.parse(textarea.value);

        if(!Array.isArray(arr)){
            arr = [];
        }

    }catch(e){
        arr = [];
    }

    allImages.innerHTML = "";

    arr.forEach((url,index)=>{

        allImages.innerHTML += `
            <div class="cover">
                <img src="${url}" >

                <div class="delete" onclick="deleteImage(${index})">
                    <i class="fa-regular fa-trash-can"></i>
                </div>
            </div>
        `;

    });

}


</script>