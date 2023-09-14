use clean_arch;

create table customers(id int auto_increment, name varchar(100) not null, email varchar(100) not null, birth_date date not null, constraint table_name_pk primary key (id));

insert into customers (name, email, birth_date) values ('Bruce Wayne', 'bruce@warner-dc.com', '1915-04-07');