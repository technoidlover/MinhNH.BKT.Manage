<?php
require_once ('controllers/base_controller.php');
require_once ('models/nhanvien.php');

class NhanVienController extends BaseController
{
    function __construct()
    {
        $this->folder='nhanvien';
    }
    
    public function index()
    {
        if($_SESSION['quyen'] != 'Admin' && $_SESSION['quyen'] != 'Manage') {
            header('location:permisson.php');
        } else {
            $nhanvien = NhanVien::all();
            $data = array('nhanvien' => $nhanvien);
            $this->render('index', $data);
        }
    }

    public function insert()
    {
        if($_SESSION['quyen'] != 'Admin' && $_SESSION['quyen'] != 'Manage') {
            header('location:permisson.php');
        } else {
            $this->render('insert');
        }
    }

    public function edit()
    {
        if($_SESSION['quyen'] != 'Admin' && $_SESSION['quyen'] != 'Manage') {
            header('location:permisson.php');
        } else {
            $nhanvien = NhanVien::find($_GET['id']);
            $data = array('nhanvien' => $nhanvien);
            $this->render('edit', $data);
        }
    }
}