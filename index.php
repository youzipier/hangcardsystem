<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>证券从业挂证</title>
    <link rel="stylesheet" type="text/css" href="/easyui_1.5.2/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="/easyui_1.5.2/themes/icon.css">
    <script type="text/javascript" src="/easyui_1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="/easyui_1.5.2/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="/easyui_1.5.2/locale/easyui-lang-zh_CN.js"></script>

    <script src="js/jQuery.cookie.js"></script>

    <script type="text/javascript" src="js/education_info.js"></script>
    <script type="text/javascript" src="js/works_info.js"></script>
    <script type="text/javascript" src="js/jQuery.print.js"></script>
    <link rel="stylesheet" type="text/css" href="css/publicStyle.css">


    <script type="text/javascript" src="js/publicFunction.js"></script>
    <style>
        td {
            height: 27px;
            border: solid #75ccf1;
            border-width: 0px 1px 1px 0px;
            text-align: center;
            font-size: 13px;
        }

        .td_1 {
            width: 90px;
        }

        .td_2 {
            width: 135px;
        }

        .td_3 {
            width: 115px;
        }

        .td_4 {
            width: 115px;
        }

        .td_5 {
            width: 115px;
        }

        .td_6 {
            width: 130px;
        }

        input {
            width: 135px;
            height: 25px;
            border: none;
            text-align: left;
        }

        .ip_cl2 {
            height: 25px;
            width: 250px;
            text-align: left;
        }

        .td_text_left {
            text-align: left;

        }

        .promise_a_tr {
            height: 35px
        }


        .datagrid-header-row .datagrid-cell span {
            white-space: normal !important;
            word-wrap: normal !important;
        }
    </style>
</head>
<body>
<div class="easyui-layout" data-options="fit:true">
    <div id="hang-tools">
        <!--        <a href="#" class="easyui-linkbutton" plain="true" iconCls="icon-cut" onclick="download_img()"></a>-->
        <a href="#" class="easyui-linkbutton" plain="true" iconCls="icon-print" onclick="print_page()"></a>
        <a href="#" id="save" class="easyui-linkbutton" plain="true" iconCls="icon-save" onclick="save_all()"></a>

    </div>


    <div data-options="region:'center'" style="height: 100%">
        <div id="hang_tab" class="easyui-tabs" data-options="fit:true">
            <div title="第一页" style="padding:20px;display:none;">
                <?php include './template/first_page.php' ?>
            </div>
            <div title="第二页" style="overflow:auto;padding:20px;display:none;">
                <?php include './template/second_page.php' ?>
            </div>
            <div title="第三页" style="overflow:auto;padding:20px;display:none;">
                <?php include './template/third_page.php' ?>
            </div>
        </div>
    </div>
</div>


