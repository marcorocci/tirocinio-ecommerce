






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

const totalDays = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate();
document.getElementById('mese').innerHTML = `Totale degli acquisti per ogni giorno di <strong>${mesi(new Date().getMonth()+1)}</strong>`
document.getElementById('ann').innerHTML = `Totale vendite negli anni di attività`
const dateSet = mensile.map(item => item.data)
for (let i = 1; i <= totalDays; i++) {
    
    if (!dateSet.includes(i)) {
        mensile.push({data: i, totale_giornaliero: '0.00'})
    }
}

mensile.sort((a, b) => new Date(a.data) - new Date(b.data))


new Morris.Area({
    element: 'chart',
    data: mensile,
    xkey: 'data',
    ykeys: ['totale_giornaliero'],
    labels: ['Totale giornaliero'],
    parseTime: false,
    lineColors: ['#198754', '#2A9FD6', '#C19A6B']
})


new Morris.Bar({
    element: 'barchart',
    data: dataAndamento,
    xkey: 'anno',
    ykeys: ['prodotti_venduti'],
    labels: ['Prodotti Venduti'],
    barColors: ['#198754'],
    barPercentage: 0.4
})