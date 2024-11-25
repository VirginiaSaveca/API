<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('vendor/remix_icon/4.5.0/remixicon.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/inter/4.0/inter.min.css') }}" />

    <tallstackui:script />
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/dashboard.css'])

</head>

<body class="text-gray-800 font-inter dark">
    <x-dialog />

    <!-- start: Sidebar -->
    <div class="fixed top-0 left-0 z-50 w-64 h-full max-h-screen transition-transform bg-gray-900 sidebar-menu">
        <div class="flex flex-col h-full">
            <div class="px-4">
                <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
                    <img src="https://placehold.co/32x32" alt="" class="object-cover w-8 h-8 rounded">
                    <span class="ml-3 text-lg font-bold text-white">Logo</span>
                </a>
            </div>
            <div class="flex-1 px-4 overflow-y-auto">
                <ul class="p-0 m-0">
                    <li @class(['mb-1 group', 'active' => Route::is('dashboard')])>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-speed-up-line"></i>
                            <span class="text-sm">Dashboard</span>
                        </a>
                    </li>

                    <li @class(['mb-1 group', 'active' => Route::is('branch')])>
                        <a href="{{ route('branch') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-home-2-line"></i>
                            <span class="text-sm">Extensão</span>
                        </a>
                    </li>

                    <li @class(['mb-1 group', 'active' => Route::is('oragnic_unit')])>
                        <a href="{{ route('oragnic_unit') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-home-9-line"></i>
                            <span class="text-sm">Unidade Orgânica</span>
                        </a>
                    </li>

                    <li @class(['mb-1 group', 'active' => Route::is('department')])>
                        <a href="{{ route('department') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-dashboard-line"></i>
                            <span class="text-sm">Departamento</span>
                        </a>
                    </li>

                    <li @class(['mb-1 group', 'active' => Route::is('partition')])>
                        <a href="{{ route('partition') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-list-indefinite"></i>
                            <span class="text-sm">Partição</span>
                        </a>
                    </li>

                    <li @class(['mb-1 group', 'active' => Route::is('career')])>
                        <a href="{{ route('career') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-empathize-line"></i>
                            <span class="text-sm">Carreira</span>
                        </a>
                    </li>

                    <li @class(['mb-1 group', 'active' => Route::is('category')])>
                        <a href="{{ route('category') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-book-shelf-line"></i>
                            <span class="text-sm">Categoria</span>
                        </a>
                    </li>

                    <li @class(['mb-1 group', 'active' => Route::is('level')])>
                        <a href="{{ route('level') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-stairs-line"></i>
                            <span class="text-sm">Nível</span>
                        </a>
                    </li>

                    <li @class(['mb-1 group', 'active' => Route::is('position')])>
                        <a href="{{ route('position') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-award-line"></i>
                            <span class="text-sm">Posição</span>
                        </a>
                    </li>

                    <li @class(['mb-1 group', 'active' => Route::is('salarylevel')])>
                        <a href="{{ route('salarylevel') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-money-dollar-box-line"></i>
                            <span class="text-sm">Nível salarial</span>
                        </a>
                    </li>

                    <li @class(['mb-1 group', 'active' => Route::is('employee')])>
                        <a href="{{ route('employee') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-id-card-line"></i>
                            <span class="text-sm">Funcionário</span>
                        </a>
                    </li>

                    <li @class(['mb-1 group', 'active' => Route::is('qualification')])>
                        <a href="{{ route('qualification') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-equal-line"></i>
                            <span class="text-sm">Qualificação</span>
                        </a>
                    </li>

                    <li @class(['mb-1 group', 'active' => Route::is('transfer')])>
                        <a href="{{ route('transfer') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-user-shared-line"></i>
                            <span class="text-sm">Transferência</span>
                        </a>
                    </li>

                    <li @class(['mb-1 group', 'active' => Route::is('adminacts')])>
                        <a href="{{ route('adminacts') }}"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-contacts-book-2-line"></i>
                            <span class="text-sm">Atos administrativos</span>
                        </a>
                    </li>

                    <li class="mb-1 group">
                        <a href="{{ route('log-viewer.index') }}" target="_blank" rel="noopener noreferrer"
                            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="mr-3 text-lg ri-news-line"></i>
                            <span class="text-sm">Visualizador de logs</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="fixed top-0 left-0 z-40 w-full h-full bg-black/50 md:hidden sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
        <div class="sticky top-0 left-0 z-30 flex items-center px-6 py-2 bg-white shadow-md shadow-black/5">
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center ml-auto">
                <li class="mr-1 dropdown">
                    <button type="button"
                        class="flex items-center justify-center w-8 h-8 text-gray-400 rounded dropdown-toggle hover:bg-gray-50 hover:text-gray-600">
                        <i class="ri-search-line"></i>
                    </button>
                    <div
                        class="z-30 hidden w-full max-w-xs bg-white border border-gray-100 rounded-md shadow-md dropdown-menu shadow-black/5">
                        <form action="" class="p-4 border-b border-b-gray-100">
                            <div class="relative w-full">
                                <input type="text"
                                    class="w-full py-2 pl-10 pr-4 text-sm border border-gray-100 rounded-md outline-none bg-gray-50 focus:border-blue-500"
                                    placeholder="Search...">
                                <i class="absolute text-gray-400 -translate-y-1/2 ri-search-line top-1/2 left-4"></i>
                            </div>
                        </form>
                        <div class="mt-3 mb-2">
                            <div class="text-[13px] font-medium text-gray-400 ml-4 mb-2">Recently</div>
                            <ul class="overflow-y-auto max-h-64">
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                Create landing page</div>
                                            <div class="text-[11px] text-gray-400">$345</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <button type="button"
                        class="flex items-center justify-center w-8 h-8 text-gray-400 rounded dropdown-toggle hover:bg-gray-50 hover:text-gray-600">
                        <i class="ri-notification-3-line"></i>
                    </button>
                    <div
                        class="z-30 hidden w-full max-w-xs bg-white border border-gray-100 rounded-md shadow-md dropdown-menu shadow-black/5">
                        <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                            <button type="button" data-tab="notification" data-tab-page="notifications"
                                class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1 active">Notifications</button>
                            <button type="button" data-tab="notification" data-tab-page="messages"
                                class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1">Messages</button>
                        </div>
                        <div class="my-2">
                            <ul class="overflow-y-auto max-h-64" data-tab-for="notification"
                                data-page="notifications">
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                New order</div>
                                            <div class="text-[11px] text-gray-400">from a user</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                New order</div>
                                            <div class="text-[11px] text-gray-400">from a user</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                New order</div>
                                            <div class="text-[11px] text-gray-400">from a user</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                New order</div>
                                            <div class="text-[11px] text-gray-400">from a user</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                New order</div>
                                            <div class="text-[11px] text-gray-400">from a user</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <ul class="hidden overflow-y-auto max-h-64" data-tab-for="notification"
                                data-page="messages">
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                John Doe</div>
                                            <div class="text-[11px] text-gray-400">Hello there!</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                John Doe</div>
                                            <div class="text-[11px] text-gray-400">Hello there!</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                John Doe</div>
                                            <div class="text-[11px] text-gray-400">Hello there!</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                John Doe</div>
                                            <div class="text-[11px] text-gray-400">Hello there!</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="block object-cover w-8 h-8 align-middle rounded">
                                        <div class="ml-2">
                                            <div
                                                class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                John Doe</div>
                                            <div class="text-[11px] text-gray-400">Hello there!</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="ml-3 dropdown">
                    <button type="button" class="flex items-center dropdown-toggle">
                        <span class="text-[13px]">
                            {{ Auth::user()->name }}
                        </span>
                    </button>
                    <ul
                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="{{ route('profile') }}"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button type="submit"
                                    class="w-full flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        @if (isset($header))
            <div class="px-6 py-6 mx-auto lg:px-8 max-w-7xl">
                {{ $header }}
            </div>
        @endif



        <div class="px-6 py-6 mx-auto lg:px-8 max-w-7xl">
            {{ $slot }}
        </div>
    </main>
    <!-- end: Main -->

    <script src="{{ asset('vendor/popper.js/2.11.8/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/4.4.6/chart.min.js') }}"></script>
    @vite(['resources/js/dashboard.js'])

    @livewireScripts
</body>

</html>
