@extends('layouts.main')

@section('title', 'Tambah Visitor')

@section('header-title', 'Tambah Visitor')

@section('breadcrumbs')
{{ Breadcrumbs::render('data_visitors') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
             <form action="{{ route('visitors.store') }}" method="POST">
                @csrf
                <!-- name -->
                <div class="form-group">
                   <label for="input_visitors_name" class="font-weight-bold">
                      Nama Lengkap
                   </label>
                   <input id="input_visitors_name" value="{{ old('name') }}" name="name" type="text" 
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Masukkan nama lengkap" />
                   @error('name')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
                <!-- select jenis instansi -->
                <div class="form-group">
                   <label for="select_jenis_instansi" class="font-weight-bold">Jenis Instansi</label>
                   <select id="select_jenis_instansi" name="source" 
                   data-placeholder="Pilih Jenis Instansi" 
                   class="form_control selectric w-100">
                        <option selected>Pilih Jenis Instansi</option>
                        <option value="perorangan">Perorangan</option>
                        <option value="swasta">Swasta</option>
                        <option value="pemerintahan">Pemerintahan</option>
                   </select>
                </div>
                <!-- company -->
                <div class="form-group">
                   <label for="inpun_company_name" class="font-weight-bold">
                      Instansi
                   </label>
                   <input id="inpun_company_name" value="{{ old('company') }}" name="company" type="text" 
                   class="form-control @error('company') is-invalid @enderror"
                   placeholder="Masukkan nama instansi" />
                   @error('company')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
                <!-- contact -->
                <div class="form-group">
                   <label for="input_contact" class="font-weight-bold">
                      Email/Whatsapp
                   </label>
                   <input id="input_contact" value="{{ old('contact') }}" name="contact" type="text" 
                   class="form-control @error('contact') is-invalid @enderror"
                   placeholder="Masukkan email/whatsapp" />
                   @error('contact')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
                <div class="float-right">
                	<button type="submit" class="btn btn-primary px-4">Simpan</button>
                </div>                
             </form>
          </div>
       </div>
    </div>
 </div>
@endsection

{{-- @push('css-external')
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
    
@endpush --}}