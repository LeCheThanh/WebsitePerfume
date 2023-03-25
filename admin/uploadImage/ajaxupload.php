
<?php
class ImageUploader {
    public function uploadImage($name){
       
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES[$name]['name'];
        $file_size = $_FILES[$name]['size'];
        $file_temp = $_FILES[$name]['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end ($div)); 
        $unique_image = substr(md5(time()), 0, 10).'.'. $file_ext;
        $uploaded_image = "uploads/brand/" .$unique_image;
        if( empty($file_name)){
            return false;
         
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
        }
    }
}

?>