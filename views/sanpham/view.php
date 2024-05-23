<?php
require_once('models/donvitinh.php');
require_once('models/nhacungcap.php');

// Lấy dữ liệu cho select Đơn vị tính
$list = [];
$db = DB::getInstance();
$reg = $db->query('select * from DonViTinh');
foreach ($reg->fetchAll() as $item) {
    $list[] = new DonViTinh($item['Id'], $item['DonVi']);
}
$data = array('donvi' => $list);

//end dvt, lấy dữ liệu cho select Nhà cung cấp
$list1 = [];
$db1 = DB::getInstance();
$reg1 = $db1->query('select * from NhaCungCap');
foreach ($reg1->fetchAll() as $item) {
    $list1[] = new NhaCungCap($item['Id'], $item['TenNCC'], $item['DienThoai'], $item['Email'], $item['DiaChi'], $item['NguoiLienHe'], $item['MST']);
}
$data1 = array('nhacungcap' => $list1);
?>

<div class="container mt-5">
    <div class="card border-primary" style="max-width: 100%;">
        <div class="card-header text-center">
            <h3>Chi tiết sản phẩm</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= $sanpham->imgUrl ?>" alt="Product Image" class="img-fluid rounded">
                </div>
                <div class="col-md-8">
                    <h4 class="card-title"><?= $sanpham->TenSP ?></h4>
                    <p class="card-text"><strong>Đơn Vị Tính: </strong>
                        <?php
                        foreach ($list as $item) {
                            if ($sanpham->IdDVT == $item->Id) {
                                echo $item->DonVi;
                            }
                        }
                        ?>
                    </p>
                    <p class="card-text"><strong>Nhà Cung Cấp: </strong>
                        <?php
                        foreach ($list1 as $item) {
                            if ($sanpham->IdNCC == $item->Id) {
                                echo $item->TenNCC;
                            }
                        }
                        ?>
                    </p>
                    <p class="card-text"><strong>Giá Mua: </strong><?= number_format($sanpham->GiaMua, 0, ".", ",") ?> VND</p>
                    <p class="card-text"><strong>Giá Bán: </strong><?= number_format($sanpham->GiaBan, 0, ".", ",") ?> VND</p>
                    <p class="card-text"><strong>Số Lượng: </strong><?= $sanpham->SoLuong ?></p>
                    <p class="card-text"><strong>Hãng Sản Xuất: </strong><?= $sanpham->HangSX ?></p>
                    <p class="card-text"><strong>Xuất Xứ: </strong><?= $sanpham->XuatXu ?></p>
                    <p class="card-text"><strong>Mô Tả: </strong><?= $sanpham->MoTa ?></p>
                    <p class="card-text"><strong>Nhóm Thiết Bị: </strong><?= $sanpham->NhomTB ?></p>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-primary mt-3" href="index.php?controller=sanpham&action=index">Quay lại danh sách</a>
</div>