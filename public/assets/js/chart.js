const API_ENDPOINT = '/api/cars';
const CANVAS_SELECTOR = '#car-graph>canvas'

document.addEventListener('DOMContentLoaded', init);

async function init() {

    loadCharts();

    async function getData() {
        const data = await fetch(API_ENDPOINT);
        return await data.json();
    }

    async function loadCharts() {
        const data = await getData();
        addDataToChart(data);
        averagePricePerModel(data);
    }


    function addDataToChart(data) {
        const carFrequencies = data.map(el => el.modelName).reduce(function (acc, curr) {
            return acc[curr] ? ++acc[curr] : acc[curr] = 1, acc
          }, {});


        const ctx = document.querySelector(CANVAS_SELECTOR).getContext('2d');
		generateChart(ctx, carFrequencies, 'Tesell stats');
    }
    

    async function averagePricePerModel(data) {
        const ctx = document.querySelectorAll(CANVAS_SELECTOR)[1].getContext('2d');
        const avgPrice = data.map(({modelName, price}) => ({modelName, price}));

          let result = Object.entries(avgPrice
            .reduce((acc, x) => {
              let arr = acc[x.modelName] || [];
              arr.push(x.price);
              acc[x.modelName] = arr;
              return acc;
            }, {}))
            .map((x)=> { 
               let year = x[0];
               let rates = x[1];
               let sum = rates.reduce((a, b) => a + b, 0);
               let avg = (sum / rates.length) || 0; 
               return { "modelName": year, "price": avg };
            });
             
            
            const keys = [];
            result.forEach(model => keys.push(model.modelName));

            const obj = {};

            keys.forEach(modelKeyName => {
                obj[modelKeyName] = result.find(model => model.modelName === modelKeyName).price;
            });


		generateChart(ctx, obj, 'Avg price per model', keys);
    }

    function generateChart(ctx, data, title, keyValues=null, colors=['#e82127', '#466cd9', '#9C27B0', '#4CAF50']) {
        const configuration = {
			type: 'doughnut',
			data: {
				labels: keyValues ? keyValues : Object.keys(data),
				datasets: [
					{
						data: Object.values(data),
						backgroundColor: colors,
					},
				],
			},
			options: {
				plugins: {
					title: {
						display: true,
						text: title,
						font: {
							size: 24,
						},
					},
				},
			},
		};
		new Chart(ctx, configuration);
    }
}







