<?php

?>
<?php
Class Uploads{
    ///UploadImage
    // public function uploadimage($file){
    //     if($file['name']!=''){
    //         $extension = explode(".",$file['name']);
    //             $file_extension = end($extension);
    //             $allow_type= array('jpeg', 'jpg', 'png', 'gif', 'webp'); // valid extensions
    //             if(in_array($file_extension,$allow_type)){
    //                 $new_name=rand()."." .$file_extension;
    //                 $path = 'uploads/brand/'.$new_name; // upload directory
    //                 if(move_uploaded_file($file['tmp_name'],$path)){
                       
    //                     $json=json_encode(array(
    //                         'status'=>1,
    //                         'previewImage'=> $path,
    //                         'message'=>'Thêm ảnh thành công'
    //                     ));
    //                     return false;
    //                 }
    //             }else{
    //                 $json=json_encode(array(
    //                     'status'=>0,
    //                     'message'=>'chỉ nhận file ảnh JPG, PNG , WEBP'
    //                 ));
    //                 return false;
    //             }
    //     }else{
    //         $json=json_encode(array(
    //             'status'=>0,
    //             'message'=>'Vui lòng chọn ảnh!'
    //         ));
    //         return false;
    //     }
    //     // echo $json;
    //     }
    // public function uploadimage($file){
    //     if($file['name']!=''){

    //         $extension = explode(".",$file['name']);
    //             $file_extension = end($extension);
    //             $allow_type= array('jpeg', 'jpg', 'png', 'gif', 'webp'); // valid extensions
    //             if(in_array($file_extension,$allow_type)){
    //                 $new_name=rand()."." .$file_extension;
    //                 $path = 'uploads/brand/'.$new_name; // upload directory
    //                 if(move_uploaded_file($file['tmp_name'],$path)){
    //                     $json=json_encode(array(
    //                         'status'=>1,
    //                         'previewImage'=> $path,
    //                         'message'=>'Thêm ảnh thành công'
    //                     ));
    //                     return $json;
    //                 }
    //             }else{
    //                 $json=json_encode(array(
    //                     'status'=>0,
    //                     'message'=>'Chỉ nhận file ảnh JPG, PNG, WEBP'
    //                 ));
    //                 return $json;
    //             }
    //     }else{
    //         $json=json_encode(array(
    //             'status'=>0,
    //             'message'=>'Vui lòng chọn ảnh!'
    //         ));
    //         return $json;
    //     }
    // } 
    

}

?>