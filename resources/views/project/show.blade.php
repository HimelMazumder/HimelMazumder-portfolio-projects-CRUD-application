@vite(['resources/css/app.css', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project - {{ $project->title }}</title>
</head>

<body>
    <main class="w-full min-h-screen bg-[#222] flex flex-col items-center p-4 gap-4">
        <div class="w-full flex justify-between bg-blue-200 px-4 py-3 rounded shadow-md">
            <p class="text-2xl font-semibold text-[#222]">Project - {{ $project->title }}</p>
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

            <div class="h-fit space-y-2 w-[70%] bg-white px-6 py-6 rounded-2xl mx-auto my-auto">
                <div class="flex gap-3 justify-between items-center">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image"
                        class="w-50 h-50 border-2 border-yellow-400 object-cover rounded-2xl mb-5" />

                    <div class="text-green-900 p-2 rounded-xl text-wrap grow-1 items-center">
                        <p class="w-full text-justify text-xl">{{ $project->title }}</p>
                    </div>

                    <div class="flex flex-col gap-3 justify-center items-center w-10">
                        <button title="Edit"
                            onclick="window.location.href='{{ route('project.edit', $project->id) }}'"
                            class=" w-7 h-7 btn btn-primary bg-green-700 px-1 py-1 hover:bg-green-600 text-yellow-100 flex flex-row justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>


                        </button>

                        <form action="{{ route('project.destroy', $project->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this project?');"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Delete"
                                class="w-7 h-7 btn btn-primary bg-red-700 px-1 py-1 hover:bg-red-600 text-yellow-100 flex flex-row justify-center items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </div>

                </div>
                <div class="text-green-900 flex gap-2 bg-yellow-200 p-2 rounded-xl text-wrap">
                    <p class="ml-2 w-40 border-r-1 text-xl">Title</p>
                    <p class="ml-2 w-full text-justify text-lg">{{ ucfirst($project->title) }}</p>
                </div>
                <div class="text-green-900 flex gap-2 bg-yellow-200 p-2 rounded-xl text-wrap">
                    <p class="ml-2 w-40 border-r-1 text-xl">Description</p>
                    <p class="ml-2 w-full text-justify text-lg">{{ $project->description }}</p>
                </div>
                <div class="text-green-900 flex gap-2 bg-yellow-200 p-2 rounded-xl text-wrap">
                    <p class="ml-2 w-40 border-r-1 text-xl">Repository</p>
                    <p class="ml-2 w-full text-justify text-lg"><a class="link link-hover" href={{ $project->url_repo }}
                            target="_blank">Click Here</a></p>
                </div>
                <div class="text-green-900 flex gap-2 bg-yellow-200 p-2 rounded-xl text-wrap">
                    <p class="ml-2 w-40 border-r-1 text-xl">Live</p>
                    <p class="ml-2 w-full text-justify text-lg"><a class="link link-hover"
                            href={{ $project->url_live }} target="_blank">Click Here</a></p>
                </div>
                <div class="text-green-900 flex gap-2 bg-yellow-200 p-2 rounded-xl text-wrap">
                    <p class="ml-2 w-40 border-r-1 text-xl">Status</p>
                    <p class="ml-2 w-full text-justify text-lg"> {{ ucwords($project->status) }}</p>
                </div>
                <div class="text-green-900 flex gap-2 bg-yellow-200 p-2 rounded-xl text-wrap">
                    <p class="ml-2 w-40 border-r-1 text-xl">Created At</p>
                    <p class="ml-2 w-full text-justify text-lg">{{ $project->created_at }}</p>
                </div>
                <div class="text-green-900 flex gap-2 bg-yellow-200 p-2 rounded-xl text-wrap">
                    <p class="ml-2 w-40 border-r-1 text-xl">Updated At</p>
                    <p class="ml-2 w-full text-justify text-lg">{{ $project->updated_at }}</p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
