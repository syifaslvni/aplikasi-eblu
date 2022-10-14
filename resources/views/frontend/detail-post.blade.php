<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/blu/css/styleProduk.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/blu/fontawesome/css/all.min.css') }}">

    <title>eBLU | Rincian Jasa</title>
  </head>
  <body>

    @include('frontend.home.navbar')

    <!-- Single Produk -->
    <div class="container mt-3">
        <div class="row row-produk">
            <div class="col-lg-5 col-md-12 mt-3">
                <figure class="figure">
                    @if(file_exists(public_path($post->thumbnail)))
                      <img class="figure-img img-fluid"
                      style="border-radius: 5px; width: 450px;" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                  @else
                      <img class="img-fluid rounded" src="http://placehold.it/250x100" alt="{{ $post->title }}">
                  @endif
                </figure>
            </div>
            <div class="col-lg-6">
                <h4>{{ $post->title }}</h4>
                  <div class="card-header" style="background-color: #ffa700">
                    @foreach ($post->categories as $category)
                    <a href="{{ route('home.posts.categories', ['slug' => $category->slug]) }}" 
                      class="badge badge-primary py-2 px-2">
                      {{ $category->title }}
                    </a>
                    @endforeach
                  </div>
                <h6 class="text-end mt-1">Satuan: {{ $post->description }}</h6>
                <hr>
                <div>
                    {!! $post->content !!}
                </div>
            </div>
            <div class="d-flex justify-content-end mb-3">
                <a href="https://mgi.esdm.go.id/kontak-kami/" 
                    class="btn btn-info col-md-4 text-light mx-3">Hubungi Kami</a>
                <a href="{{ route('home.index') }}" 
                    class="btn btn-warning col-md-2 text-light mx-3">kembali</a>
            </div>
            
        </div>
    </div>
    <!-- Akhir Single Produk -->

    @include('frontend.home.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>