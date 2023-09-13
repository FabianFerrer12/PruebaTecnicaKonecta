--
-- PostgreSQL database dump
--

-- Dumped from database version 15.4
-- Dumped by pg_dump version 15.4

-- Started on 2023-09-13 00:24:53

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 215 (class 1259 OID 16405)
-- Name: productos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.productos (
    id integer NOT NULL,
    nombre character varying(50) NOT NULL,
    precio integer NOT NULL,
    peso integer NOT NULL,
    categoria character varying(50) NOT NULL,
    stock integer NOT NULL,
    fecha_creacion date NOT NULL
);


ALTER TABLE public.productos OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 16404)
-- Name: productos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.productos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.productos_id_seq OWNER TO postgres;

--
-- TOC entry 3338 (class 0 OID 0)
-- Dependencies: 214
-- Name: productos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.productos_id_seq OWNED BY public.productos.id;


--
-- TOC entry 217 (class 1259 OID 16414)
-- Name: ventas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ventas (
    id_venta integer NOT NULL,
    id_producto integer NOT NULL,
    cantidad_vendida integer NOT NULL
);


ALTER TABLE public.ventas OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 16413)
-- Name: ventas_id_venta_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ventas_id_venta_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ventas_id_venta_seq OWNER TO postgres;

--
-- TOC entry 3339 (class 0 OID 0)
-- Dependencies: 216
-- Name: ventas_id_venta_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ventas_id_venta_seq OWNED BY public.ventas.id_venta;


--
-- TOC entry 3178 (class 2604 OID 16408)
-- Name: productos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.productos ALTER COLUMN id SET DEFAULT nextval('public.productos_id_seq'::regclass);


--
-- TOC entry 3179 (class 2604 OID 16417)
-- Name: ventas id_venta; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ventas ALTER COLUMN id_venta SET DEFAULT nextval('public.ventas_id_venta_seq'::regclass);


--
-- TOC entry 3330 (class 0 OID 16405)
-- Dependencies: 215
-- Data for Name: productos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.productos (id, nombre, precio, peso, categoria, stock, fecha_creacion) FROM stdin;
11	PAN	3000	80	PANADERIA	10	2023-09-13
9	PAPITAS DE LIMON	2200	45	MEKATOS	20	2023-09-13
13	EMPANADA	1700	70	COMIDAS RAPIDAS	0	2023-09-13
8	GALLETAS	1500	20	MEKATOS	5	2023-09-13
12	BUÑUELOS	1000	40	COMIDAS RAPIDAS	2	2023-09-13
10	CAFE PERICO 	700	7	CAFE	2	2023-09-13
\.


--
-- TOC entry 3332 (class 0 OID 16414)
-- Dependencies: 217
-- Data for Name: ventas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ventas (id_venta, id_producto, cantidad_vendida) FROM stdin;
12	13	1
13	8	15
14	10	12
15	12	13
16	10	16
\.


--
-- TOC entry 3340 (class 0 OID 0)
-- Dependencies: 214
-- Name: productos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.productos_id_seq', 13, true);


--
-- TOC entry 3341 (class 0 OID 0)
-- Dependencies: 216
-- Name: ventas_id_venta_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ventas_id_venta_seq', 16, true);


--
-- TOC entry 3181 (class 2606 OID 16412)
-- Name: productos productos_nombre_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_nombre_key UNIQUE (nombre);


--
-- TOC entry 3183 (class 2606 OID 16410)
-- Name: productos productos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_pkey PRIMARY KEY (id);


--
-- TOC entry 3185 (class 2606 OID 16419)
-- Name: ventas ventas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ventas
    ADD CONSTRAINT ventas_pkey PRIMARY KEY (id_venta);


--
-- TOC entry 3186 (class 2606 OID 16420)
-- Name: ventas id_producto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ventas
    ADD CONSTRAINT id_producto FOREIGN KEY (id_producto) REFERENCES public.productos(id);


-- Completed on 2023-09-13 00:24:53

--
-- PostgreSQL database dump complete
--

