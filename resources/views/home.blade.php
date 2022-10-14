<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/blu/css/styleHome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/blu/fontawesome/css/all.min.css') }}">

    <title>eBLU | Home</title>
  </head>
  <body>


    @include('frontend.home.navbar')
    @include('frontend.home.carousel')
    @include('frontend.home.kategori')
    
    <!-- Awal Produk -->
    <div class="container mt-5">
        <div class="judul-NamaJasa" style="background-color: #fff; padding: 5px 10px;">
          <h5 class="text-center" style="margin-top: 5px;">NAMA JASA</h5>
        </div>
        
        <div class="row">
          @forelse ($posts as $post)
          <div class="col-lg-2 col-md-2 col-sm-4 col-6 mt-2">
              <div class="card text-center">
                  @if(file_exists(public_path($post->thumbnail)))
                      <img class="card-img-top" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                  @else
                      <img class="img-fluid rounded" src="http://placehold.it/250x100" alt="{{ $post->title }}">
                  @endif
                <div class="card-body">
                  <h6 class="card-title">{{ $post->title }}</h6>
                  {{-- <p class="card-text">Jenis jasa: {{ $post->jenisjasa->title }}.
                      Sub jasa: {{ $post->subjasa->title }}.
                      Sub-sub jasa: {{ $post->subsubjasa->title }}
                  </p> --}}
                  <p class="card-text">Satuan: {{ $post->description }}</p>
                  <a href="{{ route('home.post.detail', ['slug' => $post->slug]) }}" 
                    class="btn btn-warning d-grid text-light">Rincian</a>
                </div>
              </div>
            </div>
          @empty
              <h3 class="text-center mt-5">Tidak Ada</h3>
          @endforelse
        </div>
      </div>
      <!-- Akhir Produk -->
  
      <div class="d-flex justify-content-center">
        {{-- paginate --}}
        @if($posts->hasPages())
        <div class="row">
            <div class="col mt-5">
                {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
        @endif
      </div>
      
  
    @include('frontend.home.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>