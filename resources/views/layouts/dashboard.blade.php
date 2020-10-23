<!doctype html>
<!--suppress ALL -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ApolloFM - @yield('title' ?? '')</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link href="{{ mix('/css/main.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body class="antialiased text-black bg-cream">
<div class="my-10 md:mx-56">
    <div class="hidden items-start justify-between lg:flex">
        <div id="logo w-1/2">
            @svg('/images/apollo_logo.svg', 'fill-current w-56')
        </div>
        <div class="relative w-1/2 max-w-3xl px-8 py-4 bg-white rounded-tl-full rounded-bl-full fill-current">
            <ul class="flex justify-start">
                <li class="mr-16">
                    <a class="{{ request()->routeIs('dashboard.index') ? 'font-semibold text-normal' : 'font-normal text-gray-500'}} transition-colors duration-200 cursor-pointer hover:text-gray-600"
                       href="{{route('dashboard.index')}}">Home</a>
                </li>
                <li class="mr-16">
                    <a class="{{ request()->routeIs('dashboard.settings') ? 'font-semibold text-normal' : 'font-normal text-gray-500'}} transition-colors duration-200 cursor-pointer hover:text-gray-600"
                       href="{{route('dashboard.settings')}}">Settings</a>
                </li>
                <li class="text-center">
                    <a class="font-normal text-gray-500 transition-colors duration-200 cursor-pointer hover:text-gray-600"
                       href="{{route('login.logout')}}">Logout</a>
                </li>
            </ul>
            <div class="absolute bottom-0 right-0 transform translate-x-1/2">
                <img
                    src="{!! Auth::user()->avatar_url !!}"
                    alt="Profile avatar" class="object-cover w-20 h-20 rounded-full">
            </div>
        </div>
    </div>
    <div class="flex flex-col items-center lg:hidden">
        <div id="logo">
            @svg('/images/apollo_logo.svg', 'fill-current w-64')
        </div>
        <div class="relative w-3/4 mt-24 bg-white rounded-medium">
            <div class="absolute w-full transform -translate-y-1/2">
                <img
                    src="{!! Auth::user()->avatar_url !!}"
                    alt="Twitter profile avatar"
                    class="object-cover w-24 h-24 overflow-hidden border-4 border-green-100 rounded-full mx-auto">
            </div>
            <div class="grid grid-rows-3 gap-3 pt-16 pb-6 px-10 text-lg fill-current">
                <div
                    class="{{ request()->routeIs('dashboard.index') ? 'bg-green-100 font-bold' : 'font-normal'}} transition-colors duration-300 p-5 rounded-medium cursor-pointer">
                    @svg('/images/icons/home.svg', 'w-6 h-6 inline-block mr-10 text-black')
                    <a href="{{route('dashboard.index')}}">Home</a>
                </div>
                <div
                    class="{{ request()->routeIs('dashboard.settings') ? 'bg-green-100 font-bold' : 'font-normal'}} transition-colors duration-300 p-5 cursor-pointer hover:bg-green-100">
                    @svg('/images/icons/adjust.svg', 'w-6 h-6 inline-block mr-10')
                    <a href="{{route('dashboard.settings')}}">Settings</a>
                </div>
                <div class="p-5 cursor-pointer">
                    @svg('/images/icons/logout.svg', 'w-6 h-6 inline-block mr-10')
                    <a href="{{route('login.logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>
    @yield('header')
    @yield('main-content')

</div>
</body>
</html>
