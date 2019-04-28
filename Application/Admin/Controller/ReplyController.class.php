<?php

namespace Admin\Controller;

use Think\Controller;

class ReplyController extends CommonController
{
    //显示回复帖子
    public function index()
    {
        //模糊查询部分
        $condition = [];
        
        //判断分类条件
        if(!empty($_GET['pid'])){
            $condition['pid'] = ['eq', $_GET['pid']];
        }
        //判断内容条件
        if(!empty($_GET['rcontent'])){
            $condition['rcontent'] = ['like',"%{$_GET['rcontent']}%"];
        }
        $Reply = M('bbs_reply');

        // 查询满足要求的总记录数
        $cnt = $Reply->where($condition)->count();

        // 实例化分页类 传入总记录数和每页显示的记录数(3)
        $Page = new \Think\Page($cnt,3);

        // 分页显示输出
        $html_page = $Page->show();

        //获取全部回复帖子内容
        $replys = $Reply->where($condition)
                        ->limit($Page->firstRow.','.$Page->listRows)
                        ->select();
        //获取用户信息
        $users = M('bbs_user')->getField('uid,uname');
        //获取帖子信息
        $post = M('bbs_post')->select();
        //分配变量到html页面
        $this->assign('html_page',$html_page);
        $this->assign('post',$post);
        $this->assign('user',$users);
        $this->assign('replys',$replys);
        $this->display();
    }
    //回复帖子的删除方法
    public function del()
    {
        $rid = $_GET['rid'];
        $row = M('bbs_reply')->delete($rid);
        if ($row) {
            $this->success('删除回复贴子成功','/index.php?m=admin&c=reply&a=index');
        } else {
            $this->error('删除回复贴子失败');
        }
    }
    //回复帖子的修改方法
    public function edit()
    {
        //接收指定的数据保存到数据库
        
        $rid = $_GET['rid'];
        $reply = M('bbs_reply')->where("rid=$rid")->find();
        //遍历显示
        $this->assign('reply',$reply);
        $this->display();
    }
    public function update()
    {
        //获取pid 
        $rid = empty($_GET['rid'])? 0 : $_GET['rid'];
        $row = M('bbs_reply')->where("rid=$rid")->save($_POST);
        if ($row) {
            $this->success('修改回复帖子成功','/index.php?m=admin&c=reply&a=index');
        } else {
            $this->error('修改回复帖子失败');
        }
    }
}