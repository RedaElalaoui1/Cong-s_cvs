<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="m-12">
        <a href="/cherche_cv">
            <div class="w-10 h-7 ml-2"><img src="{{asset("images/fleche.png")}}" alt=""></div>
        </a>
        
        <div class=" mt-4" >
           
           <div class=" border-2 border-black w-full py-5 flex flex-col justify-center items-center rounded-xl">
              <span class="text-2xl font-bold "> Modifier Cv </span>
           </div>
           <div class="border-2 border-black w-full h-[25rem] mt-4 flex flex-col justify-center items-center rounded-xl">
              <form class="w-full h-full flex flex-col" action="/update_cv/{{ $cv->id }}" method="post">
                @csrf
                 <div class="flex h-4/5 w-full">
                    <div class=" w-1/2 flex flex-col justify-evenly items-end mr-16">
                        <label class="text-xl font-bold inline-block mr-6">Fichier :</label>
                        <label class="text-xl font-bold inline-block mr-6">Note    :</label>
                    </div>
                    <div class="w-1/2 flex flex-col justify-evenly mr-8 pr-24">
                        <input class="h-16 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" name="fichier" type="text" placeholder="Fichier" required="" value="{{ $cv->fichier }}" >
                        <input class="h-16 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" name="note" type="text" placeholder="Note" required="" value="{{ $cv->note }}" >
                    </div>
                </div>
    
                <div class="w-full h-1/5 flex justify-center items-center">
                    <button class="text-black focus:ring-2 font-medium rounded-md text-sm px-2 py-3 border-2 border-black" type="submit">Modifier Cv</button>
                </div>
              </form>
           </div>
        </div>
    </div>
    
</x-app-layout>