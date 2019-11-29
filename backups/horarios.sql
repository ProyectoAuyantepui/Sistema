--
-- PostgreSQL database dump
--

-- Dumped from database version 10.10 (Ubuntu 10.10-0ubuntu0.18.04.1)
-- Dumped by pg_dump version 10.10 (Ubuntu 10.10-0ubuntu0.18.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- Name: get_carga_horaria_docente(text); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.get_carga_horaria_docente(cedula_docente text) RETURNS TABLE(horas_de_clase integer, horas_ci integer, horas_ic integer, horas_ase_aca integer, horas_ga integer, horas_oaa integer, total_hadmin integer, total_horas integer)
    LANGUAGE plpgsql
    AS $$
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
$$;


ALTER FUNCTION public.get_carga_horaria_docente(cedula_docente text) OWNER TO postgres;

--
-- Name: get_horas_administrativas_por_tipo(text, text); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.get_horas_administrativas_por_tipo(cedula_docente text, tipo_actividad text) RETURNS integer
    LANGUAGE plpgsql
    AS $$
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
$$;


ALTER FUNCTION public.get_horas_administrativas_por_tipo(cedula_docente text, tipo_actividad text) OWNER TO postgres;

--
-- Name: get_horas_de_clase(text); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.get_horas_de_clase(cedula_docente text) RETURNS integer
    LANGUAGE plpgsql
    AS $$
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
$$;


ALTER FUNCTION public.get_horas_de_clase(cedula_docente text) OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: TActiAdmi; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TActiAdmi" (
    "codActAdm" integer NOT NULL,
    titulo character varying(60),
    observaciones character varying(150),
    dependencia character varying(300),
    "tipActAdm" character varying(60)
);


ALTER TABLE public."TActiAdmi" OWNER TO postgres;

--
-- Name: TActiAdmi_codActAdm_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."TActiAdmi_codActAdm_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."TActiAdmi_codActAdm_seq" OWNER TO postgres;

--
-- Name: TActiAdmi_codActAdm_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."TActiAdmi_codActAdm_seq" OWNED BY public."TActiAdmi"."codActAdm";


--
-- Name: TAmbientes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TAmbientes" (
    "codAmb" character varying(8) NOT NULL,
    ubicacion character varying(60),
    tipo integer,
    observaciones character varying(150),
    estado boolean
);


ALTER TABLE public."TAmbientes" OWNER TO postgres;

--
-- Name: TBitacora; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TBitacora" (
    "codBit" integer NOT NULL,
    "cedDoc" character varying(10),
    accion character varying(60),
    fecha date,
    hora time without time zone,
    descripcion character varying(120)
);


ALTER TABLE public."TBitacora" OWNER TO postgres;

--
-- Name: TBitacora_codBit_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."TBitacora_codBit_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."TBitacora_codBit_seq" OWNER TO postgres;

--
-- Name: TBitacora_codBit_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."TBitacora_codBit_seq" OWNED BY public."TBitacora"."codBit";


--
-- Name: TCatDoc; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TCatDoc" (
    "codCatDoc" integer NOT NULL,
    nombre character varying(60),
    descripcion character varying(120)
);


ALTER TABLE public."TCatDoc" OWNER TO postgres;

--
-- Name: TCatDoc_codCatDoc_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."TCatDoc_codCatDoc_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."TCatDoc_codCatDoc_seq" OWNER TO postgres;

--
-- Name: TCatDoc_codCatDoc_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."TCatDoc_codCatDoc_seq" OWNED BY public."TCatDoc"."codCatDoc";


--
-- Name: TComDoc; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TComDoc" (
    "codCom" integer NOT NULL,
    "cedDoc" character varying(10) NOT NULL,
    coordinador boolean
);


ALTER TABLE public."TComDoc" OWNER TO postgres;

--
-- Name: TComisiones; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TComisiones" (
    "codCom" integer NOT NULL,
    nombre character varying(60),
    dependencia character varying(220),
    descripcion character varying(120)
);


ALTER TABLE public."TComisiones" OWNER TO postgres;

--
-- Name: TComisiones_codCom_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."TComisiones_codCom_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."TComisiones_codCom_seq" OWNER TO postgres;

--
-- Name: TComisiones_codCom_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."TComisiones_codCom_seq" OWNED BY public."TComisiones"."codCom";


--
-- Name: TDedicaciones; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TDedicaciones" (
    "codDed" integer NOT NULL,
    nombre character varying(50),
    "minHor" integer,
    "maxHor" integer
);


ALTER TABLE public."TDedicaciones" OWNER TO postgres;

--
-- Name: TDedicaciones_codDed_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."TDedicaciones_codDed_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."TDedicaciones_codDed_seq" OWNER TO postgres;

--
-- Name: TDedicaciones_codDed_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."TDedicaciones_codDed_seq" OWNED BY public."TDedicaciones"."codDed";


--
-- Name: TDependencias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TDependencias" (
    "codDep" integer NOT NULL,
    nombre character varying(50),
    descripcion character varying(120)
);


ALTER TABLE public."TDependencias" OWNER TO postgres;

--
-- Name: TDependencias_codDep_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."TDependencias_codDep_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."TDependencias_codDep_seq" OWNER TO postgres;

--
-- Name: TDependencias_codDep_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."TDependencias_codDep_seq" OWNED BY public."TDependencias"."codDep";


--
-- Name: TDias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TDias" (
    "codDia" character varying(8) NOT NULL,
    nombre character varying(10)
);


ALTER TABLE public."TDias" OWNER TO postgres;

--
-- Name: TDocDep; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TDocDep" (
    "cedDoc" character varying(10) NOT NULL,
    "codDep" integer NOT NULL
);


ALTER TABLE public."TDocDep" OWNER TO postgres;

--
-- Name: TDocentes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TDocentes" (
    "cedDoc" character varying(12) NOT NULL,
    "codCatDoc" integer,
    "codDed" integer,
    nombre character varying(20),
    apellido character varying(20),
    "fecNac" date,
    sexo integer,
    telefono character varying(12),
    correo character varying(40),
    direccion character varying(120),
    "fecIng" date,
    "fecCon" date,
    condicion character varying(120),
    estado boolean,
    observaciones character varying(120),
    intentos integer DEFAULT 0,
    "imgPerfil" character varying(120)
);


ALTER TABLE public."TDocentes" OWNER TO postgres;

--
-- Name: TEjes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TEjes" (
    "codEje" integer NOT NULL,
    nombre character varying(60),
    descripcion character varying(150)
);


ALTER TABLE public."TEjes" OWNER TO postgres;

--
-- Name: TEjes_codEje_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."TEjes_codEje_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."TEjes_codEje_seq" OWNER TO postgres;

