//更改databox日期格式必须重写formatter,parser方法
function myformatter(date) {
    var y = date.getFullYear();
    var m = date.getMonth() + 1;
    var d = date.getDate();
    return y + '-' + (m < 10 ? ('0' + m) : m) + '-' + (d < 10 ? ('0' + d) : d);
}

function myparser(s) {
    if (!s) return new Date();
    s = String(s);        //存储过程里拿到的日期都是int型需要转化//
    if (s.search('-') !== -1) {
        var ss = (s.split('-'));
        var y = parseInt(ss[0], 10);
        var m = parseInt(ss[1], 10);
        var d = parseInt(ss[2], 10);
        if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
            return new Date(y, m - 1, d);
        } else {
            return new Date();
        }       //正常提交日期按-划分格式
    } else {
        var y1 = s.substring(0, 4);
        var m1 = s.substring(4, 6);
        var d1 = s.substring(6, 8);
        if (!isNaN(y1) && !isNaN(m1) && !isNaN(d1)) {
            return new Date(y1, m1 - 1, d1);
        } else {
            return new Date();
        }
        //存储过程回调日期int型是一串数字
    }
}

//======================================================================================

//校验手机号
function checkMobile() {
    var mobile = $('#mobile').val()
    var reg = /^1[3|4|5|7|8|9][0-9]\d{4,8}$/;//定义手机号正则表达式
    if (mobile && !(reg.test(mobile))) {
        alert("手机号输入格式有误！");
        // $('#mobile').focus();
        // return false;
    }
}


//校验邮箱格式
function checkEmail() {
    var email = $('#email').val()
    var regEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (email && !(regEmail.test(email))) {
        alert("邮箱格式输入有误！");
        // $('#email').focus();
        // return false;
    }
}

//校验身份证格式
function checkId_card() {
    var id_card = $('#id_card').val()
    var regCard = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;

    if (id_card && !(regCard.test(id_card))) {
        alert("身份证号输入有误！");
        // $('#id_card').focus();
        // return false;
    }
}



