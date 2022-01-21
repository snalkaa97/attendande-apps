<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        #homepage {
            background-image: url('images/Picture2.jpg');
            /* Full height */
            height: 1200px;
            width: 700px;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

            max-height: 800px;
        }

        .button-welcome {
            border-radius: 30%;
            background-color: white;
        }

        .title-page {
            text-decoration: none;
            padding: 4px;
            padding-left: 13px;
            padding-right: 13px;
            background-color: white;
            border-radius: 20px;
            color: #1A5F7A;
            border: none;
        }

        .title-page:hover {
            text-decoration: none;
        }

    </style>
</head>

<body>
    <div id="homepage" class="container">
        <div class="container row justify-content-center">
            <a href="{{ route('absence.index') }}" class="mt-5 title-page">
                <h3>Welcome</h3>
            </a>
        </div>
    </div>
</body>

</html>
