<?php
class NhaCungCap{
    public $Id;
    public $TenNCC;
    public $DienThoai;
    public $Email;
    public $DiaChi;
    public $NguoiLienHe; // Thuộc tính mới thêm vào

    function __construct($Id, $TenNCC, $DienThoai, $Email, $DiaChi, $NguoiLienHe)
    {
        $this->Id=$Id;
        $this->TenNCC=$TenNCC;
        $this->DienThoai=$DienThoai;
        $this->Email=$Email;
        $this->DiaChi=$DiaChi;
        $this->NguoiLienHe=$NguoiLienHe; // Khởi tạo thuộc tính mới
    }

    static function all()
    {
        $list = [];
        $db =DB::getInstance();
        $reg = $db->query('SELECT * FROM NhaCungCap');
        foreach ($reg->fetchAll() as $item){
            $list[] = new NhaCungCap($item['Id'],$item['TenNCC'],$item['DienThoai'],$item['Email'],$item['DiaChi'],$item['NguoiLienHe']); // Thêm $item['NguoiLienHe']
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
            return new NhaCungCap($item['Id'], $item['TenNCC'], $item['DienThoai'], $item['Email'], $item['DiaChi'], $item['NguoiLienHe']); // Thêm $item['NguoiLienHe']
        }
        return null;
    }

    static function add($ten, $dienthoai, $email, $diachi, $nguoilienhe) // Thêm tham số $nguoilienhe vào method
    {
        $db =DB::getInstance();
        $reg =$db->query('INSERT INTO NhaCungCap(TenNCC, DienThoai, Email, DiaChi, NguoiLienHe) VALUES ("'.$ten.'", "'.$dienthoai.'", "'.$email.'", "'.$diachi.'", "'.$nguoilienhe.'")'); //Thêm $nguoilienhe vào câu lệnh INSERT
        header('location:index.php?controller=nhacungcap&action=index');
    }

    static function update($id, $ten, $dienthoai, $email, $diachi, $nguoilienhe) // Thêm tham số $nguoilienhe vào method
    {
        $db =DB::getInstance();
        $reg =$db->query('UPDATE NhaCungCap SET TenNCC ="'.$ten.'", DienThoai="'.$dienthoai.'", Email="'.$email.'", DiaChi="'.$diachi.'", NguoiLienHe="'.$nguoilienhe.'" WHERE Id='.$id); // Cập nhật thêm cột NguoiLienHe
        header('location:index.php?controller=nhacungcap&action=index');
    }

    static function delete($id){
        $db =DB::getInstance();
        $reg =$db->query('DELETE FROM NhaCungCap WHERE Id='.$id);
        header('location:index.php?controller=nhacungcap&action=index');
    }
}