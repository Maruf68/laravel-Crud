<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Adding Data</title>
</head>

<body>

    <div class="container">
        <a href="{{url('/')}}" class="btn btn-primary my-3">Show data </a>


        <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif -->

          @if(Session::has('msg'))
    <p class="alert alert-success">{{ Session::get('msg') }}</p>
    @endif
         


        <form action="{{url('/store-data')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name">

                  @error('name')                                                    <!-- name error massage -->
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Enter your email">

                @error('email')
                  <span class="text-danger">{{ $message }}</span>               <!-- email error massage -->
                  @enderror
            </div>
            <input type="submit" class="btn btn-primary my-3" value="submit">

        </form>


    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>