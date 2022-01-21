<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

    <title>Checkin</title>
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: inherit;
            font-size: 62, 5%;
        }

        .form__label {
            font-family: 'Roboto', sans-serif;
            font-size: 1.2rem;
            margin-left: 2rem;
            margin-top: 0.7rem;
            display: block;
            transition: all 0.3s;
            transform: translateY(0rem);
        }

        .form__input {
            font-family: 'Roboto', sans-serif;
            color: #333;
            font-size: 1.2rem;
            margin: 0 auto;
            padding: 1.5rem 2rem;
            border-radius: 0.2rem;
            background-color: rgb(255, 255, 255);
            border: none;
            width: 90%;
            display: block;
            border-bottom: 0.3rem solid transparent;
            transition: all 0.3s;
        }

        .form__input:placeholder-shown+.form__label {
            opacity: 0;
            visibility: hidden;
            -webkit-transform: translateY(-4rem);
            transform: translateY(-4rem);
        }

        #absence {
            background-image: url('images/Picture1.jpg');
            /* Full height */
            height: 1200px;
            width: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

            max-height: 800px;
        }

        .button-filter {
            padding: 10px;
            text-decoration: none;
            padding-left: 20px;
            padding-right: 20px;
            color: #fff;
            border-radius: 20px;
            font-size: 20px;
        }

        .button-filter:hover {
            text-decoration: none;
            color: #fff;
        }

        .background-select {
            background-color: #406882;
        }

        .background {
            background-color: #2F86A6;
        }

        .abjad {
            max-height: 38px;
            min-height: 38px;
            max-width: 38px;
            min-width: 38px;
            border-radius: 20px;
            border: none;
            text-decoration: none;

        }

        .abjad:active,
        .abjad:focus {
            border: none;
        }

        .abjad-unselect {
            background-color: #2F86A6;
            color: #fff;
        }

        .member-card {
            padding: 10px;
            max-height: 40px;
            min-height: 40px;
            max-width: 28px;
            min-width: 28px;
            border-radius: 20px;
            background-color: #D3DEDC;
        }

        .our-team {
            padding: 20px 0 30px;
            /* margin-bottom: 30px; */
            background-color: #F7F7F7;
            max-width: 260px;
            min-width: 260px;
            text-align: center;
            overflow: hidden;
            position: relative;
            border-radius: 20px;
            cursor: pointer;
        }

        .picture {
            display: inline-block;
            margin-bottom: 50px;
            z-index: 1;
            position: relative;
        }

        .picture img {
            max-height: 130px;
            min-height: 130px;
            max-width: 130px;
            min-width: 130px;
            border-radius: 50%;
            transform: scale(1);
            transition: all 0.9s ease 0s;
        }

        .our-team .title {
            display: block;
            font-size: 15px;
            color: #4e5052;
            text-transform: capitalize;
        }

        .our-team .social {
            width: 100%;
            padding: 0;
            margin: 0;
            background-color: #1369ce;
            position: absolute;
            bottom: -100px;
            left: 0;
            transition: all 0.5s ease 0s;
        }

        .our-team:hover .social {
            bottom: 0;
        }

        .our-team .social li {
            display: inline-block;
        }

        .our-team .social li a {
            display: block;
            padding: 10px;
            font-size: 17px;
            color: white;
            transition: all 0.3s ease 0s;
            text-decoration: none;
        }

    </style>

</head>

