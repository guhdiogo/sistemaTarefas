create database sistemastarefas;

create table sistemastarefas.usuarios
(
    idUsuarios int auto_increment primary key,
    login      varchar(30)  not null,
    senha      varchar(30)  not null,
    nome       varchar(150) not null
);

INSERT INTO sistemastarefas.usuarios (login, senha, nome)
    VALUES ('admin', 'admin@123', 'Teste Usuairo');

create table sistemastarefas.tarefas
(
    idTarefas int auto_increment
        primary key,
    nome      varchar(30)  not null,
    descricao varchar(255) not null
);
