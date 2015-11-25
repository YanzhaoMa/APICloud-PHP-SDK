<?php
require('ApicloudModel.php');
/**
*	mcm类
**/
class McmModel extends ApicloudModel{
	const SERVERAPIURL = 'https://d.apicloud.com/';
	/**
	 * 数据对象操作
	 */
	
	function objAdd($name,$obj) //创建对象
	{
		return $this->post(self::SERVERAPIURL.'mcm/api/'.$name,$obj);
	}
	function objFindAll($name,$filter) //获取所有对象filter数据类型:json(可连接参数:fields,where,limit,skip,order,include,includefilter)
	{
		return $this->get(self::SERVERAPIURL.'mcm/api/'.$name.'?filter='.$filter); 
	}
	function objGet($name,$id='') //获取对象ById
	{
		return $this->get(self::SERVERAPIURL.'mcm/api/'.$name.'/'.$id); 
	}
	function objPut($name,$id,$obj) //更新对象ById
	{
		return $this->put(self::SERVERAPIURL.'mcm/api/'.$name.'/'.$id,$obj);
	}
	function objDelete($name,$id)  //删除对象ById
	{
		return $this->delete(self::SERVERAPIURL.'mcm/api/'.$name.'/'.$id);
	}
	function objCount($name)  //统计对象数量
	{
		return $this->count(self::SERVERAPIURL.'mcm/api/'.$name.'/count');
	}
	function objExists($name,$id) //判断对象是否存在ById
	{
		return $this->exists(self::SERVERAPIURL.'mcm/api/'.$name.'/'.$id.'/exists');
	}
	

	/**
	 * Relation对象操作
	 */
	function relationGet($name,$id,$relationName){  //获取关联对象
		return $this->get(self::SERVERAPIURL.'mcm/api/'.$name.'/'.$id.'/'.$relationName);
	}
	function relationPost($name,$id,$relationName,$property){  //创建关联对象
		return $this->post(self::SERVERAPIURL.'mcm/api/'.$name.'/'.$id.'/'.$relationName,$property);
	}
	function relationGetCount($name,$id,$relationName){  //统计关联对象数量
		return $this->get(self::SERVERAPIURL.'mcm/api/'.$name.'/'.$id.'/'.$relationName.'/count');
	}
	function relationDelete($name,$id,$relationName){  //删除所有关联对象
		return $this->delete(self::SERVERAPIURL.'mcm/api/'.$name.'/'.$id.'/'.$relationName);
	}

	
	/**
	 * user对象操作
	 */
	function userAdd($username,$password,$email) //添加新用户
	{
		$body = array("username"=>$username,"password"=>$password,"email"=>$email);
		return $this->objAdd('user',$body);
	}
	function verifyEmail($username,$email) //验证注册邮箱
	{
		$body = array("username"=>$username,"password"=>$password);
		return $this->objAdd('user/verifyEmail',$body);
	}
	function userLogin($username,$password)   //用户登录
	{
		$body = array("username"=>$username,"password"=>$password);
		return $this->objAdd('user/login',$body);
	}
	function userLogout($access_token)  //用户登出
	{
		$this->headerAdd(array("authorization: $access_token"));
		return $this->post(self::SERVERAPIURL.'mcm/api/user/logout');
	}
	function resetRequest($username,$email)  //密码重置
	{
		$body = array("username"=>$username,"email"=>$email);
		return $this->objAdd('user/resetRequest',$body);
	}
	function userGet($id) //获取用户
	{
		return $this->get(self::SERVERAPIURL.'mcm/api/user',$id);
	}
	function userCount($filter){  //获取所有用户数量:json(可连接参数:fields,where,limit,skip,order,include,includefilter)
		return $this->get(self::SERVERAPIURL.'mcm/api/user/count?filter='.$filter);
	}
	function userFindAll($filter){  //获取所有用户数据:json(可连接参数:fields,where,limit,skip,order,include,includefilter)
		return $this->get(self::SERVERAPIURL.'mcm/api/user?filter='.$filter);
	}
	function userExist($id){ //判断用户是否存在ById
		return $this->exists(self::SERVERAPIURL.'mcm/api/user/'.$id.'/exists');
	}
	function userPut($id,$objarray) //更改用户信息
	{
		return $this->put(self::SERVERAPIURL.'mcm/api/user/'.$id,$objarray);
	}
	function userDel($id) //删除用户-需要开启user表的删除权限
	{
		return $this->Delete(self::SERVERAPIURL.'mcm/api/user',$id);
	}

 
	/**
	 * 角色操作
	 */
	function roleAdd($name,$description)  //创建角色
	{
		$body = array("name"=>$name,"description"=>$description);
		return $this->objAdd('role',$body);
	}
	function rolePut($id,$name,$description) //更新角色ById
	{
		$body = array("name"=>$name,"description"=>$description);
		return $this->objPut('role',$id,$body);
	}
	function roleCount($filter) 	//获取所有对象数量filter:json(可连接参数:fields,where,limit,skip,order,include,includefilter)
	{
		return $this->get(self::SERVERAPIURL.'mcm/api/role/count/?filter='.$filter); 
	}
	function roleExist($id){ //判断role是否存在ById
		return $this->objGet('role',$id.'/exists');
	}
	function roleFindAll($filter){  //获取所有对象filter数据类型:json(可连接参数:fields,where,limit,skip,order,include,includefilter)
		return $this->get(self::SERVERAPIURL.'mcm/api/role?filter='.$filter);
	}
	function roleGet($id='') //获取角色ById
	{
		return $this->objGet('role',$id);
	}
	function roleDelete($id) //删除角色ById
	{
		return $this->objDelete('role',$id);
	}
}

?>