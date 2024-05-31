<?php
class chitietduan
{

    public $Id;
    public $IdDuAn;
    public $IdSP;
    public $IdDVT;
    public $GiaMua;
    public $GiaBan;
    public $SoLuong;
    public $ThanhTien;


    function __construct($Id, $IdDuAn, $IdSP, $IdDVT, $GiaMua, $GiaBan, $SoLuong, $ThanhTien)
    {
        $this->Id = $Id;
        $this->IdDuAn = $IdDuAn;
        $this->IdSP =  $IdSP;
        $this->IdDVT =  $IdDVT;
        $this->GiaMua = $GiaMua;
        $this->GiaBan = $GiaBan;
        $this->SoLuong = $SoLuong;
        $this->ThanhTien = $ThanhTien;
    }
    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $reg = $db->query('SELECT ct.Id ,db.Id As "Don",sp.TenSP ,dvt.DonVi ,ct.GiaMua,ct.GiaBan ,ct.SoLuong ,ct.ThanhTien FROM chitietduan ct JOIN DonViTinh dvt JOIN DuAn db JOIN SanPham sp ON ct.IdDuAn = db.Id AND ct.IdSP = sp.Id AND sp.IdDVT = dvt.Id');
        foreach ($reg->fetchAll() as $item) {
            $list[] = new chitietduan($item['Id'], $item['Don'], $item['TenSP'], $item['DonVi'], $item['GiaMua'], $item['GiaBan'], $item['SoLuong'], $item['ThanhTien']);
        }
        return $list;
    }
    static function find($id)
    {
        $list = [];
        $db = DB::getInstance();
        $reg = $db->query('SELECT ct.Id ,db.Id As "Don",sp.TenSP ,dvt.DonVi ,ct.GiaMua,ct.GiaBan ,ct.SoLuong ,ct.ThanhTien FROM chitietduan ct JOIN DonViTinh dvt JOIN DuAn db JOIN SanPham sp ON ct.IdDuAn = db.Id AND ct.IdSP = sp.Id AND sp.IdDVT = dvt.Id WHERE ct.IdDuAn=' . $id);
        foreach ($reg->fetchAll() as $item) {
            $list[] = new chitietduan($item['Id'], $item['Don'], $item['TenSP'], $item['DonVi'], $item['GiaMua'], $item['GiaBan'], $item['SoLuong'], $item['ThanhTien']);
        }
        return $list;
    }
    public static function add($IdDon, $sp_ma, $sp_dh_ma, $sp_dh_dongia, $sp_dh_soluong, $thanhtien)
    {
        $db = DB::getInstance(); // Make sure this method returns a valid PDO instance

        $stmt = $db->prepare("INSERT INTO chitietduan (IdDuAn, IdSP, GiaMua, GiaBan, SoLuong, ThanhTien) VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->execute([$IdDon, $sp_ma, $sp_dh_ma, $sp_dh_dongia, $sp_dh_soluong, $thanhtien]);
    }
}
?>