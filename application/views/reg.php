

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>竞赛答题系统</title>
    <base href="<?php echo site_url();?> ">
</head>
<style>
    .top{
        background-color: #4169E1;
        text-align: center;
        padding: 10px;
        margin: 20px;
        font-size: 30px;

    }
    .top a{
        color: #FFFFFF;
        background-color: #4169E1;
        padding: 10px;
        margin: 30px;
        padding-left: 30px;
        padding-right: 30px;
        text-decoration: none;
    }
    .top a:hover{
        background-color: hotpink;
    }
    .bottom{
        display: flex;
        margin: 50px;
        margin-top: 20px;
        justify-content: center;
background-color: greenyellow;
        padding: 30px;
        border: 2px solid red;
    }

    }
    .right{
      border:3px solid purple;
        padding: 20px;
        margin: 10px;
    }


    .right p{
        margin: 20px;
        margin-left: 150px;
    }
    .left{
        margin: 30px;

    }
    .left p{
        margin: 20px;
        text-align:right;
    }
    .pr{
        text-align: right;
        margin-right: 50px;
    }

</style>

<body>
<div class="container">
    <div class="top"><a href="/pages/index.html">个人信息</a>
        <a href="/pages/grade.html">成绩得分</a>
        <a href="/pages/test.html" >进入答题</a>
    </div>
    <p class="pr">个人信息</p>
    <form action="user/do_reg" method="get">
    <div class="bottom">
        <div class="left">
            <p>电子邮箱: <input type="text" id="f_email" name="email" ></p>
            <span id="email_tip" ></span>
            <p>姓名：<input type="text" name="username"></p>
            <p>登录密码：<input type="text" name="pwd1"></p>
            <p>密码确认：<input type="text" name="pwd2"></p>
            <p>性别：
                <input type="radio" name="sex" value="男">男
                <input type="radio" name="sex" value="女">女
            </p>
            <p style="left: ">居住地：<select name="prov" >
                    <option value="长治" selected>长治</option>
                    <option value="晋城" >晋城</option>
                </select>
                <select name="city" >
                    <option value="长子" selected>长子</option>
                    <option value="高平" >高平</option>
                </select> </p>
            <p><input type="submit" value="现在注册" ></p>


        </div>
    </form>

        <div class="right">

            <p>为什么要注册：</p>
            <br>
            <p>◇　发布博客</p>
            <p>◇　参与博客的讨论</p>
            <p>◇　认识更多朋友</p>

        </div>
    </div>
/div>
</body>
<!--<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>-->
<script src="js/jquery-3.3.1.min.js"></script>
<script>
    $('#f_email').blur(function ()
    {
        if(this.value=="")
        {

            $('#email_tip').text('请输入email!');
        }
        else
        {
            $.get('user/check_email',{email:this.value},function(data)
            {
                console.log(data);
                if(data=='fail')
                {
                    $('#email_tip').text('该用户名已存在，换一个试试……');
                }
                else
                {
                    $('#email_tip').text('999000');
                }

            });
        }

    });
</script>
</html>