--
-- PostgreSQL database dump
--

-- Dumped from database version 15.3
-- Dumped by pg_dump version 15.3

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
-- Name: public; Type: SCHEMA; Schema: -; Owner: user
--

-- *not* creating schema, since initdb creates it


ALTER SCHEMA public OWNER TO "user";

--
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: user
--

COMMENT ON SCHEMA public IS '';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: chat; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.chat (
    id_chat integer NOT NULL,
    id_vuz integer,
    name_chat character varying(2500)
);


ALTER TABLE public.chat OWNER TO "user";

--
-- Name: chat_id_chat_seq; Type: SEQUENCE; Schema: public; Owner: user
--

CREATE SEQUENCE public.chat_id_chat_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.chat_id_chat_seq OWNER TO "user";

--
-- Name: chat_id_chat_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user
--

ALTER SEQUENCE public.chat_id_chat_seq OWNED BY public.chat.id_chat;


--
-- Name: collection; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.collection (
    id_collection integer NOT NULL,
    author_collection character varying(255),
    name_collection character varying(255),
    id_vuz integer,
    id_start_panorama integer
);


ALTER TABLE public.collection OWNER TO "user";

--
-- Name: collection_id_collection_seq; Type: SEQUENCE; Schema: public; Owner: user
--

CREATE SEQUENCE public.collection_id_collection_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.collection_id_collection_seq OWNER TO "user";

--
-- Name: collection_id_collection_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user
--

ALTER SEQUENCE public.collection_id_collection_seq OWNED BY public.collection.id_collection;


--
-- Name: department; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.department (
    id_depart integer NOT NULL,
    id_faculty integer,
    name_depart character varying(50) NOT NULL,
    info_depart character varying(2500) NOT NULL,
    photo_depart character(254),
    email_depart character varying(200) NOT NULL,
    phone_depart character varying(15) NOT NULL
);


ALTER TABLE public.department OWNER TO "user";

--
-- Name: department_id_depart_seq; Type: SEQUENCE; Schema: public; Owner: user
--

CREATE SEQUENCE public.department_id_depart_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.department_id_depart_seq OWNER TO "user";

--
-- Name: department_id_depart_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user
--

ALTER SEQUENCE public.department_id_depart_seq OWNED BY public.department.id_depart;


--
-- Name: documents; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.documents (
    id_documents integer NOT NULL,
    id_vuz integer,
    name_documents character varying(200),
    file_document character varying(200)
);


ALTER TABLE public.documents OWNER TO "user";

--
-- Name: documents_id_documents_seq; Type: SEQUENCE; Schema: public; Owner: user
--

CREATE SEQUENCE public.documents_id_documents_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.documents_id_documents_seq OWNER TO "user";

--
-- Name: documents_id_documents_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user
--

ALTER SEQUENCE public.documents_id_documents_seq OWNED BY public.documents.id_documents;


--
-- Name: does; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.does (
    id_chat integer NOT NULL,
    id_user integer NOT NULL
);


ALTER TABLE public.does OWNER TO "user";

--
-- Name: faculty; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.faculty (
    id_faculty integer NOT NULL,
    id_vuz integer,
    name_faculty character varying(20) NOT NULL,
    info_faculty character varying(5000) NOT NULL,
    photo_faculty character(254),
    email_faculty character varying(100) NOT NULL,
    phone_faculty character varying(15) NOT NULL
);


ALTER TABLE public.faculty OWNER TO "user";

--
-- Name: faculty_id_faculty_seq; Type: SEQUENCE; Schema: public; Owner: user
--

CREATE SEQUENCE public.faculty_id_faculty_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.faculty_id_faculty_seq OWNER TO "user";

--
-- Name: faculty_id_faculty_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user
--

ALTER SEQUENCE public.faculty_id_faculty_seq OWNED BY public.faculty.id_faculty;


--
-- Name: feedback; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.feedback (
    id_feedback integer NOT NULL,
    id_user integer,
    id_vuz integer,
    rate_feedback double precision NOT NULL,
    text_feedback character varying(2500) NOT NULL,
    date_feedback date NOT NULL,
    moderated boolean DEFAULT false
);


ALTER TABLE public.feedback OWNER TO "user";

--
-- Name: feedback_id_feedback_seq; Type: SEQUENCE; Schema: public; Owner: user
--

