
<?php
require_once('controllers/base_controller.php');
require_once('models/duan.php');
class duanController extends BaseController
{
    function  __construct()
    {
        $this->folder = 'duan';
    }
    public function  index()
    {
        $duan = duan::all();
        $data = array('duan' => $duan);
        $this->render('index', $data);
    }
    public function  insert()
    {
        $this->render('insert');
    }
    public function  show()
    {
        $duan = duan::find($_GET['id']);
        $data = array('duan' => $duan);
        $this->render('show', $data);
    }
    public function  print()
    {
        $duan = duan::find($_GET['id']);
        $data = array('duan' => $duan);
        $this->render('print', $data);
    }
}
