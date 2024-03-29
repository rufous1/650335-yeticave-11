USE yeticave;

INSERT INTO categories (
  title, character_code
)
VALUES (
  'Доски и лыжи', 'boards'
),
(
  'Крепления', 'attachment'
),
(
  'Ботинки', 'boots'
),
(
  'Одежда', 'clothing'
),
(
  'Инструменты', 'tools'
),
(
  'Разное', 'other'
);

INSERT INTO users (
  date_add, name, email, password
)
VALUES (
  '2019-10-29 14:12', 'Иван', 'ivan@gmail.com', 'ivan1234'
),
(
  '2019-11-01 17:00', 'Константин', 'const@mail.ru', 'const1234'
),
(
  '2019-11-02 11:37','Виктория', 'vika@yandex.ru', 'vika1234'
);

INSERT INTO lots (
  date_add, title, description, starting_price, date_end, step, user_id, winner_id, category_id
)
VALUES (
  '2019-10-29 15:32', '2014 Rossignol District Snowboard', 'Сноуборд без трещин, расслоений, вздутий. Канты целы, без ржавчины. Имеются царапины на скользяке, небольшие сколы верхнего рисунка на носу.', '10999', '2019-11-23', '150', '1', NULL, '1'
),
(
  '2019-10-30 16:12', 'DC Ply Mens 2016/2017 Snowboard', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.', '159999', '2019-11-23', '200', '1', NULL, '1'
),
(
  '2019-11-05 12:32', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Крепления в отличном состоянии. Полностью исправны (не ломались, не ремонтировались).', '8000', '2019-11-15', '100', '2', NULL, '2'
),
(
  '2019-11-05 16:15', 'Ботинки для сноуборда DC Mutiny Charocal', 'Ботинки для сноуборда. Размер 36. В хорошем состоянии. Приобретены в Спортмастере в январе 2019 г.', '10999', '2019-11-22', '100', '3', NULL, '3'
),
(
  '2019-11-05 16:40', 'Куртка для сноуборда DC Mutiny Charocal', 'Куртка DC Mutiny Charocal женская, 5000 мм мембрана. Практически не носила, так как не угадала с размером. По спинке 64 см без учета воротника. Рукав - 62, обхват груди 98-100. В ПОДАРОК отдам перчатки burton.', '7500', '2019-11-22', '100', '3', NULL, '4'
),
(
  '2019-11-07 09:13', 'Маска Oakley Canopy', 'В отличном состоянии. Вместе с маской отдаю дополнительную линзу и чехол.', '5400', '2019-11-25', '50', '2', NULL, '6'
);

INSERT INTO bets (
  date_add, bet, user_id, lot_id
)
VALUES (
  '2019-11-04 13:24', '11199', '2', '1'
),
(
  '2019-11-07 19:10', '5650', '1', '6'
);

INSERT INTO user_contacts (
  user_id, city, address, phone
)
VALUES (
  '1', 'Москва', 'м. Калужская ул.Обручева, 27к2', '89635267435'
),
(
  '2', 'Москва', 'м. Коммунарка', '89992107892'
),
(
  '3', 'Краснодар', '89962780900'
);

INSERT INTO lot_images (
  lot_id, image
)
VALUES (
  '1', 'img/lot-1.jpg'
),
(
  '2', 'img/lot-2.jpg'
),
(
  '3', 'img/lot-3.jpg'
),
(
  '4', 'img/lot-4.jpg'
),
(
  '5', 'img/lot-5.jpg'
),
(
  '6', 'img/lot-6.jpg'
);

--получить все категории
SELECT * FROM categories;

--получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, текущую цену, название категории
SELECT
  l.title,
  l.starting_price,
  li.image,
  MAX(b.bet) AS current_price,
  c.title AS category
FROM lots AS l
  LEFT JOIN categories AS c
    ON l.category_id = c.id
  LEFT JOIN lot_images AS li
    ON l.id = li.lot_id
  LEFT JOIN bets AS b
    ON l.id = b.lot_id
WHERE l.date_end > NOW()
GROUP BY l.id, li.image
ORDER BY l.date_add DESC;

--показать лот по его id. Получите также название категории, к которой принадлежит лот
SELECT
  l.*,
  c.title,
  li.image
FROM
  lots AS l,
  categories AS c,
  lot_images AS li
WHERE l.id = 2
AND l.category_id = c.id
AND l.id = li.lot_id;

--обновить название лота по его идентификатору
UPDATE lots
SET
  title = 'DC Ply Mens Snowboard'
WHERE id = 2;

--получить список ставок для лота по его идентификатору с сортировкой по дате
SELECT * FROM bets
WHERE bets.lot_id = 1
ORDER BY date_add;
