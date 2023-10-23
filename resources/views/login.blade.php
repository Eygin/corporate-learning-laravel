<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Corporate Learning - Login</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{URL('assets/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{URL('assets/css/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{URL('assets/css/startmin.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{URL('assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/x-icon" href="{{URL('assets/img/telkom.png')}}">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <div id="alert-error">

                            </div>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form role="form" method="POST" id="formLogin">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" value="" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" id="btnSubmit" class="btn btn-lg btn-success btn-block">Login</b>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{URL('assets/js/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{URL('assets/js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{URL('assets/js/metisMenu.min.js')}}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{URL('assets/js/startmin.js')}}"></script>
        <script>
            $("form#formLogin").submit(function(event) {
                event.preventDefault();

                let form = $('#formLogin')
                let formData = new FormData(form[0])
                $.ajax({
                    type: "POST",
                    url: "{{URL('doLogin')}}",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(val) {
                        if (val.status == true) {
                            window.location.reload()
                        } else {
                            $('#alert-error').html(`<div class="alert alert-danger">
                                ${val.message}
                            </div>`)
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        if(error.status===422){
                            var message = "";
                            $.each(error.responseJSON.errors, function (key, val) {
                                message += "<span class='text-danger'>* " + val + "</span><br>";
                            });
                            $('#alert-error').html(`
                            <div class="alert alert-danger">
                                ${message}
                            </div>
                            `)
                        }
                    }
                })
            })
        </script>
    </body>

</html>
