<?php
require_once('controllers/base_controller.php');
require_once('models/nhomtb.php');

class NhomTBController extends BaseController
{
    function __construct()
    {
        $this->folder = 'nhomtb'; // Thư mục nơi chứa các view của NhomTB
    }

    public function index()
    {
        $nhomtbs = NhomTB::all(); // Lấy tất cả các nhóm thiết bị
        $data = array('nhomtb' => $nhomtbs); // Đặt dữ liệu vào mảng
        $this->render('index', $data); // Truyền dữ liệu vào view
    }

    public function insert()
    {
        $this->render('insert'); // Hiển thị trang thêm nhóm thiết bị mới
    }

    public function edit()
    {
        $nhomtb = NhomTB::find($_GET['id']); // Tìm nhóm thiết bị theo ID
        $data = array('nhomtb' => $nhomtb); // Đặt dữ liệu vào mảng
        $this->render('edit', $data); // Truyền dữ liệu vào view
    }
}