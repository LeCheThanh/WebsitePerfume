<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php include '../classes/brandC.php'?>
<?php
    $brand = new brandC();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $brandName = $_POST['brandName'];
        // $brandImage = $_POST['brandImage'];
        $brandDesc = $_POST['brandDesc'];
        $insertBrand=$brand->insertBrand($brandName, $_FILES,$brandDesc);
    }
?>
<!-- <script type="text/javascript" src="/assets/ajaxupload.js"></script> -->
<div >
    <form action="brandAdd.php" method="post"  id="form_add_brand" enctype="multipart/form-data">
        <div>
            <?php
        //     if(isset($insertBrand)){
        //         echo $insertBrand;
        //  }
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
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function(){
    $( "#form_add_brand" ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        url:"brandAdd.php",
        type:"post",
        data: new FormData(this),
        contentType:false,
        processData:false,
        success:function(data){
            $('#preview').html(data);
            $('#uploadImage').val('');
            // data = JSON.parse(data);
            // console.log("console :",console);
            // if(data.status==0){
            //     swal("Thông báo", response.message, "error");

            // }else{
            //     swal("Thông báo", response.message, "success");
            //     setTimeout(function(){location.href ='brandList.php';}, 1000);
            // }
            }
         });
    });
});
</script>
