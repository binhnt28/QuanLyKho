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
        //code
    }
    static function add()
    {
        //code
    }
    static function update($ten,$giamua,$giaban,$soluong)
    {
        //code
    }
    static function delete($id)
    {
        //code
    }
}