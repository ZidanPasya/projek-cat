<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Soal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- font-awesome --}}
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
        /* Your custom styles here */
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

        .centered-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .widen {
            margin-right: 0;
            margin-left: 0;
            width: 90%;
        }

        .form-control2 {
            text-align: left;
        }

        .form-check-input:checked {
            background-color: #33CEAD;
        }

        .form-check-label {
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
            padding: 15px;
        }

        .card-body div {
            margin-right: 10px;
        }

        .col-sm-3 {
            flex: 0 0 calc(25% - 10px);
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

        .header-right>* {
            margin-left: 10px;

        }

        .header-right button {
            background-color: #F4841B;
            color: aliceblue;
            border-radius: 5px;
        }

        .header-right input {
            border-radius: 5px;
            color: #d1d1d1;
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
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 998;
            display: none;
        }

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
            margin-right: 10px;
        }

        .button-group button {
            width: 100%;
            text-align: center;
        }

        .button-group button span {
            font-size: 11px;
        }

        .card-body {
            display: flex;
            justify-content: space-between;
            padding: 13px;
        }

        .content-question p {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            margin-bottom: 10px;
        }

        .custom-card-title {
            font-size: 14px;
        }

        .custom-card-subtitle {
            font-size: 12px;
            color: #888;
        }

        .detail-modal {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .modal-body p {
            margin-bottom: 15px;
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
        <h1>Topik</h1>
        <div class="header-right">
            <input type="search" id="search" name="search" placeholder="Cari Topik">
            <button id="tambah-topik"type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1">+ Topik Baru</button>
        </div>

        {{-- Modals --}}
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Topik</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="/topik" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nm_topik" class="col-form-label">Topik Baru</label>
                                <input type="text" class="form-control" id="nm_topik" name="nm_topik">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <br>
    <br>
    <div class="row">
        @foreach ($topiks as $topik)
        <div class="col-sm-3 col-6 mb-4">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="button-group">
                        <span class="bi bi-list-task" style="font-size:24px; color: #ffffff; background-color: #58819F; padding: 5px 10px; border-radius:50%;"></span>
                        <h5 style="margin-bottom: -10px; margin-top: 10px;font-size: 14px; font-weight: bold;">{{ $topik->nm_topik }}</h5>
                        <hr style="border-width: 5px; width: 30px; border-color: #1AB394;">
                        <p style="font-size:14px; color:#B0B0B0; margin-top: 10px; font-weight: 500;">{{$soals->where('id_topik', $topik->id)->count()}}</p>
                    </div>
                    <div class="content-question" style="margin-top: 110px;">
                        <a href="#" class="lihat-soal" style="color:#1AB394; font-size: 14px; text-align: right; font-weight: 500;" data-id="{{ $topik->id }}">Lihat List Soal</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    
    <section id="dash-cartSection" class="dash-cartSection">
        <i class="bi bi-arrow-right-circle-fill" style="font-size: 40px; color: #58819F; cursor: pointer;" id="closeCart"></i>
        <div class="container">
            <div class="row" id="cartContent"></div>
        </div>
    </section>
    
    <div id="overlay"></div>
    <div id="overlay"></div>
    <div id="dash-cartSection" class="dash-cartSection">
        <div class="container">
            <div class="row" id="test5">
                <!-- Dynamic content will be inserted here -->
            </div>
        </div>
        <button class="bi bi-arrow-right-circle-fill" id="closeCart">Close</button>
    </div>
    </script>

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
    
            const overlay = $('#overlay');
            const cartSection = $('#dash-cartSection');
    
            function toggleCartSection(show) {
                if (show) {
                    cartSection.addClass('show');
                    overlay.show();
                } else {
                    cartSection.removeClass('show');
                    overlay.hide();
                }
            }
    
            $(document).on('click', '.lihat-soal', function() {
                const id = $(this).data('id');
                $.ajax({
                    url: `/topik/${id}`,
                    method: 'GET',
                    success: function(response) {
                        const cartContent = $('#cartContent');
                        cartContent.empty();
                        response.forEach(item => {
                            const card = `
                                <div class="col-md-6 mt-4">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div class="button-group">
                                                <button class="custom-button-level"><span>${item.tingkat_kesulitan.nm_tingkat_kesulitan}</span></button>
                                                <button class="custom-button-topik"><span>${item.topik.nm_topik}</span></button>
                                            </div>
                                            <div class="content-question">
                                                <p style="font-size: 12px; font-weight: 500;">${item.pertanyaan}</p>
                                                <a href="#" class="detail-soal" data-toggle="modal" data-target="#exampleModal" style="color:grey; font-size: 14px; align-self: flex-end;">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                            cartContent.append(card);
                        });
                        setButtonColor();
                        toggleCartSection(true);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
    
            $('#closeCart, #overlay').on('click', function() {
                toggleCartSection(false);
            });
        });
    </script>
</body>
</html>