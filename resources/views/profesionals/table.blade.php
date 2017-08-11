<table class="table table-responsive" id="profesionals-table">
    <thead>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Especialidad</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($profesionals as $profesional)
        <tr>
            <td><img src="{!! $profesional->imagen !!}"></td>
            <td>{!! $profesional->nombre !!}</td>
            <td>{!! $profesional->Apellido !!}</td>
            <td>{!! $profesional->especialidad !!}</td>
            <td>
                {!! Form::open(['route' => ['profesionals.destroy', $profesional->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('profesionals.show', [$profesional->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('profesionals.edit', [$profesional->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>