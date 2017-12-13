@extends('admin.layouts.default-layout')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Ajouter un Blog Post</strong>
                    </div>
                    <form action="{{ route('addBlogPost') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="titre">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Description / SEO</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Keywords - SEO</label>
                                        <input type="text" class="form-control" id="title" name="keywords" placeholder="Mots clés">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Contenu du post</label>
                                        <textarea name="content" class="form-control my-editor"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Couverture</label>
                                    <div class="input-group">
                                   <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choisissez
                                      </a>
                                   </span>
                                        <input id="thumbnail" class="form-control" type="text" name="cover">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Sauvegarder</button>
                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @if($data != null && $data != 'undefined' && !empty($data))
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Liste des Posts</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Desc</th>
                                <th>Cover</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $post)
                                <tr>
                                    <td>
                                        <a href="/admin/blog/edit/{{ $post->id }}">
                                            {{$post->title}}
                                        </a>
                                    </td>
                                    <td><img style="width: 100px; height: auto;" src="{{ asset($post->cover) }}" alt=""></td>
                                    <td>{{ $post->description }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    @endif

    </div>

@endsection