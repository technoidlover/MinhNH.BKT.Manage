<?php
require_once('connection.php');
require_once('models/khachhang.php');
require_once('models/nhanvien.php');
require_once('models/sanpham.php');
require_once('models/duan.php');
require_once('models/chitietduan.php');

// Get all necessary data
$listNV = NhanVien::all();
$listKH = KhachHang::all();
$listSP = SanPham::all();
?>

<form method="post" name="add">
    <div class="form-group">
        <fieldset style="border-collapse: collapse; border: 1px solid red" class="ml-5 mr-5">
            <legend class="ml-2">Thêm dự án</legend>
            <div class="form-group ml-5">
                <div class="col-md-12 mb-3">
                    <label for="khachhang">Khách Hàng</label>
                    <select class="form-control" name="khachhang" id="khachhang">
                        <optgroup style="color: #1cc6a4" label="Chọn Khách Hàng">
                            <?php foreach ($listKH as $item) : ?>
                                <option value="<?= htmlspecialchars($item->Id) ?>"><?= htmlspecialchars($item->TenKH) ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 ml-5">
                    <label for="ngayban">Ngày bán</label>
                    <input type="datetime-local" class="form-control" name="ngayban" id="ngayban">
                </div>
                <div class="form-group col-md-4 ml-5">
                    <label for="validationDefault02">Trạng thái</label>
                    <select class="form-control" name="trangthai">
                        <option value="0" readonly>Mới tạo</option>
                    </select>
                </div>
                <div class="form-group col-md-2 ml-5">
                    <label for="nhanvien">Nhân viên</label>
                    <select class="form-control" name="nhanvien" id="nhanvien">
                        <option value="">Chọn nhân viên</option>
                        <?php foreach ($listNV as $item) : ?>
                            <option value="<?= htmlspecialchars($item->Id) ?>"><?= htmlspecialchars($item->TaiKhoan) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </fieldset>
        <fieldset style="border-collapse: collapse; border: 1px solid red" class="mt-5 ml-5 mr-5">
            <legend class="ml-2">Chi tiết đơn</legend>
            <div class="form-row ml-4">
                <div class="col-md-4 form-group mb-3">
                    <label for="sp_ma">Sản Phẩm</label>
                    <select class="form-control" id="sp_ma" name="sp_ma[]">
                        <optgroup label="Chọn sản phẩm">
                            <?php foreach ($listSP as $item) : ?>
                                <option value="<?= htmlspecialchars($item->Id) ?>" data-sp_gia="<?= htmlspecialchars($item->GiaBan) ?>"><?= htmlspecialchars($item->TenSP) ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    </select>
                </div>
                <div class="col-md-3 form-group mb-3">
                    <label for="soluong">Số lượng</label>
                    <input type="number" class="form-control" value="1" id="soluong" name="soluong[]" placeholder="Số lượng">
                </div>
                <div class="col-md-1 form-group mb-3">
                    <label for="btnThemSanPham">Action</label>
                    <input type="button" class="form-control btn btn-outline-primary" id="btnThemSanPham" value="Thêm">
                </div>
            </div>

            <table id="tblChiTietDonHang" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows will be added dynamically -->
                </tbody>
            </table>
        </fieldset>
        <!-- Nút xóa -->
        <input type="hidden" name="delete_row" id="delete_row" value="">
        <button type="submit" name="add" class="mt-2 ml-5 btn btn-danger">Tạo</button>
</form>

<script>
    // Logic thêm sản phẩm vào bảng chi tiết
    document.getElementById('btnThemSanPham').addEventListener('click', function() {
        // Lấy thông tin sản phẩm đã chọn
        var spSelect = document.getElementById('sp_ma');
        var selectedOption = spSelect.options[spSelect.selectedIndex];

        var spMa = selectedOption.value;
        var spTen = selectedOption.text;
        var spGia = selectedOption.getAttribute('data-sp_gia');
        var spSoLuong = document.getElementById('soluong').value;

        // Tính thành tiền
        var thanhTien = spGia * spSoLuong;

        // Thêm dòng sản phẩm vào bảng chi tiết đơn hàng
        var tableBody = document.getElementById('tblChiTietDonHang').getElementsByTagName('tbody')[0];
        var newRow = tableBody.insertRow();

        var cellTenSP = newRow.insertCell(0);
        var cellSoLuong = newRow.insertCell(1);
        var cellDongia = newRow.insertCell(2);
        var cellThanhTien = newRow.insertCell(3);
        var cellHanhDong = newRow.insertCell(4);

        cellTenSP.innerHTML = '<input type="hidden" name="sp_ma[]" value="' + spMa + '">' + spTen;
        cellSoLuong.innerHTML = '<input type="hidden" name="soluong[]" value="' + spSoLuong + '">' + spSoLuong;
        cellDongia.innerHTML = spGia;
        cellThanhTien.innerHTML = thanhTien;
        cellHanhDong.innerHTML = '<input type="button" class="btn btn-outline-danger btnXoaSanPham" value="Xóa">';
    });

    document.getElementById('tblChiTietDonHang').addEventListener('click', function(e) {
        if (e.target.classList.contains('btnXoaSanPham')) {
            // Xóa dòng sản phẩm khỏi bảng chi tiết đơn hàng
            e.target.parentElement.parentElement.remove();
        }
    });
</script>
<?php
if (isset($_POST['add'])) {
    $arr_sp_ma = $_POST['sp_ma'];
    $arr_sp_dh_soluong = $_POST['soluong'];

    $arr_sp_dh_soluong = array_map('intval', $arr_sp_dh_soluong);

    $arr_sp_dh_dongia = array_map(function ($spId) use ($listSP) {
        foreach ($listSP as $item) {
            if ($item->Id == $spId) {
                return (float)$item->GiaBan;
            }
        }
        return 0;
    }, $arr_sp_ma);

    $arr_sp_dh_tong = [];
    $tongdon = 0.0;

    for ($i = 0; $i < count($arr_sp_ma); $i++) {
        $arr_sp_dh_tong[$i] = $arr_sp_dh_soluong[$i] * $arr_sp_dh_dongia[$i];
        $tongdon += $arr_sp_dh_tong[$i];
    }

    $khachhang = $_POST['khachhang'];
    $nhanvien = $_POST['nhanvien'];
    $trangthai = $_POST['trangthai'];
    $ngayban = $_POST['ngayban'];

    $IdDon = DuAn::add($ngayban, $nhanvien, $khachhang, $tongdon, $trangthai);

    for ($i = 0; $i < count($arr_sp_ma); $i++) {
        $sp_ma = $arr_sp_ma[$i];
        $sp_dh_dongia = $arr_sp_dh_dongia[$i];
        $sp_dh_soluong = $arr_sp_dh_soluong[$i];
        $thanhtien = $arr_sp_dh_tong[$i];

        ChitietDuAn::add($IdDon,$sp_ma, $sp_dh_ma, $sp_dh_dongia, $sp_dh_soluong, $thanhtien);
        SanPham::updatesl($sp_ma, $sp_dh_soluong);
    }

    header('Location: index.php?controller=duan');
}