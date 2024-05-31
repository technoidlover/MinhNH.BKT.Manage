<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$templatePath = 'Assets/Template1.xlsx';

$spreadsheet = IOFactory::load($templatePath);
$sheet = $spreadsheet->getActiveSheet();

// Điền thông tin đơn hàng vào các cột A đến J từ dòng 14 trở đi
$row = 14; // Bắt đầu từ dòng 14

// Ví dụ điền thông tin cơ bản của đơn hàng
$sheet->setCellValue('A' . $row, $duan['IdKH']);
$sheet->setCellValue('B' . $row, date('d/m/Y H:i:s', strtotime($duan['NgayBan'])));
// ... điền tiếp các thông tin khác vào các cột C, D, E, ... nếu cần

// Tăng số dòng để chèn chi tiết đơn hàng
$row++;

// Chèn chi tiết đơn hàng từ mảng list1
foreach ($list1 as $index => $item) {
    $sheet->setCellValue('A' . $row, $row - 13); // STT, -13 vì bắt đầu từ 14 nên số thứ tự là hàng hiện tại - 13
    $sheet->setCellValue('B' . $row, $item['TenSP']);      // Hạng mục
    $sheet->setCellValue('C' . $row, $item['MaSP']);       // Mã sản phẩm
    $sheet->setCellValue('D' . $row, $item['TenHSX']);     // Hãng sản xuất
    $sheet->setCellValue('E' . $row, $item['DonVi']);      // ĐVT
    $sheet->setCellValue('F' . $row, $item['SoLuong']);    // Số lượng
    $sheet->setCellValue('G' . $row, $item['GiaBan']);     // Giá bán
    $sheet->setCellValue('H' . $row, $item['ThanhTien']);  // Thành tiền
    // .... Điền thêm dữ liệu vào các cột I, J nếu cần
    $row++; // Tiếp tục sang dòng mới
}

// Lưu file
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$outputFile = 'path/to/output_file.xlsx';
$writer->save($outputFile);

// Thông báo hoàn thành
echo 'Đã xuất dữ liệu ra Excel.';

$conn->close();
?>