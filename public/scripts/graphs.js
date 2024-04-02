






const mesi = (mese) => {
    switch(mese) {
        case 1: return 'Gennaio';
        case 2: return 'Febbraio';
        case 3: return 'Marzo';
        case 4: return 'Aprile';
        case 5: return 'Maggio';
        case 6: return 'Giugno';
        case 7: return 'Luglio';
        case 8: return 'Agosto';
        case 9: return 'Settembre';
        case 10: return 'Ottobre';
        case 11: return 'Novembre';
        case 12: return 'Dicembre';
        default: return 'Mese non valido';
    }
}

var totalDays = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate();
document.getElementById('mese').innerHTML = `Questi sono i 3 prodotti piu venduti a <strong>${mesi(new Date().getMonth()+1)}</strong>`

var data = [];
for (var i = 1; i <= totalDays; i++) {
    data.push({ day: i.toString(), bicchieri: Math.floor(Math.random() * 50), astucci: Math.floor(Math.random() * 50), penne: Math.floor(Math.random() * 50)}); 
}

const a = $('#res-result').data('res');
console.log(a)
new Morris.Area({
    element: 'chart',
    data: data,
    xkey: 'day',
    ykeys: ['bicchieri', 'astucci', 'penne'],
    labels: ['Bicchieri', 'Astucci', 'Penne'],
    parseTime: false,
    lineColors: ['#198754', '#2A9FD6', '#C19A6B'],
});

new Morris.Bar ({
    element: 'barchart',
    data: dataAndamento,
    xkey: 'year',
    ykeys: ['sales'],
    labels: ['vendite annuali'],
    barColors : ['#198754'],
    barPercentage: 1
});