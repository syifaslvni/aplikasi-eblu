@extends('layouts.main')

@section('title', 'Data Jenis Jasa')

@section('header-title', 'Data Jenis Jasa')

@section('breadcrumbs')
{{ Breadcrumbs::render('data_kategories') }}
@endsection

@section('content')
  <!-- section:content -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4><a href="{{ route('jenisjasa.create') }}" class="btn btn-warning float-left" role="button">
             Tambah Jenis Jasa
             <i class="fas fa-plus-square"></i>
          </a></h4>
          <div class="card-header-form">
             {{-- Form Search --}}
             <form action="{{ route('jenisjasa.index') }}" method="GET">
                <div class="input-group">
                  <input name="keyword" type="search" class="form-control" 
                  placeholder="Cari Jenis Jasa"
                  value="{{ request()->get('keyword') }}">
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
          </div>  
        </div>
         <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped table-md">
               <thead>
                  <tr>
                        <th class="text-center">No</th>
                        <th>Jenis Jasa</th>
                        <th class="text-center">Action</th>
                     </tr>
               </thead>
               <tbody>
                  @forelse ($jenisjasas as $index => $jenisjasa)
                  <tr>
                     <td class="text-center">{{ $index + $jenisjasas->firstItem() }}</td>
                     <td>{{ $jenisjasa->title }} </td>
                        <td class="text-center">
                        <!-- delete -->
                        <form class="d-inline" role="alert"
                           alert-text="{{ trans('jenisjasa.alert.delete.message.confirm', ['title' => $jenisjasa->title]) }}"
                           action="{{ route('jenisjasa.destroy', ['jenisjasa' => $jenisjasa]) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-sm btn-danger mt-1">
                           <i class="fas fa-trash"></i>
                           </button>
                        </form> 
                     </td>
                  </tr>
                  @empty
                     <p class="text-center text-danger">
                        <strong>
                           @if(request()->get('keyword'))
                              {{ trans('jenisjasa.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                           @else
                              {{ trans('jenisjasa.label.no_data.fetch') }}
                           @endif
                        </strong>
                     </p>
                  @endforelse
               </tbody>
            </table>
            </div>
         </div>
         @if ($jenisjasas->hasPages())
            <div class="card-footer">
               {{ $jenisjasas->links('vendor.pagination.bootstrap-4') }}
            </div>
         @endif
      </div>
 </div>
@endsection

@push('javascript-internal')
   <script>
      $(document).ready(function() {
         //Event : delete 
         $("form[role='alert']").submit(function(event) {
            event.preventDefault();
            Swal.fire({
               title: "{{ trans('jenisjasa.alert.delete.title') }}",
               text: $(this).attr('alert-text'),
               icon: 'warning',
               allowOutsideClick: false,
               showCancelButton: true,
               cancelButtonText: "{{ trans('jenisjasa.button.cancel.value') }}",
               reverseButtons: true,
               confirmButtonText: "{{ trans('jenisjasa.button.delete.value') }}",
            }).then((result) => {
               if (result.isConfirmed) {
                  event.target.submit();
               }
            });
         });
      });
   </script>
@endpush