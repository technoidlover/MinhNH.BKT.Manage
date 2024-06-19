<h1 class="h3 mb-2 text-center text-gray-800">Sản Phẩm</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách Sản Phẩm</h6>
    </div>

    <div class="card-body">
        <a href="index.php?controller=sanpham&action=insert" class="btn btn-primary mb-3">Thêm</a>

        <form action="index.php" method="get" class="mb-3">
            <input type="hidden" name="controller" value="sanpham">
            <input type="hidden" name="action" value="index">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="IdNTB">Nhóm SP</label>
                    <select class="form-control" id="IdNTB" name="IdNTB">
                        <option value="">Tất cả</option>
                        <?php foreach ($nhomThietBis as $ntb) : ?>
                            <option value="<?= $ntb->Id ?>" <?= (isset($filters['IdNTB']) && $filters['IdNTB'] == $ntb->Id) ? 'selected' : '' ?>><?= $ntb->TenNhom ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-2 align-self-end">
                    <button type="submit" class="btn btn-primary">Lọc</button>
                </div>
            </div>
        </form>
        <!-- Product fint -->

        <!-- All Product -->
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th onclick="sortTable('Id')">Id</th>
                        <th onclick="sortTable('MaSP')">Mã SP</th>
                        <th onclick="sortTable('TenSP')">Tên SP</th>
                        <th onclick="sortTable('TenDVT')">Đơn vị</th>
                        <th onclick="sortTable('TenNCC')">Nhà cung cấp</th>
                        <th onclick="sortTable('GiaMua')">Giá mua</th>
                        <th onclick="sortTable('GiaBan')">Giá bán</th>
                        <th onclick="sortTable('SoLuong')">Số lượng</th>
                        <th onclick="sortTable('TenHSX')">Hãng SX</th>
                        <th onclick="sortTable('XuatXu')">Xuất xứ</th>
                        <th onclick="sortTable('TenNTB')">Nhóm SP</th>
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
                                <a href="index.php?controller=sanpham&action=delete&id=<?= $item->Id ?>" class="btn btn-danger btn-sm" name="dele">Xóa</a>
                            </td>
                        </tr>
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
    exit();
}
?>

<script>
    function sortTable(column) {
        const urlParams = new URLSearchParams(window.location.search);
        const currentSortBy = urlParams.get('sort_by');
        const currentOrder = urlParams.get('order');
        let newOrder = 'asc';

        if (currentSortBy === column && currentOrder === 'asc') {
            newOrder = 'desc';
        }

        urlParams.set('sort_by', column);
        urlParams.set('order', newOrder);
        window.location.search = urlParams.toString();
    }
</script>