let daysInMonth = (month, year)  => { 
    return new Date(year, month, 0).getDate(); 
} 

const monthNames = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
];

const monthShortNames = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "May",
    "Jun",
    "Jul",
    "Aug",
    "Sep",
    "Oct",
    "Nov",
    "Dec",
];

const daysName = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

let getMonthName = (month, shortNames) => {
    return shortNames ? monthShortNames[month] : monthNames[month];
}

let getDayName = (day) => {
    return daysName[day];
}

let createCalendarList = (month, year) => {
    let dateDays = [];

    let numOfDays = daysInMonth(month, year);

    for(let i = 1; i <= numOfDays; i++) {

        const date = new Date(`${getMonthName(month)} ${i}, ${year}`);

        dateDays.push({
            date: i,
            day: getDayName(date.getDay())
        })
    }

    return dateDays;

}

//momentjs is just to heavy
export {
    getMonthName,
    getDayName,
    daysInMonth,
    createCalendarList
};