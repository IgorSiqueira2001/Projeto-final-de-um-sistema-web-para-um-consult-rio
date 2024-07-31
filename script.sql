create database consultorio;
use consultorio;

create table paciente(
	
    id int not null AUTO_INCREMENT,
    nome varchar(50) not null,
    telefone varchar(15) not null,
    endereco varchar(70),
    cidade varchar(40),
    uf varchar(2),
    cep varchar(9),
    data_nasc date,
    responsavel varchar(50),
    primary key(id)
);

create table servico(

	id int not null AUTO_INCREMENT,
    servico varchar(50),
    preco double,
    primary key(id)
);

create table tratamento(

	id int AUTO_INCREMENT, 
    id_paciente int,
    data_inicio date,
    data_termino date,
    total double,
    primary key(id),
    foreign key(id_paciente) references paciente(id)
);

create table itensTratamento(
	id_tratamento int not null,
    id_servico int not null,
    quantidade int,
    preco double,
    foreign key(id_tratamento) references tratamento(id),
    foreign key(id_servico) references servico(id),
    primary key(id_tratamento, id_servico)
);
