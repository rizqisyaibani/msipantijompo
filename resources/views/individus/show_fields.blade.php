<!-- Nik Field -->
<div class="col-sm-12">
    {!! Form::label('nik', 'Nik:') !!}
    <p>{{ $individu->nik }}</p>
</div>

<!-- Nama Lengkap Field -->
<div class="col-sm-12">
    {!! Form::label('nama_lengkap', 'Nama Lengkap:') !!}
    <p>{{ $individu->nama_lengkap }}</p>
</div>

<!-- Kondisi Fisik Field -->
<div class="col-sm-12">
    {!! Form::label('kondisi_fisik', 'Kondisi Fisik:') !!}
    <p>{{ $individu->kondisi_fisik }}</p>
</div>

<!-- Alamat Field -->
<div class="col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $individu->alamat }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $individu->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $individu->updated_at }}</p>
</div>

