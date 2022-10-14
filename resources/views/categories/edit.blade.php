@extends('layouts.main')

@section('title', 'Edit Kategori')

@section('header-title', 'Edit Kategori Jasa')

@section('breadcrumbs')
{{ Breadcrumbs::render('edit_categories_title', $category) }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
             <form action="{{ route('categories.update', ['category' => $category]) }}" method="POST">
                @method('PUT')
                @csrf
                <!-- parent_category -->
                <div class="form-group">
                   <label for="select_category_parent" class="font-weight-bold">
                    {{ trans('categories.form_control.select.parent_category.label') }}
                    </label>
                   <select id="select_category_parent" name="parent_category"
                   data-placeholder="{{ trans('categories.form_control.select.parent_category.placeholder') }}" class="custom-select w-100">
                   @if (old('parent_category', $category->parent))
                   <option value="{{ old('parent_category', $category->parent)->id }}" selected>
                       {{ old('parent_category',$category->parent)->title }}
                   </option>
                    @endif
                   </select>
                </div>
                <!-- title -->
                <div class="form-group">
                   <label for="input_category_title" class="font-weight-bold">
                      Jenis Jasa
                   </label>
                   <input id="input_category_title" value="{{ old('title', $category->title) }}" name="title" type="text" 
                   class="form-control @error('title') is-invalid @enderror"
                   placeholder="Masukkan kategori jenis jasa" />
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
                   <input id="input_category_slug" value="{{ old('slug', $category->slug) }}" name="slug" type="text" 
                   class="form-control @error('slug') is-invalid @enderror" readonly 
                   placeholder="Automatis dibuatkan" />
                   @error('slug')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
                <div class="float-right">
                	<a class="btn btn-warning px-4" href="{{ route('categories.index') }}">Kembali</a>
                	<button type="submit" class="btn btn-primary px-4">Edit</button>
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
        $(function() {
            //Generate Slug
            function generateSlug(value){
                return value.trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, '-')
                    .replace(/-+/g, '-').replace(/^-|-$/g, "");
            } 

            //Select2 parent_category
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

            //Event:input title
            $('#input_category_title').change(function(){
                let title = $(this).val();
                let parent_category = $('#select_category_parent').val() ?? "";
                $('#input_category_slug').val(generateSlug(title + " " +parent_category));
            });

            //Event:select parent category
            $('#select_category_parent').change(function(){
                let title = $('#input_category_title').val();
                let parent_category = $(this).val() ?? "";
                $('#input_category_slug').val(generateSlug(title + " " +parent_category));
            });


        });
    </script>
    
@endpush