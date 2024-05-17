<?php
class NhaCungCap
{
    public $Id;
    public $TenNCC;
    public $DienThoai;
    public $Email;
    public $DiaChi;
    public $NguoiLienHe;
    public $MST;

    function __construct($Id, $TenNCC, $DienThoai, $Email, $DiaChi, $NguoiLienHe, $MST)
    {
        $this->Id = $Id;
        $this->TenNCC = $TenNCC;
        $this->DienThoai = $DienThoai;
        $this->Email = $Email;
        $this->DiaChi = $DiaChi;
        $this->NguoiLienHe = $NguoiLienHe;
        $this->MST = $MST;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM NhaCungCap');
        foreach ($req->fetchAll() as $item) {
            $list[] = new NhaCungCap($item['Id'], $item['TenNCC'], $item['DienThoai'], $item['Email'], $item['DiaChi'], $item['NguoiLienHe'], $item['MST']);
        }
        return $list;
    }

    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM NhaCungCap WHERE Id = :id');
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new NhaCungCap($item['Id'], $item['TenNCC'], $item['DienThoai'], $item['Email'], $item['DiaChi'], $item['NguoiLienHe'], $item['MST']);
        }
        return null;
    }

    static function add($ten, $dienthoai, $email, $diachi, $nguoilienhe, $MST)
    {
        $db = DB::getInstance();
        $req = $db->query('INSERT INTO NhaCungCap(TenNCC, DienThoai, Email, DiaChi, NguoiLienHe, MST) VALUES ("' . $ten . '", "' . $dienthoai . '", "' . $email . '", "' . $diachi . '", "' . $nguoilienhe . '", "' . $MST . '")');
        header('location:index.php?controller=nhacungcap&action=index');
    }

    static function update($id, $ten, $dienthoai, $email, $diachi, $nguoilienhe, $MST)
    {
        $db = DB::getInstance();
        $req = $db->query('UPDATE NhaCungCap SET TenNCC ="' . $ten . '", DienThoai="' . $dienthoai . '", Email="' . $email . '", DiaChi="' . $diachi . '", NguoiLienHe="' . $nguoilienhe . '", MST="' . $MST . '" WHERE Id=' . $id);
        header('location:index.php?controller=nhacungcap&action=index');
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query('DELETE FROM NhaCungCap WHERE Id=' . $id);
        header('location:index.php?controller=nhacungcap&action=index');
    }
}
