<?php
namespace Admin\Controller;

use Think\Controller;

class PostController extends CommonController
{
    // 查看所有帖子
    public function index()
    {
      $pid=empty($_GET['pid']) ? 0 : $_GET['pid'];
       $condition = [];

       if (!empty($_GET['cid'])) {
          $condition['cid'] = ['eq', $_GET['cid']];
       }

       if (!empty($_GET['title'])) {
          $condition['title'] = ['like', "%{$_GET['title']}%"];
       }

       if (!empty($_GET['uname'])) {
          $user_ids = M('bbs_user')->where("uname like '%{$_GET['uname']}%'")->getField('uid');
          $condition['uid'] = ['in', $user_ids];
       }

       $Post = M('bbs_post');

       $cnt = $Post -> where( $condition ) -> count();
       $Page = new \Think\Page($cnt, 5);
       $html_page = $Page->show();

       $posts = $Post -> where("pid=$pid") 
                      -> limit($Page->firstRow, $Page->listRows)
                      -> select();

        $users = M('bbs_user')->select();
        $users = array_column($users,null,'uid');

        $cates = M('bbs_cate')->select();

       $this->assign('posts', $posts);
       $this->assign('users', $users);
       $this->assign('html_page', $html_page);
       $this->assign('cates', $cates);
       // 显示一个html文件  默认为 View/Post/index.html
       $this->display();
    }


    // 删除
    public function del()
    {
        $pid = $_GET['pid'];

        $row = M('bbs_post')->delete($pid);

        if ($row) {
            $this->success('删除成功');
        }
        $this->error('删除失败');
    }

    // 编辑
    public function edit()
    {

    }
    public function update()
    {
        
    }
    // 显示
    public function setDisplay()
    {
        $pid = $_GET['pid'];

        M('bbs_post')->where("pid=$pid")->save(['is_display'=>1]);

        redirect('/index.php?m=admin&c=post&a=index');
    }

    // 隐藏
    public function setHidden()
    {
        $pid = $_GET['pid'];

        M('bbs_post')->where("pid=$pid")->save(['is_display'=>0]);
        redirect('/index.php?m=admin&c=post&a=index');
    }


    // 加精
    public function setJing()
    {
        $pid = $_GET['pid'];

        M('bbs_post')->where("pid=$pid")->save(['is_jing'=>1]);
        redirect('/index.php?m=admin&c=post&a=index');
    }

    // 取消加精
    public function cancelJing()
    {
        $pid = $_GET['pid'];

        M('bbs_post')->where("pid=$pid")->save(['is_jing'=>0]);
        redirect('/index.php?m=admin&c=post&a=index');
    }

    // 置顶
    public function setTop()
    {
        $pid = $_GET['pid'];

        M('bbs_post')->where("pid=$pid")->save(['is_top'=>1]);
        redirect('/index.php?m=admin&c=post&a=index');
    }

    // 取消置顶
    public function cancelTop()
    {
        $pid = $_GET['pid'];

        M('bbs_post')->where("pid=$pid")->save(['is_top'=>0]);
        redirect('/index.php?m=admin&c=post&a=index');
    }
}