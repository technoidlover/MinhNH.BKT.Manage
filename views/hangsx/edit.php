<form method="post" name="edit-hangsx">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Id</label>
            <input type="text" class="form-control" id="validationDefault01" value="<?= $hangsx->Id ?> " name="id" placeholder="Id" readonly required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Tên hãng sản xuất</label>
            <input type="text" class="form-control" id="validationDefault02" value="<?= $hangsx->TenHang ?> " name="tenhangsx" placeholder="Tên hãng sản xuất" required>
            <button type="submit" name="edit-hangsx" class=" mt-2 btn-danger btn">Update</button>
        </div>
    </div>
</form>
<?php
if (isset($_POST['edit-hangsx'])) {
    $id = $_POST['id'];
    $ten = $_POST['tenhangsx'];
    HangSX::update($id, $ten);
}
?>