CREATE SEQUENCE public.feedback_id_feedback_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.feedback_id_feedback_seq OWNER TO "user";

--
-- Name: feedback_id_feedback_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user
--

ALTER SEQUENCE public.feedback_id_feedback_seq OWNED BY public.feedback.id_feedback;


--
-- Name: hotspots; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.hotspots (
    id_hotspot integer NOT NULL,
    id_panorama integer,
    angle_yaw numeric NOT NULL,
    angle_pitch numeric NOT NULL,
    signature character varying(20),
    id_next_panorama integer
);


ALTER TABLE public.hotspots OWNER TO "user";

--
-- Name: hotspots_id_hotspot_seq; Type: SEQUENCE; Schema: public; Owner: user
--

CREATE SEQUENCE public.hotspots_id_hotspot_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hotspots_id_hotspot_seq OWNER TO "user";

--
-- Name: hotspots_id_hotspot_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user
--

ALTER SEQUENCE public.hotspots_id_hotspot_seq OWNED BY public.hotspots.id_hotspot;


--
-- Name: message; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.message (
    id_message integer NOT NULL,
    id_chat integer,
    text_message character varying(2500),
    id_user integer,
    date_message timestamp without time zone
);


ALTER TABLE public.message OWNER TO "user";

--
-- Name: message_id_message_seq; Type: SEQUENCE; Schema: public; Owner: user
--

CREATE SEQUENCE public.message_id_message_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.message_id_message_seq OWNER TO "user";

--
-- Name: message_id_message_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user
--

ALTER SEQUENCE public.message_id_message_seq OWNED BY public.message.id_message;


--
-- Name: panorama; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.panorama (
    id_panorama integer NOT NULL,
    photo_panorama character varying(500) NOT NULL,
    name_panorama character varying(50),
    id_collection integer
);


ALTER TABLE public.panorama OWNER TO "user";

--
-- Name: panorama_id_panorama_seq; Type: SEQUENCE; Schema: public; Owner: user
--

CREATE SEQUENCE public.panorama_id_panorama_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.panorama_id_panorama_seq OWNER TO "user";

--
-- Name: panorama_id_panorama_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user
--

ALTER SEQUENCE public.panorama_id_panorama_seq OWNED BY public.panorama.id_panorama;


--
-- Name: professor; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.professor (
    id_professor integer NOT NULL,
    full_name_professor character varying(200) NOT NULL,
    desc_professor character varying(2500) NOT NULL,
    photo_professor character(254),
    id_department integer
);


ALTER TABLE public.professor OWNER TO "user";

--
-- Name: professor_id_professor_seq; Type: SEQUENCE; Schema: public; Owner: user
--

CREATE SEQUENCE public.professor_id_professor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.professor_id_professor_seq OWNER TO "user";

--
-- Name: professor_id_professor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user
--

ALTER SEQUENCE public.professor_id_professor_seq OWNED BY public.professor.id_professor;


--
-- Name: users; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.users (
    id_user integer NOT NULL,
    full_name_user character varying(100) NOT NULL,
    password_user character varying(1000) NOT NULL,
    email_user character varying(70) NOT NULL,
    verified boolean,
    role character varying(20) NOT NULL,
    photo_user character(254),
    id_vuz integer
);


ALTER TABLE public.users OWNER TO "user";

--
-- Name: user_id_user_seq; Type: SEQUENCE; Schema: public; Owner: user
--

CREATE SEQUENCE public.user_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_user_seq OWNER TO "user";

--
-- Name: user_id_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user
--

ALTER SEQUENCE public.user_id_user_seq OWNED BY public.users.id_user;


--
-- Name: vuz; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.vuz (
    id_vuz integer NOT NULL,
    name_vuz character varying(200) NOT NULL,
    info_vuz character varying(2500) NOT NULL,
    site_vuz character varying(2048),
    mail_vuz character varying(100) NOT NULL,
    phone_vuz character varying(30) NOT NULL,
    adress_vuz character varying(500) NOT NULL,
    rating_vuz double precision,
    photo_vuz character varying(255)
);


ALTER TABLE public.vuz OWNER TO "user";

--
-- Name: vuz_id_vuz_seq; Type: SEQUENCE; Schema: public; Owner: user
--

CREATE SEQUENCE public.vuz_id_vuz_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vuz_id_vuz_seq OWNER TO "user";

