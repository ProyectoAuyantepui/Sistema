-- CREACON DE ROLES PREESTABLECIDOS DEL SISTEMA

INSERT INTO "TRoles"
	("codRol", "nombre", "observaciones") 
VALUES 
	('R-001', 'superusuario', 'control total del sistema'),
	('R-002', 'administrador', 'acceso a la gestion de horarios'),
	('R-003', 'docente', 'acceso solo a su horario(consultar)');

-- CARGA DE MODULOS PREESTABLECIDOS DEL SISTEMA

INSERT INTO "TPermisos"("codPer","nombre") VALUES 
-- USUARIO
('P-01','iniciar sesion'),
('P-02','perfil de usuario'),
('P-71','ver mi horario'),
('P-03','recuperar contraseña'),
-- HORARIOS
('P-04','gestionar horarios'),
('P-05','crear horarios'),
('P-06','modificar horarios'),
('P-07','eliminar horarios'),
('P-08','consultar horarios'),
-- DOCENTES
('P-09','gestionar docentes'),
('P-10','crear docentes'),
('P-11','modificar docentes'),
('P-12','eliminar docentes'),
('P-13','consultar docentes'),
-- AMBIENTES
('P-14','gestionar ambientes'),
('P-15','crear ambientes'),
('P-16','modificar ambientes'),
('P-17','eliminar ambientes'),
('P-18','consultar ambientes'),
-- SECCIONES
('P-19','gestionar secciones'),
('P-20','crear secciones'),
('P-21','modificar secciones'),
('P-22','eliminar secciones'),
('P-23','consultar secciones'),
-- GESTION BASICA
('P-24','gestion basica'),
('P-25','gestionar categorias de docentes'),
('P-26','crear categorias de docentes'),
('P-27','modificar categorias de docentes'),
('P-28','eliminar categorias de docentes'),
('P-29','consultar categorias de docentes'),
('P-30','gestionar pnf'),
('P-31','crear pnf'),
('P-32','modificar pnf'),
('P-33','eliminar pnf'),
('P-34','consultar pnf'),
('P-35','gestionar ejes de formacion'),
('P-36','crear ejes de formacion'),
('P-37','modificar ejes de formacion'),
('P-38','eliminar ejes de formacion'),
('P-39','consultar ejes de formacion'),
('P-40','gestionar unidades curriculares'),
('P-41','crear unidades curriculares'),
('P-42','modificar unidades curriculares'),
('P-43','eliminar unidades curriculares'),
('P-44','consultar unidades curriculares'),
('P-45','gestionar actividades administrativas'),
('P-46','crear actividades administrativas'),
('P-47','modificar actividades administrativas'),
('P-48','eliminar actividades administrativas'),
('P-49','consultar actividades administrativas'),
('P-50','gestionar comisiones'),
('P-51','crear comisiones'),
('P-52','modificar comisiones'),
('P-53','eliminar comisiones'),
('P-54','consultar comisiones'),
('P-55','gestionar dependencias'),
('P-56','crear dependencias'),
('P-57','modificar dependencias'),
('P-58','eliminar dependencias'),
('P-59','consultar dependencias'),
('P-60','generacion de reportes'),
-- SEGURIDAD
('P-61','seguridad'),
('P-62','gestionar roles'),
('P-63','crear roles'),
('P-64','modificar roles'),
('P-65','eliminar roles'),
('P-66','consultar roles'),
('P-67','consulta de bitacora'),
-- MANTENIMIENTO
('P-68','mantenimiento'),
('P-69','respaldo de base de datos'),
('P-70','restauracion de base de datos'),
('P-72','gestionar dedicaciones de docentes');


-- CARGA DE PERMISOLOGIA POR ROLES DEL SISTEMA

INSERT INTO "TRolPer"( "codRol" , "codPer" ) VALUES 

-- PERMISOLOGIA PARA EL ROL "SUPERUSUARIO"

