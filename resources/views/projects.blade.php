<x-guest-layout>


    <div class="flex justify-center mt-24">
        <table class="w-3/4">
            <thead class="bg-gray-800 text-gray-300">
            <th class="px-10">Title</th>
            <th class="px-10">Image</th>
            <th class="px-10">Description</th>
            <th class="px-10">Skills</th>
            </thead>
            <tbody class="bg-gray-600 text-gray-400">
            @foreach($projects as $project)

                <tr class="border-b border-gray-500 ">

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

                </tr>

            @endforeach

            </tbody>
        </table>
    </div>



</x-guest-layout>

