@extends('layouts.app')

@section('content')
<messinger-component :user="{{ auth()->user() }}"> </messinger-component>
@endsection