( 'R-001' , 'P-01' ),
( 'R-001' , 'P-02' ),
( 'R-001' , 'P-03' ),
( 'R-001' , 'P-04' ),
( 'R-001' , 'P-05' ),
( 'R-001' , 'P-06' ),
( 'R-001' , 'P-07' ),
( 'R-001' , 'P-08' ),
( 'R-001' , 'P-09' ),
( 'R-001' , 'P-10' ),
( 'R-001' , 'P-11' ),
( 'R-001' , 'P-12' ),
( 'R-001' , 'P-13' ),
( 'R-001' , 'P-14' ),
( 'R-001' , 'P-15' ),
( 'R-001' , 'P-16' ),
( 'R-001' , 'P-17' ),
( 'R-001' , 'P-18' ),
( 'R-001' , 'P-19' ),
( 'R-001' , 'P-20' ),
( 'R-001' , 'P-21' ),
( 'R-001' , 'P-22' ),
( 'R-001' , 'P-23' ),
( 'R-001' , 'P-24' ),
( 'R-001' , 'P-25' ),
( 'R-001' , 'P-26' ),
( 'R-001' , 'P-27' ),
( 'R-001' , 'P-28' ),
( 'R-001' , 'P-29' ),
( 'R-001' , 'P-30' ),
( 'R-001' , 'P-31' ),
( 'R-001' , 'P-32' ),
( 'R-001' , 'P-33' ),
( 'R-001' , 'P-34' ),
( 'R-001' , 'P-35' ),
( 'R-001' , 'P-36' ),
( 'R-001' , 'P-37' ),
( 'R-001' , 'P-38' ),
( 'R-001' , 'P-39' ),
( 'R-001' , 'P-40' ),
( 'R-001' , 'P-41' ),
( 'R-001' , 'P-42' ),
( 'R-001' , 'P-43' ),
( 'R-001' , 'P-44' ),
( 'R-001' , 'P-45' ),
( 'R-001' , 'P-46' ),
( 'R-001' , 'P-47' ),
( 'R-001' , 'P-48' ),
( 'R-001' , 'P-49' ),
( 'R-001' , 'P-50' ),
( 'R-001' , 'P-51' ),
( 'R-001' , 'P-52' ),
( 'R-001' , 'P-53' ),
( 'R-001' , 'P-54' ),
( 'R-001' , 'P-55' ),
( 'R-001' , 'P-56' ),
( 'R-001' , 'P-57' ),
( 'R-001' , 'P-58' ),
( 'R-001' , 'P-59' ),
( 'R-001' , 'P-60' ),
( 'R-001' , 'P-61' ),
( 'R-001' , 'P-62' ),
( 'R-001' , 'P-63' ),
( 'R-001' , 'P-64' ),
( 'R-001' , 'P-65' ),
( 'R-001' , 'P-66' ),
( 'R-001' , 'P-67' ),
( 'R-001' , 'P-68' ),
( 'R-001' , 'P-69' ),
( 'R-001' , 'P-70' ),
( 'R-001' , 'P-71' ),
( 'R-001' , 'P-72' ),

-- PERMISOLOGIA PARA EL ROL "ADMINISTRADOR"

( 'R-002' , 'P-01' ),
( 'R-002' , 'P-02' ),
( 'R-002' , 'P-03' ),
( 'R-002' , 'P-04' ),
( 'R-002' , 'P-05' ),
( 'R-002' , 'P-06' ),
( 'R-002' , 'P-07' ),
( 'R-002' , 'P-08' ),
( 'R-002' , 'P-09' ),
( 'R-002' , 'P-10' ),
( 'R-002' , 'P-11' ),
( 'R-002' , 'P-12' ),
( 'R-002' , 'P-13' ),
( 'R-002' , 'P-14' ),
( 'R-002' , 'P-15' ),
( 'R-002' , 'P-16' ),
( 'R-002' , 'P-17' ),
( 'R-002' , 'P-18' ),
( 'R-002' , 'P-19' ),
( 'R-002' , 'P-20' ),
( 'R-002' , 'P-21' ),
( 'R-002' , 'P-22' ),
( 'R-002' , 'P-23' ),
( 'R-002' , 'P-24' ),
( 'R-002' , 'P-25' ),
( 'R-002' , 'P-26' ),
( 'R-002' , 'P-27' ),
( 'R-002' , 'P-28' ),
( 'R-002' , 'P-29' ),
( 'R-002' , 'P-30' ),
( 'R-002' , 'P-31' ),
( 'R-002' , 'P-32' ),
( 'R-002' , 'P-33' ),
( 'R-002' , 'P-34' ),
( 'R-002' , 'P-35' ),
( 'R-002' , 'P-36' ),
( 'R-002' , 'P-37' ),
( 'R-002' , 'P-38' ),
( 'R-002' , 'P-39' ),
( 'R-002' , 'P-40' ),
( 'R-002' , 'P-41' ),
( 'R-002' , 'P-42' ),
( 'R-002' , 'P-43' ),
( 'R-002' , 'P-44' ),
( 'R-002' , 'P-45' ),
( 'R-002' , 'P-46' ),
( 'R-002' , 'P-47' ),
( 'R-002' , 'P-48' ),
( 'R-002' , 'P-49' ),
( 'R-002' , 'P-50' ),
( 'R-002' , 'P-51' ),
( 'R-002' , 'P-52' ),
( 'R-002' , 'P-53' ),
( 'R-002' , 'P-54' ),
( 'R-002' , 'P-55' ),
( 'R-002' , 'P-56' ),
( 'R-002' , 'P-57' ),
( 'R-002' , 'P-58' ),
( 'R-002' , 'P-59' ),
( 'R-002' , 'P-60' ),
( 'R-002' , 'P-71' ),
( 'R-002' , 'P-72' ),

