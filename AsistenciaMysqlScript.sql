/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     21/07/2022 10:53:56                          */
/*==============================================================*/


/*==============================================================*/
/* Table: TBL_ACCESO                                            */
/*==============================================================*/
create table TBL_ACCESO
(
   ACS_ID               int not null auto_increment,
   USU_ID               int not null,
   PRO_ID               int not null,
   ACS_OBSERVACION      varchar(200),
   primary key (ACS_ID),
   add constraint foreign key (PRO_ID) references TBL_PROYECTO (PRO_ID),
   add constraint foreign key (USU_ID) references TBL_USUARIO (USU_ID)
);

/*==============================================================*/
/* Table: TBL_ASISTENCIA                                        */
/*==============================================================*/
create table TBL_ASISTENCIA
(
   ASIS_ID              int not null auto_increment,
   USPR_ID              int not null,
   OBS_ID               int,
   ASIS_FECHA           date not null,
   ASIS_REGISTRADOR     varchar(100) not null,
   ASIS_VERIFICACION    bool not null,
   ASIS_OBSERVACION     varchar(200),
   primary key (ASIS_ID),
   add constraint foreign key (OBS_ID) references TBL_OBSERVACION (OBS_ID),
   add constraint foreign key (USPR_ID) references TBL_USUARIO_PROYECTO (USPR_ID)
);

/*==============================================================*/
/* Table: TBL_HORASEXTRA                                        */
/*==============================================================*/
create table TBL_HORASEXTRA
(
   HEXTRA_ID            int not null auto_increment,
   USPR_ID              int not null,
   HEXTRA_FECHAREGISTRO datetime not null,
   HEXTRA_FECHATRABAJO  datetime not null,
   HEXTRA_REGISTRADOR   varchar(100) not null,
   HEXTRA_NUMHORAS      int not null,
   primary key (HEXTRA_ID),
   add constraint foreign key (USPR_ID) references TBL_USUARIO_PROYECTO (USPR_ID)
);

/*==============================================================*/
/* Table: TBL_OBSERVACION                                       */
/*==============================================================*/
create table TBL_OBSERVACION
(
   OBS_ID               int not null auto_increment,
   OBS_CODIGO           varchar(3) not null,
   OBS_COMENTARIO       varchar(50) not null,
   OBS_COLOR            varchar(20) not null,
   primary key (OBS_ID)
);

/*==============================================================*/
/* Table: TBL_PROYECTO                                          */
/*==============================================================*/
create table TBL_PROYECTO
(
   PRO_ID               int not null auto_increment,
   PRO_NOMBRE           varchar(100) not null,
   PRO_CLIENTE          varchar(100) not null,
   primary key (PRO_ID)
);

/*==============================================================*/
/* Table: TBL_USUARIO                                           */
/*==============================================================*/
create table TBL_USUARIO
(
   USU_ID               int not null auto_increment,
   USU_CEDULA           varchar(10) not null,
   USU_NOMAPE           varchar(100) not null,
   USU_TELF             varchar(10) not null,
   primary key (USU_ID)
);

/*==============================================================*/
/* Table: TBL_USUARIO_PROYECTO                                  */
/*==============================================================*/
create table TBL_USUARIO_PROYECTO
(
   USPR_ID              int not null auto_increment,
   USU_ID               int not null,
   PRO_ID               int not null,
   USPR_CARGO           varchar(25) not null,
   USPR_JORNADA         varchar(5) not null,
   USPR_REGISTRADOR     varchar(100) not null,
   USPR_FECHACREACION   date not null,
   USPR_ESTADO          varchar(15) not null,
   primary key (USPR_ID),
   add constraint foreign key (PRO_ID) references TBL_PROYECTO (PRO_ID),
   add constraint foreign key (USU_ID) references TBL_USUARIO (USU_ID)
);
