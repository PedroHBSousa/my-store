@extends('layouts.default')

@section('content')
    {{-- {{ dd($product) }} --}}
    <section class="text-gray-600">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-2/4 w-full mx-auto overflow-auto">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Editar produto</h1>
                </div>

                <form enctype="multipart/form-data" action="{{ route('admin.product.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Nome do produto</label>
                                <input type="text" id="name" name="name" value="{{ $product->name }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Preço</label>
                                <input type="text" id="price" name="price" value="{{ $product->price }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Estoque</label>
                                <input type="text" id="stock" name="stock" value="{{ $product->stock }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Imagem de capa</label>
                                <input type="file" id="cover" name="cover"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            </div>
                        </div>

                        @if ($product->cover)
                            <div class="p-2 w-full relative group">
                                <!-- Container da imagem -->
                                <div class="overflow-hidden rounded-lg relative">
                                    <img alt="ecommerce"
                                        class="object-cover object-center w-full h-full block transform transition-transform duration-300 group-hover:scale-105"
                                        src="{{ Storage::url($product->cover) }}" />

                                    <!-- Overlay e botão de remover imagem -->
                                    <div
                                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 transition-opacity duration-300 group-hover:bg-opacity-50">
                                        <a href="{{ route('admin.product.destroyImage', $product->id) }}"
                                            class="px-4 py-2 bg-red-600 text-white rounded-lg opacity-0 transition-opacity duration-300 group-hover:opacity-100 hover:bg-red-700">
                                            Remover imagem de capa
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Descrição</label>
                                <textarea id="description" name="description"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <button type="submit"
                                class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Salvar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection('content')
