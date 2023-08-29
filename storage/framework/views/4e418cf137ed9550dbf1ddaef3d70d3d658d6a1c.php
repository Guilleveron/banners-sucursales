<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="fluid_container">
        <div class="camera_wrap" id="banner"></div>
    </div>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.mobile.customized.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.easing.1.3.js')); ?>"></script>
    <script src="<?php echo e(asset('js/camera.js')); ?>"></script>

    <script type="text/javascript">
        function getTimestampInSeconds() {
            return Math.floor((new Date()).getTime() / 1000)
        }

        var lastTimestamp = getTimestampInSeconds();

        function newSlider(items) {
            var divs = [];

            $(items).each(function(i, item) {
                if (item.url.substr(-3, 3) == 'mp4' || item.url.substr(-3, 3) == 'mpg') {
                    console.log(item)
                    divs.push(
                        '<div data-thumb="/img/logo-biggie.svg" data-src="/img/logo-biggie.svg" data-time="' +
                        item
                        .timeRefresh +
                        '"><iframe muted src="' + item.url + '?autoplay=1&mute=1' +
                        '" width="100%" height="100%" allow="autoplay" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen sandbox></iframe></div>'
                    );
                    // divs.push(
                    //     '<div autoplay=1 data-thumb="/img/logo-biggie.svg" data-src="/img/logo-biggie.svg" data-time="' +
                    //     item
                    //     .timeRefresh +
                    //     '"><video width="100%" height="100%" controls autoplay><source src="' + item.url +
                    //     '" type="video/mp4"></video></div>'
                    // );

                } else {
                    divs.push('<div data-thumb="' + item.url + '" data-src="' + item.url + '" data-time="' + item
                        .timeRefresh +
                        '"></div>');
                }


            });

            $('#banner')
                .html(divs.join(' '))
                .camera({
                    height: 'auto',
                    loader: 'none',
                    pagination: false,
                    thumbnails: false,
                    hover: false,
                    opacityOnGrid: false,
                    imagePath: '/img/',
                    navigation: false,
                    playPause: false,
                });
            if (items.length == 1 && items[0].url.substr(-3, 3) != 'mp4' && items[0].url.substr(-3, 3) != 'mpg') {
                jQuery(".camera_wrap").cameraStop();
            }
            //console.log('agregado', items);
        }
        $(function() {
            newSlider([
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    {
                        url: "<?php echo e(env('APP_URL') . Storage::url($banner->image)); ?>",
                        timeRefresh: <?php echo e($banner->timeRefresh); ?>

                    },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ]);
            setInterval(updateBanners, 600000); ///600000
        });

        function updateBanners() {
            try {
                $.get("<?php echo e(env('APP_URL')); ?>/api/showbanners<?php echo e(!empty($category) ? '/' . $category : ''); ?>", function(
                    data) {

                    if (data.timeRefresh) {
                        if (data.timeRefresh > lastTimestamp) {
                            //console.log('Actualizado');
                            location.reload();
                        }
                    }
                    if (data.banners.length) {
                        var items = data.banners;
                        var banners = [];
                        for (var i = 0; i < items.length; i++) {
                            banners.push({
                                url: '<?php echo e(env('APP_URL')); ?>/storage/' + items[i].image,
                                timeRefresh: items[i].timeRefresh
                            })
                        }
                        //console.log(data);
                        newSlider(banners);
                    }
                }, "json");
            } catch (error) {
                //// No hacer nada
            }

        }

        var button = document.getElementById("banner")

        window.addEventListener("load", function() {
            button.addEventListener("click", function() {
                launchFullScreen(document.documentElement);
            })
        })

        function launchFullScreen(element) {
            if (element.requestFullScreen) {
                element.requestFullScreen();
            } else if (element.mozRequestFullScreen) {
                element.mozRequestFullScreen();
            } else if (element.webkitRequestFullScreen) {
                element.webkitRequestFullScreen();
            }
        }
        // Lanza en pantalla completa en navegadores que lo soporten
        function cancelFullScreen() {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            }
        }
    </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?>
<?php /**PATH /Users/ayg/Documents/Personales/proyectos/banners-sucursales/resources/views/showBanners/index.blade.php ENDPATH**/ ?>