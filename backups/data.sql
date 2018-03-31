-- CREACON DE ROLES PREESTABLECIDOS DEL SISTEMA

INSERT INTO "TRoles"("codRol", "nombre", "observaciones") VALUES 
('R-001', 'superusuario', 'control total del sistema'),
('R-002', 'administrador', 'acceso a la gestion de horarios'),
('R-003', 'docente', 'acceso solo a su horario(consultar)');

-- CARGA DE MODULOS PREESTABLECIDOS DEL SISTEMA

INSERT INTO "TModulos"("codMod","nombre") VALUES 

('M-01','iniciar sesion'),

('M-02','consulta de bitacora'),

('M-03','generacion de reportes'),

('M-04','perfil de usuario'),

('M-05','gestion basica'),

('M-06','seguridad'),

('M-07','recuperar contraseña'),

-- horarios
('M-08','crear horarios'),
('M-09','modificar horarios'),
('M-10','eliminar horarios'),
('M-11','consultar horarios'),
-- docentes
('M-12','crear docentes'),
('M-13','modificar docentes'),
('M-14','eliminar docentes'),
('M-15','consultar docentes'),
-- categorias de docentes
('M-16','crear categorias de docentes'),
('M-17','modificar categorias de docentes'),
('M-18','eliminar categorias de docentes'),
('M-19','consultar categorias de docentes'),
-- ambientes
('M-20','crear ambientes'),
('M-21','modificar ambientes'),
('M-22','eliminar ambientes'),
('M-23','consultar ambientes'),
-- secciones
('M-24','crear secciones'),
('M-25','modificar secciones'),
('M-26','eliminar secciones'),
('M-27','consultar secciones'),
-- pnf
('M-28','crear pnf'),
('M-29','modificar pnf'),
('M-30','eliminar pnf'),
('M-31','consultar pnf'),
-- ejes de formaccion
('M-32','crear ejes de formacion'),
('M-33','modificar ejes de formacion'),
('M-34','eliminar ejes de formacion'),
('M-35','consultar ejes de formacion'),
-- unidades curriculares
('M-36','crear unidades curriculares'),
('M-37','modificar unidades curriculares'),
('M-38','eliminar unidades curriculares'),
('M-39','consultar unidades curriculares'),
--actividades administrativas
('M-40','crear actividades administrativas'),
('M-41','modificar actividades administrativas'),
('M-42','eliminar actividades administrativas'),
('M-43','consultar actividades administrativas'),
-- comisiones
('M-44','crear comisiones'),
('M-45','modificar comisiones'),
('M-46','eliminar comisiones'),
('M-47','consultar comisiones'),
-- dependencias
('M-48','crear dependencias'),
('M-49','modificar dependencias'),
('M-50','eliminar crear dependencias'),
('M-51','consultar dependencias'),
-- roles
('M-52','crear roles'),
('M-53','modificar roles'),
('M-54','eliminar roles'),
('M-55','consultar roles'),
-- permisologia
('M-56','crear permisologia'),
('M-57','modificar permisologia'),
('M-58','eliminar permisologia'),
('M-59','consultar permisologia'),

('M-60','respaldo de base de datos'),
('M-61','restauracion de base de datos'),
('M-62','mantenimiento');

-- CARGA DE PERMISOLOGIA POR ROLES DEL SISTEMA

INSERT INTO "TRolMod"( "codRol" , "codMod" ) VALUES 

-- PERMISOLOGIA PARA EL ROL "SUPERUSUARIO"