--
-- Name: TEjes_codEje_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."TEjes_codEje_seq" OWNED BY public."TEjes"."codEje";


--
-- Name: THorarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."THorarios" (
    "codHor" integer NOT NULL,
    "cedDoc" character varying(10),
    "codSec" character varying(15),
    "codUniCur" character varying(10),
    "codActAdm" integer,
    "codTie" character varying(8),
    "codAmb" character varying(8),
    tipo integer,
    estado boolean
);


ALTER TABLE public."THorarios" OWNER TO postgres;

--
-- Name: THorarios_codHor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."THorarios_codHor_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."THorarios_codHor_seq" OWNER TO postgres;

--
-- Name: THorarios_codHor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."THorarios_codHor_seq" OWNED BY public."THorarios"."codHor";


--
-- Name: THoras; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."THoras" (
    "codHor" character varying(8) NOT NULL,
    "horEnt" time without time zone,
    "horSal" time without time zone
);


ALTER TABLE public."THoras" OWNER TO postgres;

--
-- Name: TPermisos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TPermisos" (
    "codPer" character varying(8) NOT NULL,
    nombre character varying(90)
);


ALTER TABLE public."TPermisos" OWNER TO postgres;

--
-- Name: TPnf; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TPnf" (
    "codPnf" character varying(6) NOT NULL,
    descripcion character varying(150)
);


ALTER TABLE public."TPnf" OWNER TO postgres;

--
-- Name: TRolPer; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TRolPer" (
    "codRol" character varying(50) NOT NULL,
    "codPer" character varying(8) NOT NULL
);


ALTER TABLE public."TRolPer" OWNER TO postgres;

--
-- Name: TRoles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TRoles" (
    "codRol" character varying(50) NOT NULL,
    nombre character varying(50),
    observaciones character varying(150)
);


ALTER TABLE public."TRoles" OWNER TO postgres;

--
-- Name: TSecciones; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TSecciones" (
    "codSec" character varying(15) NOT NULL,
    pnf character varying(6),
    trayecto integer,
    fase integer,
    matricula integer,
    estado boolean DEFAULT false,
    tipo integer,
    turno integer,
    observaciones character varying(150)
);


ALTER TABLE public."TSecciones" OWNER TO postgres;

--
-- Name: TTiempo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TTiempo" (
    "codTie" character varying(8) NOT NULL,
    "codDia" character varying(8),
    "codHor" character varying(8)
);


ALTER TABLE public."TTiempo" OWNER TO postgres;

--
-- Name: TUnidCurr; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TUnidCurr" (
    "codUniCur" character varying(10) NOT NULL,
    "codPnf" character varying(6),
    "codEje" integer,
    nombre character varying(60),
    "uniCre" integer,
    fase integer,
    trayecto integer,
    htas integer,
    htis integer,
    observaciones character varying(150)
);


ALTER TABLE public."TUnidCurr" OWNER TO postgres;

--
-- Name: TUsuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."TUsuarios" (
    "cedDoc" character varying(12) NOT NULL,
    usuario character varying(15) NOT NULL,
    clave character varying(60),
    "codRol" character varying(10),
    "imgPerfil" character varying(120),
    status boolean DEFAULT true
);


ALTER TABLE public."TUsuarios" OWNER TO postgres;

--
-- Name: TActiAdmi codActAdm; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TActiAdmi" ALTER COLUMN "codActAdm" SET DEFAULT nextval('public."TActiAdmi_codActAdm_seq"'::regclass);


--
-- Name: TBitacora codBit; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TBitacora" ALTER COLUMN "codBit" SET DEFAULT nextval('public."TBitacora_codBit_seq"'::regclass);


--
-- Name: TCatDoc codCatDoc; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TCatDoc" ALTER COLUMN "codCatDoc" SET DEFAULT nextval('public."TCatDoc_codCatDoc_seq"'::regclass);


--
-- Name: TComisiones codCom; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TComisiones" ALTER COLUMN "codCom" SET DEFAULT nextval('public."TComisiones_codCom_seq"'::regclass);


--
-- Name: TDedicaciones codDed; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TDedicaciones" ALTER COLUMN "codDed" SET DEFAULT nextval('public."TDedicaciones_codDed_seq"'::regclass);


--
-- Name: TDependencias codDep; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TDependencias" ALTER COLUMN "codDep" SET DEFAULT nextval('public."TDependencias_codDep_seq"'::regclass);


--
-- Name: TEjes codEje; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TEjes" ALTER COLUMN "codEje" SET DEFAULT nextval('public."TEjes_codEje_seq"'::regclass);


--
-- Name: THorarios codHor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."THorarios" ALTER COLUMN "codHor" SET DEFAULT nextval('public."THorarios_codHor_seq"'::regclass);


--
-- Data for Name: TActiAdmi; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TActiAdmi" VALUES (1, 'visita al departamento', 'actividad que es de prueba', 'pnfi', 'CI');
INSERT INTO public."TActiAdmi" VALUES (2, 'actividad  #2', 'actividad admi', 'pnfa', 'IC');
INSERT INTO public."TActiAdmi" VALUES (3, 'acti #3', 'acti admi', 'pnfa', 'AA');
INSERT INTO public."TActiAdmi" VALUES (4, 'buscar #4', 'actividad que es de prueba', 'pnfa', 'GA');
INSERT INTO public."TActiAdmi" VALUES (5, 'acti de campo #5', 'actividad que es de prueba', 'pnfi', 'OAA');
INSERT INTO public."TActiAdmi" VALUES (6, 'reunion #6', 'actividad que es de prueba', 'pnfa', 'OAA');
INSERT INTO public."TActiAdmi" VALUES (7, 'accessoria #7', 'actividad que es de prueba', 'pnfi', 'AA');
INSERT INTO public."TActiAdmi" VALUES (8, 'viaje', 'actividad que es de prueba', 'pnfa', 'CI');
INSERT INTO public."TActiAdmi" VALUES (9, 'actividad de campo', 'actividad que es de prueba', 'pnfi', 'CI');
INSERT INTO public."TActiAdmi" VALUES (10, 'ir a la comunidad', 'actividad que es de prueba', 'pnfi', 'IC');
INSERT INTO public."TActiAdmi" VALUES (11, 'Visita a la comunidad1', 'asdsadas dsadassd', 'sadada', 'IC');


