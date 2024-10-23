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
            e.preventDefault(); 
            var formData = new FormData(this); // Get form data, including the file

            $.ajax({
                url: '{{ route("profile.upload") }}', 
                type: 'POST',
                data: formData,
                processData: false, 
                contentType: false, 
                success: function (response) {
                    $('#uploadMessage').html('<p>Profile picture uploaded successfully!</p>');
                },
                error: function (xhr) {
                    $('#uploadMessage').html('<p>Failed to upload picture. Please try again.</p>');
                }
            });
        });
    });
</script>

