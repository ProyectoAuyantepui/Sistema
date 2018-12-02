
create table "TDocentes"(
"cedDoc" varchar(10),
"codRol" varchar(50),
"fecNac" date,
"telefono" varchar(12),
"direccion" varchar(120),
"fecIng" date, 
"fecCon" date,
"condicion" varchar(120),
"carrera" varchar(50),
"pregrado" varchar(120),
"postgrado" varchar (120)
primary key("cedDoc")
);

create table "TRoles"(
"codRol" varchar(50),
"nombre" varchar(50),
"observaciones" varchar(150),
primary key("codRol")
);


create table "TPermisos"(
"codPer" varchar(8),
"nombre" varchar(90),
primary key("codPer")
);

create table "TRolPer"(
"codRol" varchar(50),
"codPer" varchar(8),
primary key("codRol" , "codPer")
);


create table "TBitacora"(
"codBit" serial,
"cedDoc" varchar(10),
"accion" varchar(60),
"fecha" date,
"hora" time,
primary key("codBit")
);


alter table "TDocentes"
add constraint "fk_codRol_TRoles"
foreign key("codRol") 
references "TRoles"("codRol")
ON DELETE SET NULL ON UPDATE SET NULL;

alter table "TRolPer"
add constraint "fk_codRol_TRoles"
foreign key("codRol") 
references "TRoles"("codRol");

alter table "TRolPer"
add constraint "fk_codPer_TPermisos"
foreign key("codPer") 
references "TPermisos"("codPer");

alter table "TBitacora"
add constraint "fk_cedDoc_TDocente"
foreign key("cedDoc") 
references "TDocentes"("cedDoc")
ON DELETE CASCADE ON UPDATE CASCADE;
