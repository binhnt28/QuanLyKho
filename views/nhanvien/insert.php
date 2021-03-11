<form method="post" name="create-kh">
    <div class="form-group ml-5">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Tên Khách Hàng</label>
            <input type="text" class="form-control" id="validationDefault01" name="tenkh" placeholder="Tên" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Điện Thoại</label>
            <input type="phone" class="form-control" id="validationDefault02"name="sdt" placeholder="Số điện thoại" required>
        </div>

        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Email</label>
            <input type="email" class="form-control" id="validationDefault02" name="email" placeholder="Nhập Email" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Địa Chỉ</label>
            <input type="text" class="form-control" id="validationDefault02"name="diachi" placeholder="Nhập Địa Chỉ.." required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Tài Khoản</label>
            <input type="text" class="form-control" id="validationDefault02"name="taikhoan" placeholder="Nhập Địa Chỉ.." required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">Mật Khẩu</label>
            <input type="text" class="form-control" id="validationDefault02"name="matkhau" placeholder="Nhập Địa Chỉ.." required>

        </div>
        <div class="col-md-4 mb-3">
            <label for="validationDefault02">IsActive</label>
            <select class="form-control" name="isactive" >
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            <button type="submit" name="create-kh" class=" mt-2 btn-danger btn">Thêm</button>

        </div>
    </div>
</form>
<?php
if(isset($_POST['create-kh'])){
    $ten= $_POST["tenkh"];
    $sdt= $_POST["sdt"];
    $email= $_POST["email"];
    $diachi= $_POST["diachi"];
    $taikhoan= $_POST["taikhoan"];
    $matkhau= $_POST["matkhau"];
    $isactive= $_POST['isactive'];
    NhanVien::add($ten,$sdt,$email,$diachi,$taikhoan,$matkhau,$isactive);

}
?>