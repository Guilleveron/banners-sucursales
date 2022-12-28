<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                {{ __('Confirme el acceso a su cuenta ingresando el código de autenticación proporcionado por su aplicación de autenticación.') }}
            </div>

            <div class="mb-4 text-sm text-gray-600" x-show="recovery">
                {{ __('Confirme el acceso a su cuenta ingresando uno de sus códigos de recuperación de emergencia.') }}
            </div>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <x-jet-label for="code" value="{{ __('Código') }}" />
                    <x-jet-input id="code"
                        class="block mt-1 w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white caret-red-500 focus:border-red-600 focus:ring-offset-2 focus:ring focus:ring-red-300 focus:shadow-red-500 focus:outline-none"
                        type="text" inputmode="numeric" name="code" autofocus x-ref="code"
                        autocomplete="one-time-code" />
                </div>

                <div class="mt-4" x-show="recovery">
                    <x-jet-label for="recovery_code" value="{{ __('Código de recuperación') }}" />
                    <x-jet-input id="recovery_code"
                        class="block mt-1 w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white caret-red-500 focus:border-red-600 focus:ring-offset-2 focus:ring focus:ring-red-300 focus:shadow-red-500 focus:outline-none"
                        type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                        x-show="! recovery"
                        x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('Usa un código de recuperación') }}
                    </button>

                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                        x-show="recovery"
                        x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('Usar un código de autenticación') }}
                    </button>

                    <x-jet-button class="ml-4">
                        {{ __('Iniciar sesión') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
