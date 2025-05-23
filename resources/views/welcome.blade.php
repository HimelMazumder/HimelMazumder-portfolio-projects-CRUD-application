@vite(['resources/css/app.css', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>

<body>
    <main class="w-full h-screen bg-[#222] flex flex-col items-center justify-center">
        <h1 class="text-4xl text-white font-bold">Welcome to my projects</h1>
        <p class="text-gray-400 mt-2">This is a simple Laravel CRUD application to display projects.</p>
        <div class="mt-5">
            <a href="{{ route('project.index') }}" class="bg-green-800 text-white px-4 py-2 rounded">View Projects</a>
        </div>
    </main>
</body>

</html>
