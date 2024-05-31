
<?php
require_once('controllers/base_controller.php');
require_once('models/chitietduan.php');
class chitietduanController extends BaseController
{
    function  __construct()
    {
        $this->folder = 'chitietduan';
    }
    public function  index()
    {
        $ctb = chitietduan::all();
        $data = array('ctb' => $ctb);
        $this->render('index', $data);
    }
    public function  insert()
    {
        $this->render('insert');
    }
    public function edit()
    {
        $duan = duan::find($_GET['id']);
        $data = array('duan' => $duan);
        $this->render('edit', $data);
    }
}
