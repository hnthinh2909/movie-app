<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App</title>

    <link rel="stylesheet" href="/css/main.css">
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ route('movies.index') }}" class="flex">
                        <svg class="fill-current w-10 text-gray-500" viewBox="0 0 511.816 511.816"><path d="M20.949 298.483v160c0 29.419 23.936 53.333 53.333 53.333h384c29.419 0 53.333-23.915 53.333-53.333v-160H20.949zM252.757 48.776l-79.83 18.944 66.88 98.411 86.464-19.669zM150.741 72.99L64.703 93.384l66.176 97.494 86.592-19.691zM511.274 93.086l-18.155-68.864C488.938 7.475 471.786-3.063 454.868.798l-71.68 17.024 68.011 100.267 52.117-11.861c2.837-.64 5.269-2.411 6.763-4.885s1.92-5.441 1.195-8.257zM360.981 23.091L275.413 43.4l73.642 97.899 79.808-18.155zM128.447 191.838L94.314 277.15h83.691l34.133-85.312zM235.114 191.838l-34.133 85.312h83.69l34.134-85.312zM500.949 191.838h-52.501l-34.133 85.333h97.301v-74.667a10.644 10.644 0 00-10.667-10.666zM341.781 191.838l-34.134 85.312h83.67l34.154-85.312zM42.517 98.675l-17.387 4.117c-8.469 1.92-15.637 7.061-20.181 14.443-4.544 7.403-5.888 16.107-3.776 24.533l19.776 78.165v57.216h50.389l32.021-80.021 5.205-1.173-66.047-97.28z"/></svg>
                    </a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="hove:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="#" class="hove:text-gray-300">TV Shows</a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="#" class="hove:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                <div class="relative mt-3 md:mt-0">
                    <input type="text" class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search">
                    <div class="absolute top-0">
                        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 511.999 511.999"><path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z"/></svg>
                    </div>
                </div>
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="#">
                        <img src="/img/avatar.jpg" alt="Avatar" class="rounded-full w-8 h-8">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
</html>
