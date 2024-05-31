<?php
require_once('controllers/base_controller.php');
require_once('models/duan.php');
require_once('models/chitietduan.php');

class duanController extends BaseController
{
    function __construct()
    {
        $this->folder = 'duan';
    }

    public function index()
    {
        $duan = DuAn::all();
        $data = array('duan' => $duan);
        $this->render('index', $data);
    }

    public function insert()
    {
        $this->render('insert');
    }

    public function show()
    {
        $duanId = $_GET['id'];
        $duan = DuAn::find($duanId);
        $listChiTietDuan = chitietduan::find($duanId);

        if ($duan) {
            $data = array(
                'DuAn' => $duan,
                'chitietduan' => $listChiTietDuan
            );
        } else {
            $data = array('error' => 'Không tìm thấy dự án.');
        }

        $this->render('show', $data);
    }

    public function print()
    {
        $duanId = $_GET['id'];
        $duan = DuAn::find($duanId);
        $data = array('duan' => $duan);
        $this->render('print', $data);
    }

    public function create()
    {
        if (isset($_POST['ngayban']) && isset($_POST['idnv']) && isset($_POST['idkh']) && isset($_POST['tong']) && isset($_POST['trangthai'])) {
            $duanId = DuAn::add($_POST['ngayban'], $_POST['idnv'], $_POST['idkh'], $_POST['tong'], $_POST['trangthai']);
            // Xử lý chèn chi tiết dự án nếu có trong form
            if (isset($_POST['chitiet_sp']) && is_array($_POST['chitiet_sp'])) {
                foreach ($_POST['chitiet_sp'] as $ct) {
                    chitietduan::add(
                        $duanId,
                        $ct['IdSP'],
                        $ct['GiaMua'],
                        $ct['GiaBan'],
                        $ct['SoLuong'],
                        $ct['ThanhTien']
                    );
                }
            }
            header('Location: index.php?controller=duan&action=index');
        }
    }
}
?>