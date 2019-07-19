@extends('adminlte::page')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('brand.brand_list') }}</div>
                    <a href="/admin/brands/create" class="btn btn-info" role="button" style="margin-bottom:20px;">{{ __('brand.create') }}</a>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="alert alert-success" role="alert" style="display: none;">
                            </div>
                            <div class="alert alert-warning" role="alert" style="display: none;">
                            </div>
                        <table class="table" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('brand.name') }}</th>
                                <th scope="col">{{ __('brand.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr class="row_{{ $brand->id }}">
                                    <th scope="row">{{ $brand->id }}</th>
                                        <td>{{ $brand->name }}</td>
                                        <td>
                                            <a href="brands/{{ $brand->id }}/edit" class="btn btn-info" role="button">{{ __('brand.edit') }}</a>
                                            <form action="{{ route('admin.brand.destroy',[$brand->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-info" type="submit">{{ __('brand.del') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
