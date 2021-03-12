<?php
class Quyen{

    public $Id;
    public $TenQuyen;

    function __construct($Id,$TenQuyen)
    {
        $this->Id = $Id;
        $this->TenQuyen= $TenQuyen;
    }
    static function all()
    {
        $list = [];
        $db =DB::getInstance();
        $reg = $db->query('select *from quyen');
        foreach ($reg->fetchAll() as $item){
            $list[] =new Quyen($item['Id'],$item['TenQuyen']);
        }
        return $list;
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM quyen WHERE Id = :id');
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['Id'])) {
            return new Quyen($item['Id'],$item['TenQuyen']);
        }
        return null;
    }
    static function add($ten)
    {
        $db =DB::getInstance();
        $reg =$db->query('INSERT INTO quyen(TenQuyen) VALUES ("'.$ten.'")');
        header('location:index.php?controller=quyen&action=index');
    }
    static function  update($id,$ten)
    {
        $db = DB::getInstance();
        $reg =$db->query('UPDATE quyen SET TenQuyen ="'.$ten.'" WHERE Id='.$id);
        header('location:index.php?controller=quyen&action=index');
    }
    static function delete($id)
    {
        $db =DB::getInstance();
        $reg =$db->query('DELETE FROM quyen WHERE id='.$id);
        header('location:index.php?controller=quyen&action=index');
    }
}