-- MODULO : INICIAR SESION
( 'R-001' , 'M-01' ), -- PERMISO : PERMISO DE ACCESO 
-- MODULO : BITACORA
( 'R-001' , 'M-02' ), -- PERMISO : CONSULTAR
-- MODULO : REPORTES
( 'R-001' , 'M-03' ), -- PERMISO : PERMISO DE ACCESO
-- MODULO : PERFIL
( 'R-001' , 'M-04' ), -- PERMISO : PERMISO DE ACCESO 
-- MODULO : GESTION BASICA
( 'R-001' , 'M-05' ), -- PERMISO : PERMISO DE ACCESO 
-- MODULO : SEGURIDAD
( 'R-001' , 'M-06' ), -- PERMISO : PERMISO DE ACCESO 
-- MODULO : REESTABLECER CLAVE
( 'R-001' , 'M-07' ), -- PERMISO : PERMISO DE ACCESO
-- MODULO : HORARIOS
( 'R-001' , 'M-08' ), -- PERMISO : CREAR   
( 'R-001' , 'M-09' ), -- PERMISO : MODIFICAR
( 'R-001' , 'M-10' ), -- PERMISO : ELIMINAR  
( 'R-001' , 'M-11' ), -- PERMISO : CONSULTAR 
-- MODULO : DOCENTES
( 'R-001' , 'M-12' ), -- PERMISO : CREAR   
( 'R-001' , 'M-13' ), -- PERMISO : MODIFICAR   
( 'R-001' , 'M-14' ), -- PERMISO : ELIMINAR   
( 'R-001' , 'M-15' ), -- PERMISO : CONSULTAR   
-- MODULO : CATEGORIAS DE DOCENTES
( 'R-001' , 'M-16' ), -- PERMISO : CREAR 
( 'R-001' , 'M-17' ), -- PERMISO : MODIFICAR   
( 'R-001' , 'M-18' ), -- PERMISO : ELIMINAR   
( 'R-001' , 'M-19' ), -- PERMISO : CONSULTAR   
-- MODULO : AMBIENTES
( 'R-001' , 'M-20' ), -- PERMISO : CREAR 
( 'R-001' , 'M-21' ), -- PERMISO : MODIFICAR 
( 'R-001' , 'M-22' ), -- PERMISO : ELIMINAR 
( 'R-001' , 'M-23' ), -- PERMISO : CONSULTAR
-- MODULO : SECCIONES
( 'R-001' , 'M-24' ), -- PERMISO : CREAR 
( 'R-001' , 'M-25' ), -- PERMISO : MODIFICAR 
( 'R-001' , 'M-26' ), -- PERMISO : ELIMINAR 
( 'R-001' , 'M-27' ), -- PERMISO : CONSULTAR
-- MODULO : PNF
( 'R-001' , 'M-28' ), -- PERMISO : CREAR 
( 'R-001' , 'M-29' ), -- PERMISO : MODIFICAR 
( 'R-001' , 'M-30' ), -- PERMISO : ELIMINAR 
( 'R-001' , 'M-31' ), -- PERMISO : CONSULTAR
-- MODULO : EJES
( 'R-001' , 'M-32' ), -- PERMISO : CREAR 
( 'R-001' , 'M-33' ), -- PERMISO : MODIFICAR 
( 'R-001' , 'M-34' ), -- PERMISO : ELIMINAR 
( 'R-001' , 'M-35' ), -- PERMISO : CONSULTAR
-- MODULO : UNIDADES CURRICULARES
( 'R-001' , 'M-36' ), -- PERMISO : CREAR 
( 'R-001' , 'M-37' ), -- PERMISO : MODIFICAR 
( 'R-001' , 'M-38' ), -- PERMISO : ELIMINAR 
( 'R-001' , 'M-39' ), -- PERMISO : CONSULTAR
-- MODULO : ACTIVIDADES ADMINISTRATIVAS
( 'R-001' , 'M-40' ), -- PERMISO : CREAR 
( 'R-001' , 'M-41' ), -- PERMISO : MODIFICAR 
( 'R-001' , 'M-42' ), -- PERMISO : ELIMINAR 
( 'R-001' , 'M-43' ), -- PERMISO : CONSULTAR
-- MODULO : COMISIONES
( 'R-001' , 'M-44' ), -- PERMISO : CREAR 
( 'R-001' , 'M-45' ), -- PERMISO : MODIFICAR 
( 'R-001' , 'M-46' ), -- PERMISO : ELIMINAR 
( 'R-001' , 'M-47' ), -- PERMISO : CONSULTAR
--  MODULO : DEPENDENCIAS
( 'R-001' , 'M-48' ), -- PERMISO : CREAR 
( 'R-001' , 'M-49' ), -- PERMISO : MODIFICAR 
( 'R-001' , 'M-50' ), -- PERMISO : ELIMINAR 
( 'R-001' , 'M-51' ), -- PERMISO : CONSULTAR
-- MODULO : ROLES
( 'R-001' , 'M-52' ), -- PERMISO : CREAR 
( 'R-001' , 'M-53' ), -- PERMISO : MODIFICAR 
( 'R-001' , 'M-54' ), -- PERMISO : ELIMINAR 
( 'R-001' , 'M-55' ), -- PERMISO : CONSULTAR5
-- MODULO : PERMISOLOGIA
( 'R-001' , 'M-56' ), -- PERMISO : CREAR 
( 'R-001' , 'M-57' ), -- PERMISO : MODIFICAR 
( 'R-001' , 'M-58' ), -- PERMISO : ELIMINAR 
( 'R-001' , 'M-59' ), -- PERMISO : CONSULTAR
-- MODULO : RESPALDO DE BASE DE DATOS
( 'R-001' , 'M-60' ), -- PERMISO : PERMISO DE ACCESO
-- MODULO : RESTAURACION DE BASE DE DATOS
( 'R-001' , 'M-61' ), -- PERMISO : PERMISO DE ACCESO
-- MODULO : MANTENIMIENTO
( 'R-001' , 'M-62' ), -- PERMISO : PERMISO DE ACCESO

