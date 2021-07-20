<?php
/* znzglobal.mssql.php - ms sql database interface */

/* Copyright (c) 2013 by Compass.cn, P.R.China */

/*
modification history
--------------------
2014/05/13, Cao Rui, Create
*/

$__znz_mssql_construct_descriptor = array(
	'dbnerve35'	=> array("host"=>'websale',		"user"=>'u_testxyzpw',			"passwd"=>'jj8755kg',		"database"=>"DBNERVE"	)
	,'websale'	=> array("host"=>'websale',		"user"=>'u_testxyzpw',			"passwd"=>'jj8755kg',		"database"=>"DBNERVE"	)
	,'cc7356'	=> array("host"=>'callcenterall',	"user"=>'u_linux_callCenterSync',	"passwd"=>'didnf3f64',		"database"=>"DB_IPCC"	)
	,'smslog'	=> array("host"=>'smsServer',		"user"=>'u_ViewSmsReport',		"passwd"=>'f159896549j',	"database"=>"DB_SMS"	)
	,'clientlogin'	=> array("host"=>'monitor',		"user"=>'sa',				"passwd"=>'&U*I(O)P',		"database"=>"DBHistory"	)
	,'safe24'	=> array("host"=>'websaletest',		"user"=>'sa',				"passwd"=>'sql2005',		"database"=>"DBPwd"	)
	,'webtest'	=> array("host"=>'websaletest',		"user"=>'sa',				"passwd"=>'sql2005',		"database"=>"DBNerve"	)
	,'db_cms'	=> array("host"=>'db_cms',		"user"=>'sa',				"passwd"=>'sql2005',		"database"=>"DB_CMS"	)
	,'zqttest'	=> array("host"=>'websaletest',		"user"=>'sa',				"passwd"=>'sql2005',		"database"=>"DBZQT"	)
	,'bx_grade131'	=> array("host"=>'baoxian',		"user"=>'U_Linux_Bx_yeji',		"passwd"=>'3608706ssow',	"database"=>"dbnerve"	)
	,'vstanews'	=> array("host"=>'vstanews',		"user"=>'u_huyufang',			"passwd"=>'huyufang369',	"database"=>"VSAT_INFO")
	,'smartyguide'	=> array("host"=>'smartyguide',		"user"=>'u_linux_cweb97',		"passwd"=>'cs2jdsebkdls22',	"database"=>"DB_NewTraining")
	,'smartyguide2' => array("host"=>'websale_131',		"user"=>'u_linux_crm_smartguide',	"passwd"=>'1155sokdusjs92',	"database"=>"DBSmartGuide")
);


/////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// $db = new znzMsSql('crm');	//$db = new znzMsSql('websale','u_testxyzpw','jj8755kg','DBNERVE');
// $sql = "select PersonId,PersonName from _Human_Person where PersonId>2005980";
// list($total, $data) = $db->get_page($sql, 0, 10, 'PersonId', 'asc');
// echo "total = ".$total;
// znz_debugrs($data);
// $paraList = array(
	// "para1"		=> array(2, SQLINT4, 16),
	// "para2"		=> array('xx', SQLVARCHAR, 1000),
	// "maxname"	=> array('', SQLVARCHAR, 1000, true),
	// "ErrMessage" => array('', SQLVARCHAR, 1000, true)
// );
// $db->proc2('Z_Test__ByCaoRui',$paraList,$record);
// znz_debug($paraList);
// znz_debug($record);
// $db->close();
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////


class znzMsSql {//公共文件，不可修改
	private $db	= null;
	private $con = array();
	public function __construct($host, $user='', $passwd='', $db='') {//asyRead.php传了$webnerveMssqlDBInfo进来
		global $__znz_mssql_construct_descriptor;

		if ($user != '') {
			$this->con	= array("host"=>$host, "user"=>$user, "passwd"=>$passwd, "database"=>$db);
		} else {
			if (is_array($host)) {
				$this->con	= $host;
			} else {
				if(array_key_exists($host, $__znz_mssql_construct_descriptor)) {
					$this->con	= $__znz_mssql_construct_descriptor[$host];
				} else {
					trigger_error('namespace "'.$host.'" not exists.', E_USER_ERROR);
					exit;
				}
			}
		}
	}
	public function __destruct() {
		$this->close();
	}

