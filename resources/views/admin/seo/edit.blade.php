@extends('admin.layouts.default-layout')


@section('content')

    @if($data != null && $data != 'undefined' && !empty($data))
        <div class="row">
                <h1>Edit {{ $data->title }} SEO</h1>
                <div class="twelve columns">
                    <form action="{{ route('updateSeo') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <label class="u-full-width" for="">title</label>
                        <input class="u-full-width" type="text" name="title" value="{{ $data->title }}">
                        <label class="u-full-width" for="">keywords</label>
                        <input class="u-full-width" type="text" name="keywords" value="{{ $data->keywords }}">
                        <label class="u-full-width" for="">description / 300 mots max</label>
                        <textarea class="u-full-width" name="description" id="" cols="30" rows="10">{{ $data->description }}</textarea>

                        <label class="u-full-width" for="">Couvertur SEO / netwroks etc</label>
                        <a class="u-full-width" href="/admin/seo-default-pages/edit/{{$data->id}}">{{$data->title}}</a>
                        <label for="">Couverture</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i>Choisissez
                              </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="cover" value="{{ $data->cover }}">
                            <img id="holder" style="margin-top:15px;max-height:100px;" src="{{ $data->cover }}">
                        </div>
                        <button type="submit">Sauvegarder</button>
                    </form>
                </div>
        </div>
    @endif

@endsection