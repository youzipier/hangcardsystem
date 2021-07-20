USE [DB_WebNerveData]
GO

/****** Object:  Table [dbo].[_Human_Person_Exam_Education]    Script Date: 2021/6/29 14:44:57 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[_Human_Person_Exam_Education](
	[EducationId] [int] IDENTITY(1,1) NOT NULL,
	[EducationName] [varchar](100) NULL,
PRIMARY KEY CLUSTERED 
(
	[EducationId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO


