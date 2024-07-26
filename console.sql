create schema `for_test_task`;
use `for_test_task`;

create table `users`(
    `id` bigint unsigned auto_increment,
    `first_name` varchar(50) not null ,
    `last_name` varchar(50) not null ,
    `email` varchar(100) unique not null ,
    `company_name` varchar(50),
    `position` varchar(50),
    primary key (`id`)
);

create table `phones`(
     `id` bigint unsigned auto_increment,
     `phone` varchar(100) not null ,
     `user_id` bigint unsigned not null ,
     foreign key (`user_id`) references `users`(`id`),
     primary key (`id`)
);