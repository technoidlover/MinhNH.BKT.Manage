<?php
class NhanVien
{
    public $Id;
    public $TaiKhoan;
    public $Quyen;
    public $IsActive;
    
    function __construct($Id, $TaiKhoan, $Quyen, $IsActive)
    {
        $this->Id = $Id;
        $this->TaiKhoan = $TaiKhoan;
        $this->Quyen = $Quyen;
        $this->IsActive=$IsActive;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $reg = $db->query('SELECT * FROM NhanVien');

        foreach ($reg->fetchAll() as $item) {
            $list[] = new NhanVien($item['Id'], $item['TaiKhoan'], $item['Quyen'], $item['IsActive']);
        }

        return $list;
    }

    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM NhanVien WHERE Id = :id');
        $req->execute(array('id' => $id));
        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new NhanVien($item['Id'], $item['TaiKhoan'], $item['Quyen'], $item['IsActive']);
        }
        return null;
    }
    
    static function add($taikhoan, $matkhau, $quyen, $isactive)
    {
        $db = DB::getInstance();
        $reg = $db->query('INSERT INTO NhanVien(TaiKhoan, MatKhau, Quyen, IsActive) VALUES ("'.$taikhoan.'", "'.md5($matkhau).'", "'.$quyen.'", "'.$isactive.'")');
        header('location:index.php?controller=nhanvien&action=index');
    }

    static function update($id, $taikhoan, $quyen, $isactive)
    {
        $db = DB::getInstance();
        $reg =$db->query('UPDATE NhanVien SET TaiKhoan ="'.$taikhoan.'", Quyen="'.$quyen.'", IsActive="'.$isactive.'" WHERE Id='.$id);
        header('location:index.php?controller=nhanvien&action=index');
    }
    
    static function delete($id)
    {
        $db = DB::getInstance();
        $reg = $db->query('DELETE FROM NhanVien WHERE Id = '.$id);
        header('location:index.php?controller=nhanvien&action=index');
    }
    
    static function dangnhap($taikhoan,$matkhau)
    {
        $matkhau = md5($matkhau);
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM NhanVien WHERE TaiKhoan = :taikhoan AND MatKhau = :matkhau' );
        $req->execute(array('taikhoan' => $taikhoan, 'matkhau' => $matkhau));
        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new NhanVien($item['Id'],$item['TaiKhoan'],$item['Quyen'],$item['IsActive']);
        }
        return null;
    }
}