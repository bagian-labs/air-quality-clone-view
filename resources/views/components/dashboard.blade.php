@extends('default-pages')
@push('styles')
@endpush

@section('content')
    {{-- Wrapper Content --}}
    <div class="title__index">
        {{-- {{ !empty(Auth::user()->full_name) ? 'Hello, '.Auth::user()->full_name:'Please Login'}} --}}
        <h1>Indeks Kualitas Udara</h1>
    </div>
    {{-- Danger Air Quality --}}
    <div class="content__danger__air--quality">
        <div class="card__wrapper">
            <div id="backgroundColour"
                 class="card__item air__quality--ctm">
                <div id="backgroundColour2"
                     class="card__content--item card__banner">
                    <img id="gambarEmot"
                         src={{ asset('asset/vector/air-quality-very-danger.png') }}
                         alt="">
                </div>
                <div class="card__title"
                     id="kualitasUdara">
                    ---
                    <div class="index__info card__sub--head"
                         id="hasilUdara">
                        ---
                    </div>
                </div>
                <div class="index__info__context"
                     id="deskripsiUdara">
                    <strong>---</strong>
                </div>
            </div>
        </div>
    </div>
    {{-- Mapbox Canvas --}}

    <div class="maps__wrapper">
        <div class="maps__item maps__canvas">
            <div id='map'
                 class="maps__canvas-items"
                 style='width: 100%; height: 100%;'></div>
            <div class="maps__bag">
                <a href="https://bagian-portfolio.vercel.app"
                   target="blank_">
                    <img src="{{ asset('asset/logo/bagian-logo.png') }}"
                         alt="">
                </a>
            </div>
        </div>
        <div class="maps__item maps__info">
            <div class="maps__header">
                <h1>Maps Info</h1>
                <div class="realtimes__content">
                    <div id="clock"
                         class="timestamps"></div>
                </div>
            </div>
            <div class="maps__info__items">
                <label for="location">Lokasi Realtime</label>
                <div class="location info__wrapper"
                     id="alamatRealTime">
                    ---
                </div>
            </div>
            <div class="maps__info__content">
                <div class="maps__info__items">
                    <label for="jam">Jam</label>
                    <div class="hours info__wrapper">
                        <span id="hours">
                            ---
                        </span>
                    </div>
                </div>
                <div class="maps__info__items">
                    <label for="hari">Hari</label>
                    <div class="days info__wrapper">
                        <span id="days">
                            ---
                        </span>
                    </div>
                </div>
            </div>
            <div class="maps__info__content">
                <div class="maps__info__items">
                    <label for="tanggal">Tanggal</label>
                    <div class="date info__wrapper">
                        <span id="date">
                            ---
                        </span>
                    </div>
                </div>
                <div class="maps__info__items">
                    <label for="tahun">Tahun</label>
                    <div class="years info__wrapper">
                        <span id="years">
                            ---
                        </span>
                    </div>
                </div>
            </div>
            <div class="maps__info__content">
                <div class="maps__info__items">
                    <label for="lat">Latitude</label>
                    <div class="lat info__wrapper">
                        <span id="lat">
                            ---
                        </span>
                    </div>
                </div>
                <div class="maps__info__items">
                    <label for="long">Longtitude</label>
                    <div class="long info__wrapper">
                        <span id="long">
                            ---
                        </span>
                    </div>
                </div>
            </div>
            <div class="maps__nilai nilai__info__wrapper">
                <h1>Nilai Realtime</h1>
                <div class="maps__info__nilai-content">
                    <div class="maps__nilai__items">
                        <label for="co">Co</label>
                        <div class="co nilai__wrapper">
                            <div class="icon__container co__icon">
                                <img src="{{ asset('asset/icons/cloud-co-one.png') }}"
                                     alt=""
                                     style="height: 20px; width:25px; pointer-events: none;">
                            </div>
                            <span id="nilaiCo">
                                ---
                            </span>
                        </div>
                    </div>
                    <div class="maps__nilai__items">
                        <label for="co2">Co<sup>2</sup> </label>
                        <div class="co2 nilai__wrapper">
                            <div class="icon__container co2__icon">
                                <img src="{{ asset('asset/icons/cloud-co2.png') }}"
                                     alt=""
                                     style="height: 20px; width:25px; pointer-events: none;">
                            </div>
                            <span id="nilaiCo2">
                                ----
                            </span>
                        </div>
                    </div>
                    <div class="maps__nilai__items">
                        <label for="kelembapan">Kelembapan</label>
                        <div class="kelembapan nilai__wrapper">
                            <div class="icon__container kelembapan__icon">
                                <img src="{{ asset('asset/icons/droplet.png') }}"
                                     alt=""
                                     style="height: 20px; width:15px; pointer-events: none;">
                            </div>
                            <span id="nilaiKelembapan">
                                ---- %
                            </span>
                        </div>
                    </div>
                    <div class="maps__nilai__items">
                        <label for="suhu">Suhu</label>
                        <div class="suhu nilai__wrapper">
                            <div class="icon__container suhu__icon">
                                <img src="{{ asset('asset/icons/temperature.png') }}"
                                     alt=""
                                     style="height: 20px; width:10px; pointer-events: none;">
                            </div>
                            <span id="nilaiSuhu">
                                ----
                            </span>
                            <sup style="margin: -10px;  position: relative; z-index:3;">o</sup>C
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Mapbox Canvas --}}
    <div class="main__content">
        <div class="main__p chart-container"
             style="position: relative;">
            <canvas id="airQuality"></canvas>
        </div>
    </div>
    {{-- Wrapper Content --}}
    {{-- End Wrapper Component --}}
@endsection
@push('script')
    {{-- Timestamp Javascript  --}}
    <script>
        let time = document.getElementById("clock");

        setInterval(() => {

            let date = new Date();
            time.innerHTML = date.toLocaleTimeString();
        }, 1000)
    </script>
    {{-- Timestamp Javascript  --}}
    {{-- Mapbox Javascript --}}
    <script>
        $(document).ready(function() {
            setMap();
        });

        function setMap() {
            let url = "{{ route('getLocation') }}";
            $.ajax({
                type: 'GET',
                url: url,
                dataType: "JSON",
                success: function(result) {
                    // console.log(result);
                    nilaiLat = result.latitude;
                    nilaiLong = result.longtitude;

                    mapboxgl.accessToken =
                        'pk.eyJ1Ijoiam9leW9qb28iLCJhIjoiY2xjNG9uZmMzMW1nZDNxcW1uNDVveXhjZSJ9.B6FfHellSozIWwNwbE5NMw';
                    const map = new mapboxgl.Map({
                        container: 'map', // container ID
                        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
                        style: 'mapbox://styles/joeyojoo/clc4oz1bk000p14tcjis61g42', // style URL
                        center: [nilaiLong, nilaiLat], // starting position
                        zoom: 14 // starting zoom
                    });

                    // Add zoom and rotation controls to the map.
                    map.addControl(new mapboxgl.NavigationControl());

                    var mapboxClient = mapboxSdk({
                        accessToken: mapboxgl.accessToken
                    });
                    mapboxClient.geocoding
                        .reverseGeocode({
                            query: [nilaiLong, nilaiLat]
                        })
                        .send()
                        .then(function(response) {
                            if (
                                response &&
                                response.body &&
                                response.body.features &&
                                response.body.features.length
                            ) {
                                var feature = response.body.features[0];
                                $('div#alamatRealTime').html(feature.place_name);
                            }
                        });

                    let myLatlng = new mapboxgl.LngLat(nilaiLong, nilaiLat);
                    let marker = new mapboxgl.Marker()
                        .setLngLat(myLatlng)
                        .setPopup(new mapboxgl.Popup({
                                offset: 25
                            })
                            .setHTML(
                                '<div class="load__status">' +
                                '<h1>Lokasi alat anda berada pada titik ini.</h1></div>' +
                                '<div class="mapbox__lat__long">Latitude: ' + nilaiLat + '<p> Longtitude: ' +
                                nilaiLong + '</p></div>'
                            ))
                        .addTo(map);

                }
            })
        }
    </script>


    {{-- End Mapbox Javascript --}}


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const listHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu'];

        $(document).ready(function() {
            getLocation()
            getTime()
        });

        function getLocation() {
            let url = "{{ route('getLocation') }}";
            $.ajax({
                type: 'GET',
                url: url,
                dataType: "JSON",
                success: function(result) {
                    // console.log(result);
                    nilaiLat = result.latitude;
                    nilaiLong = result.longtitude;

                    $('span#lat').html(nilaiLat);
                    $('span#long').html(nilaiLong);
                }
            })
        }

        function getTime() {
            let url = "{{ route('getTime') }}";
            $.ajax({
                type: 'GET',
                url: url,
                dataType: "JSON",
                success: function(result) {
                    // console.log(result);
                    nilaiJam = result.jam;
                    nilaiTanggal = result.tanggal;
                    nilaiTahun = result.tahun;

                    let hari = new Date(nilaiTahun, getMonth(nilaiTanggal), nilaiTanggal.substr(0, 2));

                    $('span#hours').html(nilaiJam + " WIB")
                    $('span#date').html(nilaiTanggal)
                    $('span#days').html(listHari[hari.getDay()])
                    $('span#years').html(nilaiTahun)
                }
            })
        }

        function getMonth(date) {
            let number = Date.parse(date);

            return new Date(number).getMonth();
        }
    </script>

    <script>
        $(document).ready(function() {
            getAirData( /*230*/ );
        });

        function getAirData( /*sensor*/ ) {
            /* if (sensor === undefined) {
                sensor = 0;
            } */
            let url = "{{ route('airQualityResult') }}";
            let urlGambar = "{{ asset('asset/vector/:name') }}";
            let gambar, cardClass, cardClass2, kualitas, hasil, deskripsi;
            $.ajax({
                type: 'GET',
                url: url,
                /* data: {
                    xx: sensor,
                    ia: 301,
                    ib: 51,
                    xa: 57.5,
                    xb: 5
                }, */
                dataType: "JSON",
                success: function(result) {
                    // console.log(result);
                    if (result.rentang === "Baik") {
                        nilaiCo = result.co.toFixed(3);
                        nilaiCo2 = result.co2.toFixed(3);
                        nilaiKelembapan = result.kelembapan;
                        nilaiSuhu = result.suhu;
                        gambar = urlGambar.replace(':name', 'air-quality-good.png');
                        cardClass = 'card__item card__item--good';
                        cardClass2 = 'card__content--item card__banner--good';
                        kualitas = result.rentang;
                        hasil = result.coTotal;
                        deskripsi =
                            "Tingkat kualitas udara yang sangat baik, tidak memberikan efek negatif terhadap manusia, hewan dan tumbuhan.";
                    } else if (result.rentang === "Sedang") {
                        nilaiCo = result.co.toFixed(3);
                        nilaiCo2 = result.co2.toFixed(3);
                        nilaiKelembapan = result.kelembapan;
                        nilaiSuhu = result.suhu;
                        gambar = urlGambar.replace(':name', 'air-quality-middle.png');
                        cardClass = 'card__item card__item--middle';
                        cardClass2 = 'card__content--item card__banner--middle';
                        kualitas = result.rentang;
                        hasil = result.coTotal;
                        deskripsi =
                            "Tingkat kualitas udara masih dapat diterima pada kesehatan manusia, hewan dan tumbuhan.";

                    } else if (result.rentang === "Tidak Sehat") {
                        nilaiCo = result.co.toFixed(3);
                        nilaiCo2 = result.co2.toFixed(3);
                        nilaiKelembapan = result.kelembapan;
                        nilaiSuhu = result.suhu;
                        gambar = urlGambar.replace(':name', 'air-quality-not-good.png');
                        cardClass = 'card__item card__item--nh';
                        cardClass2 = 'card__content--item card__banner--nh';
                        kualitas = result.rentang;
                        hasil = result.coTotal;
                        deskripsi =
                            "Tingkat kualitas udara yang bersifat merugikan pada manusia, hewan dan tumbuhan.";

                    } else if (result.rentang === "Sangat Tidak Sehat") {
                        nilaiCo = result.co.toFixed(3);
                        nilaiCo2 = result.co2.toFixed(3);
                        nilaiKelembapan = result.kelembapan;
                        nilaiSuhu = result.suhu;
                        gambar = urlGambar.replace(':name', 'air-quality-not-healty.png');
                        cardClass = 'card__item card__item--vnh';
                        cardClass2 = 'card__content--item card__banner--vnh';
                        kualitas = result.rentang;
                        hasil = result.coTotal;
                        deskripsi =
                            "Tingkat kualitas udara yang dapat meningkatkan resiko kesehatan pada sejumlah segmen populasi yang terpapar.";

                    } else if (result.rentang === "Berbahaya") {
                        nilaiCo = result.co.toFixed(3);
                        nilaiCo2 = result.co2.toFixed(3);
                        nilaiKelembapan = result.kelembapan;
                        nilaiSuhu = result.suhu;
                        gambar = urlGambar.replace(':name', "air-quality-very-danger.png");
                        cardClass = "card__item air__quality--bad";
                        cardClass2 = "card__content--item card__banner--danger";
                        kualitas = result.rentang;
                        hasil = result.coTotal;
                        deskripsi =
                            "Tingkat kualitas udara yang dapat merugikan kesehatan serius pada populasi dan perlu penanganan cepat.";
                    }
                    $('div#backgroundColour').attr('class', cardClass);
                    $('div#backgroundColour2').attr('class', cardClass2);
                    $('img#gambarEmot').attr('src', gambar);
                    htmlKualitas = kualitas +
                        '<div class="index__info card__sub--head" id="hasilUdara">Indeks Kualitas udara : </div>';
                    $('div#kualitasUdara').html(htmlKualitas);
                    $('div#hasilUdara').html('Indeks Kualitas udara : <strong>' + Number(hasil.toFixed(3)) +
                        '</strong>');
                    // console.log(hasil);
                    $('div#deskripsiUdara').html(deskripsi);
                    $('span#nilaiCo').html(nilaiCo)
                    $('span#nilaiCo2').html(nilaiCo2)
                    $('span#nilaiKelembapan').html(nilaiKelembapan)
                    $('span#nilaiSuhu').html(nilaiSuhu)
                },
                error: function(error) {
                    console.log(error.responseText);
                }
            })
            // $.post(url, { xx: 100, ia: 301, ib: 51, xa: 57.5, xb: 5 }, function(data) {
            //     console.log(data);
            // });
        }
    </script>

    {{-- JS CHART --}}
    <script>
        const ctx = document.getElementById('airQuality').getContext("2d");

        var gradientStroke1 = ctx.createLinearGradient(0, 230, 0, 50);

        // semakin ke atas semakin merah gelap
        gradientStroke1.addColorStop(1, 'rgba(55, 114, 255, 0.2)'); // Blue
        gradientStroke1.addColorStop(0.8, 'rgba(240, 56, 255, 0.2)'); // Purple
        gradientStroke1.addColorStop(0.6, 'rgba(239, 112, 157, 0.2)'); // Pink
        gradientStroke1.addColorStop(0.2, 'rgba(226, 239, 112, 0.2)'); // Yellow
        // Main Background
        gradientStroke1.addColorStop(0, 'rgba(255, 255, 255, 0.041)');


        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Berbahaya', 'Sangat Tidak Sehat', 'Tidak Sehat', 'Sedang', 'Baik'],
                datasets: [{
                    label: ' Indeks Kualitas Udara ',
                    data: [12, 19, 6, 5, 9],
                    borderWidth: 1.2,
                    backgroundColor: gradientStroke1,
                    pointBackgroundColor: [
                        'rgba(95, 6, 6)', // Point Line Berbahaya
                        'rgba(255, 8, 8)', // Point Line Sangat Tidak Sehat
                        'rgba(128, 107, 14)', // Point Line Tidak Sehat
                        'rgba(16, 77, 134)', // Point Line Sedang
                        'rgba(13, 122, 27)' // Point Line Sehat
                    ],
                    pointRadius: [
                        6
                    ],
                    pointHoverRadius: [
                        8
                    ],
                    // backgroundColor: gradientStroke1,
                    fill: true,
                    borderColor: [
                        'rgba(99, 11, 11)'
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                onResize: true,
                maintainAspectRatio: false,
                aspectRatio: .5,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            boxWidth: 0
                        }
                    }
                }
            }
        });
    </script>
