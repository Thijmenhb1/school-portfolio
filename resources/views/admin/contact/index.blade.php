<x-app-layout>

    <div class="pt-20">
        <div class="flex justify-center">
            <table class="w-3/4">
                <thead class="bg-gray-800 text-gray-300">
                    <th class="pr-1">ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Message</th>
                    <th>Submission date</th>
                    <th>Delete Message</th>
                </thead>
            <tbody class="bg-gray-700 text-gray-400">
            @foreach($contacts as $contact)
                <tr class="border-b border-gray-600 ">
                    <td>{{ $contact->id }}</td>
                    <td class="border-l border-gray-600">{{ $contact->name }}</td>
                    <td class="border-l border-gray-600">{{ $contact->email }}</div></td>
                    <td class="border-l border-gray-600">{{ $contact->message }}</td>
                    <td class="border-l border-gray-600">{{ $contact->created_at }}</td>
                    <td class="border-l border-gray-600">
                        <form action="{{ route('dashboard.contact.destroy', $contact->id) }}" method="post" class="flex justify-center w-full">
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

</x-app-layout>
