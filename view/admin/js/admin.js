function showimg(){
    var input = document.getElementById('imageInput');
    var img = document.getElementById('previewImage');
    // Kiểm tra xem người dùng đã chọn hình ảnh chưa
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            // Hiển thị hình ảnh đã chọn trong thẻ <img>
            img.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}
