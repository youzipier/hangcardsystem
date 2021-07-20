<div class="page" style="width: 700px;height: auto">
    <table class="common_font_table" border="0.1" cellspacing="0">
        <tr>
            <td class="common_bl_title">
                4.教育经历
            </td>
        </tr>
        <tr style="height: 70px">
            <td class="common_font_title">
                请在第一行填写你最近的教育经历，以下按由近及远的时间顺序依次填写高中（含高中）以上教育经历及培训经历（凡不适用的选项，可不填写），请不要填写未结束的教育经历。请提供毕业证书、学位证书以及培训证书等证明材料的复印件，由所在机构保存备查。
            </td>
        </tr>
    </table>


    <table id="education_table" class="easyui-datagrid" style="width:700px;"
           data-options="
				iconCls: 'icon-edit',
				singleSelect: true,
				method:'get',
				nowrap:false
			">
        <thead>
        <tr>
            <th data-options="field:'Rowid',align:'center',width:70">序号</th>
            <th data-options="field:'StartDate',width:80,align:'center',editor:{type:'datebox',options:{required:true}}">
                起始日期
            </th>
            <th data-options="field:'EndDate',width:80,align:'center',editor:{type:'datebox',options:{required:true}}">
                结束日期
            </th>
            <th data-options="field:'School',width:85,align:'center',editor:{type:'textbox',options:{required:true}}">
                学校
            </th>
            <th data-options="field:'EducationName',width:45,align:'center',editor:{type:'combobox',
                                                                      options:{onShowPanel:onShowPanel,
                                                                              valueField: 'EducationId',
                                                                              textField: 'EducationName'
                                                                              }}">学历
            </th>
            <th data-options="field:'Professional',width:52,align:'center',editor:'text'">专业</th>
            <th data-options="field:'IsGraduated',width:58,align:'center',editor:{type:'combobox',
                                                                      options:{
                                                                              data:[{'IsGraduated':'毕业','value':'毕业'},{'IsGraduated':'未毕业','value':'未毕业'}],
                                                                              valueField: 'IsGraduated',
                                                                              textField: 'value',
                                                                              required:true}}">
                毕业状态
            </th>
            <th data-options="field:'XlNumber',width:88,align:'center',editor:{type:'textbox',options:{required:true}}">学历证明编号</th>
            <th data-options="field:'IsDegree',width:50,align:'center',editor:{type:'combobox',
                                                                   options:{
                                                                              data:[{'IsDegree':'学位','value':'学位'},{'IsDegree':'无','value':'无'}],
                                                                              valueField: 'IsDegree',
                                                                              textField: 'value',
                                                                              required:true}}">学位
            </th>
            <th data-options="field:'XwNumber',width:90,align:'center',editor:'text'">学位证书编号</th>
        </tr>
        </thead>
    </table>


    <table class="common_font_table" border="0.1" cellspacing="0">
        <tr>
            <td class="common_bl_title">
                5.工作经历
            </td>
        </tr>
        <tr style="height: 70px">
            <td class="common_font_title">
                请在第一行填写目前的工作单位，现工作单位离职日期填写填表日期，以下按由近及远的时间顺序依此填写你参加工作之后完整的工作经历，包括所有全职、兼职工作、军队服役，也包括失业、脱产学习以及其它经历的情况。任何两段相邻的工作经历之间不得有超过3个月的时间间隔。
            </td>
        </tr>
    </table>

    <table id="works_table" class="easyui-datagrid" style="width:700px;"
           data-options="
				iconCls: 'icon-edit',
				singleSelect: true,
				method:'get',
				nowrap:false

			">
        <thead>
        <tr>

            <th data-options="field:'Rowid',align:'center',width:70">序号</th>
            <th data-options="field:'StartDate',width:80,align:'center',editor:{type:'datebox',options:{required:true}}">
                起始日期
            </th>
            <th data-options="field:'EndDate',width:80,align:'center',editor:{type:'datebox',options:{required:true}}">
                结束日期
            </th>
            <th data-options="field:'WorkUnits',width:103,align:'center',editor:{type:'textbox',options:{required:true}}">
                工作单位
            </th>
            <th data-options="field:'WorkDepartment',width:60,align:'center',editor:{type:'textbox',options:{required:true}}">
                工作部门
            </th>
            <th data-options="field:'IsSecurities',width:50,align:'center',editor:{type:'combobox',options:{
                                                                                                          data:[{'IsSecurities':'是','value':'是'},{'IsSecurities':'否','value':'否'}],
                                                                                                          valueField: 'IsSecurities',
                                                                                                          textField: 'value',
                                                                                                          required:true
                                                                                                        }}">是否与证券业务有关
            </th>
            <th data-options="field:'WorkPosition',width:60,align:'center',editor:{type:'textbox',options:{required:true}}">
                职务岗位
            </th>
            <th data-options="field:'WorkTypeIdName',width:60,align:'center',editor:{type:'combobox',options:{
                                                                                                       data:[{'WorkTypeId':'全职','value':'全职'},{'WorkTypeId':'兼职','value':'兼职'},
                                                                                                             {'WorkTypeId':'军队服役','value':'军队服役'},{'WorkTypeId':'失业','value':'失业'},
                                                                                                             {'WorkTypeId':'脱产学习','value':'脱产学习'},{'WorkTypeId':'待业','value':'待业'}
                                                                                                                  ],
                                                                                                       valueField: 'WorkTypeId',
                                                                                                       textField: 'value',
                                                                                                       required:true
                                                                                                       }}">任职类型
            </th>
            <th data-options="field:'ReferenPerson',width:45,align:'center',editor:{type:'textbox',options:{required:true}}">
                证明人
            </th>
            <th data-options="field:'ReferenMobile',width:90,align:'center',editor:{type:'textbox',options:{validType:'isMobile',required:true}}">
                证明人电话
            </th>
        </tr>
        </thead>
    </table>

    <table class="common_font_table" border="0.1" cellspacing="0">
        <tr>
            <td class="common_bl_title" colspan="10">
                6.从业资格
            </td>
        </tr>
        <tr style="height: 60px">
            <td class="common_font_title" colspan="10">
                填写从业资格的取得时间及取得方式。通过参加资格考试取得从业资格的，须填写通过的资格考试科目及通过日期，参加从业资格考试的取得时间为最后一科考试通过日期。
            </td>
        </tr>
        <tr >
            <td class="td_text_left">取得方式</td>
            <td colspan="3"></td>
            <td class="td_text_left" colspan="4">参加从业资格考试</td>
        </tr>
        <tr >
            <td class="td_text_left">取得日期</td>
            <td colspan="3"></td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="10" class="td_text_left">考试数据库中数据:(不用填写)</td>
        </tr>
        <tr style="height: 100px">
            <td>照片粘贴处</td>
            <td colspan="2">照片粘贴处</td>
            <td>照片粘贴处</td>
            <td colspan="2">照片粘贴处</td>
            <td>照片粘贴处</td>
            <td colspan="3">照片粘贴处</td>
        </tr>
        <tr>
            <td>执业证书照片</td>
            <td colspan="2">科目名称</td>
            <td>科目名称</td>
            <td colspan="2">科目名称</td>
            <td>科目名称</td>
            <td colspan="3">科目名称</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">通过日期</td>
            <td>通过日期</td>
            <td colspan="2">通过日期</td>
            <td>通过日期</td>
            <td colspan="3">通过日期</td>
        </tr>
    </table>
</div>


</html>