@props(['title' => __('Confirmar Contraseña'), 'content' => __('Por su seguridad, confirme su contraseña para continuar.'), 'button' => __('Confirmar')])

@php
$confirmableId = md5($attributes->wire('then'));
@endphp

<span {{ $attributes->wire('then') }} x-data x-ref="span"
    x-on:click="$wire.startConfirmingPassword('{{ $confirmableId }}')"
    x-on:password-confirmed.window="setTimeout(() => $event.detail.id === '{{ $confirmableId }}' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);">
    {{ $slot }}
</span>

@once
    <x-jet-dialog-modal wire:model="confirmingPassword">
        <x-slot name="title">
            {{ $title }}
        </x-slot>

        <x-slot name="content">
            {{ $content }}

            <div class="mt-4" x-data="{}"
                x-on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
                <x-jet-input type="password"
                    class="mt-1 block w-3/4 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white caret-red-500 focus:border-red-600 focus:ring-offset-2 focus:ring focus:ring-red-300 focus:shadow-red-500 focus:outline-none"
                    placeholder="{{ __('Contraseña') }}" x-ref="confirmable_password"
                    wire:model.defer="confirmablePassword" wire:keydown.enter="confirmPassword" />

                <x-jet-input-error for="confirmable_password" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="stopConfirmingPassword" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-3" dusk="confirm-password-button" wire:click="confirmPassword"
                wire:loading.attr="disabled">
                {{ $button }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
@endonce
