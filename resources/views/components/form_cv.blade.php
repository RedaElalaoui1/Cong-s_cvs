@props(['data'])
<div class="w-full h-full flex flex-col items-center">

    <div class="w-2/3 shadow-md shadow-gray-300/50 rounded-md">
        <div class="py-8 px-5 w-full flex justify-center"><div class="w-1/3 text-center text-3xl font-bold  rounded-lg h-full">{{ $data ? 'Edit Cv' : 'Add Cv' }}</div></div>
        <div class="px-5 w-full flex justify-center">
            <form class="w-full py-8" action="{{ $data ? '/cvs/update/'.$data->id : '/cvs/save/' }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($data=='')
                <div class="mb-6">
                    <div class="flex justify-between">
                        <label for="name" class="mb-2 text-md font-medium text-gray-900 dark:text-gray-300">Name</label>
                        @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="text" id="name" value="{{ $data ? $data->name : '' }}" name="name" class="bg-gray-50 text-gray-900 text-sm rounded border border-gray-300 focus:border-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-300 block w-full py-3 px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name">
                </div>
                @endif
                @if ($data=='')
                <div class="mb-6">
                    <div class="flex justify-between">
                        <label for="file" class="mb-2 text-md font-medium text-gray-900 dark:text-gray-300">File</label>
                        @error('file')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="file" id="file" value="{{ $data ? $data->fichier : '' }}" name="file" class="bg-gray-50 text-gray-900 text-sm rounded border border-gray-300 focus:border-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-300 block w-full py-3 px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                </div>
                @endif

                @if ($data!=='')
                    <div class="mb-6 mt-5">
                        <label for="note" class="mb-2 text-md font-medium text-gray-900 dark:text-gray-300">File</label>
                        <div class="flex justify-center">
                        <a class="w-1/6 h-full" href="/cvs/image/{{ $data->id }}">
                            <div class=" shadow-xl flex justify-center hover:bg-slate-200 rounded-lg cursor-pointer">

                                <img class="w-14 h-14 " src="{{asset("images/pdf.png")}}" alt="">
                            </div>
                        </a>
                        </div>
                    </div>
                @endif

            <div class="mb-6 mt-5">
                <div class="flex justify-between">
                    <label for="note" class="mb-2 text-md font-medium text-gray-900 dark:text-gray-300">Note</label>
                    @error('note')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <input value="{{ $data ? $data->note : ''}}" type="number" name="note" min="1" max="5" class="bg-gray-50 text-gray-900 text-sm rounded border border-gray-300 focus:border-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-300 block w-full py-3 px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Note">
            </div>
            <button type="submit" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-8 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ $data ? 'Edit' : 'Add' }}</button>

        </form>
    </div>
</div>
</div>












