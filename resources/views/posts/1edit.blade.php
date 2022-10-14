@extends('layouts.main')

@section('title', 'Edit Produk Jasa')

@section('header-title', 'Edit Produk Jasa')

@section('breadcrumbs')
{{ Breadcrumbs::render('edit_posts', $post) }}
@endsection

@section('content')
<div class="row">
   <div class="col-md-12">
      <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST">
         @csrf
         @method('PUT')
         <div class="card">
            <div class="card-body">
                     <!-- title -->
                     <div class="form-group">
                        <label for="input_post_title" class="font-weight-bold">
                           Nama Jasa
                        </label>
                        <input id="input_post_title" value="{{ old('title', $post->title) }}" name="title" type="text" 
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
                     <!-- parent_category -->
                     <div class="form-group">
                        <label for="select_category_parent" class="font-weight-bold">Kategori</label>
                        <select id="select_category_parent" value="{{ old('category_id', $post->category_id) }}" name="category_id" data-placeholder="Pilih kategori" 
                        class="custom-select w-100 @error('category_id') is-invalid @enderror">
                        </select>
                        @error('category_id')
                              <span class="invalid-feedback">
                                 <strong>
                                    {{ $message }}
                                 </strong>
                              </span>
                           @enderror
                     </div>
                     <!-- slug -->
                     <div class="form-group">
                        <label for="input_post_slug" class="font-weight-bold">
                           Slug
                        </label>
                        <input id="input_post_slug" value="{{ old('slug', $post->slug) }}" name="slug" type="text" 
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
                     <label for="input_post_thumbnail" class="font-weight-bold">
                        Thumbnail
                     </label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <button id="button_post_thumbnail" data-input="input_post_thumbnail"
                              data-preview="holder" class="btn btn-primary" type="button">
                              Browse
                           </button>
                        </div>
                        <input id="input_post_thumbnail" name="thumbnail" 
                        value="{{ old('thumbnail', asset($post->thumbnail)) }}" type="text" 
                        class="form-control @error('thumbnail') is-invalid @enderror"
                           placeholder="{{ trans('posts.form_control.input.thumbnail.placeholder') }}" readonly />
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
                        <label for="input_post_description" class="font-weight-bold">
                           Satuan
                        </label>
                        <input id="input_post_description" value="{{ old('description', $post->description) }}" name="description" type="text" 
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
                        <label for="input_post_content" class="font-weight-bold">
                           Content
                        </label>
                        <textarea id="input_post_content" name="content" placeholder="" 
                        class="form-control @error('content') is-invalid @enderror"
                           rows="50">{{ old('content', $post->content) }}</textarea>
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
         $("#input_post_title").change(function (event) {
            $("#input_post_slug").val(
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
           url: "{{ route('categories.select') }}",
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
       $('#button_post_thumbnail').filemanager('image');

       //text editorr tiny mce
       $("#input_post_content").tinymce({
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

 