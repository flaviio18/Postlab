<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    @vite (['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body{
            background-image: url(https://www.tessutietendaggipanini.it/media/a1/12/8a/1646382306/tessuto-panama-misto-cotone-fantasia-giornale-sfondo-ecru%CC%80.jpg)
        }
    </style>
    
    <title>Postlab</title>
    
</head>
<body>
    <x-nav/>
    <div class="min-vh-100">
    {{$slot}}
    </div>
    <x-footer/>
    
</body>


</html>