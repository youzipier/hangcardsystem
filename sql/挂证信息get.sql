USE [DB_WebNerveData]
GO

/****** Object:  StoredProcedure [dbo].[P_Human_Person_Exam_AllInfo_get]    Script Date: 2021/6/29 14:54:13 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO





-- =============================================
-- Author:		王哲
-- Create date: 2021-06-16
-- Description:	挂证信息
-- =============================================
CREATE  PROCEDURE [dbo].[P_Human_Person_Exam_AllInfo_get]
		@opid                               INT 

	   ,@errMsg		                      VARCHAR(1024)    OUTPUT

AS
BEGIN
    SET NOCOUNT ON 
    SET @errMsg='Not End'

	SELECT * FROM [DB_WebNerveData].dbo._Human_Person_Exam_Baseinfo WHERE personid = @opid


	SELECT * ,ROW_NUMBER() OVER(ORDER BY StartDate ASC ) AS Rowid
	FROM DB_WebNerveData.dbo._Human_Person_Exam_EducationExperience a
	JOIN dbo._Human_Person_Exam_Education b ON a.EducationId = b.EducationId
	WHERE a.personid = @opid


	SELECT * ,ROW_NUMBER() OVER(ORDER BY StartDate ASC ) AS Rowid
	FROM DB_WebNerveData.dbo._Human_Person_Exam_WorkExperience a
	JOIN dbo._Human_Person_Exam_WorkType b ON a.WorkTypeId = b.WorkTypeId
	WHERE a.personid = @opid


	SET @errMsg='OK'
 
 
END


GO


