var w_editIndex = undefined;

function load_works_table(){
    $('#works_table').datagrid({
        data: [
            {
                Rowid: 1,
                StartDate: '',
                EndDate: '',
                WorkUnits: '',
                WorkDepartment: '',
                IsSecurities: '',
                WorkPosition: '',
                WorkTypeIdName: '',
                ReferenPerson: '',
                ReferenMobile: '',
            },
            {
                Rowid: 2,
                StartDate: '',
                EndDate: '',
                WorkUnits: '',
                WorkDepartment: '',
                IsSecurities: '',
                WorkPosition: '',
                WorkTypeIdName: '',
                ReferenPerson: '',
                ReferenMobile: '',
            },
            {
                Rowid: 3,
                StartDate: '',
                EndDate: '',
                WorkUnits: '',
                WorkDepartment: '',
                IsSecurities: '',
                WorkPosition: '',
                WorkTypeIdName: '',
                ReferenPerson: '',
                ReferenMobile: '',
            },
            {
                Rowid: 4,
                StartDate: '',
                EndDate: '',
                WorkUnits: '',
                WorkDepartment: '',
                IsSecurities: '',
                WorkPosition: '',
                WorkTypeIdName: '',
                ReferenPerson: '',
                ReferenMobile: '',
            },
            {
                Rowid: 5,
                StartDate: '',
                EndDate: '',
                WorkUnits: '',
                WorkDepartment: '',
                IsSecurities: '',
                WorkPosition: '',
                WorkTypeIdName: '',
                ReferenPerson: '',
                ReferenMobile: '',
            },
            {
                Rowid: 6,
                StartDate: '',
                EndDate: '',
                WorkUnits: '',
                WorkDepartment: '',
                IsSecurities: '',
                WorkPosition: '',
                WorkTypeIdName: '',
                ReferenPerson: '',
                ReferenMobile: '',
            },
            {
                Rowid: 7,
                StartDate: '',
                EndDate: '',
                WorkUnits: '',
                WorkDepartment: '',
                IsSecurities: '',
                WorkPosition: '',
                WorkTypeIdName: '',
                ReferenPerson: '',
                ReferenMobile: '',
            }

        ],
        onClickRow: function (index) {
            if (w_editIndex != index) {
                if (w_endEditing()) {
                    $('#works_table').datagrid('selectRow', index)
                        .datagrid('beginEdit', index);
                    w_editIndex = index;
                } else {
                    $('#works_table').datagrid('selectRow', w_editIndex);
                }
            }
        }
    });
};

function w_endEditing(index, row, changes) {
    if (w_editIndex == undefined) {
        return true
    }
    if ($('#works_table').datagrid('validateRow', w_editIndex)) {
        var ed = $('#works_table').datagrid('getEditor', {index: w_editIndex, field: 'Id'});
        $('#works_table').datagrid('endEdit', w_editIndex);
        w_editIndex = undefined;
        return false;
    } else {
        return false;
    }
}

$.extend($.fn.validatebox.defaults.rules, {
    isMobile: {
        validator: function (value, param) {
            return /^1[3|4|5|7|8|9][0-9]\d{4,8}$/.test(value);
        },
        message: '输入正确的电话号码'
    },

});


