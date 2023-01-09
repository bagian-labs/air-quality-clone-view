@extends('default-pages')
@push('style')

@endpush

@section('content')
<div class="penjelasan__alat--content">
    <h1>Penjelasan Alat</h1>
    <div class="device__information">
        <div class="device__name">
            <div class="name">Nama Alat : </div>
            <div class="name__info">
                Sistem Monitoring Udara Portable Berbasis IoT
            </div>
        </div>
        <div class="device__model">
            <div class="model__name">Alat Yang Digunakan : </div>
            <div class="model__info">
                Node MCU ESP 32
            </div>
        </div>
    </div>
    <div class="devices__wrapper">
        <div class="device__info">
            <p>NodeMCU adalah platform IoT yang mempunyai sifat
                <i>opensource</i> . NodeMCu ini terdiri dari perangkat keras yang merupakan <i>System On Chip ESP
                    32</i>.
                Mikrokontroller ini menggunakan firmware dan menggunakan bahasa pemrograman scripting Lua. ESP 32
                sendiri
                adalah mikeokontroler yang sudah dikenalkan oleh <i>Espressif System</i> yang berarti penerus dari
                mikrokontroler ESP8266. Dalam mikrokontroler ini sudah terdapat modul WiFi yang terletak dalam
                <i>chip</i>
                sehingga sangat hal ini tentu akan mendukung sekali untuk pembuatan sistem pengaplikasian <i>Internet of
                    Things</i>. Salah satu keunggulan dari mikrokontroler yang lain adalah mulai dari pin out yang
                dimiliki
                lebih banyak, memiliki pin analogi yang lebih banyak, memori yang besar, menggunakan bluetooth 4.0
                <i>low
                    energy</i>.
            </p>
            <div class="device__banner">
                <figure>
                    <img src="{{ asset('asset/images/pict-2.jpg') }}" alt="">
                </figure>
            </div>
        </div>
        <div class="device__info">
            <h1>Sensor DHT11</h1>
            <p>Sensor DHT11 adalah module sensor yang memiliki keandalan dan stabilitas tinggi karena sinyal digital
                yang dikalibrasi. Sensor ini berfungsi untuk mensesnsing objek suhu dan kelembaban yang memiliki output
                tegangan analog yang dapat diolah lebih lanjut menggunakan mikrokontroler. Sensor ini memiliki kelebihan
                dari segi kualitas pembacaan data sensing yang lebih responsig dan memiliki kecepatan dalam sensing
                objek suhu dan kelembapan.
            </p>
            <div class="device__banner">
                <figure>
                    <img src="{{ asset('asset/images/sensorDHT11.png') }}" alt="">
                </figure>
            </div>
        </div>
        <div class="device__info">
            <h1>Sensor MQ135</h1>
            <p>MQ-135 Air Quality Sensor adalah sensor yang memonitor kualitas udara untuk mendeteksi gas amonia (NH3),
                natrium-(di)oksida (Nox), alkohol / ethanol (C2H5OH), enzena (C6H6), karbondioksida (CO2), gas belerang
                / sulfurhidroksida (H2S) dan asap / gas-gas lainnya di udara. Pin keluaran ini nantinya akan di
                sambungkan dengan pin ADC ( <i>analog to digital converter</i> ) di mikrokontroler / pin analog input
                NodeMCU
                dengan menambahkan satu buah resistor saja (berfungsi sebagai pembagi tegangan / <i>voltage
                    divider</i> ).
            </p>
            <div class="device__banner">
                <figure>
                    <img src="{{ asset('asset/images/sensorMQ135.png') }}" alt="">
                </figure>
            </div>
        </div>
        <div class="device__info">
            <h1>Sensor MQ7</h1>
            <p>MQ-7 merupakan sensor gas yang digunakan dalam peralatan untuk mendeteksi gas karbon monoksida (CO) dalam
                kehidupan sehari-hari, industri, atau mobil. MQ-7 ini tentu mempunyai sensivitas yang sangat tinggi
                terhadap karbon monoksida (CO).
            </p>
            <div class="device__banner">
                <figure>
                    <img src="{{ asset('asset/images/sensorMQ7.png') }}" alt="">
                </figure>
            </div>
        </div>
        <div class="device__info">
            <h1>GPS</h1>
            <p>GPS adalah sebuah alat yang mampu menterjemahkan dan menampilkan ID2 sehingga bisa dipakai sebagai
                petunjuk atau tempat atau posisi. Selain posisi lintang (X) dan bujur (Y), GPS juga mampu menterjemahkan
                posisi ketinggian (Z). GPS juga merupakan sebuah sistem untuk menentukan letak di permukaan bumi dengan
                bantuan penyelarasan sinyal satelit. Sistem ini akan menggunakan 24 satelit yang dimana sinyal
                gelombangnya akan dikirim ke mikro bumi. Sinyal ini diterima oleh alat penerima di permukaan dan
                digunakan untuk menentukan letak, kecepatan, arah, dan waktu. GPS ini bekerja pada gelombang UHF yang
                mampu menembus kaca, awan dan plastik. Akan tetapi benda-benda padat seperti gedung, pohon dan
                benda-benda lainnya dapat menghalangi kerja penerimaan sinyal GPS.
            </p>
            <div class="device__banner">
                <figure>
                    {{-- <img src="{{ asset('asset/images/sensorMQ7.png') }}" alt=""> --}}
                </figure>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush