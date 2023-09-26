const imageInput = document.getElementById('imageInput');
const imagePreview = document.getElementById('imagePreview');

imageInput.addEventListener('change', function() {
    if (this.files && this.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result;
        };

        reader.readAsDataURL(this.files[0]);
    }
});