	public function isvalid() {
		return $this->open();
	}

	private function open(){
		if ($this->db !== null) {
			return true;
		}

		$this->db = mssql_connect($this->con['host'], $this->con['user'], $this->con['passwd']);
		if($this->db===false) {
			return false;
		}
		if ($this->con['database']) {
			$ret	= mssql_select_db($this->con['database'], $this->db);
		}
		return true;
	}

	public function close(){
		if ($this->db !== null)
			mssql_close($this->db);
		$this->db = null;
	}

	public function exec($sql){
		if (!$this->open())
			return 'ERROR';
		
		$sql	= iconv('UTF-8', 'GBK',$sql);
		if (!mssql_query($sql, $this->db))
			return 'ERROR';
		return 'OK';
	}

	public function get($sql, $key_column=''){
		if (!$this->open())
			return null;

		$res = mssql_query(iconv('UTF-8', 'GBK',$sql), $this->db);
		if (!$res) {
			return null;
		}

		$recordSet = array();
		if (true){
			while ($record = mssql_fetch_array($res, MSSQL_ASSOC)){	// fetch array with column names
				znz_gbk2utf8($record);
				if($key_column!=='' && array_key_exists($key_column, $record)) {
					$recordSet[$record[$key_column]]	= $record;
				} else {
					$recordSet[] = $record;
				}
			}
		}else{
			while ($record = mssql_fetch_row($res)){	// only fetch data
				znz_gbk2utf8($record);
				if($key_column!=='' && array_key_exists($key_column, $record)) {
					$recordSet[$record[$key_column]]	= $record;
				} else {
					$recordSet[] = $record;
				}
			}
		}
		return $recordSet;
	}

	function getOne($sql) {
		$ret	= $this->get($sql);
		$out	= array();
		if(is_array($ret) && count($ret)>0) {
			$out	= $ret[0];
		}
		return $out;
	}

	/* execute sql statement and fetch first result table */
	function sqlFetchAll($stmt, $isFetchArray = false)
	{
		$res = mssql_query($stmt, $this->db);
		if (!$res)
				return null;

		$recordSet = Array();

		if ($isFetchArray)
		{
			/* fetch array with column names */
			while ($record = mssql_fetch_array($res, MSSQL_ASSOC))
				$recordSet[] = $record;
		}
		else
		{
			/* only fetch data */
			while ($record = mssql_fetch_row($res))
				$recordSet[] = $record;
		}

		return $recordSet;
	}

	public function get_page($sql, $start, $limit, $sort, $dir, $totalArr=array()){
		if (!$this->open()) {
			return array(0, array());
		}

		$sqlstr = "select count(*) as cnt ";
		if (count($totalArr)>0) {
			$sqlstr .= ','.implode(', ', $totalArr);
		}
		$sqlstr .= " from ($sql) a ";
		#echo $sqlstr;
		$total = $this->get($sqlstr);

		if (!is_array($total) || count($total)==0) {
			return array(0, array());
		}

		if (count($totalArr)==0) {
			$total = intval($total[0]['cnt']);
		} else {
			$total = $total[0];
		}

		$order = "order by {$sort} {$dir}";
		$sql = "
		select * from ( 
			select top ".($start + $limit)." ROW_NUMBER() OVER ({$order}) AS RowNo, * from ($sql) a 
		) a
		where RowNo > {$start}
		order by RowNo";
		#echo $sql;
//		Debug($sql);
//		exit;

		$data = $this->get($sql);
		if (!is_array($data)) {
			return array(0, array());
		}
		#echo 'in<pre>';
		#	print_r($data);
		#echo '</pre>';
		#die();
		return array($total, $data);
	}

