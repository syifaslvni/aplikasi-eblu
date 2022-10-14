@extends('layouts.main')

@section('title', 'Pengunjung Web')

@section('header-title', 'Data Pengunjung Web')

@section('breadcrumbs')
{{ Breadcrumbs::render('data_visitors') }}
@endsection

@section('content')
  <!-- section:content -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-header-form">
             {{-- Form Search --}}
             <form action="{{ route('visitors.index') }}" method="GET">
                <div class="input-group">
                  <input name="keyword" type="search" class="form-control" 
                  placeholder="Cari nama"
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Instansi</th>
                        <th>Nama Instansi</th>
                        <th>Contact</th>
                        <th>Waktu</th>
                        <th>Action</th>
                     </tr>
               </thead>
               <tbody>
                  @forelse ($visitors as $index => $visitor)
                     <tr>
                     <td>{{ $index + $visitors->firstItem() }}</td>
                     <td>{{ $visitor->name }} </td>
                     <td>{{ $visitor->source }} </td>
                     <td>{{ $visitor->company }} </td>
                     <td>{{ $visitor->contact }} </td>
                     <td>{{ $visitor->created_at->diffForHumans() }} </td>
                        <td>
                        <!-- delete -->
                        <form class="d-inline" role="alert"
                           alert-text="{{ trans('visitors.alert.delete.message.confirm', ['name' => $visitor->name]) }}"
                           action="{{ route('visitors.destroy', ['visitor' => $visitor]) }}" method="POST">
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
                              {{ trans('visitors.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                           @else
                              {{ trans('visitors.label.no_data.fetch') }}
                           @endif
                        </strong>
                     </p>
                  @endforelse
               </tbody>
            </table>
            </div>
         </div>
         @if ($visitors->hasPages())
            <div class="card-footer">
               {{ $visitors->links('vendor.pagination.bootstrap-4') }}
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
               title: "{{ trans('visitors.alert.delete.title') }}",
               text: $(this).attr('alert-text'),
               icon: 'warning',
               allowOutsideClick: false,
               showCancelButton: true,
               cancelButtonText: "{{ trans('visitors.button.cancel.value') }}",
               reverseButtons: true,
               confirmButtonText: "{{ trans('visitors.button.delete.value') }}",
            }).then((result) => {
               if (result.isConfirmed) {
                  event.target.submit();
               }
            });
         });
      });
   </script>
@endpush