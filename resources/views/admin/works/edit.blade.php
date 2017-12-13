@extends('admin.layouts.default-layout')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Edition du Work</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateWorks') }}" method="POST">
                            {{ csrf_field() }}
                            <label for="title">title</label>
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <input class="u-full-width" type="text" name="title" value="{{ $data->title }}">
                            <label for="title">Contenu</label>
                            <textarea name="content" class="form-control my-editor">{!! old('content', $data->content) !!}</textarea>
                            <label for="title">Description pour SEO</label>
                            <textarea name="description" class="form-control u-full-width">{!! old('content', $data->description) !!}</textarea>
                            <div class="form-group">
                                <label for="name">Keywords - SEO</label>
                                <input type="text" class="form-control" id="title" name="keywords" placeholder="Mots clés" value="{{$data->keywords}}">
                            </div>
                            <label for="">Couverture</label>
                            <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choisissez
                             </a>
                           </span>
                                <input id="thumbnail" class="form-control" type="text" name="cover" value="{{ $data->cover }}">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                            <button>Supprimer</button>
                            <button type="submit">Sauvegarder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection