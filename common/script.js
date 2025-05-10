// below code is for the showing the selected image preivew 

//          below code is the required html code 

//          <!-- Show new Imges   -->
//          <h6 class="d-none mt-4" id="newImage">New Images</h6>
//          <div class="row" id="imagePreviewContainer">
//              <!-- Selected images will be displayed here -->
//          </div>

document.getElementById('propertyImages').addEventListener('change', function(event) {
    const files = event.target.files;
    const container = document.getElementById('imagePreviewContainer');
    container.innerHTML = ''; // Clear any previous images
    const Head = document.getElementById('newImage');
    Head.classList.remove("d-none");

    // Loop through the selected files
    for (let i = 0; i < files.length && i < 4; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function(e) {
            const imgCol = document.createElement('div');
            imgCol.classList.add('col-md-3', 'mb-3');
            const img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('img-fluid');
            img.alt = 'Selected Image';
            imgCol.appendChild(img);
            container.appendChild(imgCol);
        };

        reader.readAsDataURL(file);
    }
});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////