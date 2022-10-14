<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style-custom.css') }}">

    <title>eBLU | Register</title>
  </head>
  <body>
    
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-6 col-8 text-center">
            <h3 class="text-light">eBLU</h3>
            <div class="card mt-3">
                <h5 class="text-center mb-4">Register</h5>
                <form class="form-card" onsubmit="event.preventDefault()">
                    <form method="POST" action="#">
                       @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex"> 
                                <label class="form-control-label px-3">Nama Lengkap
                                    <span class="text-danger"> *</span>
                                </label> 
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap" onblur="validate(1)">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <label for="form_need">Jenis Instansi</label>
                                <select id="form_need" name="source" class="form-control" required="required" 
                                data-error="Silahkan pilih jenis instansi." onblur="validate(2)">
                                    <option selected disabled>--Pilih Jenis Instansi--</option>
                                    <option value="Perorangan">Perorangan</option>
                                    <option value="Swasta">Swasta</option>
                                    <option value="Pemerintahan">Pemerintahan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex"> 
                                <label class="form-control-label px-3">Instansi<span class="text-danger"> *</span>
                                </label> 
                            <input type="text" id="company" name="company" value="{{ old('company') }}" 
                            placeholder="Masukkan nama instansi" onblur="validate(3)">
                            @error('company')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex"> 
                                <label class="form-control-label px-3">Contact<span class="text-danger"> *</span>
                                </label> 
                                <input type="text" id="contact" name="contact"  value="{{ old('contact') }}"
                                placeholder="Masukkan email/whatsapp" onblur="validate(4)">
                                @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="form-group col-sm-12"> <button type="submit" class="btn-block btn-warning text-light">Lihat Jasa Layanan</button> </div>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>

  <!-- Template JS File -->
  <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/javascript-custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>