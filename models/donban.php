<?php
class DonBan{

    public $Id;
    public $NgayBan;
    public $IdNV;
    public $IdKH;
    public $ThanhTien;


    function __construct($Id,$NgayBan,$IdNV,$IdKH,$ThanhTien)
    {
        $this->Id = $Id;
        $this->NgayBan = $NgayBan;
        $this->IdNV =  $IdNV;
        $this->IdKH = $IdKH;
        $this->ThanhTien= $ThanhTien;
    }
    static function all()
    {
        $list =[];
        $db =DB::getInstance();
        $reg = $db->query('SELECT db.Id ,db.NgayBan , nv.TaiKhoan ,kh.TenKH ,db.Tong FROM donban db JOIN nhanvien nv JOIN khachhang kh ON nv.Id =db.IdNV AND kh.Id = db.IdKH');
        foreach ($reg->fetchAll() as $item){
            $list[] =new DonBan($item['Id'],$item['NgayBan'],$item['TaiKhoan'],$item['TenKH'],$item['Tong']);
        }
        return $list;
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM donban WHERE Id = :id');
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new DonBan($item['Id'],$item['donban']);
        }
        return null;
    }
    static function add($tendb)
    {
        $db =DB::getInstance();
        $reg =$db->query('INSERT INTO donban(donban) VALUES ("'.$tendb.'")');
        header('location:index.php?controller=donban&action=index');
    }
    static function  update($id,$donban)
    {
        $db = DB::getInstance();
        $reg =$db->query('UPDATE donban SET donban ="'.$donban.'" WHERE Id='.$id);
        header('location:index.php?controller=donban&action=index');
    }
    static function delete($id)
    {
        $db =DB::getInstance();
        $reg =$db->query('DELETE FROM donban WHERE id='.$id);
        header('location:index.php?controller=donban&action=index');
    }
}
