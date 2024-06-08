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
        <form method="GET" action="index.php">
            <input type="hidden" name="controller" value="sanpham">
            <input type="hidden" name="action" value="index">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="MaSP">Mã SP</label>
                    <input type="text" class="form-control" id="MaSP" name="MaSP" value="<?= isset($filters['MaSP']) ? $filters['MaSP'] : '' ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="TenSP">Tên SP</label>
                    <input type="text" class="form-control" id="TenSP" name="TenSP" value="<?= isset($filters['TenSP']) ? $filters['TenSP'] : '' ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="IdDVT">Đơn vị</label>
                    <select class="form-control" id="IdDVT" name="IdDVT">
                        <option value="">Tất cả</option>
                        <?php foreach ($donViTinhs as $dvt) : ?>
                            <option value="<?= $dvt->Id ?>" <?= (isset($filters['IdDVT']) && $filters['IdDVT'] == $dvt->Id) ? 'selected' : '' ?>><?= $dvt->DonVi ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="IdNCC">Nhà cung cấp</label>
                    <select class="form-control" id="IdNCC" name="IdNCC">
                        <option value="">Tất cả</option>
                        <?php foreach ($nhaCungCaps as $ncc) : ?>
                            <option value="<?= $ncc->Id ?>" <?= (isset($filters['IdNCC']) && $filters['IdNCC'] == $ncc->Id) ? 'selected' : '' ?>><?= $ncc->TenNCC ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="GiaMua">Giá mua</label>
                    <input type="text" class="form-control" id="GiaMua" name="GiaMua" value="<?= isset($filters['GiaMua']) ? $filters['GiaMua'] : '' ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="GiaBan">Giá bán</label>
                    <input type="text" class="form-control" id="GiaBan" name="GiaBan" value="<?= isset($filters['GiaBan']) ? $filters['GiaBan'] : '' ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="SoLuong">Số lượng</label>
                    <input type="text" class="form-control" id="SoLuong" name="SoLuong" value="<?= isset($filters['SoLuong']) ? $filters['SoLuong'] : '' ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="IdHSX">Hãng SX</label>
                    <select class="form-control" id="IdHSX" name="IdHSX">
                        <option value="">Tất cả</option>
                        <?php foreach ($hangSXs as $hsx) : ?>
                            <option value="<?= $hsx->Id ?>" <?= (isset($filters['IdHSX']) && $filters['IdHSX'] == $hsx->Id) ? 'selected' : '' ?>><?= $hsx->TenHang ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="XuatXu">Xuất xứ</label>
                    <input type="text" class="form-control" id="XuatXu" name="XuatXu" value="<?= isset($filters['XuatXu']) ? $filters['XuatXu'] : '' ?>">
                </div>
                <div class="form-group col-md-2">
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
if (isset($_POST['dele'])) {
    $id = $_POST['dele'];
    SanPham::delete($id);
    header('Location: index.php?controller=sanpham&action=index');
    exit();var_dump($item); // To see the fetched item details

}
?>