@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Gestion des roles')
        @endslot
        <table class="table table-dark text-white">
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->label }}</td>
                    <td>
                        <a role="button" href="{{ route('role.edit', $role->id) }}" class="btn btn-warning btn-sm pull-right mr-2 invisible" data-toggle="tooltip" title="@lang('Modifier le rôle') {{ $role->label }}">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                        <a role="button" href="{{ route('role.destroy', $role->id) }}" class="btn btn-danger btn-sm pull-right invisible" data-toggle="tooltip" title="@lang('Supprimer le rôle') {{ $role->label }}">
                           <i class="fas fa-trash fa-lg"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endcomponent
@endsection
@section('script')
    <script>
        $(() => {
            $('a').removeClass('invisible')
        })
    </script>
    @include('partials.script-delete', ['text' => __('Vraiment supprimer ce rôle ?'), 'return' => 'removeTr'])
@endsection