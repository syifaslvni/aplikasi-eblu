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

    <title>eBLU | Kategori Jasa</title>
  </head>
  <body>

    @include('frontend.home.navbar')

    <div class="row mx-3">
        <!-- List category -->
        @forelse ($categories as $category)
        <!-- true -->
        <div class="col-sm-6 mt-4">
           <div class="card h-100">        
              <div class="card-body">
                 <h4 class="card-title text-center">
                    <a href="{{ route('home.posts.categories', ['slug' => $category->slug]) }}"
                     class="btn btn-light d-grid text-dark fw-bold">
                     {{ $category->title }}
                    </a>
                 </h4>
              </div>
           </div>
        </div>
        @empty
        <!-- false -->
        <h3 class="text-center">
            Data tidak Ada
         </h3>
            
        @endforelse
     <!-- List category -->
   </div> 
       
     <!-- pagination:start -->
     @if($categories->hasPages())
     <div class="row">
        <div class="col">
            {{ $categories->links('vendor.pagination.bootstrap-4') }}
        </div>
     </div>
     @endif
     <!-- pagination:end -->

    @include('frontend.home.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>