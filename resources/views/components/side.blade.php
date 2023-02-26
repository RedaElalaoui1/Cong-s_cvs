@props(['page'])
<aside class="w-full h-full" aria-label="Sidebar">
    <div class="overflow-y-auto py-4 px-3 bg-gray-900 rounded dark:bg-gray-800 h-full">
       <ul class="space-y-2">
          <li>
             <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-base font-normal {{ $page === 0 ? 'text-white bg-gray-800' : 'text-gray-300'  }} rounded dark:text-gray-300  hover:bg-gray-800 dark:hover:bg-white">
               <svg aria-hidden="true" class="w-6 h-6 {{ $page === 0 ? 'text-white' : 'text-gray-500' }} transition duration-75 dark:text-gray-300 group-hover:text-gray-300 dark:group-hover:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
               </svg>
                <span class="ml-3">Dashboard</span>
             </a>
          </li>
          <li>
             <a href="/employee" class="flex items-center p-2 text-base font-normal {{ $page === 1 || $page === 4 || $page === 5? 'text-white bg-gray-800' : 'text-gray-300'  }} rounded dark:text-gray-300 hover:bg-gray-800 dark:hover:bg-gray-700">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 {{ $page === 1 || $page === 4 || $page === 5? 'text-white' : 'text-gray-500' }} transition duration-75 dark:text-gray-400 group-hover:text-gray-300 dark:group-hover:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                {{-- <img class=" w-10 h-10" src="{{asset("images/emp1.png")}}" alt=""> --}}
                <span class="flex-1 ml-3 whitespace-nowrap">Employees</span>
               
             </a>
          </li>
          <li>
             <a href="/leaves" class="flex items-center p-2 text-base font-normal {{ $page === 2 || $page === 8 || $page === 9 ? 'text-white bg-gray-800' : 'text-gray-300'  }} rounded dark:text-gray-300 hover:bg-gray-800 dark:hover:bg-gray-700">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 {{ $page === 2 || $page === 8 || $page === 9 ? 'text-white' : 'text-gray-500' }} transition duration-75 dark:text-gray-400 group-hover:text-gray-300 dark:group-hover:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                {{-- <img class=" w-10 h-10" src="{{asset("images/conge2.png")}}" alt=""> --}}
                <span class="flex-1 ml-3 whitespace-nowrap">Leaves</span>
             </a>
          </li>
          <li>
             <a href="/cvs" class="flex items-center p-2 text-base font-normal {{ $page === 3 || $page === 6 || $page === 7? 'text-white bg-gray-800' : 'text-gray-300'  }} rounded dark:text-gray-300 hover:bg-gray-800 dark:hover:bg-gray-700">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 {{ $page === 3 || $page === 6 || $page === 7? 'text-white' : 'text-gray-500' }} transition duration-75 dark:text-gray-400 group-hover:text-gray-300 dark:group-hover:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                {{-- <img class=" w-10 h-10" src="{{asset("images/cv2.png")}}" alt=""> --}}
                <span class="flex-1 ml-3 whitespace-nowrap">Cvs</span>
                
             </a>
          </li>
          <li>
            <a href="/users" class="flex items-center p-2 text-base font-normal {{ $page === 10 ? 'text-white bg-gray-800' : 'text-gray-300'  }} rounded dark:text-gray-300 hover:bg-gray-800 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 {{ $page === 10 ? 'text-white' : 'text-gray-500' }} transition duration-75 dark:text-gray-400 group-hover:text-gray-300 dark:group-hover:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
            </a>
         </li>
          
       </ul>
    </div>
 </aside>