document.addEventListener('DOMContentLoaded', () => {
    const mapElement = document.getElementById('mapa-distribuidores');
    const dataElement = document.getElementById('datos-distribuidores');

    if (!mapElement || !dataElement || !window.L) {
        return;
    }

    const distributors = JSON.parse(dataElement.textContent);
    const provinceSelect = document.getElementById('filtro-provincia');
    const citySelect = document.getElementById('filtro-ciudad');
    const searchButton = document.getElementById('abrir-busqueda');
    const searchInput = document.getElementById('buscar-direccion');
    const emptyMessage = document.getElementById('sin-resultados');
    const listButtons = [...document.querySelectorAll('[data-distribuidor-id]')];
    const map = L.map(mapElement, { scrollWheelZoom: false }).setView([-34.62, -58.46], 10);
    const markersLayer = L.featureGroup().addTo(map);
    const markers = new Map();
    const logoUrl = mapElement.dataset.logoUrl;

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '&copy; OpenStreetMap contributors',
    }).addTo(map);

    const icon = L.divIcon({
        className: '',
        html: '<div class="nikitos-marker"><img src="' + logoUrl + '" alt=""></div>',
        iconSize: [42, 42],
        iconAnchor: [21, 42],
        popupAnchor: [0, -38],
    });

    const normalized = (value) => String(value ?? '').normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '').toLocaleLowerCase('es-AR');

    const addOptions = (select, values, placeholder) => {
        select.replaceChildren(new Option(placeholder, ''));
        [...new Set(values.filter(Boolean))].sort((first, second) => first.localeCompare(second, 'es-AR'))
            .forEach((value) => select.add(new Option(value, value)));
    };

    const refreshCities = () => {
        const currentCity = citySelect.value;
        addOptions(citySelect, distributors
            .filter((distributor) => !provinceSelect.value || distributor.provincia === provinceSelect.value)
            .map((distributor) => distributor.ciudad), 'Ciudad');

        if ([...citySelect.options].some((option) => option.value === currentCity)) {
            citySelect.value = currentCity;
        }
    };

    const popupContent = (distributor) => {
        const content = document.createElement('div');
        const name = document.createElement('strong');
        const address = document.createElement('p');
        name.textContent = distributor.nombre;
        address.textContent = [distributor.direccion, distributor.ciudad, distributor.provincia].join(', ');
        content.append(name, address);
        return content;
    };

    const render = () => {
        const query = normalized(searchInput.value.trim());
        const visible = distributors.filter((distributor) => {
            const matchesProvince = !provinceSelect.value || distributor.provincia === provinceSelect.value;
            const matchesCity = !citySelect.value || distributor.ciudad === citySelect.value;
            const text = normalized([distributor.nombre, distributor.direccion, distributor.ciudad, distributor.provincia].join(' '));

            return matchesProvince && matchesCity && (!query || text.includes(query));
        });
        const visibleIds = new Set(visible.map((distributor) => String(distributor.id)));

        listButtons.forEach((button) => {
            button.hidden = !visibleIds.has(button.dataset.distribuidorId);
        });
        emptyMessage.hidden = visible.length !== 0;

        markersLayer.clearLayers();
        visible.forEach((distributor) => {
            if (distributor.latitud === null || distributor.longitud === null) {
                return;
            }

            let marker = markers.get(distributor.id);
            if (!marker) {
                marker = L.marker([Number(distributor.latitud), Number(distributor.longitud)], { icon })
                    .bindPopup(popupContent(distributor));
                markers.set(distributor.id, marker);
            }

            markersLayer.addLayer(marker);
        });

        if (markersLayer.getLayers().length > 0) {
            map.fitBounds(markersLayer.getBounds().pad(0.15), { maxZoom: 13 });
        }
    };

    addOptions(provinceSelect, distributors.map((distributor) => distributor.provincia), 'Provincia');
    refreshCities();
    render();

    provinceSelect.addEventListener('change', () => {
        refreshCities();
        render();
    });
    citySelect.addEventListener('change', render);
    searchInput.addEventListener('input', render);
    searchButton.addEventListener('click', () => {
        searchInput.hidden = !searchInput.hidden;
        searchButton.setAttribute('aria-expanded', String(!searchInput.hidden));
        if (!searchInput.hidden) {
            searchInput.focus();
        } else {
            searchInput.value = '';
            render();
        }
    });

    listButtons.forEach((button) => button.addEventListener('click', () => {
        const distributor = distributors.find((entry) => String(entry.id) === button.dataset.distribuidorId);
        if (!distributor || distributor.latitud === null || distributor.longitud === null) {
            return;
        }

        const marker = markers.get(distributor.id);
        if (marker && markersLayer.hasLayer(marker)) {
            map.setView(marker.getLatLng(), 14);
            marker.openPopup();
        }
    }));
});
