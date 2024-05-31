<?php
// Kết nối tới cơ sở dữ liệu
$servername = "localhost"; // Địa chỉ máy chủ MySQL
$username = "root"; // Tên đăng nhập MySQL
$password = ""; // Mật khẩu MySQL
$dbname = "DB_quanlykho"; // Tên cơ sở dữ liệu
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy id dự án từ URL
$duan_id = $_GET['id'];

// Truy vấn thông tin dự án
$duan_sql = "SELECT * FROM duan WHERE Id = $duan_id";
$duan_result = $conn->query($duan_sql);
$duan = $duan_result->fetch_assoc();

// Truy vấn chi tiết dự án
$chitiet_sql = "
SELECT ct.Id, sp.MaSP, sp.TenSP, hsx.TenHang AS TenHSX, dvt.DonVi, ct.GiaMua, ct.GiaBan, ct.SoLuong, ct.ThanhTien 
FROM chitietduan ct 
JOIN sanpham sp ON ct.IdSP = sp.Id 
JOIN hangsx hsx ON sp.IdHSX = hsx.Id 
JOIN donvitinh dvt ON sp.IdDVT = dvt.Id 
WHERE ct.IdDuAn = $duan_id";

$chitiet_result = $conn->query($chitiet_sql);

// Kiểm tra và lấy dữ liệu chi tiết dự án
$list1 = [];
$tongThanhTien = 0;
if ($chitiet_result->num_rows > 0) {
    while ($item = $chitiet_result->fetch_assoc()) {
        $list1[] = $item;
        $tongThanhTien += $item['ThanhTien'];
    }
}

// Nếu bảng duan không có trường ThanhTien, hãy sử dụng $tongThanhTien thay thế
$duan['ThanhTien'] = $duan['ThanhTien'] ?? $tongThanhTien;

?>

<body class="A4">
    <section class="sheet padding-10mm" style="padding-left: 10px;padding-right: 10px">
        <table border="0" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <td align="center"><img src="Assets/img/logo.png" height="100px" /></td>
                    <td align="center">
                        <b style="font-size: 2em;">BKT - Giải Pháp Tương Lai</b><br />
                    </td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top: 50px"><i><u>Thông tin Đơn hàng</u></i></p>
        <table border="0" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <td width="30%">Khách hàng:</td>
                    <td><b><?=$duan['IdKH']?></b></td>
                </tr>
                <tr>
                    <td>Ngày lập:</td>
                    <td><b><?= date('d/m/Y H:i:s', strtotime($duan['NgayBan']))?></b></td>
                </tr>
                <tr>
                    <td>Nhân viên:</td>
                    <td><b><?=$duan['IdNV']?></b></td>
                </tr>
                <tr>
                    <td>Tổng thành tiền:</td>
                    <td><b><?=number_format($duan['ThanhTien'],0,",",".") ?> VNĐ</b></td>
                </tr>
                <tr>
                    <td>Trạng Thái:</td>
                    <td><b>
                        <?php
                        if ($duan['TrangThai']=="1")
                            echo "Đã Thanh Toán";
                        else
                            echo "Chưa thanh toán";
                        ?>
                    </b></td>
                </tr>
            </tbody>
        </table>

        <p><i><u>Chi tiết đơn hàng</u></i></p>
        <table border="1" width="100%" cellspacing="0" cellpadding="5">
            <thead>
                <tr style="text-align: center">
                    <th>STT</th>
                    <th>Hạng mục</th>
                    <th>Mã sản phẩm</th>
                    <th>Hãng sản xuất</th>
                    <th>ĐVT</th>
                    <th>Số lượng</th>
                    <th>Giá bán</th>
                    <th>Thành tiền</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $dem=1;
                foreach ($list1 as $item) {
                ?>
                <tr>
                    <td align="center"><?=$dem?></td>
                    <td align="center"><?=$item['TenSP']?></td>
                    <td align="center"><?=$item['MaSP']?></td>
                    <td align="center"><?=$item['TenHSX']?></td>
                    <td align="center"><?=$item['DonVi']?></td>
                    <td align="center"><?=$item['SoLuong']?></td>
                    <td align="right"><?=number_format($item['GiaBan'],0,",",".")?> VNĐ</td>
                    <td align="right"><?=number_format($item['ThanhTien'],0,",",".")?> VNĐ</td>
                </tr>
                <?php
                    $dem++;
                }
                ?>
                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" align="right"><b>Tổng thành tiền</b></td>
                    <td align="right"><b><?=number_format($duan['ThanhTien'],0,",",".") ?> VNĐ</b></td>
                </tr>
                <tr>
                    <td colspan="7" align="right"><b>Tải xuống excel</b></td>
                    <td align="right"><b><a href="/bkt2/Assets/excel/baogia_<?=$duan_id?>.xlsx"><button>Tải xuống</button></a></b></td>
                </tr>
            </tfoot>
        </table>

        <br/>
        <table border="0" width="100%">
            <tbody>
                <tr>
                    <td align="center">
                        <small>Xin cám ơn Quý khách đã ủng hộ công ty, Chúc Quý khách An Khang, Thịnh Vượng!</small>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</body>
<?php
                    $templatePath = 'Assets/Template1.xlsx';
                    $row = 14;
                    $spreadsheet = IOFactory::load($templatePath);
                    $sheet = $spreadsheet->getActiveSheet();
                    $numEmptyRows = $chitiet_result->num_rows;                    
                    foreach ($list1 as $index => $item) {
                        $sheet->insertNewRowBefore($row+1);
                        $sheet->setCellValue('A' . $row, $row - 13); // STT, -13 vì bắt đầu từ 14 nên số thứ tự là hàng hiện tại - 13
                        $sheet->setCellValue('B' . $row, $item['TenSP']);      // Hạng mục
                        $sheet->setCellValue('C' . $row, $item['MaSP']);       // Mã sản phẩm
                        $sheet->setCellValue('D' . $row, $item['TenHSX']);     // Hãng sản xuất
                        $sheet->setCellValue('E' . $row, $item['DonVi']);      // ĐVT
                        $sheet->setCellValue('F' . $row, $item['SoLuong']);    // Số lượng
                        $sheet->setCellValue('G' . $row, $item['GiaBan']);     // Giá bán
                        $sheet->setCellValue('H' . $row, $item['ThanhTien']);  // Thành tiền
                        $row++; // Tiếp tục sang dòng mới
                        
                    }
                    
                    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                    //filename sẽ là "baogia_id.xlsx" và lưu vào thư mục "Assets"
                    $outputFile = 'Assets/excel/baogia_'.$duan_id.'.xlsx';
                    // $writer->save('Assets/excel/baogia_'.$duan_id.'.xlsx');                     
                    $writer->save($outputFile);

                ?>                
<?php
// Đóng kết nối
$conn->close();
?>
