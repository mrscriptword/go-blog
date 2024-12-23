@extends('layouts.app')

@section('title', 'Beranda - Portal Berita')

@section('content')
    <h2>Daftar Berita</h2>
    <ul>
        @foreach($articles as $article)
            <li>
                <a href="{{ route('article', $article->slug) }}">{{ $article->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
