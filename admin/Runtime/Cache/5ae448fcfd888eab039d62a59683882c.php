<?php if (!defined('THINK_PATH')) exit();?>﻿<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="tel/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="tel/Public/js/Cookies/src/cookies.min.js"></script>
<script type='text/javascript' src='tel/Public/js/easyui/jquery.easyui.min.js'></script>
<script type='text/javascript' src='tel/Public/js/easyui/locale/easyui-lang-zh_CN.js'></script>
<link rel='stylesheet' href='tel/Public/js/easyui/themes/default/easyui.css' type='text/css'>
<link rel='stylesheet' href='tel/Public/js/easyui/themes/icon.css' type='text/css'>

<script type="text/javascript" src="tel/Public/js/zDialog/zDrag.js"></script>
<script type="text/javascript" src="tel/Public/js/zDialog/zDialog.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="tel/Public/js/bootstrap/css/bootstrap.css">

<!-- Optional theme -->
<link rel="stylesheet" href="tel/Public/js/bootstrap/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="kindeditor/themes/default/default.css" />
    <script src="kindeditor/kindeditor.js"></script>
    <script src="kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">

      KindEditor.ready(function(K) {
        var editor = K.editor({
          allowFileManager : true
        });
        K('#insertfile').click(function() {
          editor.loadPlugin('insertfile', function() {
            editor.plugin.fileDialog({
              fileUrl : K('#url').val(),
              clickFn : function(url, title) {
                K('#url').val(url);
                editor.hideDialog();
              }
            });
          });
        });
      });



$(document).ready(function(){
$.ajax({
    url: '__APP__/Category/getAllData',
    type: 'post',
    data: {
        
    },
    async:true,
    dataType: "json",
    success: function(data){
        //console.log(data);
        $('#category').html('');
        $('#category').append('<option value="请选择">请选择</option>');
        var total=data.total;
        var rows=data.rows;
        for(var i=0;i<total;i++){
            var row=rows[i];
            $('#category').append('<option value="'+row.category+'">'+row.category+'</option>');
        }
    }
});       
  $('#b1').click(function(){
          var fileName=$('#url').val();
          fileName=fileName.substring(1);
          window.open('load.php?xlsOriginalName='+fileName);
  });
});
</script>
</head>

<body style="width:560px;height:400px;margin:0 auto;padding:0;">


   <div style="margin:0 auto;margin-top:5px;">
        <div style="height:55px;background: none repeat scroll 0 0 #f6fbff;padding:5px;border:1px solid #0099cc;">
        1、由于批量导入时间较长会卡死浏览器,建议每次最多1000条;
        <br>
        2、类别信息可以不选;

        </div>
        <div class="content" style="height:150px;background: none repeat scroll 0 0 #ddedfb;padding:5px;border-bottom:1px solid #0099cc;border-left:1px solid #0099cc;border-right:1px solid #0099cc;">
            <table>
                <tbody>
                    <tr>
                        <td style="width:98px;"><span class="del-order">类别</span></td>
                        <td>
                        <select id="category" style="width:450px;height:25px;margin-top:5px;">
                          

                        </select>
                        </td>                       
                    </tr>                           
                    <tr>
                        <td style="width:98px;"><span class="del-order">文件</span></td>
                        <td>
  <input type="text" style="margin-top:5px;width:350px;" id="url" value="" /> 
  <input type="button" id="insertfile" value="选择文件" />  
                        </td>                       
                    </tr>
                
                                                                                                 
                </tbody>
            </table>
        </div>
        <div style="padding-left:150px;padding-top:5px;">
            <button type="button" id="b1" class="btn btn-success">开始导入</button>
            <button type="button" id="b2" class="btn btn-warning">取消</button> 
        </div>
      </div>
</body>
</html>