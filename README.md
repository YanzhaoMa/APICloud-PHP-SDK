# APICloud-PHP-SDK

APICloud-PHP-SDK 是基于PHP开发的云API交互SDK，可以方便的与APICloud的数据云进行交互，完成数据云API，统计云API，推送云API的功能。

```php
class example_Count {

    /**
    *   推送后台接口测试
    */
    public function pushyun(){
        $push= new PushModel();
        $push->sendMsg();
    }
}

class example_Count {

	/**
    *   统计后台接口测试
    */
    public function countyun(){  //统计云接口数据
        $count = new CountModel();
        $qdate="2015-11-18";
        $tdate="2015-11-25";
        $count->getcountdata($qdate,$tdate);

    }
}

class example_File {
    
    /*
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
    public function mcm_objExist(){  //判断文件是否存在ById
        $File = new FileModel();
        $id='56541752d953a33b1cf3aab7';
        $File->objExist($id);
    }
    public function mcm_objFindAll(){   //获取所有文件列表$filter
        $File = new FileModel();
        $filter='{"where":{"type":"image/png"},"limit":10}';
        $File->objFindAll($filter);
    }
    public function mcm_objGet(){   //获取文件对象ById
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

class example_Mcm {

	/**
    *   数据云后台接口测试
    */
    public function mcm_add(){  //创建对象
        $mcm = new McmModel();
        $name='product';
        $data['name']='my phone';
        $mcm->objAdd($name,$data);
    }
    public function mcm_findAll(){ //获取所有对象filter数据类型:json(可连接参数:fields,where,limit,skip,order,include,includefilter)
        $mcm = new McmModel();
        $name='product';
        $filter='{"where":{"name":"ipad"},"limit":10}';
        $mcm->objFindAll($name,$filter);
    }
    public function mcm_get(){  //获取对象ById
        $mcm = new McmModel();
        $name='product';
        $id='565334beb08196a25bdb2e16';
        $mcm->objGet($name,$id);
    }
    public function mcm_put(){  //更新对象ById
        $mcm = new McmModel();
        $name='product';
        $id='565334beb08196a25bdb2e16';
        $data['name']='Nokia';
        $mcm->objPut($name,$id,$data);
    }
    public function mcm_delete(){  //删除对象ById
        $mcm = new McmModel();
        $name='product';
        $id='56533856dbcca4c25b2a5451';
        $mcm->objDelete($name,$id);
    }
    public function mcm_count(){  //统计对象数量
        $mcm = new McmModel();
        $name='product';
        $mcm->objCount($name);
    }
    public function mcm_exists(){  //判断对象是否存在ById 
        $mcm = new McmModel();
        $name='product';
        $id='565334beb08196a25bdb2e16';
        $mcm->objExists($name,$id);
    }

    /**
     * Relation对象操作
     */
    public function relationGet(){  //获取关联对象
        $mcm = new McmModel();
        $name='user';
        $id='56532642469b94545b5d8976';
        $relationName='accessTokens';
        $mcm->relationGet($name,$id,$relationName);
    }
    public function relationPost(){ //创建关联对象
        $mcm = new McmModel();
        $name='product';
        $id='565334beb08196a25bdb2e16';
        $relationName='accessTokens';
        $property['name']='ipad';
        $mcm->relationPost($name,$id,$relationName,$property);
    }
    public function relationGetCount(){ //统计关联对象数量
        $mcm = new McmModel();
        $name='user';
        $id='56532642469b94545b5d8976';
        $relationName='accessTokens';
        $mcm->relationGetCount($name,$id,$relationName);
    }
    public function relationDelete() {  //删除所有关联对象
        $mcm = new McmModel();
        $name='user';
        $id='5653c29583e2ee6a5b74d4b3';
        $relationName='accessTokens';
        $mcm->relationDelete($name,$id,$relationName);
    }

    /**
     * user对象操作
     */
    public function userAdd(){  //添加新用户
        $mcm = new McmModel();
        $name='test';
        $password='111111';
        $email='test@yty.com';
        $mcm->useradd($name,$password,$email);
    }
    public function verifyEmail(){ //验证注册邮箱
        $mcm = new McmModel();
        $name='test';
        $email='105895959@qq.com';
        $mcm->verifyEmail($name,$email);
    }
    public function userLogin(){ //用户登录
        $mcm = new McmModel();
        $username='suker';
        $password='111111';
        $mcm->userLogin($username,$password);
    }
    public function userLogout(){ //用户登出
        $mcm = new McmModel();
        $token='RjEaF2z7D5jNibIWeENskQbOh3NsmwVBvE4pmnMmqfrcaZrF5X2ONjix4DEOzLyy';
        $mcm->userLogout($token);
    }
    public function resetRequest(){ //密码重置
        $mcm = new McmModel();
        $username='suker';
        $email='sukerm@163.com';
        $mcm->resetRequest($username,$email);
    }
    public function userGet(){ //获取用户
        $mcm = new McmModel();
        $id='56532642469b94545b5d8976';
        $mcm->userGet($id);
    }
    public function userCount(){    //获取所有用户数量:json(可连接参数:fields,where,limit,skip,order,include,includefilter)
        $mcm = new McmModel();
        $filter='{"where":{"username":"myz"},"limit":10}';
        $mcm->userCount($filter);
    }
    public function userFindAll(){  //获取所有用户数据:json(可连接参数:fields,where,limit,skip,order,include,includefilter)
        $mcm = new McmModel();
        $filter='{"where":{"username":"myz"},"limit":10}';
        $mcm->userFindAll($filter);
    }
    public function userExist(){    //判断用户是否存在
        $mcm = new McmModel();
        $id='56532642469b94545b5d8976';
        $mcm->userExist($id);
    }
    public function userPut(){ //更改用户信息
        $mcm = new McmModel();
        $id='56532642469b94545b5d8976';
        $data['age']='30';
        $mcm->userPut($id,$data);
    }
    public function userDel(){ //删除用户
        $mcm = new McmModel();
        $id='5653cd9eb08196a25bdb2e78';
        $mcm->userDel($id);
    }

    /*
    *   role对象操作
    */
    public function roleAdd() { //创建角色
        $mcm = new McmModel();
        $name='test_role';
        $description='test_description';
        $mcm->roleAdd($name,$description);
    }
    public function rolePut() { //更新角色ById
        $mcm = new McmModel();
        $id='56540c83d953a33b1cf3aa14';
        $name='myz_test';
        $description='test_description';
        $mcm->rolePut($id,$name,$description);
    }
    public function roleCount(){ //获取role数量filter
        $mcm = new McmModel();
        $filter='{"where":{"name":"myz_test"},"limit":10}';
        $mcm->roleCount($filter);
    }
    public function roleExist(){ //判断role是否存在ById
        $mcm = new McmModel();
        $id='56540c83d953a33b1cf3aa14';
        $mcm->roleExist($id);
    }
    public function roleFindAll(){ //获取所有role数据filter
        $mcm = new McmModel();
        $filter='{"where":{"name":"myz_test"},"limit":10}';
        $mcm->roleFindAll($filter);
    }
    public function roleGet() { //获取角色ById
        $mcm = new McmModel();
        $id='56540c83d953a33b1cf3aa14';
        $mcm->roleGet($id);
    }
    public function roleDelete(){ //删除角色ById
        $mcm = new McmModel();
        $id='56540d3ca3b9ab451c6b0481';
        $mcm->roleDelete($id);
    }
}
```


# APICloud-PHP-SDK