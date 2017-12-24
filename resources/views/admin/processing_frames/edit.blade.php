@extends('admin.layouts.default-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Ajouter un script Processing</strong>
                    </div>
                    <form action="{{ route('updateProcessingPost') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="titre" value="{{$data->title}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Script / Pour Crea-Coding</label>
                                        <textarea class="form-control" name="script" id="" cols="30" rows="10">{{ $data->script }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection