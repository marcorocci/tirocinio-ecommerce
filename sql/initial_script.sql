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


