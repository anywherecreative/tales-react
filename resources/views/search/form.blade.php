@extends('layouts.app')
@section('meta.title', "Search")
@section('meta.description', "Search Tales Collective")
@section('content')
<div class="wrapper search-page">
    <div class="box">
    	<h2>Find stuff:</h2>
        <form action="{{ route('search.results') }}">
            <input type="text" name="term" placeholder="search" />
            <button type="submit">
                Search
            </button>
        </form>
    </div>
</div>
@endsection
@section('js.bottom')
<script>
    $('[placeholder="search"]').focus();
</script>
@endsection