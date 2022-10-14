@extends('layouts.main')

@section('title', 'Tambah Jenis Jasa')

@section('header-title', 'Tambah Jenis Jasa')

@section('breadcrumbs')
{{ Breadcrumbs::render('add_kategories') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
             <form action="{{ route('jenisjasa.store') }}" method="POST">
                @csrf
                <!-- title -->
                <div class="form-group">
                   <label for="input_category_title" class="font-weight-bold">
                      Jenis Jasa
                   </label>
                   <input id="input_category_title" value="{{ old('title') }}" name="title" type="text" 
                   class="form-control @error('title') is-invalid @enderror"
                   placeholder="Masukkan jenis jasa" />
                   @error('title')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
                <!-- slug -->
                <div class="form-group">
                   <label for="input_category_slug" class="font-weight-bold">
                      Slug
                   </label>
                   <input id="input_category_slug" value="{{ old('slug') }}" name="slug" type="text" 
                   class="form-control @error('slug') is-invalid @enderror" readonly 
                   placeholder="Automatis dibuatkan" />
                   @error('slug')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
                <div class="float-right">
                	<a class="btn btn-warning px-4" href="{{ route('jenisjasa.index') }}">Kembali</a>
                	<button type="submit" class="btn btn-primary px-4">Simpan</button>
                </div>                
             </form>
          </div>
       </div>
    </div>
 </div>
@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function() {
         //event : input slug
         $("#input_category_title").change(function (event) {
            $("#input_category_slug").val(
               event.target.value
                  .trim()
                  .toLowerCase()
                  .replace(/[^a-z\d-]/gi, "-")
                  .replace(/-+/g, "-")
                  .replace(/^-|-$/g, "")
            );
         });
        });
    </script>
    
@endpush