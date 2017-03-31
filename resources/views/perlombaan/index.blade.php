@extends('layouts.app')

@section('content')
<div class="header">
    <br><br><h2><strong></strong> </h2>
</div>

  <?php if (!empty($success)) { ?>
    <div class="alert alert-success">
      <?php echo $success ?>
    </div>
  <?php } ?>

  <?php if (!empty($error)) { ?>
    <div class="alert alert-danger">
      <?php echo $error ?>
    </div>
  <?php } ?>

  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <a href="{{ url('/home') }}" class="btn btn-success"><i class="fa fa-chevron-left"></i> Back</a>
                </div>
                <div class="panel-content">
                    <form role="form" enctype="multipart/form-data" class="form-horizontal form-validation" action="{{!empty($perlombaan->id_lomba) ? route('perlombaan.update',$perlombaan->id_lomba):route('perlombaan.store')}}" method="POST">
<!-- ID Lomba dihapus, kan auto increment -->

                      {{-- Atasi Method Not Allowed --}}
                      @if(!empty($perlombaan->id_lomba))
                      <input type="hidden" name="_method" value="PUT">
                      @endif

                      {!! csrf_field() !!}

                      <input type="hidden" name="id" value="{{ Auth::user()->id}}">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Lomba</label>
                            <div class="col-sm-6 prepend-icon">
                                <input type="text" name="nama_lomba" class="form-control" value="{{ old('nama_lomba',@$perlombaan->nama_lomba) }}" required>
                                <i class="icon-envelope"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Bidang</label>
                            <div class="col-sm-6 prepend-icon">
                                <select class="form-control" name="id_bidang">
                                @foreach (\App\Bidang::all() as $bidang_lomba)
                                    <option value="{{ @$bidang_lomba->id_bidang }}" {{ $bidang_lomba->id_bidang == $bidang_lomba->id_bidang ? 'selected' : '' }}>{{ $bidang_lomba->nama_bidang }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal Perlombaan</label>
                            <div class="col-sm-6 prepend-icon">
                                <input type="date" name="tgl_perlombaan" class="form-control" value="{{ old('tgl_perlombaan',@$perlombaan->tgl_perlombaan) }}" required>
                                <i class="icon-globe"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Deskripsi</label>
                            <div class="col-sm-6 prepend-icon">
                                <input type="textarea" name="deskripsi" class="form-control" value="{{ old('deskripsi',@$perlombaan->deskripsi) }}" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Link</label>
                            <div class="col-sm-6 prepend-icon">
                                <input type="text" name="link" class="form-control" value="{{ old('link',@$perlombaan->link) }}" required>
                                <i class="icon-lock"></i>
                            </div>
                        </div>

                        @if(empty($perlombaan->id_lomba))
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Poster</label>
                            <div class="col-sm-6 prepend-icon">
                                <input type="file" name="poster" class="form-control" value="{{ old('poster',@$perlombaan->poster) }}" required>
                                <!-- requirednya dihapus dulu -->
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-embossed btn-primary m-r-20">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
