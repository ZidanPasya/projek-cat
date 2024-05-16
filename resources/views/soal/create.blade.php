<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Soal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
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
    </style>
</head>
<body>

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

    <div class="centered-form">
        <form id="myForm" method="POST" action="/soal" class="widen">
            @csrf
            <label for="exampleFormControlTextarea1" style="font-weight:1000">Buat Soal</label>
            <div class="form-group-pertanyaan">
                <label for="pertanyaan" style="font-weight:700">Pertanyaan</label><br>
                <textarea name="pertanyaan" class="form-control" id="pertanyaan" rows="3" required></textarea>
            </div>
            <br>

            <label for="exampleFormControlTextarea1"style="font-weight:700">Jawaban</label><br>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jawaban1" id="is_true1" value="1">
                <label class="form-check-label" for="is_true1">
                    <input type="text" name="jawaban_text1" class="form-control" aria-label="Text input with radio button">
                </label>
                <input type="hidden" name="jawaban1" value="0">
            </div>
        
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jawaban2" id="is_true2" value="1">
                <label class="form-check-label" for="is_true2">
                    <input type="text" name="jawaban_text2" class="form-control" aria-label="Text input with radio button">
                </label>
                <input type="hidden" name="jawaban2" value="0">
            </div>
        
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jawaban3" id="is_true3" value="1">
                <label class="form-check-label" for="is_true3">
                    <input type="text" name="jawaban_text3" class="form-control" aria-label="Text input with radio button">
                </label>
                <input type="hidden" name="jawaban3" value="0">
            </div>
        
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jawaban4" id="is_true4" value="1">
                <label class="form-check-label" for="is_true4">
                    <input type="text" name="jawaban_text4" class="form-control" aria-label="Text input with radio button">
                </label>
                <input type="hidden" name="jawaban4" value="0">
            </div>
            
            <script>
                document.querySelectorAll('.form-check-input[type="radio"]').forEach((radio) => {
                    radio.addEventListener('change', (e) => {
                        document.querySelectorAll('.form-check-input[type="radio"]').forEach((r) => {
                            if (r !== e.target) {
                                r.checked = false;
                            }
                        });
                    });
                });

                
            </script>
            <br>

            <label style="font-size:25px">Kategori</label><br> 
            <label for="exampleFormControlTextarea1"style="font-size:13px; color:#00000080;">Kemudahan Soal</label>
            <br>
            @foreach ($tingkats as $tingkat)
            <div class="form-check form-check-inline">
                <input name="id_tingkat_kesulitan" class="form-check-input" type="checkbox" id="inlineCheckbox{{ $tingkat->bobot }}" value="{{ $tingkat->id_tingkat_kesulitan }}" onclick="checkHandler({{ $tingkat->bobot }})">
                <label class="form-check-label" for="inlineCheckbox1">{{ $tingkat->nm_tingkat_kesulitan }}</label>
            </div>
            @endforeach
            {{-- <div class="form-check form-check-inline">
                <input name="kategori" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" onclick="checkHandler(1)">
                <label class="form-check-label" for="inlineCheckbox1">Mudah</label>
            </div>
            <div class="form-check form-check-inline">
                <input name="kategori" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2" onclick="checkHandler(2)">
                <label class="form-check-label" for="inlineCheckbox2">Sedang</label>
            </div>
            <div class="form-check form-check-inline">
                <input name="kategori" class="form-check-input" type="checkbox" id="inlineCheckbox3" value="3" onclick="checkHandler(3)">
                <label class="form-check-label" for="inlineCheckbox3">Sulit</label>
            </div> --}}

            <!-- Script for only allowing one checkbox selection -->

            <script>
                function checkHandler(checkboxNumber) {
                    // Mengatur status kotak centang lainnya
                    for (var i = 1; i <= 3; i++) {
                        if (i !== checkboxNumber) {
                            document.getElementById('inlineCheckbox' + i).checked = false;
                        }
                    }
                }
            </script>

            <br>
            <br>

            <div class="form-group" >
                <label for="exampleFormControlSelect1">Topik Soal</label>
                <select name="id_topik" class="form-control2" style="border-radius:8px" id="exampleFormControlSelect1">
                    @foreach ($topiks as $topik)
                        <option value="{{ $topik->id }}">{{ $topik->nm_topik }}</option>
                    @endforeach
                </select>
            </div>
            <hr>
            <input type="hidden" name="is_expired" value="0">
            <div class="d-flex justify-content-between"> <!-- Added d-flex and justify-content-end class -->
                <button type="button" class="btn btn" style="background-color:#7fa39b1c">Cancel</button>
                <button type="submit" class="btn btn" style="background-color:#33CEAD; color:aliceblue;" >Simpan</button> <!-- Added btn-success class -->
            </div>
        </form>

        <script>
            document.getElementById('myForm').addEventListener('submit', function(event) {
                document.querySelectorAll('.form-check-input[type="radio"]').forEach((radio) => {
                    if (radio.checked) {
                        // If radio button is checked, its hidden input should reflect value 1
                        document.querySelector(`input[type="hidden"][name="${radio.name}"]`).value = "1";
                    }
                });
            });
        </script>
    </div>

</body>
</html>