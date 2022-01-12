<div class="table-responsive">
    <table class="table" id="keluargas-table">
        <thead>
            <tr>
                <th>Nomor</th>
        <th>Individu Id</th>
        <th>Peran</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($keluargas as $keluarga)
            <tr>
                <td>{{ $keluarga->nomor }}</td>
            <td>{{ $keluarga->individu_id }}</td>
            <td>{{ $keluarga->peran }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['keluargas.destroy', $keluarga->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('keluargas.show', [$keluarga->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('keluargas.edit', [$keluarga->id]) }}" class='btn btn-default btn-xs'>
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
