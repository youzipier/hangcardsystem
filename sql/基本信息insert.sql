USE [DB_WebNerveData]
GO
/****** Object:  StoredProcedure [dbo].[P_Human_Person_Exam_BaseInfo_Insert]    Script Date: 2021/7/5 18:15:36 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO





-- =============================================
-- Author:		王哲
-- Create date: 2021-06-15
-- Description:	挂证基本信息入库
-- =============================================
ALTER   PROCEDURE [dbo].[P_Human_Person_Exam_BaseInfo_Insert]
--DECLARE
	    @PersonId                         VARCHAR(50) 	
       ,@PersonName                       VARCHAR(50)  
	   ,@PersonFormerName                 VARCHAR(50)
	   ,@IdCard                           VARCHAR(100) 
	   ,@Sex                              VARCHAR(50)         --1男0女 
	   ,@BirthDate                        VARCHAR(50)  
	   ,@MaritalStatus                    VARCHAR(50)            --1已婚0未婚
	   ,@Nationality                      VARCHAR(100)   --国籍
	   ,@DocumentType                     VARCHAR(100)   --证件类型
	   ,@PicUrl                           VARCHAR(100) 
	   ,@SystemNumber                     VARCHAR(50)
	   ,@PassportAddress                  VARCHAR(1000)
       ,@PassportExpiryDate               VARCHAR(50)
	   ,@Nation                           VARCHAR(50)   --民族
	   ,@SecuritiesAge                    VARCHAR(20)  
	   ,@Mobile                           VARCHAR(20)        
	   ,@Email                            VARCHAR(100) 
	   ,@EducationId                       VARCHAR(20) 
	   ,@Position                         VARCHAR(20)    --职务
	   ,@Department                       VARCHAR(50)    --部门
	   ,@HireDate                         VARCHAR(20)    --入职日期
	   ,@OfficeMobile                    VARCHAR(20)           --办公电话
	   ,@Engaged                          VARCHAR(50)    --从事业务
	   ,@Political                         VARCHAR(20)            --针织面貌 0群众1团员2党员
	   ,@Title                            VARCHAR(50)  --职称
	   ,@GetTitleDate                     VARCHAR(50)  --获取职称日期
	   ,@IsSubsidies                       VARCHAR(20)        --是否享用国家津贴
	   ,@PlaceBirth                       VARCHAR(1000)  --出生地
	   ,@HomeCode                          VARCHAR(20)           --家庭邮编
	   ,@HomeAddress                      VARCHAR(1000)     --家庭住址
	   ,@HomeMobile                       VARCHAR(20)           --家庭电话
	   ,@Qualificat                       VARCHAR(20)     --资格
	
	   ,@errMsg		                      VARCHAR(1024)    OUTPUT

AS
BEGIN
    SET NOCOUNT ON 
	
    SET @errMsg='Not End'

	
	IF ISNULL(@DocumentType,'') = ''
	BEGIN 
		SET @DocumentType = '身份证'
	END 


	--开启事物
	BEGIN TRAN;
	BEGIN TRY

		
	    --数据插入
		MERGE INTO [DB_WebNerveData].dbo._Human_Person_Exam_Baseinfo a
		USING ( SELECT @PersonId         AS PersonId,
		               @PersonName       AS PersonName,
				       @PersonFormerName AS PersonFormerName,
					   @IdCard           AS IdCard ,
					   @Sex              AS Sex ,
					   @BirthDate        AS BirthDate,
					   @MaritalStatus    AS MaritalStatus,
					   @Nationality      AS Nationality,
					   @DocumentType     AS DocumentType,
					   @PicUrl           AS PicUrl,
					   @SystemNumber     AS SystemNumber  ,
					   @PassportAddress  AS PassportAddress ,
					   @PassportExpiryDate AS PassportExpiryDate,
					   @Nation           AS Nation,
					   @SecuritiesAge    AS SecuritiesAge,
					   @Mobile           AS Mobile,
					   @Email            AS Email ,
					   @EducationId      AS EducationId,
					   @Position         AS Position,
					   @Department       AS Department,
					   @HireDate         AS HireDate,
					   @OfficeMobile     AS OfficeMobile,
					   @Engaged          AS Engaged,
					   @Political        AS Political,
					   @Title            AS Title ,
					   @GetTitleDate     AS GetTitleDate,
					   @IsSubsidies      AS IsSubsidies ,
					   @PlaceBirth       AS PlaceBirth,
					   @HomeCode         AS HomeCode,
					   @HomeAddress      AS HomeAddress,
					   @HomeMobile       AS HomeMobile,
					   @Qualificat       AS Qualificat,
					   0                 AS review,
					   0                 AS review_rs
			)b
	    ON a.PersonId = b.PersonId
		WHEN MATCHED THEN 
			UPDATE SET a.PersonName=b.PersonName,
			           a.PersonFormerName=IIF(b.PersonFormerName='-1',NULL,b.PersonFormerName),
					   a.IdCard=b.IdCard,
					   a.Sex=b.Sex,
			           a.BirthDate=b.BirthDate,
					   a.MaritalStatus=b.MaritalStatus,
					   a.Nationality=b.Nationality,
			           a.DocumentType=b.DocumentType,
					   a.PicUrl=b.PicUrl,
					   a.SystemNumber=IIF(b.SystemNumber='-1',NULL,b.SystemNumber),
			           a.PassportAddress=IIF(b.PassportAddress='-1',NULL,b.PassportAddress),
					   a.PassportExpiryDate=IIF(b.PassportExpiryDate='-1',NULL,b.PassportExpiryDate),
					   a.Nation=b.Nation,
			           a.SecuritiesAge=IIF(b.SecuritiesAge='-1',NULL,b.SecuritiesAge),
					   a.Mobile=b.Mobile,
					   a.Email=b.Email,
			           a.EducationId=b.EducationId,
					   a.Position=b.Position,
					   a.Department=b.Department,
			           a.HireDate=b.HireDate,
					   a.OfficeMobile=b.OfficeMobile,
					   a.Engaged=b.Engaged,
			           a.Political=b.Political,
					   a.Title=IIF(b.Title='-1',NULL,b.Title),
					   a.GetTitleDate=IIF(b.GetTitleDate='-1',NULL,b.GetTitleDate),
					   a.IsSubsidies=IIF(b.IsSubsidies='-1',NULL,b.IsSubsidies),
			           a.PlaceBirth=b.PlaceBirth,
					   a.HomeCode=b.HomeCode,
					   a.HomeAddress=b.HomeAddress,
			           a.HomeMobile=b.HomeMobile,
					   a.Qualificat=IIF(b.Qualificat='-1',NULL,b.Qualificat),
					   a.review = b.review,
					   a.review_rs = b.review_rs
		WHEN NOT MATCHED THEN
			INSERT  VALUES (b.PersonId,b.PersonName,IIF(b.PersonFormerName='-1',NULL,b.PersonFormerName),IdCard,Sex,BirthDate,MaritalStatus,Nationality
							,DocumentType,PicUrl,IIF(b.SystemNumber='-1',NULL,b.SystemNumber),IIF(b.PassportAddress='-1',NULL,b.PassportAddress)
							,IIF(b.PassportExpiryDate='-1',NULL,b.PassportExpiryDate),Nation 
							,IIF(b.SecuritiesAge='-1',NULL,b.SecuritiesAge)
							,Mobile,Email,EducationId,Position,Department,HireDate,OfficeMobile
							,Engaged,Political,IIF(b.Title='-1',NULL,b.Title),IIF(b.GetTitleDate='-1',NULL,b.GetTitleDate)
							,IIF(b.IsSubsidies='-1',NULL,b.IsSubsidies),PlaceBirth,HomeCode,HomeAddress
							,HomeMobile,IIF(b.Qualificat='-1',NULL,b.Qualificat),0,0
			);

	   
	END TRY
	BEGIN CATCH
		SET @errMsg = '结果提交出错!!'+ERROR_MESSAGE();
		ROLLBACK TRAN;
		RETURN;
	END CATCH;
   
	COMMIT TRAN; --没有异常，最后提交事务


	SET @errMsg='OK'
 
 
END


