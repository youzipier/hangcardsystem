<?php
include_once "PublicFunction.php";


class webnerveMssqlDB extends PublicFunction
{
    function getEducationList($request, &$retArray)
    {
        $storeName = '[DB_WebNerveData].[dbo].[P_Human_Person_Exam_EducationList_Get]';

        $paraList = array(
            "ErrMsg" => array('', SQLVARCHAR, 1000, true)
        );

        $ret = $this->procCall_Ext($storeName, $paraList, true, $items, MSSQL_ASSOC); //item保存执行存储过程后返回的数据

        if (count($items[0]) == 0) {
            $retArray = array(
                'data' => array()  //判断返回数据是否为空,如果为空返回空数组即可
            );
        } else {
            $retArray = array(
                'data' => $items[0] //数据不空 返回数据
            );
        }

        $errmsg = $paraList['ErrMsg'][0];

        if ($ret != 'OK' || $errmsg != 'OK') {
            return $errmsg;
        }
        return 'OK';
    }

    function getAllInfo($request, &$retArray)
    {
        $storeName = '[DB_WebNerveData].[dbo].[P_Human_Person_Exam_AllInfo_get]';

        $paraList = array(
            "opid" => array($request['opid'] == -1 ? $request['personid'] : $request['opid'], SQLVARCHAR, 100),
            "ErrMsg" => array('', SQLVARCHAR, 1000, true)
        );
//        echo $request['opid'] == -1 ? $request['personid'] : $request['opid'];
//        print_r($paraList);
        $ret = $this->procCall_Ext($storeName, $paraList, true, $items, MSSQL_ASSOC); //item保存执行存储过程后返回的数据
//


        if (count($items) == 0) {
            $retArray = array(
                'data' => array()  //判断返回数据是否为空,如果为空返回空数组即可
            );
        } else {
            $retArray = array(
                'data' => $items //数据不空 返回数据
            );
        }
        $errmsg = $paraList['ErrMsg'][0];

        if ($ret != 'OK' || $errmsg != 'OK') {
            return $errmsg;
        }
        return 'OK';
    }

    function commitBaseInfo($request, &$retArray)
    {
        $storeName = '[DB_WebNerveData].[dbo].[P_Human_Person_Exam_BaseInfo_Insert]';

        $paraList = array(
            "PersonId" => array($request['personid'], SQLVARCHAR, 100),
            "PersonName" => array($request['PersonName'], SQLVARCHAR, 500),
            "PersonFormerName" => array($request['PersonFormerName'], SQLVARCHAR, 500),
            "IdCard" => array($request['IdCard'], SQLVARCHAR, 500),
            "Sex" => array($request['Sex'], SQLVARCHAR, 500),
            "BirthDate" => array($request['BirthDate'], SQLVARCHAR, 500),
            "MaritalStatus " => array($request['MaritalStatus'], SQLVARCHAR, 500),
            "Nationality" => array($request['Nationality'], SQLVARCHAR, 500),
            "DocumentType" => array($request['DocumentType'], SQLVARCHAR, 500),
            "PicUrl" => array($request['personid'] . '.jpg', SQLVARCHAR, 500),
            "SystemNumber" => array($request['SystemNumber'], SQLVARCHAR, 500),
            "PassportAddress" => array($request['PassportAddress'], SQLVARCHAR, 500),
            "PassportExpiryDate" => array($request['PassportExpiryDate'], SQLVARCHAR, 500),
            "Nation" => array($request['Nation'], SQLVARCHAR, 500),
            "SecuritiesAge" => array($request['SecuritiesAge'], SQLVARCHAR, 500),
            "Mobile" => array($request['Mobile'], SQLVARCHAR, 500),
            "Email" => array($request['Email'], SQLVARCHAR, 500),
            "EducationId" => array($request['EducationId'], SQLVARCHAR, 500),
            "Position" => array($request['Position'], SQLVARCHAR, 500),
            "Department" => array($request['Department'], SQLVARCHAR, 500),
            "HireDate" => array($request['HireDate'], SQLVARCHAR, 500),
            "OfficeMobile" => array($request['OfficeMobile'], SQLVARCHAR, 500),
            "Engaged" => array($request['Engaged'], SQLVARCHAR, 500),
            "Political" => array($request['Political'], SQLVARCHAR, 500),
            "Title" => array($request['Title'], SQLVARCHAR, 500),
            "GetTitleDate" => array($request['GetTitleDate'], SQLVARCHAR, 500),
            "IsSubsidies" => array($request['IsSubsidies'], SQLVARCHAR, 500),
            "PlaceBirth" => array($request['PlaceBirth'], SQLVARCHAR, 500),
            "HomeCode" => array($request['HomeCode'], SQLVARCHAR, 500),
            "HomeAddress" => array($request['HomeAddress'], SQLVARCHAR, 500),
            "HomeMobile" => array($request['HomeMobile'], SQLVARCHAR, 500),
            "Qualificat" => array($request['Qualificat'], SQLVARCHAR, 500),

            "ErrMsg" => array('', SQLVARCHAR, 1000, true)
        );


        /*执行存储过程*/

//        print_r($paraList);
//        exit();

        $ret = $this->procCall_Ext($storeName, $paraList, true, $items, MSSQL_ASSOC); //item保存执行存储过程后返回的数据

//        print_r($ret);exit(); //查看返回数组结果集
         return $paraList['ErrMsg'][0];



    }

