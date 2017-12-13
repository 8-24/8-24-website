@extends('admin.layouts.default-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Editer une Labs Catégorie</strong>
                    </div>
                    <form action="{{ route('editLabsCategory') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="titre" value="{{ $data->title }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Description</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $data->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Keywords - SEO</label>
                                        <input type="text" class="form-control" id="title" name="keywords" placeholder="Mots clés" value="{{ $data->keywords }}">
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
                                        <input id="thumbnail" class="form-control" type="text" name="cover" value="{{ $data->cover }}">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;" src="{{ asset($data->cover) }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Mettre à jour</button>
                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>



@endsection