-- PERMISOLOGIA PARA EL ROL "DOCENTE"

( 'R-003' , 'P-01' ),
( 'R-003' , 'P-02' ),
( 'R-003' , 'P-71' ),
( 'R-003' , 'P-03' );


-- CARGA DE DIAS PREESTABLECIDOS DEL SISTEMA

INSERT INTO "TDias"("codDia", nombre) VALUES 
('D-001','lunes'),
('D-002','martes'),
('D-003','miercoles'),
('D-004','jueves'),
('D-005','viernes'),
('D-006','sabado'),
('D-007','domingo');

-- CARGA DE HORAS PREESTABLECIDAS DEL SISTEMA PARA LOS HORARIOS

INSERT INTO "THoras"( "codHor", "horEnt", "horSal") VALUES 
--Horas del Turno de la mañana
('H-01','07:20', '08:05'),
('H-02','08:05', '08:50'),
('H-03','08:55', '09:40'),
('H-04','09:40', '10:25'),
('H-05','10:30', '11:15'),
('H-06','11:15', '12:00'),
--Horas del turno de la tarde
('H-07','13:20', '14:05'),
('H-08','14:05', '14:50'),
('H-09','14:55', '15:40'),
('H-10','15:40', '16:25'),
('H-11','16:30', '17:15'),
('H-12','17:15', '18:00'),
--Horas del turno de la noche
('H-13','18:00', '18:45'),
('H-14','18:45', '19:30'),
('H-15','19:35', '20:20'),
('H-16','20:20', '21:05'),
('H-17','21:10', '21:55'),
('H-18','21:55', '22:40');

-- RELACIONANDO DIAS Y HORAS

