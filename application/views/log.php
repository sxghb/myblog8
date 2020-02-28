<!--实际使用的登录界面 2020.2.14-->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <base href="<?php echo site_url();?> ">
    </head>
    <body>
    <p> 登录个人博客，如果尚未加入的请点击</p><a  href="user/reg" >注册新会员</a>
    <form action="user/check_log" method="post">
        <p>邮箱或帐号：<input type="text" name="email"> </p>
        <p>密码：<input type="password" name="pwd"></p>
        <br>
        <p><input type="checkbox" name="check">记住我的登录信息</p>

        <br>
        <p><input type="submit" value="现在登录" ></p>

    </form>

    </body>
    </html>

