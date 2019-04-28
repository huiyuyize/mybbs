<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/main.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/> -->
    <script type="text/javascript" src="/Public/Admin/js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="/index.php?m=home&c=index&a=index" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#"><?=$_SESSION['userInfo']['uname']?></a></li>
                <li><a href="/index.php?m=admin&c=user&a=editUpwd">修改密码</a></li>
                <li><a href="/index.php?m=admin&c=login&a=logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>用户管理</a>
                    <ul class="sub-menu">
                        
                        <li><a href="/index.php?m=admin&c=user&a=create"><i class="icon-font">&#xe052;</i>添加用户</a></li>
                        <li><a href="/index.php?m=admin&c=user&a=index"><i class="icon-font">&#xe033;</i>查看用户</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>分区管理</a>
                    <ul class="sub-menu">
                       
                        <li><a href="/index.php?m=admin&c=part&a=create"><i class="icon-font">&#xe046;</i>添加分区</a></li>
                        <li><a href="/index.php?m=admin&c=part&a=index"><i class="icon-font">&#xe045;</i>查看分区</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>板块管理</a>
                    <ul class="sub-menu">
                       
                        <li><a href="/index.php?m=admin&c=cate&a=create"><i class="icon-font">&#xe046;</i>添加板块</a></li>
                        <li><a href="/index.php?m=admin&c=cate&a=index"><i class="icon-font">&#xe045;</i>查看板块</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>贴子管理</a>
                    <ul class="sub-menu">
                        <li><a href="/index.php?m=admin&c=reply&a=index"><i class="icon-font">&#xe045;</i>查看贴子</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    
<div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="#" method="post">
                    <table class="search-tab">
                        <tbody><tr>
                           <th width="120">帖子:</th>
                            <td>
                                <select name="pid" id="">
                               <option value="">全部</option>
                                  <?php foreach($post as $k=>$v): ?> 
                                    <option value="<?=$k['pid']?>"><?=$v['title']?></option>
                                  <?php endforeach; ?>  
                                </select>
                            </td>
                        <tr>          
                            <th width="70">关键字:</th>
                            <td><input class="common-text"  name="rcontent" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" value="查询" type="submit"></td>
                        </tr>
                    </tbody></table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="insert.html"><i class="icon-font"></i>新增作品</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tbody><tr>
                            <th>ID</th>
                            <th>贴子内容</th>
                            <th>发帖人</th>
                            <th>时间</th>
                            <th>操作</th>
                        </tr>
                    <?php foreach($replys as $reply): ?>
                        <tr>
                            <td><?=$reply['rid']?></td>
                            <td><?=$reply['rcontent']?></td>
                            <td><?= $users[ $reply['uid'] ]['uname'] ?></td>
                            <td><?= date('Y-m-d H:i:s',$reply['created_at']) ?></td>
                            <td>
                                <a class="link-update" href="/index.php?m=admin&c=reply&a=edit&rid=<?=$reply['rid']?>">修改</a>
                                <a class="link-del" href="/index.php?m=admin&c=reply&a=del&rid=<?=$reply['rid']?>">删除</a>
                                  &nbsp;|&nbsp;

                                <?php if ($post['is_jing']): ?>
                                <a class="link-del" href="/index.php?m=admin&c=post&a=cancelJing&pid=<?php echo ($post['pid']); ?>">取消加精</a>
                                <?php else: ?>
                                <a class="link-del" href="/index.php?m=admin&c=post&a=setJing&pid=<?php echo ($post['pid']); ?>">加精</a>
                                <?php endif; ?>

                                &nbsp;|&nbsp;

                                <?php if ($post['is_top']): ?>
                                <a class="link-del" href="/index.php?m=admin&c=post&a=cancelTop&pid=<?php echo ($post['pid']); ?>">取消置顶</a>
                                <?php else: ?>
                                <a class="link-del" href="/index.php?m=admin&c=post&a=setTop&pid=<?php echo ($post['pid']); ?>">置顶</a>
                                <?php endif; ?>
                                
                                &nbsp;|&nbsp;
                                
                                <?php if ($post['is_display']): ?>
                                <a class="link-del" href="/index.php?m=admin&c=post&a=setHidden&pid=<?php echo ($post['pid']); ?>">隐藏</a>
                                <?php else: ?>
                                <a class="link-del" href="/index.php?m=admin&c=post&a=setDisplay&pid=<?php echo ($post['pid']); ?>">显示</a>
                                <?php endif; ?>
                                
                                &nbsp;|&nbsp;
                                <a class="link-del" href="/index.php?m=admin&c=reply&a=index&pid=<?php echo ($post['pid']); ?>">查看回复</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody></table>
                    <div class="list-page"><?=$html_page?></div>
                </div>
            </form>
        </div>
    </div>

</div>
</body>
</html>