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
    console.log(data);


    const dataFreq = data.map(el => new Date(el.created_at).toLocaleDateString()).reduce((acc, curr) => {
        return acc[curr] ? ++acc[curr] : acc[curr] = 1, acc
    }, {});
    console.log(dataFreq);


    const configuration = {
        type: 'bar',
        data: {
            datasets: [
                {
                    data: data,
                },
            ],
        },
        options: {
            backgroundColor: '#9C27B0',
            plugins: {
                title: {
                    display: true,
                    text: 'Vaccinated population by region',
                },
                legend: {
                    display: false,
                },
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'regions',
                        font: {
                            weight: 'bold',
                        },
                    },
                },
                y: {
                    title: {
                        display: true,
                        text: 'vaccinated (%)',
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





