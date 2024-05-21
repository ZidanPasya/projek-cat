<!DOCTYPE html>
<html>

    <head>
        <title>Bank Soal</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
            @media (max-width: 767px) {
                .custom-card {
                    border-radius: 5px;
                }
            }

            @media (max-width: 576px) {
                .col-sm-4 {
                    flex: 0 0 100%;
                    max-width: 100%;
                }

                .button-group {
                    flex-direction: row;
                    justify-content: flex-start;
                    margin-right: 0;
                }

                .button-group span {
                    margin-right: 10px;
                }
            }

            @media (min-width: 577px) and (max-width: 991px) {
                .button-group button {
                    padding: 6px 10px;
                    font-size: 0.9em;
                }
            }

            @media (min-width: 992px) {
                .button-group button {
                    padding: 8px 12px;
                    font-size: 1em;
                }
            }

            .header-content {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .ibox-content {
                color: black;
            }

            #buatSoal {
                padding: 8px 16px;
                background-color: #F4841B;
                color: white;
                border: none;
                border-radius: 8px;
                align-content: flex-end;
            }

            .main-wrapper * {
                font-family: "Poppins", "Open-Sans";
                font-weight: normal;
                letter-spacing: .2px;
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

            /* Modals */
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

            /* Alert */
            .swal2-container {
                z-index: 4000 !important;
                position: absolute !important;
            }

            /* card non-aktif*/
            /* Tambahkan ini ke CSS Anda */
            .overlay-card {
                position: relative;
                overflow: hidden;
            }

            .overlay-card::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(128, 128, 128, 0.5);
                z-index: 1;
            }

            /* Pastikan konten card berada di atas overlay */
            .overlay-card .card-body {
                position: relative;
                z-index: 2;
            }
        </style>

        <!-- Modals -->
        <div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="modalId" class="d-none"></div>
                        <div class="button-level-group">
                            <button class="custom-button-level" id="modalDifficulty"
                                style="margin-right: 10px;"></button>
                            <button type="button" id="modalTopic" style="background-color: #FAC477"></button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <p id="modalQuestionText" style="font-weight: bold;"></p>
                        <div id="modalOptions"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        {{-- <input type="checkbox" id="deleteToggle" data-toggle="toggle" style="border-radius: 50px;"> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="header-content mb-4">
                        <h1 style=" font-weight: 700">BANK SOAL</h1>
                        <button id="buatSoal">+ Buat Soal</button>
                    </div>

                    <div class="main-wrapper">
                        <!-- Card Statistik Soal -->
                        <div class="row mb-4" style="width: 80%;">
                            <div class="col-sm-4 mb-4">
                                <div class="card-total-question"
                                    style="background-color: #EAEFF4; border: 2px solid #58819F;">
                                    <div class="total-question-content">
                                        <h4 style="font-weight: 800;">{{ $total_soal }}</h4>
                                        <hr style=" background-color: #58819F; ">
                                        <h4>Jumlah Seluruh Soal</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-4">
                                <div class="card-total-question"
                                    style="background-color: #CEF9EC; border: 2px solid #1AB394;">
                                    <div class="total-question-content">
                                        <h4 style="font-weight: 800;" id="soal_aktif">{{ $soal_aktif }}</h4>
                                        <hr style=" background-color: #1AB394;">
                                        <h4>Jumlah Soal Aktif</h4>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-4 mb-4">
                                <div class="card-total-question"
                                    style="background-color: #FEE5E5; border: 2px solid #ED5564;">
                                    <div class="total-question-content">
                                        <h4 style="font-weight: 800;" id="soal_expired">{{ $soal_expired }}</h4>
                                        <hr style=" background-color: #ED5564;">
                                        <h4>Jumlah Soal Nonaktif</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Bank Soal -->
                        <div class="row">
                            @foreach ($soals as $soal)
                                <div class="col-sm-4 col-6 mb-4">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div class="button-group">
                                                <button
                                                    class="custom-button-level"><span>{{ $soal->tingkat_kesulitan->nm_tingkat_kesulitan }}</span></button>
                                                <button
                                                    class="custom-button-topik"><span>{{ $soal->topik->nm_topik }}</span></button>
                                            </div>

                                            <div class="content-question">
                                                <p style="font-size: 12px; font-weight: 500;">{{ $soal->pertanyaan }}
                                                </p>
                                                <a href="#" class="open-modal-btn"
                                                    style="color:grey; font-size: 14px; margin-left: 130px;"
                                                    data-id="{{ $soal->id_soal }}"
                                                    data-difficulty="{{ $soal->tingkat_kesulitan->nm_tingkat_kesulitan }}"
                                                    data-topic="{{ $soal->topik->nm_topik }}"
                                                    data-question="{{ $soal->pertanyaan }}"
                                                    data-options="{{ $jawabans->where('id_soal', $soal->id_soal)->pluck('jawaban') }}"
                                                    data-expired="{{ $soal->is_expired }}">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const modal = new bootstrap.Modal(document.getElementById('questionModal'));

                document.querySelectorAll('.open-modal-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const existingCheckbox = document.getElementById('deleteToggle');
                        if (existingCheckbox) {
                            $('#deleteToggle').bootstrapToggle('destroy');
                            existingCheckbox.remove();
                        }
                        const id = this.getAttribute('data-id');
                        getSoal(id);
                    });

                    function getSoal(id) {
                        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                        $.ajax({
                            url: '/soal/${id}',
                            method: 'GET',
                            data: {
                                _token: token,
                                soalId: id,
                            },
                            success: function(response) {
                                const options = response.opsi;
                                const answers = response.jawaban;
                                const expired = response.is_expired;

                                document.getElementById('modalId').textContent = response.id_soal;
                                document.getElementById('modalDifficulty').textContent = response
                                    .tingkat_kesulitan;
                                document.getElementById('modalTopic').textContent = response.topik;
                                document.getElementById('modalQuestionText').textContent = response
                                    .pertanyaan;

                                const optionsContainer = document.getElementById('modalOptions');
                                optionsContainer.innerHTML = ''; // Clear existing options

                                options.forEach((option, index) => {
                                    const optionDiv = document.createElement('div');
                                    optionDiv.className = 'form-check';
                                    optionDiv.innerHTML = `
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault${index}" ${answers[index] ? 'checked' : ''} disabled>
                            <label class="form-check-label" for="flexRadioDefault${index}">
                                <p>${option}</p>
                            </label>`;
                                    optionsContainer.appendChild(optionDiv);
                                });

                                const existingCheckbox = document.getElementById('deleteToggle');
                                if (existingCheckbox) {
                                    $('#deleteToggle').bootstrapToggle('destroy');
                                    existingCheckbox.remove();
                                }

                                const inputElement = document.createElement("input");
                                inputElement.setAttribute("type", "checkbox");
                                inputElement.setAttribute("id", "deleteToggle");
                                inputElement.setAttribute("data-toggle", "toggle");
                                inputElement.setAttribute("style", "border-radius: 50px;");
                                if (expired == 0) {
                                    inputElement.setAttribute("checked", "true");
                                } else {
                                    inputElement.setAttribute("disabled", "true");
                                }

                                const modalFooter = document.querySelector(".modal-footer");
                                modalFooter.appendChild(inputElement);

                                $(inputElement).bootstrapToggle();

                                modal.show();
                            }
                        });
                    }
                });
            });
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
                                backgroundColor = '';
                        }

                        $(this).css('background-color', backgroundColor);
                    });
                }

                setButtonColor();
            });
        </script>

        <!-- alert pada toggle -->
        {{-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                let isExpired = !$(this).prop('checked');
                let soalId = document.getElementById('modalId').getAttribute;

                $('#deleteToggle').change(function() {
                    if (!$(this).prop('checked')) {
                        Swal.fire({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#33CEAD",
                            cancelButtonColor: "#ED5564",
                            confirmButtonText: "Yes, delete it!",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Ubah kelas dan pindahkan elemen ke posisi paling bawah
                                let card = $(this).closest('.col-sm-4.col-6.mb-4');
                                card.addClass('nonaktif-card');
                                card.removeClass('col-sm-4 col-6 mb-4');

                                // Pindahkan elemen ke posisi paling bawah
                                $('.main-wrapper .row').append(card);

                                // Tambahkan class overlay-card untuk menambahkan overlay abu-abu
                                card.addClass('overlay-card');

                                // Nonaktifkan semua fungsionalitas elemen tersebut
                                card.find('button, a').prop('disabled', true).css('pointer-events',
                                    'none');

                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    confirmButtonColor: "#33CEAD",
                                    icon: "success"
                                });
                            } else {
                                // Jika pengguna membatalkan, kembalikan status toggle ke "checked"
                                $(this).prop('checked', true);
                            }
                        });
                    }
                });
            });
        </script> --}}

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                $(document).ready(function() {
                    // Menambahkan event listener ke toggle penghapusan
                    $(document).on('change', '#deleteToggle', function() {
                        let isExpired = !$(this).prop('checked');
                        let soalId = document.getElementById('modalId').textContent;

                        // SweetAlert confirmation
                        if (isExpired) {
                            Swal.fire({
                                title: "Are you sure?",
                                text: "You won't be able to revert this!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#33CEAD",
                                cancelButtonColor: "#ED5564",
                                confirmButtonText: "Non aktifkan soal",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Update expired status in database
                                    updateSoalStatus(soalId, isExpired);
                                } else {

                                }
                            });
                        } else {
                            Swal.fire({
                                title: "Are you sure?",
                                text: "You won't be able to revert this!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#33CEAD",
                                cancelButtonColor: "#ED5564",
                                confirmButtonText: "Aktifkan soal",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Update expired status in database
                                    updateSoalStatus(soalId, isExpired);
                                } else {

                                }
                            });
                        }
                    });
                });
            });

            function updateSoalStatus(soalId, isExpired) {
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                $.ajax({
                    url: '/soal/${soalId}',
                    method: 'PUT',
                    data: {
                        _token: token,
                        soalId: soalId,
                        expired: isExpired ? 1 : 0
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                text: "Berhasil dirubah",
                                confirmButtonColor: "#33CEAD",
                                icon: "success"
                            });

                            let soalAktif = document.getElementById('soal_aktif').textContent = response.soal_aktif;
                            let soalExpired = document.getElementById('soal_expired').textContent = response
                                .soal_expired;
                            if(response.expired == 1){
                                document.getElementById('deleteToggle').setAttribute("disabled", "true");
                            }

                            // let card = $(`[data-id="${soalId}"]`).closest('.col-sm-4.col-6.mb-4');
                            // if (isExpired) {
                            //     card.addClass('nonaktif-card overlay-card');
                            //     card.removeClass('col-sm-4 col-6 mb-4');
                            //     $('.main-wrapper .row').append(card);
                            //     card.find('button, a').prop('disabled', true).css('pointer-events', 'none');

                            // } else {
                            //     card.removeClass('nonaktif-card overlay-card');
                            //     card.addClass('col-sm-4 col-6 mb-4');
                            //     card.find('button, a').prop('disabled', false).css('pointer-events', 'auto');
                            // }
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: "There was an issue updating the status.",
                                confirmButtonColor: "#ED5564",
                                icon: "error"
                            });
                        }
                    },
                    error: function(error) {
                        Swal.fire({
                            title: "Error!",
                            text: "There was an issue updating the status.",
                            confirmButtonColor: "#ED5564",
                            icon: "error"
                        });
                    }
                });
            }
        </script>
    </body>

</html>
