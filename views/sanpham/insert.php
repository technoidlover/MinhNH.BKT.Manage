<?php
require_once('models/donvitinh.php');
require_once('models/nhacungcap.php');

$list = [];
$db = DB::getInstance();
$reg = $db->query('select * from DonViTinh');
foreach ($reg->fetchAll() as $item) {
    $list[] = new DonViTinh($item['Id'], $item['DonVi']);
}
$data = array('donvi' => $list);
//end dvt
$list1 = [];
$db1 = DB::getInstance();
$reg1 = $db1->query('select * from NhaCungCap');
foreach ($reg1->fetchAll() as $item) {
    $list1[] = new NhaCungCap($item['Id'], $item['TenNCC'], $item['DienThoai'], $item['Email'], $item['DiaChi'], $item['NguoiLienHe'], $item['MST']);
}
$data1 = array('nhacungcap' => $list1);
?>
<form method="post" name="create-sp">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Tên Sản Phẩm</label>
            <input type="text" class="form-control" id="validationDefault01" name="tensp" placeholder="Tên Sản Phẩm" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Đơn Vị tính</label>
            <select class="form-control" id="lsp_ma" name="dvt">
                <?php foreach ($list as $item) {
                    echo "<option value=" . $item->Id . ">" . $item->DonVi . "</option>";
                } ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Nhà Cung Cấp</label>
            <select class="form-control" id="lsp_ma" name="ncc">
                <?php foreach ($list1 as $item) {
                    echo "<option value=" . $item->Id . ">" . $item->TenNCC . "</option>";
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

        <!-- thêm hãng sx, xuất xứ, mô tả và nhóm thiết bị -->
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Hãng sản xuất</label>
            <input type="text" class="form-control" id="validationDefault02" name="hangsx" placeholder="Nhập hãng sản xuất" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Xuất xứ</label>
            <input type="text" class="form-control" id="validationDefault02" name="xuatxu" placeholder="Nhập xuất xứ" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Mô tả</label>
            <input type="text" class="form-control" id="validationDefault02" name="mota" placeholder="Nhập mô tả" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Nhóm thiết bị</label>
            <input type="text" class="form-control" id="validationDefault02" name="nhomtb" placeholder="Nhập nhóm thiết bị" required>
            <button type="submit" name="create-sp" class=" mt-2 btn-danger btn">Thêm</button>
        </div>
    </div>
</form>
<?php
if (isset($_POST['create-sp'])) {
    $ten = $_POST["tensp"];
    $dvt = $_POST["dvt"];
    $ncc = $_POST["ncc"];
    $giamua = $_POST["giamua"];
    $giaban = $_POST["giaban"];
    $soluong = $_POST["soluong"];
    // Bổ sung các tham số mới nếu có
    $HangSX = $_POST["hangsx"];
    $XuatXu = $_POST["xuatxu"];
    $MoTa = $_POST["mota"];
    $NhomTB = $_POST["nhomtb"];

    // Gọi method `add` với đủ tham số mới
    SanPham::add($ten, $dvt, $ncc, $giamua, $giaban, $soluong, $HangSX, $XuatXu, $MoTa, $NhomTB);
}
?>