--
-- Name: vuz_id_vuz_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user
--

ALTER SEQUENCE public.vuz_id_vuz_seq OWNED BY public.vuz.id_vuz;


--
-- Name: chat id_chat; Type: DEFAULT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.chat ALTER COLUMN id_chat SET DEFAULT nextval('public.chat_id_chat_seq'::regclass);


--
-- Name: collection id_collection; Type: DEFAULT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.collection ALTER COLUMN id_collection SET DEFAULT nextval('public.collection_id_collection_seq'::regclass);


--
-- Name: department id_depart; Type: DEFAULT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.department ALTER COLUMN id_depart SET DEFAULT nextval('public.department_id_depart_seq'::regclass);


--
-- Name: documents id_documents; Type: DEFAULT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.documents ALTER COLUMN id_documents SET DEFAULT nextval('public.documents_id_documents_seq'::regclass);


--
-- Name: faculty id_faculty; Type: DEFAULT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.faculty ALTER COLUMN id_faculty SET DEFAULT nextval('public.faculty_id_faculty_seq'::regclass);


--
-- Name: feedback id_feedback; Type: DEFAULT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.feedback ALTER COLUMN id_feedback SET DEFAULT nextval('public.feedback_id_feedback_seq'::regclass);


--
-- Name: hotspots id_hotspot; Type: DEFAULT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.hotspots ALTER COLUMN id_hotspot SET DEFAULT nextval('public.hotspots_id_hotspot_seq'::regclass);


--
-- Name: message id_message; Type: DEFAULT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.message ALTER COLUMN id_message SET DEFAULT nextval('public.message_id_message_seq'::regclass);


--
-- Name: panorama id_panorama; Type: DEFAULT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.panorama ALTER COLUMN id_panorama SET DEFAULT nextval('public.panorama_id_panorama_seq'::regclass);


--
-- Name: professor id_professor; Type: DEFAULT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.professor ALTER COLUMN id_professor SET DEFAULT nextval('public.professor_id_professor_seq'::regclass);


--
-- Name: users id_user; Type: DEFAULT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.users ALTER COLUMN id_user SET DEFAULT nextval('public.user_id_user_seq'::regclass);


--
-- Name: vuz id_vuz; Type: DEFAULT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.vuz ALTER COLUMN id_vuz SET DEFAULT nextval('public.vuz_id_vuz_seq'::regclass);


--
-- Data for Name: chat; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.chat (id_chat, id_vuz, name_chat) FROM stdin;
7	2	\N
6	6	\N
\.


--
-- Data for Name: collection; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.collection (id_collection, author_collection, name_collection, id_vuz, id_start_panorama) FROM stdin;
1	Дмитрий Эрхович	Столовая	2	1
2	Максим Болдыревич	Общежитие	2	2
\.


--
-- Data for Name: department; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.department (id_depart, id_faculty, name_depart, info_depart, photo_depart, email_depart, phone_depart) FROM stdin;
\.


--
-- Data for Name: documents; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.documents (id_documents, id_vuz, name_documents, file_document) FROM stdin;
2	1	Положение	asas
1	2	Положение	/photo.jpg
3	1	Положение	./6624c61a770b0_Болдырев, АС-21-1, Контэнт - менеджер_compressed.pdf
4	1	Положение	./6624c8a267274_Болдырев, АС-21-1, Контэнт - менеджер_compressed.pdf
5	1	Положение	./6624de1723ed2_Болдырев, АС-21-1, Контэнт - менеджер_compressed.pdf
\.


--
-- Data for Name: does; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.does (id_chat, id_user) FROM stdin;
6	9
7	9
7	13
6	15
\.


--
-- Data for Name: faculty; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.faculty (id_faculty, id_vuz, name_faculty, info_faculty, photo_faculty, email_faculty, phone_faculty) FROM stdin;
\.