--
-- Data for Name: TAmbientes; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TAmbientes" VALUES ('G-24', 'edificio giraluna pasillo : 5 ', 2, 'salon operativo al 100%', true);
INSERT INTO public."TAmbientes" VALUES ('G-25', 'edificio giraluna pasillo : 5 ', 2, 'salon operativo al 100%', true);
INSERT INTO public."TAmbientes" VALUES ('G-30', 'edificio giraluna pasillo : 5 ', 2, 'salon operativo al 100%', true);
INSERT INTO public."TAmbientes" VALUES ('G-29', 'edificio giraluna pasillo : 5 ', 2, 'salon operativo al 100%', true);
INSERT INTO public."TAmbientes" VALUES ('G-03', 'edificio giraluna pasillo : 5 ', 2, 'salon operativo al 100%', true);
INSERT INTO public."TAmbientes" VALUES ('G-23', 'edificio giraluna pasillo : 5 ', 2, 'salon operativo al 100%', false);


--
-- Data for Name: TBitacora; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TBitacora" VALUES (1, 'V-26136890', 'Insertar actividad administrativa : Visita a la comunidad1 ', '2019-07-02', '19:42:00', NULL);


--
-- Data for Name: TCatDoc; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TCatDoc" VALUES (1, 'Sin Categoria', 'Sin categoria de docente');
INSERT INTO public."TCatDoc" VALUES (2, 'AGREGADO', 'Categoría para los Docentes que han cumplido ....');


--
-- Data for Name: TComDoc; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TComDoc" VALUES (1, 'V-26136890', true);
INSERT INTO public."TComDoc" VALUES (1, '1217997', false);


--
-- Data for Name: TComisiones; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TComisiones" VALUES (1, 'FORMACION AL DOCENTE', '1', 'Coordinación 2019');


--
-- Data for Name: TDedicaciones; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TDedicaciones" VALUES (1, 'Tiempo completo', 12, 16);
INSERT INTO public."TDedicaciones" VALUES (2, 'Exclusiva', 25, 16);


--
-- Data for Name: TDependencias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TDependencias" VALUES (1, 'PNFI', 'Esta dependencia se encarga de.....');
INSERT INTO public."TDependencias" VALUES (2, 'PNFA', 'Programa Nacional de Formación en Administracion');


--
-- Data for Name: TDias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TDias" VALUES ('D-001', 'lunes');
INSERT INTO public."TDias" VALUES ('D-002', 'martes');
INSERT INTO public."TDias" VALUES ('D-003', 'miercoles');
INSERT INTO public."TDias" VALUES ('D-004', 'jueves');
INSERT INTO public."TDias" VALUES ('D-005', 'viernes');
INSERT INTO public."TDias" VALUES ('D-006', 'sabado');
INSERT INTO public."TDias" VALUES ('D-007', 'domingo');


--
-- Data for Name: TDocDep; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TDocDep" VALUES ('V-26136890', 2);
INSERT INTO public."TDocDep" VALUES ('V-26136890', 1);
INSERT INTO public."TDocDep" VALUES ('7462281', 1);


--
-- Data for Name: TDocentes; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TDocentes" VALUES ('1217997', 1, 2, 'USUARIO', 'PRUEBA', '2019-07-23', 1, '23770732222', 'usuario.prueba@gmail.com', 'Calle 1 carrera 3', '2019-07-19', '2019-07-17', 'TIEMPO COMPLETO', true, 'Usuario registrado con rol de docente', 0, NULL);
INSERT INTO public."TDocentes" VALUES ('7462281', 2, 2, 'Yordy', 'JIMENEZ', '2019-10-26', 1, '04265412284', 'madieljimenez@hotmail.com', 'CALLE 20', '2019-10-15', '2019-10-08', 'condicion', false, 'Usuario registrado con rol de docente', 0, NULL);
INSERT INTO public."TDocentes" VALUES ('V-26136890', 2, 1, 'Yordy', 'Jimenez', '2019-06-16', 1, '04269353639', 'y@y.com', 'calle1', '2019-06-16', '2019-06-16', 'ORDINARIO', false, 'nada', 1, NULL);


--
-- Data for Name: TEjes; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TEjes" VALUES (1, 'estetico ludico', 'eje que ayuda a la recreacion del estudiante');
INSERT INTO public."TEjes" VALUES (2, 'epistemologico', 'eje de prueba');


--
-- Data for Name: THorarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."THorarios" VALUES (26, 'V-26136890', NULL, NULL, 7, 'T-39', NULL, 2, true);
INSERT INTO public."THorarios" VALUES (1, NULL, NULL, NULL, 1, 'T-66', NULL, 2, true);
INSERT INTO public."THorarios" VALUES (2, NULL, NULL, NULL, 3, 'T-68', NULL, 2, true);
INSERT INTO public."THorarios" VALUES (3, NULL, NULL, NULL, 1, 'T-70', NULL, 2, true);
INSERT INTO public."THorarios" VALUES (4, NULL, NULL, NULL, 2, 'T-72', NULL, 2, true);
INSERT INTO public."THorarios" VALUES (5, NULL, NULL, NULL, 4, 'T-64', NULL, 2, true);
INSERT INTO public."THorarios" VALUES (6, NULL, NULL, NULL, 1, 'T-75', NULL, 2, true);
INSERT INTO public."THorarios" VALUES (34, 'V-26136890', 'IN3321', 'PIPT269', NULL, 'T-21', 'G-30', 1, true);
INSERT INTO public."THorarios" VALUES (35, '1217997', 'IN3321', 'PIFC223', NULL, 'T-19', 'G-24', 1, true);
INSERT INTO public."THorarios" VALUES (37, NULL, 'IN3321', 'PIAA223', NULL, 'T-37', NULL, 1, true);
INSERT INTO public."THorarios" VALUES (38, NULL, 'IN3321', 'PIAA223', NULL, 'T-41', NULL, 1, true);
INSERT INTO public."THorarios" VALUES (33, NULL, 'IN3321', 'PIPT269', NULL, 'T-38', NULL, 1, true);
INSERT INTO public."THorarios" VALUES (39, NULL, NULL, NULL, 4, 'T-01', NULL, 2, true);
INSERT INTO public."THorarios" VALUES (40, NULL, NULL, NULL, 4, 'T-21', NULL, 2, true);
INSERT INTO public."THorarios" VALUES (36, NULL, 'IN3321', 'PIFC223', NULL, 'T-04', NULL, 1, true);
INSERT INTO public."THorarios" VALUES (41, '1217997', 'IN3321', 'PIMT236', NULL, 'T-01', 'G-24', 1, true);
INSERT INTO public."THorarios" VALUES (42, '1217997', 'IN3321', 'PIMT236', NULL, 'T-39', 'G-30', 1, true);


