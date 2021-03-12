<?php
class ChiTietBan{

    public $Id;
    public $IdDonBan;
    public $IdSP;
    public $IdDVT;
    public $GiaMua;
    public $GiaBan;
    public $SoLuong;
    public $ThanhTien;


    function __construct($Id,$IdDonBan,$IdSP,$IdDVT,$GiaMua,$GiaBan,$SoLuong,$ThanhTien)
    {
        $this->Id = $Id;
        $this->IdDonBan = $IdDonBan;
        $this->IdSP=  $IdSP;
        $this->IdDVT=  $IdDVT;
        $this->GiaMua = $GiaMua;
        $this->GiaBan = $GiaBan;
        $this->SoLuong = $SoLuong;
        $this->ThanhTien= $ThanhTien;
    }
    static function all()
    {
        $list =[];
        $db =DB::getInstance();
        $reg = $db->query('SELECT ct.Id ,db.Id As "Don",sp.TenSP ,dvt.DonVi ,ct.GiaMua,ct.GiaBan ,ct.SoLuong ,ct.ThanhTien FROM chitietban ct JOIN donvitinh dvt JOIN donban db JOIN sanpham sp ON ct.IdDonBan = db.Id AND ct.IdSP = sp.Id AND sp.IdDVT = dvt.Id');
        foreach ($reg->fetchAll() as $item){
            $list[] =new ChiTietBan($item['Id'],$item['Don'],$item['TenSP'],$item['DonVi'],$item['GiaMua'],$item['GiaBan'],$item['SoLuong'],$item['ThanhTien']);
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