function geoFindMe() {

    function success(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        console.log(latitude);
        console.log(longitude);
        const locations = addLocation([longitude, latitude]).then(data => loadMap(data));
    }

    function error() {
        console.log('Unable to retrieve your location');
    }

    if (!navigator.geolocation) {
        console.log('Geolocation is not supported by your browser');
    } else {
        console.log('Locating…');
        navigator.geolocation.getCurrentPosition(success, error);
    }

    async function fetchLocation(location) {
        const data = await fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${location}.json?access_token=pk.eyJ1Ijoienh0b3giLCJhIjoiY2swMmlveml4MWxrODNtcHJiamdiNnN1eSJ9.XczK1iJW_x3svwijBbKEZA`);
        return await data.json();
    }

    async function addLocation(location) {
        const { features } = await fetchLocation(location);
        return locations = [
            {
                "description": "Tesla seller here!",
                "coordinates": features[0].center,
            }
        ]
    }
}



async function loadMap(locations) {
    mapboxgl.accessToken =
        'pk.eyJ1Ijoienh0b3giLCJhIjoiY2swMml0cGZhMDB5YjNncG5id2pnaXo2aiJ9.hL4bWTb9dgvSVe1nsKBmgA';

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/zxtox/ck02iwdqz0dhp1cmu01b7wvxe',
        scrollZoom: true
    });

    map.addControl(new mapboxgl.NavigationControl());
    const bounds = new mapboxgl.LngLatBounds();

    locations.forEach(loc => {
        // Add marker
        const el = document.createElement('div');
        el.className = 'marker';
        // Add marker
        new mapboxgl.Marker({
            element: el,
            anchor: 'bottom'
        })
            .setLngLat(loc.coordinates)
            .addTo(map);

        // app popup
        new mapboxgl.Popup({
            offset: 30
        })
            .setLngLat(loc.coordinates)
            .setHTML(`<p>${loc.description}</p>`)
            .addTo(map);

        // extend map bound to include current lcoation
        bounds.extend(loc.coordinates);
    });

    map.fitBounds(bounds, {
        padding: {
            top: 200,
            bottom: 150,
            left: 100,
            right: 100
        }
    });

}


