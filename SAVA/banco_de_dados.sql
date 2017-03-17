create table usuario(
    id int not null auto_increment primary key,
    email varchar(200) not null,
    senha varchar(200) not null,
    nivel varchar(25) not null
);

create table disciplina(
    id int not null auto_increment primary key,
    nome varchar(200) not null
);

create table serie(
    id int not null auto_increment primary key,
    nome varchar(200) not null
);

create table aluno(
    id int not null auto_increment primary key,
    nome varchar(200) not null,
    usuario int not null,
    foreign key (usuario) references usuario(id)
);

create table professor(
    id int not null auto_increment primary key,
    nome varchar(200) not null,
    disciplina int not null,
    serie int not null,
    foreign key (disciplina) references disciplina(id),
    foreign key (serie) references serie(id)
);

create table avaliacao(
    id int not null auto_increment primary key,
    pontualidade int not null,
    assiduidade int not null,
    organizacao int not null,
    disciplina int not null,
    relacionamento int not null,
    metodologia int not null,
    avaliacao int not null,
    desenvolvimento int not null,
    compromisso int not null,
    etica int not null,
    professor int not null,
    aluno int not null,
    foreign key (professor) references professor(id),
    foreign key (aluno) references aluno(id)
);