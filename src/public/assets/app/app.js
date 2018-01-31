window.Interoperabilite = (() => {
    let module = {};
    let map, trafficIcon;

    module.init = (infoTrafic, coord) => {
        this.trafficIcon = L.icon({
            iconUrl: 'public/assets/leaflet/images/traffic.png',

            iconSize: [32, 32],
            iconAnchor: [16, 35],
            popupAnchor: [0, -35]
        });

        let lat = coord.results["0"].geometry.location.lat
        let lng = coord.results["0"].geometry.location.lng


        this.map = L.map('map').setView([lat, lng], 8);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(this.map);

        $.each(infoTrafic, (k, v) => {
            module.addInfoTrafic(v)
        })

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

    module.addInfoTrafic = (data) => {
        L.marker([data.latitude, data.longitude], {
                icon: this.trafficIcon
            })
            .addTo(this.map)
            .bindPopup(`<h6>Nature: ${data.nature}</h6><h6>Type: ${data.type}</h6><h6>Statut: ${data.statut}</h6>`);
    }

    return module;
})();
