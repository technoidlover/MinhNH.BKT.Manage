<?php
class NhomTB
{

    public $Id;
    public $TenNhom;

    function __construct($Id, $TenNhom)
    {
        $this->Id = $Id;
        $this->TenNhom = $TenNhom;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM nhomthietbi');
        foreach ($req->fetchAll() as $item) {
            $list[] = new NhomTB($item['Id'], $item['TenNhom']);
        }
        return $list;
    }

    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM nhomthietbi WHERE Id = :id');
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new NhomTB($item['Id'], $item['TenNhom']);
        }
        return null;
    }

    static function add($tenNhom)
    {
        $db = DB::getInstance();
        $req = $db->query('INSERT INTO nhomthietbi(TenNhom) VALUES ("' . $tenNhom . '")');
        header('location:index.php?controller=nhomtb&action=index');
    }

    static function update($id, $tenNhom)
    {
        $db = DB::getInstance();
        $req = $db->query('UPDATE nhomthietbi SET TenNhom ="' . $tenNhom . '" WHERE Id=' . $id);
        header('location:index.php?controller=nhomtb&action=index');
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query('DELETE FROM nhomthietbi WHERE Id=' . $id);
        header('location:index.php?controller=nhomtb&action=index');
    }
}