
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
    idProdotto int,
    aggiunto datetime default(current_timestamp()),
    quantita int not null,
    foreign key (idProdotto) references prodotti(id)
);

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






