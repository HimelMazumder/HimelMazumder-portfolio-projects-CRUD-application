<form action="{{ isset($project) ? route('project.update', $project->id) : route('project.store') }}" method="POST"
    enctype="multipart/form-data" class="h-fit space-y-4 w-md bg-white px-6 py-6 rounded-2xl mx-auto my-auto">
    @csrf

    @if (isset($project))
        @method('PUT')
    @endif

    <div>
        <label
            class="input w-full text-[#222] bg-blue-100 {{ $errors->has('title') ? 'border-red-500 ring-red-500' : '' }}">
            <span class="label text-[#222]">Title</span>
            <input name="title" value="{{ old('title', $project->title ?? '') }}" {{-- required --}} />
        </label>
        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <textarea name="description" placeholder="Description" class="textarea textarea-sm w-full text-[#222] bg-blue-100">{{ old('description', $project->description ?? '') }}</textarea>

    <label class="input w-full text-[#222] bg-blue-100">
        <span class="label text-[#222]">Repository</span>
        <input type="url" name="url_repo" placeholder="www.github.com"
            value="{{ old('url_repo', $project->url_repo ?? '') }}" />
    </label>

    <label class="input w-full text-[#222] bg-blue-100">
        <span class="label text-[#222]">Live</span>
        <input type="url" name="url_live" value="{{ old('url_live', $project->url_live ?? '') }}"
            placeholder="www.example.com" />
    </label>

    <div class="flex flex-col gap-1">
        <input name="image" type="file" accept="image/*"
            class="file-input file:bg-blue-500 file:border-r-0 w-full text-[#222] bg-blue-100 {{ $errors->has('image') ? 'border-red-500 ring-red-500' : '' }}" />
        @if (isset($project) && $project->image)
            <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" width="70"
                class="ml-1 rounded-lg border-2 border-blue-500" />
        @else
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        @endif
    </div>

    <label class="select w-full text-[#222] bg-blue-100">
        <span class="label text-[#222]">Status</span>
        <select name="status" required>
            <option value="published" {{ old('status', $project->status ?? '') == 'published' ? 'selected' : '' }}>
                Published</option>
            <option value="draft" {{ old('status', $project->status ?? '') == 'draft' ? 'selected' : '' }}>Draft
            </option>
        </select>
    </label>


    <div class="pt-4 flex flex-row gap-2 justify-end mr-1">
        <button type="submit"
            class="btn btn-primary bg-blue-700 pl-4 pr-4 py-2 hover:bg-blue-800 text-yellow-100 flex flex-row justify-center items-center gap-1">
            {{ isset($project) ? 'Update' : 'Add' }}
        </button>
        @empty($project)
            <button type="reset"
                class="btn btn-primary bg-blue-700 pl-4 pr-4 py-2 hover:bg-blue-800 text-yellow-100 flex flex-row justify-center items-center gap-1">
                Reset
            </button>
        @endisset
    </div>
</form>
