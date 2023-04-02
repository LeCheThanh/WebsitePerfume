<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php include '../classes/brandC.php'?>
<?php
    $brand = new brandC();
    if(isset($_GET['delbrandId']) ){
        $delId=$_GET['delbrandId'];
        $delBrand= $brand->deleteBrand($delId);
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách thương hiệu</title>
</head>
<body>
    <table>
    <?php
            // if(isset($delCate)){
            //     echo $delCate;
            // }
            // ?>
    <tr>
        <th>Brand ID</th>
        <th>Brand Name</th>
        <th>Brand Image</th>
        <th>Brand Description</th>
    </tr>
    <?php
        $showlistBrand = $brand->showlistBrand();
        if(isset($showlistBrand)){
            while($result=$showlistBrand->fetch_assoc()){

            
        
    ?>
        <tr>
            <td><?php echo $result['brandId'];?></td>
            <td><?php echo $result['brandName'];?></td>
            <td><?php echo $result['brandImage'];?></td>
            <td><?php echo $result['brandDescription'];?></td>
            <td><a href="brandEdit.php?brandId=<?php echo $result['brandId']?>">Edit</a>|<a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="?delbrandId=<?php echo $result['brandId']?>">Delete</a></td>
        </tr>
        <?php }
    } ?>
    </table>
</body>
</html>
<!-- <body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>User <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="#" class="btn btn-secondary"><i class="material-icons"></i> <span>Add New User</span></a>
                        <a href="#" class="btn btn-secondary"><i class="material-icons"></i> <span>Export to Excel</span></a>						
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>						
                        <th>Date Created</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><a href="#"><img src="/examples/images/avatar/1.jpg" class="avatar" alt="Avatar"> Michael Holz</a></td>
                        <td>04/10/2013</td>                        
                        <td>Admin</td>
                        <td><span class="status text-success">•</span> Active</td>
                        <td>
                            <a href="#" class="settings" title="" data-toggle="tooltip" data-original-title="Settings"><i class="material-icons"></i></a>
                            <a href="#" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><i class="material-icons"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><a href="#"><img src="/examples/images/avatar/2.jpg" class="avatar" alt="Avatar"> Paula Wilson</a></td>
                        <td>05/08/2014</td>                       
                        <td>Publisher</td>
                        <td><span class="status text-success">•</span> Active</td>
                        <td>
                            <a href="#" class="settings" title="" data-toggle="tooltip" data-original-title="Settings"><i class="material-icons"></i></a>
                            <a href="#" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><i class="material-icons"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><a href="#"><img src="/examples/images/avatar/3.jpg" class="avatar" alt="Avatar"> Antonio Moreno</a></td>
                        <td>11/05/2015</td>
                        <td>Publisher</td>
                        <td><span class="status text-danger">•</span> Suspended</td>                        
                        <td>
                            <a href="#" class="settings" title="" data-toggle="tooltip" data-original-title="Settings"><i class="material-icons"></i></a>
                            <a href="#" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><i class="material-icons"></i></a>
                        </td>                        
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><a href="#"><img src="/examples/images/avatar/4.jpg" class="avatar" alt="Avatar"> Mary Saveley</a></td>
                        <td>06/09/2016</td>
                        <td>Reviewer</td>
                        <td><span class="status text-success">•</span> Active</td>
                        <td>
                            <a href="#" class="settings" title="" data-toggle="tooltip" data-original-title="Settings"><i class="material-icons"></i></a>
                            <a href="#" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><i class="material-icons"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><a href="#"><img src="/examples/images/avatar/5.jpg" class="avatar" alt="Avatar"> Martin Sommer</a></td>
                        <td>12/08/2017</td>                        
                        <td>Moderator</td>
                        <td><span class="status text-warning">•</span> Inactive</td>
                        <td>
                            <a href="#" class="settings" title="" data-toggle="tooltip" data-original-title="Settings"><i class="material-icons"></i></a>
                            <a href="#" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><i class="material-icons"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>     

</body> -->