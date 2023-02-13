

export function convert(jour){
    let  date =  new Date(jour);
    return  date.toLocaleDateString('en-GB') // "day-month-year"
}

