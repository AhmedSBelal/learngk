<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('Learn-German-Kuwait/css/style.css') }}" />
    <!--woow AnimateFiles Css-->
    <link rel="stylesheet" href=" {{ asset('Learn-German-Kuwait/css/all.min.css') }} " />
    <!--bootstrap-file-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous" />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap"
      rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>LGK - Error</title>
  </head>
  <body>

        <section>
            <div class="container">
                <div class="row my-5">
                    <div class="col-12 text-center">
                        <img src="{{ asset('Learn-German-Kuwait/img/error.png') }}" class="mb-5 img-fluid" alt="error">
                        <h3 class="error-title">Oops! The Page Not Found</h3>
                        <p class="pop-up-filter-text text-black my-5">Proin non eros elementum, sagittis diam at, feugiat nunc. Ut velit arcu, posuere at neque quis, vestibulum vehicula dui. Praesent at felis ante. Cras sed ultricies risus. Nullam porta fermentum egestas. </p>
                        <a href="{{ route('home') }}" class="primary-btn w-100 text-center py-2 px-4 rounded-pill text-decoration-none"><i class="fa-solid fa-circle-arrow-right"></i> Go To Home </a>
                    </div>
                </div>
            </div>
        </section>


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src=" {{ asset('Learn-German-Kuwait/js/all.min.js') }}"></script>
    <script src=" {{ asset('Learn-German-Kuwait/js/main.js') }}"></script>
  </body>
</html>
