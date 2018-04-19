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
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Banner</th>
                            <th scope="col">Título</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <img src="{{ asset('storage/banners/' . $banner->banner) }}" alt="{{ $banner->title }}" class="img-fluid img-thumbnail" style="max-width: 100px">
                                    </td>
                                    <td>{{ __($banner->title) }}</td>
                                    <td>{{ ($banner->status)? __('Ativo') : __('Desativado') }}</td>
                                    <td>
                                        <div class="btn-group float-right" role="group" >
                                            <a href='{{ route('banners.show', $banner->id) }}' class="btn btn-secondary">
                                                <span class="eye">Ver</span>
                                            </a>
                                            <a href='{{ route('banners.edit', $banner->id) }}' class="btn btn-secondary">
                                                <span class="edit">Editar</span>
                                            </a>
                                            <a href="#" class="btn btn-secondary" onclick="if(confirm('Tem certeza que deseja deletar?')){ document.getElementById('destroy_{{ $banner->id }}').submit(); }">
                                                <span class="delete">Deletar</span>
                                            </a>                              
                                            {!! Form::open([ 'method'  => 'DELETE', 'route' => ['banners.destroy', $banner->id], 'id' => 'destroy_' . $banner->id ]) !!}
                                                {!! Form::hidden('id', $banner->id) !!}
                                            {!! Form::close() !!}
                                        </div>
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