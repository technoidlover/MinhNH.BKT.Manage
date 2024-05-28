<?php
require_once('models/sanpham.php');
$sanpham = SanPham::all(); // Giả đzịnh là bạn đã lấy danh sách sản phẩm thành công
?>

<h1 class="h3 mb-2 text-center text-gray-800">Sản Phẩm</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách Sản Phẩm</h6>
    </div>

    <div class="card-body">
        <a href="index.php?controller=sanpham&action=insert" class="btn btn-primary mb-3">Thêm</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã SP</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn vị</th>
                        <th>Nhà cung cấp</th>
                        <th>Giá mua</th>
                        <th>Giá bán</th>
                        <th>Số lượng</th>
                        <th>Hãng SX</th>
                        <th>Xuất xứ</th>
                        <th>Nhóm TB</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Mã SP</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn vị</th>
                        <th>Nhà cung cấp</th>
                        <th>Giá mua</th>
                        <th>Giá bán</th>
                        <th>Số lượng</th>
                        <th>Hãng SX</th>
                        <th>Xuất xứ</th>
                        <th>Nhóm TB</th>
                        <th>Thao tác</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($sanpham as $item) : ?>
                        <form method="post">
                            <tr>
                                <td><?= $item->Id ?></td>
                                <td><?= $item->MaSP ?></td>
                                <td><?= $item->TenSP ?></td>
                                <td><?= $item->TenDVT ?></td>
                                <td><?= $item->TenNCC ?></td>
                                <td><?= number_format($item->GiaMua, 0, ".", ",") ?></td>
                                <td><?= number_format($item->GiaBan, 0, ".", ",") ?></td>
                                <td><?= $item->SoLuong ?></td>
                                <td><?= $item->TenHSX ?></td>
                                <td><?= $item->XuatXu ?></td>
                                <td><?= $item->TenNTB ?></td>
                                <td>
                                    <a href="index.php?controller=sanpham&action=view&id=<?= $item->Id ?>" class="btn btn-primary mr-3">Chi tiết</a>
                                    <a href="index.php?controller=sanpham&action=edit&id=<?= $item->Id ?>" class="btn btn-primary mr-3">Sửa</a>
                                    <button type="submit" name="dele" value="<?= $item->Id ?>" class="btn btn-danger">Xóa</button>
                                </td>
                            </tr>
                        </form>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
if (isset($_POST['dele'])) {
    $id = $_POST['dele'];
    SanPham::delete($id);
    header('Location: index.php?controller=sanpham&action=index');
    exit();var_dump($item); // To see the fetched item details

}
?>