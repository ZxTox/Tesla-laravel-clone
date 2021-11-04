document.addEventListener("DOMContentLoaded", init);

const CARS_API_ENDPOINT = "/api/cars";

function init() {

    insertData();

    async function insertData() {
        const $carsEl = document.querySelector("#cars>.car-inventory");
        const cars = await fetchCars();
        cars.forEach(car => {
            const images = JSON.parse(car.images);
            $carsEl.insertAdjacentHTML('beforeend', generateHTML(car, images));
        });
    }

    async function fetchCars() {
        const data = await fetch(CARS_API_ENDPOINT);
        return await data.json();
    }

    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'EUR',
    });
    const generateHTML = (currentCar, images) => {
        return `<div class="car">
        <a href="/cars/${currentCar.offerid}">
            <h3>${currentCar.year} ${currentCar.modelName}</h3>
        </a>
            <h4>${currentCar.typeModel}</h4>
        <h5>${formatter.format(currentCar.price)}</h5>
        <img
            src="${images[0]}"
            alt="${currentCar.year} ${currentCar.modelName} ${currentCar.typeModel}"
        />

        <ul class="car-specs">
            <div class="car-cta">
            <a href="/cars/${currentCar.offerid}">
                <button class="btn-primary">Contact buyer</button>
            </a>
            <a href="/cars/${currentCar.offerid}">
                <button class="btn-secondary">View Details</button>
            </a>
            </div>
            <li>
                <h5>${currentCar.accel}<span>s</span></h5>
                <p>0-100 kph</p>
            </li>

            <li><div class="vertial-line"></div></li>

            <li>
                <h5>${currentCar.topSpeed}<span>kph</span></h5>
                <p>Top speed</p>
            </li>

            <li><div class="vertial-line"></div></li>

            <li>
                <h5>${currentCar.range}<span>km</span></h5>
                <p>range (EPA)</p>
            </li>
        </ul>
    </div>`
    }
}