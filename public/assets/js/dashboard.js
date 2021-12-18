const API_USERS_ENDPOINT = '/api/users';
const USERS_CHART_SELECTOR = '#users-chart'

const API_AMOUNT_OF_CARS_PER_USER = '/api/mostoffers';
const USERS_MOST_CARS_SELECTOR = '#amount-of-cars-chart';

const API_CARS_SOLD_BY_DAY = '/api/sold';
const MOST_CARS_SOLD_SELECTOR = '#cars-sold-by-day';

const generateRandomColors = (length) => [...Array(length)].map(() => `#${Math.floor(Math.random() * 16777215).toString(16)}`);

document.addEventListener('DOMContentLoaded', init);

async function init() {

    // Bar chart user account creation by date
    usersChart();

    // Amount of cars sold
    amountOfCars();

    // Most cars sold
    mostCarSold();
}


async function fetchData(url) {
    const data = await fetch(url);
    return await data.json();
}


async function usersChart() {
    const ctx = document.querySelector(USERS_CHART_SELECTOR).getContext('2d');
    const data = await fetchData(API_USERS_ENDPOINT);

    const dataFreq = data.map(el => new Date(el.created_at).toLocaleDateString()).reduce((acc, curr) => {
        return acc[curr] ? ++acc[curr] : acc[curr] = 1, acc
    }, {});


    const fakeData = {
        "2021-12-10": 90,
        "2021-12-11": 40,
        "2021-12-12": 70,
        "2021-12-13": 20,
    }


    const configuration = {
        type: 'bar',
        data: {
            datasets: [
                {
                    data: fakeData,
                },
            ],
        },
        options: {
            backgroundColor: generateRandomColors(Object.keys(fakeData).length),
            plugins: {
                title: {
                    display: true,
                    text: 'Creation of user account by day',
                },
                legend: {
                    display: false,
                },
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Dates',
                        font: {
                            weight: 'bold',
                        },
                    },
                },
                y: {
                    ticks: {
                        precision: 0
                    },
                    title: {
                        display: true,
                        text: 'Amount of users',
                        font: {
                            weight: 'bold',
                        },
                    },
                },
            },
        },
    };

    new Chart(ctx, configuration);
}


async function amountOfCars() {
    const ctx = document.querySelector(USERS_MOST_CARS_SELECTOR).getContext('2d');
    const data = await fetchData(API_AMOUNT_OF_CARS_PER_USER);


    const dataFreq = Object.assign({}, ...(data.map(seller => ({ [seller.name]: `${seller.amountOfCars}` }))));


    const configuration = {
        type: 'doughnut',
        data: {
            labels: Object.keys(dataFreq),
            datasets: [
                {
                    data: Object.values(dataFreq),
                    backgroundColor: generateRandomColors(Object.keys(dataFreq).length),
                },
            ],
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: "User with most cars on Tesell",
                    font: {
                        size: 24,
                    },
                },
            },
        },
    };
    new Chart(ctx, configuration);
}


async function mostCarSold() {
    const ctx = document.querySelector(MOST_CARS_SOLD_SELECTOR).getContext('2d');
    const data = await fetchData(API_CARS_SOLD_BY_DAY);


    const dataFreq = Object.assign({}, ...(data.map(car => ({ [car.date]: `${car.amountOfCars}` }))));

    console.log(dataFreq);


    const configuration = {
        type: 'bar',
        data: {
            datasets: [
                {
                    data: dataFreq,
                },
            ],
        },
        options: {
            backgroundColor: generateRandomColors(Object.keys(dataFreq).length),
            plugins: {
                title: {
                    display: true,
                    text: 'Cars sold by date',
                },
                legend: {
                    display: false,
                },
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Dates',
                        font: {
                            weight: 'bold',
                        },
                    },
                },
                y: {
                    ticks: {
                        precision: 0
                    },
                    title: {
                        display: true,
                        text: 'Amount of cars sold',
                        font: {
                            weight: 'bold',
                        },
                    },
                },
            },
        },
    };
    new Chart(ctx, configuration);
}


