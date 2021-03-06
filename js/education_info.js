function onShowPanel() {
    var a = $('#education_table').datagrid('getSelected');

    if (a.Rowid === 1) {
        $(this).combobox('loadData', [{'EducationId': '高中', 'EducationName': '高中'}
            , {'EducationId': '中专', 'EducationName': '中专'}
            , {'EducationId': '中技', 'EducationName': '中技'}
            , {'EducationId': '职高', 'EducationName': '职高'}]);
    } else {
        $(this).combobox('loadData', [{'EducationId': '专科', 'EducationName': '专科'}
            , {'EducationId': '本科', 'EducationName': '本科'}
            , {'EducationId': '硕士', 'EducationName': '硕士'}
            , {'EducationId': '博士', 'EducationName': '博士'}]);
    }
}


var ed_editIndex = undefined;
function load_education_table(){
    $('#education_table').datagrid({
        data: [
            {
                Rowid: 1,
                StartDate: '',
                EndDate: '',
                School: '',
                EducationName: '',
                Professional: '',
                IsGraduated: '',
                XlNumber: '',
                IsDegree: '',
                XwNumber: ''
            }
            , {
                Rowid: 2,
                StartDate: '',
                EndDate: '',
                School: '',
                EducationName: '',
                Professional: '',
                IsGraduated: '',
                XlNumber: '',
                IsDegree: '',
                XwNumber: ''
            }
            , {
                Rowid: 3,
                StartDate: '',
                EndDate: '',
                School: '',
                EducationName: '',
                Professional: '',
                IsGraduated: '',
                XlNumber: '',
                IsDegree: '',
                XwNumber: ''
            }
            , {
                Rowid: 4,
                StartDate: '',
                EndDate: '',
                School: '',
                EducationName: '',
                Professional: '',
                IsGraduated: '',
                XlNumber: '',
                IsDegree: '',
                XwNumber: ''
            }
            , {
                Rowid: 5,
                StartDate: '',
                EndDate: '',
                School: '',
                EducationName: '',
                Professional: '',
                IsGraduated: '',
                XlNumber: '',
                IsDegree: '',
                XwNumber: ''
            }
            , {
                Rowid: 6,
                StartDate: '',
                EndDate: '',
                School: '',
                EducationName: '',
                Professional: '',
                IsGraduated: '',
                XlNumber: '',
                IsDegree: '',
                XwNumber: ''
            }
        ],
        onClickRow: function (index) {
            if (ed_editIndex != index) {
                if (ed_endEditing()) {
                    $('#education_table').datagrid('selectRow', index)
                    $('#education_table').datagrid('beginEdit', index);
                    ed_editIndex = index;
                } else {
                    $('#education_table').datagrid('selectRow', ed_editIndex);
                }
            }
        }
        // onAfterEdit: onAfterEdit,

    });
};

function ed_endEditing(index, row, changes) {
    if (ed_editIndex == undefined) {
        return true
    }
    if ($('#education_table').datagrid('validateRow', ed_editIndex)) {
        var ed = $('#education_table').datagrid('getEditor', {index: ed_editIndex, field: 'Id'});
        // console.log('ed是什么',ed)
        //  var EducationName = $(ed.target).combobox('EducationName');
        // $('#education_table').datagrid('getRows')[editIndex]['EducationName'] = EducationName;
        $('#education_table').datagrid('endEdit', ed_editIndex);
        ed_editIndex = undefined;
        return false;
    } else {
        return false;
    }
}




 