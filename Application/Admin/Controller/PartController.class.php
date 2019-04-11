<?php
namespace Admin\Controller;

use Think\Controller;

class PartController extends CommonController
{

   public function __construct()
  {
    parent::__construct();
    //验证是否成功登录 如果没有登录 就跳转到登录窗口
     if(empty($_SESSION['flag'])){
      $this->error('请先登录','/index.php?m=admin&c=login&a=login');
     }
  }
	//添加分区  表单
   public function create()
   {
   		 // 获取所有分区    
   		 $parts = M('bbs_part')->select();
         $this->assign('parts', $parts);   
         $this->display(); // View/Cate/create.html 
   }
   //接收数据 保存
   public function save()
   {
         try{
   		$row=M('bbs_part')->add($_POST);
            }catch(\Exception $e){
                     $this->error($e->getMessage());
            }
   		if($row){
   			$this->success('添加分区成功');
   		}else{
   			$this->error('添加分区失败');
   		}
   }
   //查看所有分区
   public function index()
   {
   		//获取数据
   		$parts=M('bbs_part')->select();
   		//遍历显示
   		$this->assign('parts',$parts);
   		$this->display();
   		
   }
   //删除分区
   public function del()
   {
   	$pid=$_GET['pid'];
   	$row=M('bbs_part')->delete($pid);
   	if($row){
   		$this->success('删除分区成功');
   	}else{
   		$this->error('删除分区失败');
   	}
   }
   //修改分区--显示原有数据
   public function edit()
   {
   		$pid=$_GET['pid'];
   		$part=M('bbs_part')->find($pid);
   		$this->assign('part',$part);
   		$this->display();
   } 
   //修改分区  接收新数据
   public function update()
   {
   			$pid=$_GET['pid'];
   			$row=M('bbs_part')->where("pid=$pid")->save($_POST);
   			if($row){
   		    $this->success('修改成功');
   	}else{
   		$this->error('修改失败');
   	}
   }
}