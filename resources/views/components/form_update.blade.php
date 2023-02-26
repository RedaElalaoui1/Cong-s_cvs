@props(['data','page'])
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>


<div>
    
    @php
    $titre = '';
    $action = '';
        switch($page){
            case 7:
            $titre = 'Modifier employee';
            $action = '/up_emp';
            $id  = $data->id;
                break;
            case 8:
            $titre = 'Modifier congé';
            $action = '/up_leave';
            $id  = $data->id;
                break;
            case 9:
            $titre = 'Modifier cv';
            $action = '/up_cv';
            $id  = $data->id;
                break;
    }
    @endphp
    <div class=" mt-4">
       <div class=" border-2 border-black w-full py-5 flex flex-col justify-center items-center rounded-xl ">
          <span class="text-2xl font-bold "> {{$titre}} </span>
       </div>
    <div class="border-2 border-black w-full h-[25rem] mt-4 flex flex-col justify-center items-center rounded-xl ">
        <form class="w-full h-full flex flex-col" action="{{$action.'/'.$id}}" method="post">
            @csrf
            
            @switch($page)
                @case(7)
                <div class="flex h-4/5 w-full">
                    <div class=" w-1/2 flex flex-col justify-evenly items-end mr-16">
                        <label class="text-xl font-bold inline-block mr-6">Name :</label>
                        <label class="text-xl font-bold inline-block mr-6">Email    :</label>
                        <label class="text-xl font-bold inline-block mr-6">Job    :</label>
                        <label class="text-xl font-bold inline-block mr-6">Salaire    :</label>
                    </div>
                    <div class="w-1/2 flex flex-col justify-evenly mr-8 pr-24">
                        <input class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" name='name' type="text" placeholder="Name"  value="{{ $data->name }}" >
                        <input class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" name='email' type="text" placeholder="Email"  value="{{ $data->email }}" >
                        <input class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" name='job' type="text" placeholder="Job"  value="{{ $data->job }}" >
                        <input class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" name='salaire' type="text" placeholder="Salaire"  value="{{ $data->salary }}" >
                    </div>
                </div>
                <div class="w-full h-1/5 flex justify-center items-center">
                    <button class="text-black focus:ring-2 font-medium rounded-md text-sm px-2 py-3 border-2 border-black hover:bg-blue-500 bg-blue-300" type="submit">Modifier employee</button>
                </div>
                    @break
                @case(8)
                <div class="flex h-4/5 w-full">
                    <div class=" w-1/2 flex flex-col justify-evenly items-end mr-16">
                        
                        <label class="text-xl font-bold inline-block mr-6">Date debut :</label>
                        <label class="text-xl font-bold inline-block mr-6">Date fin :</label>
                    </div>
                    <div class="w-1/2 flex flex-col justify-evenly mr-8 pr-24">
                        
                        <input class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" name="begin_date" type="date" placeholder="Date debut"  value="{{ $data->begin_date }}" >
                        <input class="h-10 w-56 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" name="end_date" type="date" placeholder="Date fin"  value="{{ $data->end_date }}" >
                    </div>
                </div>
    
                <div class="w-full h-1/5 flex justify-center items-center">
                    <button class="text-black focus:ring-2 font-medium rounded-md text-sm px-2 py-3 border-2 border-black hover:bg-blue-500 bg-blue-300" type="submit">Modifier congé</button>
                </div>
                    @break
                    @case(9)
                    <div class="flex h-4/5 w-full">
                        <div class=" w-1/2 flex flex-col justify-evenly items-end mr-16">
                            <label class="text-xl font-bold inline-block mr-6">Fichier :</label>
                            <label class="text-xl font-bold inline-block mr-6">Note    :</label>
                        </div>
                        <div class="w-1/2 flex flex-col justify-evenly mr-8 pr-24">
                            <input class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl bg-white" name="fichier" type="file" placeholder="Fichier" value="{{ $data->fichier }}" >
                            <input class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" name="note" type="text" placeholder="Note" value="{{ $data->note }}" >
                        </div>
                    </div>
                    <div class="w-full h-1/5 flex justify-center items-center">
                        <button class="text-black focus:ring-2 font-medium rounded-md text-sm px-2 py-3 border-2 border-black hover:bg-blue-500 bg-blue-300" type="submit">Modifier cv</button>
                    </div>
                        @break
                @default
                    
            @endswitch
            
        </form>
    </div>
       
    </div>
    
</div>

