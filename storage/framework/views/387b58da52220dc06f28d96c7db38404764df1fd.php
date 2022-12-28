<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de banners
        </h2>
     <?php $__env->endSlot(); ?>

    <div>
        <div class="max-w-6xl mx-auto py-6 sm:px-10 lg:px-8">
            <div class="block mb-4 sm:mb-8 ml-3 sm:ml-0">
                <a href="<?php echo e(route('banners.create')); ?>"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 sm:py-2 sm:px-4 rounded">
                    <span class="hidden sm:inline-block">Agregar banner</span>
                    <span class="inline-block sm:hidden text-sm">Agregar<span
                            class="mdi mdi-file-image-plus sm:hidden pl-1"></span></span>
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
                                            <span class="hidden sm:inline-block">Título</span>
                                            <span class="inline-block sm:hidden">Datos del Banner</span></span>
                                        </th>
                                        <th scope="col"
                                            class="hidden sm:table-cell py-2 sm:py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Categoria
                                        </th>
                                        <th scope="col"
                                            class="hidden sm:table-cell py-2 sm:py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Orden
                                        </th>
                                        <th scope="col"
                                            class="hidden sm:table-cell py-2 sm:py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Estado
                                        </th>
                                        <th scope="col"
                                            class="hidden sm:table-cell py-2 sm:py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tiempo
                                        </th>
                                        <th scope="col"
                                            class="py-2 sm:py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Imagen
                                        </th>
                                        <th scope="col" width="150"
                                            class="px-3 py-2 sm:px-6 sm:py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            

                                            <td
                                                class="px-2 py-1 sm:pl-6 sm:pr-2 sm:py-2 sm:whitespace-nowrap text-sm text-gray-900">
                                                <span class="font-bold sm:font-normal"><?php echo e($banner->title); ?></span>
                                                <div class="block sm:hidden">
                                                    <span
                                                        class="inline-flex text-gray-500 font-semibold mr-2">Categoria:
                                                        <?php echo e($banner->category->name); ?></span>
                                                    <span class="inline-flex text-gray-500 font-semibold mr-2">Orden:
                                                        <?php echo e($banner->order); ?></span>
                                                    <span class="inline-flex text-gray-500 font-semibold mr-2">Tiempo:
                                                        <?php echo e($banner->timeRefresh); ?> seg.</span>
                                                    <div class="inline-flex">
                                                        <?php if($banner->status === 0): ?>
                                                            <span
                                                                class="px-2 block text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                Inactivo
                                                            </span>
                                                        <?php else: ?>
                                                            <span
                                                                class="px-2 block text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                Activo
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>

                                            <td
                                                class="hidden sm:table-cell py-1 sm:py-2 whitespace-nowrap text-sm text-gray-900 text-center">
                                                <a href="<?php echo e(url('categories' . '/' . $banner->category->id)); ?>">
                                                    <span
                                                        class="hidden sm:inline-block text-cyan-600 hover:text-cyan-900 hover:underline">
                                                        <?php echo e($banner->category->name); ?></span>
                                            </td>

                                            <td
                                                class="hidden sm:table-cell py-1 sm:py-2 whitespace-nowrap text-sm text-gray-900 text-center">
                                                <?php echo e($banner->order); ?>

                                            </td>

                                            <td
                                                class="hidden sm:table-cell align-middle text-center px-1 py-1 sm:px-2 sm:py-2 whitespace-nowrap text-sm text-gray-900">
                                                <?php if($banner->status === 0): ?>
                                                    <span
                                                        class="px-2 inline-block text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        Inactivo
                                                    </span>
                                                <?php else: ?>
                                                    <span
                                                        class="px-2 inline-block text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Activo
                                                    </span>
                                                <?php endif; ?>

                                            </td>
                                            <td
                                                class="hidden sm:table-cell py-1 sm:py-2 whitespace-nowrap text-sm text-gray-900 text-center">
                                                <?php echo e($banner->timeRefresh); ?> seg.
                                            </td>

                                            <td class="px-1 py-1 sm:py-2">
                                                <img src="<?php echo e(env('APP_URL') . Storage::url($banner->image)); ?>"
                                                    width="180px" class="ml-auto mr-auto">
                                            </td>

                                            <td class="px-4 py-1 sm:px-2 sm:py-2 table-cell text-sm font-medium">
                                                <a href="<?php echo e(route('banners.show', $banner->id)); ?>"><span
                                                        class="hidden sm:inline-block text-green-600 hover:text-green-900 mr-1 ml-1">Ver</span>
                                                    <button type="button"
                                                        class="sm:hidden m-1 rounded-full bg-green-600 text-white leading-normal shadow-sm hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out w-7 h-7">
                                                        <span class="mdi mdi-image sm:hidden"></span>
                                                    </button></a>
                                                <a href="<?php echo e(route('banners.edit', $banner->id)); ?>"> <span
                                                        class="hidden sm:inline-block text-indigo-600 hover:text-indigo-900">Editar</span>
                                                    <button type="button"
                                                        class="sm:hidden m-1 rounded-full bg-indigo-600 text-white leading-normal shadow-sm hover:bg-indigo-700 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg transition duration-150 ease-in-out w-7 h-7">
                                                        <span class="mdi mdi-image-edit sm:hidden"></span>
                                                    </button></a>
                                                <form action="<?php echo e(route('banners.destroy', $banner->id)); ?>"
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
                                    <?php echo $banners->links(); ?>

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
                        title: '¿Está seguro de eliminar el banner?',
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
<?php /**PATH C:\xampp\htdocs\banners-sucursales\resources\views/banners/index.blade.php ENDPATH**/ ?>