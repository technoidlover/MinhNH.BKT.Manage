<form method="post" name="create-nhomtb">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Nhóm Thiết Bị</label>
            <input type="text" class="form-control" id="validationDefault01" name="tennhom" placeholder="Tên nhóm thiết bị" required>
            <button type="submit" name="create-nhomtb" class="mt-2 btn-danger btn">Thêm</button>
        </div>
    </div>
</form>
<?php
if (isset($_POST['create-nhomtb'])) {
    $ten = $_POST["tennhom"];
    NhomTB::add($ten);
}
?>