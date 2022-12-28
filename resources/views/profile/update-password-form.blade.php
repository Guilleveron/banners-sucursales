<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Actualizar contraseña') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('Contraseña Actual') }}" />
            <x-jet-input id="current_password" type="password" class="block mt-1 w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white caret-red-500 focus:border-red-600 focus:ring-offset-2 focus:ring focus:ring-red-300 focus:shadow-red-500 focus:outline-none" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('Nueva Contraseña') }}" />
            <x-jet-input id="password" type="password" class="block mt-1 w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white caret-red-500 focus:border-red-600 focus:ring-offset-2 focus:ring focus:ring-red-300 focus:shadow-red-500 focus:outline-none" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
            <x-jet-input id="password_confirmation" type="password" class="block mt-1 w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white caret-red-500 focus:border-red-600 focus:ring-offset-2 focus:ring focus:ring-red-300 focus:shadow-red-500 focus:outline-none" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('¡Guardado!') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