--
-- Data for Name: THoras; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."THoras" VALUES ('H-01', '07:20:00', '08:05:00');
INSERT INTO public."THoras" VALUES ('H-02', '08:05:00', '08:50:00');
INSERT INTO public."THoras" VALUES ('H-03', '08:55:00', '09:40:00');
INSERT INTO public."THoras" VALUES ('H-04', '09:40:00', '10:25:00');
INSERT INTO public."THoras" VALUES ('H-05', '10:30:00', '11:15:00');
INSERT INTO public."THoras" VALUES ('H-06', '11:15:00', '12:00:00');
INSERT INTO public."THoras" VALUES ('H-07', '13:20:00', '14:05:00');
INSERT INTO public."THoras" VALUES ('H-08', '14:05:00', '14:50:00');
INSERT INTO public."THoras" VALUES ('H-09', '14:55:00', '15:40:00');
INSERT INTO public."THoras" VALUES ('H-10', '15:40:00', '16:25:00');
INSERT INTO public."THoras" VALUES ('H-11', '16:30:00', '17:15:00');
INSERT INTO public."THoras" VALUES ('H-12', '17:15:00', '18:00:00');
INSERT INTO public."THoras" VALUES ('H-13', '18:00:00', '18:45:00');
INSERT INTO public."THoras" VALUES ('H-14', '18:45:00', '19:30:00');
INSERT INTO public."THoras" VALUES ('H-15', '19:35:00', '20:20:00');
INSERT INTO public."THoras" VALUES ('H-16', '20:20:00', '21:05:00');
INSERT INTO public."THoras" VALUES ('H-17', '21:10:00', '21:55:00');
INSERT INTO public."THoras" VALUES ('H-18', '21:55:00', '22:40:00');


--
-- Data for Name: TPermisos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TPermisos" VALUES ('P-01', 'iniciar sesion');
INSERT INTO public."TPermisos" VALUES ('P-02', 'perfil de usuario');
INSERT INTO public."TPermisos" VALUES ('P-71', 'ver mi horario');
INSERT INTO public."TPermisos" VALUES ('P-03', 'recuperar contraseña');
INSERT INTO public."TPermisos" VALUES ('P-04', 'gestionar horarios');
INSERT INTO public."TPermisos" VALUES ('P-05', 'crear horarios');
INSERT INTO public."TPermisos" VALUES ('P-06', 'modificar horarios');
INSERT INTO public."TPermisos" VALUES ('P-07', 'eliminar horarios');
INSERT INTO public."TPermisos" VALUES ('P-08', 'consultar horarios');
INSERT INTO public."TPermisos" VALUES ('P-09', 'gestionar docentes');
INSERT INTO public."TPermisos" VALUES ('P-10', 'crear docentes');
INSERT INTO public."TPermisos" VALUES ('P-11', 'modificar docentes');
INSERT INTO public."TPermisos" VALUES ('P-12', 'eliminar docentes');
INSERT INTO public."TPermisos" VALUES ('P-13', 'consultar docentes');
INSERT INTO public."TPermisos" VALUES ('P-14', 'gestionar ambientes');
INSERT INTO public."TPermisos" VALUES ('P-15', 'crear ambientes');
INSERT INTO public."TPermisos" VALUES ('P-16', 'modificar ambientes');
INSERT INTO public."TPermisos" VALUES ('P-17', 'eliminar ambientes');
INSERT INTO public."TPermisos" VALUES ('P-18', 'consultar ambientes');
INSERT INTO public."TPermisos" VALUES ('P-19', 'gestionar secciones');
INSERT INTO public."TPermisos" VALUES ('P-20', 'crear secciones');
INSERT INTO public."TPermisos" VALUES ('P-21', 'modificar secciones');
INSERT INTO public."TPermisos" VALUES ('P-22', 'eliminar secciones');
INSERT INTO public."TPermisos" VALUES ('P-23', 'consultar secciones');
INSERT INTO public."TPermisos" VALUES ('P-24', 'gestion basica');
INSERT INTO public."TPermisos" VALUES ('P-25', 'gestionar categorias de docentes');
INSERT INTO public."TPermisos" VALUES ('P-26', 'crear categorias de docentes');
INSERT INTO public."TPermisos" VALUES ('P-27', 'modificar categorias de docentes');
INSERT INTO public."TPermisos" VALUES ('P-28', 'eliminar categorias de docentes');
INSERT INTO public."TPermisos" VALUES ('P-29', 'consultar categorias de docentes');
INSERT INTO public."TPermisos" VALUES ('P-30', 'gestionar pnf');
INSERT INTO public."TPermisos" VALUES ('P-31', 'crear pnf');
INSERT INTO public."TPermisos" VALUES ('P-32', 'modificar pnf');
INSERT INTO public."TPermisos" VALUES ('P-33', 'eliminar pnf');
INSERT INTO public."TPermisos" VALUES ('P-34', 'consultar pnf');
INSERT INTO public."TPermisos" VALUES ('P-35', 'gestionar ejes de formacion');
INSERT INTO public."TPermisos" VALUES ('P-36', 'crear ejes de formacion');
INSERT INTO public."TPermisos" VALUES ('P-37', 'modificar ejes de formacion');
INSERT INTO public."TPermisos" VALUES ('P-38', 'eliminar ejes de formacion');
INSERT INTO public."TPermisos" VALUES ('P-39', 'consultar ejes de formacion');
INSERT INTO public."TPermisos" VALUES ('P-40', 'gestionar unidades curriculares');
INSERT INTO public."TPermisos" VALUES ('P-41', 'crear unidades curriculares');
INSERT INTO public."TPermisos" VALUES ('P-42', 'modificar unidades curriculares');
INSERT INTO public."TPermisos" VALUES ('P-43', 'eliminar unidades curriculares');
INSERT INTO public."TPermisos" VALUES ('P-44', 'consultar unidades curriculares');
INSERT INTO public."TPermisos" VALUES ('P-45', 'gestionar actividades administrativas');
INSERT INTO public."TPermisos" VALUES ('P-46', 'crear actividades administrativas');
INSERT INTO public."TPermisos" VALUES ('P-47', 'modificar actividades administrativas');
INSERT INTO public."TPermisos" VALUES ('P-48', 'eliminar actividades administrativas');
INSERT INTO public."TPermisos" VALUES ('P-49', 'consultar actividades administrativas');
INSERT INTO public."TPermisos" VALUES ('P-50', 'gestionar comisiones');
INSERT INTO public."TPermisos" VALUES ('P-51', 'crear comisiones');
INSERT INTO public."TPermisos" VALUES ('P-52', 'modificar comisiones');
INSERT INTO public."TPermisos" VALUES ('P-53', 'eliminar comisiones');
INSERT INTO public."TPermisos" VALUES ('P-54', 'consultar comisiones');
INSERT INTO public."TPermisos" VALUES ('P-55', 'gestionar dependencias');
INSERT INTO public."TPermisos" VALUES ('P-56', 'crear dependencias');
INSERT INTO public."TPermisos" VALUES ('P-57', 'modificar dependencias');
INSERT INTO public."TPermisos" VALUES ('P-58', 'eliminar dependencias');
INSERT INTO public."TPermisos" VALUES ('P-59', 'consultar dependencias');
INSERT INTO public."TPermisos" VALUES ('P-60', 'generacion de reportes');
INSERT INTO public."TPermisos" VALUES ('P-61', 'seguridad');
INSERT INTO public."TPermisos" VALUES ('P-62', 'gestionar roles');
INSERT INTO public."TPermisos" VALUES ('P-63', 'crear roles');
INSERT INTO public."TPermisos" VALUES ('P-64', 'modificar roles');
INSERT INTO public."TPermisos" VALUES ('P-65', 'eliminar roles');
INSERT INTO public."TPermisos" VALUES ('P-66', 'consultar roles');
INSERT INTO public."TPermisos" VALUES ('P-67', 'consulta de bitacora');
INSERT INTO public."TPermisos" VALUES ('P-68', 'mantenimiento');
INSERT INTO public."TPermisos" VALUES ('P-69', 'respaldo de base de datos');
INSERT INTO public."TPermisos" VALUES ('P-70', 'restauracion de base de datos');
INSERT INTO public."TPermisos" VALUES ('P-72', 'gestionar dedicaciones');


