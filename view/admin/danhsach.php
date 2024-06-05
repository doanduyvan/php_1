<div class="bang">
    <table border='1' >
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá Sản phẩm</th>
            <th>Giá khuyến mãi</th>
            <th>Số lượng</th>
            <th>Hình ảnh</th>
            <th></th>
            <th></th>
        </tr>
        <!-- sản phẩm -->
        <?php
            $sql = "SELECT * FROM sanpham";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['masp'] ?></td>
            <td><?php echo $row['ten'] ?></td>
            <td><?php echo $row['giagoc'] ?></td>
            <td><?php echo $row['giakm'] ?></td>
            <td><?php echo $row['soluong'] ?></td>
            <td>
                <div class="hinh">
                    <img src="../uploads/<?php echo $row['hinh'] ?>" alt="">
                </div>
            </td>
            <td><a href="?admin=sua&id=<?php echo $row['id'] ?>">Sửa</a></td>
            <td><a onclick="return kiemtra()" href="?admin=xoa&id=<?php echo $row['id'] ?>">Xóa</a></td>
        </tr>
        <?php } ?>
    </table>
</div>

<script>
        function kiemtra(){
            return confirm("Bạn chắc chắn muốn xóa sản phẩm này?");
        }
    </script>