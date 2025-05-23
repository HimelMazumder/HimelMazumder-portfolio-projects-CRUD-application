@vite(['resources/css/app.css', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Project</title>
</head>

<body>
    <main class="w-full min-h-screen bg-[#222] flex flex-col items-center p-4 gap-4">
        <div class="w-full flex justify-between bg-blue-200 px-4 py-3 rounded shadow-md">
            <p class="text-2xl font-semibold text-[#222]">Edit Project - {{$project->title}}</p>
            <button
                class="btn btn-primary bg-blue-700 pl-2 pr-4 py-2 hover:bg-blue-800 text-yellow-100 flex flex-row justify-center items-center gap-1"
                onclick="window.location.href='{{ route('project.index') }}'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                </svg>
                Project List</button>
        </div>
        <div class="w-full h-full flex justify-between bg-blue-200 px-4 py-4 rounded shadow-md">
            @include('project._form')
        </div>
    </main>
</body>

</html>
