<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de categorías
        </h2>
     <?php $__env->endSlot(); ?>

    <div>
        <div class="max-w-6xl mx-auto py-6 sm:px-10 lg:px-8">
            <div class="block mb-4 sm:mb-8 ml-3 sm:ml-0">
                <a href="<?php echo e(route('categories.create')); ?>"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 sm:py-2 sm:px-4 rounded">
                    <span class="hidden sm:inline-block">Agregar categoría</span>
                    <span class="inline-block sm:hidden text-sm">Agregar<span
                            class="mdi mdi-plus-box sm:hidden pl-1"></span></span>
                </a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-3 py-2 sm:pl-6 sm:pr-2 sm:py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <span class="hidden sm:inline-block">Categoría</span>
                                            <span class="inline-block sm:hidden">Categoría</span></span>
                                        </th>
                                        <th scope="col"
                                            class="py-2 sm:py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <span class="hidden sm:inline-block">Presentar Categorías</span>
                                            <span class="inline-block sm:hidden">Presentar</span></span>
                                        </th>
                                        <th scope="col" width="150"
                                            class="px-3 py-2 sm:px-6 sm:py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td
                                                class="pl-2 py-1 sm:pl-6 sm:pr-2 sm:py-2 sm:whitespace-nowrap text-sm text-gray-900 truncate">

                                                <span class="font-bold sm:font-normal mr-2"><?php echo e($category->name); ?></span>
                                            </td>
                                            <td
                                                class="py-1 sm:py-2 whitespace-nowrap text-sm text-gray-900 text-center">
                                                <a href="<?php echo e(url('showbanners' . '/' . $category->name)); ?>">
                                                    <span
                                                        class="hidden sm:inline-block text-cyan-600 hover:text-cyan-900 hover:underline">Presentar
                                                        <?php echo e($category->name); ?></span>
                                                    <button type="button"
                                                        class="sm:hidden m-1 rounded-full bg-cyan-600 text-white leading-normal shadow-sm hover:bg-cyan-700 hover:shadow-lg focus:bg-cyan-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-cyan-800 active:shadow-lg transition duration-150 ease-in-out w-7 h-7">
                                                        <span class="mdi mdi-view-carousel"></span>
                                                    </button></a>
                                            </td>
                                            <td class="px-4 py-1 sm:px-2 sm:py-2 text-sm font-medium">
                                                <a href="<?php echo e(route('categories.show', $category->id)); ?>"><span
                                                        class="hidden sm:inline-block text-green-600 hover:text-green-900 mr-1 ml-1">Ver</span>
                                                    <button type="button"
                                                        class="sm:hidden m-1 rounded-full bg-green-600 text-white leading-normal shadow-sm hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out w-7 h-7">
                                                        <span class="mdi mdi-clipboard-arrow-right sm:hidden"></span>
                                                    </button></a>
                                                <a href="<?php echo e(route('categories.edit', $category->id)); ?>"> <span
                                                        class="hidden sm:inline-block text-indigo-600 hover:text-indigo-900">Editar</span>
                                                    <button type="button"
                                                        class="sm:hidden m-1 rounded-full bg-indigo-600 text-white leading-normal shadow-sm hover:bg-indigo-700 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg transition duration-150 ease-in-out w-7 h-7">
                                                        <span class="mdi mdi-clipboard-edit sm:hidden"></span>
                                                    </button></a>
                                                <form action="<?php echo e(route('categories.destroy', $category->id)); ?>"
                                                    method="POST" class="deleteForm inline-block ">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit"
                                                        class="sm:text-red-600 sm:hover:text-red-900 sm:bg-transparent sm:w-0 sm:h-0 sm:mb-2 m-1 rounded-full bg-red-600 text-white leading-normal shadow-sm hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out w-7 h-7">
                                                        <span class="hidden sm:inline-block">Eliminar</span>
                                                        <span class="mdi mdi-delete sm:hidden"></span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <div>
                                    <?php echo $categories->links(); ?>

                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
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
                        title: '¿Está seguro de eliminar esta categoría?',
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
<?php /**PATH /Users/ayg/Documents/Personales/proyectos/banners-sucursales/resources/views/categories/index.blade.php ENDPATH**/ ?>