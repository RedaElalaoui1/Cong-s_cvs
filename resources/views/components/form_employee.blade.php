@props(['data'])
<div class="w-full h-full flex flex-col items-center">
    <div class="w-2/3 shadow-md shadow-gray-300/50 rounded-md">
        <div class="pb-4 pt-2 px-5 w-full flex justify-center"><div class="w-1/3 text-center text-3xl font-bold  rounded-lg h-full">{{ $data['add'] ? 'Add Employee' : 'Edit Employee' }}</div></div>
        <div class="px-5 w-full flex justify-center">
            <form class="w-full py-8" action="{{ $data['add'] ? '/employee/save':'/employee/update/'.$data['data']->id }}" method="POST">
                @csrf
                <div class="mb-6">
                    <div class="flex justify-between">
                        <label for="name" class="mb-2 text-md font-medium text-gray-900 dark:text-gray-300">Name</label>
                        @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <input value="{{ $data['add'] ? '' : $data['data']->name}}" type="text" name="name" class="bg-gray-50 text-gray-900 text-sm rounded border border-gray-300 focus:border-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-300 block w-full py-3 px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name">
                </div>
                <div class="mb-6">
                    <div class="flex justify-between">
                        <label for="start_work" class="mb-2 text-md font-medium text-gray-900 dark:text-gray-300">Start work</label>
                        @error('start_work')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <input value="{{ $data['add'] ? '' : $data['data']->start_work->format('Y-m-d')}}" id="start_work" class="bg-gray-50 text-gray-900 text-sm rounded border border-gray-300 focus:border-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-300 block w-full py-3 px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="" name="start_work" type="date" placeholder=""   >
                </div>
                <div class="mb-6">
                    <div class="flex justify-between">
                        <label for="email" class="mb-2 text-md font-medium text-gray-900 dark:text-gray-300">Email</label>
                        @error('email')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <input value="{{ $data['add'] ? '' : $data['data']->email }}" type="email" name="email" class="bg-gray-50 text-gray-900 text-sm rounded border border-gray-300 focus:border-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-300 block w-full py-3 px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email@exampl.com">
                </div>
                <div class="mb-6">
                    <div class="flex justify-between">
                        <label for="job" class="mb-2 text-md font-medium text-gray-900 dark:text-gray-300">Job</label>
                        @error('job')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <input value="{{ $data['add'] ? '' : $data['data']->job }}" type="text" name="job" class="bg-gray-50 text-gray-900 text-sm rounded border border-gray-300 focus:border-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-300 block w-full py-3 px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Job">
                </div>
                <div class="mb-6">
                    <div class="flex justify-between">
                        <label for="salary" class="mb-2 text-md font-medium text-gray-900 dark:text-gray-300">Salary</label>
                        @error('salary')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <input value="{{ $data['add'] ? '' : $data['data']->salary }}" type="number" min="0" name="salary" class="bg-gray-50 text-gray-900 text-sm rounded border border-gray-300 focus:border-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-300 block w-full py-3 px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Salary">
                </div>

                <button type="submit" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-8 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ $data['add'] ? 'Add Employee' : 'Edit Employee' }}</button>
            </form>
        </div>
    </div>
</div>
