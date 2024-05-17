<?php
class SanPham
{
    public $Id;
    public $TenSP;
    public $IdDVT;
    public $IdNCC;
    public $GiaMua;
    public $GiaBan;
    public $SoLuong;
    public $HangSX;
    public $XuatXu;
    public $MoTa;
    public $NhomTB;

    function   __construct($Id,$TenSP,$IdDVT,$IdNCC,$GiaMua,$GiaBan,$SoLuong, $HangSX, $XuatXu, $MoTa, $NhomTB)
    {
        $this->Id=$Id;
        $this->TenSP=$TenSP;
        $this->IdDVT=$IdDVT;
        $this->IdNCC=$IdNCC;
        $this->GiaMua=$GiaMua;
        $this->GiaBan=$GiaBan;
        $this->SoLuong=$SoLuong;
        $this->HangSX=$HangSX;
        $this->XuatXu=$XuatXu;
        $this->MoTa=$MoTa;
        $this->NhomTB=$NhomTB;
    }
    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $reg = $db->query('SELECT sp.Id,sp.TenSP,dvt.DonVi,ncc.TenNCC,sp.GiaMua,sp.GiaBan,sp.SoLuong, sp.HangSX, sp.XuatXu, sp.MoTa, sp.NhomTB FROM SanPham sp JOIN DonViTinh dvt JOIN NhaCungCap ncc ON sp.IdNCC = ncc.Id AND sp.IdDVT = dvt.Id');
        foreach ($reg->fetchAll() as $item) {
            $list[] = new SanPham($item['Id'], $item['TenSP'], $item['DonVi'],$item['TenNCC'], $item['GiaMua'], $item['GiaBan'], $item['SoLuong'], $item['HangSX'], $item['XuatXu'], $item['MoTa'], $item['NhomTB']);
        }
        return $list;
    }
    static function find($id)
    {
        $db = DB::getInstance();
        // Sử dụng placeholder :id trong câu truy vấn
        $req = $db->prepare('SELECT * FROM SanPham WHERE Id = :id');
        $req->execute(array('id' => $id));
        $item = $req->fetch();
        if (isset($item['Id'])) {
                return new SanPham($item['Id'], $item['TenSP'], $item['IdDVT'],$item['IdNCC'], $item['GiaMua'], $item['GiaBan'], $item['SoLuong'], $item['HangSX'], $item['XuatXu'], $item['MoTa'], $item['NhomTB']);
        }
        return null;
    }
    static function add($ten, $IdDVT, $IdNCC, $giamua, $giaban, $soluong, $HangSX, $XuatXu, $MoTa, $NhomTB)
    {
        $db = DB::getInstance();
        // Sử dụng prepared statement để tránh SQL injection
        $reg = $db->prepare(
            'INSERT INTO SanPham(TenSP,IdDVT,IdNCC,GiaMua,GiaBan,SoLuong,HangSX,XuatXu,MoTa,NhomTB ) 
         VALUES (:ten, :IdDVT, :IdNCC, :GiaMua, :GiaBan, :SoLuong, :HangSX, :XuatXu, :MoTa, :NhomTB)'
        );
        // Thực thi truy vấn với mảng tham số
        $reg->execute(array(
            'ten' => $ten,
            'IdDVT' => $IdDVT,
            'IdNCC' => $IdNCC,
            'GiaMua' => $giamua,
            'GiaBan' => $giaban,
            'SoLuong' => $soluong,
            'HangSX' => $HangSX,
            'XuatXu' => $XuatXu,
            'MoTa' => $MoTa,
            'NhomTB' => $NhomTB
        ));

        // Dùng header để chuyển hướng ngay sau khi insert
        header('location:index.php?controller=sanpham&action=index');
    }
    static function update($id, $ten, $IdDVT, $IdNCC, $giamua, $giaban, $soluong, $HangSX, $XuatXu, $MoTa, $NhomTB)
    {
        $db = DB::getInstance();
        // Sử dụng prepare statement để tránh SQL injection
        $reg = $db->prepare(
            'UPDATE SanPham 
         SET TenSP = :ten, IdDVT = :IdDVT, IdNCC = :IdNCC, GiaMua = :GiaMua, GiaBan = :GiaBan, 
             SoLuong = :SoLuong, HangSX = :HangSX, XuatXu = :XuatXu, MoTa = :MoTa, NhomTB = :NhomTB
         WHERE Id = :id'
        );
        // Thực thi truy vấn với mảng tham số
        $reg->execute(array(
            'id' => $id,
            'ten' => $ten,
            'IdDVT' => $IdDVT,
            'IdNCC' => $IdNCC,
            'GiaMua' => $giamua,
            'GiaBan' => $giaban,
            'SoLuong' => $soluong,
            'HangSX' => $HangSX,
            'XuatXu' => $XuatXu,
            'MoTa' => $MoTa,
            'NhomTB' => $NhomTB
        ));

        // Chuyển hướng sau khi cập nhật
        header('location:index.php?controller=sanpham&action=index');
    }
    static function updatesl($id,$soluong)
    {
        $db =DB::getInstance();
        $reg =$db->query('UPDATE SanPham SET SoLuong="'.$soluong.'" WHERE Id='.$id);
    }
    static function delete($id)
    {
        $db =DB::getInstance();
        $reg =$db->query('DELETE FROM SanPham WHERE Id='.$id);
        header('location:index.php?controller=sanpham&action=index');
    }
}