-- PERMISOLOGIA PARA EL ROL "ADMINISTRADOR"

-- MODULO : INICIAR SESION
( 'R-002' , 'M-01' ), -- PERMISO : PERMISO DE ACCESO 
-- MODULO : REPORTES
( 'R-002' , 'M-03' ), -- PERMISO : PERMISO DE ACCESO
-- MODULO : PERFIL
( 'R-002' , 'M-04' ), -- PERMISO : PERMISO DE ACCESO 
-- MODULO : GESTION BASICA
( 'R-002' , 'M-05' ), -- PERMISO : PERMISO DE ACCESO 
-- MODULO : REESTABLECER CLAVE
( 'R-002' , 'M-07' ), -- PERMISO : PERMISO DE ACCESO
-- MODULO : HORARIOS
( 'R-002' , 'M-08' ), -- PERMISO : CREAR   
( 'R-002' , 'M-09' ), -- PERMISO : MODIFICAR
( 'R-002' , 'M-10' ), -- PERMISO : ELIMINAR  
( 'R-002' , 'M-11' ), -- PERMISO : CONSULTAR 
-- MODULO : DOCENTES
( 'R-002' , 'M-12' ), -- PERMISO : CREAR   
( 'R-002' , 'M-13' ), -- PERMISO : MODIFICAR   
( 'R-002' , 'M-14' ), -- PERMISO : ELIMINAR   
( 'R-002' , 'M-15' ), -- PERMISO : CONSULTAR   
-- MODULO : CATEGORIAS DE DOCENTES
( 'R-002' , 'M-16' ), -- PERMISO : CREAR 
( 'R-002' , 'M-17' ), -- PERMISO : MODIFICAR   
( 'R-002' , 'M-18' ), -- PERMISO : ELIMINAR   
( 'R-002' , 'M-19' ), -- PERMISO : CONSULTAR   
-- MODULO : AMBIENTES
( 'R-002' , 'M-20' ), -- PERMISO : CREAR 
( 'R-002' , 'M-21' ), -- PERMISO : MODIFICAR 
( 'R-002' , 'M-22' ), -- PERMISO : ELIMINAR 
( 'R-002' , 'M-23' ), -- PERMISO : CONSULTAR
-- MODULO : SECCIONES
( 'R-002' , 'M-24' ), -- PERMISO : CREAR 
( 'R-002' , 'M-25' ), -- PERMISO : MODIFICAR 
( 'R-002' , 'M-26' ), -- PERMISO : ELIMINAR 
( 'R-002' , 'M-27' ), -- PERMISO : CONSULTAR
-- MODULO : PNF
( 'R-002' , 'M-28' ), -- PERMISO : CREAR 
( 'R-002' , 'M-29' ), -- PERMISO : MODIFICAR 
( 'R-002' , 'M-30' ), -- PERMISO : ELIMINAR 
( 'R-002' , 'M-31' ), -- PERMISO : CONSULTAR
-- MODULO : EJES
( 'R-002' , 'M-32' ), -- PERMISO : CREAR 
( 'R-002' , 'M-33' ), -- PERMISO : MODIFICAR 
( 'R-002' , 'M-34' ), -- PERMISO : ELIMINAR 
( 'R-002' , 'M-35' ), -- PERMISO : CONSULTAR
-- MODULO : UNIDADES CURRICULARES
( 'R-002' , 'M-36' ), -- PERMISO : CREAR 
( 'R-002' , 'M-37' ), -- PERMISO : MODIFICAR 
( 'R-002' , 'M-38' ), -- PERMISO : ELIMINAR 
( 'R-002' , 'M-39' ), -- PERMISO : CONSULTAR
-- MODULO : ACTIVIDADES ADMINISTRATIVAS
( 'R-002' , 'M-40' ), -- PERMISO : CREAR 
( 'R-002' , 'M-41' ), -- PERMISO : MODIFICAR 
( 'R-002' , 'M-42' ), -- PERMISO : ELIMINAR 
( 'R-002' , 'M-43' ), -- PERMISO : CONSULTAR
-- MODULO : COMISIONES
( 'R-002' , 'M-44' ), -- PERMISO : CREAR 
( 'R-002' , 'M-45' ), -- PERMISO : MODIFICAR 
( 'R-002' , 'M-46' ), -- PERMISO : ELIMINAR 
( 'R-002' , 'M-47' ), -- PERMISO : CONSULTAR
--  MODULO : DEPENDENCIAS
( 'R-002' , 'M-48' ), -- PERMISO : CREAR 
( 'R-002' , 'M-49' ), -- PERMISO : MODIFICAR 
( 'R-002' , 'M-50' ), -- PERMISO : ELIMINAR 
( 'R-002' , 'M-51' ), -- PERMISO : CONSULTAR