    function commitEducationInfo($request, &$retArray)
    {
        $storeName = '[DB_WebNerveData].[dbo].[P_Human_Person_Exam_EducationInfo_Insert]';

        $paraList = array(
            "PersonId" => array($request['personid'], SQLVARCHAR, 100),
            "StartDate" => array($request['StartDate'], SQLVARCHAR, 500),
            "EndDate" => array($request['EndDate'], SQLVARCHAR, 500),
            "School" => array($request['School'], SQLVARCHAR, 500),
            "Education" => array($request['Education'], SQLVARCHAR, 500),
            "Professional" => array($request['Professional'], SQLVARCHAR, 500),
            "IsGraduated" => array($request['IsGraduated'], SQLVARCHAR, 500),
            "XlNumber" => array($request['XlNumber'], SQLVARCHAR, 500),
            "IsDegree" => array($request['IsDegree'], SQLVARCHAR, 500),
            "XwNumber" => array($request['XwNumber'], SQLVARCHAR, 500),

            "ErrMsg" => array('', SQLVARCHAR, 1000, true)
        );

        $ret = $this->procCall_Ext($storeName, $paraList, true, $items, MSSQL_ASSOC); //item保存执行存储过程后返回的数据

//        print_r('emg',$errmsg);
        return $paraList['ErrMsg'][0];

    }

    function commitWorkInfo($request, &$retArray)
    {
        $storeName = '[DB_WebNerveData].[dbo].[P_Human_Person_Exam_WorkInfo_Insert]';

        $paraList = array(
            "PersonId" => array($request['personid'], SQLVARCHAR, 100),
            "StartDate" => array($request['StartDate'], SQLVARCHAR, 500),
            "EndDate" => array($request['EndDate'], SQLVARCHAR, 500),
            "WorkUnits" => array($request['WorkUnits'], SQLVARCHAR, 500),
            "WorkDepartment" => array($request['WorkDepartment'], SQLVARCHAR, 500),
            "IsSecurities" => array($request['IsSecurities'], SQLVARCHAR, 500),
            "WorkPosition" => array($request['WorkPosition'], SQLVARCHAR, 500),
            "WorkType" => array($request['WorkType'], SQLVARCHAR, 500),
            "ReferenPerson" => array($request['ReferenPerson'], SQLVARCHAR, 500),
            "ReferenMobile" => array($request['ReferenMobile'], SQLVARCHAR, 500),

            "ErrMsg" => array('', SQLVARCHAR, 1000, true)
        );
//        print_r($paraList);
        $ret = $this->procCall_Ext($storeName, $paraList, true, $items, MSSQL_ASSOC); //item保存执行存储过程后返回的数据

//        $retArray = $paraList['ErrMsg'][0];

        return $paraList['ErrMsg'][0];
    }


}

