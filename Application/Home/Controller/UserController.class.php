<?php
namespace Home\Controller;


use Think\Controller;
use Think\Image;


class UserController extends Controller
{
	//修改个人中心部分
	public function edit()
	{
		//获取用户信息
		$user = $_SESSION['userInfo'];
		$this->assign('user',$user);
		$this->display();
	}
	public function update()
	{
		$uid = $_SESSION['userInfo']['uid'];
		$data = $_POST;


		  if($_FILES['uface']['error']!==4){
    		  $data['uface'] = $this->doUP();//处理上传图片返回给$data
     	   		$this->doSm($data['uface']);//生成小图片


   		 }
   		 
  		  $row = M('bbs_user')->where("uid=$uid")->save($data);
  		
  	  if($row){
  	  	$_SESSION['userInfo'] = M('bbs_user')->find($uid);
   	   $this->success('修改用户成功','/index.php?m=home&c=index&a=index');
    	}else{
      $this->error('修改用户失败');
   	 }
	}


	 //处理上传图片部分
  private function doUp()
  {
     $config = [
          'maxSize' => 3145728,
        'rootPath' => './',
        'savePath' => 'Public/Uploads/',
        'saveName' => array('uniqid',''),
        'exts' => array('jpg', 'gif', 'png', 'jpeg'),
        'autoSub' => true,
        'subName' => array('date','Ymd'),
         ];
      $upload = new \Think\Upload($config);// 实例化上传类    
          $info = $upload->upload();
            //判断是否上传成功
          if(!$info) {// 上传错误提示错误信息
              $this->error($upload->getError());
            }
            //拼接上传完整路径文件名
          return $this->filename = $info['uface']['savepath'].$info['uface']['savename'];
  }
  //生成小图片部分
  private function doSm($filename)
  {
      //打开图片,进行后续处理
          $image = new Image(Image::IMAGE_GD,$filename);
          //生成小图片
          $image->thumb(150, 150)->save('./'.getSm($filename));
  }
 
}