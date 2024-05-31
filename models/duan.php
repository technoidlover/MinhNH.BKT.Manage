<?php
class DuAn
{

    public $Id;
    public $NgayBan;
    public $IdNV;
    public $IdKH;
    public $ThanhTien;
    public $TrangThai;


    function __construct($Id, $NgayBan, $IdNV, $IdKH, $ThanhTien, $TrangThai)
    {
        $this->Id = $Id;
        $this->NgayBan = $NgayBan;
        $this->IdNV =  $IdNV;
        $this->IdKH = $IdKH;
        $this->ThanhTien = $ThanhTien;
        $this->TrangThai = $TrangThai;
    }
    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $reg = $db->query('SELECT db.Id ,db.NgayBan , nv.TaiKhoan ,kh.TenKH ,db.Tong,db.TrangThai FROM DuAn db JOIN NhanVien nv JOIN KhachHang kh ON nv.Id =db.IdNV AND kh.Id = db.IdKH');
        foreach ($reg->fetchAll() as $item) {
            $list[] = new DuAn($item['Id'], $item['NgayBan'], $item['TaiKhoan'], $item['TenKH'], $item['Tong'], $item['TrangThai']);
        }
        return $list;
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT db.Id ,db.NgayBan , nv.TaiKhoan ,kh.TenKH ,db.Tong,db.TrangThai FROM DuAn db JOIN NhanVien nv JOIN KhachHang kh ON nv.Id =db.IdNV AND kh.Id = db.IdKH WHERE db.Id = :id');
        $req->execute(array('id' => $id));
        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new DuAn($item['Id'], $item['NgayBan'], $item['TaiKhoan'], $item['TenKH'], $item['Tong'], $item['TrangThai']);
        }
        return null;
    }

    static function add($ngayban, $IdNV, $IdKH, $Tong, $TrangThai) {
        $db = DB::getInstance();
        // Sử dụng prepare statement để tránh SQL Injection
        $stmt = $db->prepare('INSERT INTO DuAn(NgayBan, IdNV, IdKH, Tong, TrangThai) VALUES (:ngayban, :idnv, :idkh, :tong, :trangthai)');
        $stmt->execute([
            ':ngayban' => $ngayban,
            ':idnv' => $IdNV,
            ':idkh' => $IdKH,
            ':tong' => $Tong,
            ':trangthai' => $TrangThai
        ]);
        return $db->lastInsertId();
    }

    static function  update($id, $DuAn)
    {
        $db = DB::getInstance();
        $reg = $db->query('UPDATE DuAn SET DuAn ="' . $DuAn . '" WHERE Id=' . $id);
        header('location:index.php?controller=DuAn&action=index');
    }
    static function  thanhtoan($id)
    {
        $db = DB::getInstance();
        $reg = $db->query('UPDATE DuAn SET TrangThai ="1" WHERE Id=' . $id);
    }
    static function  chuathanhtoan($id)
    {
        $db = DB::getInstance();
        $reg = $db->query('UPDATE DuAn SET TrangThai ="0" WHERE Id=' . $id);
    }
    static function delete($id)
    {
        $db = DB::getInstance();
        $reg = $db->query('DELETE FROM ChiTietDuAn WHERE IdDuAn=' . $id);
        $reg1 = $db->query('DELETE FROM DuAn WHERE Id = ' . $id);
        header('location:index.php?controller=duan&action=index');
    }
}
