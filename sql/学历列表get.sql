USE [DB_WebNerveData]
GO

/****** Object:  StoredProcedure [dbo].[P_Human_Person_Exam_EducationList_Get]    Script Date: 2021/6/29 14:53:03 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO





-- =============================================
-- Author:		王哲
-- Create date: 2021-06-15
-- Description:	教育信息列表获取
-- =============================================
CREATE    PROCEDURE [dbo].[P_Human_Person_Exam_EducationList_Get]
--DECLARE
	  
	
	   @errMsg		                      VARCHAR(1024)    OUTPUT

AS
BEGIN
    SET NOCOUNT ON 
	
    SET @errMsg='Not End'

	
	SELECT * FROM dbo._Human_Person_Exam_Education


	SET @errMsg='OK'
 
 
END


GO


