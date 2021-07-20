USE [DB_WebNerveData]
GO

/****** Object:  Table [dbo].[_Human_Person_Exam_EducationExperience]    Script Date: 2021/6/29 14:45:34 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[_Human_Person_Exam_EducationExperience](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[PersonId] [int] NOT NULL,
	[StartDate] [varchar](50) NOT NULL,
	[EndDate] [varchar](50) NOT NULL,
	[School] [varchar](500) NOT NULL,
	[EducationId] [int] NOT NULL,
	[Professional] [varchar](100) NULL,
	[IsGraduated] [varchar](50) NULL,
	[XlNumber] [varchar](500) NULL,
	[IsDegree] [varchar](50) NULL,
	[XwNumber] [varchar](500) NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO


