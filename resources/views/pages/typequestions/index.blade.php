@extends('layouts.app')

@section('title', 'types')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Types</h1>
                <div class="section-header-button">
                    <a href="{{ route('typequestion.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Management</a></div>
                    <div class="breadcrumb-item">All Types</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>

                </div>
                <h2 class="section-title">types</h2>
                <p class="section-lead">
                    You can manage all types, such as editing, deleting and more.
                </p>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Posts</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('typequestion.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search"
                                                name="name_type">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Name category</th>
                                            <th>Name question</th>
                                            <th>Name Type</th>
                                            <th>Type At</th>
                                            <th>Action</th>
                                        </tr>

                                        @foreach ($typequestion as $typequestions)
                                            <tr>
                                                <td>{{ $typequestions->name_category }}</td>
                                                <td>{{ $typequestions->question }}</td>
                                                <td>{{ $typequestions->name_type }}</td>
                                                <td>{{ $typequestions->created_at }}</td>

                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        {{-- <a href="{{ route('type.edit', $typequestions->id_type) }}"
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a> --}}
                                                        {{-- <form
                                                            action="{{ route('typequestions.destroy', $typequestions->id_type_option) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i>
                                                                Delete
                                                            </button>
                                                        </form> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{-- {{$typequestions->withQueryString()->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
