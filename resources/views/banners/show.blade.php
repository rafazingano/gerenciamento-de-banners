@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1>{{ $banner->title }}</h1>
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