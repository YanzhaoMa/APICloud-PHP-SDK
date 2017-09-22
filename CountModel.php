<?php
require('ApicloudModel.php');
/**
*  ApiCloud 统计云Count
**/
class CountModel extends ApicloudModel{

	function getcountdata($startDate,$endDate){
        echo $this->Go($startDate,$endDate);
    }

	function Go($startDate,$endDate){
		$url = "https://r.apicloud.com/analytics/getAppStatisticDataById";
    	$body = "startDate=$startDate&endDate=$endDate";
    	
    	return $this->post($url,$body);
	}
}

?>
