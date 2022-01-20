<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Kepls Email</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <div class="container">
            <div class="jumbotron">
                <h1>Hemos recibiod respuestas del formulario "{{$data['detail']->name}}"</h1>     
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <h4>De:</h4>
                    {{$data['form']['email']}}
                </div>
                <div class="col-12">
                    <h4>Descripcion:</h4>
                     {{$data['form']['description']}}
                </div>
            </div>
        </div>

    </body>
</html>
