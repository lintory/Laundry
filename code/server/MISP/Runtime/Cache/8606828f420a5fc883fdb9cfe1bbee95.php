<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>洗衣店管理系统</title>
<link href="__PUBLIC__/ThirdParty/themes/css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/ThirdParty/EasyUI/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/ThirdParty/EasyUI/themes/icon.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/ThirdParty/EasyUI/demo/demo.css">
<script type="text/javascript" src="__PUBLIC__/ThirdParty/EasyUI/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/ThirdParty/EasyUI/jquery.easyui.min.js"></script>
<script type="text/javascript" >
$.fn.serializeObject = function()    
{    
   var o = {};    
   var a = this.serializeArray();    
   $.each(a, function() {    
       if (o[this.name]) {    
           if (!o[this.name].push) {    
               o[this.name] = [o[this.name]];    
           }    
           o[this.name].push(this.value || '');    
       } else {    
           o[this.name] = this.value || '';    
       }    
   });    
   return o;    
}; 
function objToJson(obj){
	
	var type = "WEB";
	var data = {"type":type,"obj":obj};
	var json = JSON.stringify(data);
	return json;
}
function formToJson(formID){
	var JSONObj = $(formID).serializeObject();
    return objToJson(JSONObj);
 
}

</script>
</head>
<body>
	<div id="login">
		<div id="login_header">
			<h1 class="login_logo">
				<a><img src="__PUBLIC__/ThirdParty/themes/default/images/login_logo.png" /></a>
			</h1>
			<div class="login_headerContent">
				<div class="navList">
					<ul>
						<li><a href="#">设为首页</a></li>
						<li><a href="#">反馈</a></li>
						<li><a href="#">帮助</a></li>
					</ul>
				</div>
				<h2 class="login_title"><img src="__PUBLIC__/ThirdParty/themes/default/images/login_title.png"/></h2>
			</div>
		</div>
		<div id="login_content">
            <form id="loginForm" method="post">
			    <div class="loginForm">
                        <p>
						    <label>用户名：</label>
						    <input class="easyui-validatebox" type="text" name="UserName"/>
					    </p>
					    <p>
						    <label>密码：</label>
						    <input class="easyui-validatebox" type="text" name="Pswd"/>
					    </p>
					    <p>
						    <label>验证码：</label>
						    <input class="code" type="text" size="5" />
						    <span><img src="__PUBLIC__/ThirdParty/themes/default/images/header_bg.png" alt="" width="75" height="24" /></span>
					    </p>
					    <div class="login_bar">
						    <a  class="sub" onclick="onLogin()" value=" "></a>
					    </div>
			    </div>
            </form>
			<div class="login_banner"><img src="__PUBLIC__/ThirdParty/themes/default/images/login_banner.jpg" /></div>
			<div class="login_main">
				<ul class="helpList">
					<li><a href="#">下载驱动程序</a></li>
					<li><a href="#">如何安装密钥驱动程序？</a></li>
					<li><a href="#">忘记密码怎么办？</a></li>
					<li><a href="#">为什么登录失败？</a></li>
				</ul>
				<div class="login_inner">
					<p>您可以使用 网易网盘 ，随时存，随地取</p>
					<p>您还可以使用 闪电邮 在桌面随时提醒邮件到达，快速收发邮件。</p>
					<p>在 百宝箱 里您可以查星座，订机票，看小说，学做菜…</p>
				</div>
			</div>
		</div>
		<div id="login_footer">
			Copyright &copy; 2014 www.fuego.cn Inc. All Rights Reserved.
		</div>
	</div>
    <script type="text/javascript">
        mini.parse();
        var form = new mini.Form("#loginForm");

        //保存数据
        function onLogin() {
            var o = form.getData();
            form.validate();
            if (form.isValid() == false) return;
            var json = mini.encode(o);
            $.ajax({
                url: "../Index/LoginCheck",
                type: 'post',
                data: { data: json },
                cache: false,
                success: function (json) {
                    var Rsp = mini.decode(json);
                    if (Rsp.ErrorCode == "Success")
                    {
                        window.location = "../Index";
                    }
                    else {
                        mini.alert(Rsp.Message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR.responseText);
                    CloseWindow();
                }
            });
        }
    </script>
</body>
</html>