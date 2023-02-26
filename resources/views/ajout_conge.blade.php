<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> 
    


    <div class="">
      
        
        <a href="/conge">
            <div class="w-10 h-7 ml-2"><img src="{{asset("images/fleche.png")}}" alt=""></div>
        </a>
    

        
        <div class=" mt-4" >
           <div class=" border-2 border-black w-full py-5 flex flex-col justify-center items-center rounded-xl">
              <span class="text-2xl font-bold "> Ajouter Conge </span>
           </div>
           <div class="border-2 border-black w-full h-[25rem] mt-4 flex flex-col justify-center items-center rounded-xl">
              <form class="w-full h-full flex flex-col" action="/save_conge" method="post" >
                @csrf
                 <div class="flex h-4/5 w-full">
                    <div class=" w-1/2 flex flex-col justify-evenly items-end mr-16">
                        <label class="text-xl font-bold inline-block mr-6">Employee :</label>
                        <label class="text-xl font-bold inline-block mr-6">Date debut :</label>
                        <label class="text-xl font-bold inline-block mr-6">Date fin :</label>
                    </div>
                    <div class="w-1/2 flex flex-col justify-evenly mr-8 pr-24">
                        <select name="employee_id" class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" type="text" placeholder="Employee" value="" >
                            @foreach ($emps as $emp)
                                <option value="{{ $emp->id }}">{{$emp->name . " - " . $emp->created_at}}</option>
                            @endforeach
                        </select>
                        <input class="h-10 w-56 px-4 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" name="begin_date" type="date" placeholder="Date debut"  value="" >
                        <input class="h-10 w-56 border-2 border-gray-200 text-gray-900 text-sm rounded-xl" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" name="end_date" type="date" placeholder="Date fin"  value="" >
                    </div>
                </div>
    
                <div class="w-full h-1/5 flex justify-center items-center">
                    <button class="text-black focus:ring-2 font-medium rounded-md text-sm px-2 py-3 border-2 border-black hover:bg-blue-500 bg-blue-300" type="submit">Ajouter congé</button>
                </div>
              </form>
           </div>
        </div>
    </div>
  

    <div>
        {{-- <span>{{ $emp->id }}</span>
        <span>{{ $emp->name }}</span> --}}
    </div>
    

    <script >
      
      var variableRecuperee = <?php echo json_encode($id); ?>;

      if(variableRecuperee==1)
        alert ("date debut grand que la date fin")

      if(variableRecuperee==3)
        alert ("vous avez pas ces jours de conge")
      
          
    
    </script>


</x-app-layout>

