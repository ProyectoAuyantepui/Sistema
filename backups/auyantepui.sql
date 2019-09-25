
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

-- Estructura para la tabla(06) "TComisiones" : Almacena informacion acerca de comisiones de un docente

create table "TComisiones"(
"codCom" serial,
"nombre" varchar(60),
"dependencia" varchar(220),
"descripcion" varchar(120),
primary key("codCom")
);

-- Estructura para la tabla(07) "TComDoc" : Tabla puente entre "TComisiones" y "TDocentes"

create table "TComDoc"(
"codCom" int,
"cedDoc" varchar(10),
"coordinador" boolean,
primary key( "codCom" , "cedDoc" )
);

-- Estructura para la tabla(08) "TCatDoc" : Almacena informacion acerca de categorias de docentes

create table "TCatDoc"(
"codCatDoc" serial,
"nombre" varchar(60),
"descripcion" varchar(120),
primary key("codCatDoc")
);

-- Estructura para la tabla(09) "TDependencias" : Almacena informacion acerca de dependencias a las que esta adscrito un docente o cualquier empleado en la uptaeb

create table "TDependencias"(
"codDep" serial,
"nombre" varchar(50),
"descripcion" varchar(120),
primary key("codDep")
);

-- Estructura para la tabla(10) "TDocDep" : Tabla detalles entre las tablas "TDocentes" y Tdependendencia

create table "TDocDep"(
"cedDoc" varchar(10),
"codDep" int,
primary key("cedDoc" , "codDep")
);

-- Estructura para la tabla(11) "TPnf" : Almacena la informacion sobre los PNF o carreras de la uptaeb y esta estrictamente relacionado con las unidades curriculares o materias osea con el pensum 

create table "TPnf"(
"codPnf" varchar(6),
"descripcion" varchar(150),
primary key("codPnf")
);

-- Estructura para la tabla(12) "TEjes" : Almacena informacion acerca de los ejes de formacion a los que pertenecen las unidades curriculares por ejemplo eje epistemologico

create table "TEjes"(
"codEje" serial,
"nombre" varchar(60),
"descripcion" varchar(150),
primary key("codEje")
);

-- Estructura para la tabla(13) "TUnidCurr" : Almacena informacion acerca de Unidades curriculares o las materias y esta relacionada con horarios , eje, y pnf

create table "TUnidCurr"(
"codUniCur" varchar(10),
"codPnf" varchar(6),
"codEje" int,
"nombre" varchar(60),
"uniCre" int,
"fase" int,
"trayecto" int,
"htas" int,--horas de trabajo asistido anuales
"htis" int,--horas de trabajo integral semanales
"observaciones" varchar(150),
primary key("codUniCur")
);

-- Estructura para la tabla(14) "TAmbientes" : Guarda la informacion acerca de los ambientes o aulas de clase 

create table "TAmbientes"(
"codAmb" varchar(8),
"ubicacion" varchar(60),
"tipo" int,
"observaciones" varchar(150),
"estado" boolean,
-- TIPOS DE AMBIENTES

-- 1). SALON
-- 2). CANCHA
-- 3). SALA DE REUNION
-- 4). LABORATORIO
-- 5). OTROS
primary key("codAmb")
);

-- Estructura para la tabla(15) "TSecciones" : Almacena informacion acerca de las secciones de los estudiantes de cada pnf 

create table "TSecciones"(
"codSec" varchar(15),
"pnf" varchar(6),
"trayecto" int,
"fase" int,
"matricula" int,
"estado" boolean default 'F',
"tipo" int,
"turno" int,
"observaciones" varchar(150),
-- TIPOS DE SECCIONES

-- 1). Normal
-- 2). Repitientes
primary key("codSec")
);

-- Estructura para la tabla(16) "TActiAdmi" : Almacena informacion acerca de Otras Actividades Administrativas del docente que tambien son tomadas en cuenta para su horario pero no como horas de clase

CREATE TABLE public."TActiAdmi" (
    "codActAdm" integer NOT NULL,
    titulo character varying(60),
    observaciones character varying(150),
    dependencia character varying(300),
    "tipActAdm" character varying(60)
);

-- TIPOS DE ACTIVIDADES

-- 1). Creación Intelectual (CI)
-- 2). Integración Comunidad (IC)
-- 3). Asesoría Académica (AA)
-- 4). Gestión Académica (GA)
-- 5). Otras Act. Académicas (OAA)

primary key("codActAdm")
);

-- Estructura para la tabla(17) "TDias" : Almacena informacion acerca de los dias de la semana 

create table "TDias"(
"codDia" varchar(8),
"nombre" varchar(10),
primary key("codDia")
);

-- Estructura para la tabla(18) "THoras" : Almacena informacion acerca de las horas de inicio y de salida de cada actividad

create table "THoras"(
"codHor" varchar(8),
"horEnt" time,
"horSal" time,
primary key("codHor")
);

-- Estructura para la tabla(19) "TTiempo" : Tabla Puente entre las tablas "TDias" y "THoras" y esta relacionada tambien con horario

create table "TTiempo"(
"codTie" varchar(8),
"codDia" varchar(8),
"codHor" varchar(8),
primary key("codTie")
);

-- Estructura para la tabla(20) "THorarios" : Tabla principal que generara los horarios de secciones , docentes , aulas y unidades curriculares ademas de otros reportes y consultas

create table "THorarios"(
"codHor" serial,
"cedDoc" varchar(10),
"codSec" varchar(15),
"codUniCur" varchar(10),
"codActAdm" int,
"codTie" varchar(8),
"codAmb" varchar(8),
"tipo" int,
"estado" boolean,

-- TIPOS DE HORARIOS

-- 1). Academico
-- 2). Administrativo

primary key("codHor")
);

-- Estructura para la tabla(21) "TBitacora" : Almacena informacion acerca de todas las transacciones de los usuarios dentro del sistema

create table "TBitacora"(
"codBit" serial,
"cedDoc" varchar(10),
"accion" varchar(60),
"fecha" date,
"hora" time,
"descripcion" varchar(120),
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
