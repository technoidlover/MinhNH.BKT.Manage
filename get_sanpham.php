<?php
require_once('connection.php');
require_once('models/sanpham.php');

if (isset($_GET['ntbId'])) {
    $ntbId = $_GET['ntbId'];
    $filters = ['IdNTB' => $ntbId];
    $sanphams = SanPham::allFiltered($filters, 'TenSP', 'ASC');

    // Trả về kết quả dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($sanphams);
} else {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Thiếu giá trị IdNTB']);
}
?>