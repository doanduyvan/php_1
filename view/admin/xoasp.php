<?php
    
    if(!isset($_GET['id']) || empty($_GET['id'])){
        header('location: ?admin');
    }
    $id = $_GET['id'];
?>

<form action="../model/suly_sp.php" id="form_submit" method="post">
    <input type="text" name="xoa_sp" value="<?php echo $id; ?>"  hidden>
</form>

<script>
     window.onload = function() {
        document.getElementById('form_submit').submit();
    };
</script>