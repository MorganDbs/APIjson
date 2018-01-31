window.Interoperabilite = (() => {
    let module = {};
    let map, parkingIcon;

    module.init = () => {
    	let prParkings = module.query('content/data/velostan.php', 'GET')
        prParkings.done((data) => {
        	console.log(data)
        	this.map = L.map('map').setView([data.carto.lat, data.carto.lon], 13);
	        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	        }).addTo(this.map);

	        L.marker([data.carto.lat, data.carto.lon]).addTo(this.map)
				.bindPopup('Votre position')
				.openPopup();

	        this.parkingIcon = L.icon({
	            iconUrl: 'public/assets/leaflet/images/parking.png',

	            iconSize:     [32, 37],
	            iconAnchor:   [16, 35],
	            popupAnchor:  [0, -35]
	        });

            $.each(data.parkings, (k, v) => {
                module.addParking(v);
            })
        });        
    }

    module.query = (url, method, data = null) => {
        let pr = $.ajax(url, {
            type: method,
            dataType: 'json',
            context: this,
            data: data
        });
        pr.fail((jqXHR, status, error) => {
            alert('Error ajax query');
        })
        return pr;
    }

    module.addParking = (data) => {
    	let horaire = $('<p>').addClass('text-success').text('Ouvert');
        let places_libres = $('<p>').text(`Places libres: ${data.station.available}/${data.station.total}`)[0].outerHTML;
        if (data.places === null) {
            horaire = $('<p>').addClass('text-danger').text('Fermé');
            places_libres = '';
        }

        L.marker([data.lat, data.lng], {
            icon: this.parkingIcon
        })
        .addTo(this.map)
        .bindPopup(`<h6>${data.name.toUpperCase()}</h6><span>${data.address} - ${data.name}</span>${places_libres}${horaire[0].outerHTML}`);
    }

    return module;
})();

$(() => {
	Interoperabilite.init();
	Interoperabilite.addParking();
});