@extends('admin.layouts.default-layout')


@section('content')
    <div class="container">
        @if($data != null && $data != 'undefined' && !empty($data))
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Modifier Section à l'accueil</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('updateHomeSection') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <label class="u-full-width" for="">title</label>
                                <input class="u-full-width" type="text" name="title" value="{{ $data->title }}" placeholder="titre de la section">
                                <label class="u-full-width" for="">Contenu de la section</label>
                                <textarea class="u-full-width" name="content" id="" cols="30" rows="10">{{ $data->content }}</textarea>
                                <button class="u-full-width" type="submit">Modifier</button>
                            </form>
                            <form action="{{ route('deleteHomeSection') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <button class="u-full-width">Supprimer</button>
                            </form>
                        </div>
                     </div>
                </div>
            </div>
        @endif
    </div>



@endsection