--
-- Data for Name: feedback; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.feedback (id_feedback, id_user, id_vuz, rate_feedback, text_feedback, date_feedback, moderated) FROM stdin;
3	9	6	1	Все плохо	2023-11-12	f
1	6	6	4.8	Все отлично	2023-12-12	t
6	6	6	1	Могло быть и лучше	2024-04-21	t
4	13	6	3	Все отлично	2024-04-20	f
5	9	6	3	Неплохо	2024-04-20	t
11	15	6	3	Ничего такой вуз!	2024-04-21	f
7	6	6	4	Хороший политех	2024-04-21	t
12	6	6	5	тестовое сообщение	2024-04-21	f
13	15	6	5	тест тест	2024-04-21	f
14	15	6	2	фывфывфы	2024-04-21	f
15	15	6	2	asdasdasdsa	2024-04-21	f
16	15	6	2	Не очень	2024-04-21	f
17	26	6	4	Неплохо	2024-04-21	f
18	28	6	5	Отличный ВУЗ!!!!	2024-04-21	f
\.


--
-- Data for Name: hotspots; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.hotspots (id_hotspot, id_panorama, angle_yaw, angle_pitch, signature, id_next_panorama) FROM stdin;
1	1	50.5	60.3	Столовая	3
\.


--
-- Data for Name: message; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.message (id_message, id_chat, text_message, id_user, date_message) FROM stdin;
17	6	Я Максим	9	2024-04-21 11:40:11
18	7	Общежитие или снимать квартиру?	9	2024-04-21 11:40:27
19	7	Лучше общага!	13	2024-04-21 11:40:33
16	6	Привет, Я Вова. А ты?	15	2024-04-21 11:40:03
\.


--
-- Data for Name: panorama; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.panorama (id_panorama, photo_panorama, name_panorama, id_collection) FROM stdin;
5	assets/photo_6624c27af17e4_pngwing.com (2).png	stolovaya	1
3	assets/photo_6624c27af17e4_pngwing.com (2).png	stolovaya	1
4	assets/photo_6624c27af17e4_pngwing.com (2).png	stolovaya	1
1	assets/photo_6624c27af17e4_pngwing.com (2).png	\N	2
2	assets/photo_6624c27af17e4_pngwing.com (2).png	stolovaya	2
6	assets/photo_6624c32c184a4_pngwing.com (2).png	stolovaya	2
7	assets/photo_6624c34d982b8_Untitled (4).jpg	stolovaya	2
8	assets/photo_6624c4313c2f0_Untitled (4).jpg	stolovaya	2
9	assets/photo_6624c4b916455_Untitled (4).jpg	stolovaya	1
10	./photo_6624c4e3dedef_Untitled (4).jpg	stolovaya	1
11	./photo_6624c6ecafe7f_Untitled (4).jpg	stolovaya	1
12	./photo_6624dddcaae8d_Untitled (4).jpg	stolovaya	1
\.


--
-- Data for Name: professor; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.professor (id_professor, full_name_professor, desc_professor, photo_professor, id_department) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.users (id_user, full_name_user, password_user, email_user, verified, role, photo_user, id_vuz) FROM stdin;
13	Дьяков Дмитрий Владимирович	2649f5d6935e520287c37da599ba031b9b19244e98718121de58f8739feacfbd	maxrox190114@gmail.com21	\N	student	\N	2
15	Кретов Игорь Олегович	8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92	aboba@mail.ru	\N	student	\N	\N
16	Эрхов Дмитрий Викторович	8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92	dima@mail.ru	\N	student	\N	\N
6	Болдырев Максим Романович	8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92	asd@bk.ru	\N	student	\N	6
9	Дьяков Дмитрий Владимирович	2649f5d6935e520287c37da599ba031b9b19244e98718121de58f8739feacfbd	maxrox1904@gmail.com	\N	student	\N	6
14	Кретов Игорь Олегович	8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92	abobs@mail.ru	\N	student	\N	6
25	Кретов Игорь Олегович 	8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92	zxc@mail.ru	\N	abiturient	\N	\N
26	Ефремов Владимир Александрович	8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92	vladimir@mail.ru	\N	student	\N	\N
27	Агеев Илья Андреевич	8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92	ilya@mail.ru	\N	abiturient	\N	\N
28	Перфильев Артем Петрович	8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92	artem@mail.ru	\N	student	\N	\N
\.


