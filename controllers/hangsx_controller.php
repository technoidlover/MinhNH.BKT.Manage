<?php
require_once('controllers/base_controller.php');
require_once('models/hangsx.php');

class HangSXController extends BaseController
{
    function __construct()
    {
        $this->folder = 'hangsx'; // Thư mục nơi chứa các view của HangSX
    }

    public function index()
    {
        $hangsxs = HangSX::all(); // Lấy tất cả các hãng sản xuất
        $data = array('hangsx' => $hangsxs); // Đặt dữ liệu vào mảng
        $this->render('index', $data); // Truyền dữ liệu vào view
    }

    public function insert()
    {
        $this->render('insert'); // Hiển thị trang thêm hãng sản xuất mới
    }

    public function edit()
    {
        $hangsx = HangSX::find($_GET['id']); // Tìm hãng sản xuất theo ID
        $data = array('hangsx' => $hangsx); // Đặt dữ liệu vào mảng
        $this->render('edit', $data); // Truyền dữ liệu vào view
    }
}