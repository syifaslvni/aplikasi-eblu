@extends('layouts.main')

@section('title', 'Data Nama Jasa')

@section('header-title', 'Data Nama Jasa')

@section('breadcrumbs')
{{ Breadcrumbs::render('data_posts') }}
@endsection

@section('content')
  <!-- section:content -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4><a href="{{ route('products.create') }}" class="btn btn-warning float-left" role="button">
             Tambah Jasa
             <i class="fas fa-plus-square"></i>
          </a></h4>
          <div class="card-header-form">
             {{-- Form Search --}}
             <form action="{{ route('products.index') }}" method="GET">
                <div class="input-group">
                  <input name="keyword" type="search" class="form-control" 
                  placeholder="Cari Jasa"
                  value="{{ request()->get('keyword') }}">
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
          </div>  
        </div>
         <div class="card-body p-0">
            <div class="table-responsive">
            <table class="table table-striped table-md">
               <thead>
                  <tr>
                        <th>No</th>
                        <th>Jenis Jasa</th>
                        <th>Sub Jasa</th>
                        <th>Sub-sub Jasa</th>
                        <th>Nama Jasa</th>
                        <th>Satuan</th>
                        <th>Action</th>
                     </tr>
               </thead>
               <tbody>
                  @forelse ($products as $index => $product)
                  <tr>
                     <td>{{ $index + $products->firstItem() }}</td>
                     <td>{{ ($product->jenisjasa->title) }}</td>
                     <td>{{ ($product->subjasa->title) }}</td>
                     <td>{{ ($product->subsubjasa->title) }}</td>
                     <td>{{ $product->title }} </td>
                     <td>{{ $product->description }}</td>
                        <td>
                        <!-- detail -->
                        <a href="{{ route('products.show', ['product' => $product]) }}" class="btn btn-sm btn-primary mt-1" role="button">
                           <i class="fas fa-eye"></i>
                        </a>
                        <!-- edit -->
                        <a href="{{ route('products.edit', ['product' => $product]) }}" class="btn btn-sm btn-info mt-1" role="button">
                           <i class="fas fa-edit"></i>
                        </a>
                        <!-- delete -->
                        <form class="d-inline" role="alert"
                           alert-text="{{ trans('products.alert.delete.message.confirm', ['title' => $product->title]) }}"
                           action="{{ route('products.destroy', ['product' => $product]) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-sm btn-danger mt-1">
                           <i class="fas fa-trash"></i>
                           </button>
                        </form> 
                     </td>
                  </tr>
                  @empty
                     <p class="text-center">
                        <strong>
                           @if(request()->get('keyword'))
                              {{ trans('products.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                           @else
                              {{ trans('products.label.no_data.fetch') }}
                           @endif
                        </strong>
                     </p>
                  @endforelse
               </tbody>
            </table>
            </div>
         </div>
         @if ($products->hasPages())
            <div class="card-footer">
               {{ $products->links('vendor.pagination.bootstrap-4') }}
            </div>
         @endif
      </div>
 </div>
@endsection

@push('javascript-internal')
   <script>
      $(document).ready(function() {
         //Event : delete post product
         $("form[role='alert']").submit(function(event) {
            event.preventDefault();
            Swal.fire({
               title: "{{ trans('products.alert.delete.title') }}",
               text: $(this).attr('alert-text'),
               icon: 'warning',
               allowOutsideClick: false,
               showCancelButton: true,
               cancelButtonText: "{{ trans('products.button.cancel.value') }}",
               reverseButtons: true,
               confirmButtonText: "{{ trans('products.button.delete.value') }}",
            }).then((result) => {
               if (result.isConfirmed) {
                  event.target.submit();
               }
            });
         });
      });
   </script>
@endpush