@extends('admin.layouts.default-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Ajouter une Labs Catégorie</strong>
                    </div>
                    <form action="{{ route('addLabsCategory') }}" method="POST">
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
                                        <label for="name">Description</label>
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Catégories du laboratoire
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Slug</th>
                                <th>Desc</th>
                                <th>Couverture</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <a href="/admin/labs/categories/edit/{{ $item->id }}">{{ $item->slug }}</a>
                                    </td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <img class="img img-responsive" src="{{ asset($item->cover) }}" alt="" style="width:80px;">
                                    </td>
                                    <td>
                                        <form action="{{ route('deleteLabsCategory') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger u-full-width">Supprimer</button>
                                        </form>
                                    </td>
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