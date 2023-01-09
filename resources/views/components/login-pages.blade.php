<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('asset/css/login-styles/login-styles.css') }}">
    <title>Login To Database</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    {{-- jQuery CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
        integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="icon" type="image/icon" href="{{ asset('asset/favicon/favicon.ico') }}">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="login__wrapper login__container">
        <div class="flex login__inner">
            {{-- Side right --}}
            <div class="side__login__no--wrap">
                <div class="side__login__content side__login__air">
                    <div class="login__logo">
                        <img src="{{ asset('asset/logo/bagian-logo.png') }}" alt="">
                    </div>
                    <section class="login__form__wrapper">
                        <h1 id="txtTitle">Login</h1>
                        <p id="txtDaftar">Login dibutuhkan untuk dapat menggunakan aplikasi dan mengakses Dashboard.</p>
                    </section>
                    {{-- Start Form For login Goes Here --}}
                    <form method="post" id="formLogin" action="{{ route('email-login') }}" class="form__login">
                        @csrf
                        {{-- Login Input --}}
                        <div class="login login__in">
                            <label for="validationCheckMail" class="form-label login__label__name">Email</label>
                            <input type="email" class="form-control @error('emailError') is-invalid @enderror"
                                name="validationCheckMail" id="validationCheckMail" value="" required
                                placeholder="@emailanda.com">
                            <div class="invalid-feedback">
                                Email anda belum terdaftar !
                            </div>
                        </div>
                        {{-- End Login Input --}}
                        {{-- Password Input --}}
                        <div class="login login__in password__in">
                            <label for="validationCheckPassword" class="form-label login__label__name">Password</label>
                            <input type="password" class="form-control @error('passwordError') is-invalid @enderror"
                                name="validationCheckPassword" id="validationCheckPassword" value="" required
                                placeholder="password anda">
                            <div class="invalid-feedback">
                                Tolong periksa password anda !
                            </div>
                        </div>
                        {{-- End Password Input --}}

                        {{-- Submit Button --}}
                        <div class="submit__btn">
                            <button class="btn btn__submit" type="submit" id="btnSubmit">Login</button>
                            <button class="btn__daftar" onclick="daftar('daftar')" id="btnDaftar">Belum punya akun
                                ?</button>
                        </div>
                        {{-- End Submit Button --}}
                        {{-- Google Btn Login --}}
                        <div class="google__form">
                            <span>Atau masuk dengan menggunakan</span>
                            <a href="javascript:;" id="googleLogin" class="btn__google">
                                Google
                            </a>
                        </div>

                        {{-- End Google Btn Login --}}
                    </form>
                    {{-- End Form For login Goes Here --}}
                </div>
                <div class="copy__">
                    <p>Template Created by <span> <a href="https://www.instagram.com/bubbblee.projects/"
                                target="__blank">Bagian Projects</a> </span></p>
                </div>
            </div>
            {{-- End Side right --}}
            {{-- Side Left --}}
            <div class="side__content__login--no-wrap">
                <ul class="background">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            {{-- End Side Left --}}
        </div>
    </div>

    {{-- Bootstrap 5 Form Field --}}
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    {{-- End Bootstrap 5 Form Field --}}

    {{-- Firebase Config --}}

    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-firestore.js"></script>

    <script>
        const firebaseConfig = {
            apiKey: "AIzaSyBMNJQkM82Kk67FgL0HB5K6jH0nEkhg15U",
            authDomain: "air-quality-799fb.firebaseapp.com",
            databaseURL: "https://air-quality-799fb-default-rtdb.asia-southeast1.firebasedatabase.app",
            projectId: "air-quality-799fb",
            storageBucket: "air-quality-799fb.appspot.com",
            messagingSenderId: "546958946183",
            appId: "1:546958946183:web:8ef9556d32a40ddb166d22"
        };

        firebase.initializeApp(firebaseConfig);
        var URL = $('meta[name="baseURL"]').attr('content');

        console.log("Firebase started.");

        var googleProvider = new firebase.auth.GoogleAuthProvider();
    </script>
    <script>
        $('#googleLogin').click(function() {

            firebase.auth()
                .signInWithPopup(googleProvider)
                .then((result) => {
                    /** @type {firebase.auth.OAuthCredential} */
                    var credential = result.credential;

                    var token = credential.accessToken;
                    var user = result.user;
                    console.log(user)

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ route('google-login') }}",
                        type: "post",
                        dataType: "json",
                        data: user.providerData[0],
                        success: function(data) {
                            if (data.status == "success") {
                                {
                                    {
                                        // alert("Sucessfully logged");
                                    }
                                }
                                window.location.href = "{{ route('dashboard') }}"
                            } else {
                                {
                                    {
                                        // alert("Something went wrong here");
                                    }
                                }
                            }
                        },
                        error: function(error) {
                            alert("Error occured");
                        }
                    })
                }).catch((error) => {
                    var errorCode = error.code;
                    var errorMessage = error.message;
                    var email = error.email;
                    var credential = error.credential;
                    console.log(error)
                });
        })
    </script>
    <script>
        function daftar(status) {
            if (status === 'daftar') {
                $('h1#txtTitle').html('Daftar');
                $('p#txtDaftar').html('Silahkan daftar jika belum memiliki akun untuk menggunakan dashboard.');
                $('button#btnDaftar').attr('onclick', 'daftar("login")');
                $('form#formLogin').attr('action', '{{ route('email-register') }}');
                $('button#btnSubmit').html('Simpan');
                $('button#btnDaftar').html('Sudah punya akun ?');
            } else if (status === 'login') {
                $('h1#txtTitle').html('Login');
                $('p#txtDaftar').html('Login dibutuhkan untuk dapat menggunakan aplikasi dan mengakses Dashboard.');
                $('button#btnDaftar').attr('onclick', 'daftar("daftar")');
                $('form#formLogin').attr('action', '{{ route('email-login') }}');
                $('button#btnSubmit').html('Login');
                $('button#btnDaftar').html('Belum punya akun ?');
            }

        }
    </script>
    <script>
        @error('errorMsg')
            console.log('{{ $message }}');
        @enderror
    </script>
</body>

</html>
