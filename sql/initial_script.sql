create database if not exists ecommerce;
use ecommerce;

create table prodotti(
	id int auto_increment primary key,
    nome varchar(255) not null,
    descrizione varchar(255),
    prezzo decimal(5, 2),
    imagePath varchar(255) not null,
    categoria varchar(255) not null
);
create table cart(
	id int auto_increment primary key,
    idProdotto int unique,
    aggiunto datetime default(current_timestamp()),
    quantita int not null,
    foreign key (idProdotto) references prodotti(id)
);
create table Vendite(
	venditaId int auto_increment primary key,
    dataVendita datetime default(current_timestamp()),
    idProdotto int not null,
    quantita int not null,
    prezzoTotale decimal(10, 2) not null,
    foreign key (idProdotto) references prodotti(id)
);

create table Promozioni(
	id int auto_increment primary key,
    codicePromozionale varchar(255) not null unique,
    sconto decimal(5, 2) not null,
    dataInizio datetime,
    dataFine datetime
);

-- INSERTS

insert into prodotti(nome, descrizione, prezzo, imagePath, categoria) 
values ("T-shirt", "Stile aderente, maniche lunghe raglan a contrasto.", 22.3, "imgs/tshirt.jpg", "Abbigliamento uomo"),
('Giacchetto', 'giacche outerwear grande per la primavera / autunno / inverno, adatto per molte occasioni, come il lavoro, escursioni, campeggio,', '55.90', 'imgs/giacca.jpg', 'Abbigliamento uomo'),
('Orecchini', 'Orecchini a tunnel doppio svasato placcati in oro rosa.', '999.01', 'imgs/orecchini.jpg', 'Gioielli'),
('2TB Hard Drive', 'Compatibile con USB 3.0 e 2.0, trasferimento dati veloce.', '64.00', 'imgs/hardrive.jpg', 'Elettronica');

insert into cart(idProdotto, quantita) 
values(1, 5),
(2, 6),
(3, 4);

insert into Vendite(idProdotto, quantita, prezzoTotale) values (1, 1, 22.30), (2, 1, 55.90), (1, 2, 44.60), (3, 1, 999.01);

INSERT INTO Promozioni (codicePromozionale, sconto, dataInizio, dataFine)
VALUES ('CODICE123', 10.00, '2024-04-08 00:00:00', '2024-12-31 23:59:59');



create table utenti(
id_utenti int auto_increment primary key,
nome varchar (80),
cognome varchar (80),
username varchar (80),
email varchar (80),
indirizzo_uno varchar(80),
indirizzo_due varchar (80),
regione varchar(80),
stato varchar(80),
codice_postale varchar (80)
);

create table pagamenti(
id_pagamenti int auto_increment primary key,
carta_credito varchar (80),
carta_debito varchar (80),
paypal varchar (80)
);

create table checkout(
  id_utenti int,
  id_pagamenti int,
  foreign key (id_utenti) references utenti(id_utenti),
  foreign key (id_pagamenti) references pagamenti(id_pagamenti)
);


insert into utenti(nome, cognome, username, email, indirizzo_uno, indirizzo_due,regione, stato, codice_postale)
values("Martina", "Vespa","marti", "mmm@mail.com","Via Roma 13","","Lazio","Italia","00190");

insert into pagamenti (carta_credito, carta_debito)values("","");

insert into checkout(id_utenti,id_pagamenti)values(1, 1);




