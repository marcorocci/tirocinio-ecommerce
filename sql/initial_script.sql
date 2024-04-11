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

insert into prodotti(nome, descrizione, prezzo, imagePath, categoria) values ("WD 2TB Elements Portable External Hard Drive", "USB 3.0 and USB 2.0 Compatibility Fast data transfers Improve PC Performance High Capacity", 64, "imgs/bicchiere1.jpeg", "elettronica");

update prodotti set imagePath = 'imgs/hardrive.jpg' where id = 4;

select * from prodotti;

describe prodotti;

create table cart(
	id int auto_increment primary key,
    aggiunto datetime default(current_timestamp()),
    quantita int not null,
    idProdotto int,
    foreign key (idProdotto) references prodotti(id)
);
describe cart;

ALTER TABLE cart
modify aggiunto datetime default(current_timestamp());

insert into cart(quantita, idProdotto) values (3, 1);

delete from cart where id = 2;

select * from cart;


select nome, descrizione from prodotti inner join cart on cart.idProdotto = prodotti.id;


use ecommerce;
create table Vendite(
	venditaId int auto_increment primary key,
    dataVendita datetime default(current_timestamp()),
    idProdotto int not null,
    quantita int not null,
    prezzoTotale decimal(10, 2) not null,
    foreign key (idProdotto) references prodotti(id)
);

insert into Vendite(idProdotto, quantita, prezzoTotale) values (3, 1, 999.01);
describe Vendite;

select * FROM Vendite;

-- seleziona tutte le vendite di oggi
select * from Vendite where date(dataVendita) = CURDATE();

UPDATE Vendite
SET dataVendita = '2023-04-03 09:50:27'
WHERE venditaId = 4;

-- seleziona il totale degli acquisti per ogni giorno del mese corrente
select DATE(dataVendita) as data, SUM(prezzoTotale) as totale_giornaliero
from Vendite
where MONTH(dataVendita) = MONTH(curdate()) and YEAR(dataVendita) = YEAR(curdate())
group by DATE(dataVendita);

-- totale acquisti per ogni prodotto ogni anno
select year(dataVendita) as anno, GROUP_CONCAT(DISTINCT nome) as nome, COUNT(prezzoTotale) as prodotti_venduti
from Vendite
inner join prodotti on prodotti.id = Vendite.idProdotto
group by year(dataVendita);

ALTER TABLE cart ADD CONSTRAINT idProdotto UNIQUE (idProdotto);

INSERT INTO cart (quantita, idProdotto)
VALUES (1, 1)
ON DUPLICATE KEY UPDATE
quantita = quantita + 1;

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







