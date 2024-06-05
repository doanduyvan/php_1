<div class="bang">
    <table border='1' >
        <tr>
            <th>Tên tài khoản</th>
            <th>email</th>
            <th>Mật khẩu</th>
            <th>Vai trò</th>
            <th>Ngày Tạo</th>
            <th></th>
        </tr>
        <!-- sản phẩm -->
        <?php
            $sql = "SELECT * FROM taikhoan";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['tentaikhoan'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['matkhau'] ?></td>
            <td>
                <?php
                if($row['vaitro']==1){
                    echo 'Quản trị viên';
                }else{
                    echo 'Khách hàng';
                }
                 
                ?>
            </td>
            <td><?php echo $row['ngaytao']; ?></td>
            <td><a href="?admin=xoa_user&id=<?php echo $row['id'] ?>">Xóa</a></td>
        </tr>
        <?php } ?>
    </table>
</div>

<script>
    function checkxoa(){
        return confirm('Xóa sản phẩm <?php ?>');
    }
</script>