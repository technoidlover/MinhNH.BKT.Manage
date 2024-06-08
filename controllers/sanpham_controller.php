<?php
require_once ('controllers/base_controller.php');
require_once ('models/sanpham.php');

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
            'IdNTB' => isset($_GET['IdNTB']) ? $_GET['IdNTB'] : ''
        ];

       // Kiểm tra xem có tham số lọc được gửi lên hay không
        if (!empty(array_filter($filters))) {
            // Nếu có, gọi hàm allFiltered để lấy sản phẩm đã lọc
            $sanpham = SanPham::allFiltered($filters, $sort_by, $order);
        } else {
            // Nếu không, gọi hàm all để lấy tất cả sản phẩm
            $sanpham = SanPham::all($sort_by, $order);
        }

        // Lấy danh sách cho các dropdown
        $donViTinhs = SanPham::getDonViTinhs();
        $nhaCungCaps = SanPham::getNhaCungCaps();
        $hangSXs = SanPham::getHangSXs();
        $nhomThietBis = SanPham::getNhomThietBis();

        $data = array(
            'sanpham' => $sanpham,
            'order' => $order,
            'filters' => $filters,
            'donViTinhs' => $donViTinhs,
            'nhaCungCaps' => $nhaCungCaps,
            'hangSXs' => $hangSXs,
            'nhomThietBis' => $nhomThietBis
        );

        $this->render('index', $data);
    }

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
}
