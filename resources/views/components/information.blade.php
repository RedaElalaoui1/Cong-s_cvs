@props(['data'])


<div class="w-full h-full pt-3 pb-10 shadow-md shadow-gray-300/50 rounded-md">
    <div class="flex justify-between">
        <span>ID : {{$data->id}} </span>
        <span>Name : {{$data->name}} </span>
    </div>
</div>
