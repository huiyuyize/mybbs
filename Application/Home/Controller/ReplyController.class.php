<?php
namespace Home\Controller;

use Think\Controller;

class ReplyController extends Controller
{
	//添加回复
	public function create()
	{
		$pid = $_GET['pid'];
		//贴子的信息
		$post=M('bbs_post')->find($pid);
		//贴子所有的回复信息
		$replys=M('bbs_reply')->where("pid=$pid")->select();

		//用户信息
		$users=M('bbs_user')->select();
		$users=array_column($users,null,'uid');
		//贴子浏览数加1
		M('bbs_post')->where("pid=$pid")->setInc('view_cnt',1);


		$this->assign('post',$post);
		$this->assign('users',$users);
		$this->assign('replys',$replys);
		$this->display();//view/reply/create.html

	}
	//添加保存
	public function save()
	{
		if(empty($_SESSION['flag'])){
			$this->error('请先登录','/');
		}
		$data=$_POST;
		$data['created_at']=time();
		$data['uid']=$_SESSION['userInfo']['uid'];

		$row=M('bbs_reply')->add($data);
		if($row){
			$Post=M('bbs_post')->where('pid='.$data['pid']);
			
			$row=$Post->save(['updated_at'=>time()]);
			$Post->setInc('rep_cnt',1);
			if(!$row){
				die('<hr>更新贴子时间失败');
			}
			$this->success('添加成功','/index.php?m=home&c=reply&a=create&pid='.$data['pid']);
		}else{
			$this->error('添加回复失败');
		}

	}



}