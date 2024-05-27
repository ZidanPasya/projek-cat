@extends('layout')

@section('content')
    <style>
        .ibox-content {
            color: black;
        }

        .main {
            font-family: "Poppins", "Open-Sans";
            letter-spacing: .2px;
        }

        .main-wrapper {
            display: flex;
        }

        .left-side {
            flex: 1;

        }

        .right-side {
            flex: 2;
            margin-left: 40px;
        }

        .step-one,
        .step-two {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .number-icon {
            display: flex;
            align-items: center;
            color: #58819F;

        }

        .number-icon .bi {
            margin-right: 30px;
        }

        .number-icon .bi.bi-circle-fill {
            margin-top: auto;
            margin-bottom: auto;
        }

        .number-icon .bi.bi-1-circle-fill {
            margin-top: auto;
            margin-bottom: auto;
        }

        /* style untuk card */
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
            padding: 6px 8px;
            margin: 5px 0;
            width: auto;
            font-size: 10px;
        }

        /* style check-box */
        .custom-card {
            display: flex;
            flex-direction: row-reverse;
            /* Membalikkan arah tata letak ke kanan */
        }

        .custom-card .content-question {
            flex-grow: 1;
            /* Menempatkan konten di tengah */
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
            font-size: 9px;
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
        }

        #buatPaket {
            padding: 8px 16px;
            background-color: #58819F;
            color: white;
            border: none;
            border-radius: 8px;
            align-content: flex-start;
        }

        #backButton {
            padding: 8px 16px;
            background-color: #ED5564;
            color: white;
            border: none;
            border-radius: 8px;
            align-content: flex-start;
        }

        #simpanPaket {
            padding: 8px 16px;
            background-color: #58819F;
            color: white;
            border: none;
            border-radius: 8px;
            align-content: flex-start;
        }
    </style>
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <h2 style="font-family: 'Open Sans', sans-serif !important; font-weight: 600;">FORM PAKET BARU</h2>
                <div class="main">

                    <p>Form untuk membuat paket baru dengan nama dan jumlah soal sesuai dengan kebutuhan</p>
                    <hr class="mt-4 mb-4" style="border: 1px solid #A8BFD1">
                    <div class="main-wrapper">
                        <div class="left-side">
                            <div class="step-one pb-4">
                                <div>
                                    <h3 style="color: #58819F; font-weight: 650; margin-right: 10px;">Nama Paket</h3>
                                    <p style="color:#B0B0B0; margin-top: -10px;">Nama dan Jumlah</p>
                                </div>
                                <div class="number-icon">
                                    <i class="bi bi-1-circle-fill" style="font-size: 30px;"></i>
                                    <i class="bi bi-circle-fill"></i>
                                </div>
                            </div>
                            <div class="step-two pt-4 pb-4">
                                <div>
                                    <h3 style=" color: #B0B0B0; font-weight: 650; margin-right: 10px;">Pilih Soal Ujian</h3>
                                    <p style="color: #B0B0B0; margin-top: -10px;">Klik Soal</p>
                                </div>
                                <div class="number-icon">
                                    <i class="bi bi-2-circle-fill" style="font-size: 30px; color:#B0B0B0"></i>
                                    <i class="bi bi-circle-fill" style="color: #B0B0B0;"></i>
                                </div>
                            </div>
                        </div>

                        <form action="/paket/store_nama_paket" method="POST">
                            @csrf
                            <div class="right-side">
                                <p>Steps 1/2</p>
                                <h2>Mari membuat paket baru</h2>
                                <p>Tolong isikan detail nama dan jumlah soal untuk membuat paket baru</p>
                                <hr class="mt-4 mb-4" style="border: 1px solid #A8BFD1">
                                <p>Isikan nama paket baru</p>
                                <input name="nm_paket" class="form-control" type="text" aria-label="Text input"
                                    id="namaPaket">
                                <p class="pt-4">Isikan jumlah soal dalam satu paket</p>

                                <div class="input-group pb-4">
                                    <input name="banyak_soal" class="form-control" type="number" aria-label="Text input"
                                        id="jumlahSoal">
                                </div>
                                <button type="submit" id="buatPaket">Selanjutnya</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- counter dropup dan dropdown --}}
    <script>
        // Fungsi untuk mengurangi nilai
        function decreaseValue() {
            var value = parseInt(document.getElementById('jumlahSoal').value, 10);
            value = isNaN(value) ? 0 : value;
            value--;
            value = value < 0 ? 0 : value;
            document.getElementById('jumlahSoal').value = value;
        }

        // Fungsi untuk menambah nilai
        function increaseValue() {
            var value = parseInt(document.getElementById('jumlahSoal').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('jumlahSoal').value = value;
        }
    </script>

    {{-- fungsi untuk ganti komponen sisi kanan sisi kiri --}}
    <script>
        // Ambil tombol "Buat Paket"
        const buatPaketButton = document.querySelector('button');
        const backButton = document.querySelector('#backButton');

        // Ambil elemen left-side dan right-side pertama dan kedua
        const leftSide = document.querySelector('.left-side');
        const rightSide1 = document.querySelector('.right-side:nth-child(2)');
        const rightSide2 = document.querySelector('.right-side:nth-child(3)');

        // Sembunyikan right-side kedua secara default
        rightSide2.style.display = 'none';

        // Tambahkan event listener ke tombol "Buat Paket"
        buatPaketButton.addEventListener('click', function() {
            // Tampilkan right-side kedua dan sembunyikan right-side pertama
            rightSide2.style.display = 'block';
            rightSide1.style.display = 'none';
        });

        backButton.addEventListener('click', function() {
            rightSide2.style.display = 'none';
            rightSide1.style.display = 'block';
        })
    </script>

    {{-- fungsi untuk memberikan warna pada level soal --}}
    <script>
        $(document).ready(function() {
            function setButtonColor() {
                $('.custom-button-level').each(function() {
                    var level = $(this).find('span').text().trim();
                    var backgroundColor;

                    switch (level) {
                        case 'Susah':
                            backgroundColor = '#F57781';
                            break;
                        case 'Sedang':
                            backgroundColor = '#FAC477';
                            break;
                        case 'Mudah':
                            backgroundColor = '#1AB394';
                            break;
                        default:
                            backgroundColor = '';
                    }

                    $(this).css('background-color', backgroundColor);
                });
            }

            setButtonColor();


        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var nextButton = document.getElementById("buatPaket"); // Tombol "Selanjutnya"
            var leftSide = document.querySelector(".left-side"); // Bagian kiri

            nextButton.addEventListener("click", function() {
                var stepOne = leftSide.querySelector(".step-one"); // Langkah pertama
                var stepTwo = leftSide.querySelector(".step-two"); // Langkah kedua

                if (stepOne) {
                    // Jika sedang di langkah pertama, ubah warna teks dan ikon
                    stepOne.querySelector("h3").style.color = "#58819F"; // Warna biru
                    stepOne.querySelectorAll(".number-icon i").forEach(function(icon) {
                        icon.style.color = "#58819F"; // Warna biru
                    });

                    // Ubah warna teks pada langkah kedua menjadi abu-abu
                    stepTwo.querySelector("h3").style.color = "#58819F";
                    stepTwo.querySelectorAll(".number-icon i").forEach(function(icon) {
                        icon.style.color = "#58819F"; // Warna abu-abu
                    });
                } else if (stepTwo) {
                    // Jika sedang di langkah kedua, ubah warna teks pada kedua langkah menjadi biru
                    stepTwo.querySelector("h3").style.color = "#58819F"; // Warna biru
                    stepTwo.querySelectorAll(".number-icon i").forEach(function(icon) {
                        icon.style.color = "#58819F"; // Warna biru
                    });

                    stepOne.querySelector("h3").style.color = "#58819F"; // Warna biru
                    stepOne.querySelectorAll(".number-icon i").forEach(function(icon) {
                        icon.style.color = "#58819F"; // Warna biru
                    });
                }
            });
        });
    </script>
@endsection
