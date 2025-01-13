<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="author" content="Akkaskin">
    <meta name="description" content="Reservasi Digital Akkaskin">

    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Core Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Font Icons -->
    <link rel="stylesheet" href="{{ asset('css/frontend/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/one-page/css/et-line.css') }}">

    <!-- One Page Module Specific Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/one-page/onepage.css') }}">

    <link rel="stylesheet" href="{{ asset('css/frontend/components/select-boxes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/components/datepicker.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/frontend/custom.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Akkaskin | Reservasi Digital</title>

</head>

<body class="stretched" data-loader="11" data-loader-color="#543456">

    <div id="wrapper">

        <header id="header" class="full-header transparent-header header-size-custom" data-sticky-shrink="false" data-sticky-offset="full" data-sticky-offset-negative="auto">
            <div id="header-wrap">
                <div class="container">
                    <div class="header-row">

                        <div id="logo">
                            <a href="index.html">
                                <img class="logo-default" src="{{ asset('images/logo.png') }}" alt="Akkaskin">
                                <img class="logo-dark" src="{{ asset('images/logo.png') }}" alt="Akkaskin">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        <section id="slider" class="slider-element slider-parallax min-vh-100 include-header">
            <div class="slider-inner" style="background-image: url('images/klinik.jpeg');">

                <div class="vertical-middle slider-element-fade">
                    <div class="container py-5">
                        <div class="row align-items-center col-mb-50">
                            <div class="offset-md-1 col-lg-4 col-md-6 order-md-last">
                                <div class="card" style="border-color: #eee;">
                                    <div class="card-body" style="padding: 30px;">
                                        <form action="#" class="row">
                                            <div class="col-12 mb-3">
                                                <label for="" class="text-capitalize fw-semibold">Nomor Identitas</label>
                                                <input type="text" name="identitas" value="" class="form-control not-dark">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="" class="text-capitalize fw-semibold">Nama</label>
                                                <input type="text" name="nama" value="" class="form-control not-dark">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="" class="text-capitalize fw-semibold">Nomor Telepon</label>
                                                <input type="text" name="telepon" value="" class="form-control not-dark">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="" class="text-capitalize fw-semibold">Alamat</label>
                                                <input type="text" name="alamat" value="" class="form-control not-dark">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="" class="text-capitalize fw-semibold">Dokter</label>
                                                <select name="dokter" class="select-1 form-select" style="width:100%;">
                                                    @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor['id'] }}">
                                                        {{ $doctor['nama_dokter'] }} ({{ $doctor['jadwal_mulai'] }} - {{ $doctor['jadwal_selesai'] }})
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="" class="text-capitalize fw-semibold">Tanggal Pemeriksaan</label>
                                                <input type="text" name="tanggal" value="" class="form-control text-start component-datepicker today" placeholder="YYYY-MM-DD">
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="fw-normal text-capitalize button button-border button-circle m-0" value="submit">Jadwalkan Pemeriksaan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="offset-lg-1 col-md-5">
                                <h2>Reservasi Digital Akka Skin</h2>

                                <div class="testi-content">
                                    <p>Jadwalkan pemeriksaan anda dengan dokter terbaik klinik Akka Skin</p>
                                    <p>Isi formulir di samping dengan data diri anda, jadwal dan dokter yang anda inginkan.
                                        Pendaftaran anda akan masuk ke sistem kami dan anda bisa langsung datang ke klinik untuk pemeriksaan.
                                    </p>
                                </div>
                                <div class="d-block d-md-none mt-5"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="video-wrap" style="z-index:1;">
                    <div class="video-overlay" style="background: rgba(255,255,255,0.8);"></div>
                </div>

                <a href="#" data-scrollto="#section-about" data-easing="easeInOutExpo" data-speed="1250" data-offset="65" class="one-page-arrow"><i class="bi-chevron-down infinite animated fadeInDown"></i></a>

            </div>
        </section>

        <section id="content">
            <div class="content-wrap py-0">

                <div id="section-about" class="text-center page-section">

                    <div class="container">

                        <h2 class="mx-auto mb-5 font-body" style="max-width: 700px; font-size: 40px;">
                            Kebijakan Layanan Digital Akka Skin
                        </h2>

                        <p class="lead mx-auto mb-5" style="max-width: 800px;">
                            Akka Skin menjamin keamanan data anda saat melakukan penjadwalan digital,
                            namun kami tidak menjamin setiap jadwal bisa dilayani atas beberapa alasan seperti dokter yang berhalangan
                            hadir atau adanya situasi mendadak yang mengakibatkan penjadwalan klinik menjadi terganggu.
                            Apabila terjadi gangguan terhadap jadwal pemeriksaan anda, informasi lanjutan akan segera disampaikan oleh petugas kami.
                        </p>

                        <div class="clear"></div>

                    </div>
                </div>

            </div>
        </section>

    </div>

    <script src="{{ asset('js/frontend/plugins.min.js') }}"></script>
    <script src="{{ asset('js/frontend/functions.bundle.js') }}"></script>
    <script src="{{ asset('js/frontend/components/select-boxes.js') }}"></script>
    <script src="{{ asset('js/frontend/components/datepicker.js') }}"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".select-1").select2();

            jQuery('.component-datepicker.today').datepicker({
                autoclose: true,
                startDate: "today",
                todayHighlight: true,
                format: "yyyy-mm-dd",
            });

            // Handle form submission
            jQuery('form').submit(function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Collect form data
                let nama = jQuery('input[name="nama"]').val();
                let identitas = jQuery('input[name="identitas"]').val();
                let telepon = jQuery('input[name="telepon"]').val();
                let alamat = jQuery('input[name="alamat"]').val();
                let dokter = jQuery('select[name="dokter"]').val();
                let tanggal = jQuery('input[name="tanggal"]').val();

                // First POST request to create pasien
                jQuery.ajax({
                    url: 'https://supri-reservasi.test/api/records/pasiens',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        nama_pasien: nama,
                        nomor_identitas: identitas,
                        nomor_telepon: telepon,
                        alamat: alamat
                    }),
                    success: function(response) {
                        // Get the ID of the pasien created
                        let pasienId = response;

                        // Second POST request to create reservasi
                        jQuery.ajax({
                            url: 'https://supri-reservasi.test/api/records/reservasis',
                            method: 'POST',
                            contentType: 'application/json',
                            data: JSON.stringify({
                                tanggal_reservasi: tanggal,
                                pasien_id: pasienId,
                                dokter_id: dokter,
                                status_reservasi: 'terjadwal'
                            }),
                            success: function(reservasiResponse) {
                                // Hide the form and show a success message
                                jQuery('form').hide();
                                jQuery('form').after('<p>Reservasi anda telah disimpan ke sistem kami.</p>');
                            },
                            error: function(error) {
                                alert('Error in creating reservasi.');
                            }
                        });
                    },
                    error: function(error) {
                        alert('Error in creating pasien.');
                    }
                });
            });
        });
    </script>


</body>

</html>