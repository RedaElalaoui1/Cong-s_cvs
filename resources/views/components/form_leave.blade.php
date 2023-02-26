@props(['data'])
<div class="w-full h-full flex flex-col items-center">
    <div class="w-2/3 shadow-md shadow-gray-300/50 rounded-md">
        <div class="py-8 px-5 w-full flex justify-center"><div class="w-1/3 text-center text-3xl font-bold  rounded-lg h-full">{{ $data['add'] ? 'Add Leave' : 'Edit Leave' }}</div></div>
        @error('err')
            <div class="flex justify-center items-center w-full">
                <div class="py-2 px-3 w-2/3 text-center bg-red-200 rounded text-red-500 text-md">{{ $message }}</div>
            </div>
        @enderror
        <div class="px-5 w-full flex justify-center">
            <form id="leaveForm" class="w-full py-8" action="{{ $data['add'] ? '/leaves/save' : '/leaves/update/'.$data['data']->id }}" method="POST">
                @csrf
                @if ($data['add'])
                    <div class="mb-6">
                        <div class="flex justify-between">
                            <label for="employee_id" class="mb-2 text-md font-medium text-gray-900 dark:text-gray-300">Employee</label>
                            @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <input value="{{ $data ? $data->name : '' }}" type="text" name="name" class="bg-gray-50 text-gray-900 text-sm rounded border border-gray-300 focus:border-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-300 block w-full py-3 px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name"> --}}
                        <select name="employee_id" class="bg-gray-50 text-gray-900 text-sm rounded border border-gray-300 focus:border-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-300 block w-full py-3 px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" placeholder="Employee" value="" >
                            @foreach ($data['data'] as $emp)
                                <option value="{{ $emp->id }}">{{$emp->name . " - " . $emp->created_at}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="mb-6">
                    <div class="flex justify-between">
                        <label for="begin_date" class="mb-2 text-md font-medium text-gray-900 dark:text-gray-300">Begin date</label>
                        @error('begin_date')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <input value="{{ $data['add'] ? '' : $data['data']->begin_date}}" id="begin_date" class="bg-gray-50 text-gray-900 text-sm rounded border border-gray-300 focus:border-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-300 block w-full py-3 px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" name="begin_date" type="date" placeholder=""   >
                </div>
                <div class="mb-6">
                    <div class="flex justify-between">
                        <label for="end_date" class="mb-2 text-md font-medium text-gray-900 dark:text-gray-300">End date</label>
                        @error('end_date')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <input value="{{ $data['add'] ? '' : $data['data']->end_date}}" id="end_date" class="bg-gray-50 text-gray-900 text-sm rounded border border-gray-300 focus:border-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-300 block w-full py-3 px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" name="end_date" type="date" placeholder=""   >
                </div>

                <button type="submit" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-8 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ $data['add'] ? 'Add' : 'Ediit'}}</button>
            </form>
        </div>
    </div>
</div>