--
-- Data for Name: TPnf; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TPnf" VALUES ('PNFI', 'Pnf en informatica');
INSERT INTO public."TPnf" VALUES ('PNFA', 'Pnf en administracion');


--
-- Data for Name: TRolPer; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TRolPer" VALUES ('R-001', 'P-02');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-03');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-04');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-05');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-06');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-07');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-08');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-09');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-10');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-11');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-12');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-13');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-15');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-16');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-18');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-19');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-20');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-21');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-22');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-23');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-24');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-25');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-26');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-27');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-28');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-29');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-30');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-31');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-32');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-33');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-34');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-35');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-36');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-37');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-38');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-39');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-40');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-41');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-42');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-43');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-44');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-45');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-46');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-47');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-48');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-49');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-50');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-51');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-52');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-53');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-54');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-55');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-56');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-57');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-58');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-59');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-60');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-61');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-62');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-63');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-64');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-65');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-66');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-67');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-68');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-69');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-70');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-71');
INSERT INTO public."TRolPer" VALUES ('R-003', 'P-01');
INSERT INTO public."TRolPer" VALUES ('R-003', 'P-02');
INSERT INTO public."TRolPer" VALUES ('R-003', 'P-71');
INSERT INTO public."TRolPer" VALUES ('R-003', 'P-03');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-72');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-01');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-17');
INSERT INTO public."TRolPer" VALUES ('R-001', 'P-14');


--
-- Data for Name: TRoles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TRoles" VALUES ('R-001', 'SUPERUSUARIO', 'CONTROL TOTAL DEL SISTEMA');
INSERT INTO public."TRoles" VALUES ('R-003', 'DOCENTE', 'ACCESO A CONSULTAR HORARIO Y GESTIONAR SU PERFIL');


--
-- Data for Name: TSecciones; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TSecciones" VALUES ('IN3321', NULL, 2, NULL, 23, true, 1, 1, 'ASDADAsadas');
INSERT INTO public."TSecciones" VALUES ('IN3333', 'PNFI', 3, NULL, 22, true, 1, 1, 'sadasdsad');


