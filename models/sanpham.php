<?php

class SanPham
{
    public $Id;
    public $MaSP;
    public $TenSP;
    public $IdDVT; // Thêm thuộc tính ID
    public $IdNCC; // Thêm thuộc tính ID
    public $IdHSX; // Thêm thuộc tính ID
    public $IdNTB; // Thêm thuộc tính ID
    public $TenDVT;
    public $TenNCC;
    public $TenHSX;
    public $TenNTB;
    public $XuatXu;
    public $GiaMua;
    public $GiaBan;
    public $SoLuong;
    public $imgUrl;

    function __construct($Id, $MaSP, $TenSP, $IdDVT, $TenDVT, $IdNCC, $TenNCC, $IdHSX, $TenHSX, $IdNTB, $TenNTB, $XuatXu, $GiaMua, $GiaBan, $SoLuong, $imgUrl)
    {
        $this->Id = $Id;
        $this->MaSP = $MaSP;
        $this->TenSP = $TenSP;
        $this->IdDVT = $IdDVT; // Khởi tạo thuộc tính ID
        $this->TenDVT = $TenDVT;
        $this->IdNCC = $IdNCC; // Khởi tạo thuộc tính ID
        $this->TenNCC = $TenNCC;
        $this->IdHSX = $IdHSX; // Khởi tạo thuộc tính ID
        $this->TenHSX = $TenHSX;
        $this->IdNTB = $IdNTB; // Khởi tạo thuộc tính ID
        $this->TenNTB = $TenNTB;
        $this->XuatXu = $XuatXu;
        $this->GiaMua = $GiaMua;
        $this->GiaBan = $GiaBan;
        $this->SoLuong = $SoLuong;
        $this->imgUrl = $imgUrl;
    }
    
    public static function allFiltered($filters, $sort_by, $order)
    {
        $db = DB::getInstance();
        $conditions = [];
        $params = [];

        if (!empty($filters['MaSP'])) {
            $conditions[] = 'MaSP LIKE :MaSP';
            $params[':MaSP'] = '%' . $filters['MaSP'] . '%';
        }

        if (!empty($filters['TenSP'])) {
            $conditions[] = 'TenSP LIKE :TenSP';
            $params[':TenSP'] = '%' . $filters['TenSP'] . '%';
        }

        if (!empty($filters['IdDVT'])) {
            $conditions[] = 'IdDVT = :IdDVT';
            $params[':IdDVT'] = $filters['IdDVT'];
        }

        if (!empty($filters['IdNCC'])) {
            $conditions[] = 'IdNCC = :IdNCC';
            $params[':IdNCC'] = $filters['IdNCC'];
        }

        if (!empty($filters['GiaMua'])) {
            $conditions[] = 'GiaMua = :GiaMua';
            $params[':GiaMua'] = $filters['GiaMua'];
        }

        if (!empty($filters['GiaBan'])) {
            $conditions[] = 'GiaBan = :GiaBan';
            $params[':GiaBan'] = $filters['GiaBan'];
        }

        if (!empty($filters['SoLuong'])) {
            $conditions[] = 'SoLuong = :SoLuong';
            $params[':SoLuong'] = $filters['SoLuong'];
        }

        if (!empty($filters['IdHSX'])) {
            $conditions[] = 'IdHSX = :IdHSX';
            $params[':IdHSX'] = $filters['IdHSX'];
        }

        if (!empty($filters['XuatXu'])) {
            $conditions[] = 'XuatXu LIKE :XuatXu';
            $params[':XuatXu'] = '%' . $filters['XuatXu'] . '%';
        }

        if (!empty($filters['IdNTB'])) {
            $conditions[] = 'IdNTB = :IdNTB';
            $params[':IdNTB'] = $filters['IdNTB'];
        }

        $sql = 'SELECT * FROM SanPham';
        if (!empty($conditions)) {
            $sql .= ' WHERE ' . implode(' AND ', $conditions);
        }
        $sql .= ' ORDER BY ' . $sort_by . ' ' . $order;

        $stmt = $db->prepare($sql);
        foreach ($params as $key => &$val) {
            $stmt->bindParam($key, $val);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public static function getDonViTinhs()
    {
        $db = DB::getInstance();
        $stmt = $db->query("SELECT Id, DonVi FROM DonViTinh");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getNhaCungCaps()
    {
        $db = DB::getInstance();
        $stmt = $db->query("SELECT Id, TenNCC FROM NhaCungCap");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getHangSXs()
    {
        $db = DB::getInstance();
        $stmt = $db->query("SELECT Id, TenHang FROM HangSX");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getNhomThietBis()
    {
        $db = DB::getInstance();
        $stmt = $db->query("SELECT Id, TenNhom FROM NhomThietBi");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    static function all($sort_by = 'Id', $order = 'asc')
    {
        $allowed_sort_columns = ['Id', 'MaSP', 'TenDVT', 'TenNCC', 'TenHSX', 'XuatXu', 'TenNTB'];
        if (!in_array($sort_by, $allowed_sort_columns)) {
            $sort_by = 'Id';
        }
        $order = ($order == 'desc') ? 'desc' : 'asc';

        $list = [];
        $db = DB::getInstance();
        $req = $db->query("
            SELECT sp.Id, sp.MaSP, sp.TenSP, sp.IdDVT, dvt.DonVi as TenDVT, sp.IdNCC, ncc.TenNCC, sp.IdHSX, hsx.TenHang as TenHSX, sp.IdNTB, ntb.TenNhom as TenNTB, sp.XuatXu, sp.GiaMua, sp.GiaBan, sp.SoLuong, sp.imgUrl
            FROM SanPham sp
            LEFT JOIN DonViTinh dvt ON sp.IdDVT = dvt.Id
            LEFT JOIN NhaCungCap ncc ON sp.IdNCC = ncc.Id
            LEFT JOIN HangSX hsx ON sp.IdHSX = hsx.Id
            LEFT JOIN NhomThietBi ntb ON sp.IdNTB = ntb.Id
            ORDER BY $sort_by $order
        ");

        foreach ($req->fetchAll() as $item) {
            $list[] = new SanPham(
                $item['Id'],
                $item['MaSP'],
                $item['TenSP'],
                $item['IdDVT'],
                $item['TenDVT'],
                $item['IdNCC'],
                $item['TenNCC'],
                $item['IdHSX'],
                $item['TenHSX'],
                $item['IdNTB'],
                $item['TenNTB'],
                $item['XuatXu'],
                $item['GiaMua'],
                $item['GiaBan'],
                $item['SoLuong'],
                $item['imgUrl']
            );
        }
        return $list;
    }



    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('
        SELECT sp.Id, sp.MaSP, sp.TenSP, sp.IdDVT, dvt.DonVi as TenDVT, sp.IdNCC, ncc.TenNCC, sp.IdHSX, hsx.TenHang as TenHSX, sp.IdNTB, ntb.TenNhom as TenNTB, sp.XuatXu, sp.GiaMua, sp.GiaBan, sp.SoLuong, sp.imgUrl
        FROM SanPham sp
        LEFT JOIN DonViTinh dvt ON sp.IdDVT = dvt.Id
        LEFT JOIN NhaCungCap ncc ON sp.IdNCC = ncc.Id
        LEFT JOIN HangSX hsx ON sp.IdHSX = hsx.Id
        LEFT JOIN NhomThietBi ntb ON sp.IdNTB = ntb.Id
        WHERE sp.Id = :id
    ');
        $req->execute(['id' => $id]);

        if ($item = $req->fetch()) {
            return new SanPham(
                $item['Id'],
                $item['MaSP'],
                $item['TenSP'],
                $item['IdDVT'],
                $item['TenDVT'],
                $item['IdNCC'],
                $item['TenNCC'],
                $item['IdHSX'],
                $item['TenHSX'],
                $item['IdNTB'],
                $item['TenNTB'],
                $item['XuatXu'],
                $item['GiaMua'],
                $item['GiaBan'],
                $item['SoLuong'],
                $item['imgUrl']
            );
        }
        return null;
    }

    static function add($MaSP, $TenSP, $IdDVT, $IdNCC, $IdHSX, $IdNTB, $XuatXu, $GiaMua, $GiaBan, $SoLuong, $imgUrl)
    {
        $db = DB::getInstance();
        $req = $db->prepare('INSERT INTO SanPham (MaSP, TenSP, IdDVT, IdNCC, IdHSX, IdNTB, XuatXu, GiaMua, GiaBan, SoLuong, imgUrl) VALUES (:MaSP, :TenSP, :IdDVT, :IdNCC, :IdHSX, :IdNTB, :XuatXu, :GiaMua, :GiaBan, :SoLuong, :imgUrl)');

        return $req->execute(array(
            'MaSP' => $MaSP,
            'TenSP' => $TenSP,
            'IdDVT' => $IdDVT,
            'IdNCC' => $IdNCC,
            'IdHSX' => $IdHSX,
            'IdNTB' => $IdNTB,
            'XuatXu' => $XuatXu,
            'GiaMua' => $GiaMua,
            'GiaBan' => $GiaBan,
            'SoLuong' => $SoLuong,
            'imgUrl' => $imgUrl
        ));
    }
    //updatesl($sp_ma, $sp_dh_soluong);
    static function updatesl($id, $quantity)
    {
        $db = DB::getInstance();
        $req = $db->prepare('UPDATE SanPham SET SoLuong = SoLuong - :quantity WHERE Id = :id');
        $req->execute(array('id' => $id, 'quantity' => $quantity));
    }

    static function update($Id, $MaSP, $TenSP, $IdDVT, $IdNCC, $IdHSX, $IdNTB, $XuatXu, $GiaMua, $GiaBan, $SoLuong, $imgUrl)
    {
        $db = DB::getInstance();
        $req = $db->prepare('UPDATE SanPham SET MaSP = :MaSP, TenSP = :TenSP, IdDVT = :IdDVT, IdNCC = :IdNCC, IdHSX = :IdHSX, IdNTB = :IdNTB, XuatXu = :XuatXu, GiaMua = :GiaMua, GiaBan = :GiaBan, SoLuong = :SoLuong, imgUrl = :imgUrl WHERE Id = :Id');

        return $req->execute(array(
            'Id' => $Id,
            'MaSP' => $MaSP,
            'TenSP' => $TenSP,
            'IdDVT' => $IdDVT,
            'IdNCC' => $IdNCC,
            'IdHSX' => $IdHSX,
            'IdNTB' => $IdNTB,
            'XuatXu' => $XuatXu,
            'GiaMua' => $GiaMua,
            'GiaBan' => $GiaBan,
            'SoLuong' => $SoLuong,
            'imgUrl' => $imgUrl
        ));
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('DELETE FROM SanPham WHERE Id = :id');

        return $req->execute(array('id' => $id));
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
            // If file already exists, return the path to the existing file
            // echo "File already exists. Using existing file.";
            return $targetFile;
            $uploadOk = 1;
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