-- PERMISOLOGIA PARA EL ROL "DOCENTE"

-- MODULO : INICIAR SESION
( 'R-003' , 'M-01' ), -- PERMISO : PERMISO DE ACCESO 
-- MODULO : PERFIL
( 'R-003' , 'M-04' ), -- PERMISO : PERMISO DE ACCESO 
-- MODULO : REESTABLECER CLAVE
( 'R-003' , 'M-07' ); -- PERMISO : PERMISO DE ACCESO

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
('T-89','D-005','H-16'),
('T-90','D-005','H-17'),
('T-91','D-005','H-18'),
--DIA SABADO
('T-92','D-006','H-01'),
('T-93','D-006','H-02'),
('T-94','D-006','H-03'),
('T-95','D-006','H-04'),
('T-96','D-006','H-05'),
('T-97','D-006','H-06'),
('T-98','D-006','H-07'),
('T-99','D-006','H-08'),
('T-100','D-006','H-09'),
('T-101','D-006','H-10'),
('T-102','D-006','H-11'),
('T-103','D-006','H-12'),
('T-104','D-006','H-13'),
('T-105','D-006','H-14'),
('T-106','D-006','H-15'),
('T-107','D-006','H-16'),
('T-108','D-006','H-17'),
('T-109','D-006','H-18'),
--DIA DOMINGO
('T-110','D-007','H-01'),
('T-111','D-007','H-02'),
('T-112','D-007','H-03'),
('T-113','D-007','H-04'),
('T-114','D-007','H-05'),
('T-115','D-007','H-06'),
('T-116','D-007','H-07'),
('T-117','D-007','H-08'),
('T-118','D-007','H-09'),
('T-119','D-007','H-10'),
('T-120','D-007','H-11'),
('T-121','D-007','H-12'),
('T-122','D-007','H-13'),
('T-123','D-007','H-14'),
('T-124','D-007','H-15'),
('T-125','D-007','H-16'),
('T-126','D-007','H-17'),
('T-127','D-007','H-18');

-- CREACION DE UNA ACTIVIDAD ADMINISTRATIVA

INSERT INTO "TActiAdmi"
( "codActAdm", "titulo", "observaciones", "dependencia", "tipActAdm")
    VALUES 
