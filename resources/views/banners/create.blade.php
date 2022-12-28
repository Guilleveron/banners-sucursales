<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear banner
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-4 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('banners.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-3 py-3 bg-white flex flex-wrap">
                            <div class="w-full md:w-2/5 px-3 mb-3 md:mb-0">
                                <label for="title"
                                    class="block font-medium text-sm text-gray-700 caret-red-500">Título</label>
                                <input type="text" name="title" id="title" placeholder="Carnicería"
                                    class="block mt-1 w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white caret-red-500 focus:border-red-600 focus:ring-offset-2 focus:ring focus:ring-red-300 focus:shadow-red-500 focus:outline-none"
                                    value="{{ old('title', '') }}" />
                                @error('title')
                                    <x-alert class="mt-2">
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    </x-alert>
                                @enderror
                            </div>
                            <div class="w-full md:w-2/5 px-3 mb-3 md:mb-0">
                                <label for="categories"
                                    class="block font-medium text-sm text-gray-700">Categoría</label>
                                <select name="categories[]" id="categories"
                                    class="form-select appearance-none
                                caret-red-500 focus:border-red-600 focus:ring-offset-2 focus:ring focus:ring-red-300 focus:shadow-red-500 focus:outline-none
                              block
                              w-full
                              mt-1
                              px-3 md:mb-0
                              py-1.5
                              text-base
                              font-normal
                              text-gray-700
                              bg-white bg-clip-padding bg-no-repeat
                              border border-solid border-gray-300
                              rounded
                              transition
                              ease-in-out
                              focus:text-gray-700 focus:bg-white"
                                    aria-label="Default select example">
                                    @foreach ($categories as $id => $category)
                                        <option value="{{ $id }}"
                                            {{ in_array($id, old('categories', [])) ? 'selected' : '' }}>
                                            {{ $category }}</option>
                                    @endforeach
                                </select>
                                @error('categories')
                                    <x-alert class="mt-2">
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    </x-alert>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/5 px-3 mb-3 md:mb-0">
                                <label for="order" class="block font-medium text-sm text-gray-700">Orden</label>
                                <input type="number" name="order" id="order" placeholder="1"
                                    class="block mt-1 w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white caret-red-500 focus:border-red-600 focus:ring-offset-2 focus:ring focus:ring-red-300 focus:shadow-red-500 focus:outline-none"
                                    value="{{ old('order', '') }}" />
                                @error('order')
                                    <x-alert class="mt-2">
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    </x-alert>
                                @enderror
                            </div>


                        </div>
                        <div class="px-3 py-3 bg-white flex flex-wrap">
                            <div class="w-full md:w-2/4 px-3 mb-3 md:mb-0">
                                <label for="status"
                                    class="block font-medium text-sm text-gray-700 mb-1">Estado</label>
                                <select
                                    class="form-select appearance-none
                                    caret-red-500 focus:border-red-600 focus:ring-offset-2 focus:ring focus:ring-red-300 focus:shadow-red-500 focus:outline-none
                                  block
                                  w-full
                                  px-3
                                  py-1.5
                                  text-base
                                  font-normal
                                  text-gray-700
                                  bg-white bg-clip-padding bg-no-repeat
                                  border border-solid border-gray-300
                                  rounded
                                  transition
                                  ease-in-out
                                  m-0
                                  focus:text-gray-700 focus:bg-white"
                                    aria-label="Default select example" name="status">
                                    <option value="1"
                                        {{ old('status') == 1 || old('status') == null ? 'selected' : '' }}>Activo
                                    </option>
                                    <option value="0"
                                        {{ old('status') == 0 && old('status') != null ? 'selected' : '' }}>
                                        Inactivo
                                    </option>
                                </select>
                                @error('status')
                                    <x-alert class="mt-2">
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    </x-alert>
                                @enderror
                            </div>
                            <div class="w-full md:w-2/4 px-3 mb-3 md:mb-0">
                                <label for="timeRefresh" class="block font-medium text-sm text-gray-700">Tiempo
                                    (segundos)
                                </label>
                                <input type="number" name="timeRefresh" id="timeRefresh" placeholder="5"
                                    class="block mt-1 w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white caret-red-500 focus:border-red-600 focus:ring-offset-2 focus:ring focus:ring-red-300 focus:shadow-red-500 focus:outline-none"
                                    value="{{ old('timeRefresh', '') }}" />
                                @error('timeRefresh')
                                    <x-alert class="mt-2">
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    </x-alert>
                                @enderror
                            </div>
                        </div>

                        <div class="px-3 py-3 bg-white flex flex-wrap">
                            <div class="w-full md:w-2/4 px-3 mb-3 md:mb-0">
                                <label for="image" class="form-label inline-block mb-2 text-gray-700">Imagen</label>
                                <input
                                    class="form-control
                                  block
                                  w-full
                                  px-3
                                  py-1.5
                                  text-base
                                  font-normal
                                  text-gray-700
                                  bg-white bg-clip-padding
                                  border border-solid border-gray-300
                                  rounded
                                  transition
                                  ease-in-out
                                  m-0
                                  focus:text-gray-700 focus:bg-white
                                  caret-red-500 focus:border-red-600 focus:ring-offset-2 focus:ring focus:ring-red-300 focus:shadow-red-500 focus:outline-none"
                                    type="file" name="image" id="image">
                                @error('image')
                                    <x-alert class="mt-2">
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    </x-alert>
                                @enderror
                            </div>
                            <div class="w-full md:w-2/4 h-32 md:h-48 px-3 mb-3 md:mb-0">
                                <img class="ml-auto mr-auto" id="imageSelected" style="max-height: 100%;">
                            </div>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <a href="{{ route('banners.index') }}"
                                class="mx-2 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-red disabled:opacity-25 transition ease-in-out duration-150">Cancelar</a>
                            <button type="submit"
                                class="mx-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<!-- Script para mostrar la imagen antes de crear el nuevo Banner -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(e) {
        $('#image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imageSelected').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
