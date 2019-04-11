<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Image;
use Think\Upload;

class UserController extends CommonController
{   
  //显示表单
         
   public function create()
         {
     
     //显示create.html文件
     	$this->display();
    }
    //接收表单数据  保存到数据库
    public function save()
    {
        $data=$_POST;
        $data['created_at']=time();//添加时间
    //密码不能为空
    if(empty($data['upwd'])||empty($data['reupwd']))
    {
        $this->error('密码不能为空');

    }
    //判断是否一致
    if($data['upwd']!==$data['reupwd']){
        $this->error('两次密码不一致');
    }
    //加密密码
    $data['upwd']=password_hash($data['upwd'],PASSWORD_DEFAULT);

    //处理上传文件
    $data['uface'] = $this->doUp();

    // 拼接一个缩略图的名称
     // $thumb_name = $info['uface']['savepath'].'sm_'.$info['uface']['savename'];

     // 生成一个缩略图
     $this->doSm();

    //添加到数据库  返回一个受影响行数
    $row=M('bbs_user')->add($data);

    if($row){
        $this->success('添加用户成功');
    }else{
        $this->error('添加用户失败');
    }

    }
    public function index()
    {
      //定义一个空的条件数组
      $condition=[];
      //判断有没有性别条件
      if(!empty($_GET['sex'])){
        $condition['sex']=['eq',"{$_GET['sex']}"];
      }
      //判断有没有姓名条件
      if(!empty($_GET['uname'])){
        $condition['uname']=['like',"%{$_GET['uname']}%"];
      }

         // 实例化一个表对象
      $User = M('bbs_user');

    // 得到满足条件的总记录数 
    $cnt = $User -> where( $condition ) -> count(); 

    // 实例化分页类 传入总记录数和每页显示的记录数(3)
    
     $Page = new \Think\Page($cnt, 3);

    // 得到分页显示html代码 
    $html_page = $Page->show();

    // 把分页生成的 html页码 分配给模板
    
      $this->assign('html_page', $html_page);

      // 获取数据 
      $users = $User->where( $condition )  
                  ->limit($Page->firstRow, $Page->listRows)     
                   ->select();   

        //显示数据
        $this->assign('users',$users);
        $this->assign('html',$html_page);
        $this->display();//在view/user/index.html
    }
    //删除指定用户
   public function del()
    {
        $uid=$_GET['uid'];

        $row=M('bbs_user')->delete($uid);


        if($row){
            $this->success('删除成功');
                    
    }else{
        $this->success('删除失败');
    }
}
//表单显示原有数据
public function edit()
{
        $uid=$_GET['uid'];
        $user=M('bbs_user')->find($uid);

       $this->assign('user',$user);
       $this->display();//在view/user/edit.html 中显示$user的内容
}
//接收修改后的数据 进行更新
public function update()
{
   $uid = $_GET['uid']; // 获取用户ID   
   $data=$_POST;
   //可能上传新的头像
   if($_FILES['uface']['error']!==4){
    $data['uface']=$this->doUp();//处理上传文件
     $this->doSm();//生成缩略图
   }
        
         $row = M('bbs_user')->where("uid=$uid")->save( $data);
        if ($row) { 
         $this->success('用户信息修改成功!', '/index.php?m=admin&c=user&a=index');       
          } else {
           $this->error('用户信息修改失败!'); 
}
}

  private function doUp()
  {
    //处理上传文件
 
      $config =array(  
      'maxSize' => 3145728, 
      'rootPath' => './',
      'savePath' => 'Public/Uploads/',
      'saveName' => array('uniqid',''),
      'exts' => array('jpg', 'gif', 'png', 'jpeg'),
      'autoSub' => true, 
      'subName' => array('date','Ymd'), 
    );
      $up= new \Think\Upload($config);//实例化上传

      $info = $up-> upload(); 

     if(!$info) {
    // 上传错误提示错误信息
    $this->error($upload->getError() ); 
    }
    // 拼接上传文件的完整名称 
  return $this->filename = $info['uface']['savepath'].$info['uface']['savename']; 

  }
  //生成缩略图
  private function doSm()
  {
     $image = new \Think\Image(\Think\Image::IMAGE_GD, $this->filename); 
     // 进行缩放处理, 生成新的缩略图文件 
     $image->thumb(150, 150)->save('./'.getSm($this->filename));
  }
}