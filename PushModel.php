<?php
require('ApicloudModel.php');
/**
* ApiCloud 推送云Push
*/
class PushModel extends ApicloudModel{    
    
    function sendMsg()
    {
        $title='恭喜发财'; //消息标题
        $content='消息内容'; //消息内容
        $type = 2;    //1:消息 2:通知
        $platform = 0;//0:全部平台，1：ios, 2：android
        $groupName = "group1"; //推送组名，多个组用英文逗号隔开.默认:全部组。eg.group1,group2 .
        $userIds = ""; //推送用户id, 多个用户用英文逗号分隔，eg. user1,user2。

        echo $this->push($title,$content,$type,$platform,$groupName,$userIds);
    }

	function push($title,$content,$type,$platform,$groupName,$userIds)
	{
		$url = "https://p.apicloud.com/api/push/message";
    	$body = "title=$title&content=$content&type=$type&platform=$platform&groupName=$groupName&userIds=$userIds";
    	
    	return $this->post($url,$body);
	}
}
?>