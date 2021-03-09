<?php
require_once ('controllers/base_controller.php');
require_once ('models/nhanvien.php');

class NhanVienController extends BaseController
{
    function __construct()
    {
        $this->folder='nhanvien';
    }
    public function index()
    {
        $nhanvien = NhanVien::all();
        $data =array('nhanvien'=>$nhanvien);
        $this->render('index',$data);
    }
    public function insert()
    {
        $this->render('insert');
    }
    public function edit()
    {
        $nhanvien = NhanVien::find($_GET['id']);
        $data = array('nhanvien' => $nhanvien);
        $this->render('edit', $data);
    }
}
