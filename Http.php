<?php
/**
* Http类
*/
class Http{
	public $location = 1;
	public $autoreferer = 1;
	public $httpheader ="";
	public $header = 0;
	public $returntransfer = 1;
	
	function get($url)
	{
		return $this->exec($url);
	}
	function post($url,$body)
	{
		return $this->exec($url,'POST',$body);
	}
	function put($url,$body)
	{
		return $this->exec($url,'PUT',$body);
	}
	function delete($url)
	{
		return $this->exec($url,'DELETE');
	}
	function count($url)
	{
		return $this->exec($url);
	}
	function exists($url)
	{
		return $this->exec($url);
	}

	function headerAdd($header)
	{
		$this->httpheader = array_merge($this->httpheader,$header);
	}
	private function exec($url,$method='GET',$body='')
	{
		$timeout = 30;
		$curl=curl_init();
	    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
	    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
	    curl_setopt($curl, CURLOPT_HTTPHEADER , array("X-HTTP-Method-Override: $method"));
	    curl_setopt($curl, CURLOPT_HTTPHEADER , $this->httpheader);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); // 从证书中检查SSL加密算法是否存在
	    //curl_setopt($this->curl, CURLOPT_CAINFO,dirname(__FILE__).'/cacert.pem');
	    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
	    // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, $this->location); // 使用自动跳转
	    curl_setopt($curl, CURLOPT_AUTOREFERER, $this->autoreferer); // 自动设置Referer
	    //curl_setopt($this->curl, CURLOPT_POST, 0); // 发送一个常规的Post请求
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $body); // Post提交的数据包
	    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout); // 设置超时限制防止死循环
	    curl_setopt($curl, CURLOPT_HEADER, $this->header); // 显示返回的Header区域内容
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, $this->returntransfer); // 获取的信息以文件流的形式返回
	    $totalline = curl_exec($curl); // 执行操作
	    if (curl_errno($curl)) {
	    	echo 'Errno'.curl_error($curl);//捕抓异常
	    }
	 
	    curl_close($curl); // 关闭CURL会话
	    // dump($totalline);
	    echo $totalline; // 返回数据
	}

}
?>