// Preview the image uploaded
function previewImage(){
    const inputFile = document.getElementById('drug_image');
    const preview = document.getElementById('drug_image_preview');
    const file = inputFile.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        preview.src = e.target.result; // set the image source to the uploaded image
        console.log(e.target.result); // display the image source
    };

    if (file) {
        reader.readAsDataURL(file);
    }
}