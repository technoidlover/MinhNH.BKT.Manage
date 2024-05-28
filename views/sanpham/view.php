<?php
require_once('models/sanpham.php');
require_once('models/donvitinh.php');
require_once('models/nhacungcap.php');
require_once('models/hangsx.php');
require_once('models/nhomtb.php');

// Lấy sản phẩm theo ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sanpham = SanPham::find($id);

    if (!$sanpham) {
        echo "Sản phẩm không tồn tại.";
        exit;
    }
} else {
    echo "Chưa có ID sản phẩm trong yêu cầu.";
    exit;
}

// Lấy dữ liệu cho select Đơn vị tính
$listDVT = DonViTinh::all();

// Lấy dữ liệu cho select Nhà cung cấp
$listNCC = NhaCungCap::all();

// Lấy dữ liệu cho select Hãng sản xuất
$listHSX = HangSX::all();

// Lấy dữ liệu cho select Nhóm thiết bị
$listNTB = NhomTB::all();
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
                        foreach ($listDVT as $item) {
                            if ($sanpham->IdDVT == $item->Id) {
                                echo $item->DonVi;
                                break;
                            }
                        }
                        ?>
                    </p>
                    <p class="card-text"><strong>Nhà Cung Cấp: </strong>
                        <?php
                        foreach ($listNCC as $item) {
                            if ($sanpham->IdNCC == $item->Id) {
                                echo $item->TenNCC;
                                break;
                            }
                        }
                        ?>
                    </p>
                    <p class="card-text"><strong>Giá Mua: </strong><?= number_format($sanpham->GiaMua, 0, ".", ",") ?> VND</p>
                    <p class="card-text"><strong>Giá Bán: </strong><?= number_format($sanpham->GiaBan, 0, ".", ",") ?> VND</p>
                    <p class="card-text"><strong>Số Lượng: </strong><?= $sanpham->SoLuong ?></p>
                    <p class="card-text"><strong>Hãng Sản Xuất: </strong>
                        <?php
                        foreach ($listHSX as $item) {
                            if ($sanpham->IdHSX == $item->Id) {
                                echo $item->TenHang;
                                break;
                            }
                        }
                        ?>
                    </p>
                    <p class="card-text"><strong>Xuất Xứ: </strong><?= $sanpham->XuatXu ?></p>
                    <p class="card-text"><strong>Mã Sản Phẩm: </strong><?= $sanpham->MaSP ?></p>
                    <p class="card-text"><strong>Nhóm Thiết Bị: </strong>
                        <?php
                        foreach ($listNTB as $item) {
                            if ($sanpham->IdNTB == $item->Id) {
                                echo $item->TenNhom;
                                break;
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-primary mt-3" href="index.php?controller=sanpham&action=index">Quay lại danh sách</a>
</div>