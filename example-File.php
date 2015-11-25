<html>
<head><title>example_File</title></head>
<body>
<?php
require('FileModel.php');
class example_File {
	/**
     * File对象操作
     */
    public function mcm_addFile($tmpname,$tmpfile,$tmpType){  //上传文件 
        $File = new FileModel();
        $File->objAddFile($tmpname,$tmpfile,$tmpType);
    }
    public function mcm_putFile($tmpname,$tmpfile,$tmpType,$id){  //修改文件ById
    	$File = new FileModel();
    	$File->objPutFile($tmpname,$tmpfile,$tmpType,$id);
    }
    public function mcm_fileCount(){  //获取file文件数量
    	$File = new FileModel();
    	$filter='{}';
    	$File->objCount($filter);
    }
    public function mcm_objExist(){	 //判断文件是否存在ById
    	$File = new FileModel();
    	$id='56541752d953a33b1cf3aab7';
    	$File->objExist($id);
    }
    public function mcm_objFindAll(){	//获取所有文件列表$filter
    	$File = new FileModel();
    	$filter='{"where":{"type":"image/png"},"limit":10}';
    	$File->objFindAll($filter);
    }
    public function mcm_objGet(){	//获取文件对象ById
    	$File = new FileModel();
    	$id='5655abc0ee8a61bf59758c25';
    	$File->objGet($id);
    }
    public function mcm_objDelete(){  //删除文件对象ById
    	$File = new FileModel();
    	$id='5655749ac9a15ae50d392c8e';
    	$File->objDelete($id);
    }
}



	$ex= new example_File();
    if($_POST){
        $tmpname = $_FILES['fname']['name'];
        $tmpfile = $_FILES['fname']['tmp_name'];
        $tmpType = $_FILES['fname']['type'];
        $ex->mcm_addFile($tmpname,$tmpfile,$tmpType);  //上传文件
        
    }
    $ex->mcm_fileCount();
    // $ex->mcm_objExist();
    // $ex->mcm_objFindAll();
    // $ex->mcm_objGet();
    // $ex->mcm_objDelete();
?>

<form action="" enctype="multipart/form-data" method="POST" >
    
    <input type="file" name="fname"/>

    <input type="submit" name="提交"/>
</form>
</body></html>