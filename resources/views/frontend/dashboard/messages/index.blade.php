@extends('frontend.dashboard.layouts.main')
@section('dashboard_content')
    <messages-component auth_id="{{auth()->id()}}"></messages-component>
@endsection