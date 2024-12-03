@layout

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Soal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- font-awesome --}}
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
        /* CSS styles */
        .form-group {
            margin-bottom: 1rem;
            width: 10%;
        }
        .input-group {
            margin-bottom: 1rem;
        }
        
        .form-check-inline {
            margin-right: 1rem;
        }
        
        /* Style to center the form */
        .centered-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        /* Custom style for widening the question and answer */
        .widen {
            margin-right: 0;
            margin-left: 0;
            width: 90%;
        }
        .form-control2 {
            text-align: left;
        }
        
        .form-check-input:checked{
            background-color:#33CEAD;
        }
        .form-check-label{
            width: 100%;
        }
        
        .custom-card {
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        @media (max-width: 767px) {
            .custom-card {
                border-radius: 5px;
            }
        }

        .custom-card:hover {
            transform: scale(.5);
            transition: transform 0.3s ease;
        }

        .custom-button-level {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            border: 1.5px solid #F7A040;
            border-radius: 10px;
            padding: 6px 8px;
            margin: 5px 0;
            width: auto;
            font-size: 10px;
        }

        .custom-button-topik {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            border: 1.5px solid #ED5564;
            border-radius: 10px;
            padding: 6px 8px;
            margin: 5px 0;
            width: auto;
            font-size: 10px;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .button-group span {
            font-size: 12px;
        }

        .card-body {
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }

        .card-body div {
            margin-right: 10px;
        }

        .col-sm-3 {
            flex: 0 0 calc(25% - 10px); /* Ubah 33.333% menjadi 25% */
            margin: 0 5px;
        }

        .content-question p {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
        }

        .card-total-question {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            border-radius: 30px;
        }
        .card-total-question h5 p {
            margin-left: 50px !important;
        }

        .card-content,
        .card-subtitle {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        header h1 {
            margin: 0;
        }

        .header-right {
            display: flex;
            align-items: center;
        }

        .header-right > * {
            margin-left: 10px;
            
        }
        .header-right button {
            background-color: #F4841B;
            color: aliceblue;
            border-radius:5px; 
        }
        .header-right input{
            border-radius: 5px;
            color :#d1d1d1;
        }

        .dash-cartSection {
            position: fixed;
            top: 0;
            right: 0;
            max-height: 100%;
            width: 60%;
            background-color: var(--primary-bg-color);
            transition: transform 0.3s ease-in-out;
            z-index: 999;
            display: flex;
            flex-direction: column;
            border-radius: 0px 0px 0px 15px;
            -webkit-border-radius: 0px 0px 0px 15px;
            -moz-border-radius: 0px 0px 0px 15px;
            border: 1.5px ridge var(--primary);
            border-top: none;
            border-right: none;
            transform: translateX(130%);
            }

        .dash-cartSection.show {
             transform: translateX(0%);
             
        }
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Warna latar belakang semi-transparan */
            z-index: 998; /* Atur z-index lebih rendah dari dash-cartSection */
            display: none; /* Mulai dengan menyembunyikan overlay */
        }

        /* dash-card */
        .custom-card {
                        border-radius: 10px;
                        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
                        position: relative;
                        overflow: hidden;
                    }

                    .custom-card:hover {
                        transform: scale(1.05);
                        transition: transform 0.3s ease;
                        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
                    }

                    .custom-button-level {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: white;
                        border: none;
                        border-radius: 10px;
                        background-color: #1AB394;
                        padding: 6px 8px;
                        margin: 5px 0;
                        width: auto;
                        font-size: 10px;
                    }

                    .custom-button-topik {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        background-color: #799DB7;
                        border: none;
                        color: white;
                        border-radius: 10px;
                        padding: 6px 8px;
                        margin: 5px 0;
                    }

                    .button-group {
                        display: flex;
                        flex-direction: column;
                        align-items: flex-start;
                        margin-right: 0px;
                    }

                    .button-group button {
                        width: 100%;
                        text-align: center;
                    }

                    .button-group button span {
                        font-size: 11px;
                    }

                    .card-body {
                        display: block;
                        justify-content: space-between;
                        padding: 13px;
                    }

                    .content-question p {
                        overflow: hidden;
                        text-overflow: ellipsis;
                        display: -webkit-box;
                        -webkit-line-clamp: 4;
                        -webkit-box-orient: vertical;
                    }

                    .card-total-question {
                        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
                        border-radius: 25px;
                        padding: 10px;
                    }

                    .card-content,
                    .card-subtitle {
                        display: flex;
                    }

                    .total-question-content hr {
                        height: 2px;
                        margin-top: -4px;
                        margin-bottom: -1px;
                    }

            /* Modal */
            .modal-header button {
                        margin-top: 10px;
                        color: white;
                        border-radius: 5px;
                        border: none;
                        padding: 8px 10px;
                        font-size: 15px;
                    }

                    .button-level-group {
                        display: flex;
                        align-items: flex-start;
                    }

                    .modal.fade .modal-header .modal-title {
                        color: black !important;
                        font-weight: bold;
                        font-size: 24px;
                    }

                    .modal.fade * {
                        font-family: "Poppins", "Open-Sans" !important;
                    }

                    .modal-body .form-check-label p {
                        font-weight: normal;
                    }
                    

                    .form-check-input:checked+.form-check-label {
                        color: #1AB394 !important;
                    }
                    .simpan-topik{
                        background-color: #F4841B;
                        color: aliceblue;
                        border-radius:5px; 
                        border-color: #00000000
                    }
                    .batal-topik{
                        background-color: #00000000;
                        color: #C8C8D0;
                        border-radius:5px; w
                        border-color: #00000040
                    }
                    .modal-body{
                        border: none;
                    }
                    .modal-header, .modal-footer {
                        border: none;
                    }


    
    </style>
</head>
<body>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"> Serdos 1</h4>
                    <div class="button-level-group">
                        <button class="custom-button-level"
                            style="margin-right: 10px;"><span>Mudah</span></button>
                        <button type="button" style="background-color: #FAC477">Kompetensi Dasar</button>
                    </div>


                </div>

                <div class="modal-body">
                    <p style="font-weight: bold;">Bagaimana seseorang dapat kehilangan kewarganegaraannya?</p>
                    {{-- Pengulangan untuk option pilgan --}}
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                            id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            <p>Default radio</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                            id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            <p>Default radio</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                            id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            <p>Default radio</p>
                        </label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <input type="checkbox" id="deleteToggle" checked data-toggle="toggle"
                        style="border-radius: 5px;">
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Form Soal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <header>
        <h1>PAKET UJIAN</h1>
        <div class="header-right">
            
            <button id="tambah-topik"type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1">+ Paket Baru</button>
        </div>
  
    </header>
    <br>
    <br>
        <div class="row">
            <div class="col-sm-3 col-6 mb-4"> <!-- Changed col-sm-4 to col-sm-3 -->
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="button-group"> <!-- Added margin-bottom for spacing -->
                            <div style="font-size:12px; color: #ffffff; background-color: #58819F; padding: 2px 15px; border-radius:70px; text-align: center;">Aktif</div>
                            <h5 style="margin-bottom: 10px; margin-top: 10px; font-size: 20px; font-weight: bold;">Paket 02</h5>
                            {{-- <hr style="border-width: 5px; width: 30px; border-color: #1ab39400;"> --}}

                            <p style="font-size:14px; color:#B0B0B0; font-weight: 500;">
                                <i class="bi bi-folder" style="margin-right: 5px;"></i>5 Topik
                            </p>
                            <p style="font-size:14px; color:#B0B0B0; font-weight: 500;">
                                <i class="bi bi-file-earmark-text" style="margin-right: 5px;"></i>50 Soal
                            </p>
                        </div>
                        <div class="content-question"> <!-- Removed margin-top to align vertically -->
                            <button id="OpenModalBtn3" style="background-color:#58819F; color: #ffffff; font-size: 14px; text-align: center; font-weight: 500; width: 100%; border: none; padding: 10px; border-radius: 5px;">Lihat Detail Paket</button>
                        </div>
                    </div>
                </div>
            </div>

{{-- tidak aktif --}}
            <div class="col-sm-3 col-6 mb-4"> <!-- Changed col-sm-4 to col-sm-3 -->
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="button-group"> <!-- Added margin-bottom for spacing -->
                            <div style="font-size:12px; color: #ffffff; background-color: #888888; padding: 2px 15px; border-radius:70px; text-align: center;">Tidak Aktif</div>
                            <h5 style="margin-bottom: 10px; margin-top: 10px; font-size: 20px; font-weight: bold;">Paket 01</h5>
                            {{-- <hr style="border-width: 5px; width: 30px; border-color: #1ab39400;"> --}}

                            <p style="font-size:14px; color:#B0B0B0; font-weight: 500;">
                                <i class="bi bi-folder" style="margin-right: 5px;"></i>5 Topik
                            </p>
                            <p style="font-size:14px; color:#B0B0B0; font-weight: 500;">
                                <i class="bi bi-file-earmark-text" style="margin-right: 5px;"></i>50 Soal
                            </p>
                        </div>
                        <div class="content-question"> <!-- Removed margin-top to align vertically -->
                            <button id="OpenModalBtn3" style="background-color:#888888; color: #ffffff; font-size: 14px; text-align: center; font-weight: 500; width: 100%; border: none; padding: 10px; border-radius: 5px;">Lihat Detail Paket</button>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>

        {{-- tidak aktif --}}
    
    
    
   
        
                            
        <!-- Tambah elemen col-sm-3 col-6 mb-4 sebanyak yang diperlukan -->
    </div>
    <section id="dash-cartSection" class="dash-cartSection">        
        <div class="row" style="background-color:white; margin:auto; overflow-y: auto;">           
            <i class="bi bi-arrow-right-circle-fill" style="font-size: 40px; color: #58819F; cursor: pointer;"></i>   
            <h1 style="color: #1AB394">Topik Matematika</h1>
            <div class="col-md-6 mt-4">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="button-group">
                            <button class="custom-button-level"><span>Mudah</span></button>
                            <button class="custom-button-topik"><span>Kompetensi
                                    Dasar</span></button>
                        </div>
                        <div class="content-question">
                            <p style="font-size: 12px; font-weight: 500;"> Itu pun banyak ilmuwan terapan yang
                                meminjam ilmu dasar atau ilmu terapan lain
                                sehingga
                                terbentuk program multidisiplin seperti arsitektur yang dijodohkan dengan
                                antropologi atau
                                arkeologi, akuntansi dengan ilmu keuangan.</p>
                            <a id="OpenModalBtn1"
                                style="color:grey; font-size: 14px; align-self: flex-end;">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="button-group">
                            <button class="custom-button-level"><span>Mudah</span></button>
                            <button class="custom-button-topik"><span>Kompetensi
                                    Dasar</span></button>
                        </div>
                        <div class="content-question">
                            <p style="font-size: 12px; font-weight: 500;"> Itu pun banyak ilmuwan terapan yang
                                meminjam ilmu dasar atau ilmu terapan lain
                                sehingga
                                terbentuk program multidisiplin seperti arsitektur yang dijodohkan dengan
                                antropologi atau
                                arkeologi, akuntansi dengan ilmu keuangan.</p>
                            <a id="OpenModalBtn1"
                                style="color:grey; font-size: 14px; align-self: flex-end;">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="overlay"></div>    
    <script>
        $(document).ready(function() {
            $('#OpenModalBtn1, #OpenModalBtn2, #OpenModalBtn3').click(function() {
                $('#exampleModal').modal('show');
            });
        });
    </script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('simpan').addEventListener('click', function () {
                Swal.fire({
                position:"center",
                icon: "success",
                title: "Berhasil!!",
                showConfirmButton: false,
                text:"Topik Berhasil Ditambahkan",
                timer: 1500
});
                    }
                )});
    </script> --}}
    

    <script>
        $(document).ready(function() {
            function setButtonColor() {
                $('.custom-button-level').each(function() {
                    var level = $(this).find('span').text().trim();
                    var backgroundColor;

                    switch (level) {
                        case 'Sulit':
                            backgroundColor = '#F57781';
                            break;
                        case 'Sedang':
                            backgroundColor = '#FAC477';
                            break;
                        case 'Mudah':
                            backgroundColor = '#1AB394';
                            break;
                        default:
                            backgroundColor = '#F57781';
                    }

                    $(this).css('background-color', backgroundColor);
                });
            }
            setButtonColor();
        });
    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const btn = document.getElementById('OpenModalBtn3');
        const hiddenSection = document.getElementById('dash-cartSection');
        const overlay = document.getElementById('overlay');
        const backButton = document.querySelector('.bi.bi-arrow-right-circle-fill');

        btn.addEventListener('click', function () {
        hiddenSection.classList.toggle('show'); // Tambahkan atau hapus kelas show
        overlay.style.display = hiddenSection.classList.contains('show') ? 'block' : 'none'; // Tampilkan atau sembunyikan overlay
    });

        backButton.addEventListener('click', function () {
        hiddenSection.classList.remove('show'); // Hapus kelas show untuk menyembunyikan bagian
        overlay.style.display = 'none'; // Sembunyikan overlay
    });
});
    </script>
</body>
</html>