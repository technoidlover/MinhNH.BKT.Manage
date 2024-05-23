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
    public $imgUrl;

    function __construct($Id, $TenSP, $IdDVT, $IdNCC, $GiaMua, $GiaBan, $SoLuong, $HangSX, $XuatXu, $MoTa, $NhomTB, $imgUrl)
    {
        $this->Id = $Id;
        $this->TenSP = $TenSP;
        $this->IdDVT = $IdDVT;
        $this->IdNCC = $IdNCC;
        $this->GiaMua = $GiaMua;
        $this->GiaBan = $GiaBan;
        $this->SoLuong = $SoLuong;
        $this->HangSX = $HangSX;
        $this->XuatXu = $XuatXu;
        $this->MoTa = $MoTa;
        $this->NhomTB = $NhomTB;
        $this->imgUrl = $imgUrl;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $reg = $db->query('SELECT sp.Id, sp.TenSP, dvt.DonVi, ncc.TenNCC, sp.GiaMua, sp.GiaBan, sp.SoLuong, sp.HangSX, sp.XuatXu, sp.MoTa, sp.NhomTB, sp.imgUrl FROM SanPham sp JOIN DonViTinh dvt JOIN NhaCungCap ncc ON sp.IdNCC = ncc.Id AND sp.IdDVT = dvt.Id');
        foreach ($reg->fetchAll() as $item) {
            $list[] = new SanPham($item['Id'], $item['TenSP'], $item['DonVi'], $item['TenNCC'], $item['GiaMua'], $item['GiaBan'], $item['SoLuong'], $item['HangSX'], $item['XuatXu'], $item['MoTa'], $item['NhomTB'], $item['imgUrl']);
        }
        return $list;
    }

    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM SanPham WHERE Id = :id');
        $req->execute(array('id' => $id));
        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new SanPham($item['Id'], $item['TenSP'], $item['IdDVT'], $item['IdNCC'], $item['GiaMua'], $item['GiaBan'], $item['SoLuong'], $item['HangSX'], $item['XuatXu'], $item['MoTa'], $item['NhomTB'], $item['imgUrl']);
        }
        return null;
    }

    static function add($ten, $IdDVT, $IdNCC, $giamua, $giaban, $soluong, $HangSX, $XuatXu, $MoTa, $NhomTB, $imgUrl)
    {
        $db = DB::getInstance();
        $reg = $db->prepare(
            'INSERT INTO SanPham(TenSP, IdDVT, IdNCC, GiaMua, GiaBan, SoLuong, HangSX, XuatXu, MoTa, NhomTB, imgUrl) 
            VALUES (:ten, :IdDVT, :IdNCC, :GiaMua, :GiaBan, :SoLuong, :HangSX, :XuatXu, :MoTa, :NhomTB, :imgUrl)'
        );
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
            'NhomTB' => $NhomTB,
            'imgUrl' => $imgUrl
        ));
        header('location:index.php?controller=sanpham&action=index');
    }

    static function update($id, $ten, $IdDVT, $IdNCC, $giamua, $giaban, $soluong, $HangSX, $XuatXu, $MoTa, $NhomTB, $imgUrl)
    {
        $db = DB::getInstance();
        $reg = $db->prepare(
            'UPDATE SanPham 
            SET TenSP = :ten, IdDVT = :IdDVT, IdNCC = :IdNCC, GiaMua = :GiaMua, GiaBan = :GiaBan, 
                SoLuong = :SoLuong, HangSX = :HangSX, XuatXu = :XuatXu, MoTa = :MoTa, NhomTB = :NhomTB, imgUrl = :imgUrl
            WHERE Id = :id'
        );
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
            'NhomTB' => $NhomTB,
            'imgUrl' => $imgUrl
        ));
        header('location:index.php?controller=sanpham&action=index');
    }

    static function updatesl($id, $soluong)
    {
        $db = DB::getInstance();
        $reg = $db->query('UPDATE SanPham SET SoLuong = "' . $soluong . '" WHERE Id = ' . $id);
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $reg = $db->query('DELETE FROM SanPham WHERE Id = ' . $id);
        header('location:index.php?controller=sanpham&action=index');
    }

    static function handleFileUpload($file)
    {
        $targetDir = "Assets/upload/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        $targetFile = $targetDir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($file["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            return null;
        } else {
            if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                return $targetFile;
            } else {
                echo "Sorry, there was an error uploading your file.";
                return null;
            }
        }
    }
}
