<?php
class SanPham
{
    public $Id;
    public $TenSP;
    public $IdDVT;
    public $GiaMua;
    public $GiaBan;
    public $SoLuong;

    function   __construct($Id,$TenSP,$IdDVT,$GiaMua,$GiaBan,$SoLuong)
    {
        $this->Id=$Id;
        $this->TenSP=$TenSP;
        $this->IdDVT=$IdDVT;
        $this->GiaMua=$GiaMua;
        $this->GiaBan=$GiaBan;
        $this->SoLuong=$SoLuong;
    }
    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $reg = $db->query('SELECT sp.Id,sp.TenSP,dvt.DonVi,sp.GiaMua,sp.GiaBan,sp.SoLuong FROM sanpham sp JOIN donvitinh dvt ON sp.IdDVT = dvt.Id');
        foreach ($reg->fetchAll() as $item) {
            $list[] = new SanPham($item['Id'], $item['TenSP'], $item['DonVi'], $item['GiaMua'], $item['GiaBan'], $item['SoLuong']);
        }
        return $list;
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT sp.Id,sp.TenSP,dvt.DonVi,sp.GiaMua,sp.GiaBan,sp.SoLuong FROM sanpham sp JOIN donvitinh dvt ON sp.IdDVT = dvt.Id WHERE sp.Id ='.$id);
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new SanPham($item['Id'], $item['TenSP'], $item['DonVi'], $item['GiaMua'], $item['GiaBan'], $item['SoLuong']);
        }
        return null;
    }
    static function add($ten,$IdDVT,$giamua,$giaban,$soluong)
    {
        $db = DB::getInstance();
        $reg=$db->query('INSERT INTO sanpham(TenSP,IdDVT,GiaMua,GiaBan,SoLuong) VALUES ("'.$ten.'",'.$IdDVT.','.$giamua.','.$giaban.','.$soluong.')');
        header('location:index.php?controller=sanpham&action=index');
    }
    static function update($id,$ten,$IdDVT,$giamua,$giaban,$soluong)
    {
        $db =DB::getInstance();
        $reg =$db->query('UPDATE sanpham SET TenSP ="'.$ten.'",IdDVT="'.$IdDVT.'",GiaMua="'.$giamua.'",GiaBan="'.$giaban.'",SoLuong="'.$soluong.'" WHERE Id='.$id);
        header('location:index.php?controller=sanpham&action=index');
    }
    static function delete($id)
    {
        $db =DB::getInstance();
        $reg =$db->query('DELETE FROM sanpham WHERE id='.$id);
        header('location:index.php?controller=sanpham&action=index');
    }
}