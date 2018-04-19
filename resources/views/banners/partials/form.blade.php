<div class="form-group">
    {!! Form::label('image', 'Imagem do banner') !!}
    {!! Form::file('image', ["class" => "form-control", "id" => "image", "aria-describedby" => "Imagem do banner", "placeholder" => "Imagem do banner"]) !!}
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('title', 'Titulo do banner') !!}
        {!! Form::text('title', isset($banner->title)? $banner->title : null, ["class" => "form-control", "id" => "title", "aria-describedby" => "Titulo do banner", "placeholder" => "Titulo do banner"]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('status', 'Status') !!}
        {!! Form::select('status', ['1'=>trans('Ativo'), '0'=>trans('Desativado')], isset($banner->status)? $banner->status : null, ['class' => 'form-control']) !!}
    </div>
</div>
{!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}