</body>
</html>
<script>


    //回车结束编辑
    document.onkeydown = function (event) {
        var e = event || window.event;
        if (e && e.keyCode == 13) { //回车键的键值为13
            $("#education_table").datagrid('endEdit', ed_editIndex);
            ed_editIndex = undefined;
            $("#works_table").datagrid('endEdit', w_editIndex);
            w_editIndex = undefined;
        }
    };


    $(function () {
        //找全局参数
        var str = window.location.search.substring(1)
        var opid = str.split('=')[1]
        window.opid = opid
        // console.log(3333,opid);
        // console.log(2222,opid ===undefined ? -1:opid);
        load_education_table();
        load_works_table();
        loadData(opid === undefined ? -1 : opid)

    });


    $('#hang_tab').tabs({
        tools: '#hang-tools'
    });

    //下载图片
    function download_img() {
        // var _OBJECT_URL;
        // var request = new XMLHttpRequest();
        // request.addEventListener('readystatechange', function (e) {
        //     if (request.readyState == 4) {
        //         _OBJECT_URL = URL.createObjectURL(request.response);
        //         var $a = $("<a></a>").attr("href", _OBJECT_URL).attr("download", imgName);
        //         $a[0].click();
        //     }
        // });
        // request.responseType = 'blob';
        // request.open('get', path);
        // request.send();
    }


    //打印
    function print_page() {
        $.print(".page");
    }


    //保存
    function save_all() {
        var flag = checkNotNull()
        //判断教育数据是否为空
        var e_dg = $("#education_table");
        var e_flag = 0;
        var e_rows = e_dg.datagrid('getRows');
        $.each(e_rows, function (index, value) {
            if (value['StartDate'] != '') {
                e_flag = 1
            }
        })
        //判断工作信息是否为空
        var w_dg = $("#works_table");
        var w_flag = 0;
        var w_rows = w_dg.datagrid('getRows');
        $.each(w_rows, function (index, value) {
            if (value['StartDate'] != '') {
                w_flag = 1
            }
        })

        // $('#img_form').form('submit', {
        //     // url: 'interfaceUp/asynRead.php?cmd=commitBaseInfo',  //线上210
        //     url: 'interface/asynRead.php?cmd=commitImg',  //215
        //     onSubmit: function () {
        //         var isValid = $(this).form('validate');
        //         if (!isValid) {
        //             $.messager.progress('close');	// hide progress bar while the form is invalid
        //         }
        //         return isValid;	// return false will stop the form submission
        //     },
        //     success: function (data) {
        //         alert(data)
        //
        //     }
        // })


        if (flag !== 0) {

            $('#base_info_form').form('submit', {
                url: 'interfaceUp/asynRead.php?cmd=commitBaseInfo',  //线上210
                // url: 'interface/asynRead.php?cmd=commitBaseInfo',  //215
                onSubmit: function () {
                    var isValid = $(this).form('validate');
                    if (!isValid) {
                        $.messager.progress('close');	// hide progress bar while the form is invalid
                    }
                    return isValid;	// return false will stop the form submission
                },
                success: function (data) {
                    // alert(data)
                    if (data == 'OK') {
                        if (e_flag === 1) {
                            $.ajax({
                                url: 'interface/asynRead.php?cmd=commitAllEducationInfo',
                                // dataType: 'json',
                                method: 'POST',
                                data: {all_data: JSON.stringify(e_rows)},
                                success: function (data) {
                                    if (data == 'OK') {
                                        if (w_flag === 1) {
                                            $.ajax({
                                                url: 'interface/asynRead.php?cmd=commitAllWorkInfo',
                                                // dataType: 'json',
                                                method: 'POST',
                                                data: {all_data: JSON.stringify(w_rows)},
                                                success: function (data) {
                                                    if (data == 'OK') {
                                                        alert('信息保存成功')
                                                        loadData()
                                                    } else {
                                                        alert('工作信息提交失败')
                                                    }
                                                }
                                            })
                                        } else {
                                            alert('请填写工作信息')
                                            return;
                                        }
                                    } else {
                                        alert('教育信息提交失败')
                                    }
                                }
                            })
                        } else {
                            alert('请填写教育信息')
                            return;
                        }

                    } else {
                        alert('基本信息提交失败')
                    }
                }
            })
        } else {
            return;
        }

    }


    //加载数据
    function loadData(opid = -1) {
        // console.log(11,opid)
        $.ajax({
            url: 'interface/asynRead.php?cmd=getAllInfo&opid=' + opid,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.rows.length != 0) {
                    var base_info = data.rows[0]
                    if (base_info) {
                        //图片处理
                        var picurl = base_info[0].PicUrl
                        $('#base_info_form').form('load', base_info[0]);
                        $('#img_div').attr('style', 'display:block')
                        // $('#pic_div').attr('style', 'display:none')

                        //图片写入
                        $('#Img').attr('src', 'interfaceUp/asynRead.php?cmd=getImg&pic=' + picurl)


                        //不是本人操作保存按钮禁掉
                        var opid = base_info[0].PersonId
                        var cookieopid = $.cookie('wnPersonId')

                        if(opid != cookieopid){
                            $('#save').linkbutton('disable');
                        }
                    }

                    var education_info = data.rows[1]
                    if (education_info) {
                        $("#education_table").datagrid('loadData', education_info)
                    }

                    var work_info = data.rows[2]
                    if (work_info) {
                        $("#works_table").datagrid('loadData', work_info)
                    }

                    $("#hang_tab").tabs('select', "第二页");
                    $("#hang_tab").tabs('select', "第一页");

                } else {

                }
                // console.log('data', data.rows[1])

            }
        })
    }

</script>
