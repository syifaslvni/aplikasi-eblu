@extends('layouts.main')

@section('title', 'Edit Sub Jasa')

@section('header-title', 'Edit Sub Jasa')

@section('breadcrumbs')
{{ Breadcrumbs::render('edit_subkategories', $subjasa) }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
             <form action="{{ route('subjasa.update', ['subjasa' => $subjasa]) }}" method="POST">
                @method('PUT')
                @csrf
                <!-- parent_subjasa -->
                <div class="form-group">
                   <label for="select_category_parent" class="font-weight-bold">Jenis Jasa</label>
                   <select id="select_category_parent" name="parent_category" 
                   data-placeholder="{{ trans('subjasa.form_control.select.parent_category.placeholder') }}" 
                   class="custom-select w-100">
                    @if(old('jenisjasa_id', $subjasa->jenisjasa))
                        <option value="{{ old('jenisjasa_id', $subjasa->jenisjasa)->id }}" selected>
                            {{ old('jenisjasa_id', $subjasa->jenisjasa)->title }}
                        </option>
                    @endif
                   </select>
                </div>
                <!-- title -->
                <div class="form-group">
                   <label for="input_category_title" class="font-weight-bold">
                      Sub Jasa
                   </label>
                   <input id="input_category_title" value="{{ old('title', $subjasa->title) }}" name="title" type="text" 
                   class="form-control @error('title') is-invalid @enderror"
                   placeholder="Masukkan kategori sub jasa" />
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
                   <input id="input_category_slug" value="{{ old('slug', $subjasa->slug) }}" name="slug" type="text" 
                   class="form-control @error('slug') is-invalid @enderror" readonly 
                   placeholder="Automatis dibuatkan" />
                   @error('slug')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
                <div class="float-right">
                	<a class="btn btn-warning px-4" href="{{ route('subjasa.index') }}">Kembali</a>
                	<button type="submit" class="btn btn-primary px-4">Simpan</button>
                </div>                
             </form>
          </div>
       </div>
    </div>
 </div>
@endsection

@push('css-external')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush

@push('javascript-external')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
@endpush

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
  
  
        //Select2 categori
         $('#select_category_parent').select2({
         theme: 'bootstrap4',
         allowClear: true,
         ajax: {
             url: "{{ route('jenisjasa.select') }}",
             dataType: 'json',
             delay: 250,
             processResults: function(data) {
                 return {
                     results: $.map(data, function(item) {
                         return {
                             text: item.title,
                             id: item.id
                         }
                     })
                 };
             }
         }
         });


        });
    </script>
    
@endpush