@endpush


{{-- Mapbox Get Live Data Sample From ISS --}}

{{-- map.on('load', async () => {
// Get the initial location of the International Space Station (ISS).
const geojson = await getLocation();
// Add the ISS location as a source.
map.addSource('iss', {
type: 'geojson'
, data: geojson
});
// Add the rocket symbol layer to the map.
map.addLayer({
'id': 'iss'
, 'type': 'symbol'
, 'source': 'iss'
, 'layout': {
// This icon is a part of the Mapbox Streets style.
// To view all images available in a Mapbox style, open
// the style in Mapbox Studio and click the "Images" tab.
// To add a new image to the style at runtime see
// https://docs.mapbox.com/mapbox-gl-js/example/add-image/
'icon-image': 'rocket'
}
});

// Update the source from the API every 2 seconds.
const updateSource = setInterval(async () => {
const geojson = await getLocation(updateSource);
map.getSource('iss').setData(geojson);
}, 2000);

async function getLocation(updateSource) {
// Make a GET request to the API and return the location of the ISS.
try {
const response = await fetch(
'https://api.wheretheiss.at/v1/satellites/25544', {
method: 'GET'
}
);
const {
latitude
, longitude
} = await response.json();
// Fly the map to the location.
map.flyTo({
center: [longitude, latitude]
, speed: 1
});
// Return the location of the ISS as GeoJSON.
return {
'type': 'FeatureCollection'
, 'features': [{
'type': 'Feature'
, 'geometry': {
'type': 'Point'
, 'coordinates': [longitude, latitude]
}
}]
};
} catch (err) {
// If the updateSource interval is defined, clear the interval to stop updating the source.
if (updateSource) clearInterval(updateSource);
throw new Error(err);
}
}
}); --}}
