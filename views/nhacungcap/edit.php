<form method="post" name="edit-ncc">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Id</label>
            <input type="text" class="form-control" id="validationDefault01" value="<?= $nhacungcap->Id ?> " name="id" placeholder="Id" readonly required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Tên Nhà Cung Cấp</label>
            <input type="text" class="form-control" id="validationDefault01" value="<?= $nhacungcap->TenNCC ?> " name="tenncc" placeholder="" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault03">Người Liên Hệ</label>
            <input type="text" class="form-control" id="validationDefault03" value="<?= $nhacungcap->NguoiLienHe ?>" name="nguoilienhe" placeholder="Tên Người Liên Hệ" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Điện thoại</label>
            <input type="text" class="form-control" id="validationDefault01" value="<?= $nhacungcap->DienThoai ?> " name="dienthoai" placeholder="" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Email</label>
            <input type="email" class="form-control" id="validationDefault01" value="<?= $nhacungcap->Email ?> " name="email" placeholder="" required>
        </div>

        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Địa Chỉ</label>
            <input type="text" class="form-control" id="validationDefault02" value="<?= $nhacungcap->DiaChi ?> " name="diachi" placeholder="" required>

        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">MST</label>
            <input type="text" class="form-control" id="validationDefault02" value="<?= $nhacungcap->MST ?> " name="MST" placeholder="" required>
            <button type="submit" name="edit-ncc" class=" mt-2 btn-danger btn">Update</button>
        </div>
    </div>
</form>
<?php
if (isset($_POST['edit-ncc'])) {
    $id = $nhacungcap->Id;
    $ten = $_POST['tenncc'];
    $dienthoai = $_POST['dienthoai'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $nguoilienhe = $_POST['nguoilienhe'];
    $MST = $_POST['MST'];
    // Gọi hàm update của class NhaCungCap với đúng số lượng tham số
    NhaCungCap::update($id, $ten, $dienthoai, $email, $diachi, $nguoilienhe, $MST); // updated code
}
?>