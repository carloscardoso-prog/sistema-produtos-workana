--
-- PostgreSQL database dump
--

-- Dumped from database version 16.1
-- Dumped by pg_dump version 16.1

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
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: produto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produto (
    id integer NOT NULL,
    produto_nome character varying(100),
    produto_tipo_id integer
);


ALTER TABLE public.produto OWNER TO postgres;

--
-- Name: produto_tipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produto_tipo (
    id integer NOT NULL,
    tipo_nome character varying(100),
    produto_valor numeric(10,2),
    produto_imposto numeric(10,2)
);


ALTER TABLE public.produto_tipo OWNER TO postgres;

--
-- Name: produto_tipo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produto_tipo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.produto_tipo_id_seq OWNER TO postgres;

--
-- Name: produto_tipo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produto_tipo_id_seq OWNED BY public.produto_tipo.id;


--
-- Name: produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produtos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.produtos_id_seq OWNER TO postgres;

--
-- Name: produtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produtos_id_seq OWNED BY public.produto.id;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id integer NOT NULL,
    usuario character varying(100),
    senha character varying(255)
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuario_id_seq OWNER TO postgres;

--
-- Name: usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;


--
-- Name: venda; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.venda (
    id integer NOT NULL,
    cliente_nome character varying(100),
    venda_data date,
    usuario_id integer
);


ALTER TABLE public.venda OWNER TO postgres;

--
-- Name: venda_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.venda_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.venda_id_seq OWNER TO postgres;

--
-- Name: venda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.venda_id_seq OWNED BY public.venda.id;


--
-- Name: venda_produto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.venda_produto (
    id integer NOT NULL,
    produto_id integer,
    venda_id integer,
    quantidade integer
);


ALTER TABLE public.venda_produto OWNER TO postgres;

--
-- Name: venda_produto_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.venda_produto_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.venda_produto_id_seq OWNER TO postgres;

--
-- Name: venda_produto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.venda_produto_id_seq OWNED BY public.venda_produto.id;


--
-- Name: produto id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto ALTER COLUMN id SET DEFAULT nextval('public.produtos_id_seq'::regclass);


--
-- Name: produto_tipo id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto_tipo ALTER COLUMN id SET DEFAULT nextval('public.produto_tipo_id_seq'::regclass);


--
-- Name: usuario id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);


--
-- Name: venda id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda ALTER COLUMN id SET DEFAULT nextval('public.venda_id_seq'::regclass);


--
-- Name: venda_produto id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda_produto ALTER COLUMN id SET DEFAULT nextval('public.venda_produto_id_seq'::regclass);

--
-- Name: produto_tipo produto_tipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto_tipo
    ADD CONSTRAINT produto_tipo_pkey PRIMARY KEY (id);


--
-- Name: produto produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (id);


--
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);


--
-- Name: venda venda_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda
    ADD CONSTRAINT venda_pkey PRIMARY KEY (id);


--
-- Name: venda_produto venda_produto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda_produto
    ADD CONSTRAINT venda_produto_pkey PRIMARY KEY (id);


--
-- Name: produto produtos_produto_tipo_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto
    ADD CONSTRAINT produtos_produto_tipo_id_fkey FOREIGN KEY (produto_tipo_id) REFERENCES public.produto_tipo(id);


--
-- Name: venda_produto venda_produto_produto_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda_produto
    ADD CONSTRAINT venda_produto_produto_id_fkey FOREIGN KEY (produto_id) REFERENCES public.produto(id);


--
-- Name: venda_produto venda_produto_venda_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda_produto
    ADD CONSTRAINT venda_produto_venda_id_fkey FOREIGN KEY (venda_id) REFERENCES public.venda(id);


--
-- Name: venda venda_usuario_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda
    ADD CONSTRAINT venda_usuario_id_fkey FOREIGN KEY (usuario_id) REFERENCES public.usuario(id);


--
-- PostgreSQL database dump complete
--

