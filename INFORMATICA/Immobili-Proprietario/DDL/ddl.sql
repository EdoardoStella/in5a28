--------------/* tabelle di proprietario */----------------
create table proprietario(
   id integer unsigned auto_increment,
   cognome varchar(20) not null,
   nome varchar(20) not null,
   via varchar(30),
   civico tinyint,
   citta varchar(30),
   telefono varchar(15),
   mail varchar(255) not null,

   primary key(id)
);

create table zona(
   id integer unsigned auto_increment,
   nome varchar(20),
   primary key(id)
);

create table tipologia(
   id integer unsigned auto_increment,
   nome varchar(20),
   primary key(id)
);

-------------/* tabella degli immobili.*/--------------

create table immobile(
   id integer unsigned auto_increment,
   nome varchar(20),
   via varchar(30),
   civico tinyint,
   metratura integer,
   piano tinyint,
   locali tinyint,
   idZona integer unsigned,
   idTipologia integer unsigned,

   primary key(id),
   foreign key (idZona) references zona(id),
   foreign key (idTipologia) references tipologia(id)
)

-------------/* tabella che associa immobile a proprietario */------------

create table possiede(
   id integer unsigned auto_increment,
   data_acquisto date,
   idProprietario integer unsigned,
   idImmobile integer unsigned,

   primary key(id),
   foreign key (idProprietario) references proprietario(id),
   foreign key (idImmobile) references immobile(id)
)