( default ,'visita al departamento', 'actividad que es de prueba', 'pnfi', 'CI'),
( default ,'actividad  #2', 'actividad admi', 'pnfa', 'IC'),
( default ,'acti #3', 'acti admi', 'pnfa', 'AA'),
( default ,'buscar #4', 'actividad que es de prueba', 'pnfa', 'GA'),
( default ,'acti de campo #5', 'actividad que es de prueba', 'pnfi', 'OAA'),
( default ,'reunion #6', 'actividad que es de prueba', 'pnfa', 'OAA'),
( default ,'accessoria #7', 'actividad que es de prueba', 'pnfi', 'AA'),
( default ,'viaje', 'actividad que es de prueba', 'pnfa', 'CI'),
( default ,'actividad de campo', 'actividad que es de prueba', 'pnfi', 'CI'),
( default ,'ir a la comunidad', 'actividad que es de prueba', 'pnfi', 'IC');

-- CREACION DE UNA CATEGORIA

INSERT INTO "TCatDoc"( "codCatDoc" , "nombre" , "descripcion" )
    VALUES ( 1, 'Sin Categoria', 'Sin categoria de docente' );


INSERT INTO "TPnf"

( "alias", descripcion) 

VALUES 

('PNFI', 'Pnf en informatica'),
('PNFA', 'Pnf en administracion');

INSERT INTO "TEjes"

( "codEje", nombre, descripcion)

VALUES 

(default, 'estetico ludico', 'eje que ayuda a la recreacion del estudiante'),
(default, 'epistemologico', 'eje de prueba');

-- CREACION DE DOCENTES 

INSERT INTO "TDocentes"

("cedDoc", "codRol", "codCatDoc", "nombre", "correo", "usuario","clave") 

VALUES 

('25627918', 'R-001',1, 'admin',  'admin@admin.com', 'admin','admin'),
('1235433', 'R-003',1, 'maria',  'admin@admin1.com', 'admin','admin1'),
('7776665', 'R-003',1, 'nelson',  'admin@admin2.com', 'admin','admin2'),
('0987654', 'R-003',1, 'rutmary',  'admin@admin3.com', 'admin','admin3'),
('6789543', 'R-003',1, 'iris',  'admin@admin4.com', 'admin','admin4'),
('86783425', 'R-003',1, 'hermes',  'admin@admin5.com', 'admin','admin5'),
('09856423', 'R-003',1, 'gloria',  'admin@admin6.com', 'admin','admin6');



INSERT INTO "TSecciones"

( "codSec", trayecto, matricula, estado, tipo, turno,  observaciones) 

VALUES 

( 'PNFI-in2221', 2, 23, TRUE, 1, 2, 'FSDFDSFS');





INSERT INTO "TUnidCurr"

("codUniCur", "codPnf", "codEje", nombre, "uniCre", trayecto, fase, htas, htis, observaciones)

VALUES 


('PIMT236', 'PNFI', 1, 'matematica 2',  				3, 	2, 3, 2, 4, 'gdfgdfg dfsdfsdf'),
('PIPP2512', 'PNFI', 1, 'programacion 2',  			12,	2, 2, 2, 4, 'gdfgdfg dfsdfsdf'),
('PIEL233', 'PNFI', 1, 'electiva 2',  					3, 	2, 2, 2, 4, 'gdfgdfg dfsdfsdf'),
('PIAA223', 'PNFI', 1, 'actividades acreditables 2',  	3, 	2, 3, 2, 4, 'gdfgdfg dfsdfsdf'),
('PIFC223', 'PNFI', 1, 'formacion critica 2',  		3, 	2, 3, 2, 4, 'gdfgdfg dfsdfsdf'),
('PIIS233', 'PNFI', 1, 'ingenieria de software',  		3, 	2, 2, 2, 4, 'gdfgdfg dfsdfsdf'),
('PIPT269', 'PNFI', 1, 'proyecto 2',  					9, 	2, 3, 2, 4, 'gdfgdfg dfsdfsdf'),
('PIRC233', 'PNFI', 1, 'redes de computadoras',  		6, 	2, 3, 2, 4, 'gdfgdfg dfsdfsdf');


INSERT INTO "TAmbientes"

("codAmb", ubicacion, tipo, observaciones, estado)

