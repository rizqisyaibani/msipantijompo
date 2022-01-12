<div class="table-responsive">
    <table class="table" id="dokumens-table">
        <thead>
            <tr>
                <th>Nomor</th>
        <th>Nama</th>
        <th>Deskripsi</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dokumens as $dokumen)
            <tr>
            <td>{{ $dokumen->nomor }}</td>
            <td>{{ $dokumen->nama }}</td>
            <td>{{ $dokumen->deskripsi }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['dokumens.destroy', $dokumen->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ url($dokumen->file) }}" class='btn btn-default btn-xs' download>
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="{{ route('dokumens.show', [$dokumen->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('dokumens.edit', [$dokumen->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
