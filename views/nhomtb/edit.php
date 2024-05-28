<form method="post" name="edit-nhomtb">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Id</label>
            <input type="text" class="form-control" id="validationDefault01" value="<?= $nhomtb->Id ?> " name="id" placeholder="Id" readonly required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Tên nhóm thiết bị</label>
            <input type="text" class="form-control" id="validationDefault02" value="<?= $nhomtb->TenNhom ?> " name="tennhomtb" placeholder="Tên nhóm thiết bị" required>
            <button type="submit" name="edit-nhomtb" class=" mt-2 btn-danger btn">Update</button>
        </div>
    </div>
</form>
<?php
if (isset($_POST['edit-nhomtb'])) {
    $id = $_POST['id'];
    $ten = $_POST['tennhomtb'];
    NhomTB::update($id, $ten);
}
?>