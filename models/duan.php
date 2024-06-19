<?php
class DuAn
{
    public $Id;
    public $NgayBan;
    public $IdNV;
    public $IdKH;
    public $ThanhTien;
    public $TrangThai;
    public $ThongTin;

    function __construct($Id, $NgayBan, $IdNV, $IdKH, $ThanhTien, $TrangThai, $ThongTin)
    {
        $this->Id = $Id;
        $this->NgayBan = $NgayBan;
        $this->IdNV = $IdNV;
        $this->IdKH = $IdKH;
        $this->ThanhTien = $ThanhTien;
        $this->TrangThai = $TrangThai;
        $this->ThongTin = $ThongTin;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $reg = $db->query('SELECT db.Id, db.NgayBan, nv.TaiKhoan, kh.TenKH, db.Tong, db.TrangThai, db.ThongTin 
                           FROM DuAn db 
                           JOIN NhanVien nv ON nv.Id = db.IdNV 
                           JOIN KhachHang kh ON kh.Id = db.IdKH');
        foreach ($reg->fetchAll() as $item) {
            $list[] = new DuAn($item['Id'], $item['NgayBan'], $item['TaiKhoan'], $item['TenKH'], $item['Tong'], $item['TrangThai'], $item['ThongTin']);
        }
        return $list;
    }

    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT db.Id, db.NgayBan, nv.TaiKhoan, kh.TenKH, db.Tong, db.TrangThai, db.ThongTin 
                             FROM DuAn db 
                             JOIN NhanVien nv ON nv.Id = db.IdNV 
                             JOIN KhachHang kh ON kh.Id = db.IdKH 
                             WHERE db.Id = :id');
        $req->execute(array('id' => $id));
        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new DuAn($item['Id'], $item['NgayBan'], $item['TaiKhoan'], $item['TenKH'], $item['Tong'], $item['TrangThai'], $item['ThongTin']);
        }
        return null;
    }

    static function add($ngayban, $IdNV, $IdKH, $Tong, $TrangThai, $ThongTin)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO DuAn(NgayBan, IdNV, IdKH, Tong, TrangThai, ThongTin) 
                              VALUES (:ngayban, :idnv, :idkh, :tong, :trangthai, :thongtin)');
        $stmt->execute([
            ':ngayban' => $ngayban,
            ':idnv' => $IdNV,
            ':idkh' => $IdKH,
            ':tong' => $Tong,
            ':trangthai' => $TrangThai,
            ':thongtin' => $ThongTin
        ]);
        return $db->lastInsertId();
    }

    static function update($id, $ngayban, $IdNV, $IdKH, $Tong, $TrangThai, $ThongTin)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE DuAn 
                              SET NgayBan = :ngayban, IdNV = :idnv, IdKH = :idkh, Tong = :tong, TrangThai = :trangthai, ThongTin = :thongtin 
                              WHERE Id = :id');
        $stmt->execute([
            ':id' => $id,
            ':ngayban' => $ngayban,
            ':idnv' => $IdNV,
            ':idkh' => $IdKH,
            ':tong' => $Tong,
            ':trangthai' => $TrangThai,
            ':thongtin' => $ThongTin
        ]);
    }

    static function thanhtoan($id)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE DuAn SET TrangThai = 1 WHERE Id = :id');
        $stmt->execute([':id' => $id]);
    }

    static function chuathanhtoan($id)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE DuAn SET TrangThai = 0 WHERE Id = :id');
        $stmt->execute([':id' => $id]);
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('DELETE FROM ChiTietDuAn WHERE IdDuAn = :id');
        $stmt->execute([':id' => $id]);

        $stmt = $db->prepare('DELETE FROM DuAn WHERE Id = :id');
        $stmt->execute([':id' => $id]);

        header('location:index.php?controller=duan&action=index');
    }
}
?>