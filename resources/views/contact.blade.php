<x-guest-layout>

    <div class="pt-20 w-full h-full flex justify-center text-gray-800">
        <div class="bg-gray-800 w-1/4 text-gray-400 rounded-xl">

            <div class="flex justify-center border-b-2 border-gray-700">
                <h1 class="p-3 text-xl">Contact</h1>
            </div>


            <form action="{{ route('contact.create') }}" method="post" class="pl-7 mt-3">
                @csrf

                <p class=" mt-5">Name:</p>
                <input type="text" name="name" value="{{old('name')}}" class="w-2/4 bg-gray-600 border-gray-800 focus:ring-gray-900 focus:border-gray-900 text-gray-400">
                @error('name')
                <br>
                <p class="text-red-700"> {{ $message }} </p>
                @enderror

                <p class=" mt-5">E-mail:</p>
                <input type="text" name="email" value="{{old('email')}}" class="w-2/4 bg-gray-600 border-gray-800 focus:ring-gray-900 focus:border-gray-900 text-gray-400">
                @error('email')
                <br>
                <p class="text-red-700"> {{ $message }} </p>
                @enderror

                <p class=" mt-5">Message:</p>
                <textarea name="message" class="w-2/4 resize-none bg-gray-600 border-gray-800 focus:ring-gray-900 focus:border-gray-900 text-gray-400">{{old('message')}}</textarea>
                @error('message')
                <br>
                <p class="text-red-700"> {{ $message }} </p>
                @enderror

                <div class="flex justify-center mr-7">
                    <button type="submit" class="p-1 rounded-xl mt-7 mb-5 border-2 border-gray-600 text-green-600">Submit</button>
                </div>

            </form>

        </div>
    </div>


    @if (@session('message'))
        <p class="text-green-600">{{ @session('message') }}</p>
    @endif











</x-guest-layout>
