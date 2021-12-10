const API_USERS_ENDPOINT = '/api/users';
const CANVAS_SELECTOR = 'canvas'

document.addEventListener('DOMContentLoaded', init);

async function init() {

    barChart();
}


async function getUsers() {
    const data = await fetch(API_USERS_ENDPOINT);
    return await data.json();
}


async function barChart() {
    const ctx = document.querySelector(CANVAS_SELECTOR).getContext('2d');
    const data = await getUsers();

    const dataFreq = data.map(el => new Date(el.created_at).toLocaleDateString()).reduce((acc, curr) => {
        return acc[curr] ? ++acc[curr] : acc[curr] = 1, acc
    }, {});


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
            backgroundColor: [...Array(Object.keys(dataFreq).length)].map(() => '#' + Math.floor(Math.random() * 16777215).toString(16)),
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