VALUES 

('g-23', 'edificio giraluna pasillo : 5 ', 2, 'salon operativo al 100%', TRUE),
('g-24', 'edificio giraluna pasillo : 5 ', 2, 'salon operativo al 100%', TRUE),
('g-25', 'edificio giraluna pasillo : 5 ', 2, 'salon operativo al 100%', TRUE),
('g-30', 'edificio giraluna pasillo : 5 ', 2, 'salon operativo al 100%', TRUE),
('g-29', 'edificio giraluna pasillo : 5 ', 2, 'salon operativo al 100%', TRUE),
('g-03', 'edificio giraluna pasillo : 5 ', 2, 'salon operativo al 100%', TRUE);

-- Asignando actividades administrativas al docente 

INSERT INTO "THorarios"

("codHor", "cedDoc", "codActAdm","codTie", tipo, estado)

VALUES 
-- ActiAdmi para el docente Iris
(default, '6789543',1,'T-66',  2, TRUE),
(default, '6789543',3,'T-68',  2, TRUE),
(default, '6789543',1,'T-70',  2, TRUE),

-- ActiAdmi para el docente Maria
(default, '1235433',2,'T-72',  2, TRUE),
(default, '1235433',4,'T-64',  2, TRUE),
(default, '1235433',1,'T-75',  2, TRUE);


INSERT INTO "THorarios"

("codHor", "cedDoc", "codSec", "codUniCur", "codTie", "codAmb", tipo, estado)

VALUES 
-- Horas de programacion

(default, '25627918', 'PNFI-in2221', 'PIPP2512', 'T-43', 'g-03',  1, TRUE),
(default, '25627918', 'PNFI-in2221', 'PIPP2512', 'T-44', 'g-03',  1, TRUE),

-- horas de matematica 

(default, '25627918', 'PNFI-in2221', 'PIMT236', 'T-25', 'g-24',  1, TRUE),
(default, '25627918', 'PNFI-in2221', 'PIMT236', 'T-26', 'g-24',  1, TRUE),
(default, '25627918', 'PNFI-in2221', 'PIMT236', 'T-27', 'g-24',  1, TRUE),

-- horas de proyecto
(default, '25627918', 'PNFI-in2221', 'PIPT269', 'T-79', 'g-24',  1, TRUE),
(default, '25627918', 'PNFI-in2221', 'PIPT269', 'T-80', 'g-24',  1, TRUE),
(default, '25627918', 'PNFI-in2221', 'PIPT269', 'T-81', 'g-24',  1, TRUE),

-- -- horas de redes 

-- (default, '25627918', 'PNFI-in2221', 'PIRC233', 'T-61', 'g-24',  1, TRUE),
-- (default, '25627918', 'PNFI-in2221', 'PIRC233', 'T-62', 'g-24',  1, TRUE),
-- (default, '25627918', 'PNFI-in2221', 'PIRC233', 'T-63', 'g-24',  1, TRUE),

-- horas de formacion critica

(default, '25627918', 'PNFI-in2221', 'PIFC223', 'T-46', 'g-24',  1, TRUE),

-- horas de actividades acreditables

(default, '25627918', 'PNFI-in2221', 'PIAA223', 'T-28', 'g-24',  1, TRUE),

-- electiva

(default, '25627918', 'PNFI-in2221', 'PIEL233', 'T-10', 'g-24',  1, TRUE),

-- ingenieria de software

(default, '25627918', 'PNFI-in2221', 'PIIS233', 'T-64', 'g-24',  1, TRUE);




INSERT INTO "TComisiones"( "codCom", nombre, dependencia, descripcion )
VALUES 
(default, 'Clasificación Docente', 'PNFI', 'Clasificación'),
(default, 'Control y Seguimiento', 'PNFI', 'Control');

INSERT INTO "TComDoc"( "codCom", "cedDoc", coordinador)
VALUES 
(1, '25627918', TRUE),
(1, '7776665', FALSE),
(2, '6789543', TRUE);

-- CREACION DE UNA DEPENDENCIA 

INSERT INTO "TDependencias"( "codDep", "nombre", "descripcion")
    VALUES (default, 'sin dependencia', 'sin asignar');
