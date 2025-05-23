@extends('client.layouts.app')

@section('title', 'Team Members |')
@section('content')
    <!-- navbar -->
    @include('client.app.nav')

    <!-- Team Members -->
    @include('client.team-members.team-members')

    @include('client.partials.why-choice')

@endsection