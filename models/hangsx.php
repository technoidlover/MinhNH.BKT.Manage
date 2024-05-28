<?php
class HangSX
{

    public $Id;
    public $TenHang;

    function __construct($Id, $TenHang)
    {
        $this->Id = $Id;
        $this->TenHang = $TenHang;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM HangSX');
        foreach ($req->fetchAll() as $item) {
            $list[] = new HangSX($item['Id'], $item['TenHang']);
        }
        return $list;
    }

    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM HangSX WHERE Id = :id');
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new HangSX($item['Id'], $item['TenHang']);
        }
        return null;
    }

    static function add($tenHang)
    {
        $db = DB::getInstance();
        $req = $db->query('INSERT INTO HangSX(TenHang) VALUES ("' . $tenHang . '")');
        header('location:index.php?controller=hangsx&action=index');
    }

    static function update($id, $tenHang)
    {
        $db = DB::getInstance();
        $req = $db->query('UPDATE HangSX SET TenHang ="' . $tenHang . '" WHERE Id=' . $id);
        header('location:index.php?controller=hangsx&action=index');
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query('DELETE FROM HangSX WHERE Id=' . $id);
        header('location:index.php?controller=hangsx&action=index');
    }
}