<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
       
</head>
<body >
    <div class=" bg-gray-100 h-screen" >
        <div class="pl-5 pt-5 w-20 h-20">
            <a href="/cvs">
                <img class="w-10 h-7 " src="{{asset("images/fleche.png")}}" alt="">
            </a>
        </div>
        <div class=" flex justify-center ">
           
            <iframe height="650" width="600" src="/storage/images/{{$cv->fichier}}"></iframe>
        
        </div>
    </div>
    
</body>
</html>