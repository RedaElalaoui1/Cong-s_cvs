<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> 

    <div class="w-full ">
        <div class="flex justify-between items-center mb-4">
            <div class="w-full">
                <a class="w-5" href="/dashboard">
                    <img class="w-10 h-7 ml-2" src="{{asset("images/fleche.png")}}" alt="">
                </a>
            </div>
            <div class="flex justify-between">
                  <div class="w-72 flex justify-center items-start">
                    <!-- search -->
                    <form class="w-full flex items-center " action="/search_cv" type="get"> 
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" name="query" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                        </div>
                        <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                    <!-- /search -->
                  </div>
            </div>
        </div>
    
        <div class="overflow-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            ID
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Fichier
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Note
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cvs as $cv)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $cv->id }}
                        </th>
                        <td class="py-4 px-6">
                            <div class="w-10"><a href="/image/{{ $cv->id }}"> <img class="w-10 h-10" src="{{asset("images/pdf.png")}}" alt=""> </a></div>
                            
                           
                        <td class="py-4 px-6">
                            {{ $cv->note }}
                        </td>
                        <td class="py-4 px-6">
                            <a href="/update/{{ $cv->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <div>
                                <a href="/delete_cv/{{ $cv->id }}"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'))"> delete</a>
                            </div>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>


        <!--
            <a href="ajout_emp">
            <div class="mt-10 max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-around items-center">
            
                <div class="bg-white overflow-hidden shadow-xl rounded-lg w-72 h-36 cursor-pointer hover:bg-blue-500">
                    <div class="flex justify-center items-center h-4/5">
                        <img class="h-28" src="{{asset("images/ajout.png")}}" alt="">
                    </div>
               <div><span class="font-bold text-2xl text-center h-1/5 w-full block text-gray-800 ">Ajouter employee</span></div>
           </div>
        </a>
    -->
    <a href="/ajout_cv">
        <button class="bg-blue-500 w-14 h-14 rounded-full fixed right-10 bottom-8 text-white text-xl">+</button>
    </a>   

</x-app-layout>