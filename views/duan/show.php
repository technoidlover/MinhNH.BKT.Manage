<?php
require_once('models/chitietduan.php');
require_once('models/duan.php');

$duanId = $_GET['id'];
$duan = DuAn::find($duanId);

if ($duan) {
    $listChiTietDuan = chitietduan::find($duanId);
} else {
    $listChiTietDuan = [];
}

?>

<h1 class="h3 mb-2 text-center text-gray-800 ">Chi tiết đơn</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thông tin đơn</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ngày Bán</th>
                        <th>Nhân Viên</th>
                        <th>Khách Hàng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng Thái</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $duan->Id ?></td>
                        <td><?= date('d/m/Y H:i:s', strtotime($duan->NgayBan)) ?></td>
                        <td><?= $duan->IdNV ?></td>
                        <td><?= $duan->IdKH ?></td>
                        <td><?= number_format($duan->ThanhTien, 0, ",", ".") ?> VNĐ</td>
                        <td><?= $duan->TrangThai == "1" ? "Đã Thanh Toán" : "Chưa thanh toán" ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Chi Tiết Đơn</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản Phẩm</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 1;
                    foreach ($listChiTietDuan as $item) {
                        echo "<tr>";
                        echo "<td>{$stt}</td>";
                        echo "<td>{$item->IdSP}</td>";
                        echo "<td>" . number_format($item->GiaBan, 0, ",", ".") . " VNĐ</td>";
                        echo "<td>{$item->SoLuong}</td>";
                        echo "<td>" . number_format($item->ThanhTien, 0, ",", ".") . " VNĐ</td>";
                        echo "</tr>";
                        $stt++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <form method="post">
        <?php if ($duan->TrangThai == "1") { ?>
            <button type="submit" class="btn-outline-primary btn" disabled>Đã Thanh Toán</button>
            <button type="submit" class="btn-outline-primary btn" name="chua">Chưa Thanh Toán</button>
        <?php } else { ?>
            <button type="submit" class="btn-outline-primary btn" name="thanhtoan">Đã Thanh Toán</button>
            <button type="submit" class="btn-outline-primary btn" disabled>Chưa Thanh Toán</button>
        <?php } ?>
    </form>
</div>

<?php
if (isset($_POST['chua'])) {
    DuAn::chuathanhtoan($duan->Id);
}
if (isset($_POST['thanhtoan'])) {
    DuAn::thanhtoan($duan->Id);
}
?>