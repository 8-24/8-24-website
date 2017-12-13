@extends('admin.layouts.default-layout')


@section('content')

    <div class="twelve columns">
        <h1>Ajouter un post</h1>
        <form action="{{ route('addBlogPost') }}" method="POST">
            {{ csrf_field() }}
            <label for="title">title</label>
            <input type="hidden" name="id" value="">
            <input class="u-full-width" type="text" name="title" value="">
            <label for="title">catégorie</label>
            <select name="category" id="" class="u-full-width">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                @endforeach
            </select>
            <label for="title">Contenu</label>
            <textarea name="content" class="form-control my-editor"></textarea>
            <label for="title">Description pour SEO</label>
            <textarea name="description" class="form-control u-full-width"></textarea>
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
            <button>Supprimer</button>
            <button type="submit">Sauvegarder</button>
        </form>
    </div>

@endsection