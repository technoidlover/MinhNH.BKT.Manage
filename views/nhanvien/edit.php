<form method="post" name="edit-kh">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Tên Nhân Viên</label>
            <input type="text" class="form-control" id="validationDefault01" value="<?= $nhanvien->TenNV ?>" name="tenkh" placeholder="Tên" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Điện Thoại</label>
            <input type="phone" class="form-control" id="validationDefault02" value="<?= $nhanvien->DienThoai ?>" name="sdt" placeholder="Số điện thoại" required>
        </div>

        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Email</label>
            <input type="email" class="form-control" id="validationDefault02" value="<?= $nhanvien->Email ?>" name="email" placeholder="Nhập Email" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Địa Chỉ</label>
            <input type="text" class="form-control" id="validationDefault02" value="<?= $nhanvien->DiaChi ?>" name="diachi" placeholder="Nhập Địa Chỉ.." required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Tài khoản</label>
            <input type="text" class="form-control" id="validationDefault02" value="<?= $nhanvien->TaiKhoan ?>" name="taikhoan" placeholder="Nhập Tài khoản.." readonly required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault08">Quyền</label>
            <select class="form-control" id="validationDefault08" name="quyen" required>
                <option value="Admin">admin</option>
                <option value="Manager">manager</option>
                <option value="User">user</option>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Mật khẩu</label>
            <input type="password" class="form-control" id="validationDefault02" value="" name="matkhau" placeholder="Nhập Mật khẩu mới (để trống nếu không thay đổi)">
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">IsActive</label>
            <select class="form-control" name="isactive">
                <option value="1" <?= $nhanvien->IsActive == 1 ? 'selected' : '' ?>>Yes</option>
                <option value="0" <?= $nhanvien->IsActive == 0 ? 'selected' : '' ?>>No</option>
            </select>
            <button type="submit" name="edit-kh" class="mt-2 btn-danger btn">Update</button>
        </div>
    </div>
</form>
<?php
if (isset($_POST['edit-kh'])) {
    $id = $nhanvien->Id;
    $ten = $_POST['tenkh'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $quyen = $_POST['quyen'];
    $matkhau = $_POST['matkhau'];
    $isactive = $_POST['isactive'];

    NhanVien::update($id, $nhanvien->TaiKhoan, $matkhau, $quyen, $isactive, $ten, $sdt, $email, $diachi);
}
?>