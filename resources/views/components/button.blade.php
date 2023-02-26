@props(['page'])
@php
$route = '';
    switch($page){
        case 1:
        $route = '/employee/add';
            break;
        case 2:
        $route = '/leaves/add';
            break;
        case 3:
            $route = '/cvs/add';
            break;
    }
@endphp

<a href="{{$route}}">
    <button class="bg-gray-900 w-14 h-14 rounded-full shadow-md shadow-gray-500/40 fixed right-10 bottom-6 text-white text-xl hover:">+</button>
</a>
