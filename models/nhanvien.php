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
        $list = [];
        $db =DB::getInstance();
        $reg = $db->query('select *from nhanvien');
        foreach ($reg->fetchAll() as $item){
            $list[] =new NhanVien($item['Id'],$item['TenNV'],$item['DienThoai'],$item['Email'],$item['DiaChi'],$item['TaiKhoan'],$item['MatKhau']);
        }
        return $list;
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM nhanvien WHERE Id = :id');
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new NhanVien($item['Id'],$item['TenNV'],$item['DienThoai'],$item['Email'],$item['DiaChi'],$item['TaiKhoan'],$item['MatKhau']);
        }
        return null;
    }
    static function add($ten,$dienthoai,$email,$diachi,$taikhoan,$matkhau)
    {
        $db =DB::getInstance();
        $reg =$db->query('INSERT INTO nhanvien(TenNV,DienThoai,Email,DiaChi,TaiKhoan,MatKhau) VALUES ("'.$ten.'","'.$dienthoai.'","'.$email.'","'.$diachi.'","'.$taikhoan.'","'.$matkhau.'")');
        header('location:index.php?controller=nhanvien&action=index');
    }
    static function update($id,$ten,$dienthoai,$email,$diachi,$taikhoan,$matkhau)
    {
        $db =DB::getInstance();
        $reg =$db->query('UPDATE nhanvien SET TenNV ="'.$ten.'",DienThoai="'.$dienthoai.'",Email="'.$email.'",DiaChi="'.$diachi.'",TaiKhoan="'.$taikhoan.'",MatKhau="'.$matkhau.'" WHERE Id='.$id);
        header('location:index.php?controller=nhanvien&action=index');
    }
    static function delete($id)
    {
        $db =DB::getInstance();
        $reg =$db->query('DELETE FROM nhanvien WHERE id='.$id);
        header('location:index.php?controller=nhanvien&action=index');
    }
}
