<form id="uploadForm" enctype="multipart/form-data">
    @csrf
    <label for="profile_picture">Choose Profile Picture:</label>
    <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
    <button type="submit">Upload</button>
</form>

<div id="uploadMessage"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#uploadForm').on('submit', function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser

            var formData = new FormData(this); // Get form data, including the file

            $.ajax({
                url: '{{ route("profile.upload") }}', // The route to handle file upload
                type: 'POST',
                data: formData,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting the content type
                success: function (response) {
                    // Show success message
                    $('#uploadMessage').html('<p>Profile picture uploaded successfully!</p>');
                },
                error: function (xhr) {
                    // Show error message
                    $('#uploadMessage').html('<p>Failed to upload picture. Please try again.</p>');
                }
            });
        });
    });
</script>

