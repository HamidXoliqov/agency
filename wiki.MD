1. Unzip files
2. Edit file /config/db.php
3. in cmd  run `composer install`
4. run command `yii migrate --migrationPath=@yii/rbac/migrations/`
5. run command `yii migrate`
6. user info `username  = admin, password = 123456` it's for test you can change it.
7. sql query `CREATE TABLE public.contragent_region
              (
                  id serial NOT NULL,
                  shortname character varying(60) COLLATE pg_catalog."default",
                  fullname character varying(60) COLLATE pg_catalog."default",
                  ordernumber integer,
                  countryid integer,
                  CONSTRAINT info_contragent_region_pkey PRIMARY KEY (id)
              );`
              `CREATE TABLE public.contragent_district
              (
                  id serial NOT NULL,
                  contragent_region_id integer NOT NULL,
                  stateid integer,
                  dateofmodified timestamp without time zone,
                  shortname character varying(60) COLLATE pg_catalog."default",
                  fullname character varying(60) COLLATE pg_catalog."default",
                  ordernumber integer,
                  CONSTRAINT info_region_pkey PRIMARY KEY (id),
                  CONSTRAINT foreign_key_oblast FOREIGN KEY (contragent_region_id)
                      REFERENCES public.contragent_region (id) MATCH SIMPLE
                      ON UPDATE NO ACTION
                      ON DELETE NO ACTION
              );`