	//	$paraList = array(
	//		"OpId"		=> array(2005001, SQLINT4, 16),
	//		"ErrMessage" => array('', SQLVARCHAR, 1000, true),
	//		"strparam"	=> array('', SQLVARCHAR, 100)
	//	);
	//	$ret = $db->proc2('P_Market__SaleSuit_PayCenter_Call', $paraList, $record);
	public function proc($procName, &$paraList){
		if (!$this->open())
			return 'ERROR';

		znz_utf82gbk($paraList);
		$ret = $this->procCall($procName, $paraList, $record);
		znz_gbk2utf8($paraList);

		if ($ret != 'OK')
			return $ret;

		if(array_key_exists('ErrMessage', $paraList)){
			$errmsg = $paraList["ErrMessage"][0];
		} else {
			$errmsg = '';
		}
		if ($errmsg!='' && $errmsg!='OK')
			return $errmsg;

		return 'OK';
	}
	public function proc2($procName, &$paraList, &$record){
		if (!$this->open())
			return 'ERROR';

		znz_utf82gbk($paraList);
		$ret = $this->procCall($procName, $paraList, $record);
		znz_gbk2utf8($paraList);

		if ($ret != 'OK')
			return $ret;
		if(array_key_exists('ErrMessage', $paraList)) {
			$errmsg = $paraList["ErrMessage"][0];
		} else {
			$errmsg = '';
		}
		if ($errmsg!='' && $errmsg!='OK')
			return $errmsg;

		return 'OK';
	}


	public function proc3($procName, &$paraList, &$record){
		if (!$this->open())
			return 'ERROR';

		znz_utf82gbk($paraList);
		$ret = $this->procCall2($procName, $paraList, $record);
		znz_gbk2utf8($paraList);

		if ($ret != 'OK')
			return $ret;
		if(array_key_exists('ErrMessage', $paraList)) {
			$errmsg = $paraList["ErrMessage"][0];
		} else {
			$errmsg = '';
		}
		if ($errmsg!='' && $errmsg!='OK')
			return $errmsg;

		return 'OK';
	}

	private function parasCheck(&$paraList){
		foreach ($paraList as $name => $info)
		{
			if (isset($info[1]) && ($info[1] == SQLVARCHAR && $info[0] === '0')){//isset检测变量是否设置，并且不是 NULL。
				continue;
			}
			if (!isset($info[0]) || !$info[0]) /* set default values on null */
			{
				if ($info[1] == SQLVARCHAR)
					$paraList[$name][0] = '';
				else
					$paraList[$name][0] = 0;
			}
		}
	}

	private function mssqlVarGet($type, $length){
		$__mssqlVars = Array (
			SQLINT4	=> array("int",	 false),
			SQLVARCHAR => array("varchar", true),
			SQLFLT8	=> array("float",	false),
			SQLINT1	=> array("bigint",	false),
			SQLTEXT	=> array('TEXT',	false)
		);

		$var = $__mssqlVars[$type];
		if (!$var)
			return "";

		$varStr = $var[0];
		if (isset($var[1]) && $var[1])
			$varStr .= "(".$length.")";

		return $varStr;
	}

	private function sqlFetchAllTable($stmt){
		$rs = mssql_query($stmt, $this->db);
		$recordSetArr = Array();
		if ($rs == null)
			return null;
		do{
			$result = array();
			if (mssql_num_rows($rs)>0)
			{
				//error_reporting(E_ALL & ~ ( E_NOTICE | E_WARNING ));
				$seek = mssql_data_seek($rs, 0);
				//error_reporting(E_ALL);
				if ($seek){
					while ($record = mssql_fetch_array($rs, MSSQL_ASSOC)){
						znz_gbk2utf8($record);
						$result[] = $record;
					}
				}
			}
			array_push($recordSetArr, $result);
			unset($result);
		}while(mssql_next_result($rs));
		return $recordSetArr;
	}

