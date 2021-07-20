USE [DB_WebNerveData]
GO

/****** Object:  StoredProcedure [dbo].[P_Human_Person_Exam_EducationInfo_Insert]    Script Date: 2021/6/29 14:55:39 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO





-- =============================================
-- Author:		王哲
-- Create date: 2021-06-15
-- Description:	挂证学历信息入库
-- =============================================
CREATE   PROCEDURE [dbo].[P_Human_Person_Exam_EducationInfo_Insert]
--DECLARE
	    @PersonId                         VARCHAR(50) 	
       ,@StartDate                        VARCHAR(50)  
	   ,@EndDate                          VARCHAR(50)
	   ,@School                           VARCHAR(100) 
	   ,@Education                       VARCHAR(50)       
	   ,@Professional                      VARCHAR(50)  
	   ,@IsGraduated                      VARCHAR(50)            
	   ,@XlNumber                         VARCHAR(100)   
	   ,@IsDegree                         VARCHAR(100)  
	   ,@XwNumber                          VARCHAR(100) 
	   
	   ,@errMsg		                      VARCHAR(1024)    OUTPUT

AS
BEGIN
    SET NOCOUNT ON 
    SET @errMsg='Not End'

	DECLARE @EducationId INT
	SELECT @EducationId = EducationId FROM [DB_WebNerveData].dbo._Human_Person_Exam_Education WHERE EducationName=@Education
   -- SELECT @EducationId

	--开启事物
	BEGIN TRAN;
	BEGIN TRY


	    --数据插入
		MERGE INTO [DB_WebNerveData].dbo._Human_Person_Exam_EducationExperience a
		USING ( SELECT @PersonId         AS PersonId,
		               @StartDate        AS StartDate,
				       @EndDate          AS EndDate,
					   @School           AS School ,
					   @Educationid      AS EducationId,
					   @Professional     AS Professional,
					   @IsGraduated      AS IsGraduated,
					   @XlNumber         AS XlNumber,
					   @IsDegree         AS IsDegree,
					   @XwNumber         AS XwNumber  
			)b
	    ON a.PersonId = b.PersonId AND a.Educationid = b.Educationid
		WHEN MATCHED THEN 
			UPDATE SET a.StartDate=b.StartDate,
			           a.EndDate=b.EndDate,
					   a.School=b.School,
			           a.Professional=IIF(b.Professional='-1',NULL,b.Professional),
					   a.IsGraduated=b.IsGraduated,
					   a.XlNumber=IIF(b.XlNumber='-1',NULL,b.XlNumber),
			           a.IsDegree=IIF(b.IsDegree='-1',NULL,b.IsDegree),
					   a.XwNumber=IIF(b.XwNumber='-1',NULL,b.XwNumber)
					  
		WHEN NOT MATCHED THEN
			INSERT  VALUES (b.PersonId,b.StartDate,b.EndDate,
			                b.School,b.EducationId,IIF(b.Professional='-1',NULL,b.Professional),
			                b.IsGraduated,IIF(b.XlNumber='-1',NULL,b.XlNumber),IIF(b.IsDegree='-1',NULL,b.IsDegree),
					       IIF(b.XwNumber='-1',NULL,b.XwNumber)
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


GO


