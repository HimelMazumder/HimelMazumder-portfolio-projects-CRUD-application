@vite(['resources/css/app.css', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Projects</title>
</head>

<body>
    <main class="w-full min-h-screen bg-[#222] flex flex-col items-center p-4 gap-4">
        <div class="w-full flex justify-between bg-blue-200 px-4 py-3 rounded shadow-md">
            <p class="text-2xl font-semibold text-[#222]">My Projects</p>
            <button
                class="btn btn-primary bg-blue-700 pl-2 pr-4 py-2 hover:bg-blue-800 text-yellow-100 flex flex-row justify-center items-center gap-1"
                onclick="window.location.href='{{ route('project.create') }}'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>Add</button>
        </div>
        <div class="w-full h-full bg-blue-200 rounded">
            @if ($projects->isEmpty())
                <p class="text-center mt-4 text-2xl text-gray-800">No projects found.</p>
            @else
                <div class="overflow-x-auto rounded">
                    <table class="table bg-blue-200 text-[#222]">
                        <thead class="bg-blue-300 text-[#222]">
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Repository</th>
                                <th>Live</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $index => $project)
                                <tr class="hover:bg-blue-100">
                                    <th>
                                        <div class="flex flex-row gap-2 justify-center items-center flex-wrap">
                                            {{ $index + 1 }}
                                            @if ($project->image)
                                                <div class="w-25 h-25 border-1 border-blue-500">
                                                    <img src="{{ asset('storage/' . $project->image) }}"
                                                        class="w-full h-full object-cover" alt="Project Image" />
                                                </div>
                                            @else
                                                <span>No image</span>
                                            @endif

                                        </div>
                                    </th>
                                    <td class="max-w-50 text-justify">{{ ucfirst($project->title) }}</td>
                                    <td class="max-w-70 text-justify">{{ $project->description }}</td>
                                    <td><a class="link link-primary" href={{ $project->url_repo }}
                                            target="_blank">Project Repo</a></td>
                                    <td><a class="link link-primary" href={{ $project->url_live }} target="_blank">Live
                                            Project</a></td>
                                    <td>
                                        <div
                                            class="{{ 'w-fit h-fit rounded-lg px-2 py-1 ' . ($project->status == 'published' ? 'bg-green-700 text-white' : 'bg-yellow-400 text-[#222]') . ' text-sm' }}">
                                            {{ ucwords($project->status) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex flex-row gap-2 items-center">
                                            <button title="View"
                                                onclick="window.location.href='{{ route('project.show', $project->id) }}'"
                                                class=" w-7 h-7 btn btn-primary bg-green-700 px-1 py-1 hover:bg-green-600 text-yellow-100 flex flex-row justify-center items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </button>

                                            <button title="Edit"
                                                onclick="window.location.href='{{ route('project.edit', $project->id) }}'"
                                                class=" w-7 h-7 btn btn-primary bg-green-700 px-1 py-1 hover:bg-green-600 text-yellow-100 flex flex-row justify-center items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-4">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5 flex justify-end mb-2 mr-2">
                        {{ $projects->links() }}
                    </div>
                </div>
            @endif
        </div>
    </main>
</body>

</html>
