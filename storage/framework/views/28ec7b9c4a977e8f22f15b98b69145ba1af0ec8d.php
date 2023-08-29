<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    

    <div class="sm:mt-8 md:text-2xl text-xl">
        Panel de administración de Banners.
    </div>

    
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <svg style="width:24px;height:24px" class="w-8 h-8 text-gray-400" viewBox="0 0 24 24" stroke-width="2">
                <path fill="currentColor"
                    d="M17,13H13V17H11V13H7V11H11V7H13V11H17M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z" />
            </svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a
                    href="<?php echo e(route('banners.create')); ?>">Crear Banner</a></div>
        </div>

        <div class="ml-12">
            <a href="<?php echo e(route('banners.create')); ?>">
                <div class="mt-3 flex items-center text-sm font-semibold text-primary">
                    <div>Ir a crear banners</div>

                    <div class="ml-1">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                <path fill="currentColor"
                    d="M2 14H8V20H2M16 8H10V10H16M2 10H8V4H2M10 4V6H22V4M10 20H16V18H10M10 16H22V14H10" />
            </svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a
                    href="<?php echo e(route('banners.index')); ?>">Listado de Banners</a>
            </div>
        </div>

        <div class="ml-12">
            <a href="<?php echo e(route('banners.index')); ?>">
                <div class="mt-3 flex items-center text-sm font-semibold text-primary">
                    <div>Ir al Listado</div>

                    <div class="ml-1">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                <path
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a
                    href="<?php echo e(url('showbanners')); ?>">Presentar Banners</a>
            </div>
        </div>
        <div class="ml-12">
            <a href="<?php echo e(url('showbanners')); ?>">
                <div class="mt-3 flex items-center text-sm font-semibold text-primary">
                    <div>Ir a Presentación de Banners</div>

                    <div class="ml-1">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                <path fill="currentColor"
                    d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z" />
            </svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="<?php echo e(route('profile.show')); ?>">Mi
                    Perfil</a></div>
        </div>

        <div class="ml-12">
            <a href="<?php echo e(route('profile.show')); ?>">
                <div class="mt-3 flex items-center text-sm font-semibold text-primary">
                    <div>Ir a mi Perfil</div>

                    <div class="ml-1">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </a>

        </div>
    </div>
</div>

<?php /**PATH /Users/ayg/Documents/Personales/proyectos/banners-sucursales/resources/views/vendor/jetstream/components/welcome.blade.php ENDPATH**/ ?>