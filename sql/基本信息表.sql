USE [DB_WebNerveData]
GO

/****** Object:  Table [dbo].[_Human_Person_Exam_Baseinfo]    Script Date: 2021/6/29 14:44:17 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[_Human_Person_Exam_Baseinfo](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[PersonId] [int] NOT NULL,
	[PersonName] [varchar](50) NOT NULL,
	[PersonFormerName] [varchar](50) NULL,
	[IdCard] [varchar](100) NOT NULL,
	[Sex] [varchar](50) NOT NULL,
	[BirthDate] [varchar](50) NOT NULL,
	[MaritalStatus] [int] NOT NULL,
	[Nationality] [varchar](100) NOT NULL,
	[DocumentType] [varchar](100) NOT NULL,
	[PicUrl] [varchar](500) NOT NULL,
	[SystemNumber] [varchar](50) NULL,
	[PassportAddress] [varchar](1000) NULL,
	[PassportExpiryDate] [varchar](50) NULL,
	[Nation] [varchar](50) NOT NULL,
	[SecuritiesAge] [varchar](20) NULL,
	[Mobile] [varchar](20) NOT NULL,
	[Email] [varchar](100) NOT NULL,
	[EducationId] [int] NOT NULL,
	[Position] [varchar](50) NOT NULL,
	[Department] [varchar](50) NOT NULL,
	[HireDate] [varchar](20) NOT NULL,
	[OfficeMobile] [varchar](20) NOT NULL,
	[Engaged] [varchar](50) NOT NULL,
	[Political] [varchar](50) NOT NULL,
	[Title] [varchar](50) NULL,
	[GetTitleDate] [varchar](50) NULL,
	[IsSubsidies] [varchar](50) NULL,
	[PlaceBirth] [varchar](1000) NOT NULL,
	[HomeCode] [varchar](50) NOT NULL,
	[HomeAddress] [varchar](1000) NOT NULL,
	[HomeMobile] [varchar](20) NOT NULL,
	[Qualificat] [varchar](2000) NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO


