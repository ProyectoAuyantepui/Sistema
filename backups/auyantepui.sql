
-- BASE DE DATOS SISTEMA DE HORARIOS DEL PNF EN INFORMATICA EN LA UPTAEB

-- drop database horarios;
-- create database horarios;

-- Estructura para la tabla(01) "TDocentes" : Almacena informacion acerca de docentes de la uptaeb

create table "TDocentes"(
"cedDoc" varchar(10),
"codCatDoc" int,
"codDed" int,
"codRol" varchar(50),
"nombre" varchar(20),
"apellido" varchar(20),
"fecNac" date,
"sexo" int,
"telefono" varchar(12),
"correo" varchar(40),
"direccion" varchar(120),
"fecIng" date, 
"fecCon" date,
"condicion" varchar(120),
"usuario" varchar(12),
"clave" varchar(88),
"estado" boolean,
"avatar" varchar(120),
"observaciones" varchar(120),
primary key("cedDoc")
);

-- Estructura para la tabla(02) "TRoles" : Almacena informacion de los roles del sistema 

create table "TRoles"(
"codRol" varchar(50),
"nombre" varchar(50),
"observaciones" varchar(150),
primary key("codRol")
);

-- Estructura para la tabla(03) "TDedicaciones" : Almacena informacion de las dedicaciones de docentes 

create table "TDedicaciones"(
"codDed" serial,
"nombre" varchar(50),
"minHor" int,
"maxHor" int,
primary key("codDed")
);

-- Estructura para la tabla(04) "TPermisos" : Almacena informacion acerca de los modulos del sistema a los que el rol despues podra acceder

create table "TPermisos"(
"codPer" varchar(8),
"nombre" varchar(90),
primary key("codPer")
);


-- Estructura para la tabla(05) "TRolPer" : Tabla detalles entre las tablas "TRoles" , "TPermisos" que representa la permisologia de los roles del sistema

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

create table "TActiAdmi"(
"codActAdm" serial,
"titulo" varchar(60),
"observaciones" varchar(150),
"dependencia" varchar(300),
"tipActAdm" varchar(60),

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


-- CREACION DE RESTRICCIONES DE LLAVES FORANEAS DE LAS TABLAS DE LA BASE DE DATOS

-- Llaves Foraneas para la tabla(07) "TComDoc"

alter table "TComDoc" 
add constraint "fk_cedDoc_TDocentes"
foreign key("cedDoc") 
references "TDocentes"("cedDoc")
ON DELETE CASCADE ON UPDATE CASCADE;

alter table "TComDoc" 
add constraint "fk_codCom_TComisiones"
foreign key("codCom") 
references "TComisiones"("codCom")
ON DELETE CASCADE ON UPDATE CASCADE;

-- Llaves Foraneas para la tabla(01) "TDocentes"

alter table "TDocentes"
add constraint "fk_codCatDoc_TCatDoc"
foreign key("codCatDoc") 
references "TCatDoc"("codCatDoc")
ON DELETE SET NULL ON UPDATE SET NULL;

alter table "TDocentes"
add constraint "fk_codRol_TRoles"
foreign key("codRol") 
references "TRoles"("codRol")
ON DELETE SET NULL ON UPDATE SET NULL;

alter table "TDocentes"
add constraint "fk_codDed_TDedicaciones"
foreign key("codDed") 
references "TDedicaciones"("codDed")
ON DELETE SET NULL ON UPDATE SET NULL;

-- Llaves Foraneas para la tabla(10) "TDocDep"

alter table "TDocDep"
add constraint "fk_cedDoc_TDocentes"
foreign key("cedDoc") 
references "TDocentes"("cedDoc")
ON DELETE CASCADE ON UPDATE CASCADE;

alter table "TDocDep"
add constraint "fk_codDep_TDependencias"
foreign key("codDep") 
references "TDependencias"("codDep")
ON DELETE CASCADE ON UPDATE CASCADE;

-- Llaves Foraneas para la tabla(05) "TRolPer"

alter table "TRolPer"
add constraint "fk_codRol_TRoles"
foreign key("codRol") 
references "TRoles"("codRol");



alter table "TRolPer"
add constraint "fk_codPer_TPermisos"
foreign key("codPer") 
references "TPermisos"("codPer");



-- Llaves Foraneas para la tabla(19) "TTiempo"

alter table "TTiempo"
add constraint "fk_codDia_TDias"
foreign key("codDia") 
references "TDias"("codDia");

alter table "TTiempo"
add constraint "fk_codHor_THoras"
foreign key("codHor") 
references "THoras"("codHor");

-- Llaves Foraneas para la tabla(20) "THorarios"

alter table "THorarios"
add constraint "fk_cedDoc_TDocentes"
foreign key("cedDoc") 
references "TDocentes"("cedDoc")
ON DELETE SET NULL ON UPDATE SET NULL;

alter table "THorarios"
add constraint "fk_codSec_TSecciones"
foreign key("codSec") 
references "TSecciones"("codSec")
ON DELETE CASCADE ON UPDATE CASCADE;

alter table "THorarios"
add constraint "fk_codUniCur_TUnidCurr"
foreign key("codUniCur") 
references "TUnidCurr"("codUniCur")
ON DELETE CASCADE ON UPDATE CASCADE;

alter table "THorarios"
add constraint "fk_codActAdm_TActiAdmi"
foreign key("codActAdm") 
references "TActiAdmi"("codActAdm")
ON DELETE CASCADE ON UPDATE CASCADE;

alter table "THorarios"
add constraint "fk_codTie_TTiempo"
foreign key("codTie") 
references "TTiempo"("codTie")
ON DELETE CASCADE ON UPDATE CASCADE;

alter table "THorarios"
add constraint "fk_codAmb_TAmbientes"
foreign key("codAmb") 
references "TAmbientes"("codAmb")
ON DELETE SET NULL ON UPDATE SET NULL;

-- Llaves Foraneas para la tabla(13) "TUnidCurr"

alter table "TUnidCurr"
add constraint "fk_codPnf_TPnf"
foreign key("codPnf") 
references "TPnf"("codPnf")
ON DELETE SET NULL ON UPDATE SET NULL;

alter table "TUnidCurr"
add constraint "fk_codEje_TEjes"
foreign key("codEje") 
references "TEjes"("codEje")
ON DELETE SET NULL ON UPDATE SET NULL;

-- Llaves Foraneas para la tabla(21) "TBitacora"

alter table "TBitacora"
add constraint "fk_cedDoc_TDocente"
foreign key("cedDoc") 
references "TDocentes"("cedDoc")
ON DELETE CASCADE ON UPDATE CASCADE;

------------------------------------------------------------------------------------------------------------

-- Este STORED-PROCEDURED , retorna la cantidad de horas de clase de un docente

-- Datos de entrada:

-- cedula_docente text 

CREATE OR REPLACE FUNCTION get_horas_de_clase( cedula_docente text ) RETURNS integer AS 
$BODY$
DECLARE
	cantidad integer;
BEGIN

	SELECT 
	  count( h.* ) INTO cantidad
	FROM "THorarios" h 
	INNER JOIN "TDocentes" d ON d."cedDoc" = h."cedDoc"
	WHERE 
	  h.tipo = 1
	AND
	d."cedDoc" = cedula_docente
	GROUP BY d."cedDoc"; 	

	RETURN coalesce( cantidad  , 0 );
END;
$BODY$
LANGUAGE plpgsql VOLATILE;

--SELECT get_horas_de_clase( 'V-25627918' );

------------------------------------------------------------------------------------------------------------
-- Este STORED-PROCEDURED , retorna la cantidad de horas por tipo de actividad administrativa

-- Datos de entrada:

-- cedula_docente text , tipo_de_actividad text

-- TIPOS DE ACTIVIDADES:

-- 1). Creación Intelectual (CI)
-- 2). Integración Comunidad (IC)
-- 3). Asesoría Académica (AA)
-- 4). Gestión Académica (GA)
-- 5). Otras Act. Académicas (OAA)

CREATE OR REPLACE FUNCTION get_horas_administrativas_por_tipo( cedula_docente text , tipo_actividad text ) RETURNS integer AS 
$BODY$
DECLARE
	cantidad integer;
BEGIN
	SELECT 
	   count( h."codHor" ) INTO cantidad
	FROM "THorarios" h 
	INNER JOIN "TDocentes" d ON d."cedDoc" = h."cedDoc"
	INNER JOIN "TActiAdmi" aa ON aa."codActAdm" = h."codActAdm"
	WHERE 
	  h.tipo = 2
	AND
	  d."cedDoc" = cedula_docente
	AND
	  aa."tipActAdm" = tipo_actividad
	GROUP BY d."cedDoc"; 	

	
	
	RETURN coalesce( cantidad  , 0 );
END;
$BODY$
LANGUAGE plpgsql VOLATILE;

--SELECT * FROM get_horas_administrativas_por_tipo( 'V-25627918' , 'OAA' );

------------------------------------------------------------------------------------------------------------

-- Este STORED-PROCEDURED , retorna la carga horaria academico-administrativa de un docente

-- Datos de entrada:

-- cedula_docente text

-- EL REPORTE

-- 1). Horas de CLase
-- 2). Horas Creación Intelectual (CI)
-- 3). Horas Integración Comunidad (IC)
-- 4). Horas Asesoría Académica (AA)
-- 5). Horas Gestión Académica (GA)
-- 6). Horas Otras Act. Académicas (OAA)
-- 7). Total de Horas Administrativas 
-- 8). Total de Horas ()

CREATE OR REPLACE FUNCTION get_carga_horaria_docente(cedula_docente text)
  RETURNS TABLE(
	horas_de_clase integer, 
	horas_ci integer,
	horas_ic integer,
	horas_ase_aca integer,
	horas_ga integer,
	horas_oaa integer,
	total_hadmin integer,
	total_horas integer
	) AS $$
BEGIN
	horas_de_clase := get_horas_de_clase( cedula_docente );
	horas_ci := get_horas_administrativas_por_tipo( cedula_docente , 'CI' );
	horas_ic := get_horas_administrativas_por_tipo( cedula_docente , 'IC' );
	horas_ase_aca := get_horas_administrativas_por_tipo( cedula_docente , 'AA' );
	horas_ga := get_horas_administrativas_por_tipo( cedula_docente , 'GA' );
	horas_oaa := get_horas_administrativas_por_tipo( cedula_docente , 'OAA' );
	total_hadmin := horas_ci + horas_ic + horas_ase_aca + horas_ga + horas_oaa;
	
	total_horas := horas_de_clase + total_hadmin;
	RETURN NEXT;
END;
$$ LANGUAGE 'plpgsql' VOLATILE;

--select * from get_carga_horaria_docente('V-25627918');