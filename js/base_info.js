//学历下拉列表
$('#education').combobox({
    url: 'interface/asynRead.php?cmd=getEducationList',
    valueField: 'EducationId',
    textField: 'EducationName',
    onSelect: function (rec) {
        var VersionId = $('#education').combobox('getValue');
    },
    onLoadSuccess: function (data) {
        // console.log(data)
        if (data) {
            $('#education').combobox('select', data[0].EducationId);
        }
    }
})


//身份证拆解 失去焦点且数值为18位时触发
$('#id_card').blur(function () {
    var id_card = $('#id_card').val()
    if (id_card.length == 18) {
        var birth = id_card.substring(6, 10) + '-' + id_card.substring(10, 12) + '-' + id_card.substring(12, 14)
        $('#birth_date').val(birth)

        var sex = id_card.substring(16, 17)
        if (sex % 2 == 0) {
            $('#sex').val('女')
        } else {
            $('#sex').val('男')
        }
    }

})

// change_photo()
//图片上传
$('#pic').filebox({
    buttonText: '选择图片',
    buttonAlign: 'right',
    accept: 'image/jpeg',
    onChange: function (e) {
        // change_photo()
    }
})

function change_photo() {
    // var extention = fileObj.value.substring(fileObj.value.lastIndexOf(".") + 1).toLowerCase();
        var fileObj = $("input[name='PicUrl']")[0]
        // console.log('fileobj:',fileObj)
        if (fileObj.files) {//HTML5实现预览，兼容chrome、火狐7+等
            if (window.FileReader) {
                var reader = new FileReader();
                if(fileObj.files[0]) {
                    reader.readAsDataURL(fileObj.files[0]);
                }
                reader.onload = function (e) {
                    // $('#img_div').attr('style','display:block')
                    // $('#pic_div').attr('style','display:none')
                    // console.log(e.target.result)
                    $('#Img').attr('src',e.target.result)

                }

            }
        } else {
            // document.getElementById(imgPreviewId).setAttribute("src", fileObj.value);
        }


}



//校验基本信息填写不能为空
function checkNotNull() {

    if (!base_info_form.PersonName.value) {
        alert('请填写姓名!')
        base_info_form.PersonName.focus();
        return 0;
    }
    if (!base_info_form.IdCard.value) {
        alert('请填写身份证号!')
        base_info_form.IdCard.focus();
        return 0;
    }
    if (!base_info_form.PicUrl.value) {
        alert('请上传图片!')
        base_info_form.PicUrl.focus();
        return 0;
    }

    if (!base_info_form.Nationality.value) {
        alert('请填写国籍!')
        base_info_form.Nationality.focus();
        return 0;
    }
    if (!base_info_form.DocumentType.value) {
        alert('请填写证件类型!')
        base_info_form.DocumentType.focus();
        return 0;
    }
    if (!base_info_form.mobile.value) {
        alert('请填写手机号!')
        base_info_form.mobile.focus();
        return 0;
    }
    if (!base_info_form.email.value) {
        alert('请填写邮箱!')
        base_info_form.email.focus();
        return 0;
    }
    if (!base_info_form.Nation.value) {
        alert('请填写民族!')
        base_info_form.Nation.focus();
        return;
    }
    if (!base_info_form.Position.value) {
        alert('请填写职务!')
        base_info_form.Position.focus();
        return 0;
    }
    if (!base_info_form.Department.value) {
        alert('请填写工作部门!')
        base_info_form.Department.focus();
        return 0;
    }
    if (!base_info_form.HireDate.value) {
        alert('请填写聘用日期!')
        base_info_form.HireDate.focus();
        return 0;
    }
    if (!base_info_form.OfficeMobile.value) {
        alert('请填写办公电话!')
        base_info_form.OfficeMobile.focus();
        return 0;
    }
    if (!base_info_form.Engaged.value) {
        alert('请填写从事业务!')
        base_info_form.Engaged.focus();
        return 0;
    }
    if (!base_info_form.PlaceBirth.value) {
        alert('请填写出生地!')
        base_info_form.PlaceBirth.focus();
        return 0;
    }
    if (!base_info_form.HomeCode.value) {
        alert('请填写家庭邮编!')
        base_info_form.HomeCode.focus();
        return 0;
    }
    if (!base_info_form.HomeAddress.value) {
        alert('请填写家庭住址!')
        base_info_form.HomeAddress.focus();
        return 0;
    }
    if (!base_info_form.HomeMobile.value) {
        alert('请填写家庭电话!')
        base_info_form.HomeMobile.focus();
        return 0;
    }
}