--
-- Data for Name: vuz; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.vuz (id_vuz, name_vuz, info_vuz, site_vuz, mail_vuz, phone_vuz, adress_vuz, rating_vuz, photo_vuz) FROM stdin;
5	Томский государственный университет (ТГУ)	Томский государственный университет — ведущий университет в Сибири и Дальнем Востоке России.	https://www.tsu.ru/	info@tsu.ru	+7 (3822) 606-000	Томск, пр. Ленина, д. 36	4.4	logo-tgu.png
4	Высшая школа экономики (НИУ ВШЭ)	Национальный исследовательский университет «Высшая школа экономики» — один из крупнейших университетов в России, который специализируется на экономических и социальных науках.	https://www.hse.ru/	info@hse.ru	+7 (495) 531-00-00	Москва, Мясницкая ул., д. 20	4.6	logo-hse.png
3	Новосибирский государственный университет (НГУ)	Новосибирский государственный университет — крупнейший и старейший университет в Сибири, один из крупнейших университетов в России.	https://www.nsu.ru/	info@nsu.ru	+7 (383) 363-40-07	Новосибирск, пр. акад. Коптюга, д. 2, корп. 1	4.5	logo-nsu.png
2	Санкт-Петербургский государственный университет (СПбГУ)	Санкт-Петербургский государственный университет — один из крупнейших и старейших университетов России.	https://spbu.ru/	info@spbu.ru	+7 (812) 328-32-91	Санкт-Петербург, Университетская наб., д. 7/9	4.7	logo-spbu.png
1	Московский государственный университет (МГУ)	Московский государственный университет имени М. В. Ломоносова — российский университет. Одно из старейших и крупнейших высших учебных заведений России.	https://www.msu.ru/	info@msu.ru	+7 (495) 939-10-00	Москва, Ленинские горы, д. 1, стр. 1	4.8	logo-msu.png
6	Липецкий Государственный технический университет (ЛГТУ)	Основан в 1956 году как вечерний факультет Тульского механического института приказом Министерства высшего образования СССР от 1 ноября 1956 года № 869. Тогда это был первый и единственный технический вуз в Липецкой области. 	https://www.lbstu.ru/	info@lbstu.ru	+7 (812) 321-90-00	Липецк, ул. Московская д. 30	4.3	logo-lgtu.png
\.


--
-- Name: chat_id_chat_seq; Type: SEQUENCE SET; Schema: public; Owner: user
--

SELECT pg_catalog.setval('public.chat_id_chat_seq', 7, true);


--
-- Name: collection_id_collection_seq; Type: SEQUENCE SET; Schema: public; Owner: user
--

SELECT pg_catalog.setval('public.collection_id_collection_seq', 2, true);


--
-- Name: department_id_depart_seq; Type: SEQUENCE SET; Schema: public; Owner: user
--

SELECT pg_catalog.setval('public.department_id_depart_seq', 1, false);


--
-- Name: documents_id_documents_seq; Type: SEQUENCE SET; Schema: public; Owner: user
--

SELECT pg_catalog.setval('public.documents_id_documents_seq', 5, true);


--
-- Name: faculty_id_faculty_seq; Type: SEQUENCE SET; Schema: public; Owner: user
--

SELECT pg_catalog.setval('public.faculty_id_faculty_seq', 1, false);


--
-- Name: feedback_id_feedback_seq; Type: SEQUENCE SET; Schema: public; Owner: user
--

SELECT pg_catalog.setval('public.feedback_id_feedback_seq', 18, true);


--
-- Name: hotspots_id_hotspot_seq; Type: SEQUENCE SET; Schema: public; Owner: user
--

SELECT pg_catalog.setval('public.hotspots_id_hotspot_seq', 1, true);


--
-- Name: message_id_message_seq; Type: SEQUENCE SET; Schema: public; Owner: user
--

SELECT pg_catalog.setval('public.message_id_message_seq', 19, true);


--
-- Name: panorama_id_panorama_seq; Type: SEQUENCE SET; Schema: public; Owner: user
--

SELECT pg_catalog.setval('public.panorama_id_panorama_seq', 12, true);


--
-- Name: professor_id_professor_seq; Type: SEQUENCE SET; Schema: public; Owner: user
--

SELECT pg_catalog.setval('public.professor_id_professor_seq', 3, true);


--
-- Name: user_id_user_seq; Type: SEQUENCE SET; Schema: public; Owner: user
--

SELECT pg_catalog.setval('public.user_id_user_seq', 28, true);


--
-- Name: vuz_id_vuz_seq; Type: SEQUENCE SET; Schema: public; Owner: user
--

SELECT pg_catalog.setval('public.vuz_id_vuz_seq', 7, true);


--
-- Name: collection collection_pkey; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.collection
    ADD CONSTRAINT collection_pkey PRIMARY KEY (id_collection);


