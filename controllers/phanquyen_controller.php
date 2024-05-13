<?php
require_once ('controllers/base_controller.php');
require_once ('models/phanquyen.php');

class PhanQuyenController extends BaseController
{
    function __construct()
    {

        $this->folder='phanquyen';
    }
    public function index()
    {
        if($_SESSION['quyen']!='admin' && $_SESSION['quyen']!='manage') {
            header('location:permisson.php');
        }
        else {
            $phanquyen = PhanQuyen::all();
            $data =array('phanquyen'=>$phanquyen);
            $this->render('index',$data);
        }

    }
    public function insert()
    {
        if($_SESSION['quyen']!='admin' && $_SESSION['quyen']!='manage') {
            header('location:permisson.php');
        }

        {
            $this->render('insert');
        }
    }
    public function edit()
    {
        if($_SESSION['quyen']!='admin' && $_SESSION['quyen']!='manage') {
            ;
            header('location:permisson.php');
        }
        else {
        $phanquyen = PhanQuyen::find($_GET['id']);
        $data5 =array('phanquyen'=>$phanquyen); // Change 'quyen' to 'phanquyen' because $phanquyen is the instance of class PhanQuyen
        $this->render('edit', $data5);
        }
    }
}