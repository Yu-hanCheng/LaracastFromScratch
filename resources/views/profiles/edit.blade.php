<x-app>
    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                Name
            </label>

            <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" value="{{ $user->name }}"
                required>

            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                Password
            </label>

            <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password"
                required>

            @error('password')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                Password comfirmation
            </label>

            <input class="border border-gray-400 p-2 w-full" type="password" name="password_confirmation" 
                required>

            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div> 
        <div class="mb-6">
            <img src="{{ $user->avatar }}" width="100">
            <input type="file" name="avatar" id="avatar">
            @error('avatar')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <button type="submit">
                Submit
            </button>
            <a href="{{ $user->path() }}" class="hover:underline">Cancel</a>
        </div>
    </form>
</x-app>