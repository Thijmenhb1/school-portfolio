<x-app-layout>

    <div class="pt-20 flex justify-center">

        <div class="bg-gray-800 w-1/4 text-gray-400 rounded-xl">

            <div class="flex justify-center border-b-2 border-gray-900">
                <h1 class="p-3 text-xl text-gray-300">Edit</h1>
            </div>

            <form action="{{ route('skills.update', $skill->id) }}" method="post" class="pl-7 mt-3" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <p class=" mt-5">Title</p>
                <input type="text" name="title" value="{{ $skill->title }}" class="w-2/4 bg-gray-600 border-gray-800 focus:ring-gray-900 focus:border-gray-900 text-gray-400">
                @error('title')
                <br>
                <p class="text-red-700"> {{ $message }} </p>
                @enderror


                <p class=" mt-5">Created At</p>
                <input type="datetime-local" name="created_at" value="{{ $skill->created_at }}" class="bg-gray-600 border-gray-800 focus:ring-gray-900 focus:border-gray-900 text-gray-400">
                @error('created_at')
                <br>
                <p class="text-red-700"> {{ $message }} </p>
                @enderror


                <br>
                <div class="flex justify-center mr-7">
                    <button type="submit" class="p-1 rounded-xl mt-7 mb-5 border-2 border-gray-600 text-green-700">submit</button>
                </div>
            </form>


        </div>
    </div>
</x-app-layout>

