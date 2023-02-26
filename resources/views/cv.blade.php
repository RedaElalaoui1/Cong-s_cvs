<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> 
    <div class="w-full">
        <a href="/dashboard">
            <div class="w-10 h-7 m-2"><img class="m-10" src="{{asset("images/fleche.png")}}" alt=""></div>
        </a>
    </div>

    <div class="py-12">
        <a href="ajout_cv">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-around items-center">
            
                <div class="bg-white overflow-hidden shadow-xl rounded-lg w-80 h-48 cursor-pointer hover:bg-blue-500">
                    <div class="flex justify-center items-center h-4/5">
                        <img class="h-28" src="{{asset("images/cva.png")}}" alt="">
                    </div>
               <div><span class="font-bold text-2xl text-center h-1/5 w-full block text-gray-800 ">Ajouter Cv</span></div>
           </div>
        </a>
     
            
        <a href="cherche_cv">

            <div class="bg-white overflow-hidden shadow-xl rounded-lg w-80 h-48 cursor-pointer hover:bg-blue-500">
                <div class="flex justify-center items-center h-4/5">
                    <img class="h-32" src="{{asset("images/cvr.png")}}" alt="">
                </div>
           <div><span class="font-bold text-2xl text-center h-1/5 w-full block text-gray-800 ">Chercher Cv</span></div>
       </div>

        </a>
              

       </div>
     

       
   </div>
       
    </div>




</x-app-layout>