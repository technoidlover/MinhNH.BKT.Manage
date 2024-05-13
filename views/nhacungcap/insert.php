<form method="post" name="create-ncc">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Nhà cung cấp</label>
            <input type="text" class="form-control" id="validationDefault01" name="tenkh" placeholder="Tên Nhà cung cấp" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Điện Thoại</label>
            <input type="phone" class="form-control" id="validationDefault02" name="sdt" placeholder="Số điện thoại" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault03">Email</label>
            <input type="email" class="form-control" id="validationDefault03" name="email" placeholder="Nhập Email" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault04">Địa Chỉ</label>
            <input type="text" class="form-control" id="validationDefault04" name="diachi" placeholder="Nhập Địa Chỉ.." required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault05">Người Liên Hệ</label>
            <input type="text" class="form-control" id="validationDefault05" name="nguoilienhe" placeholder="Tên Người Liên Hệ" required>
        </div>
        <button type="submit" name="create-ncc" class="mt-2 btn-danger btn">Thêm</button>
    </div>
</form>
<?php
if(isset($_POST['create-ncc'])){
    $ten = $_POST["tenkh"];
    $sdt = $_POST["sdt"];
    $email = $_POST["email"];
    $diachi = $_POST["diachi"];
    $nguoilienhe = $_POST["nguoilienhe"];  // Lấy dữ liệu từ form
    // Gọi hàm add của class NhaCungCap với đúng số lượng tham số
    NhaCungCap::add($ten, $sdt, $email, $diachi, $nguoilienhe);
}
?>