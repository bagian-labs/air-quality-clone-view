<!doctype html>
<html lang="en">
<!-- JavaScript Bundle with Popper -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.min.js"
    integrity="sha512-tQYZBKe34uzoeOjY9jr3MX7R/mo7n25vnqbnrkskGr4D6YOoPYSpyafUAzQVjV6xAozAqUFIEFsCO4z8mnVBXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link
    href="https://api.fontshare.com/v2/css?f[]=epilogue@400,701,300,800,200,201,501,600,601,100,801,700&f[]=author@400,500,200,600,300&f[]=satoshi@700,500,300,400&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="{{ asset('asset/css/index-styles.css') }}">
{{--  <link rel="stylesheet" href="{{ asset('asset/css/index-styles.css') }}">  --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Air Quality</title>
    <script src="https://kit.fontawesome.com/b87f3ad2d2.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    {{-- Wrapper Component --}}
    <div class="wrapper__container">
        {{-- Side Navbar --}}
        <div class="side__wrapper nav__wrapper">
            {{-- Sidebar Navbar --}}
            <div class="side__nav">
                {{-- Logo --}}
                <div class="side__navlogo nav__logo">
                    <a href="/">
                        <img src="{{ asset('asset/logo/bagian-logo.png') }}" alt="">
                    </a>
                </div>
                <div class="nav__container">
                    <div class="dashboard__links">
                        <a href="/" class="link__active active">
                            <ion-icon name="file-tray-stacked-sharp" class="ion-icon__setting"
                                style="margin-right:10px; display:inline-block; justify-content:center;align-items:center; bottom:20px">
                            </ion-icon>
                            Dashboard
                        </a>
                    </div>
                    <div class="program__links">
                        <a href="{{ route('penjelasan-aplikasi') }}">
                            <ion-icon name="rocket-sharp" class="ion-icon__setting"
                                style="margin-right:10px; display:inline-block; justify-content:center;align-items:center; bottom:20px">
                            </ion-icon>
                            Sistem Monitoring
                        </a>
                    </div>
                    <div class="nav__title">
                        <h1>Data Master</h1>
                    </div>
                    <div class="nav__item">
                        <div class="nav__list__dropdown btn-group">
                            <button type="button" class="btn dropdown-toggle nav__dropdown" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <ion-icon name="server-sharp" class="ion-icon__setting"
                                    style="margin-right:10px; display:inline-block; justify-content:center;align-items:center; bottom:20px">
                                </ion-icon>
                                Data Master
                            </button>
                            <ul class="dropdown-menu nav__dropdown--menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav__title">
                        <h1>Perhitungan</h1>
                    </div>
                    <div class="nav__item">
                        <div class="nav__list__dropdown btn-group">
                            <button type="button" class="btn dropdown-toggle nav__dropdown" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <ion-icon name="settings-sharp" class="ion-icon__setting"
                                    style="margin-right:10px; display:inline-block; justify-content:center;align-items:center; bottom:20px">
                                </ion-icon>
                                Perhitungan
                            </button>
                            <ul class="dropdown-menu nav__dropdown--menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- End Logo --}}
            </div>
            {{-- End Sidebar Navbar --}}
            {{-- Top Nav --}}
            <div class="top__nav">
                <div class="dropdown nav__dropdown--top">
                    <a class="btn dropdown-toggle dropdown__toggle--custome" role="button" id="dropdownTopMenu"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    <ul class="dropdown-menu dropdown__menu--top" aria-labelledby="dropdownTopMenu">
                        <li><a class="dropdown-item" href="{{ route('login-pages') }}">
                            <iclass="fa-sharp fa-solid fa-user user__icon"></iclass=>Login</a></li>
                    </ul>
                </div>
            </div>
            {{-- End Top Nav --}}
        </div>
        {{-- Wrapper Content --}}
        <div class="wrapper__content">
            <div class="title__index">
                <h1>Indeks Kualitas Udara</h1>
            </div>
            {{-- Danger Air Quality --}}
            <div class="content__danger__air--quality">
                <div class="card__wrapper">
                    <div id="backgroundColour" class="card__item air__quality--ctm">
                        <div id="backgroundColour2" class="card__content--item card__banner">
                            <img id="gambarEmot" src={{ asset('asset/vector/air-quality-very-danger.png') }} alt="">
                        </div>
                        <div class="card__title" id="kualitasUdara">
                            ---
                            <div class="index__info card__sub--head" id="hasilUdara">
                                ---
                            </div>
                        </div>
                        <div class="index__info__context" id="deskripsiUdara">
                            <strong>---</strong>
                        </div>
                    </div>
                    {{--  <div class="waves__svvgs">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill-opacity="1" d="M0,224L11.4,208C22.9,192,46,160,69,138.7C91.4,117,114,107,137,96C160,85,183,75,206,101.3C228.6,128,251,192,274,202.7C297.1,213,320,171,343,160C365.7,149,389,171,411,181.3C434.3,192,457,192,480,202.7C502.9,213,526,235,549,213.3C571.4,192,594,128,617,117.3C640,107,663,149,686,149.3C708.6,149,731,107,754,80C777.1,53,800,43,823,32C845.7,21,869,11,891,37.3C914.3,64,937,128,960,144C982.9,160,1006,128,1029,96C1051.4,64,1074,32,1097,64C1120,96,1143,192,1166,229.3C1188.6,267,1211,245,1234,245.3C1257.1,245,1280,267,1303,250.7C1325.7,235,1349,181,1371,154.7C1394.3,128,1417,128,1429,128L1440,128L1440,320L1428.6,320C1417.1,320,1394,320,1371,320C1348.6,320,1326,320,1303,320C1280,320,1257,320,1234,320C1211.4,320,1189,320,1166,320C1142.9,320,1120,320,1097,320C1074.3,320,1051,320,1029,320C1005.7,320,983,320,960,320C937.1,320,914,320,891,320C868.6,320,846,320,823,320C800,320,777,320,754,320C731.4,320,709,320,686,320C662.9,320,640,320,617,320C594.3,320,571,320,549,320C525.7,320,503,320,480,320C457.1,320,434,320,411,320C388.6,320,366,320,343,320C320,320,297,320,274,320C251.4,320,229,320,206,320C182.9,320,160,320,137,320C114.3,320,91,320,69,320C45.7,320,23,320,11,320L0,320Z"></path></svg>
                    </div>  --}}
                </div>
            </div>
            {{-- End Danger Air Quality --}}
            {{--  <div class="content__card">
                <div class="card__item card__item--vnh">
                    <div class="card__content--item card__banner--vnh">
                        <img src={{ asset('asset/vector/air-quality-not-healty.png') }} alt="">
                    </div>
                    <div class="card__title card__index--air">
                        Sangat Tidak Sehat
                        <div class="card__sub--head">
                            Indeks Kualitas udara
                        </div>
                    </div>
                </div>
                <div class="card__item card__item--nh">
                    <div class="card__content--item card__banner--nh">
                        <img src={{ asset('asset/vector/air-quality-not-good.png') }} alt="">
                    </div>
                    <div class="card__title card__index--air">
                        Tidak Sehat
                        <div class="card__sub--head">
                            Indeks Kualitas udara
                        </div>
                    </div>
                </div>
                <div class="card__item card__item--middle">
                    <div class="card__content--item card__banner--middle">
                        <img src={{ asset('asset/vector/air-quality-middle.png') }} alt="">
                    </div>
                    <div class="card__title card__index--air">
                        Sedang
                        <div class="card__sub--head">
                            Indeks Kualitas udara
                        </div>
                    </div>
                </div>
                <div class="card__item card__item--good">
                    <div class="card__content--item card__banner--good">
                        <img src={{ asset('asset/vector/air-quality-good.png') }} alt="">
                    </div>
                    <div class="card__title card__index--air">
                        Baik
                        <div class="card__sub--head">
                            Indeks Kualitas udara
                        </div>
                    </div>
                </div>
            </div>  --}}
            <div class="main__content">
                <div class="main__p">
                    <canvas id="airQuality"></canvas>
                </div>
            </div>
        </div>
        {{-- Wrapper Content --}}
        {{-- Side Navbar --}}
    </div>
    {{-- End Wrapper Component --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            getAirData(10);
        });

        function getAirData(sensor){
            if(sensor === undefined){
                sensor = 0;
            }
            let url = "{{ route('calculateAirQuality') }}";
            let urlGambar = "{{ asset('asset/vector/:name') }}";
            let gambar, cardClass, cardClass2, kualitas, hasil, deskripsi;
            $.ajax({
                type:'POST',
                url:url,
                data:{ xx: sensor, ia: 301, ib: 51, xa: 57.5, xb: 5 },
                dataType: "JSON",
                success:function(result){
                    console.log(result);
                    if(result.rentang === "Baik"){
                        gambar = urlGambar.replace(':name', 'air-quality-good.png');
                        cardClass = 'card__item card__item--good';
                        cardClass2 = 'card__content--item card__banner--good';
                        kualitas = result.rentang;
                        hasil  = result.result;
                        deskripsi = "Tingkat kualitas udara yang sangat baik, tidak memberikan efek negatif terhadap manusia, hewan dan tumbuhan.";
                    }
                    else if(result.rentang === "Sedang"){
                        gambar = urlGambar.replace(':name', 'air-quality-middle.png');
                        cardClass = 'card__item card__item--middle';
                        cardClass2 = 'card__content--item card__banner--middle';
                        kualitas = result.rentang;
                        hasil  = result.result;
                        deskripsi = "Tingkat kualitas udara masih dapat diterima pada kesehatan manusia, hewan dan tumbuhan.";

                    }
                    else if(result.rentang === "Tidak Sehat"){
                        gambar = urlGambar.replace(':name', 'air-quality-not-good.png');
                        cardClass = 'card__item card__item--nh';
                        cardClass2 = 'card__content--item card__banner--nh';
                        kualitas = result.rentang;
                        hasil  = result.result;
                        deskripsi = "Tingkat kualitas udara yang bersifat merugikan pada manusia, hewan dan tumbuhan.";

                    }
                    else if(result.rentang === "Sangat Tidak Sehat"){
                        gambar = urlGambar.replace(':name', 'air-quality-not-healty.png');
                        cardClass = 'card__item card__item--vnh';
                        cardClass2 = 'card__content--item card__banner--vnh';
                        kualitas = result.rentang;
                        hasil  = result.result;
                        deskripsi = "Tingkat kualitas udara yang dapat meningkatkan resiko kesehatan pada sejumlah segmen populasi yang terpapar.";

                    }
                    else if(result.rentang === "Berbahaya"){
                        gambar = urlGambar.replace(':name', "air-quality-very-danger.png");
                        cardClass = "card__item air__quality--bad";
                        cardClass2 = "card__content--item card__banner";
                        kualitas = result.rentang;
                        hasil  = result.result;
                        deskripsi = "Tingkat kualitas udara yang dapat merugikan kesehatan serius pada populasi dan perlu penanganan cepat.";
                    }
                    $('div#backgroundColour').attr('class', cardClass);
                    $('div#backgroundColour2').attr('class', cardClass2);
                    $('img#gambarEmot').attr('src', gambar);
                    htmlKualitas = kualitas + '<div class="index__info card__sub--head" id="hasilUdara">Indeks Kualitas udara : </div>';
                    $('div#kualitasUdara').html(htmlKualitas);
                    $('div#hasilUdara').html('Indeks Kualitas udara : <strong>' +  Number(hasil.toFixed(3))+'</strong>');
                    // console.log(hasil);
                    $('div#deskripsiUdara').html(deskripsi);
                },
                error:function(error){
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
        const ctx = document.getElementById('airQuality');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Berbahaya', 'Sangat Tidak Sehat', 'Tidak Sehat', 'Sedang', 'Baik'],
                datasets: [{
                    label: ' Indeks Kualitas Udara ',
                    data: [12, 19, 6, 5, 9],
                    borderWidth: 1.2,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>
