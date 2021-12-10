const API_USERS_ENDPOINT = '/api/users';
const USERS_CHART_SELECTOR = '#users-chart'

document.addEventListener('DOMContentLoaded', init);

async function init() {

    // Bar chart user account creation by date
    usersChart();
}


async function getUsers() {
    const data = await fetch(API_USERS_ENDPOINT);
    return await data.json();
}


async function usersChart() {
    const ctx = document.querySelector(USERS_CHART_SELECTOR).getContext('2d');
    const data = await getUsers();

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
            backgroundColor: [...Array(Object.keys(fakeData).length)].map(() => `#${Math.floor(Math.random() * 16777215).toString(16)}`),
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





