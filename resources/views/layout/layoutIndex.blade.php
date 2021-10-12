@extends('welcome')

@section('nav')
<nav>
    <ul>
        <li><a href="{{ url('/') }}" title="">@lang('Home')</a></li>
        <li><a href="{{ url('/contact') }}" title="">@lang('Contact')</a></li>
    </ul>
</nav>
@endsection

@section('body')
dfsdf    
@endsection

@section('footer')
<footer>
    <nav>
        <a href="http://">Mentions légales</a>
    </nav>
</footer>
@endsection