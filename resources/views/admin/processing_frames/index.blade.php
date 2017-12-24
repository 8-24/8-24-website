@extends('admin.layouts.default-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Ajouter un script Processing</strong>
                    </div>
                    <form action="{{ route('addProcessingPost') }}" method="POST">
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
                                        <label for="">Script / Pour Crea-Coding</label>
                                        <textarea class="form-control" name="script" id="" cols="30" rows="10"></textarea>
                                    </div>
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> CreativeCoding Projects
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Slug</th>
                                <th>Lien Iframe à inclure dans le <strong>code</strong> du post</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>
                                        <a href="/admin/processing-frame/edit/{{$item->id}}">{{ $item->title }}</a>
                                    </td>
                                    <td><a href="/iframe/{{ $item->slug }}">{{ $item->title }}</a></td>
                                    <td>
                                            &lt;iframe src="http://localhost:8000/iframe/{{ $item->slug }}" width="100%" height="680"&gt;&lt;/iframe&gt; 
                                    </td>
                                    <td>
                                        <form action="{{ route('deleteProcessingPost') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger u-full-width">Supprimer</button>
                                        </form></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/.col-->
        </div>

    </div>



@endsection