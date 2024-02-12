@extends('layouts.app')

@section('title', 'typeoption Create')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">typeoption</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">typeoption</h2>



                <div class="card">
                    <form action="{{ route('typeoption.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">options</label>
                                <select class="form-control selectric @error('id_option') is-invalid @enderror"
                                    name="id_option">
                                    <option value="">-- Select options --</option>
                                    @foreach ($option as $options)
                                        <option value="{{ $options->id_option }}"
                                            {{ old('id_option') == $options->id_option ? 'selected' : '' }}>
                                            {{ $options->name_option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Types</label>
                                <select class="form-control selectric @error('id_type') is-invalid @enderror"
                                    name="id_type">
                                    <option value="">-- Select Types --</option>
                                    @foreach ($type as $types)
                                        <option value="{{ $types->id_type }}"
                                            {{ old('id_type') == $types->id_type ? 'selected' : '' }}>
                                            {{ $types->name_type }}</option>
                                    @endforeach
                                </select>
                            </div>




                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush