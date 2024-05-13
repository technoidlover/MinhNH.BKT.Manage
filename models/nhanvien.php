<?php
class NhanVien
{
    public $Id;
    public $TaiKhoan;
    public $Quyen;
    public $IsActive;
    public $TenNV;
    public $DienThoai;
    public $Email;
    public $DiaChi;
    
    function __construct($Id, $TaiKhoan, $Quyen, $IsActive, $TenNV, $DienThoai, $Email, $DiaChi)
    {
        $this->Id = $Id;
        $this->TaiKhoan = $TaiKhoan;
        $this->Quyen = $Quyen;
        $this->IsActive = $IsActive;
        $this->TenNV = $TenNV;
        $this->DienThoai = $DienThoai;
        $this->Email = $Email;
        $this->DiaChi = $DiaChi;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        // Điều chỉnh truy vấn cần bao gồm tất cả các cột mới
        $reg = $db->query('SELECT Id, TaiKhoan, Quyen, IsActive, TenNV, DienThoai, Email, DiaChi FROM NhanVien');
        foreach ($reg->fetchAll() as $item) {
            $list[] = new NhanVien($item['Id'], $item['TaiKhoan'], $item['Quyen'], $item['IsActive'], $item['TenNV'], $item['DienThoai'], $item['Email'], $item['DiaChi']);
        }
        return $list;
    }

    static function find($id)
    {
        $db = DB::getInstance();
        // Điều chỉnh truy vấn cần bao gồm tất cả các cột mới
        $req = $db->prepare('SELECT Id, TaiKhoan, Quyen, IsActive, TenNV, DienThoai, Email, DiaChi FROM NhanVien WHERE Id = :id');
        $req->execute(array('id' => $id));
        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new NhanVien($item['Id'], $item['TaiKhoan'], $item['Quyen'], $item['IsActive'], $item['TenNV'], $item['DienThoai'], $item['Email'], $item['DiaChi']);
        }
        return null;
    }

    static function add($taiKhoan, $matKhau, $quyen, $isActive, $tenNV, $dienThoai, $email, $diaChi)
    {
        $db = DB::getInstance();
        // Lưu ý: Mật khẩu nên được xử lý bảo mật hơn ngoài mã hóa md5 thông thường
        $req = $db->prepare('INSERT INTO NhanVien (TaiKhoan, MatKhau, Quyen, IsActive, TenNV, DienThoai, Email, DiaChi) VALUES (:taiKhoan, :matKhau, :quyen, :isActive, :tenNV, :dienThoai, :email, :diaChi)');
        $req->execute(array(
            'taiKhoan' => $taiKhoan,
            'matKhau' => md5($matKhau),
            'quyen' => $quyen,
            'isActive' => $isActive,
            'tenNV' => $tenNV,
            'dienThoai' => $dienThoai,
            'email' => $email,
            'diaChi' => $diaChi
        ));
        header('Location: index.php?controller=nhanvien&action=index');
    }

    static function update($id, $taiKhoan, $quyen, $isActive, $tenNV, $dienThoai, $email, $diaChi)
    {
        $db = DB::getInstance();
        $req = $db->prepare('UPDATE NhanVien SET TaiKhoan = :taiKhoan, Quyen = :quyen, IsActive = :isActive, TenNV = :tenNV, DienThoai = :dienThoai, Email = :email, DiaChi = :diaChi WHERE Id = :id');
        $req->execute(array(
            'id' => $id,
            'taiKhoan' => $taiKhoan,
            'quyen' => $quyen,
            'isActive' => $isActive,
            'tenNV' => $tenNV,
            'dienThoai' => $dienThoai,
            'email' => $email,
            'diaChi' => $diaChi
        ));
        header('Location: index.php?controller=nhanvien&action=index');
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('DELETE FROM NhanVien WHERE Id = :id');
        $req->execute(array('id' => $id));
        header('Location: index.php?controller=nhanvien&action=index');
    }
    
    static function dangNhap($taiKhoan, $matKhau)
    {
        $db = DB::getInstance();
        $matKhauMd5 = md5($matKhau);
        $req = $db->prepare('SELECT * FROM NhanVien WHERE TaiKhoan = :taiKhoan AND MatKhau = :matKhau');
        $req->execute(array('taiKhoan' => $taiKhoan, 'matKhau' => $matKhauMd5));
        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new NhanVien($item['Id'], $item['TaiKhoan'], $item['Quyen'], $item['IsActive'], $item['TenNV'], $item['DienThoai'], $item['Email'], $item['DiaChi']);
        }
        return null;
    }
}
?>