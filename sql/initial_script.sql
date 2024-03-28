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


