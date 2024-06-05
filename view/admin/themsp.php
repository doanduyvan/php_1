

<div class="them">
    <form action="../model/suly_sp.php" method='post' enctype="multipart/form-data">
    <div class="item">
        <label for="">Mã sản phẩm</label>
        <input type="text" name = "masp">
    </div>
    <div class="item">
        <label for="">Danh mục sản phẩm</label>
        <select name="danhmuc" id="" style="width:100%">
            <?php
                $sql = "SELECT * FROM danhmucsp";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
            ?>
            <option value="<?php echo $row['id'] ?>"><?php echo $row['ten'] ?></option>
            <?php  } ?>
        </select>
    </div>
    <div class="item">
        <label for="">Tên sản phẩm</label>
        <input type="text" name = "ten">
    </div>
    <div class="item">
        <label for="">Giá sản phẩm</label>
        <input type="number" name="giagoc">
    </div>
    <div class="item">
        <label for="">Giá khuyến mãi</label>
        <input type="number" name="giakm">
    </div>
    <div class="item">
        <label for="">số lượng</label>
        <input type="number" name="soluong">
    </div>
    <div class="item">
        <label for="">Mô tả ngắn</label>
        <textarea name="motangan" id="" cols="30" rows="5"></textarea>
    </div>
    <div class="item">
        <label for="">Mô tả</label>
        <textarea name="motadai" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="showimg">
        <img src="" alt="" id="previewImage">
    </div>
    <div class="item">
        <label for="">Ảnh đại diện</label>
        <input type="file" id="imageInput" onchange="showimg()" name="anhdaidien" accept="image/*" >
    </div>
    <div class="item">
        <label for="">Ảnh mô tả</label>
        <input type="file" multiple name="anhmota[]"  accept="image/*" >
    </div>
    <div class="item">
        <div><button name='btn-them' class='btn-them'>Thêm</button></div>
    </div>
    </form>
</div> 
