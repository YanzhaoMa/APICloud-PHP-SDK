<?php
require('CountModel.php');
class example_Count {
	/**
    *   统计后台接口测试
    **/
    public function countyun(){  //统计云接口数据
        $count = new CountModel();
        $qdate="2015-11-18";
        $tdate="2015-11-25";
        $count->getcountdata($qdate,$tdate);

    }
}
	$cc=new example_Count();
    $cc->countyun();
?>