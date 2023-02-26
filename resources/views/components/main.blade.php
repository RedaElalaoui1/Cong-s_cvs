@props(['page', 'data'])
<div class="bg-gray-50 col-span-5 px-4 h-full pt-6 overflow-hidden">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if ($page == 3  )
    <div class="flex justify-between items-center">
    @endif
        @if ($page == 3  )
        <div class="flex items-center">
            <label class="mr-5 px-2 font-semibold text-gray-800" for="">Filter By Note : </label>
            <div class="">
                <span id="1" class="fas fa-star cursor-pointer"></span>
                <span id="2" class="fas fa-star cursor-pointer"></span>
                <span id="3" class="fas fa-star cursor-pointer"></span>
                <span id="4" class="fas fa-star cursor-pointer"></span>
                <span id="5" class="fas fa-star cursor-pointer"></span>
            </div>
            <form action="/cvs" method="GET">
            <button class="ml-6 px-3 py-1.5 rounded bg-gray-800 hover:bg-gray-700 text-gray-50">show all</button>
            </form>

        </div>
        @endif

        @if ($page > 0 && $page < 4 || $page == 10 )
        <x-search :page='$page' />
        @endif
    @if ($page == 3  )
    </div>
    @endif

    @switch($page)
        @case(0)
            <x-home />
            @break
        @case(1)
            <x-table :columns="[ 'Email', 'start_work', 'Job', 'Salary','days_leave']" :data='$data' :page='$page'/>
            @break
        @case(2)
            <x-table :columns="[ 'Begin date', 'End date']" :data='$data' :page='$page'/>
            @break
        @case(3)
            <x-table :columns="['File', 'Note']" :data='$data' :page='$page'/>
            @break
        @case(4)
            <x-form_employee :data="$data"/>
            @break
        @case(5)
            <x-form_employee :data="$data"/>
            @break
        @case(6)
            <x-form_cv data=""/>
            @break
        @case(7)
            <x-form_cv :data="$data"/>
            @break
        @case(8)
            <x-form_leave :data="$data"/>
            @break
        @case(9)
            <x-form_leave :data="$data"/>
            @break
        @case(10)
            <x-table :columns="[  'Email']" :data='$data' :page='$page'/>
            @break

        @case(11)
            <x-information :data="$data"/>
            @break

        @default
            @break

    @endswitch



</div>
