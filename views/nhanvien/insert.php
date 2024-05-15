<?php
require_once('connection.php');
?>
<form method="post" name="create-nv">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Tên Nhân viên</label>
            <input type="text" class="form-control" id="validationDefault01" name="tennv" placeholder="Tên" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault03">Điện Thoại</label>
            <input type="phone" class="form-control" id="validationDefault03" name="dienthoai" placeholder="Số điện thoại" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault04">Email</label>
            <input type="email" class="form-control" id="validationDefault04" name="email" placeholder="Nhập Email" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault05">Địa Chỉ</label>
            <input type="text" class="form-control" id="validationDefault05" name="diachi" placeholder="Nhập Địa Chỉ" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault06">Tài Khoản</label>
            <input type="text" class="form-control" id="validationDefault06" name="taikhoan" placeholder="Nhập Tài khoản" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault07">Mật Khẩu</label>
            <input type="password" class="form-control" id="validationDefault07" name="matkhau" placeholder="Nhập Mật khẩu" required>
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
            <label for="validationDefault09">IsActive</label>
            <select class="form-control" id="validationDefault09" name="isactive">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <button type="submit" class="btn btn-success">Thêm Nhân Viên</button>
        </div>
    </div>
</form>
<?php
if (isset($_POST['tennv'])) {
    $tennv = $_POST["tennv"];
    $dienthoai = $_POST["dienthoai"];
    $email = $_POST["email"];
    $diachi = $_POST["diachi"];
    $taikhoan = $_POST["taikhoan"];
    $matkhau = $_POST["matkhau"];
    $quyen = $_POST["quyen"];
    $isactive = $_POST['isactive'];

    // Kiểm tra tài khoản có tồn tại không
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM NhanVien WHERE TaiKhoan = :taikhoan');
    $req->execute(array('taikhoan' => $taikhoan));
    $exists = $req->fetch();
    
    if ($exists) {
        echo "<h1 class='text-center text-danger'>Người dùng đã tồn tại</h1>";
    } else {
        NhanVien::add($taikhoan, $matkhau, $quyen, $isactive, $tennv, $dienthoai, $email, $diachi);
        header('Location: index.php?controller=nhanvien&action=index'); // Chuyển hướng sau khi thêm thành công
    }
}
?>