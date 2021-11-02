document.addEventListener("DOMContentLoaded", init);

const CARS_API_ENDPOINT = "/api/cars";

function init() {

    insertData();

    async function insertData() {
        const $carsEl = document.querySelector("#cars>.car-inventory");
        const cars = await fetchCars();
        cars.forEach(car => {
            $carsEl.insertAdjacentHTML('beforeend', generateHTML(car));
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
    const generateHTML = (currentCar) => {
        return `<div class="car">
        <a href="/cars/${currentCar.offerid}">
            <h3>${currentCar.year} ${currentCar.modelName}</h3>
        </a>
            <h4>${currentCar.typeModel}</h4>
        <h5>${formatter.format(currentCar.price)}</h5>
        <img
            src="https://static-assets.tesla.com/configurator/compositor?&bkba_opt=2&view=STUD_3QTR&size=1400&model=ms&options=$BP02,$HC00,$ADPX2,$GLFR,$AU00,$APF2,$APH4,$APPF,$X028,$BTX5,$BS00,$BCMB,$CH05,$CW00,$COUS,$X040,$IDBO,$X027,$DRLH,$DU00,$AF00,$FMP6,$FG02,$DCF0,$FR04,$TD00,$X007,$X011,$INBPP,$PI00,$IX00,$X001,$LP01,$LT5P,$MI03,$X037,$MDLS,$DV4W,$X025,$X003,$ZCST,$PPSW,$PS01,$PK00,$X031,$PX00,$PF00,$X043,$TM00,$BR04,$RENA,$RFFG,$USSB,$X014,$S32P,$ME02,$QTPP,$SR07,$SP00,$X021,$SC04,$SU01,$TR00,$TIG4,$DSHG,$MT75A,$UTSB,$WTDS,$WR01,$YFCC,$CPF0&crop=1400,850,300,130&scalemode=centered"
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