--
-- Data for Name: TTiempo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TTiempo" VALUES ('T-01', 'D-001', 'H-01');
INSERT INTO public."TTiempo" VALUES ('T-02', 'D-001', 'H-02');
INSERT INTO public."TTiempo" VALUES ('T-03', 'D-001', 'H-03');
INSERT INTO public."TTiempo" VALUES ('T-04', 'D-001', 'H-04');
INSERT INTO public."TTiempo" VALUES ('T-05', 'D-001', 'H-05');
INSERT INTO public."TTiempo" VALUES ('T-06', 'D-001', 'H-06');
INSERT INTO public."TTiempo" VALUES ('T-07', 'D-001', 'H-07');
INSERT INTO public."TTiempo" VALUES ('T-08', 'D-001', 'H-08');
INSERT INTO public."TTiempo" VALUES ('T-09', 'D-001', 'H-09');
INSERT INTO public."TTiempo" VALUES ('T-10', 'D-001', 'H-10');
INSERT INTO public."TTiempo" VALUES ('T-11', 'D-001', 'H-11');
INSERT INTO public."TTiempo" VALUES ('T-12', 'D-001', 'H-12');
INSERT INTO public."TTiempo" VALUES ('T-13', 'D-001', 'H-13');
INSERT INTO public."TTiempo" VALUES ('T-14', 'D-001', 'H-14');
INSERT INTO public."TTiempo" VALUES ('T-15', 'D-001', 'H-15');
INSERT INTO public."TTiempo" VALUES ('T-16', 'D-001', 'H-16');
INSERT INTO public."TTiempo" VALUES ('T-17', 'D-001', 'H-17');
INSERT INTO public."TTiempo" VALUES ('T-18', 'D-001', 'H-18');
INSERT INTO public."TTiempo" VALUES ('T-19', 'D-002', 'H-01');
INSERT INTO public."TTiempo" VALUES ('T-20', 'D-002', 'H-02');
INSERT INTO public."TTiempo" VALUES ('T-21', 'D-002', 'H-03');
INSERT INTO public."TTiempo" VALUES ('T-22', 'D-002', 'H-04');
INSERT INTO public."TTiempo" VALUES ('T-23', 'D-002', 'H-05');
INSERT INTO public."TTiempo" VALUES ('T-24', 'D-002', 'H-06');
INSERT INTO public."TTiempo" VALUES ('T-25', 'D-002', 'H-07');
INSERT INTO public."TTiempo" VALUES ('T-26', 'D-002', 'H-08');
INSERT INTO public."TTiempo" VALUES ('T-27', 'D-002', 'H-09');
INSERT INTO public."TTiempo" VALUES ('T-28', 'D-002', 'H-10');
INSERT INTO public."TTiempo" VALUES ('T-29', 'D-002', 'H-11');
INSERT INTO public."TTiempo" VALUES ('T-30', 'D-002', 'H-12');
INSERT INTO public."TTiempo" VALUES ('T-31', 'D-002', 'H-13');
INSERT INTO public."TTiempo" VALUES ('T-32', 'D-002', 'H-14');
INSERT INTO public."TTiempo" VALUES ('T-33', 'D-002', 'H-15');
INSERT INTO public."TTiempo" VALUES ('T-34', 'D-002', 'H-16');
INSERT INTO public."TTiempo" VALUES ('T-35', 'D-002', 'H-17');
INSERT INTO public."TTiempo" VALUES ('T-36', 'D-002', 'H-18');
INSERT INTO public."TTiempo" VALUES ('T-37', 'D-003', 'H-01');
INSERT INTO public."TTiempo" VALUES ('T-38', 'D-003', 'H-02');
INSERT INTO public."TTiempo" VALUES ('T-39', 'D-003', 'H-03');
INSERT INTO public."TTiempo" VALUES ('T-40', 'D-003', 'H-04');
INSERT INTO public."TTiempo" VALUES ('T-41', 'D-003', 'H-05');
INSERT INTO public."TTiempo" VALUES ('T-42', 'D-003', 'H-06');
INSERT INTO public."TTiempo" VALUES ('T-43', 'D-003', 'H-07');
INSERT INTO public."TTiempo" VALUES ('T-44', 'D-003', 'H-08');
INSERT INTO public."TTiempo" VALUES ('T-45', 'D-003', 'H-09');
INSERT INTO public."TTiempo" VALUES ('T-46', 'D-003', 'H-10');
INSERT INTO public."TTiempo" VALUES ('T-47', 'D-003', 'H-11');
INSERT INTO public."TTiempo" VALUES ('T-48', 'D-003', 'H-12');
INSERT INTO public."TTiempo" VALUES ('T-49', 'D-003', 'H-13');
INSERT INTO public."TTiempo" VALUES ('T-50', 'D-003', 'H-14');
INSERT INTO public."TTiempo" VALUES ('T-51', 'D-003', 'H-15');
INSERT INTO public."TTiempo" VALUES ('T-52', 'D-003', 'H-16');
INSERT INTO public."TTiempo" VALUES ('T-53', 'D-003', 'H-17');
INSERT INTO public."TTiempo" VALUES ('T-54', 'D-003', 'H-18');
INSERT INTO public."TTiempo" VALUES ('T-55', 'D-004', 'H-01');
INSERT INTO public."TTiempo" VALUES ('T-56', 'D-004', 'H-02');
INSERT INTO public."TTiempo" VALUES ('T-57', 'D-004', 'H-03');
INSERT INTO public."TTiempo" VALUES ('T-58', 'D-004', 'H-04');
INSERT INTO public."TTiempo" VALUES ('T-59', 'D-004', 'H-05');
INSERT INTO public."TTiempo" VALUES ('T-60', 'D-004', 'H-06');
INSERT INTO public."TTiempo" VALUES ('T-61', 'D-004', 'H-07');
INSERT INTO public."TTiempo" VALUES ('T-62', 'D-004', 'H-08');
INSERT INTO public."TTiempo" VALUES ('T-63', 'D-004', 'H-09');
INSERT INTO public."TTiempo" VALUES ('T-64', 'D-004', 'H-10');
INSERT INTO public."TTiempo" VALUES ('T-65', 'D-004', 'H-11');
INSERT INTO public."TTiempo" VALUES ('T-66', 'D-004', 'H-12');
INSERT INTO public."TTiempo" VALUES ('T-67', 'D-004', 'H-13');
INSERT INTO public."TTiempo" VALUES ('T-68', 'D-004', 'H-14');
INSERT INTO public."TTiempo" VALUES ('T-69', 'D-004', 'H-15');
INSERT INTO public."TTiempo" VALUES ('T-70', 'D-004', 'H-16');
INSERT INTO public."TTiempo" VALUES ('T-71', 'D-004', 'H-17');
INSERT INTO public."TTiempo" VALUES ('T-72', 'D-004', 'H-18');
INSERT INTO public."TTiempo" VALUES ('T-73', 'D-005', 'H-01');
INSERT INTO public."TTiempo" VALUES ('T-74', 'D-005', 'H-02');
INSERT INTO public."TTiempo" VALUES ('T-75', 'D-005', 'H-03');
INSERT INTO public."TTiempo" VALUES ('T-76', 'D-005', 'H-04');
INSERT INTO public."TTiempo" VALUES ('T-77', 'D-005', 'H-05');
INSERT INTO public."TTiempo" VALUES ('T-78', 'D-005', 'H-06');
INSERT INTO public."TTiempo" VALUES ('T-79', 'D-005', 'H-07');
INSERT INTO public."TTiempo" VALUES ('T-80', 'D-005', 'H-08');
INSERT INTO public."TTiempo" VALUES ('T-81', 'D-005', 'H-09');
INSERT INTO public."TTiempo" VALUES ('T-82', 'D-005', 'H-10');
INSERT INTO public."TTiempo" VALUES ('T-83', 'D-005', 'H-11');
INSERT INTO public."TTiempo" VALUES ('T-84', 'D-005', 'H-12');
INSERT INTO public."TTiempo" VALUES ('T-85', 'D-005', 'H-13');
INSERT INTO public."TTiempo" VALUES ('T-86', 'D-005', 'H-14');
INSERT INTO public."TTiempo" VALUES ('T-87', 'D-005', 'H-15');
INSERT INTO public."TTiempo" VALUES ('T-89', 'D-005', 'H-16');
INSERT INTO public."TTiempo" VALUES ('T-90', 'D-005', 'H-17');
INSERT INTO public."TTiempo" VALUES ('T-91', 'D-005', 'H-18');
INSERT INTO public."TTiempo" VALUES ('T-92', 'D-006', 'H-01');
INSERT INTO public."TTiempo" VALUES ('T-93', 'D-006', 'H-02');
INSERT INTO public."TTiempo" VALUES ('T-94', 'D-006', 'H-03');
INSERT INTO public."TTiempo" VALUES ('T-95', 'D-006', 'H-04');
INSERT INTO public."TTiempo" VALUES ('T-96', 'D-006', 'H-05');
INSERT INTO public."TTiempo" VALUES ('T-97', 'D-006', 'H-06');
INSERT INTO public."TTiempo" VALUES ('T-98', 'D-006', 'H-07');
INSERT INTO public."TTiempo" VALUES ('T-99', 'D-006', 'H-08');
INSERT INTO public."TTiempo" VALUES ('T-100', 'D-006', 'H-09');
INSERT INTO public."TTiempo" VALUES ('T-101', 'D-006', 'H-10');
INSERT INTO public."TTiempo" VALUES ('T-102', 'D-006', 'H-11');
INSERT INTO public."TTiempo" VALUES ('T-103', 'D-006', 'H-12');
INSERT INTO public."TTiempo" VALUES ('T-104', 'D-006', 'H-13');
INSERT INTO public."TTiempo" VALUES ('T-105', 'D-006', 'H-14');
INSERT INTO public."TTiempo" VALUES ('T-106', 'D-006', 'H-15');
INSERT INTO public."TTiempo" VALUES ('T-107', 'D-006', 'H-16');
INSERT INTO public."TTiempo" VALUES ('T-108', 'D-006', 'H-17');
INSERT INTO public."TTiempo" VALUES ('T-109', 'D-006', 'H-18');
INSERT INTO public."TTiempo" VALUES ('T-110', 'D-007', 'H-01');
INSERT INTO public."TTiempo" VALUES ('T-111', 'D-007', 'H-02');
INSERT INTO public."TTiempo" VALUES ('T-112', 'D-007', 'H-03');
INSERT INTO public."TTiempo" VALUES ('T-113', 'D-007', 'H-04');
INSERT INTO public."TTiempo" VALUES ('T-114', 'D-007', 'H-05');
INSERT INTO public."TTiempo" VALUES ('T-115', 'D-007', 'H-06');
INSERT INTO public."TTiempo" VALUES ('T-116', 'D-007', 'H-07');
INSERT INTO public."TTiempo" VALUES ('T-117', 'D-007', 'H-08');
INSERT INTO public."TTiempo" VALUES ('T-118', 'D-007', 'H-09');
INSERT INTO public."TTiempo" VALUES ('T-119', 'D-007', 'H-10');
INSERT INTO public."TTiempo" VALUES ('T-120', 'D-007', 'H-11');
INSERT INTO public."TTiempo" VALUES ('T-121', 'D-007', 'H-12');
INSERT INTO public."TTiempo" VALUES ('T-122', 'D-007', 'H-13');
INSERT INTO public."TTiempo" VALUES ('T-123', 'D-007', 'H-14');
INSERT INTO public."TTiempo" VALUES ('T-124', 'D-007', 'H-15');
INSERT INTO public."TTiempo" VALUES ('T-125', 'D-007', 'H-16');
INSERT INTO public."TTiempo" VALUES ('T-126', 'D-007', 'H-17');
INSERT INTO public."TTiempo" VALUES ('T-127', 'D-007', 'H-18');


