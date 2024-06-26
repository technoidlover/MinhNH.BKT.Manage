<?php
require_once('models/nhacungcap.php');
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-center text-gray-800 ">Nhà Cung Cấp</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách Nhà cung cấp</h6>
    </div>

    <div class="card-body">
        <a href="index.php?controller=nhacungcap&action=insert" class="btn btn-primary mb-3">Thêm</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nhà cung cấp</th>
                        <th>Người liên hệ</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>MST</th> <!-- Đã thêm cột MST -->
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nhà cung cấp</th>
                        <th>Người liên hệ</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>MST</th> <!-- Đã thêm cột MST -->
                        <th>Hành động</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    foreach ($nhacungcap as $item) {
                    ?>
                        <form method="post">
                            <tr>
                                <td><?= $item->Id ?></td>
                                <td><?= $item->TenNCC ?></td>
                                <td><?= $item->NguoiLienHe ?></td>
                                <td><?= $item->DienThoai ?></td>
                                <td><?= $item->Email ?></td>
                                <td><?= $item->DiaChi ?></td>
                                <td><?= $item->MST ?></td> <!-- Hiển thị MST -->
                                <td>
                                    <a href="index.php?controller=nhacungcap&action=edit&id=<?= $item->Id ?>" class='btn btn-primary mr-3'>Sửa</a>
                                    <button type="submit" name="dele" value="<?= $item->Id ?>" class='btn btn-danger'>Xóa</button>
                                </td>
                            </tr>
                        </form>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
if (isset($_POST['dele'])) {
    $id = $_POST['dele'];
    NhaCungCap::delete($id);
}
?>