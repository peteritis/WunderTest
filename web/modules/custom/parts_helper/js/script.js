(function($, Drupal, drupalSettings) {
    Drupal.behaviors.yourbehavior = {
        attach: function (context, settings) {
            var geoField = drupalSettings.geoField
            // You can init map here.
            //     new GMaps({
            //     el: '#map',
            //     lat: -12.043333,
            //     lng: -77.028333
            // });

            // src = "https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"

            var map = L.map('map').setView([56.97598, 24.11431], 17);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([56.97598, 24.11431]).addTo(map)
                .bindPopup('Mēs esam šeit.')
                .openPopup();

            // map.invalidateSize();

            // var map = L.map('map', {
            //     center: [56.97598, 24.11431],
            //     zoom: 13
            // });

            // map.remove();

        }
    };
})(jQuery, Drupal, drupalSettings);