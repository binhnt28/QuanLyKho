<?php
                // Truy vấn database
                // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
                require_once ('models/donvitinh.php');
        $list = [];
        $db =DB::getInstance();
        $reg = $db->query('select * from donvitinh');
        foreach ($reg->fetchAll() as $item){
             $list[] =new DonViTinh($item['Id'],$item['DonVi']);
                        }
        $data =array('donvi'=> $list);
?>
<form method="post" name="create-sp">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Tên Sản Phẩm</label>
            <input type="text" class="form-control" id="validationDefault01" name="tenkh" placeholder="Tên Sản Phẩm" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">ĐƠn Vị tính</label>
            <select class="form-control" id="lsp_ma" name="lsp_ma">
                <?php foreach ($list as $item) {
                   echo " <option value=" .$item->Id."> ".$item->DonVi ."</option>";
                 } ?>
            </select>
        </div>


        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Giá Mua</label>
            <input type="number" class="form-control" id="validationDefault02" name="email" placeholder="Nhập giá" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Giá bán</label>
            <input type="number" class="form-control" id="validationDefault02"name="diachi" placeholder="Nhập Địa Chỉ.." required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Số lượng</label>
            <input type="number" class="form-control" id="validationDefault02" name="email" placeholder="Nhập giá" required>
            <button type="submit" name="create-sp" class=" mt-2 btn-danger btn">Thêm</button>
        </div>

    </div>
</form>
<?php
if(isset($_POST['create-kh'])){
    $ten= $_POST["tenkh"];
    $sdt= $_POST["sdt"];
    $email= $_POST["email"];
    $diachi= $_POST["diachi"];
    KhachHang::add($ten,$sdt,$email,$diachi);


}
?>

