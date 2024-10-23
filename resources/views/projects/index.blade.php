<x-app-layout>

    <div class="pt-20">

        <div class="flex justify-center pb-2">
            <p class="text-2xl text-gray-400">Add project</p>
        </div>

        <div class="pb-10 flex justify-center">
            <a href="projects/create" class="bg-gray-600 px-2.5 rounded-lg text-4xl text-green-600 border border-gray-500"><p class="mb-0.5">+</p></a>
        </div>


        <div class="flex justify-center">
            <table class="w-3/4">
                <thead class="bg-gray-800 text-gray-300">
                <th class="px-10">Title</th>
                <th class="px-10">Image</th>
                <th class="px-10">Description</th>
                <th class="px-10">Skills</th>
                <th class="px-10">Created At</th>
                <th class="px-10">Actions</th>
                </thead>
                <tbody class="bg-gray-700 text-gray-400">
                @foreach($projects as $project)

                    <tr class="border-b border-gray-600 ">

                        <td class="px-10 py-2">{{ $project->title }}</td>
                        <td class="px-10">
                            <img class="min-h-40 min-w-40" src="{{ asset('storage/' . $project->image) }}" alt="">
                        </td>
                        <td class="px-10">{{ $project->description }}</td>
                        <td class="flex-col">
                            @foreach($project->skills as $skill)
                                <p>{{ $skill->title }}</p>
                            @endforeach
                        </td>
                        <td class="px-10">{{ $project->created_at }}</td>
                        <td class="flex justify-center items-center w-full h-full">

                            <a href="{{ route('projects.edit', $project->id) }}" class="text-sky-600 pt-0.5">edit</a>
                            <div class="w-4"></div>
                            <form action="{{ route('dashboard.projects.destroy', $project->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="text-red-600 text-xl">X</button>
                            </form>
                        </td>

                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
