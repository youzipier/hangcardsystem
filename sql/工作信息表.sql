USE [DB_WebNerveData]
GO

/****** Object:  Table [dbo].[_Human_Person_Exam_WorkExperience]    Script Date: 2021/6/29 14:48:24 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[_Human_Person_Exam_WorkExperience](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[PersonId] [int] NOT NULL,
	[StartDate] [varchar](50) NOT NULL,
	[EndDate] [varchar](50) NOT NULL,
	[WorkUnits] [varchar](500) NOT NULL,
	[WorkDepartment] [varchar](50) NOT NULL,
	[IsSecurities] [varchar](50) NOT NULL,
	[WorkPosition] [varchar](100) NULL,
	[WorkTypeId] [int] NOT NULL,
	[ReferenPerson] [varchar](50) NULL,
	[ReferenMobile] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO


