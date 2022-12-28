<x-guest-layout>
    <div id="carouselExampleSlidesOnly" class="carousel carousel-fade slide relative" data-bs-ride="carousel"
        data-bs-interval="10000" data-bs-pause="false">
        <div id="carouselInner" class="carousel-inner relative w-screen h-screen overflow-hidden">
            @foreach ($banners as $key => $banner)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }} float-left w-screen h-screen itemsOld">
                    {{-- <div class="backImage"
                        style="background-image: url({{ env('APP_URL') . Storage::url($banner->image) }});">
                    </div> --}}
                    <div class="Image"
                        style="background-image: url({{ env('APP_URL') . Storage::url($banner->image) }});">
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <button
            class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
            type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
            <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
            type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
            <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> --}}
    </div>

    {{-- <button onclick="launchFullScreen(document.documentElement);" type="button"
        class="m-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
        Pantalla completa </button>
    <button onclick="cancelFullScreen();"
        class="m-2 inline-flex items-center px-4 py-2 bg-indigo-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
        Salir de pantalla completa </button> --}}

</x-guest-layout>
<script>
    let button = document.getElementById("carouselInner")

    window.addEventListener("load", function() {
        button.addEventListener("click", function() {
            launchFullScreen(document.documentElement);
        })
    })

    setInterval(updateBanners, 600000); ///600000

    function updateBanners() {
        axios.get(`{{ env('APP_URL') }}/api/showbanners{{ !empty($category) ? '/' . $category : '' }}`, {
                responseType: 'json'
            })
            .then(function(response) {

                var banners = response.data;
                var carouselInner = document.getElementById("carouselInner");
                while (carouselInner.firstChild) {
                    carouselInner.removeChild(carouselInner.firstChild);
                }
                for (var i = 0; i < banners.length; i++) {
                    let active = '';
                    if (i == 0) {
                        active = 'active'
                    }
                    let html = `<div class="carousel-item ${active} float-left w-screen h-screen">
                    <div class="backImage"
                        style="background-image: url({{ env('APP_URL') }}/storage/${banners[i].image});">
                    </div>
                    <div class="Image"
                        style="background-image: url({{ env('APP_URL') }}/storage/${banners[i].image});">
                    </div>
                </div>`;
                    carouselInner.innerHTML += html;
                };

            })
            .catch(function(error) {
                // handle error
                //console.log(error);
            });
    }

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
<style scoped>
    .backImage {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 50% 50%;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        filter: blur(35px);
        -webkit-filter: blur(35px);
        -moz-filter: blur(35px);
    }

    .Image {
        position: relative;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-repeat: no-repeat;
        background-size: contain;
        background-position: 50% 50%;

    }
</style>
