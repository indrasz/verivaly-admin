@extends('layouts.app')

@section('content')
    <!-- Body Content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('convert') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="json_file">Pilih File Excel:</label>
                                    <input type="file" class="form-control-file" id="json_file" name="json_file">
                                </div>
                                <button type="submit" class="btn btn-primary">Upload & Convert</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
