@props(['columns', 'data', 'page'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
@error('err')
<div class="flex justify-center items-center w-full">
    <div class="py-2 px-3 mt-2 w-2/3 text-center bg-red-200 rounded text-red-500 text-md">{{ $message }}</div>
</div>
@enderror


<div class="overflow-auto h-[80%] relative shadow-md shadow-gray-300/30 sm:rounded-lg mt-5">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0">
            <tr>
                <th scope="col" class="py-3 px-6">
                    ID
                </th>
                <th scope="col" class="py-3 px-6">
                    Name
                </th>
                @foreach ($columns as $col)

                <th scope="col" class="py-3 px-6">
                    {{ $col }}
                </th>
                @endforeach
                @if ($page !== 10)
                <th scope="col" class="py-3 px-6">
                    Created by
                </th>
                @endif

                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @switch($page)
                @case(1)
                    @foreach ($data as $emp)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6">
                            {{ $emp->id }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $emp->name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $emp->email }}
                        </td>

                        <td class="py-4 px-6">
                            {{ $emp->start_work }}
                        </td>

                        <td class="py-4 px-6">
                            {{ $emp->job }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $emp->salary }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $emp->days_leave }}
                        </td>
                        <td class="py-4 px-6">
                            {{ isset($emp->user->name) ? $emp->user->name : 'deleted' }}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex">

                                <a class="mr-6" href="/employee/edit/{{ $emp->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <x-icons.edit />
                                </a>
                                <a href="/employee/delete/{{ $emp->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline " onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'))">
                                    <x-icons.delete />
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @break
                @case(2)
                    @foreach ($data as $leave)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6">
                            {{ $leave->id }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $leave->employee->name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $leave->begin_date }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $leave->end_date }}
                        </td>
                        <td class="py-4 px-6">
                            {{ isset($leave->user->name) ? $leave->user->name : 'deleted' }}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex">
                                {{-- <a class="mr-4" href="/leaves/edit/{{ $leave->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <x-icons.edit />
                                </a> --}}
                                <a class="ml-4" href="/leaves/delete/{{ $leave->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline " onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'))">
                                    <x-icons.delete />
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @break
                 @case(3)

                    @foreach ($data as $cv)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6">
                            {{ $cv->id }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $cv->name }}
                        </td>
                        <td class="py-4 px-6">
                            <div class="w-10 hover:bg-slate-200 rounded-lg"><a href="/cvs/image/{{ $cv->id }}"> <img class="w-10 h-10" src="{{asset("images/pdf.png")}}" alt=""> </a></div>
                        </td>
                        <td class="py-4 px-6">
                            {{ $cv->note }}
                        </td>
                        <td class="py-4 px-6">
                            {{ isset($cv->user->name) ? $cv->user->name : 'deleted' }}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex">
                                <a class="mr-4" href="/cvs/edit/{{ $cv->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <x-icons.edit />
                                </a>
                                <a href="/cvs/delete/{{ $cv->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline " onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'))">
                                    <x-icons.delete />
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @break
                @case(10)
                    @foreach ($data as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6">
                            {{ $user->id }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->name }}
                        </td>

                        <td class="py-4 px-6">
                            {{ $user->email }}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex ">

                                <a class="ml-4" href="/users/delete/{{$user->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline " onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'))">
                                    <x-icons.delete />
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @break

                @default
                    @break
            @endswitch

        </tbody>
    </table>
    @if ($page !== 10)
    <x-button :page='$page'/>
    @endif

</div>
<div class="w-full flex justify-center pt-4">
    {{$data->links('pagination::tailwind')}}
</div>

