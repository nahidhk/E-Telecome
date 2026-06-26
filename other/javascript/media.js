let getid = "";

function openGallery(loadInputID) {
    const galleryElemnt = document.getElementById('gallery');
    galleryElemnt.style.display = "block";
    getid = loadInputID;
}

function closeGllery() {
    const galleryElemnt = document.getElementById('gallery');
    galleryElemnt.style.display = "none";
}

function setImage(imgData) {
    const input = document.getElementById(getid);

    input.value =  "/ndsql-admin/" +imgData;

    input.dispatchEvent(new Event('input', {
        bubbles: true
    }));

    closeGllery();
}
function imgChenger({ inputTagID, imgTagID }) {
    const inputValue = document.getElementById(inputTagID).value;;
    document.getElementById(imgTagID).src = inputValue;
}
const label = document.querySelector('.uploader');
const input = document.getElementById('img');


label.addEventListener('dragover', (e) => {
    e.preventDefault();
});


label.addEventListener('drop', (e) => {
    e.preventDefault();
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        input.files = files;
    }
});

function imageUpload() {
    const previewImg = document.getElementById("previewImg");
    const imgData = document.getElementById("imgData");

    const file = imgData.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = (e) => {
        previewImg.src = e.target.result;
        previewImg.style.display="flex";
        document.getElementById('xxx').style.display="none";
        document.getElementById("blockBtn").style.display="block";
    };
    reader.readAsDataURL(file);
}