<form method="post" name="create-hangsx">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Hãng Sản Xuất</label>
            <input type="text" class="form-control" id="validationDefault01" name="tenhang" placeholder="Tên hãng sản xuất" required>
            <button type="submit" name="create-hangsx" class="mt-2 btn-danger btn">Thêm</button>
        </div>
    </div>
</form>
<?php
if (isset($_POST['create-hangsx'])) {
    $ten = $_POST["tenhang"];
    HangSX::add($ten);
}
?>