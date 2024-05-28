<?php
require_once('models/donvitinh.php');
require_once('models/nhacungcap.php');
require_once('models/hangsx.php');
require_once('models/nhomtb.php');

$list = [];
$db = DB::getInstance();
$reg = $db->query('select * from DonViTinh');
foreach ($reg->fetchAll() as $item) {
    $list[] = new DonViTinh($item['Id'], $item['DonVi']);
}
$data = array('donvi' => $list);

$list1 = [];
$db1 = DB::getInstance();
$reg1 = $db1->query('select * from NhaCungCap');
foreach ($reg1->fetchAll() as $item) {
    $list1[] = new NhaCungCap($item['Id'], $item['TenNCC'], $item['DienThoai'], $item['Email'], $item['DiaChi'], $item['NguoiLienHe'], $item['MST']);
}
$data1 = array('nhacungcap' => $list1);

$list2 = [];
$db2 = DB::getInstance();
$reg2 = $db2->query('select * from HangSX');
foreach ($reg2->fetchAll() as $item) {
    $list2[] = new HangSX($item['Id'], $item['TenHang']);
}
$data2 = array('hangsx' => $list2);

$list3 = [];
$db3 = DB::getInstance();
$reg3 = $db3->query('select * from NhomThietBi');
foreach ($reg3->fetchAll() as $item) {
    $list3[] = new NhomTB($item['Id'], $item['TenNhom']);
}
$data3 = array('nhomthietbi' => $list3);
?>

<form method="post" name="create-sp" enctype="multipart/form-data">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Tên Sản Phẩm</label>
            <input type="text" class="form-control" id="validationDefault01" name="tensp" placeholder="Tên Sản Phẩm" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Đơn Vị tính</label>
            <select class="form-control" id="dvt" name="dvt">
                <?php foreach ($list as $item) {
                    echo "<option value=" . $item->Id . ">" . $item->DonVi . "</option>";
                } ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Nhà Cung Cấp</label>
            <select class="form-control" id="ncc" name="ncc">
                <?php foreach ($list1 as $item) {
                    echo "<option value=" . $item->Id . ">" . $item->TenNCC . "</option>";
                } ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Hãng sản xuất</label>
            <select class="form-control" id="hangsx" name="hangsx">
                <?php foreach ($list2 as $item) {
                    echo "<option value=" . $item->Id . ">" . $item->TenHang . "</option>";
                } ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Nhóm thiết bị</label>
            <select class="form-control" id="nhomtb" name="nhomtb">
                <?php foreach ($list3 as $item) {
                    echo "<option value=" . $item->Id . ">" . $item->TenNhom . "</option>";
                } ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Giá Mua</label>
            <input type="number" class="form-control" id="validationDefault02" name="giamua" placeholder="Nhập giá" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Giá bán</label>
            <input type="number" class="form-control" id="validationDefault02" name="giaban" placeholder="Nhập giá.." required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Số lượng</label>
            <input type="number" class="form-control" id="validationDefault02" name="soluong" placeholder="Nhập số lượng" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Xuất xứ</label>
            <input type="text" class="form-control" id="validationDefault02" name="xuatxu" placeholder="Nhập xuất xứ" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Mã Sản Phẩm</label>
            <input type="text" class="form-control" id="validationDefault02" name="masp" placeholder="Nhập Mã SP" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Hình ảnh sản phẩm</label>
            <input type="file" class="form-control" id="validationDefault02" name="productImage" required>
        </div>
        <button type="submit" name="create-sp" class="mt-2 btn-danger btn">Thêm</button>
    </div>
</form>

<?php
if (isset($_POST['create-sp'])) {
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
    $imgUrl = null;
    if (isset($_FILES["productImage"]) && $_FILES["productImage"]["error"] == 0) {
        $imgUrl = SanPham::handleFileUpload($_FILES["productImage"]);
    }

    // Gọi method `add` với đủ tham số mới, bao gồm cả URL hình ảnh
    SanPham::add($MaSP, $TenSP, $IdDVT, $IdNCC, $IdHSX, $IdNTB, $XuatXu, $GiaMua, $GiaBan, $SoLuong, $imgUrl);
}
?>