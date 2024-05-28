<?php
require_once('models/sanpham.php');
require_once('models/donvitinh.php');
require_once('models/nhacungcap.php');
require_once('models/hangsx.php');
require_once('models/nhomtb.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sanpham = SanPham::find($id);

    if (!$sanpham) {
        echo "Sản phẩm không tồn tại";
        exit;
    }
} else {
    echo "Chưa có ID sản phẩm trong yêu cầu.";
    exit;
}

// Lấy các danh sách liên quan để hiển thị trong các dropdown
$listDVT = DonViTinh::all();
$listNCC = NhaCungCap::all();
$listHSX = HangSX::all();
$listNTB = NhomTB::all();

?>

<form method="post" name="edit-sp" enctype="multipart/form-data">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Tên Sản Phẩm</label>
            <input type="text" class="form-control" id="validationDefault01" name="tensp" value="<?= $sanpham->TenSP ?>" placeholder="Tên Sản Phẩm" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Đơn Vị tính</label>
            <select class="form-control" id="dvt" name="dvt">
                <?php foreach ($listDVT as $item) {
                    $selected = $item->Id == $sanpham->IdDVT ? "selected" : "";
                    echo "<option value='{$item->Id}' $selected>{$item->DonVi}</option>";
                } ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Nhà Cung Cấp</label>
            <select class="form-control" id="ncc" name="ncc">
                <?php foreach ($listNCC as $item) {
                    $selected = $item->Id == $sanpham->IdNCC ? "selected" : "";
                    echo "<option value='{$item->Id}' $selected>{$item->TenNCC}</option>";
                } ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Hãng sản xuất</label>
            <select class="form-control" id="hangsx" name="hangsx">
                <?php foreach ($listHSX as $item) {
                    $selected = $item->Id == $sanpham->IdHSX ? "selected" : "";
                    echo "<option value='{$item->Id}' $selected>{$item->TenHang}</option>";
                } ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Nhóm thiết bị</label>
            <select class="form-control" id="nhomtb" name="nhomtb">
                <?php foreach ($listNTB as $item) {
                    $selected = $item->Id == $sanpham->IdNTB ? "selected" : "";
                    echo "<option value='{$item->Id}' $selected>{$item->TenNhom}</option>";
                } ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Giá Mua</label>
            <input type="number" class="form-control" id="validationDefault02" name="giamua" value="<?= $sanpham->GiaMua ?>" placeholder="Nhập giá" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Giá bán</label>
            <input type="number" class="form-control" id="validationDefault02" name="giaban" value="<?= $sanpham->GiaBan ?>" placeholder="Nhập giá.." required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Số lượng</label>
            <input type="number" class="form-control" id="validationDefault02" name="soluong" value="<?= $sanpham->SoLuong ?>" placeholder="Nhập số lượng" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Xuất xứ</label>
            <input type="text" class="form-control" id="validationDefault02" name="xuatxu" value="<?= $sanpham->XuatXu ?>" placeholder="Nhập xuất xứ" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Mã Sản Phẩm</label>
            <input type="text" class="form-control" id="validationDefault02" name="masp" value="<?= $sanpham->MaSP ?>" placeholder="Nhập Mã SP" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Hình ảnh sản phẩm</label>
            <input type="file" class="form-control" id="validationDefault02" name="productImage">
            <img src="<?= $sanpham->imgUrl ?>" alt="Product Image" width="100">
        </div>
        <button type="submit" name="edit-sp" class="mt-2 btn-danger btn">Cập nhật</button>
    </div>
</form>

<?php
if (isset($_POST['edit-sp'])) {
    $MaSP = $_POST["masp"];
    $TenSP = $_POST["tensp"];
    $IdDVT = $_POST["dvt"];
    $IdNCC = $_POST["ncc"];
    $IdHSX = $_POST["hangsx"];
    $IdNTB = $_POST["nhomtb"];
    $XuatXu = $_POST["xuatxu"];
    $GiaMua = $_POST["giamua"];
    $GiaBan = $_POST["giaban"];
    $SoLuong = $_POST["soluong"];

    // Handle the file upload
    $imgUrl = $sanpham->imgUrl;  // Giữ đường dẫn hình ảnh hiện tại
    if (isset($_FILES["productImage"]) && $_FILES["productImage"]["error"] == 0) {
        $imgUrl = SanPham::handleFileUpload($_FILES["productImage"]);
    }

    // Gọi method `update` với đủ tham số mới, bao gồm cả URL hình ảnh
    SanPham::update($sanpham->Id, $MaSP, $TenSP, $IdDVT, $IdNCC, $IdHSX, $IdNTB, $XuatXu, $GiaMua, $GiaBan, $SoLuong, $imgUrl);
    header('Location: index.php?controller=sanpham');
}
?>