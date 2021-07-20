USE [DB_WebNerveData]
GO

/****** Object:  StoredProcedure [dbo].[P_Human_Person_Exam_WorkInfo_Insert]    Script Date: 2021/6/29 14:56:12 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO





-- =============================================
-- Author:		王哲
-- Create date: 2021-06-15
-- Description:	挂证工作信息入库
-- =============================================
CREATE  PROCEDURE [dbo].[P_Human_Person_Exam_WorkInfo_Insert]
--DECLARE
	    @PersonId                         VARCHAR(50) 	
       ,@StartDate                        VARCHAR(50)  
	   ,@EndDate                          VARCHAR(50)
	   ,@WorkUnits                        VARCHAR(100) 
	   ,@WorkDepartment                    VARCHAR(50)       
	   ,@IsSecurities                      VARCHAR(50)  
	   ,@WorkPosition                      VARCHAR(50)            
	   ,@WorkType                          VARCHAR(100)   
	   ,@ReferenPerson                       VARCHAR(100)  
	   ,@ReferenMobile                       VARCHAR(100) 
	   
	   ,@errMsg		                      VARCHAR(1024)    OUTPUT

AS
BEGIN
    SET NOCOUNT ON 
    SET @errMsg='Not End'

	DECLARE @WorkTypeId INT
	SELECT @WorkTypeId = WorkTypeId FROM [DB_WebNerveData].dbo._Human_Person_Exam_WorkType WHERE WorkTypeIdName=@WorkType
   -- SELECT @EducationId

	--开启事物
	BEGIN TRAN;
	BEGIN TRY


	    --数据插入
		MERGE INTO [DB_WebNerveData].dbo._Human_Person_Exam_WorkExperience a
		USING ( SELECT @PersonId         AS PersonId,
		               @StartDate        AS StartDate,
				       @EndDate          AS EndDate,
					   @WorkUnits        AS WorkUnits ,
					   @WorkDepartment      AS WorkDepartment,
					   @IsSecurities     AS IsSecurities,
					   @WorkPosition      AS WorkPosition,
					   @WorkTypeId         AS WorkTypeId,
					   @ReferenPerson         AS ReferenPerson,
					   @ReferenMobile         AS ReferenMobile  
			)b
	    ON a.PersonId = b.PersonId AND a.WorkUnits = b.WorkUnits
		WHEN MATCHED THEN 
			UPDATE SET a.StartDate=b.StartDate,
			           a.EndDate=b.EndDate,
					   a.WorkDepartment=b.WorkDepartment,
			           a.IsSecurities=b.IsSecurities,
					   a.WorkPosition=IIF(b.WorkPosition='-1',NULL,b.WorkPosition),
			           a.WorkTypeId=IIF(b.WorkTypeId='-1',NULL,b.WorkTypeId),
					   a.ReferenPerson=IIF(b.ReferenPerson='-1',NULL,b.ReferenPerson),
					   a.ReferenMobile=IIF(b.ReferenMobile='-1',NULL,b.ReferenMobile)
					  
		WHEN NOT MATCHED THEN
			INSERT  VALUES (b.PersonId,b.StartDate,b.EndDate,
			                b.WorkUnits,b.WorkDepartment,b.IsSecurities,
			                b.WorkPosition,b.WorkTypeId,b.ReferenPerson,
					        b.ReferenMobile
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


