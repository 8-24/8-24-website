@extends('layouts.app')
        @section('seo_author')
            @if(isset($seo_author))
            <meta name="author" content="{{ $seo_author }}">
            @endif
        @endsection
        @section('seo_keywords')
            <meta name="keywords" content="{{ $seo_keywords }}">
        @endsection
        @section('seo_description')
            <meta name="description" content="{{ $seo_description }}">
        @endsection

        @section('social')
            @if(isset($data))
                <!-- Open Graph data -->
                <meta property="og:title" content="{{ $data->title }}" />
                <meta property="og:type" content="article" />
                @if(isset($current_link))
                    <meta property="og:url" content="{{ $current_link }}" />
                @endif
                <meta property="og:image" content="{{ asset($data->cover) }}" />
                <meta property="og:description" content="{{$data->description}}" />
                <meta property="og:site_name" content="8-24 agence" />
                <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" />
                <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
                <meta property="article:section" content="{{ $data->description }}" />
                <meta property="fb:admins" content="Facebook numberic ID" />
            @else
                <meta property="og:image" content="{{ asset($seo_cover) }}" />
            @endif

        @endsection

        @section('content')
        <!--
        <div class="flex-center position-ref full-height">
            <div class="wrapper">
                <div class="container">
                    <div class="twelve columns">
        -->
                        <div id="example"></div>
        <!--
                    </div>
                </div>
            </div>
        </div>
        -->
        @endsection


