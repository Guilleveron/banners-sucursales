<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Biggie Express')); ?></title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" id='camera-css' href="/css/camera.css" type='text/css'
        media='all'>
    <!-- Styles SHOWBANNERS -->
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        a {
            color: #09f;
        }

        a:hover {
            text-decoration: none;
        }

        #back_to_camera {
            background: rgba(255, 255, 255, .9);
            clear: both;
            display: block;
            height: 40px;
            line-height: 40px;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .fluid_container {
            bottom: 0;
            height: 100%;
            width: 100%;
            left: 0;
            position: fixed;
            right: 0;
            top: 0;
            z-index: 0;
        }

        #banner {
            bottom: 0;
            height: 100%;
            width: 100%;
            left: 0;
            margin-bottom: 0 !important;
            position: fixed;
            right: 0;
            top: 0;
        }

        .camera_bar {
            z-index: 2;
        }

        .camera_thumbs {
            margin-top: -100px;
            position: relative;
            z-index: 1;
        }

        .camera_thumbs_cont {
            border-radius: 0;
            -moz-border-radius: 0;
            -webkit-border-radius: 0;
        }

        .camera_overlayer {
            opacity: .1;
        }
    </style>
    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

</head>

<body>
    <div>
        <?php echo e($slot); ?>

    </div>
    
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\banners-sucursales\resources\views/layouts/guest.blade.php ENDPATH**/ ?>