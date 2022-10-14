@extends('layouts.main')

@section('title', 'Edit Produk Jasa')

@section('header-title', 'Edit Produk Jasa')

@section('breadcrumbs')
{{ Breadcrumbs::render('edit_products', $product) }}
@endsection

@section('content')
<div class="row">
   <div class="col-md-12">
      <form action="{{ route('products.update', ['product' => $product]) }}" method="POST">
         @csrf
         @method('PUT')
         <div class="card">
            <div class="card-body">
                     <!-- title -->
                     <div class="form-group">
                        <label for="input_product_title" class="font-weight-bold">
                           Nama Jasa
                        </label>
                        <input id="input_product_title" value="{{ old('title', $product->title) }}" name="title" type="text" 
                        class="form-control @error('title') is-invalid @enderror"
                           placeholder="Masukkan nama jasa" />
                           @error('title')
                              <span class="invalid-feedback">
                                 <strong>
                                    {{ $message }}
                                 </strong>
                              </span>
                           @enderror
                     </div>

                     <!-- parent_category jenis jasa -->
                     <div class="form-group">
                        <label for="select_category_parent" class="font-weight-bold">Jenis Jasa</label>
                        <select id="select_category_parent" value="{{ old('jenisjasa_id', $product->jenisjasa_id) }}" name="jenisjasa_id" 
                        data-placeholder="Pilih Jenis Jasa" 
                        class="custom-select w-100 @error('jenisjasa_id') is-invalid @enderror">
                        </select>
                        @error('jenisjasa_id')
                              <span class="invalid-feedback">
                                 <strong>
                                    {{ $message }}
                                 </strong>
                              </span>
                           @enderror
                     </div>
                     
                     <!-- parent_category sub jasa -->
                     <div class="form-group">
                        <label for="select_subcategory_parent" class="font-weight-bold">Jenis Jasa</label>
                        <select id="select_subcategory_parent" value="{{ old('subjasa_id', $product->subjasa_id) }}" name="subjasa_id" 
                        data-placeholder="Pilih Sub Jasa" 
                        class="custom-select w-100 @error('subjasa_id') is-invalid @enderror">
                        </select>
                        @error('subjasa_id')
                              <span class="invalid-feedback">
                                 <strong>
                                    {{ $message }}
                                 </strong>
                              </span>
                           @enderror
                     </div>
                     
                     <!-- parent_category sub-sub jasa -->
                     <div class="form-group">
                        <label for="select_subsubcategory_parent" class="font-weight-bold">Jenis Jasa</label>
                        <select id="select_subsubcategory_parent" value="{{ old('subsubjasa_id', $product->subsubjasa_id) }}" name="subsubjasa_id" 
                        data-placeholder="Pilih Sub-sub Jasa" 
                        class="custom-select w-100 @error('subsubjasa_id') is-invalid @enderror">
                        </select>
                        @error('subsubjasa_id')
                              <span class="invalid-feedback">
                                 <strong>
                                    {{ $message }}
                                 </strong>
                              </span>
                           @enderror
                     </div>
                     
                     <!-- slug -->
                     <div class="form-group">
                        <label for="input_product_slug" class="font-weight-bold">
                           Slug
                        </label>
                        <input id="input_product_slug" value="{{ old('slug', $product->slug) }}" name="slug" type="text" 
                        class="form-control @error('slug') is-invalid @enderror" placeholder="Automatis dibuatkan"
                           readonly />
                           @error('slug')
                              <span class="invalid-feedback">
                                 <strong>
                                    {{ $message }}
                                 </strong>
                              </span>
                           @enderror
                     </div>
                     <!-- thumbnail -->
                    <div class="form-group">
                     <label for="input_product_thumbnail" class="font-weight-bold">
                        Thumbnail
                     </label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <button id="button_product_thumbnail" data-input="input_product_thumbnail"
                              data-preview="holder" class="btn btn-primary" type="button">
                              Browse
                           </button>
                        </div>
                        <input id="input_product_thumbnail" name="thumbnail" 
                        value="{{ old('thumbnail', asset($product->thumbnail)) }}" type="text" 
                        class="form-control @error('thumbnail') is-invalid @enderror"
                           placeholder="{{ trans('products.form_control.input.thumbnail.placeholder') }}" readonly />
                           @error('thumbnail')
                              <span class="invalid-feedback">
                                 <strong>
                                    {{ $message }}
                                 </strong>
                              </span>
                           @enderror
                        </div>
                  </div>
                  <div id="holder"></div>
                     <!-- description -->
                     <div class="form-group">
                        <label for="input_product_description" class="font-weight-bold">
                           Satuan
                        </label>
                        <input id="input_product_description" value="{{ old('description', $product->description) }}" name="description" type="text" 
                        class="form-control @error('description') is-invalid @enderror"
                           placeholder="Masukkan satuan" />
                           @error('description')
                              <span class="invalid-feedback">
                                 <strong>
                                    {{ $message }}
                                 </strong>
                              </span>
                           @enderror
                     </div>
                     <!-- content -->
                     <div class="form-group">
                        <label for="input_product_content" class="font-weight-bold">
                           Content
                        </label>
                        <textarea id="input_product_content" name="content" placeholder="" 
                        class="form-control @error('content') is-invalid @enderror"
                           rows="50">{{ old('content', $product->content) }}</textarea>
                           @error('content')
                              <span class="invalid-feedback">
                                 <strong>
                                    {{ $message }}
                                 </strong>
                              </span>
                           @enderror
                     </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="float-right">
                        <a class="btn btn-warning px-4" href="">Kembali</a>
                        <button type="submit" class="btn btn-primary px-4">
                           Edit
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
 </div>
@endsection

@push('javascript-external')
  {{-- file  manager --}}
   <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

   {{-- tiny mce --}}
   <script src="{{ asset('vendor/tinymce5/jquery.tinymce.min.js') }}"></script>
   <script src="{{ asset('vendor/tinymce5/tinymce.min.js') }}"></script>
@endpush

{{-- select2 --}}
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
         $("#input_product_title").change(function (event) {
            $("#input_product_slug").val(
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

         //Select2 subcategori
        $('#select_subcategory_parent').select2({
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

         //Select2 subsubcategori
        $('#select_subsubcategory_parent').select2({
         theme: 'bootstrap4',
         allowClear: true,
         ajax: {
             url: "{{ route('subsubjasa.select') }}",
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
      

       //event : thumbnail
       $('#button_product_thumbnail').filemanager('image');

       //text editorr tiny mce
       $("#input_product_content").tinymce({
         relative_urls: false,
         language: "en",
         plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern",
         ],
         toolbar1: "fullscreen preview",
         toolbar2:
            "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function(callback, value, meta) {
               let x = window.innerWidth || document.documentElement.clientWidth || document
                  .getElementsByTagName('body')[0].clientWidth;
               let y = window.innerHeight || document.documentElement.clientHeight || document
                  .getElementsByTagName('body')[0].clientHeight;

               let cmsURL = /* route */ + '?editor=' + meta.fieldname;
               if (meta.filetype == 'image') {
                  cmsURL = cmsURL + "&type=Images";
               } else {
                  cmsURL = cmsURL + "&type=Files";
               }

               tinyMCE.activeEditor.windowManager.openUrl({
                  url: cmsURL,
                  title: 'Filemanager',
                  width: x * 0.8,
                  height: y * 0.8,
                  resizable: "yes",
                  close_previous: "no",
                  onMessage: (api, message) => {
                     callback(message.content);
                  }
               });
            }

         });

      });

   </script>
@endpush

 