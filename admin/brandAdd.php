<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>

<div >
    <form action="" method="post"  id="form_add_brand" enctype="multipart/form-data">
        <div>
            <?php
        
            ?>
        </div>
    <table>
        <tr>
            <td>
                <input type="text" name="brandName" placeholder="Thêm tên thương hiệu...">
            </td>
        </tr>
        <tr>
            <td>
                <input  id="uploadImage" type="file" name="brandImage" placeholder="Thêm ảnh...">
                <div id="preview"></div>
                <br>
            </td>
            
        </tr>
        <tr>
            <td>
                <textarea name="brandDesc" id="" cols="30" rows="10" placeholder="Mô tả..."></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Thêm">
            </td>
        </tr>
        <div id="err"></div>
    </table>
    </form>
<hr>


</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
$('#form_add_brand').submit(function(event) {
    event.preventDefault(); // Ngăn chặn form submit bình thường
    var formData = new FormData(this); // Tạo đối tượng FormData để chứa dữ liệu form
    $.ajax({
      type: 'POST', 
      url: './xuly.php',
      data: formData,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response) {
        // response = JSON.parse(response);
        console.log("response :",response);
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
        // var msg = '';
        // if (jqXHR.status === 0) {
        //     msg = 'Not connect.\n Verify Network.';
        // } else if (jqXHR.status == 404) {
        //     msg = 'Requested page not found. [404]';
        // } else if (jqXHR.status == 500) {
        //     msg = 'Internal Server Error [500].';
        // } else if (exception === 'parsererror') {
        //     msg = 'Requested JSON parse failed.';
        // } else if (exception === 'timeout') {
        //     msg = 'Time out error.';
        // } else if (exception === 'abort') {
        //     msg = 'Ajax request aborted.';
        // } else {
        //     msg = 'Uncaught Error.\n' + jqXHR.responseText;
        // }
      }
    });
  });
});
</script>
