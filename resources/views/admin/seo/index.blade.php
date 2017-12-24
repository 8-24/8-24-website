@extends('admin.layouts.default-layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Posts du laboratoire
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Slug</th>
                                <th>Desc</th>
                                <th>Couverture</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($data != null && $data != 'undefined' && !empty($data))
                                <div class="row">
                                    @foreach($data as $item)
                                        <tr>
                                            <td>
                                                {{ $item->title }}
                                            </td>
                                            <td>
                                                <a href="/admin/seo-default-pages/edit/{{$item->id}}">{{$item->title}}</a>
                                            </td>
                                            <td>
                                                {{ $item->description }}
                                            </td>
                                            <td>
                                                <img style="width:200px;" class="img u-full-width" src="{{ $item->cover }}" alt="">
                                            </td>
                                        </tr>

                                    @endforeach

                                </div>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>                        


@endsection