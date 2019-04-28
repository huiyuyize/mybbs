<?php
namespace Home\Controller;

use Think\Controller;

class PostController extends Controller
{
	//发帖
	public function create()
	{

		//可能接收到一个版块id
		$cid=empty($_GET['cid']) ? 0 : $_GET['cid'];
		//如果没有登录 就跳到登录去
		if(empty($_SESSION['flag'])){
			$this->error('请先登录','/');
		}
		//获取板块信息
		$cates=M('bbs_cate')->getField('cid,cname');
		$this->assign('cid',$cid);
		$this->assign('cates',$cates);


		$this->display();//view/post/create.html
	}
	public function save()
	{
		// 帖子数据:标题,内容,用户ID,版块ID,创建时间,修改时间
		$data=$_POST;
		
		//发帖人
		$data['uid']=$_SESSION['userInfo']['uid'];
		// 创建时间  修改时间
		$data['updated_at']=$data['created_at']=time();
		$row=M('bbs_post')->add($data);
		if($row){
			$this->success('贴子发布成功');
		}else{
			$this->error('贴子发布失败');
		}
	}
	// 显示指定版块下的所有帖子
	 public function index()
	  {   
	  		//要显示哪个版块下面的贴子
	  	  $cid=empty($_GET['cid'])? 1 : $_GET['cid'];

	       // 获取数据
	       $posts=M('bbs_post')->where("cid=$cid")->order("updated_at desc")->select(); 
	       $users=M('bbs_user')->getField('uid,uname');


	       //遍历显示
	       $this->assign('cid',$cid);
	       $this->assign('posts',$posts);
	       $this->assign('users',$users);
	       $this->display();
	       //view/post/index.html
	  }
}
