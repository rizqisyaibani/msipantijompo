<!-- Nomor Field -->
<div class="col-sm-12">
    {!! Form::label('nomor', 'Nomor:') !!}
    <p>{{ $keluarga->nomor }}</p>
</div>

<!-- Individu Id Field -->
<div class="col-sm-12">
    {!! Form::label('individu_id', 'Individu Id:') !!}
    <p>{{ $keluarga->individu_id }}</p>
</div>

<!-- Peran Field -->
<div class="col-sm-12">
    {!! Form::label('peran', 'Peran:') !!}
    <p>{{ $keluarga->peran }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $keluarga->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $keluarga->updated_at }}</p>
</div>