--
-- Name: chat pk_chat; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.chat
    ADD CONSTRAINT pk_chat PRIMARY KEY (id_chat);


--
-- Name: department pk_department; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.department
    ADD CONSTRAINT pk_department PRIMARY KEY (id_depart);


--
-- Name: documents pk_documents; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.documents
    ADD CONSTRAINT pk_documents PRIMARY KEY (id_documents);


--
-- Name: does pk_does; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.does
    ADD CONSTRAINT pk_does PRIMARY KEY (id_chat, id_user);


--
-- Name: faculty pk_faculty; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.faculty
    ADD CONSTRAINT pk_faculty PRIMARY KEY (id_faculty);


--
-- Name: feedback pk_feedback; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.feedback
    ADD CONSTRAINT pk_feedback PRIMARY KEY (id_feedback);


--
-- Name: hotspots pk_hotspots; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.hotspots
    ADD CONSTRAINT pk_hotspots PRIMARY KEY (id_hotspot);


--
-- Name: message pk_message; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.message
    ADD CONSTRAINT pk_message PRIMARY KEY (id_message);


--
-- Name: panorama pk_panorama; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.panorama
    ADD CONSTRAINT pk_panorama PRIMARY KEY (id_panorama);


--
-- Name: professor pk_professor; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.professor
    ADD CONSTRAINT pk_professor PRIMARY KEY (id_professor);


--
-- Name: users pk_user; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT pk_user PRIMARY KEY (id_user);


--
-- Name: vuz pk_vuz; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.vuz
    ADD CONSTRAINT pk_vuz PRIMARY KEY (id_vuz);


--
-- Name: also_include_fk; Type: INDEX; Schema: public; Owner: user
--

CREATE INDEX also_include_fk ON public.message USING btree (id_chat);


--
-- Name: assumes_fk; Type: INDEX; Schema: public; Owner: user
--

CREATE INDEX assumes_fk ON public.hotspots USING btree (id_panorama);


--
-- Name: chat_pk; Type: INDEX; Schema: public; Owner: user
--

CREATE UNIQUE INDEX chat_pk ON public.chat USING btree (id_chat);


--
-- Name: countain_fk; Type: INDEX; Schema: public; Owner: user
--

CREATE INDEX countain_fk ON public.department USING btree (id_faculty);


--
-- Name: department_pk; Type: INDEX; Schema: public; Owner: user
--

CREATE UNIQUE INDEX department_pk ON public.department USING btree (id_depart);


--
-- Name: documents_pk; Type: INDEX; Schema: public; Owner: user
--

CREATE UNIQUE INDEX documents_pk ON public.documents USING btree (id_documents);


--
-- Name: does2_fk; Type: INDEX; Schema: public; Owner: user
--

CREATE INDEX does2_fk ON public.does USING btree (id_user);


--
-- Name: does_fk; Type: INDEX; Schema: public; Owner: user
--

CREATE INDEX does_fk ON public.does USING btree (id_chat);


--
-- Name: does_pk; Type: INDEX; Schema: public; Owner: user
--

CREATE UNIQUE INDEX does_pk ON public.does USING btree (id_chat, id_user);


--
-- Name: faculty_pk; Type: INDEX; Schema: public; Owner: user
--

CREATE UNIQUE INDEX faculty_pk ON public.faculty USING btree (id_faculty);


--
-- Name: feedback_pk; Type: INDEX; Schema: public; Owner: user
--

CREATE UNIQUE INDEX feedback_pk ON public.feedback USING btree (id_feedback);


--
-- Name: has_fk; Type: INDEX; Schema: public; Owner: user
--

CREATE INDEX has_fk ON public.feedback USING btree (id_vuz);


--
-- Name: hotspots_pk; Type: INDEX; Schema: public; Owner: user
--

CREATE UNIQUE INDEX hotspots_pk ON public.hotspots USING btree (id_hotspot);


--
-- Name: include_fk; Type: INDEX; Schema: public; Owner: user
--

CREATE INDEX include_fk ON public.faculty USING btree (id_vuz);


--
-- Name: leaves2_fk; Type: INDEX; Schema: public; Owner: user
--

CREATE INDEX leaves2_fk ON public.feedback USING btree (id_user);


--
-- Name: message_pk; Type: INDEX; Schema: public; Owner: user
--