--
-- Data for Name: TUnidCurr; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TUnidCurr" VALUES ('PIMT236', 'PNFI', 1, 'MATEMÁTICA II', 3, 3, 2, 2, 4, 'gdfgdfg dfsdfsdf');
INSERT INTO public."TUnidCurr" VALUES ('PIPP2512', 'PNFI', 1, 'PROGRAMACIÓN II', 12, 2, 2, 2, 4, 'gdfgdfg dfsdfsdf');
INSERT INTO public."TUnidCurr" VALUES ('PIEL233', 'PNFI', 1, 'ELECTIVA II', 3, 2, 2, 2, 4, 'gdfgdfg dfsdfsdf');
INSERT INTO public."TUnidCurr" VALUES ('PIAA223', 'PNFI', 1, 'ACTIVIDADES ACREDITABLES II', 3, 3, 2, 2, 4, 'gdfgdfg dfsdfsdf');
INSERT INTO public."TUnidCurr" VALUES ('PIFC223', 'PNFI', 1, 'FORMACIÓN CRITICA II', 3, 3, 2, 2, 4, 'gdfgdfg dfsdfsdf');
INSERT INTO public."TUnidCurr" VALUES ('PIIS233', 'PNFI', 1, 'INGENIERIA DE SOFTWARE', 3, 2, 2, 2, 4, 'gdfgdfg dfsdfsdf');
INSERT INTO public."TUnidCurr" VALUES ('PIPT269', 'PNFI', 1, 'PROYECTO II', 9, 3, 2, 2, 4, 'gdfgdfg dfsdfsdf');
INSERT INTO public."TUnidCurr" VALUES ('PIRC233', 'PNFI', 1, 'REDES AVANZADAS', 6, 3, 4, 2, 4, 'gdfgdfg dfsdfsdf');


--
-- Data for Name: TUsuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."TUsuarios" VALUES ('7462281', 'madiel', '$2y$10$bcpAB/ULbrx7ye8PpDPo1eJ6idDTDMiz21bOTPtSphHRv9nANzcMS', 'R-003', NULL, true);
INSERT INTO public."TUsuarios" VALUES ('V-26136890', 'yordy', '$2y$10$apCwslgruzRYL2Fhh9k3UubWYQ5zS2B7.2vh6IdVZuQGPYsyF5.oS', 'R-001', 'T00002.png', true);
INSERT INTO public."TUsuarios" VALUES ('1217997', 'usuario', '$2y$10$SlXB6Nco9V5x25LwSJyXw.Eaxd8KO20A7i6iXnniTvXSsQXu4BWoS', 'R-003', NULL, true);


--
-- Name: TActiAdmi_codActAdm_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."TActiAdmi_codActAdm_seq"', 11, true);


--
-- Name: TBitacora_codBit_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."TBitacora_codBit_seq"', 1, true);


--
-- Name: TCatDoc_codCatDoc_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."TCatDoc_codCatDoc_seq"', 2, true);


--
-- Name: TComisiones_codCom_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."TComisiones_codCom_seq"', 1, true);


--
-- Name: TDedicaciones_codDed_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."TDedicaciones_codDed_seq"', 2, true);


--
-- Name: TDependencias_codDep_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."TDependencias_codDep_seq"', 2, true);


--
-- Name: TEjes_codEje_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."TEjes_codEje_seq"', 2, true);


--
-- Name: THorarios_codHor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."THorarios_codHor_seq"', 42, true);


--
-- Name: TActiAdmi TActiAdmi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TActiAdmi"
    ADD CONSTRAINT "TActiAdmi_pkey" PRIMARY KEY ("codActAdm");


--
-- Name: TAmbientes TAmbientes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TAmbientes"
    ADD CONSTRAINT "TAmbientes_pkey" PRIMARY KEY ("codAmb");


--
-- Name: TBitacora TBitacora_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TBitacora"
    ADD CONSTRAINT "TBitacora_pkey" PRIMARY KEY ("codBit");


--
-- Name: TCatDoc TCatDoc_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TCatDoc"
    ADD CONSTRAINT "TCatDoc_pkey" PRIMARY KEY ("codCatDoc");


--
-- Name: TComDoc TComDoc_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TComDoc"
    ADD CONSTRAINT "TComDoc_pkey" PRIMARY KEY ("codCom", "cedDoc");


--
-- Name: TComisiones TComisiones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TComisiones"
    ADD CONSTRAINT "TComisiones_pkey" PRIMARY KEY ("codCom");


--
-- Name: TDedicaciones TDedicaciones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TDedicaciones"
    ADD CONSTRAINT "TDedicaciones_pkey" PRIMARY KEY ("codDed");


--
-- Name: TDependencias TDependencias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TDependencias"
    ADD CONSTRAINT "TDependencias_pkey" PRIMARY KEY ("codDep");


--
-- Name: TDias TDias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TDias"
    ADD CONSTRAINT "TDias_pkey" PRIMARY KEY ("codDia");


--
-- Name: TDocDep TDocDep_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TDocDep"
    ADD CONSTRAINT "TDocDep_pkey" PRIMARY KEY ("cedDoc", "codDep");


