<x-app-layout>


    <div class="pt-20 text-xl">

        <div class="flex justify-center pb-2">
            <p class="text-2xl text-gray-400">Add skill</p>
        </div>

        <div class="pb-10 flex justify-center">
            <a href="skills/create" class="bg-gray-600 px-2.5 rounded-lg text-4xl text-green-600 border border-gray-500"><p class="mb-0.5">+</p></a>
        </div>


        <div class="flex justify-center">
            <table class="w-2/4">
                <thead class="bg-gray-800 text-gray-300">
                <th class="px-10 w-3/4">Skill</th>
                <th class="px-10 w-1/4">Actions</th>
                </thead>
                <tbody class="bg-gray-700 text-gray-400">
                @foreach($skills as $skill)

                    <tr class="border-b border-gray-600">

                        <td class="px-10 py-2 flex justify-center">{{ $skill->title }}</td>
                        <td>
                            <div  class="flex justify-center w-full h-full">
                                <a href="{{ route('skills.edit', $skill->id) }}" class="text-sky-600">edit</a>
                                <div class="w-8"></div>
                                <form action="{{ route('dashboard.skills.destroy', $skill->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="text-red-600 text-xl">X</button>
                                </form>
                            </div>
                        </td>

                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>




</x-app-layout>
