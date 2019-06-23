create table if not exists article
(
    id     serial       not null
        constraint article_pk
            primary key,
    title  varchar(255) not null,
    "desc" text         not null,
    rating integer      not null
);

alter table article
    owner to postgres;

create table if not exists author
(
    id         serial       not null
        constraint author_pk
            primary key,
    first_name varchar(255) not null,
    last_name  varchar(255) not null
);

alter table author
    owner to postgres;

create table if not exists article_has_author
(
    id         serial  not null
        constraint article_has_author_pk
            unique,
    article_id integer not null
        constraint article_has_author_article_id_fk
            references article
            on update restrict on delete restrict,
    author_id  integer not null
        constraint article_has_author_author_id_fk
            references author
            on update restrict on delete restrict
);

alter table article_has_author
    owner to postgres;

create unique index if not exists article_has_author_author_id_article_id_uindex
    on article_has_author (author_id, article_id);

--fill articles

insert into article (id, title, "desc", rating) values (6, 'news 6', 'description', 6);
insert into article (id, title, "desc", rating) values (3, 'news 3', 'description', 3);
insert into article (id, title, "desc", rating) values (5, 'news 5', 'description', 5);
insert into article (id, title, "desc", rating) values (4, 'news 4', 'description', 4);
insert into article (id, title, "desc", rating) values (1, 'news 1', 'description', 15);
insert into article (id, title, "desc", rating) values (2, 'news 2', 'description', 100);

--fill authors

insert into author (id, first_name, last_name) values (1, 'Dmitriy', 'Derepko');
insert into author (id, first_name, last_name) values (2, 'Vasya', 'Pupkin');
insert into author (id, first_name, last_name) values (3, 'Nikita', 'Popov');
insert into author (id, first_name, last_name) values (4, 'Vladimir', 'Putin');

--fill links

insert into article_has_author (id, article_id, author_id) values (1, 1, 1);
insert into article_has_author (id, article_id, author_id) values (2, 2, 1);
insert into article_has_author (id, article_id, author_id) values (3, 3, 1);
insert into article_has_author (id, article_id, author_id) values (4, 4, 2);
insert into article_has_author (id, article_id, author_id) values (5, 5, 2);
insert into article_has_author (id, article_id, author_id) values (6, 1, 2);
insert into article_has_author (id, article_id, author_id) values (7, 1, 3);
insert into article_has_author (id, article_id, author_id) values (8, 1, 4);
insert into article_has_author (id, article_id, author_id) values (10, 2, 2);
insert into article_has_author (id, article_id, author_id) values (11, 3, 3);