CREATE UNIQUE INDEX message_pk ON public.message USING btree (id_message);


--
-- Name: panorama_pk; Type: INDEX; Schema: public; Owner: user
--

CREATE UNIQUE INDEX panorama_pk ON public.panorama USING btree (id_panorama);


--
-- Name: professor_pk; Type: INDEX; Schema: public; Owner: user
--

CREATE UNIQUE INDEX professor_pk ON public.professor USING btree (id_professor);


--
-- Name: provides_fk; Type: INDEX; Schema: public; Owner: user
--

CREATE INDEX provides_fk ON public.documents USING btree (id_vuz);


--
-- Name: refer_fk; Type: INDEX; Schema: public; Owner: user
--

CREATE INDEX refer_fk ON public.chat USING btree (id_vuz);


--
-- Name: user_pk; Type: INDEX; Schema: public; Owner: user
--

CREATE UNIQUE INDEX user_pk ON public.users USING btree (id_user);


--
-- Name: users_pk; Type: INDEX; Schema: public; Owner: user
--

CREATE UNIQUE INDEX users_pk ON public.users USING btree (id_user);


--
-- Name: vuz_pk; Type: INDEX; Schema: public; Owner: user
--

CREATE UNIQUE INDEX vuz_pk ON public.vuz USING btree (id_vuz);


--
-- Name: chat fk_chat_refer_vuz; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.chat
    ADD CONSTRAINT fk_chat_refer_vuz FOREIGN KEY (id_vuz) REFERENCES public.vuz(id_vuz) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: collection fk_collection_vuz; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.collection
    ADD CONSTRAINT fk_collection_vuz FOREIGN KEY (id_vuz) REFERENCES public.vuz(id_vuz);


--
-- Name: department fk_departme_countain_faculty; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.department
    ADD CONSTRAINT fk_departme_countain_faculty FOREIGN KEY (id_faculty) REFERENCES public.faculty(id_faculty) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: documents fk_document_provides_vuz; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.documents
    ADD CONSTRAINT fk_document_provides_vuz FOREIGN KEY (id_vuz) REFERENCES public.vuz(id_vuz) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: does fk_does_does2_user; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.does
    ADD CONSTRAINT fk_does_does2_user FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: does fk_does_does2_users; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.does
    ADD CONSTRAINT fk_does_does2_users FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: does fk_does_does_chat; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.does
    ADD CONSTRAINT fk_does_does_chat FOREIGN KEY (id_chat) REFERENCES public.chat(id_chat) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: faculty fk_faculty_include_vuz; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.faculty
    ADD CONSTRAINT fk_faculty_include_vuz FOREIGN KEY (id_vuz) REFERENCES public.vuz(id_vuz) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: feedback fk_feedback_has_vuz; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.feedback
    ADD CONSTRAINT fk_feedback_has_vuz FOREIGN KEY (id_vuz) REFERENCES public.vuz(id_vuz) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: feedback fk_feedback_leaves2_user; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.feedback
    ADD CONSTRAINT fk_feedback_leaves2_user FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: feedback fk_feedback_leaves2_users; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.feedback
    ADD CONSTRAINT fk_feedback_leaves2_users FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: hotspots fk_hotspots_assumes_panorama; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.hotspots
    ADD CONSTRAINT fk_hotspots_assumes_panorama FOREIGN KEY (id_panorama) REFERENCES public.panorama(id_panorama) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: message fk_id_user; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.message
    ADD CONSTRAINT fk_id_user FOREIGN KEY (id_user) REFERENCES public.users(id_user);


--
-- Name: users fk_id_vuz; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_id_vuz FOREIGN KEY (id_vuz) REFERENCES public.vuz(id_vuz);


--
-- Name: message fk_message_also_incl_chat; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.message
    ADD CONSTRAINT fk_message_also_incl_chat FOREIGN KEY (id_chat) REFERENCES public.chat(id_chat) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: panorama fk_panorama_collection; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.panorama
    ADD CONSTRAINT fk_panorama_collection FOREIGN KEY (id_collection) REFERENCES public.collection(id_collection);


--
-- Name: professor fk_professor_department; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.professor
    ADD CONSTRAINT fk_professor_department FOREIGN KEY (id_department) REFERENCES public.department(id_depart);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: user
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;


--
-- PostgreSQL database dump complete
--

