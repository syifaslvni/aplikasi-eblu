@extends('layouts.main')

@section('title', 'Tambah Jasa Layanan')

@section('header-title', 'Tambah Jasa Layanan')

@section('breadcrumbs')
{{ Breadcrumbs::render('add_posts') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <form action="{{ route('posts.store') }}" method="POST" {{-- enctype="multipart/form-data" --}} >
        @csrf
          <div class="card">
             <div class="card-body">
                <div class="row d-flex align-items-stretch">
                   <div class="col-md-8">
                      <!-- title -->
                      <div class="form-group">
                         <label for="input_post_title" class="font-weight-bold">
                            Nama Jasa Layanan
                         </label>
                         <input id="input_post_title" value="{{ old('title') }}" name="title" type="text" 
                        class="form-control @error('title') is-invalid @enderror"
                           placeholder="Masukkan nama jasa layanan" />
                           @error('title')
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
                         <input id="input_post_slug" value="{{ old('slug') }}" name="slug" type="text" 
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
                                    class="btn btn-primary" type="button">
                                   {{ trans('posts.button.browse.value') }}
                                </button>
                             </div>
                             <input id="input_post_thumbnail" name="thumbnail" value="{{ old('thumbnail') }}" 
                             type="text" class="form-control @error('thumbnail') is-invalid @enderror"
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
                      <!-- description -->
                      <div class="form-group">
                         <label for="input_post_description" class="font-weight-bold">
                            Satuan
                         </label>
                         <input id="input_post_description" value="{{ old('description') }}" name="description" type="text" 
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
                           rows="50">{{ old('content') }}</textarea>
                           @error('content')
                              <span class="invalid-feedback">
                                 <strong>
                                    {{ $message }}
                                 </strong>
                              </span>
                           @enderror
                      </div>
                   </div>
                   <div class="col-md-4">
                      <!-- catgeory -->
                      <div class="form-group">
                         <label for="input_post_description" class="font-weight-bold">
                            Kategori Jasa
                         </label>
                         <div class="form-control @error('category') is-invalid @enderror overflow-auto" style="height: 1200px">
                            <!-- List category -->
                            @include('posts.postscategory-list', [
                                'categories' => $categories,
                                'categoryChecked' => old('category')
                            ])
                            <!-- List category -->
                         </div>
                         @error('category_id')
                              <span class="invalid-feedback">
                                 <strong>
                                    {{ $message }}
                                 </strong>
                              </span>
                           @enderror
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-12">
                      <div class="float-right">
                         <a class="btn btn-warning px-4" href="{{ route('posts.index') }}">Kembali</a>
                         <button type="submit" class="btn btn-primary px-4">
                            Simpan
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

@push('css-external')
   {{-- select2 --}}
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


       //event : thumbnail
       $('#button_post_thumbnail').filemanager('image');

       //text editor tiny mce
       $("#input_post_content").tinymce({
         relative_urls: false,
         height: 650,
         language: "en",
         plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern",
         ],
         toolbar1: "fullscreen preview",
         toolbar2:"insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function(callback, value, meta) {
               let x = window.innerWidth || document.documentElement.clientWidth || document
                  .getElementsByTagName('body')[0].clientWidth;
               let y = window.innerHeight || document.documentElement.clientHeight || document
                  .getElementsByTagName('body')[0].clientHeight;

               let cmsURL = "{{ route('unisharp.lfm.show') }}" + '?editor=' + meta.fieldname;
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

 