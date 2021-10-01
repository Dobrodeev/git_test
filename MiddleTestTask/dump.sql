CREATE TABLE t1
(
    id_region INTEGER,
    asin      TEXT,
    price     NUMERIC(20, 6)
);
CREATE TABLE t2
(
    asin  TEXT,
    title TEXT
);

INSERT INTO t1
VALUES (1, 'B007', 11.40),
       (2, 'B007', 11.50),
       (2, 'B008', 13.01);
INSERT INTO t2
VALUES ('B007', 'a11'),
       ('B008', 'a22');