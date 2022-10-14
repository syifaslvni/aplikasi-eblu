@extends('layouts.main')

@section('title', 'Data Kategori Jasa')

@section('header-title', 'Data Kategori Jasa')

@section('breadcrumbs')
{{ Breadcrumbs::render('data_categories') }}
@endsection

@section('content')
  <!-- section:content -->
  <div class="row">
   <div class="col-md-12">
     <div class="card">
       <div class="card-header">
         <h4><a href="{{ route('categories.create') }}" class="btn btn-warning float-left" role="button">
            Tambah Kategori
            <i class="fas fa-plus-square"></i>
         </a></h4>
         <div class="card-header-form">
            {{-- Form Search --}}
            <form action="{{ route('categories.index') }}" method="GET">
               <div class="input-group">
                 <input name="keyword" type="search" class="form-control" 
                 placeholder="Cari Kategori"
                 value="{{ request()->get('keyword') }}">
                 <div class="input-group-btn">
                   <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                 </div>
               </div>
             </form>
         </div>  
       </div>

         <div class="card-body">
            <table class="table table-striped table-md text-center ">
               <thead>
                     <tr>
                        <th>Jenis Jasa</th>
                        <th>Sub Jasa</th>
                        <th>Sub Sub Jasa</th>
                     </tr>
               </thead>
               </table>
            <ul class="list-group list-group-flush">
               <!-- list category -->
               @if (count($categories))
                  @include('categories.category-list', [
                     'categories' => $categories,
                     'count' => 0
                  ])
               @else
                   <p class="text-center text-danger">
                     <strong>
                        @if (request()->get('keyword'))
                        {{ trans('categories.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                        @else
                        {{ trans('categories.label.no_data.fetch') }}
                        @endif
                     </strong>
                   </p>
               @endif
            </ul>
         </div>
         @if ($categories->hasPages())
            <div class="card-footer">
               {{ $categories->links('vendor.pagination.bootstrap-4') }}
            </div>
         @endif
      </div>
   </div>
</div>
@endsection

@push('javascript-internal')
   <script>
      $(document).ready(function() {
         //Event : delete category
         $("form[role='alert']").submit(function(event) {
            event.preventDefault();
            Swal.fire({
               title: $(this).attr('alert-title'),
               text: $(this).attr('alert-text'),
               icon: 'warning',
               allowOutsideClick: false,
               showCancelButton: true,
               cancelButtonText: $(this).attr('alert-btn-cancel'),
               reverseButtons: true,
               confirmButtonText: $(this).attr('alert-btn-yes'),
            }).then((result) => {
               if (result.isConfirmed) {
                  event.target.submit();
               }
            });
         });
      });
   </script>
@endpush