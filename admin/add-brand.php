<?php

include_once '../libs/database.php';
include_once '../helpers/format.php';

class brandC{
    private $db;
    private $frm;

    public function __construct()
    {
        $this->db= new Database(); 
        $this->frm= new Format();
    }

    public function insertBrand($brandName, $brandDesc, $brandImage){
        $brandName = $this->frm->validation($brandName);
        $brandDesc = $this->frm->validation($brandDesc);
        $brandName = mysqli_real_escape_string($this->db->link,$brandName);
        $brandDesc = mysqli_real_escape_string($this->db->link, $brandDesc);

        if(empty($brandName) || empty($brandDesc) || empty($brandImage)){
            echo json_encode(array(
                'status' => 0,
                'message' => 'Chưa nhập đầy đủ thông tin'
            ));
            exit;
        }else{
            // Xử lý upload hình ảnh
            $target_dir = "../uploads/brand/";
            $file_name = basename($brandImage["name"]);
            $target_file = $target_dir . $file_name;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Kiểm tra định dạng ảnh
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                echo json_encode(array(
                    'status' => 0,
                    'message' => 'Định dạng ảnh không hợp lệ'
                ));
                exit;
            }
            // Upload ảnh vào thư mục
            if (move_uploaded_file($brandImage["tmp_name"], $target_file)) {
                $query="INSERT INTO `brand`(brandName, brandDescription, brandImage) VALUES ('$brandName', '$brandDesc', '$file_name')";
                $result = $this->db->insert($query);
                echo json_encode(array(
                    'status' => 1,
                    'message' => 'Thêm thành công'
                ));
                exit;
            } else {
                echo json_encode(array(
                    'status' => 0,
                    'message' => 'Lỗi khi upload ảnh'
                ));
                exit;
            }           
        }
    }
}
?>
<form id="add-brand-form">
  <div class="form-group">
    <label for="brand-name">Tên thương hiệu:</label>
    <input type="text" class="form-control" id="brand-name" name="brand-name" required>
  </div>
  <div class="form-group">
    <label for="brand-desc">Mô tả thương hiệu:</label>
    <textarea class="form-control" id="brand-desc" name="brand-desc" rows="3" required></textarea>
  </div>
  <div class="form-group">
    <label for="brand-image">Hình ảnh:</label>
    <input type="file" class="form-control-file" id="brand-image" name="brand-image" required>
  </div>
  <button type="submit" class="btn btn-primary">Thêm thương hiệu</button>
</form>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
  $('#add-brand-form').submit(function(event) {
    event.preventDefault(); // Ngăn chặn form submit bình thường
    var form = $(this);
    var formData = new FormData(form[0]); // Tạo đối tượng FormData để chứa dữ liệu form
    $.ajax({
      type: 'POST',
      url: 'add-brand.php',
      data: formData,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response) {
        if (response.status == 1) {
          // Thêm thành công, hiển thị thông báo và reset form
          alert(response.message);
          form.trigger('reset');
        } else {
          // Thêm thất bại, hiển thị thông báo lỗi
          alert(response.message);
        }
      },
      error: function() {
        // Lỗi kết nối đến server
        alert('Không thể kết nối đến server');
      }
    });
  });
});

</script>
