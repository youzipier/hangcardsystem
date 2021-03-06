<?php
include_once "../include/mssqlDBConnect.php";
include_once "../config/config.php";
require_once 'webNerve/positionRight/OpRightCheck.php';
require_once 'webNerve/wnPassport/wnPassport.php';


global $request;

//检查登录
checkLogin();
//基本权限检查
//checkRight($request['personid'],'New_webNerve_itService_BrokerageManagementSystem');
//register_shutdown_function注册一个会在php中止时执行的函数
//register_shutdown_function("returnDebugErrData");
if ($debug == 1) {
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
} else {
    error_reporting(0);
    ini_set('display_errors', 'Off');
}
//获取接口命令参数
$cmd = $_GET["cmd"];


if (!$cmd) {
    returnErrData("参数错误！", false);
}

$retArray = array();
$message = '';

switch ($cmd) {
    case "getEducationList":
        $msDB = new webnerveMssqlDB($webnerveMssqlDBInfo);

        $message = $msDB->getEducationList($request, $retArray);

        $msDB->close();
        echo json_encode($retArray['data']);
//        print_r($retArray);exit();
        break;

    case "getAllInfo":
        $msDB = new webnerveMssqlDB($webnerveMssqlDBInfo);
        getPara('opid', 'opid', -1);
        $message = $msDB->getAllInfo($request, $retArray);

        $msDB->close();
//        echo json_encode($message);
        returnIntegralPageData($retArray['totalNum'], $retArray['data'], $message);
//        print_r($retArray);exit();
        break;

//    上传图片
//    case "commitImg":
//        $f_name = $_COOKIE['wnPersonId'] . '.jpg';
//        echo $_FILES['PicUrl']['tmp_name'];
//        $res = move_uploaded_file($_FILES['PicUrl']['tmp_name'], '/var/up/HangCardSystem/uploads/' . $f_name);
//        if($res == 1){
//        }else{
//            echo '图片上传失败';
//        }
//
//
//        break;



    case "commitBaseInfo":
        $f_name = $_COOKIE['wnPersonId'] . '.jpg';
//        echo $_FILES['PicUrl']['tmp_name'];
        $res = move_uploaded_file($_FILES['PicUrl']['tmp_name'], '/var/up/HangCardSystem/uploads/' . $f_name);
//        if($res == 1){
//        }else{
//            echo '图片上传失败';
//        }

        $msDB = new webnerveMssqlDB($webnerveMssqlDBInfo);
        getPostPara('PersonName', 'PersonName', -1);
        getPostPara('PersonFormerName', 'PersonFormerName', -1);
        getPostPara('IdCard', 'IdCard', -1);
        getPostPara('Sex', 'Sex', -1);
        getPostPara('BirthDate', 'BirthDate', -1);
        getPostPara('MaritalStatus', 'MaritalStatus', -1);
        getPostPara('Nationality', 'Nationality', -1);
        getPostPara('DocumentType', 'DocumentType', -1);
        getPostPara('SystemNumber', 'SystemNumber', -1);
        getPostPara('PassportAddress', 'PassportAddress', -1);
        getPostPara('PassportExpiryDate', 'PassportExpiryDate', -1);
        getPostPara('Nation', 'Nation', -1);
        getPostPara('SecuritiesAge', 'SecuritiesAge', -1);
        getPostPara('Mobile', 'Mobile', -1);
        getPostPara('Email', 'Email', -1);
        getPostPara('EducationId', 'EducationId', -1);
        getPostPara('Position', 'Position', -1);
        getPostPara('Department', 'Department', -1);
        getPostPara('HireDate', 'HireDate', -1);
        getPostPara('OfficeMobile', 'OfficeMobile', -1);
        getPostPara('Engaged', 'Engaged', -1);
        getPostPara('Political', 'Political', -1);
        getPostPara('Title', 'Title', -1);
        getPostPara('GetTitleDate', 'GetTitleDate', -1);
        getPostPara('IsSubsidies', 'IsSubsidies', -1);
        getPostPara('PlaceBirth', 'PlaceBirth', -1);
        getPostPara('HomeCode', 'HomeCode', -1);
        getPostPara('HomeAddress', 'HomeAddress', -1);
        getPostPara('HomeMobile', 'HomeMobile', -1);
        getPostPara('Qualificat', 'Qualificat', -1);
        echo $msDB->commitBaseInfo($request, $retArray);

        $msDB->close();

//        returnIntegralPageData($retArray['totalNum'], $retArray['data'],$message);
        break;

    case "commitAllEducationInfo":
        $rows = json_decode($_POST['all_data'], true);
        global $request;
        $msDB = new webnerveMssqlDB($webnerveMssqlDBInfo);
        foreach ($rows as $key => $row) {

            if ($row['EndDate'] !== '') {
//                print_r($row);
                $request['StartDate'] = $row['StartDate'];
                $request['EndDate'] = $row['EndDate'];
                $request['School'] = $row['School'];
                $request['Education'] = $row['EducationName'];
                $request['Professional'] = $row['Professional'] = '' ? -1 : $row['Professional'];
                $request['IsGraduated'] = $row['IsGraduated'];
                $request['XlNumber'] = $row['XlNumber'] = '' ? -1 : $row['XlNumber'];
                $request['IsDegree'] = $row['IsDegree'];
                $request['XwNumber'] = $row['XwNumber'] = '' ? -1 : $row['XwNumber'];
                $message = $msDB->commitEducationInfo($request, $retArray);
            }

        }
        $msDB->close();
        echo $message;
//        returnIntegralPageData($retArray['totalNum'], $retArray['data'],$message);
        break;

    case "commitAllWorkInfo":
        $rows = json_decode($_POST['all_data'], true);
        global $request;
        $msDB = new webnerveMssqlDB($webnerveMssqlDBInfo);
        foreach ($rows as $key => $row) {
            if ($row['EndDate'] !== '') {
//                print_r($row);
                $request['StartDate'] = $row['StartDate'];
                $request['EndDate'] = $row['EndDate'];
                $request['WorkUnits'] = $row['WorkUnits'];
                $request['WorkDepartment'] = $row['WorkDepartment'];
                $request['IsSecurities'] = $row['IsSecurities'];
                $request['WorkPosition'] = $row['WorkPosition'];
                $request['WorkType'] = $row['WorkTypeIdName'];
                $request['ReferenPerson'] = $row['ReferenPerson'];
                $request['ReferenMobile'] = $row['ReferenMobile'];
                $message = $msDB->commitWorkInfo($request, $retArray);

//                break;
            }

        }

        $msDB->close();
        echo $message;
        break;

    case "getImg":
        $picName = $_GET['pic'];

        $serverurl = header('/var/up/HangCardSystem/uploads/');
        //$serverurl='../../../YanHuaTaskControlSystem/upload/TV/';
        $file = file_get_contents($serverurl . $picName);
        echo $file;
        break;
    default:
        returnErrData("请勿窃取数据！！", false);

}

