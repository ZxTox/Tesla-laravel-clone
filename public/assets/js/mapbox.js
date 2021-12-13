function geoFindMe() {

    function success(position) {
        const { latitude, longitude } = position.coords;
        const locations = addLocation([longitude, latitude]).then(data => loadMap(data));
    }

    function error() {
        console.log('Unable to retrieve your location');
    }

    if (!navigator.geolocation) {
        console.log('Geolocation is not supported by your browser');
    } else {
        console.log('Locating…');
        navigator.geolocation.getCurrentPosition(success, error, { enableHighAccuracy: true });
    }



    async function addLocation(location) {
        const { features } = await fetchLocation(location);
        return locations = [
            {
                "description": "Tesla seller here!",
                "coordinates": features[0].center,
                "location": features[0].place_name
            }
        ]
    }
}

async function fetchLocation(location) {
    const data = await fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${location}.json?access_token=pk.eyJ1Ijoienh0b3giLCJhIjoiY2swMmlveml4MWxrODNtcHJiamdiNnN1eSJ9.XczK1iJW_x3svwijBbKEZA`);
    return await data.json();
}

async function loadMapWithAddress(location, textSelector) {
    const { features } = await fetchLocation(location[0].coordinates);
    document.querySelector(textSelector).innerText = `Located at: ${features[0].place_name}`;
    loadMap(location);
}

async function loadMap(locations) {
    //console.log(locations);

    const [loc] = locations;
    mapboxgl.accessToken =
        'pk.eyJ1Ijoienh0b3giLCJhIjoiY2swMml0cGZhMDB5YjNncG5id2pnaXo2aiJ9.hL4bWTb9dgvSVe1nsKBmgA';



    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/zxtox/ckwhvronz6a2r14ocbd8fbypm',
        center: loc.coordinates,
        scrollZoom: true,
        zoom: 14
    });

    map.addControl(new mapboxgl.NavigationControl());

    const el = document.createElement('div');
    el.className = 'marker';
    // Add marker
    new mapboxgl.Marker({
        element: el,
        anchor: 'bottom'
    })
        .setLngLat(loc.coordinates)
        .addTo(map);



    new mapboxgl.Popup({
        offset: 30
    })
        .setLngLat(loc.coordinates)
        .setHTML(`<p>${loc.description}</p>`)
        .addTo(map);

    if (document.querySelector("#coords")) document.querySelector("#coords").value = JSON.stringify(locations[0].coordinates);

    if (document.querySelector("#car-information")) document.querySelector("#car-information").scrollTop = 0;
}


