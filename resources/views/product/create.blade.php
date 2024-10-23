<form id="product-form" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Product Name">
    <textarea name="description" placeholder="Product Description"></textarea>
    <input type="file" name="image">

    <div id="features-section">
        <input type="text" name="features[]" placeholder="Feature 1">
        <input type="text" name="features[]" placeholder="Feature 2">
        <button type="button" id="add-feature">Add Feature</button>
    </div>

    <button type="submit">Create Product</button>
</form>

<script>
    $('#add-feature').on('click', function() {
    $('#features-section').append('<input type="text" name="features[]" placeholder="Feature">');
});

</script>
