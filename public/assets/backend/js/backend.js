//  edit page image preview
    document.getElementById('image').addEventListener('change', function(event) {
        const fileInput = event.target;
        const fileNameField = document.getElementById('file-name');
        const previewImage = document.getElementById('preview-image');

        if (fileInput.files && fileInput.files[0]) {
            const file = fileInput.files[0];

            // Show the file name
            fileNameField.value = file.name;

            // Show the image preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result; // Update image source
            };
            reader.readAsDataURL(file);
        } else {
            fileNameField.value = "No file chosen";
        }
    });

//   image preview
    document.getElementById('image').addEventListener('change', function(event) {
        const fileInput = event.target;               // File input element
        const fileNameField = document.getElementById('file-name'); // Field to display file name
        const previewImage = document.getElementById('preview-image'); // Image preview element

        if (fileInput.files && fileInput.files[0]) {
            const file = fileInput.files[0];

            // Show the file name
            fileNameField.value = file.name;

            // Update image preview instantly
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result; // Set the image source
                previewImage.style.display = "block"; // Show the preview image
            };
            reader.readAsDataURL(file); // Read the file as a Data URL
        } else {
            // If no file selected, reset values
            fileNameField.value = "No file chosen";
            previewImage.src = "#";
            previewImage.style.display = "none";
        }
    });