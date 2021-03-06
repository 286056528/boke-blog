<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 基础表格</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="/xiaoxukunboke/Application/Admin/Public/favicon.ico"> 
    <link href="/xiaoxukunboke/Application/Admin/Public/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/xiaoxukunboke/Application/Admin/Public/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/xiaoxukunboke/Application/Admin/Public/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/xiaoxukunboke/Application/Admin/Public/css/animate.css" rel="stylesheet">
    <link href="/xiaoxukunboke/Application/Admin/Public/css/style.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
           
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加新闻</h5>

                        <div class="ibox-tools">

                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="table_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">选项1</a>
                                </li>
                                <li><a href="#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>

                        </div>
                    </div>
                   <div class="ibox-content">
                        <div class="alert alert-info">
                          请在此输入信息！选择图文的时候会默认将编辑器中的图片设为封面图！
                        </div>
                    
                            <div class="form-group draggable">
                                <label class="col-sm-1 control-label">新闻标题：</label>
                                <div class="col-sm-12">
                                    <input type="text" name="news_title" id="news_title" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group draggable">
                                <label class="col-sm-1 control-label">新闻作者：</label>
                                <div class="col-sm-12">
                                    <input type="text" name="news_author" id="news_author" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group draggable">
                                <label class="col-sm-1 control-label">新闻简介：</label>
                                <div class="col-sm-12">
                                    <input type="text" name="news_abstract" id="news_abstract" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group draggable">
                                <label class="col-sm-1 control-label">新闻类别：</label>
                                <div class="col-sm-12">
                                    <select id="showtype" class="form-control" style="height: 98%" name="">
                                         <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($vo["showtype_id"]); ?>"><?php echo ($vo["showtype_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group draggable">
                                <label class="col-sm-1 control-label">展现方式：</label>
                                <div class="col-sm-12">
                                    <select id="sel" class="form-control" style="height: 98%" name="">
                                        <option  value="1">图文</option>
                                        <option  value="2">仅文字</option>
                                    </select>
                                </div>
                            </div>

                  
                        <div class="form-group draggable">
                                <label class="col-sm-1 control-label">新闻内容：</label>
                                <div class="col-sm-12" style="height: 900px;width: 100%">
                                        <script id="container" style="height: 80%" name="content" type="text/plain">这里写你的初始化内容</script>
                                     <button id="addcontent"style="margin: 20px 0px 10px 0px" class="btn btn-primary" type="button" onclick="addcontent()">提交</button>
                                
                                </div>
                        </div>

                
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

    <!-- 全局js -->
    <script src="/xiaoxukunboke/Application/Admin/Public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/xiaoxukunboke/Application/Admin/Public/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/xiaoxukunboke/Application/Public/layer/layer.js"></script>
    <script src="/xiaoxukunboke/Application/Public/dialog.js"></script>
    <!-- Peity -->
    <script src="/xiaoxukunboke/Application/Admin/Public/js/plugins/peity/jquery.peity.min.js"></script>

    <!-- 自定义js -->
    <script src="/xiaoxukunboke/Application/Admin/Public/js/content.js?v=1.0.0"></script>


    <!-- iCheck -->
    <script src="/xiaoxukunboke/Application/Admin/Public/js/plugins/iCheck/icheck.min.js"></script>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/xiaoxukunboke/Application/Public/UEditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/xiaoxukunboke/Application/Public/UEditor/ueditor.all.min.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');

        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });

    </script>

    <script type="text/javascript">
        function addcontent(){

        var showtype = $("#showtype option:selected").val();
        var news_type = $("#sel option:selected").val();
        var news_title=$("#news_title").val();
        var news_author=$("#news_author").val(); 
        var news_abstract=$("#news_abstract").val();   
        var content = ue.getContent();
        
       // var content = ue.getContentTxt()
        var url = "<?php echo U('addcontents');?>";

            $.ajax({
            type:'post',
            url:url,
            data:{"news_abstract":news_abstract,"showtype":showtype,"news_type":news_type,"news_title":news_title,"news_author":news_author,"content":content},
            dataType:'json',

            success:function(result) {
            if(result.status == 0) {
               return dialog.error(result.message);
            }
            if(result.status == 1) {
                 return dialog.success(result.message,"<?php echo U('showlist');?>");
            }
            },
            error: function(jqXHR){     
               alert("发生错误：" + jqXHR.status);  
            },
    })
}
    </script>

    
    

</body>

</html>