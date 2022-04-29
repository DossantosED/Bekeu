<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bekeu</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito';
                background-color: #ced4da96;
            }
            .card{
                border: 1px solid rgb(147 147 147 / 54%);
            }
        </style>
    </head>
    <body>
        <div class="container d-flex align-items-center justify-content-center" style="padding: 10rem">
            <div class="card" style="width: 18rem; height: 22rem;">
                <div class="card-body">
                    <h1>New Subscription</h1>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" placeholder="example@email.com" class="form-control" id="email" name="email" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">Estado</label>
                        <select id="state" class="form-select" name="state">
                            <option value="">Seleccione un estado</option>
                        </select>
                    </div>
                    <button type="button" onclick="sendSubscription()" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>

        $('#state').select2();

        fetch('http://127.0.0.1:8000/api/imports')
            .then(response => response.json())
            .then(data => loadState(data));

        function loadState(data){
            data.forEach(state => {
                var opt = document.createElement('option');
                var select = document.getElementById('state');
                opt.value = state.id;
                opt.innerHTML = state.name;
                select.appendChild(opt);
            });
        }

        function sendSubscription(){
            var email = document.getElementById('email').value;
            var state = document.getElementById('state').value;
            (async () => {
                const rawResponse = await fetch('http://127.0.0.1:8000/api/subscription', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({email: email, state_id: state})
                });
                const content = await rawResponse.json();
                if(content.ok){
                    Swal.fire({
                        title: 'Subscripcion guardada!',
                        text: content.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })
                }else{
                    Swal.fire({
                        title: 'Error!',
                        text: content.message,
                        html: `<p>${content.errors.email != undefined ? content.errors.email: ''}<p><p>${content.errors.state_id != undefined ? content.errors.state_id : ''}<p>`,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                    location.reload()
                }
            })();
        }
    </script>
</html>