-- DIA LUNES
INSERT INTO "TTiempo"( "codTie", "codDia", "codHor") VALUES 
('T-01','D-001','H-01'),
('T-02','D-001','H-02'),
('T-03','D-001','H-03'),
('T-04','D-001','H-04'),
('T-05','D-001','H-05'),
('T-06','D-001','H-06'),
('T-07','D-001','H-07'),
('T-08','D-001','H-08'),
('T-09','D-001','H-09'),
('T-10','D-001','H-10'),
('T-11','D-001','H-11'),
('T-12','D-001','H-12'),
('T-13','D-001','H-13'),
('T-14','D-001','H-14'),
('T-15','D-001','H-15'),
('T-16','D-001','H-16'),
('T-17','D-001','H-17'),
('T-18','D-001','H-18'),
-- DIA MARTES
('T-19','D-002','H-01'),
('T-20','D-002','H-02'),
('T-21','D-002','H-03'),
('T-22','D-002','H-04'),
('T-23','D-002','H-05'),
('T-24','D-002','H-06'),
('T-25','D-002','H-07'),
('T-26','D-002','H-08'),
('T-27','D-002','H-09'),
('T-28','D-002','H-10'),
('T-29','D-002','H-11'),
('T-30','D-002','H-12'),
('T-31','D-002','H-13'),
('T-32','D-002','H-14'),
('T-33','D-002','H-15'),
('T-34','D-002','H-16'),
('T-35','D-002','H-17'),
('T-36','D-002','H-18'),
--DIA MIERCOLES
('T-37','D-003','H-01'),
('T-38','D-003','H-02'),
('T-39','D-003','H-03'),
('T-40','D-003','H-04'),
('T-41','D-003','H-05'),
('T-42','D-003','H-06'),
('T-43','D-003','H-07'),
('T-44','D-003','H-08'),
('T-45','D-003','H-09'),
('T-46','D-003','H-10'),
('T-47','D-003','H-11'),
('T-48','D-003','H-12'),
('T-49','D-003','H-13'),
('T-50','D-003','H-14'),
('T-51','D-003','H-15'),
('T-52','D-003','H-16'),
('T-53','D-003','H-17'),
('T-54','D-003','H-18'),
--DIA JUEVES
('T-55','D-004','H-01'),
('T-56','D-004','H-02'),
('T-57','D-004','H-03'),
('T-58','D-004','H-04'),
('T-59','D-004','H-05'),
('T-60','D-004','H-06'),
('T-61','D-004','H-07'),
('T-62','D-004','H-08'),
('T-63','D-004','H-09'),
('T-64','D-004','H-10'),
('T-65','D-004','H-11'),
('T-66','D-004','H-12'),
('T-67','D-004','H-13'),
('T-68','D-004','H-14'),
('T-69','D-004','H-15'),
('T-70','D-004','H-16'),
('T-71','D-004','H-17'),
('T-72','D-004','H-18'),
--DIA VIERNES
('T-73','D-005','H-01'),
('T-74','D-005','H-02'),
('T-75','D-005','H-03'),
('T-76','D-005','H-04'),
('T-77','D-005','H-05'),
('T-78','D-005','H-06'),
('T-79','D-005','H-07'),
('T-80','D-005','H-08'),
('T-81','D-005','H-09'),
('T-82','D-005','H-10'),
('T-83','D-005','H-11'),
('T-84','D-005','H-12'),
('T-85','D-005','H-13'),
('T-86','D-005','H-14'),
('T-87','D-005','H-15'),
('T-88','D-005','H-16'),
('T-89','D-005','H-17'),
('T-90','D-005','H-18'),
--DIA SABADO
('T-91','D-006','H-01'),
('T-92','D-006','H-02'),
('T-93','D-006','H-03'),
('T-94','D-006','H-04'),
('T-95','D-006','H-05'),
('T-96','D-006','H-06'),
('T-97','D-006','H-07'),
('T-98','D-006','H-08'),
('T-99','D-006','H-09'),
('T-100','D-006','H-10'),
('T-101','D-006','H-11'),
('T-102','D-006','H-12'),
('T-103','D-006','H-13'),
('T-104','D-006','H-14'),
('T-105','D-006','H-15'),
('T-106','D-006','H-16'),
('T-107','D-006','H-17'),
('T-108','D-006','H-18'),
--DIA DOMINGO
('T-109','D-007','H-01'),
('T-110','D-007','H-02'),
('T-111','D-007','H-03'),
('T-112','D-007','H-04'),
('T-113','D-007','H-05'),
('T-114','D-007','H-06'),
('T-115','D-007','H-07'),
('T-116','D-007','H-08'),
('T-117','D-007','H-09'),
('T-118','D-007','H-10'),
('T-119','D-007','H-11'),
('T-120','D-007','H-12'),
('T-121','D-007','H-13'),
('T-122','D-007','H-14'),
('T-123','D-007','H-15'),
('T-124','D-007','H-16'),
('T-125','D-007','H-17'),
('T-126','D-007','H-18');

-- CREACION DE UNA ACTIVIDAD ADMINISTRATIVA

INSERT INTO "TActiAdmi"
	( "codActAdm", "titulo", "observaciones", "dependencia", "tipActAdm")
VALUES 
	( default ,'taller de pedagogia', 'actividad de creacion intelecual', 'sala de postgrado', 'CI'),
	( default ,'proyectos sociotecnologicos en iribarren', 'actividad de integracion comunidad', 'sala territorial', 'IC'),
	( default ,'reunion de docentes', 'asesorias a estudiantes', 'departamento del pnfi', 'AA'),
	( default ,'reunion docentes en vice-rectorado', 'actividad de gestion academica', 'vice-rectorado academico', 'GA'),
	( default ,'taller #2 en sala territorial', 'otras actividades', 'sala territorial', 'OAA'),
	( default ,'reunion de docentes eje socio-critico', 'otras actividades', 'rectorado', 'OAA');

-- CREACION DE UNA CATEGORIA

INSERT INTO "TCatDoc"
	( "codCatDoc" , "nombre" , "descripcion" )
