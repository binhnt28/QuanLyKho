<?php
class NhanVien
{
    public $Id;
    public $TenNV;
    public $DienThoai;
    public $Email;
    public $DiaChi;
    public $TaiKhoan;
    public $MatKhau;


    function  __construct($Id,$TenNV,$DienThoai,$Email,$DiaChi,$TaiKhoan,$MatKhau)
    {
        $this->Id = $Id;
        $this->TenNV = $TenNV;
        $this->DienThoai=$DienThoai;
        $this->Email= $Email;
        $this->DiaChi=$DiaChi;
        $this->TaiKhoan=$TaiKhoan;
        $this->MatKhau=$MatKhau;
    }
    static function all()
    {
        //code
    }
    static function find($id)
    {
        //code
    }
    static function add($ten,$dienthoai,$email,$diachi,$taikhoan,$matkhau)
    {
        //code
    }
    static function update($id,$ten,$dienthoai,$email,$diachi,$taikhoan,$matkhau)
    {
        //code
    }
    static function delete($id)
    {
        //code
    }
}
