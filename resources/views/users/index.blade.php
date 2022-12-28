<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de usuarios
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-6 sm:px-10 lg:px-8">
            <div class="block mb-4 sm:mb-8 ml-3 sm:ml-0">
                <a href="{{ route('users.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 sm:py-2 sm:px-4 rounded">
                    <span class="hidden sm:inline-block">Agregar usuario</span>
                    <span class="inline-block sm:hidden text-sm">Agregar<span
                            class="mdi mdi-account-plus sm:hidden pl-1"></span></span>
                </a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col" width="50"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th> --}}
                                        <th scope="col"
                                            class="px-3 py-2 sm:pl-6 sm:pr-2 sm:py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <span class="hidden sm:inline-block">Nombre</span>
                                            <span class="inline-block sm:hidden">Datos del usuario</span></span>
                                        </th>
                                        <th scope="col"
                                            class="hidden sm:table-cell py-2 sm:py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="hidden sm:table-cell py-2 sm:py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Rol
                                        </th>
                                        <th scope="col" width="150"
                                            class="px-3 py-2 sm:px-6 sm:py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($users as $user)
                                        <tr>
                                            {{-- <td class="px-6 py-4 text-sm text-gray-900">
                                                {{ $user->id }}
                                            </td> --}}

                                            <td
                                                class="pl-2 py-1 sm:pl-6 sm:pr-2 sm:py-2 sm:whitespace-nowrap text-sm text-gray-900 truncate">

                                                <span class="font-bold sm:font-normal mr-2">{{ $user->name }}</span>
                                                <div class="inline-flex sm:hidden">
                                                    @foreach ($user->roles as $role)
                                                        @if ($role->title == 'Admin')
                                                            <span
                                                                class="px-2 block text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                {{ $role->title }}
                                                            </span>
                                                        @else
                                                            <span
                                                                class="px-2 block text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                {{ $role->title }}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <span
                                                    class="flex sm:hidden text-gray-500 email">{{ $user->email }}</span>
                                            </td>

                                            <td
                                                class="hidden sm:table-cell py-1 sm:py-2 whitespace-nowrap text-sm text-gray-900 text-center">
                                                {{ $user->email }}
                                            </td>

                                            <td
                                                class="hidden sm:table-cell  align-middle text-center px-1 py-1 sm:px-2 sm:py-2 whitespace-nowrap text-sm text-gray-900">
                                                @foreach ($user->roles as $role)
                                                    @if ($role->title == 'Admin')
                                                        <span
                                                            class="px-2 inline-block text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            {{ $role->title }}
                                                        </span>
                                                    @else
                                                        <span
                                                            class="px-2 inline-block text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                            {{ $role->title }}
                                                        </span>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="px-4 py-1 sm:px-2 sm:py-2 text-sm font-medium">
                                                <a href="{{ route('users.show', $user->id) }}"><span
                                                        class="hidden sm:inline-block text-green-600 hover:text-green-900 mr-1 ml-1">Ver</span>
                                                    <button type="button"
                                                        class="sm:hidden m-1 rounded-full bg-green-600 text-white leading-normal shadow-sm hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out w-7 h-7">
                                                        <span class="mdi mdi-account-details sm:hidden"></span>
                                                    </button></a>
                                                <a href="{{ route('users.edit', $user->id) }}"> <span
                                                        class="hidden sm:inline-block text-indigo-600 hover:text-indigo-900">Editar</span>
                                                    <button type="button"
                                                        class="sm:hidden m-1 rounded-full bg-indigo-600 text-white leading-normal shadow-sm hover:bg-indigo-700 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg transition duration-150 ease-in-out w-7 h-7">
                                                        <span class="mdi mdi-account-edit sm:hidden"></span>
                                                    </button></a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    class="deleteForm inline-block ">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="sm:text-red-600 sm:hover:text-red-900 sm:bg-transparent sm:w-0 sm:h-0 sm:mb-2 m-1 rounded-full bg-red-600 text-white leading-normal shadow-sm hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out w-7 h-7">
                                                        <span class="hidden sm:inline-block">Eliminar</span>
                                                        <span class="mdi mdi-delete sm:hidden"></span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <div>
                                    {!! $users->links() !!}
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
<script>
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.deleteForm')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault()
                    event.stopPropagation()
                    Swal.fire({
                        title: '¿Está seguro de eliminar el usuario?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#20c997',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Confirmar',
                        cancelButtonText: 'Cancelar',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            this.submit();
                            Swal.fire('¡Eliminado!',
                                'El usuario ha sido eliminado exitosamente.', 'success')
                        }
                    })
                }, false)
            });
    })()
</script>
<style scoped>
    .email {
        font-size: 0.75rem;
        line-height: 1rem;
    }

    @media (min-width: 400px) {
        .email {
            font-size: 1rem;
            line-height: 1.5rem;
        }
    }
</style>
