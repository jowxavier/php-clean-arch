## Clean Arch - Pest PHP

Este projeto baseado em [Docker](https://www.docker.com/), sendo necessário sua instalação para execução do ambiente.

### Executando a aplicação
```bash
docker-compose up -d
```

### Criando banco de dados e inserindo dado
##### Acessando container de bando de dados
```bash
docker-compose exec mysql bash
```

```bash
use clean_arch;

create table customers(id int auto_increment, name varchar(100) not null, email varchar(100) not null, birth_date date not null, constraint table_name_pk primary key (id));

insert into customers (name, email, birth_date) values ('Bruce Wayne', 'bruce@warner-dc.com', '1915-04-07');
```

### Executando Testes
```bash
docker-compose exec clean-arch bash
```

```bash
./vendor/bin/pest
```