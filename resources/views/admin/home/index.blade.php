@extends('admin.layouts.default-layout')


@section('content')
    <div class="container">
        MON COMMIT
    @if($data != null && $data != 'undefined' && !empty($data))
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Sections à l'accueil</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Desc</th>
                                    <th>Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(isset($data) && !empty($data))
                                        @foreach($data as $post)
                                            <tr>
                                                <td>
                                                    <a href="/admin/home/edit/{{ $post->id }}">
                                                        {{$post->title}}
                                                    </a>
                                                </td>
                                                <td>{{ $post->content }}</td>

                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Ajouter une section à l'accueil</strong> <br>
                        <little>span avec class="violet-color" pour text en violet</little>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('addHomeSection') }}" method="POST">
                            {{ csrf_field() }}
                            <label class="u-full-width" for="">title</label>
                            <input class="u-full-width" type="text" name="title" value="" placeholder="titre de la section">
                            <label class="u-full-width" for="">Contenu de la section</label>
                            <textarea class="u-full-width" name="content" id="" cols="30" rows="10"></textarea>
                            <button type="submit">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <strong>SEO de la page d'accueil</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateSeo') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="@if(isset($seo) && !empty($seo)){{ $seo->id }}@endif">
                        <label class="u-full-width" for="">title</label>
                        <input class="u-full-width" type="text" name="title" value="@if(isset($seo) && !empty($seo)){{ $seo->title }}@endif">
                        <label class="u-full-width" for="">keywords</label>
                        <input class="u-full-width" type="text" name="keywords" value="@if(isset($seo) && !empty($seo)){{ $seo->keywords }}@endif">
                        <label class="u-full-width" for="">description / 300 mots max</label>
                        <textarea class="u-full-width" name="description" id="" cols="30" rows="10">@if(isset($seo) && !empty($seo)){{ $seo->description }}@endif</textarea>

                        <label class="u-full-width" for="">Couvertur SEO / netwroks etc</label>
                        <label for="">Couverture</label>
                        <div class="input-group">
                                        <span class="input-group-btn">
                                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i>Choisissez
                                          </a>
                                        </span>
                            <input id="thumbnail" class="form-control" type="text" name="cover" value="@if(isset($seo) && !empty($seo)){{ $seo->cover }}@endif">
                            <img id="holder" style="margin-top:15px;max-height:100px;" src="@if(isset($seo) && !empty($seo)){{ $seo->cover }}@endif">
                        </div>
                        <button type="submit">Sauvegarder</button>

                    </form>
                </div>
             </div>
        </div>
    </div>
    </div>

@endsection