

<?php
    if(!isset($_GET['id']) || empty($_GET['id'])){
        header('location:?admin');
    }
    $id = $_GET['id'];
    include_once 'C:/xampp/htdocs/PHP1_xampp/ASM_PHP1_xampp/model/func.php';
    $datasp = getdata($conn,'sanpham','id',$id);
    $hinhsp = getdata($conn,'hinhsp','id_sanpham',$id);

?>

<div class="them">
    
<form action="../model/suly_sp.php" method='post' enctype="multipart/form-data">
    <input type="text" name="id" value="<?php echo $datasp['id']; ?>" hidden>
    <div class="item">
        <label for="">Mã sản phẩm</label>
        <input type="text" name = "masp" value="<?php echo $datasp['masp']; ?>">
    </div>
    <div class="item">
        <label for="">Danh mục sản phẩm</label>
        <select name="danhmuc" id="" style="width:100%">
            <?php
                $sql = "SELECT * FROM danhmucsp";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
            ?>
            <option <?php if($datasp['id_danhmucsp']==$row['id']){echo 'selected';} ?>  value="<?php echo $row['id'] ?>"><?php echo $row['ten'] ?></option>
            <?php  } ?>
        </select>
    </div>
    <div class="item">
        <label for="">Tên sản phẩm</label>
        <input type="text" name = "ten" value="<?php echo $datasp['ten']; ?>">
    </div>
    <div class="item">
        <label for="">Giá sản phẩm</label>
        <input type="number" name="giagoc" value="<?php echo $datasp['giagoc']; ?>">
    </div>
    <div class="item">
        <label for="">Giá khuyến mãi</label>
        <input type="number" name="giakm" value="<?php echo $datasp['giakm']; ?>">
    </div>
    <div class="item">
        <label for="">số lượng</label>
        <input type="number" name="soluong" value="<?php echo $datasp['soluong']; ?>">
    </div>
    <div class="item">
        <label for="">Mô tả ngắn</label>
        <textarea name="motangan" id="" cols="30" rows="5"><?php echo htmlspecialchars($datasp['motangan']) ?></textarea>
    </div>
    <div class="item">
        <label for="">Mô tả</label>
        <textarea name="motadai" id="" cols="30" rows="10"><?php echo htmlspecialchars($datasp['motadai']) ?></textarea>
    </div>
 
    <div class="item avt">
         <div class="anhdaidien" style="width:200px">
            
            <img style="width:100%" src="../uploads/<?php echo $datasp['hinh']; ?>" alt="">
        </div>
        <label for="">Ảnh đại diện</label>
        <input type="file" id="imageInput" name="anhdaidien" accept="image/*" >
    </div>
    <div class="item mt">
        <div class="anhmota">
            <?php 
                $hinh_old = getdata($conn,'hinhsp','id_sanpham',$id);
                if(isset($hinh_old[0])){
                foreach($hinh_old as $key => $value){    
            ?>   
                <div class="hinhitem">
                    <img src="../uploads/<?php echo $value['hinh']; ?>" alt="">
                </div>
            <?php
                }
                }else{
            ?>
                <div class="hinhitem">
                    <img src="../uploads/<?php echo $hinh_old['hinh']; ?>" alt="">
                </div>
            <?php 
                } 
            ?>

        </div>

        <label for="">Ảnh mô tả</label>
        <input type="file" multiple name="anhmota[]"  accept="image/*" >
    </div>

    <div class="item">
        <div><button name='btn-sua' class='btn-them'>Cập nhật</button></div>
    </div>
    </form>
</div> 
