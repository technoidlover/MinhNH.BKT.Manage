<?php
require_once('controllers/base_controller.php');

class HomeController extends BaseController
{
    function __construct()
    {
        // Đặt thư mục chứa các view của HomeController
        $this->folder = 'home'; 
    }

    public function index()
    {
        $data = []; // Dữ liệu truyền vào view, nếu cần
        $this->render('index', $data); // Gọi phương thức render từ BaseController
    }
}
?>