	private function procCall($procName, &$paraList, &$record){
		$sqlStr = "";
		/* check paras */
		$this->parasCheck($paraList);

		/* para: para_name => value, type, [maxlen = 0], [is_output = false], [is_null = false], [is_inout = false] */
		foreach ($paraList as $name => $info)
		{
			/* declare output parameters */
			if (isset($info[3]) && $info[3])
			{
				$sqlStr .= "declare @".$name." ".$this->mssqlVarGet($info[1], $info[2])."\n";

				if (isset($info[5]) && $info[5]) /* in and out parameter */
				{
					if ($info[1] == SQLVARCHAR)
						$sqlStr .= "set @".$name." = '".$info[0]."'\n";
					else
						$sqlStr .= "set @".$name." = ".$info[0]."\n";
				}
			}
		}

		/* main body for calling procedure */
		$sqlStr .= "exec ".$procName;
		$cnt = 0;
		$outputList = Array();
		foreach ($paraList as $name => $info)
		{
			if ($cnt > 0)
				$sqlStr .= ",";

			/* check output parameters */
			if (isset($info[3]) && $info[3])
			{
				$sqlStr .= " @".$name." output";
				$outputList[] = $name;
			}
			else
			{
				if ($info[1] == SQLVARCHAR)
					$sqlStr .= " '".$info[0]."'"; /* append string value */
				else
					$sqlStr .= " ".$info[0];
			}

			$cnt ++;
		}

		/* select results */
		if (count($outputList) > 0)
		{
			$sqlStr .= "\nselect";
			for ($i = 0; $i < count($outputList); $i ++)
			{
				if ($i > 0)
					$sqlStr .= ",";

				$sqlStr .= " @".$outputList[$i]." ".$outputList[$i];
			}
		}

		// execute the query
		if (count($outputList) == 0)
			return $this->exec($sqlStr);

		$record = $this->sqlFetchAllTable($sqlStr, true);
		if ($record == null)
			return 'ERROR';

		// write paraList out parameter
		$len = count($record);
		foreach ($outputList as $index => $name)
			$paraList[$name][0] = $record[$len-1][0][$name];


		// unset last record (out-parameter record)
		unset($record[$len-1]);
		if(array_key_exists('ErrMessage', $paraList)) {
			$errmsg = $paraList['ErrMessage'][0];
		} else {
			$errmsg = '';
		}
		if (strlen(trim($errmsg))==0	|| $errmsg=='OK' || $errmsg=='SP.OK')
			return 'OK';
		else
			return 'ERROR';
	}

	private function sqlFetchAllTable2($stmt, $convert= true){
		$rs = mssql_query($stmt, $this->db);
		$recordSetArr = Array();
		if ($rs == null)
			return null;
		do{
			$result = array();
			if (mssql_num_rows($rs)>0)
			{
				//error_reporting(E_ALL & ~ ( E_NOTICE | E_WARNING ));
				$seek = mssql_data_seek($rs, 0);
				//error_reporting(E_ALL);
				if ($seek){
					while ($record = mssql_fetch_array($rs, MSSQL_ASSOC)){
						if($convert)
							znz_gbk2utf8($record);
						$result[] = $record;
					}
				}
			}
			array_push($recordSetArr, $result);
			unset($result);
		}while(mssql_next_result($rs));
		return $recordSetArr;
	}

