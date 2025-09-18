<footer class="pt-5 pb-3 rounded-top-5" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <div class="container-fluid px-md-5">
        <div class="row border-bottom border-2 pb-4">
            <div class="col-md-4 mb-3">
                <div class="d-flex flex-column align-items-center">
                    <img src="{{ settingImage('logo') }}" class="footer-logo mb-4"
                        alt="{{ trans('website.footer.logo_alt') }}">
                    <h3 class="footer-main-title">{!! settingText('footer-desc', 'long_description') !!}</h3>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2 col-6 mb-3">
                <div class="d-flex flex-column gap-2">
                    <h6 class="m-0">{{ trans('website.footer.information') }}</h6>
                    <p class="m-0"><a href="{{ route('about') }}"
                            class="text-decoration-none">{{ trans('website.footer.why_lgk') }}</a></p>
                    <p class="m-0"><a href="{{ route('articles') }}"
                            class="text-decoration-none">{{ trans('website.footer.articles') }}</a></p>
                    <p class="m-0"><a href="{{ route('faq') }}"
                            class="text-decoration-none">{{ trans('website.footer.faq') }}</a></p>
                    <p class="m-0"><a href="{{ route('jobs') }}"
                            class="text-decoration-none">{{ trans('website.footer.jobs') }}</a></p>
                </div>
            </div>
            <div class="col-md-2 col-6 mb-3">
                <div class="d-flex flex-column gap-2">
                    <h6 class="m-0">{{ trans('website.footer.legal_terms') }}</h6>
                    <p class="m-0"><a href="{{ route('privacy') }}"
                            class="text-decoration-none">{{ trans('website.footer.privacy_policy') }}</a></p>
                    <p class="m-0"><a href="{{ route('terms') }}"
                            class="text-decoration-none">{{ trans('website.footer.terms_of_service') }}</a></p>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="d-flex flex-column gap-2">
                    <h6 class="m-0">{{ trans('website.footer.contact_info') }}</h6>
                    <p class="m-0 d-flex gap-1 align-items-center">
                        <i class="fa-solid fa-phone footer-icon"></i>
                        <a href="tel:{{ settingText('phone-one', 'text') }}"
                            class="text-decoration-none">{{ settingText('phone-one', 'text') }}</a>
                    </p>
                    <p class="m-0 d-flex gap-1 align-items-center">
                        <i class="fa-solid fa-envelope footer-icon"></i>
                        <a href="mailto:{{ settingText('email', 'text') }}"
                            class="text-decoration-none">{{ settingText('email', 'text') }}</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <p class="m-0"><a href="#"
                    class="text-decoration-none copyright">{{ trans('website.footer.copyright', ['year' => now()->year]) }}</a>
            </p>
            <div class="d-flex align-items-center gap-md-4 gap-3 ms-5 ps-4 ps-md-0">
                <a href="{{ settingText('instagram', 'text') }}" target="_blank"><i
                        class="fa-brands share-icon text-white hovers fa-instagram"></i></a>
                <a href="{{ settingText('whatsapp', 'text') }}" target="_blank"><i
                        class="fa-brands share-icon text-white hovers fa-whatsapp"></i></a>
                <a href="{{ settingText('twitter', 'text') }}" target="_blank"><i
                        class="fa-brands share-icon text-white hovers fa-twitter"></i></a>
                <a href="{{ settingText('linkedin', 'text') }}" target="_blank"><i
                        class="fa-brands share-icon text-white hovers fa-linkedin-in"></i></a>
                <a href="{{ settingText('facebook', 'text') }}" target="_blank"><i
                        class="fa-brands share-icon text-white hovers fa-facebook-f"></i></a>
            </div>
        </div>
    </div>
</footer>