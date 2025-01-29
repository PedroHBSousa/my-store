@extends('layouts.default')

@section('content')
    <h1>Businesses</h1>
    <form class="text-black " action="{{ route('businesses.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('name')
                    <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                        {{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <input type="text" name="address" placeholder="Address" value="{{ old('address') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('address')
                    <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                        {{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('email')
                    <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                        {{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                    file</label>
                <!-- O input real, escondido -->
                <input type="file" id="file_input" name="logo" class="hidden"
                    onchange="document.getElementById('file_name').textContent = this.files[0]?.name || 'Nenhum arquivo selecionado'">

                <!-- Botão personalizado -->
                <button type="button" onclick="document.getElementById('file_input').click()"
                    class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                    Escolher arquivo
                </button>

                <!-- Texto mostrando o arquivo selecionado -->
                <span id="file_name" class="ml-2 text-gray-500">Nenhum arquivo selecionado</span>

                <!-- Mensagem de erro -->
                @error('logo')
                    <div class="p-4 mt-2 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button
                class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Salvar</button>
        </div>
    </form>

    <ul>
        @foreach ($businesses as $business)
            <li>
                <a>{{ $business->name }}</a>
                <a>{{ $business->email }}</a>
                @if ($business->logo)
                    {{-- <img src="{{ asset('storage/' . $business->logo) }}" alt="Logo" width="350"> --}}
                    <img src="{{ Storage::disk('public')->url($business->logo) }}" alt="Logo" width="350">
                @endif
                {{-- <a href="{{ route('businesses.show', $business->id) }}">{{ $business->name }}</a> --}}
                {{-- <form action="{{ route('businesses.destroy', $business->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Deletar</button>
                </form> --}}
            </li>
        @endforeach
    </ul>

    {{ $businesses->links() }}
@endsection
