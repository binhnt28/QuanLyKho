
<?php
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
            <input type="text" class="form-control" id="validationDefault01" value="<?= $sanphams->TenSP ?>" name="tensp" placeholder="Tên Sản Phẩm" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Đơn Vị tính</label>
            <select class="form-control" id="lsp_ma"  name="dvt">
                <?php foreach ($list as $item) {
                    echo "<option value=".$item->Id.">".$item->DonVi ."</option>";
                } ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Giá Mua</label>
            <input type="number" class="form-control" value="<?= $sanphams->GiaMua ?>" id="validationDefault02" name="giamua" placeholder="Nhập giá" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Giá bán</label>
            <input type="number" class="form-control" id="validationDefault02" value="<?= $sanphams->GiaBan ?>" name="giaban" placeholder="Nhập giá.." required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Số lượng</label>
            <input type="number" class="form-control" id="validationDefault02" value="<?= $sanphams->SoLuong ?>" name="soluong" placeholder="Nhập số lượng" required>
            <button type="submit" name="create-sp" class=" mt-2 btn-danger btn">Update</button>
        </div>

    </div>
</form>
<?php
if(isset($_POST['create-sp'])){
    $ten= $_POST["tensp"];
    $id = $sanphams->Id;
    $dvt= $_POST["dvt"];
    $giamua= $_POST["giamua"];
    $giaban= $_POST["giaban"];
    $soluong= $_POST["soluong"];
    SanPham::update($id,$ten,$dvt,$giamua,$giaban,$soluong);
}
?>

