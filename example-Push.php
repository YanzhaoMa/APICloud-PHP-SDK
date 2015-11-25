<?php
require('PushModel.php');
/**
*  ApiCloud 统计云Count
**/
class PushModel_Count {
    /**
    *   推送后台接口测试
    **/
    public function pushyun(){
        $push= new PushModel();
        $push->sendMsg();
    }
}
	$pp=new PushModel_Count();
	$pp->pushyun();
?>