<x-guest-layout>
    <div class="fluid_container">
        <div class="camera_wrap" id="banner"></div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mobile.customized.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/camera.js') }}"></script>

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
                @foreach ($banners as $key => $banner)
                    {
                        url: "{{ env('APP_URL') . Storage::url($banner->image) }}",
                        timeRefresh: {{ $banner->timeRefresh }}
                    },
                @endforeach
            ]);
            setInterval(updateBanners, 600000); ///600000
        });

        function updateBanners() {
            try {
                $.get("{{ env('APP_URL') }}/api/showbanners{{ !empty($category) ? '/' . $category : '' }}", function(
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
                                url: '{{ env('APP_URL') }}/storage/' + items[i].image,
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

</x-guest-layout>
