@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            {!! Form::model($banner, ['route' => ['banners.update', $banner->id], 'method' => 'put', 'files'=>true]) !!}
                                @include('banners.partials.form')
                            {!! Form::close() !!}
                            <hr>
                            <img src="{{ asset('storage/banners/' . $banner->banner) }}" alt="{{ $banner->title }}" class="img-fluid img-thumbnail" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection