<?php
class DonBan{

    public $Id;
    public $NgayBan;
    public $IdNV;
    public $IdKH;
    public $ThanhTien;
    public $TrangThai;


    function __construct($Id,$NgayBan,$IdNV,$IdKH,$ThanhTien,$TrangThai)
    {
        $this->Id = $Id;
        $this->NgayBan = $NgayBan;
        $this->IdNV =  $IdNV;
        $this->IdKH = $IdKH;
        $this->ThanhTien= $ThanhTien;
        $this->TrangThai= $TrangThai;
    }
    static function all()
    {
        $list =[];
        $db =DB::getInstance();
        $reg = $db->query('SELECT db.Id ,db.NgayBan , nv.TaiKhoan ,kh.TenKH ,db.Tong,db.TrangThai FROM donban db JOIN nhanvien nv JOIN khachhang kh ON nv.Id =db.IdNV AND kh.Id = db.IdKH');
        foreach ($reg->fetchAll() as $item){
            $list[] =new DonBan($item['Id'],$item['NgayBan'],$item['TaiKhoan'],$item['TenKH'],$item['Tong'],$item['TrangThai']);
        }
        return $list;
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT db.Id ,db.NgayBan , nv.TaiKhoan ,kh.TenKH ,db.Tong,db.TrangThai FROM donban db JOIN nhanvien nv JOIN khachhang kh ON nv.Id =db.IdNV AND kh.Id = db.IdKH WHERE db.Id = :id');
        $req->execute(array('id' => $id));
        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new DonBan($item['Id'],$item['NgayBan'],$item['TaiKhoan'],$item['TenKH'],$item['Tong'],$item['TrangThai']);
        }
        return null;
    }
    static function add($ngayban,$IdNV,$IdKH,$Tong,$TrangThai)
    {
        $db =DB::getInstance();
        $reg =$db->query('INSERT INTO donban(NgayBan,IdNV,IdKH,Tong,TrangThai) VALUES ("'.$ngayban.'",'.$IdNV.','.$IdKH.','.$Tong.',"'.$TrangThai.'")');

    }
    static function  update($id,$donban)
    {
        $db = DB::getInstance();
        $reg =$db->query('UPDATE donban SET donban ="'.$donban.'" WHERE Id='.$id);
        header('location:index.php?controller=donban&action=index');
    }
    static function  thanhtoan($id)
    {
        $db = DB::getInstance();
        $reg =$db->query('UPDATE donban SET TrangThai ="1" WHERE Id='.$id);
    }
    static function  chuathanhtoan($id)
    {
        $db = DB::getInstance();
        $reg =$db->query('UPDATE donban SET TrangThai ="0" WHERE Id='.$id);
    }
    static function delete($id)
    {
        $db =DB::getInstance();
        $reg =$db->query('DELETE FROM chitietban WHERE IdDonBan='.$id);
        $reg1 =$db->query('DELETE FROM donban WHERE Id = '.$id);
        header('location:index.php?controller=donban&action=index');
    }
}
