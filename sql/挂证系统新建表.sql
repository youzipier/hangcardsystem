/****** SSMS 的 SelectTopNRows 命令的脚本  ******/
  -- SELECT * FROM [DBNERVE].[dbo].[_Human_Person]
  USE DB_WebNerveData

  --用户U_Linux_Php_HangCardSystem
  --基本信息
  CREATE TABLE [DB_WebNerveData].dbo._Human_Person_Exam_Baseinfo(
		Id INT PRIMARY KEY  IDENTITY(1,1)
	   ,PersonId                         INT 	NOT NULL
       ,PersonName                       VARCHAR(50)  NOT NULL
	   ,PersonFormerName                 VARCHAR(50)
	   ,IdCard                           VARCHAR(100) NOT NULL
	   ,Sex                               VARCHAR(50)         NOT NULL 
	   ,BirthDate                        VARCHAR(50)  NOT NULL
	   ,MaritalStatus                    INT         NOT NULL  --1已婚0未婚
	   ,Nationality                      VARCHAR(100) NOT NULL --国籍
	   ,DocumentType                     VARCHAR(100) NOT NULL  --证件类型
	   ,PicUrl                           VARCHAR(500) NOT NULL
	   ,SystemNumber                     VARCHAR(50)
	   ,PassportAddress                  VARCHAR(1000)
       ,PassportExpiryDate               VARCHAR(50)
	   ,Nation                           VARCHAR(50)  NOT NULL --民族
	   ,SecuritiesAge                    VARCHAR(20)          
	   ,Mobile                            VARCHAR(20)          NOT NULL
	   ,Email                            VARCHAR(100) NOT NULL
	   ,EducationId                      INT NOT NULL    
	   ,Position                         VARCHAR(50)  NOT NULL  --职务
	   ,Department                       VARCHAR(50)  NOT NULL  --部门
	   ,HireDate                         VARCHAR(20)  NOT NULL  --入职日期
	   ,OfficeMobile                     VARCHAR(20)          NOT NULL  --办公电话
	   ,Engaged                          VARCHAR(50)  NOT NULL  --从事业务
	   ,Political                        VARCHAR(50)         NOT NULL  --针织面貌 0群众1团员2党员
	   ,Title                            VARCHAR(50)  --职称
	   ,GetTitleDate                     VARCHAR(50)  --获取职称日期
	   ,IsSubsidies                      VARCHAR(50)         --是否享用国家津贴
	   ,PlaceBirth                       VARCHAR(1000)  NOT NULL --出生地
	   ,HomeCode                         VARCHAR(50)  NOT NULL  --家庭邮编
	   ,HomeAddress                      VARCHAR(1000)  NOT NULL --家庭住址
	   ,HomeMobile                       VARCHAR(20)              NOT NULL --家庭电话
	   ,Qualificat                       VARCHAR(2000)     --资格
	
 )


  --教育经历
  CREATE TABLE DB_WebNerveData.dbo._Human_Person_Exam_EducationExperience(
		Id INT PRIMARY KEY  IDENTITY(1,1)
	   ,PersonId     INT 	NOT NULL
       ,StartDate    VARCHAR(50)  NOT NULL
	   ,EndDate      VARCHAR(50)  NOT NULL
	   ,School       VARCHAR(500) NOT NULL
	   ,EducationId  INT          NOT NULL --1高中2中专3中技4职高5本科6硕士7博士
	   ,Professional VARCHAR(100)          --专业
	   ,IsGraduated  VARCHAR(50)           --1毕业0未毕业
	   ,XlNumber     VARCHAR(500)                --学历证明编号
	   ,IsDegree     VARCHAR(100)           --是否有学位  --1有0无
	   ,XwNumber     VARCHAR(500)                --学位证明编号
  )


  --工作经历
  CREATE TABLE DB_WebNerveData.dbo._Human_Person_Exam_WorkExperience(
		Id INT PRIMARY KEY  IDENTITY(1,1)
	   ,PersonId     INT 	NOT NULL
       ,StartDate     VARCHAR(50)  NOT NULL
	   ,EndDate       VARCHAR(50)  NOT NULL
	   ,WorkUnits     VARCHAR(500) NOT NULL  --工作单位
	   ,WorkDepartment VARCHAR(50) NOT NULL --工作部门
	   ,IsSecurities   VARCHAR(50) NOT NULL   --是否证券业务有关
	   ,WorkPosition    VARCHAR(100) --岗位职务
	   ,WorkTypeId      INT NOT NULL   --任职类型 1全职2兼职工作3军队服役4也包括失业5脱产学习6待业
	   ,ReferenPerson    VARCHAR(50)    --证明人
	   ,ReferenMobile        VARCHAR(50)    --证明人电话
  )


  --教育等级
  CREATE TABLE dbo._Human_Person_Exam_Education(
		EducationId INT PRIMARY KEY  IDENTITY(1,1)
	   ,EducationName VARCHAR(100)  --1高中2中专3中技4职高5本科6硕士7博士
   )


   --工作类型
  CREATE TABLE dbo._Human_Person_Exam_WorkType(
		WorkTypeId INT PRIMARY KEY  IDENTITY(1,1)
	   ,WorkTypeIdName VARCHAR(100) --
   )

   INSERT INTO dbo._Human_Person_Exam_Education VALUES ('高中'),('中专'),('中技'),('职高'),('专科'),('本科'),('硕士'),('博士')
   INSERT INTO dbo._Human_Person_Exam_WorkType VALUES('全职'),('兼职'),('待业'),('军队服役'),('脱产学习')

   --SELECT * FROM DB_WebNerveData.dbo._Human_Person_Exam_Education
   SELECT * FROM DB_WebNerveData.dbo._Human_Person_Exam_Baseinfo
   SELECT * FROM DB_WebNerveData.dbo._Human_Person_Exam_EducationExperience
   SELECT * FROM DB_WebNerveData.dbo._Human_Person_Exam_WorkExperience

  -- DROP TABLE DB_WebNerveData.dbo._Human_Person_Exam_Baseinfo
     DROP TABLE DB_WebNerveData.dbo._Human_Person_Exam_EducationExperience
	 DROP TABLE DB_WebNerveData.dbo._Human_Person_Exam_WorkExperience

   SELECT 7992+2600

  