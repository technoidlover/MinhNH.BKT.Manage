<?php
require_once('models/sanpham.php');

// Lấy các tham số từ URL
$filters = [
    'MaSP' => isset($_GET['MaSP']) ? $_GET['MaSP'] : '',
    'TenSP' => isset($_GET['TenSP']) ? $_GET['TenSP'] : '',
    'IdDVT' => isset($_GET['IdDVT']) ? $_GET['IdDVT'] : '',
    'IdNCC' => isset($_GET['IdNCC']) ? $_GET['IdNCC'] : '',
    'GiaMua' => isset($_GET['GiaMua']) ? $_GET['GiaMua'] : '',
    'GiaBan' => isset($_GET['GiaBan']) ? $_GET['GiaBan'] : '',
    'SoLuong' => isset($_GET['SoLuong']) ? $_GET['SoLuong'] : '',
    'IdHSX' => isset($_GET['IdHSX']) ? $_GET['IdHSX'] : '',
    'XuatXu' => isset($_GET['XuatXu']) ? $_GET['XuatXu'] : '',
    'IdNTB' => isset($_GET['IdNTB']) ? $_GET['IdNTB'] : '',
];

// Sắp xếp và thứ tự
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'Id';
$order = isset($_GET['order']) && $_GET['order'] == 'desc' ? 'desc' : 'asc';

$sanpham = SanPham::allFiltered($filters, $sort_by, $order);

// Lấy danh sách cho các dropdown (nếu cần)
$donViTinhs = SanPham::getDonViTinhs();
$nhaCungCaps = SanPham::getNhaCungCaps();
$hangSXs = SanPham::getHangSXs();
$nhomThietBis = SanPham::getNhomThietBis();

require_once('header.php'); // Giả sử bạn có một file header.php chứa phần đầu trang và menu
?>

<h1 class="h3 mb-2 text-center text-gray-800">Kết Quả Lọc Sản Phẩm</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách Sản Phẩm Đã Lọc</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Mã SP</th>
                        <th>Tên SP</th>
                        <th>Đơn vị</th>
                        <th>Nhà cung cấp</th>
                        <th>Giá mua</th>
                        <th>Giá bán</th>
                        <th>Số lượng</th>
                        <th>Hãng SX</th>
                        <th>Xuất xứ</th>
                        <th>Nhóm SP</th>
                        <th>Ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sanpham as $item) : ?>
                        <tr>
                            <td><?= $item->Id ?></td>
                            <td><?= $item->MaSP ?></td>
                            <td><?= $item->TenSP ?></td>
                            <td><?= $item->TenDVT ?></td>
                            <td><?= $item->TenNCC ?></td>
                            <td><?= $item->GiaMua ?></td>
                            <td><?= $item->GiaBan ?></td>
                            <td><?= $item->SoLuong ?></td>
                            <td><?= $item->TenHSX ?></td>
                            <td><?= $item->XuatXu ?></td>
                            <td><?= $item->TenNTB ?></td>
                            <td><img src="<?= $item->imgUrl ?>" alt="<?= $item->TenSP ?>" width="50"></td>
                            <td>
                                <a href="index.php?controller=sanpham&action=view&id=<?= $item->Id ?>" class="btn btn-primary mr-3">Chi tiết</a>
                                <a href="index.php?controller=sanpham&action=edit&id=<?= $item->Id ?>" class="btn btn-warning btn-sm">Sửa</a>
                                <a href="index.php?controller=sanpham&action=delete&id=<?= $item->Id ?>" class="btn btn-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once('footer.php'); // Giả sử bạn có một file footer.php chứa footer của trang
?>