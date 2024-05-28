<?php
require_once('models/nhomtb.php');
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-center text-gray-800">Nhóm Thiết Bị</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách Nhóm Thiết Bị</h6>
    </div>

    <div class="card-body">
        <a href="index.php?controller=nhomtb&action=insert" class="btn btn-primary mb-3">Thêm</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Nhóm</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên Nhóm</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($nhomtb as $item) {
                    ?>
                        <form method="post">
                            <tr>
                                <td><?= $item->Id ?></td>
                                <td><?= $item->TenNhom ?></td>
                                <td>
                                    <a href="index.php?controller=nhomtb&action=edit&id=<?= $item->Id ?>" class='btn btn-primary mr-3'>Edit</a>
                                    <button type="submit" name="dele" value="<?= $item->Id ?>" class='btn btn-danger'>Delete</button>
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
    NhomTB::delete($id);
}
?>