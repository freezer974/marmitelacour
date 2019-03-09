@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Ajouter un atelier')
        @endslot
        <form method="POST" action="{{ route('atelier.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group{{ $errors->has('atelier') ? ' is-invalid' : '' }}">
                <div class="custom-file">
                    <input type="file" id="atelier" name="atelier"
                           class="{{ $errors->has('atelier') ? ' is-invalid ' : '' }}custom-file-input" required>
                    <label class="custom-file-label" for="atelier"></label>
                    @if ($errors->has('atelier'))
                        <div class="invalid-feedback">
                            {{ $errors->first('atelier') }}
                        </div>
                    @endif
                </div>
                <br>
            </div>
            <div class="form-group">
                <img id="preview" class="img-fluid" src="#" alt="">
            </div>
            @include('partials.form-group', [
                'title' => __('Description (optionnelle)'),
                'type' => 'text',
                'name' => 'description',
                'required' => false,
                ])
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="adult" name="adult">
                    <label class="custom-control-label" for="adult"> @lang('Contenu adulte')</label>
                </div>
            </div>
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
    @endcomponent
@endsection
@section('script')
    <script>
        $(() => {
            $('input[type="file"]').on('change', (e) => {
                let that = e.currentTarget
                if (that.files && that.files[0]) {
                    $(that).next('.custom-file-label').html(that.files[0].name)
                    let reader = new FileReader()
                    reader.onload = (e) => {
                        $('#preview').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(that.files[0])
                }
            })
        })
    </script>
@endsection