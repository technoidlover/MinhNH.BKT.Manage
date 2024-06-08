<?php
require_once('connection.php');
require_once('models/khachhang.php');
require_once('models/nhanvien.php');
require_once('models/sanpham.php');
require_once('models/duan.php');
require_once('models/chitietduan.php');

if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    header('location:login.php'); // Kiểm tra xem người dùng đã đăng nhập chưa
    exit();
}

$nhanvienId = $_SESSION['id']; // Lấy ID nhân viên từ session
$username = $_SESSION['username']; // Tên đăng nhập của nhân viên

// Get all necessary data
$listNV = NhanVien::all();
$listKH = KhachHang::all();
$listNTB = SanPham::getNhomThietBis();
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
                <div class="form-group col-md-4 ml-5" style="display:none;">
                    <label for="validationDefault02">Trạng thái</label>
                    <input type="text" class="form-control" value="0" readonly name="trangthai">
                </div>
                <div class="form-group col-md-2 ml-5">
                    <label for="validationDefault02">Nhân viên</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($username); ?>" readonly>
                    <input type="hidden" name="nhanvien" value="<?= htmlspecialchars($nhanvienId); ?>">
                </div>
            </div>
        </fieldset>
        <fieldset style="border-collapse: collapse; border: 1px solid red" class="mt-5 ml-5 mr-5">
            <legend class="ml-2">Chi tiết đơn</legend>
            <div class="form-row ml-4">
                            <!-- Dropdown chọn nhóm sản phẩm -->
            <div class="col-md-4 form-group mb-3">
                <label for="ntb_ma">Nhóm sản phẩm</label>
                <select class="form-control" id="ntb_ma" name="ntb_ma">
                    <optgroup label="Chọn nhóm sản phẩm">
                        <option value="">Chọn nhóm sản phẩm</option>
                        <?php foreach ($listNTB as $item) : ?>
                            <option value="<?= htmlspecialchars($item->Id) ?>"><?= htmlspecialchars($item->TenNhom) ?></option>
                        <?php endforeach; ?>
                    </optgroup>
                </select>
            </div>
            <!-- Dropdown chọn sản phẩm -->
            <div class="col-md-4 form-group mb-3">
                <label for="sp_ma">Sản Phẩm</label>
                <select class="form-control" id="sp_ma" name="sp_ma">
                    <optgroup label="Chọn sản phẩm">
                        <!-- Các sản phẩm sẽ được nạp động từ nhóm sản phẩm -->
                    </optgroup>
                </select>
            </div>
            <div class="col-md-3 form-group mb-3">
                <label for="soluong">Số lượng</label>
                <input type="number" class="form-control" value="1" id="soluong" name="soluong" placeholder="Số lượng">
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
    <button type="submit" name="add" class="mt-2 ml-5 btn btn-danger">Tạo</button>
</form>
<script>
    document.getElementById('ntb_ma').addEventListener('change', function() {
        var ntbId = this.value;
        var spSelect = document.getElementById('sp_ma');
        
        if (ntbId) {
            // Yêu cầu sản phẩm từ server
            fetch('get_sanpham.php?ntbId=' + ntbId)
                .then(response => response.json())
                .then(data => {
                    // Làm trống danh sách sản phẩm hiện tại
                    spSelect.innerHTML = '<optgroup label="Chọn sản phẩm"></optgroup>';
                    
                    // Thêm sản phẩm mới
                    data.forEach(function(sp) {
                        var option = document.createElement('option');
                        option.value = sp.Id;
                        option.text = sp.TenSP;
                        option.setAttribute('data-sp_gia', sp.GiaBan);
                        spSelect.appendChild(option);
                    });
                });
        } else {
            spSelect.innerHTML = '<optgroup label="Chọn sản phẩm"></optgroup>';
        }
    });

    // Logic thêm sản phẩm vào bảng chi tiết
    document.getElementById('btnThemSanPham').addEventListener('click', function() {
        var spSelect = document.getElementById('sp_ma');
        var selectedOption = spSelect.options[spSelect.selectedIndex];
        var spMa = selectedOption.value;
        var spTen = selectedOption.text;
        var spGia = selectedOption.getAttribute('data-sp_gia');
        var spSoLuong = document.getElementById('soluong').value;

        var thanhTien = spGia * spSoLuong;

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
            e.target.parentElement.parentElement.remove();
        }
    });
</script>
<?php
if (isset($_POST['add'])) {
    // Lấy các thông tin cần thiết từ form
    $arr_sp_ma = $_POST['sp_ma'];
    $arr_sp_dh_soluong = $_POST['soluong'];

    $arr_sp_dh_soluong = array_map('intval', $arr_sp_dh_soluong);

    // Tìm giá bán của từng sản phẩm
    $arr_sp_dh_dongia = array_map(function ($spId) use ($listSP) {
        foreach ($listSP as $item) {
            if ($item->Id == $spId) {
                return (float)$item->GiaBan;
            }
        }
        return 0;
    }, $arr_sp_ma);

    // Tính tổng cho từng sản phẩm
    $arr_sp_dh_tong = [];
    $tongdon = 0.0;
    for ($i = 0; $i < count($arr_sp_ma); $i++) {
        $arr_sp_dh_tong[$i] = $arr_sp_dh_soluong[$i] * $arr_sp_dh_dongia[$i];
        $tongdon += $arr_sp_dh_tong[$i];
    }

    // Lấy các thông tin khác từ form
    $khachhang = $_POST['khachhang'];
    $nhanvien = $_POST['nhanvien'];
    $trangthai = $_POST['trangthai'];
    $ngayban = $_POST['ngayban'];

    // Lưu dự án mới vào cơ sở dữ liệu
    $IdDon = DuAn::add($ngayban, $nhanvien, $khachhang, $tongdon, $trangthai);

    // Lưu chi tiết dự án vào cơ sở dữ liệu
    for ($i = 0; $i < count($arr_sp_ma); $i++) {
        $sp_ma = $arr_sp_ma[$i];
        $sp_dh_dongia = $arr_sp_dh_dongia[$i];
        $sp_dh_soluong = $arr_sp_dh_soluong[$i];
        $thanhtien = $arr_sp_dh_tong[$i];

        chitietduan::add($IdDon, $sp_ma, $sp_dh_dongia, $sp_dh_soluong, $thanhtien);
    }

    header('Location: index.php?controller=duan');
    exit; // Đảm bảo mã phía sau không được thực thi
}
?>
