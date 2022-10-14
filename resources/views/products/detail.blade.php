@extends('layouts.main')

@section('title', 'Detail Jasa')

@section('header-title', 'Detail Jasa')

@section('breadcrumbs')
{{ Breadcrumbs::render('detail_products', $product) }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
            @if (file_exists(public_path($product->thumbnail)))
            <!-- thumbnail:true -->
            <div class="product-tumbnail" style="background-image: url('{{ asset($product->thumbnail) }}');">
            </div>
            @else
            <!-- thumbnail:false -->
            <svg class="img-fluid" width="100%" height="400" xmlns="http://www.w3.org/2000/svg"
               preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
               <rect width="100%" height="100%" fill="#868e96"></rect>
               <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#dee2e6" dy=".3em"
                  font-size="24">
                   {{ $product->title }}
                  </text>
            </svg>
            @endif
             <!-- title -->
             <h2 class="my-1">
                {{ $product->title }}
             </h2>
             <!-- description -->
             <p class="text-justify">
                {{ $product->description }}
             </p>
             <!-- categories jenis jasa -->
              <span class="badge badge-primary">{{ ($product->jenisjasa->title) }}</span>
              <!-- categories sub jasa -->
               <span class="badge badge-warning">{{ ($product->subjasa->title) }}</span>
               <!-- categories subsub jasa -->
                <span class="badge badge-info">{{ ($product->subsubjasa->title) }}</span>
             <!-- content -->
             <div class="py-1">
                {!! $product->content !!}
             </div>
             <div class="d-flex justify-content-end">
                <a href="{{ route('products.index') }}" class="btn btn-primary mx-1" role="button">
                   Kembali
                </a>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection

@push('css-internal')
<style>
    .product-tumbnail {
     width: 100%;
     height: 400px;
     background-repeat: no-repeat;
     background-position: center;
     background-size: cover;
  }
  </style>
@endpush