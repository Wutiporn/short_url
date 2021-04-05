<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<script>
    function buttonclick(){
        alert('short.local/gt/339' + Math.floor(Math.random() * 100) + create_random_character(3));
    }
    function random_character(){
        document.getElementById("show_short_url").innerHTML = create_random_character(3);
    }
    function create_random_character(string_length) {
        var random_string = '';
        var character = 'abcdefghijklmnopqrstuvwxyz'
        for (var i, i = 0; i < string_length; i++) {
            random_string += character.charAt(Math.floor(Math.random() * character.length))
        }
        return random_string
    }
</script>

<body>

<div class="container">
    @if($message = Session::get('success'))
        <p>{{$message}}</p>
    @endif
    <a href="/new">create</a>
    <p>Your Quota Remaining {{10-count($urls)}}/10</p>
    @if(!$urls->isEmpty())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">long url</th>
                <th scope="col">short url</th>
                <th scope="col">create</th>
            </tr>
            </thead>
            <tbody>

                @foreach($urls as $url)
                    <tr>
                    <td>{{$url->long_url}}</td>
                    <td><a href="/gt/{{$url->short_url}}" target="_blank">{{$url->short_url}}</a></td>
                    <td>{{$url->created_at}}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endif
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
-->
</body>
</html>