--
-- Name: TDocentes TDocentes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TDocentes"
    ADD CONSTRAINT "TDocentes_pkey" PRIMARY KEY ("cedDoc");


--
-- Name: TEjes TEjes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TEjes"
    ADD CONSTRAINT "TEjes_pkey" PRIMARY KEY ("codEje");


--
-- Name: THorarios THorarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."THorarios"
    ADD CONSTRAINT "THorarios_pkey" PRIMARY KEY ("codHor");


--
-- Name: THoras THoras_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."THoras"
    ADD CONSTRAINT "THoras_pkey" PRIMARY KEY ("codHor");


--
-- Name: TPermisos TPermisos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TPermisos"
    ADD CONSTRAINT "TPermisos_pkey" PRIMARY KEY ("codPer");


--
-- Name: TPnf TPnf_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TPnf"
    ADD CONSTRAINT "TPnf_pkey" PRIMARY KEY ("codPnf");


--
-- Name: TRolPer TRolPer_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TRolPer"
    ADD CONSTRAINT "TRolPer_pkey" PRIMARY KEY ("codRol", "codPer");


--
-- Name: TRoles TRoles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TRoles"
    ADD CONSTRAINT "TRoles_pkey" PRIMARY KEY ("codRol");


--
-- Name: TSecciones TSecciones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TSecciones"
    ADD CONSTRAINT "TSecciones_pkey" PRIMARY KEY ("codSec");


--
-- Name: TTiempo TTiempo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TTiempo"
    ADD CONSTRAINT "TTiempo_pkey" PRIMARY KEY ("codTie");


--
-- Name: TUnidCurr TUnidCurr_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TUnidCurr"
    ADD CONSTRAINT "TUnidCurr_pkey" PRIMARY KEY ("codUniCur");


--
-- Name: TUsuarios pk_cedAndUser; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TUsuarios"
    ADD CONSTRAINT "pk_cedAndUser" PRIMARY KEY ("cedDoc", usuario);


--
-- Name: TUsuarios fk_cedDoc; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TUsuarios"
    ADD CONSTRAINT "fk_cedDoc" FOREIGN KEY ("cedDoc") REFERENCES public."TDocentes"("cedDoc");


--
-- Name: TBitacora fk_cedDoc_TDocente; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TBitacora"
    ADD CONSTRAINT "fk_cedDoc_TDocente" FOREIGN KEY ("cedDoc") REFERENCES public."TDocentes"("cedDoc") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: TComDoc fk_cedDoc_TDocentes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TComDoc"
    ADD CONSTRAINT "fk_cedDoc_TDocentes" FOREIGN KEY ("cedDoc") REFERENCES public."TDocentes"("cedDoc") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: TDocDep fk_cedDoc_TDocentes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TDocDep"
    ADD CONSTRAINT "fk_cedDoc_TDocentes" FOREIGN KEY ("cedDoc") REFERENCES public."TDocentes"("cedDoc") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: THorarios fk_cedDoc_TDocentes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."THorarios"
    ADD CONSTRAINT "fk_cedDoc_TDocentes" FOREIGN KEY ("cedDoc") REFERENCES public."TDocentes"("cedDoc") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: THorarios fk_codActAdm_TActiAdmi; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."THorarios"
    ADD CONSTRAINT "fk_codActAdm_TActiAdmi" FOREIGN KEY ("codActAdm") REFERENCES public."TActiAdmi"("codActAdm") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: THorarios fk_codAmb_TAmbientes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."THorarios"
    ADD CONSTRAINT "fk_codAmb_TAmbientes" FOREIGN KEY ("codAmb") REFERENCES public."TAmbientes"("codAmb") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: TDocentes fk_codCatDoc_TCatDoc; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TDocentes"
    ADD CONSTRAINT "fk_codCatDoc_TCatDoc" FOREIGN KEY ("codCatDoc") REFERENCES public."TCatDoc"("codCatDoc") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: TComDoc fk_codCom_TComisiones; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TComDoc"
    ADD CONSTRAINT "fk_codCom_TComisiones" FOREIGN KEY ("codCom") REFERENCES public."TComisiones"("codCom") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: TDocentes fk_codDed_TDedicaciones; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TDocentes"
    ADD CONSTRAINT "fk_codDed_TDedicaciones" FOREIGN KEY ("codDed") REFERENCES public."TDedicaciones"("codDed") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: TDocDep fk_codDep_TDependencias; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TDocDep"
    ADD CONSTRAINT "fk_codDep_TDependencias" FOREIGN KEY ("codDep") REFERENCES public."TDependencias"("codDep") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: TTiempo fk_codDia_TDias; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TTiempo"
    ADD CONSTRAINT "fk_codDia_TDias" FOREIGN KEY ("codDia") REFERENCES public."TDias"("codDia");


--
-- Name: TUnidCurr fk_codEje_TEjes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TUnidCurr"
    ADD CONSTRAINT "fk_codEje_TEjes" FOREIGN KEY ("codEje") REFERENCES public."TEjes"("codEje") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: TTiempo fk_codHor_THoras; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TTiempo"
    ADD CONSTRAINT "fk_codHor_THoras" FOREIGN KEY ("codHor") REFERENCES public."THoras"("codHor");


--
-- Name: TRolPer fk_codPer_TPermisos; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TRolPer"
    ADD CONSTRAINT "fk_codPer_TPermisos" FOREIGN KEY ("codPer") REFERENCES public."TPermisos"("codPer");


--
-- Name: TUnidCurr fk_codPnf_TPnf; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TUnidCurr"
    ADD CONSTRAINT "fk_codPnf_TPnf" FOREIGN KEY ("codPnf") REFERENCES public."TPnf"("codPnf") ON UPDATE SET NULL ON DELETE SET NULL;


--
-- Name: TRolPer fk_codRol_TRoles; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."TRolPer"
    ADD CONSTRAINT "fk_codRol_TRoles" FOREIGN KEY ("codRol") REFERENCES public."TRoles"("codRol");


--
-- Name: THorarios fk_codSec_TSecciones; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."THorarios"
    ADD CONSTRAINT "fk_codSec_TSecciones" FOREIGN KEY ("codSec") REFERENCES public."TSecciones"("codSec") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: THorarios fk_codTie_TTiempo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."THorarios"
    ADD CONSTRAINT "fk_codTie_TTiempo" FOREIGN KEY ("codTie") REFERENCES public."TTiempo"("codTie") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: THorarios fk_codUniCur_TUnidCurr; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."THorarios"
    ADD CONSTRAINT "fk_codUniCur_TUnidCurr" FOREIGN KEY ("codUniCur") REFERENCES public."TUnidCurr"("codUniCur") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

