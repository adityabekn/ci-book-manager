
BEGIN;

-----------------------------------------------------------------------
-- book
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "book" CASCADE;

CREATE TABLE "book"
(
    "id" serial NOT NULL,
    "title" VARCHAR(255) NOT NULL,
    "isbn" VARCHAR(24) NOT NULL,
    "publisher_id" INTEGER NOT NULL,
    "author_id" INTEGER NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- author
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "author" CASCADE;

CREATE TABLE "author"
(
    "id" serial NOT NULL,
    "first_name" VARCHAR(128) NOT NULL,
    "last_name" VARCHAR(128) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- publisher
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "publisher" CASCADE;

CREATE TABLE "publisher"
(
    "id" serial NOT NULL,
    "name" VARCHAR(128) NOT NULL,
    PRIMARY KEY ("id")
);

ALTER TABLE "book" ADD CONSTRAINT "book_fk_35872e"
    FOREIGN KEY ("publisher_id")
    REFERENCES "publisher" ("id");

ALTER TABLE "book" ADD CONSTRAINT "book_fk_ea464c"
    FOREIGN KEY ("author_id")
    REFERENCES "author" ("id");

COMMIT;
