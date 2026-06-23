function openGallery() {
    const div = document.createElement("div");

    div.innerHTML = `
        <div class="gallery">
            <div class="flex beet">
            <div>
            <h1>Hello word</h1>
            </div>
            <div onclick="closeGllery()">
            X
            </div>
            </div>
        </div>
    `;

    document.body.appendChild(div);
}

function closeGllery(){
    alert("working...")
}