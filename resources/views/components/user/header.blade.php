<head>
    <meta charset="utf-8">
    <title>{{config('app.name' , 'Men\'s')}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href={{asset("user/lib/owlcarousel/assets/owl.carousel.min.css")}} rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href={{asset("user/css/style.css")}} rel="stylesheet">

    <!--Send post requests using Ajax -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
