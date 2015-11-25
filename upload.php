<?php

    /**
     * Email net.webjoy@gmail.com
     * author jackluo
     * 2014.11.21
     * 
     */

    //*
     $httpheader ="";
     $http;
     $appid = "A6993735869119";
     $appkey = "681C8916-1438-3861-AAD1-146274BDFB46";
    // protected $appid = "A6961432222584";
    // protected $appkey = "179AD9D4-FEF1-30DF-2D6C-606FD8C9CB73";


    function __construct()
    {
        $now = time();
        $this->httpheader = array(
            "X-APICloud-AppId: ".$this->appid,
            "X-APICloud-AppKey: ".sha1($this->appid."UZ".$this->appkey."UZ".$now).".".$now
        );
        echo 'aa';
    }
    function headerAdd($header)
    {
        $this->httpheader = array_merge($this->httpheader,$header);
    }
    function curl_post($url, $data, $header = array()){
            if(function_exists('curl_init')) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                if(is_array($header) && !empty($header)){
                    $set_head = array();
                    foreach ($header as $k=>$v){
                        $set_head[] = "$k:$v";
                    }
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $set_head);
                }
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, 1);// 1s to timeout.
                $response = curl_exec($ch);
                if(curl_errno($ch)){
                    //error
                    return curl_error($ch);
                }
                $reslut = curl_getinfo($ch);
                print_r($reslut);
                curl_close($ch);
                $info = array();
                if($response){
                    $info = json_decode($response, true);
                }
                return $info;
            } else {
                throw new Exception('Do not support CURL function.');
            }
    } 

     /**
         *  curl文件上传
         *  @var  struing  $r_file  上传文件的路劲和文件名  
         *     
         */
    /*     
    function upload_file($url,$r_file)
     {
        $file = array("fax_file"=>'@'.$r_file,'type'=>'image/jpeg');//文件路径，前面要加@，表明是文件上传.
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_POST,1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$file);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        $result = curl_exec($curl);  //$result 获取页面信息 
        curl_close($curl);
        echo $result ; //输出 页面结果
   }*/
    
   function upload_file($url,$filename,$path,$type){
        $data = array(
            'file'=>'@'.realpath($path).";type=".$type.";filename=".$filename
        );
        var_dump($data);exit;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true );
        curl_setopt($ch, CURLOPT_HTTPHEADER , $this->httpheader);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_getinfo($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post); 
        $return_data = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Errno:'.curl_error($ch);//捕抓异常
        } 
        
        curl_close($ch);
        echo $return_data;       
   }




    if ($_POST) {
        $url = 'https://d.apicloud.com/mcm/api/file';
        //
        $path = $_SERVER['DOCUMENT_ROOT'];

        // print_r($_FILES);
        // exit;

        //$filename = $path."/232.jpg";
        //upload tmp
        $tmpname = $_FILES['fname']['name'];
        $tmpfile = $_FILES['fname']['tmp_name'];
        $tmpType = $_FILES['fname']['type'];

        // echo realpath($path).";type=".$type.";filename=".$filename;exit;
//        echo $tmpType;
        upload_file($url,$tmpname,$tmpfile,$tmpType);
        /*
        $data = array(
                'path'=>"@$path/232.jpg",
                'name'=>'h'
        );
        */
        //'pic'=>'@/tmp/tmp.jpg', 'filename'=>'tmp'
        //$data = array('pic'=>"@$filename", 'filename'=>'tmp');
/*
        $data = array(
            'uid'    =>    10086,
            'pic'    =>    '@$tmpfile'.';type='.$tmpType
        );
        $info = api_notice_increment($url, $data);
*/
        //$info = curl_post($url, $data);
        //$info = api_notice_increment($url, $data);
        //upload_file($url,$tmpfile);
        //print_r($info);
        exit;
/*
        $file = 'H:\www\test\psuCARGLSPA-pola.jpg'; //要上传的文件
        $src = upload_curl_pic($file);
        echo $src;
*/
    }    
?>

<form action="http://api.jiuaidian.com/APICloudPHP/upload.php" enctype="multipart/form-data"  method="post">
  <p>UpLoad: <input type="text" name="fname" /></p>
  <p>UpLoad: <input type="file" name="fname" /></p>

  <input type="submit" value="Submit" />
</form>