VALUES 
   	( default , 'Sin Categoria', 'Sin categoria de docente' ),
   	( default , 'Instructor', 'Categoria de instructor' ),
   	( default , 'Asociado', 'Categoria de asociado' ),
   	( default , 'Agregado', 'Categoria de agregado' ),
   	( default , 'Titular', 'Categoria de titular' );


INSERT INTO "TPnf"

	( "codPnf", descripcion) 

VALUES 

	('PNFI', 'PNF en informática'),
	('PNFA', 'PNF en administración'),
	('PNFCP', 'PNF en contaduria pública'),
	('PNFT', 'PNF en turismo'),
	('PNFCI', 'PNF en ciencias de la información'),
	('PNFED', 'PNF en entrenamiento deportivo'),
	('PNFHSL', 'PNF en higiene y seguridad laboral'),
	('PNFSCA', 'PNF en sistemas de calidad y ambiente');

INSERT INTO "TEjes"

	( "codEje", nombre, descripcion)

VALUES 

	(default, 'ESTETICO-LUDICO', 'Eje de formación Estetico-ludico'),
	(default, 'EPISTEMOLOGICO', 'Eje de formación Epistemologico'),
	(default, 'ETICO-POLITICO', 'Eje de formación Etico-politico'),
	(default, 'TRABAJO PRODUCTIVO', 'Eje de formación Trabajo Productivo'),
	(default, 'SOCIO-AMBIENTAL', 'Eje de formación Socio-ambiental');

-- CREACION DE DOCENTES 

INSERT INTO "TDocentes"

	("cedDoc", "codCatDoc", "codRol", "nombre", "apellido", "fecNac","sexo","telefono","correo","direccion","fecIng","fecCon","condicion", "usuario","clave","estado","avatar","observaciones") 

VALUES 

	('V-25627918',1, 'R-001', 'admin','admin','now()',2,'04260000000','admin@admin.com','calle1','now()','now()',2, 'admin','admin',TRUE,'public/img/avatar/user01.png','ninguna'),
	('V-01235433',1,'R-003', 'maria','Linares','now()',1,'04260000000','admin@admin1.com','calle1','now()','now()',1, 'admin','admin1',TRUE,'public/img/avatar/user02.png','ninguna'),
	('V-07776665',1,'R-003', 'nelson','Campos','now()',2,'04260000000','admin@admin2.com','calle1','now()','now()',3, 'admin','admin2',TRUE,'public/img/avatar/user03.png','ninguna');


INSERT INTO "TUnidCurr"

	("codUniCur", "codPnf", "codEje", nombre, "uniCre", trayecto, fase, htas, htis, observaciones)

VALUES 

	('PIMT236', 'PNFI', 2, 'MATEMÁTICA II',  				3, 	2, 3, 2, 4, 'Unidad curricular de PNF en informática'),
	('PIPP2512','PNFI', 2, 'PROGRAMACIÓN II',  				12,	2, 2, 2, 4, 'Unidad curricular de PNF en informática'),
	('PIEL233', 'PNFI', 2, 'ELECTIVA II',  					3, 	2, 2, 2, 4, 'Unidad curricular de PNF en informática'),
	('PIAA223', 'PNFI', 2, 'ACTIVIDADES ACREDITABLES II',  	3, 	2, 3, 2, 4, 'Unidad curricular de PNF en informática'),
	('PIFC223', 'PNFI', 2, 'FORMACIÓN CRITICA II',  		3, 	2, 3, 2, 4, 'Unidad curricular de PNF en informática'),
	('PIIS233', 'PNFI', 2, 'INGENIERIA DE SOFTWARE',  		3, 	2, 2, 2, 4, 'Unidad curricular de PNF en informática'),
	('PIPT269', 'PNFI', 2, 'PROYECTO II',  					9, 	2, 3, 2, 4, 'Unidad curricular de PNF en informática'),
	('PIRC233', 'PNFI', 2, 'REDES DE COMPUTADORAS',  		6, 	2, 3, 2, 4, 'Unidad curricular de PNF en informática');


INSERT INTO "TDedicaciones"
	( "codDed", nombre, "minHor", "maxHor")
VALUES 
	(default,'EXCLUSIVA',1,16),
	(default,'TIEMPO COMPLETO',8,16),
	(default,'MEDIO TIEMPO',1,8),
	(default,'TIEMPO CONVENCIONAL',1,16);

