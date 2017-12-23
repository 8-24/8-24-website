@extends('admin.layouts.default-layout')
@section('content')
    <div class="container">
        @if($data != null && $data != 'undefined' && !empty($data))
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Liste des Works</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Content</th>
                                    <th>Date</th>
                                    <th>Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>
                                                <a href="/admin/contact/message/{{ $item->id }}">
                                                    {{$item->email}}
                                                </a>
                                            </td>
                                            <td>{{ $item->content }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <form action="{{ route('deleteContactMessage') }}" method="post">
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
            </div>


            </div>
        @endif
    </div>


@endsection