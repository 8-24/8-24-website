@extends('admin.layouts.default-layout')


@section('content')

    @if($data != null && $data != 'undefined' && !empty($data))
        <div class="row">
            @foreach($data as $item)
                <div class="three
                columns">
                    <a href="/admin/seo-default-pages/edit/{{$item->id}}">{{$item->title}}</a>
                    <img class="img u-full-width" src="{{ $item->cover }}" alt="">
                </div>

            @endforeach

        </div>
    @endif

@endsection