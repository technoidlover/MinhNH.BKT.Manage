<?php
require_once('controllers/base_controller.php');
require_once('models/sanpham.php');

class SanPhamController extends BaseController
{
    function __construct()
    {
        $this->folder = 'sanpham';
    }

    public function index()
    {
        $sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'Id';
        $order = isset($_GET['order']) && $_GET['order'] == 'desc' ? 'desc' : 'asc';

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

        try {
            $sanpham = SanPham::allFiltered($filters, $sort_by, $order);
            $donViTinhs = SanPham::getDonViTinhs();
            $nhaCungCaps = SanPham::getNhaCungCaps();
            $hangSXs = SanPham::getHangSXs();
            $nhomThietBis = SanPham::getNhomThietBis();
            

        } catch (Exception $e) {
            error_log('Error fetching data: ' . $e->getMessage());
            $this->render('index', ['error' => 'Error fetching data. Please contact the administrator.']);
            return;
        }

        $data = [
            'sanpham' => $sanpham,
            'order' => $order,
            'sort_by' => $sort_by,
            'filters' => $filters,
            'donViTinhs' => $donViTinhs,
            'nhaCungCaps' => $nhaCungCaps,
            'hangSXs' => $hangSXs,
            'nhomThietBis' => $nhomThietBis,
            
        ];

        $this->render('index', $data);
    }

    // Other methods remain the same

    public function insert()
    {
        $this->render('insert');
    }

    public function edit()
    {
        $sanpham = SanPham::find($_GET['id']);
        $data = array('sanpham' => $sanpham);
        $this->render('edit', $data);
    }

    public function view()
    {
        $sanpham = SanPham::find($_GET['id']);
        $data = array('sanpham' => $sanpham);
        $this->render('view', $data);
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            try {
                if (SanPham::delete($id)) {
                    header('Location: index.php?controller=sanpham&action=index');
                    exit();
                } else {
                    $this->render('index', ['error' => 'Error deleting the product.']);
                }
            } catch (Exception $e) {
                error_log('Error deleting the product with ID: ' . $id . '. Error message: ' . $e->getMessage());
                $this->render('index', ['error' => 'Error deleting the product. Please contact the administrator.']);
            }
        } else {
            error_log('No product ID provided for deletion.');
            $this->render('index', ['error' => 'No product ID provided for deletion.']);
        }
    }
}
