<?php
require('ApicloudModel.php');
/**
*  ApiCloud File文件操作类
**/
class FileModel extends ApicloudModel{
	const SERVERAPIURL = 'https://d.apicloud.com/';
	/**
	 * File对象操作
	 */
	function objAddFile($tmpname,$tmpfile,$tmpType){  //上传新文件
		$data = array(
            'file'=>'@'.realpath($tmpfile).";type=".$tmpType.";filename=".$tmpname
        );
		return $this->upload_file(self::SERVERAPIURL.'mcm/api/file',$data);
	}
	function objPutFile($tmpname,$tmpfile,$tmpType,$id){ //修改文件参数
		$data = array(
            'file'=>'@'.realpath($tmpfile).";type=".$tmpType.";filename=".$tmpname,'id'=>$id
        );
		return $this->upload_file(self::SERVERAPIURL.'mcm/api/file',$data);
	}
	function objCount($filter){ //获取所有文件数量:json(可连接参数:fields,where,limit,skip,order,include,includefilter)
		return $this->get(self::SERVERAPIURL.'mcm/api/file/count?filter='.$filter);
	}
	function objExist($id){  //判断文件是否存在ById
		return $this->exists(self::SERVERAPIURL.'mcm/api/file/'.$id.'/exists');
	}
	function objFindAll($filter){ //获取所有文件列表:json(可连接参数:fields,where,limit,skip,order,include,includefilter)
		return $this->get(self::SERVERAPIURL.'mcm/api/file?filter='.$filter);
	}
	function objGet($id) //获取文件对象ById
	{
		return $this->get(self::SERVERAPIURL.'mcm/api/file/'.$id); 
	}
	function objDelete($id)  //删除文件对象ById
	{
		return $this->delete(self::SERVERAPIURL.'mcm/api/file/'.$id);
	}
}

?>