<?php
/**
* ApicloudModel
*/
require('Http.php');
class ApicloudModel extends Http {
	
	protected $http;
    protected $appid = "A6993735869119";
    protected $appkey = "681C8916-1438-3861-AAD1-146274BDFB46";
    // protected $appid = "A6961432222584";
    // protected $appkey = "179AD9D4-FEF1-30DF-2D6C-606FD8C9CB73";


	function __construct()
	{
    	$now = time();
		$this->httpheader = array(
            "X-APICloud-AppId: ".$this->appid,
            "X-APICloud-AppKey: ".sha1($this->appid."UZ".$this->appkey."UZ".$now).".".$now 
        );
	}
}
?>