	private function procCall2($procName, &$paraList, &$record){
		$sqlStr = "";
		/* check paras */
		$this->parasCheck($paraList);

		/* para: para_name => value, type, [maxlen = 0], [is_output = false], [is_null = false], [is_inout = false] */
		foreach ($paraList as $name => $info)
		{
			/* declare output parameters */
			if (isset($info[3]) && $info[3])
			{
				$sqlStr .= "declare @".$name." ".$this->mssqlVarGet($info[1], $info[2])."\n";

				if (isset($info[5]) && $info[5]) /* in and out parameter */
				{
					if ($info[1] == SQLVARCHAR || $info[1] == SQLTEXT)
						$sqlStr .= "set @".$name." = '".$info[0]."'\n";
					else
						$sqlStr .= "set @".$name." = ".$info[0]."\n";
				}
			}
		}

		/* main body for calling procedure */
		$sqlStr .= "exec ".$procName;
		$cnt = 0;
		$outputList = Array();
		foreach ($paraList as $name => $info)
		{
			if ($cnt > 0)
				$sqlStr .= ",";

			/* check output parameters */
			if (isset($info[3]) && $info[3])
			{
				$sqlStr .= " @".$name." output";
				$outputList[] = $name;
			}
			else
			{
				if ($info[1] == SQLVARCHAR || $info[1] == SQLTEXT)
					$sqlStr .= " '".$info[0]."'"; /* append string value */
				else
					$sqlStr .= " ".$info[0];
			}

			$cnt ++;
		}

		/* select results */
		if (count($outputList) > 0)
		{
			$sqlStr .= "\nselect";
			for ($i = 0; $i < count($outputList); $i ++)
			{
				if ($i > 0)
					$sqlStr .= ",";

				$sqlStr .= " @".$outputList[$i]." ".$outputList[$i];
			}
		}
		//echo $sqlStr;
		// execute the query
		if (count($outputList) == 0)
			return $this->exec($sqlStr);

		$record = $this->sqlFetchAllTable2($sqlStr, false);
		if ($record == null)
			return 'ERROR';

		// write paraList out parameter
		$len = count($record);
		foreach ($outputList as $index => $name)
			$paraList[$name][0] = $record[$len-1][0][$name];


		// unset last record (out-parameter record)
		unset($record[$len-1]);
		if(array_key_exists('ErrMessage', $paraList)) {
			$errmsg = $paraList['ErrMessage'][0];
		} else {
			$errmsg = '';
		}
		if (strlen(trim($errmsg))==0	|| $errmsg=='OK' || $errmsg=='SP.OK')
			return 'OK';
		else
			return 'ERROR';
	}

	/* call procedure (extended):
		note: this function is supporting both output parameters and record set.
			for some procedures, parameter checking may fail with this function.
			in this case, function 'procCall' is preferred.
	*/
	function procCall_ext($procName, &$paraList, $getRecords = false, &$recordSet = null, $fetchType=MSSQL_BOTH)
	{
		if (!$this->open())//检查是否打开了连接
			return 'ERROR';

		/* check paras */
		$this->parasCheck($paraList);//检查参数格式

		/* init */
		$stmt = mssql_init($procName, $this->db);//初始化，存储过程名称，数据库名称
		if (!$stmt)
			return 'ERROR';

		znz_utf82gbk($paraList);
		/* para: para_name => value, type, [maxlen = 0], [is_output = false], [is_null = false] */
		foreach ($paraList as $name => $info)
		{
			$type = $info[1];
			$isOutput = false;
			$isNull = false;
			$maxLen = 0;

			if (isset($info[2]))
				$maxLen = $info[2];
			if (isset($info[3]))
				$isOutput = $info[3];
			if (isset($info[4]))
				$isNull = $info[4];

			if (!mssql_bind($stmt, "@".$name, $paraList[$name][0],//mssql_bind,向存储过程或远程存储过程添加参数
							$type, $isOutput, $isNull, $maxLen))
				return 'ERROR';
		}

		$res = mssql_execute($stmt);//mssql_execute,在MS SQL server数据库上执行存储过程
		if (!$res)
			return 'ERROR';

		if ($getRecords)
			{
				$recordSet = Array();
				$retCount = 0;
				do{
					if (gettype($res) != 'resource')//判断$res类型是否为resource
							break;
					while ($record = mssql_fetch_array($res, $fetchType))//mssql_fetch_array,获取作为关联数组、数值数组或两者同时进行的结果行
					{
						znz_gbk2utf8($record);
						$recordSet[$retCount][] = $record;
					}
					$retCount ++;
				}while(mssql_next_result($res));//mssql_next_result,将内部结果指针移动到下一个结果
			}
		znz_gbk2utf8($paraList);
		return 'OK';
	}

}


?>