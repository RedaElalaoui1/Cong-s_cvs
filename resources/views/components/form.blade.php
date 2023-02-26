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
            case 4:
            $titre = 'Ajouter employee';
            $action = '/save_emp';
                break;
            case 5:
            $titre = 'Ajouter congé';
            $action = '/save_leave';
                break;
            case 6:
            $titre = 'Ajouter cv';
            $action = '/save_cv';
                break;
            
    }
    @endphp
    <div class=" mt-4">
       <div class=" border-2 border-black w-full py-5 flex flex-col justify-center items-center rounded-xl ">
          <span class="text-2xl font-bold "> {{$titre}} </span>
       </div>
    <div class="border-2 border-black w-full h-[25rem] mt-4 flex flex-col justify-center items-center rounded-xl ">
        <form id="leaveForm" class="w-full h-full flex flex-col" action="{{$action}}" method="post" enctype="multipart/form-data">
            @csrf
            @switch($page)
                @case(4)
                <div class="flex h-4/5 w-full">
                    <div class=" w-1/2 flex flex-col justify-evenly items-end mr-16">
                        <label class="text-xl font-bold inline-block mr-6">Name :</label>
                        <label class="text-xl font-bold inline-block mr-6">Email    :</label>
                        <label class="text-xl font-bold inline-block mr-6">Job    :</label>
                        <label class="text-xl font-bold inline-block mr-6">Salaire    :</label>
                    </div>
                    <div class="w-1/2 flex flex-col justify-evenly mr-8 pr-24">
                        <input class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" name='name' type="text" placeholder="Name"  value="" >
                        <input class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" name='email' type="text" placeholder="Email"  value="" >
                        <input class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" name='job' type="text" placeholder="Job"  value="" >
                        <input class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" name='salaire' type="text" placeholder="Salaire"  value="" >
                    </div>
                </div>
                <div class="w-full h-1/5 flex justify-center items-center">
                    <button class="text-black focus:ring-2 font-medium rounded-md text-sm px-2 py-3 border-2 border-black hover:bg-blue-500 bg-blue-300" type="submit">Ajouter employee</button>
                </div>
                    @break
                @case(5)
                <div class="flex h-4/5 w-full">
                    <div class=" w-1/2 flex flex-col justify-evenly items-end mr-16">
                        <label class="text-xl font-bold inline-block mr-6">Employee :</label>
                        <label class="text-xl font-bold inline-block mr-6">Date debut :</label>
                        <label class="text-xl font-bold inline-block mr-6">Date fin :</label>
                    </div>
                    <div class="w-1/2 flex flex-col justify-evenly mr-8 pr-24">
                        <select name="employee_id" class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" type="text" placeholder="Employee" value="" >
                            @foreach ($data as $emp)
                                <option value="{{ $emp->id }}">{{$emp->name . " - " . $emp->created_at}}</option>
                            @endforeach
                        </select>
                        <input id="begin_date" class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" name="begin_date" type="date" placeholder="Date debut"  value="" >
                        <div class="text-red-600 text-lg" name="test" id="dateErr"></div>    {{-- date error --}}
                        <input id="end_date" class="h-10 w-56 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" name="end_date" type="date" placeholder="Date fin"  value="" >
                    </div>
                </div>
    
                <div class="w-full h-1/5 flex justify-center items-center">
                    <button class="text-black focus:ring-2 font-medium rounded-md text-sm px-2 py-3 border-2 border-black hover:bg-blue-500 bg-blue-300" type="submit">Ajouter congé</button>
                </div>

                    @break
                    @case(6)
                    <div class="flex h-4/5 w-full">
                        <div class=" w-1/2 flex flex-col justify-evenly items-end mr-16">
                            <label class="text-xl font-bold inline-block mr-6">Fichier :</label>
                            <label class="text-xl font-bold inline-block mr-6">Note    :</label>
                        </div>
                        <div class="w-1/2 flex flex-col justify-evenly mr-8 pr-24">
                            <input class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl bg-white" name="fichier" type="file" placeholder="Fichier" value="" >
                            <input class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" name="note" type="text" placeholder="Note" value="" >
                        </div>
                    </div>
                    <div class="w-full h-1/5 flex justify-center items-center">
                        <button class="text-black focus:ring-2 font-medium rounded-md text-sm px-2 py-3 border-2 border-black hover:bg-blue-500 bg-blue-300" type="submit">Ajouter cv</button>
                    </div>
                 
                        @break
                @default
                    
            @endswitch
            
        </form>
    </div>
       
    </div>
    
</div>




