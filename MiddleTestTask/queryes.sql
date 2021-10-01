-- вывести одним sql-запросом id_region, title, price
SELECT t1.id_region, t2.title, t1.price
FROM t1
         JOIN t2 ON t1.asin = t2.asin
-- вывести одним sql-запросом title, для которого существуют более одной цены
