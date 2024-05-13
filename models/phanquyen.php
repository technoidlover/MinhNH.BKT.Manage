<?php
class PhanQuyen
{
    public $Id;
    public $TaiKhoan;
    public $Quyen;


    function __construct($Id, $TaiKhoan, $Quyen)
    {
        $this->Id = $Id;
        $this->TaiKhoan = $TaiKhoan;
        $this->Quyen = $Quyen;

    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $reg = $db->query('SELECT Id, TaiKhoan, Quyen FROM NhanVien');
        foreach ($reg->fetchAll() as $item) {
            $list[] = new PhanQuyen($item['Id'], $item['TaiKhoan'], $item['Quyen']);
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
            return new PhanQuyen($item['Id'], $item['TaiKhoan'], $item['Quyen']);
        }
        return null;
    }

    static function add($TaiKhoan, $Quyen)
    {
        $db = DB::getInstance();
        $reg = $db->query("INSERT INTO NhanVien(TaiKhoan, Quyen) VALUES ('".$TaiKhoan."','".$Quyen."')");
        header('location:index.php?controller=phanquyen&action=index');
    }

    static function update($id, $TaiKhoan, $Quyen)
    {
        $db = DB::getInstance();
        $reg = $db->query("UPDATE NhanVien SET TaiKhoan='".$TaiKhoan."', Quyen='".$Quyen."' WHERE Id=".$id);
        header('location:index.php?controller=phanquyen&action=index');
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $reg = $db->query('DELETE FROM NhanVien WHERE Id='.$id);
        header('location:index.php?controller=phanquyen&action=index');
    }
}