<body>
    <div id="absence">
        <div class="container jumbotron-overlay py-4">
            <div class="jumbotron-padding text-center">
                <a href="{{ url('absence?param=instansi') }}"
                    class="button-filter {{ $param == 'instansi' ? ' background-select' : 'background' }}">Instansi</a>
                <a href="{{ url('absence?param=name') }}"
                    class="button-filter {{ $param == 'name' ? ' background-select' : 'background' }}">
                    Nama</a>
            </div>
        </div>
        <div class="container">
            <div class="form__group">
                <input type="text" class="form__input myFilter" placeholder="Search">
                <label for="name" class="form__label">Search</label>
            </div>
            <div class="pb-1 mb-4">
                <a href="{{ url('absence?param=' . $param . '&abjad=A') }}"><button
                        class="abjad mt-1 {{ $abjad != 'A' ? 'abjad-unselect' : '' }}">A</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=B') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'B' ? 'abjad-unselect' : '' }}">B</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=C') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'C' ? 'abjad-unselect' : '' }}">C</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=D') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'D' ? 'abjad-unselect' : '' }}">D</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=E') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'E' ? 'abjad-unselect' : '' }}">E</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=F') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'F' ? 'abjad-unselect' : '' }}">F</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=G') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'G' ? 'abjad-unselect' : '' }}">G</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=H') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'H' ? 'abjad-unselect' : '' }}">H</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=I') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'I' ? 'abjad-unselect' : '' }}">I</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=J') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'J' ? 'abjad-unselect' : '' }}">J</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=K') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'K' ? 'abjad-unselect' : '' }}">K</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=L') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'L' ? 'abjad-unselect' : '' }}">L</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=M') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'M' ? 'abjad-unselect' : '' }}">M</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=N') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'N' ? 'abjad-unselect' : '' }}">N</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=O') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'O' ? 'abjad-unselect' : '' }}">O</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=P') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'P' ? 'abjad-unselect' : '' }}">P</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=Q') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'Q' ? 'abjad-unselect' : '' }}">Q</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=R') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'R' ? 'abjad-unselect' : '' }}">R</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=S') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'S' ? 'abjad-unselect' : '' }}">S</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=T') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'T' ? 'abjad-unselect' : '' }}">T</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=U') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'U' ? 'abjad-unselect' : '' }}">U</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=V') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'V' ? 'abjad-unselect' : '' }}">V</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=W') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'W' ? 'abjad-unselect' : '' }}">W</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=X') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'X' ? 'abjad-unselect' : '' }}">X</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=Y') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'Y' ? 'abjad-unselect' : '' }}">Y</button></a>
                <a href="{{ url('absence?param=' . $param . '&abjad=Z') }}"><button
                        class="abjad  mt-1 {{ $abjad != 'Z' ? 'abjad-unselect' : '' }}">Z</button></a>
            </div>
            {{-- <div class="row pb-5 mb-4" id="myItems">
                @foreach ($data as $item)
                    <div class="member-card" data-string="{{ $item->name }}" style="">
                        <a href="javascript:void(0)" data-id="{{ $item->id }}" class="checkIN">
                            <div class="card-body p-0"><img src="{{ asset($item->photo) }}" alt=""
                                    class="w-100 card-img-top">
                                <div class="p-4">
                                    <h5 class="mb-0">{{ $item->name }}</h5>
                                    <p class="small text-muted">{{ $item->instansi }}</p>

                                </div>
                            </div>
                        </a>
                    </div>
                    <br>
                @endforeach
            </div> --}}
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-sm-6 col-md-3 col-lg-3 card-member mt-3" data-string="{{ $item->name }}">
                        <div class="our-team checkIN" data-id="{{ $item->id }}"
                            style="{{ $item->is_checkin ? 'background-color: #B8DFD8;' : '' }}">
                            <div class="picture" style="opacity: 100% !important;">
                                <img class="img-fluid" src="{{ asset($item->photo) }}">
                            </div>
                            <div class="team-content">
                                <h3 class="name">{{ $item->name }}</h3>
                                <h4 class="title">{{ $item->instansi }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- </div> --}}
            {{-- show modal --}}
            <div class="modal fade" id="ajaxModel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center" style="background-color: #F7F7F7 !important;">
                            <h4 class="modal-title" id="modelHeading"></h4>
                        </div>
                        <div class="modal-body" style="background-color: #F7F7F7 !important;">
                            <input type="hidden" id="member_id" name="member_id">
                            <h2 class="text-center"><b><label for="" id="instansi" name="instansi"></label></b>
                            </h2>
                            <div class="d-flex justify-content-center">
                                <img class="d-flex justify-content-center"
                                    style="max-height:200px; min-height: 200px; max-width:200px; min-width: 200px; border-radius: 50%"
                                    id="photo">
                            </div>
                            <br>
                            <h3 class="text-center"><b><label for="" id="name" name="name"></label></b></h3>
                            {{-- <div class="button form-group">
                                <button class="btn btn-primary btn-lg form-control" id="checkIN">Check IN</button>
                            </div> --}}
                            <div class="d-flex justify-content-center">
                                <button class="button-filter background" style="border:none;" id="checkIN">Check
                                    IN</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
{{-- <script src="{{ asset('assets/js/jquery-3.3.1.slim.min.js') }}" type="text/javascript">
</script> --}}
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="text/javascript">
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".myFilter").on("keyup", function() {
            var input = $(this).val().toUpperCase();

            $(".card-member").each(function() {
                if ($(this).data("string").toUpperCase().indexOf(input) < 0) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            })
        });
        console.log("ready!");
        $('body').on('click', '.checkIN', function() {
            var member_id = $(this).data('id');
            $.get("{{ route('absence.index') }}" + '/' + member_id + '/edit', function(data) {
                $('#modelHeading').html("Attendance");
                $('#saveBtn').val("edit-member");
                $('#name').text(data.name);
                $('#instansi').text(data.instansi);
                $('#photo').attr('src', data.photo);
                $('#member_id').val(data.id);
                $('#ajaxModel').modal('show');
            })
        });

        $('#checkIN').click(function(e) {
            e.preventDefault();
            $.ajax({
                data: {
                    member_id: $('#member_id').val()
                },
                url: "{{ route('absence.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    $('#ajaxModel').modal('hide');
                    window.location.reload();
                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });
    });
</script>

</html>