function getPara($tag, $saveTag, $defaultValue)
{
    global $request;

    $request[$saveTag] = $_GET[$tag];
    if ($request[$saveTag] == "") {
        $request[$saveTag] = $defaultValue;
    }

}

function getPostPara($tag, $saveTag, $defaultValue)
{
    global $request;
    $request[$saveTag] = $_POST[$tag];

    if ($request[$saveTag] == "") {
        $request[$saveTag] = $defaultValue;
    }

}


function returnDebugErrData()
{//注册一个会在php中止时执行的函数
    global $debug;
    if ($debug == 1) {
        $arr = error_get_last();    //获取最后发生的错误
        if ($arr['type'] == 8) {//8 E_NOTICE (integer)  运行时通知。
            return;
        } else {
            $message = '错误原因:<span style="color:red">' . $arr['message'] . '</span><br>' .
                '错误文件:<span style="color:red">' . str_replace('/', '', strrchr($arr['file'], '/')) . '</span><br>' .
                '错误行号:<span style="color:red">' . $arr['line'] . '</span>';
            $json = array(
                'ret' => "Error",
                'errReason' => $message
            );
            echo json_encode($json);
            exit();
        }
    } else {
        return;
    }
}

function returnErrData($message, $isConvert = false)
{
    if ($isConvert == true) {
        $message = iconv('GBK', 'UTF-8', $message);
    }
//    print_r($message);exit(1111);
    $json = array(
        'ret' => $message,
        'total' => 0,
        'rows' => array()
    );

    echo json_encode($json);
    exit();
}

function returnIntegralPageData($total, $data, $message = '')
{
    if ($message != 'OK') {
        returnErrData($message);
        exit();
    }

    $json = array(
        'ret' => $message,
        'total' => $total,
        'rows' => $data
    );

    echo json_encode($json);
    exit();
}

function checkLogin()
{
    //$_session
    global $request;
    $retVal = wnppAccreditCheck($wnPersonId, $wnPersonName);
    if ($retVal != 'OK') {
        returnErrData("您还没有登陆呢!", false);
    } else {
        $request['personid'] = $wnPersonId;
        $request['personname'] = $wnPersonName;
    }
}
//function checkRight($wnPersonId, $functionDefine){
//    getOpFunctionList($wnPersonId,$functionDefine);
//    if(!RightCheck($functionDefine) && !isAdmin()){
//        returnErrData("未授权！", false);
//    }
//}

