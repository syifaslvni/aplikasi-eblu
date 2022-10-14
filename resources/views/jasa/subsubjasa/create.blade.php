@extends('layouts.main')

@section('title', 'Tambah Sub-sub Jasa')

@section('header-title', 'Tambah Sub-sub Jasa')

@section('breadcrumbs')
{{ Breadcrumbs::render('add_subsubkategories') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
             <form action="{{ route('subsubjasa.store') }}" method="POST">
                @csrf
                <!-- parent_category -->
                <div class="form-group">
                   <label for="select_category_parent" class="font-weight-bold">Sub Jasa</label>
                   <select id="select_category_parent" name="parent_category" 
                   data-placeholder="{{ trans('subsubjasa.form_control.select.parent_category.placeholder') }}" 
                   class="custom-select w-100">
                    @if(old('subjasa_id'))
                        <option value="{{ old('subjasa_id')->id }}" selected>
                            {{ old('subjasa_id')->title }}
                        </option>
                    @endif
                   </select>
                </div>
                <!-- title -->
                <div class="form-group">
                   <label for="input_category_title" class="font-weight-bold">
                      Sub-sub Jasa
                   </label>
                   <input id="input_category_title" value="{{ old('title') }}" name="title" type="text" 
                   class="form-control @error('title') is-invalid @enderror"
                   placeholder="Masukkan kategori sub-sub jasa" />
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
                	<a class="btn btn-warning px-4" href="{{ route('subsubjasa.index') }}">Kembali</a>
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
             url: "{{ route('subjasa.select') }}",
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