<?php
/**
 * 1. Я главный редактор‚ у меня есть список новостей.
 * Мне нужно хранить заголовок новости и ее авторов.
 * Предложите мне структуру таблиц.
 * Количество данных: новости ~1 000 000 авторы ~3 000 среднее количество соавторов новостей ~1.8
 * СУБД PostgreSQL
 * Все запросы должны работать быстрее секунды
 */

/**
 * Таблица со статьями
 * article
 * id | title | desc | ...
 *
 * Таблица с авторами
 * author
 * id | first_name | last_name | ...
 *
 * Таблица связей, указывающая связь между автором и статьёй.
 * Можно сделать PK на article_id + author_id, но можно и добавить колонку id,
 * если вдруг придется указать тип связи, например: type=author|moderator|editor|coauthor|etc
 * article_has_author
 * id article_id | author_id | ...
 */

/**
 * 2. Вытащите список новостей‚ которые написаны 3-мя и более соавторами.
 * То есть получить отчет «новость — количество соавторов» и отфильтровать те‚ у которых соавторов меньше 3.
 */
$sql = <<<SQL
SELECT article.*,
       COUNT(article_has_author.id) as coauthors_count
FROM article
         INNER JOIN article_has_author on article_has_author.article_id = article.id

GROUP BY article.id
HAVING count(article_has_author) >= 3
SQL;

/**
 * 3. У каждой новости есть рейтинг. Нужно выбрать для каждого автора его лучшую и худшую новость.
 */
$sql = <<<SQL
SELECT author.*,
       (SELECT * FROM article inner_article WHERE inner_article.rating = MAX(article.rating) as best_article,
       (SELECT * FROM article inner_article WHERE inner_article.rating = MIN(article.rating) as worst_article,
FROM author
         INNER JOIN article_has_author on article_has_author.author_id = author.id
         INNER JOIN article ON article.id = article_has_author.article_id

GROUP BY author.id
SQL;


/**
 * Запросы можно проверить, развернув миграцию, самостоятельно выполнив SQL код в консоли.
 * При небольшом количестве в 1м записей запросы будут отрабатывать быстро и ничего лишнего с ними не требуется делать
 *
 */