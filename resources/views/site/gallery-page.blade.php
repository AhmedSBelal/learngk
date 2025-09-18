@extends('layouts.site1')
@section('title', trans('website.gallery.title'))
@section('og_title', trans('website.gallery.og_title'))
@section('seo_description', settingText('gallery_seo_description', 'short_description'))
@section('og_description', settingText('gallery_seo_description', 'short_description'))
@section('seo_keywords', settingText('gallery_seo_keywords', 'short_description'))
@section('content')

    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.gallery.header_title') }}</h1>
    </header>

    @if ($type == 'image')
        <!-- Modal لعرض الصور -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-transparent border-0">
                    <div class="modal-body p-0 text-center">
                        <img id="modalImage" src="" class="img-fluid rounded-3" alt="{{ trans('website.gallery.image_alt') }}">
                    </div>
                </div>
            </div>
        </div>

        <section>
            <div class="container-fluid px-md-5">
                <div class="d-flex py-5 gap-3">
                    <a href="{{ route('gallery', 'image') }}"
                        class="gallery-filter rounded-3 d-flex gap-2 justify-content-center align-items-center px-2 {{ $type == 'image' ? 'active' : '' }} text-decoration-none">
                        <i class="fa-solid fa-image gallery-filter-icon"></i>
                        <p class="m-0 gallery-filter-text">{{ trans('website.gallery.images_filter') }}</p>
                    </a>
                    <a href="{{ route('gallery', 'video') }}"
                        class="gallery-filter rounded-3 d-flex gap-2 justify-content-center align-items-center px-2 {{ $type == 'video' ? 'active' : '' }} text-decoration-none">
                        <i class="fa-solid fa-clapperboard gallery-filter-icon"></i>
                        <p class="m-0 gallery-filter-text">{{ trans('website.gallery.videos_filter') }}</p>
                    </a>
                </div>

                <div class="images-container">
                    <!-- الصور الجديدة -->
                    <h3 class="mb-3 pop-up-filter-main-title">{{ trans('website.gallery.recent_images') }}</h3>

                    <div class="row">
                        @php
                            $heights = [
                                ['h-275px', 'h-275px', 'h-190px'], // Column 1
                                ['h-385px', 'h-405px'], // Column 2
                                ['h-175px', 'h-392px', 'h-185px'] // Column 3
                            ];
                            $itemIndex = 0;
                            $imageUrls = $anotherImages->map(function ($item) {
                                return $item->getFirstMediaUrl('gallery') ?: ($item->image->url ?? 'img/default.png');
                            })->toArray();
                        @endphp

                        @for($col = 0; $col < 3; $col++)
                            <div class="col-md-4">
                                @foreach($heights[$col] as $height)
                                    @if(isset($new_galleries[$itemIndex]))
                                        @php 
                                            $item = $new_galleries[$itemIndex]; 
                                            // Shuffle imageUrls for this specific image
                                            $shuffledImageUrls = $imageUrls;
                                            shuffle($shuffledImageUrls);
                                        @endphp
                                        <img src="{{ $item->getFirstMediaUrl('gallery') ?: ($item->image->url ?? 'img/default.png') }}"
                                            class="w-100 img-fluid {{ $height }} rounded-4 slider-img mb-2" data-bs-toggle="modal"
                                            data-bs-target="#imageModal"
                                            data-images="{{ json_encode($shuffledImageUrls) }}"
                                            alt="{{ $item->name ?? trans('website.gallery.image_alt') . ' ' . ($itemIndex + 1) }}">
                                        @php $itemIndex++; @endphp
                                    @endif
                                @endforeach
                            </div>
                        @endfor
                    </div>

                    <!-- Custom Pagination للصور الجديدة -->
                    @if($new_galleries->hasPages())
                        <div class="d-flex gap-3 justify-content-center align-items-center mb-4">
                            @if($new_galleries->onFirstPage())
                                <i
                                    class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-right' : 'fa-circle-chevron-left' }} text-muted fa-2x"></i>
                            @else
                                <a href="{{ $new_galleries->appends(request()->except('new_page'))->previousPageUrl() }}"
                                    class="text-decoration-none">
                                    <i
                                        class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-right' : 'fa-circle-chevron-left' }} primary-color fa-2x"></i>
                                </a>
                            @endif

                            <p class="m-0 pop-up-filter-text text-black">
                                {{ trans('website.gallery.page') }}
                                {{ $new_galleries->currentPage() }}/{{ $new_galleries->lastPage() }}
                            </p>

                            @if($new_galleries->hasMorePages())
                                <a href="{{ $new_galleries->appends(request()->except('new_page'))->nextPageUrl() }}"
                                    class="text-decoration-none">
                                    <i
                                        class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-left' : 'fa-circle-chevron-right' }} primary-color fa-2x"></i>
                                </a>
                            @else
                                <i
                                    class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-left' : 'fa-circle-chevron-right' }} text-muted fa-2x"></i>
                            @endif
                        </div>
                    @endif

                    <!-- جميع الصور -->
                    <h3 class="mb-3 pop-up-filter-main-title">{{ trans('website.gallery.all_images') }}</h3>

                    <div class="row">
                        @forelse($galleries as $item)
                            <div class="col-lg-3 col-md-6 mb-3">
                                <img src="{{ $item->getFirstMediaUrl('gallery') ?: ($item->image->url ?? 'img/default.png') }}"
                                    class="w-100 img-fluid h-185px rounded-3" data-bs-toggle="modal" data-bs-target="#imageModal"
                                    alt="{{ $item->name ?? trans('website.gallery.image_alt') }}"
                                    style="object-fit: cover; cursor: pointer;">
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <p>{{ trans('website.gallery.no_images_available') }}</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Custom Pagination لجميع الصور -->
                    @if($galleries->hasPages())
                        <div class="d-flex gap-3 justify-content-center align-items-center mb-4">
                            @if($galleries->onFirstPage())
                                <i
                                    class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-right' : 'fa-circle-chevron-left' }} text-muted fa-2x"></i>
                            @else
                                <a href="{{ $galleries->appends(request()->except('all_page'))->previousPageUrl() }}"
                                    class="text-decoration-none">
                                    <i
                                        class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-right' : 'fa-circle-chevron-left' }} primary-color fa-2x"></i>
                                </a>
                            @endif

                            <p class="m-0 pop-up-filter-text text-black">
                                {{ trans('website.gallery.page') }} {{ $galleries->currentPage() }}/{{ $galleries->lastPage() }}
                            </p>

                            @if($galleries->hasMorePages())
                                <a href="{{ $galleries->appends(request()->except('all_page'))->nextPageUrl() }}"
                                    class="text-decoration-none">
                                    <i
                                        class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-left' : 'fa-circle-chevron-right' }} primary-color fa-2x"></i>
                                </a>
                            @else
                                <i
                                    class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-left' : 'fa-circle-chevron-right' }} text-muted fa-2x"></i>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </section>

    @else
        <!-- Video Modal -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-dark">
                    <div class="modal-body p-0">
                        <!-- Iframe for embeds (YouTube, Vimeo, Drive, etc.) -->
                        <div id="embedContainer" class="ratio ratio-16x9 d-none">
                            <iframe id="youtubePlayer" class="w-100" style="border: 0;" allowfullscreen
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen"></iframe>
                        </div>
                        <!-- Video for direct files -->
                        <div id="videoContainer" class="d-none">
                            <video id="videoPlayer" class="w-100" controls preload="metadata">
                                <source src="" type="video/mp4" />
                                <source src="" type="video/webm" />
                                {{ trans('website.gallery.video_not_supported') }}
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section>
            <div class="container-fluid px-md-5">
                <div class="d-flex py-5 gap-3">
                    <a href="{{ route('gallery', 'image') }}"
                        class="gallery-filter rounded-3 d-flex gap-2 justify-content-center align-items-center px-2 {{ $type == 'image' ? 'active' : '' }} text-decoration-none">
                        <i class="fa-solid fa-image gallery-filter-icon"></i>
                        <p class="m-0 gallery-filter-text">{{ trans('website.gallery.images_filter') }}</p>
                    </a>
                    <a href="{{ route('gallery', 'video') }}"
                        class="gallery-filter rounded-3 d-flex gap-2 justify-content-center align-items-center px-2 {{ $type == 'video' ? 'active' : '' }} text-decoration-none">
                        <i class="fa-solid fa-clapperboard gallery-filter-icon"></i>
                        <p class="m-0 gallery-filter-text">{{ trans('website.gallery.videos_filter') }}</p>
                    </a>
                </div>

                <div class="video-container">
                    <!-- الفيديوهات الحديثة -->
                    <h3 class="mb-3 pop-up-filter-main-title">{{ trans('website.gallery.recent_videos') }}</h3>

                    <div class="row main-vedio-row mb-4">
                        @foreach($new_galleries->take(4) as $index => $item)
                            <div class="col-md-{{ $loop->first ? '6' : '2' }} sub-ved-container mb-3">
                                <div class="video-thumb w-100 position-relative">
                                    <img src="{{ $item->getFirstMediaUrl('gallery') ?: ($item->image->url ?? 'img/default.png') }}"
                                        class="img-fluid w-100 rounded-3 main-ved"
                                        alt="{{ $item->name ?? trans('website.gallery.video_alt') }}" data-bs-toggle="modal"
                                        data-bs-target="#videoModal" data-video="{{ $item->video ?? '' }}" />

                                    <i class="fa-solid fa-play-circle video-icon {{ $loop->first ? '' : 'd-none' }}"></i>

                                    <div class="img-desc {{ $loop->first ? '' : 'd-none' }}">
                                        <h2>{{ $item->name ?? trans('website.gallery.video_default_name') }}</h2>
                                        <p>{{ $item->created_at ? $item->created_at->format('d M, Y') : trans('website.gallery.default_date') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if($new_galleries->count() < 4)
                            {{-- Comment unchanged --}}
                        @endif
                    </div>

                    <!-- Custom Pagination للفيديوهات الجديدة -->
                    @if($new_galleries->hasPages())
                        <div class="d-flex gap-3 justify-content-center align-items-center mb-4">
                            @if($new_galleries->onFirstPage())
                                <i
                                    class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-right' : 'fa-circle-chevron-left' }} text-muted fa-2x"></i>
                            @else
                                <a href="{{ $new_galleries->appends(request()->except('new_page'))->previousPageUrl() }}"
                                    class="text-decoration-none">
                                    <i
                                        class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-right' : 'fa-circle-chevron-left' }} primary-color fa-2x"></i>
                                </a>
                            @endif

                            <p class="m-0 pop-up-filter-text text-black">
                                {{ trans('website.gallery.page') }}
                                {{ $new_galleries->currentPage() }}/{{ $new_galleries->lastPage() }}
                            </p>

                            @if($new_galleries->hasMorePages())
                                <a href="{{ $new_galleries->appends(request()->except('new_page'))->nextPageUrl() }}"
                                    class="text-decoration-none">
                                    <i
                                        class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-left' : 'fa-circle-chevron-right' }} primary-color fa-2x"></i>
                                </a>
                            @else
                                <i
                                    class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-left' : 'fa-circle-chevron-right' }} text-muted fa-2x"></i>
                            @endif
                        </div>
                    @endif

                    <!-- جميع الفيديوهات -->
                    <h3 class="mb-3 pop-up-filter-main-title">{{ trans('website.gallery.all_videos') }}</h3>

                    <div class="row">
                        @forelse($galleries as $item)
                            <div class="col-lg-3 col-md-6 mb-3">
                                <div class="video-thumb w-100 position-relative">
                                    <img src="{{ $item->getFirstMediaUrl('gallery') ?: ($item->image->url ?? 'img/default.png') }}"
                                        class="img-fluid w-100 rounded-4 h-185px mb-2"
                                        alt="{{ $item->name ?? trans('website.gallery.video_alt') }}" data-bs-toggle="modal"
                                        data-bs-target="#videoModal" data-video="{{ $item->video ?? '' }}"
                                        style="object-fit: cover; cursor: pointer;" />
                                    <i class="fa-solid fa-play-circle video-icon"></i>
                                </div>
                                <div class="">
                                    <h2 class="pop-up-filter-main-title mb-1">
                                        {{ $item->name ?? trans('website.gallery.video_default_name') }}</h2>
                                    <p class="why-sub-title">
                                        {{ $item->created_at ? $item->created_at->format('d M, Y') : trans('website.gallery.default_date') }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <p>{{ trans('website.gallery.no_videos_available') }}</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Custom Pagination لجميع الفيديوهات -->
                    @if($galleries->hasPages())
                        <div class="d-flex gap-3 justify-content-center align-items-center mb-4">
                            @if($galleries->onFirstPage())
                                <i
                                    class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-right' : 'fa-circle-chevron-left' }} text-muted fa-2x"></i>
                            @else
                                <a href="{{ $galleries->appends(request()->except('all_page'))->previousPageUrl() }}"
                                    class="text-decoration-none">
                                    <i
                                        class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-right' : 'fa-circle-chevron-left' }} primary-color fa-2x"></i>
                                </a>
                            @endif

                            <p class="m-0 pop-up-filter-text text-black">
                                {{ trans('website.gallery.page') }} {{ $galleries->currentPage() }}/{{ $galleries->lastPage() }}
                            </p>

                            @if($galleries->hasMorePages())
                                <a href="{{ $galleries->appends(request()->except('all_page'))->nextPageUrl() }}"
                                    class="text-decoration-none">
                                    <i
                                        class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-left' : 'fa-circle-chevron-right' }} primary-color fa-2x"></i>
                                </a>
                            @else
                                <i
                                    class="fa-solid {{ app()->getLocale() === 'ar' ? 'fa-circle-chevron-left' : 'fa-circle-chevron-right' }} text-muted fa-2x"></i>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    @php
     /* $sliderImages =  */
    //  foreach($anotherImages as $image) {
    //     dd($image->image->url);
    //  } 
@endphp

@endsection

@push('css')
    <style>
        /* RTL Support for Arabic */
        @if(app()->getLocale() === 'ar')
            .gallery-pagination {
                direction: rtl;
            }

            .gallery-pagination i {
                transform: rotate(180deg);
                /* Flip arrows for RTL if needed */
            }

        @endif

        /* Ensure proper text alignment for RTL */
        @if(app()->getLocale() === 'ar')
            .pop-up-filter-text {
                direction: rtl;
                text-align: right;
            }

        @endif

        /* Gallery container RTL adjustments */
        @if(app()->getLocale() === 'ar')
            .gallery-filter {
                flex-direction: row-reverse;
            }

            .images-container,
            .video-container {
                direction: rtl;
            }

        @endif
    </style>
@endpush

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Image modal functionality (unchanged)
            const imageModal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');

            if (imageModal) {
                document.querySelectorAll('.slider-img, .col-lg-3 img, .col-md-6 img').forEach(img => {
                    img.addEventListener('click', function () {
                        modalImage.src = this.src;
                        modalImage.alt = this.alt;
                    });
                });
            }

            // Video modal functionality (enhanced for multiple platforms)
            const videoModal = document.getElementById('videoModal');
            const embedContainer = document.getElementById('embedContainer');
            const videoContainer = document.getElementById('videoContainer');
            const youtubePlayer = document.getElementById('youtubePlayer');
            const videoPlayer = document.getElementById('videoPlayer');
            let storedEmbedUrl = '';
            let storedVideoSrc = '';
            let isEmbed = false;

            if (videoModal) {
                document.querySelectorAll('.video-thumb img').forEach(thumbImg => {
                    thumbImg.addEventListener('click', function (e) {
                        const videoUrl = this.getAttribute('data-video');
                        console.log('Video URL:', videoUrl);

                        if (!videoUrl) {
                            console.error('No video URL found');
                            e.preventDefault();
                            return;
                        }

                        storedEmbedUrl = '';
                        storedVideoSrc = '';
                        isEmbed = false;

                        if (videoUrl.match(/\.(mp4|webm|ogg|mov|avi)$/i)) {
                            isEmbed = false;
                            storedVideoSrc = videoUrl;
                            console.log('Detected direct video file');
                        } else if (videoUrl.includes('youtube.com') || videoUrl.includes('youtu.be')) {
                            isEmbed = true;
                            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
                            const match = videoUrl.match(regExp);
                            if (match && match[2].length === 11) {
                                const videoId = match[2];
                                storedEmbedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1`;
                                console.log('YouTube embed URL:', storedEmbedUrl);
                            } else {
                                console.error('Invalid YouTube URL');
                                e.preventDefault();
                                return;
                            }
                        } else if (videoUrl.includes('vimeo.com')) {
                            isEmbed = true;
                            let videoId = '';
                            if (videoUrl.includes('player.vimeo.com/video/')) {
                                videoId = videoUrl.split('player.vimeo.com/video/')[1].split('?')[0];
                            } else {
                                videoId = videoUrl.split('/').pop().split('?')[0];
                            }
                            storedEmbedUrl = `https://player.vimeo.com/video/${videoId}?autoplay=1&rel=0`;
                            console.log('Vimeo embed URL:', storedEmbedUrl);
                        } else if (videoUrl.includes('drive.google.com/file/d/')) {
                            isEmbed = true;
                            let previewUrl = videoUrl.replace('/view', '/preview');
                            if (!previewUrl.includes('/preview')) {
                                previewUrl += '/preview';
                            }
                            storedEmbedUrl = previewUrl;
                            console.log('Google Drive embed URL:', storedEmbedUrl);
                        } else if (videoUrl.match(/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/) && !videoUrl.match(/\.(mp4|webm|ogg|mov|avi)$/i)) {
                            isEmbed = true;
                            storedEmbedUrl = videoUrl;
                            console.log('Using provided URL as embed (e.g., Facebook/Instagram/Dailymotion)');
                        } else {
                            console.error('Unsupported video URL. Opening in new tab as fallback.');
                            window.open(videoUrl, '_blank');
                            e.preventDefault();
                            return;
                        }
                    });
                });

                videoModal.addEventListener('shown.bs.modal', function () {
                    if (isEmbed && storedEmbedUrl) {
                        embedContainer.classList.remove('d-none');
                        videoContainer.classList.add('d-none');
                        youtubePlayer.src = storedEmbedUrl;
                    } else if (!isEmbed && storedVideoSrc) {
                        embedContainer.classList.add('d-none');
                        videoContainer.classList.remove('d-none');
                        const sources = videoPlayer.querySelectorAll('source');
                        sources[0].src = storedVideoSrc;
                        sources[0].type = 'video/mp4';
                        sources[1].src = storedVideoSrc;
                        sources[1].type = 'video/webm';
                        videoPlayer.load();
                        videoPlayer.play().catch(e => console.log('Autoplay prevented:', e));
                    } else {
                        console.warn('No valid URL set');
                    }
                });

                videoModal.addEventListener('hidden.bs.modal', function () {
                    youtubePlayer.src = '';
                    videoPlayer.pause();
                    videoPlayer.currentTime = 0;
                    const sources = videoPlayer.querySelectorAll('source');
                    sources.forEach(s => s.src = '');
                    videoPlayer.load();
                    embedContainer.classList.add('d-none');
                    videoContainer.classList.add('d-none');
                    storedEmbedUrl = '';
                    storedVideoSrc = '';
                    isEmbed = false;
                });
            }
        });
    </script>
    
    <script>
       /* images slider  */
      
        document.addEventListener("DOMContentLoaded", function () {
            const sliders = document.querySelectorAll(".slider-img");

            sliders.forEach(slider => {
                const images = JSON.parse(slider.getAttribute("data-images")); // الصور الخاصة بكل slider
                let index = 0;

                setInterval(() => {
                    slider.classList.add("fade-out");
                    setTimeout(() => {
                        index = (index + 1) % images.length;
                        slider.src = images[index];
                        slider.classList.remove("fade-out");
                    }, 300);
                }, 3000);
            });
        });
    </script>
@endpush