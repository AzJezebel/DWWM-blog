@extends('layouts.app')

@section('navbar')
    <span class="admin-label">Admin</span>
    <span class="avatar">A</span>
    <a href="{{ route('admin.toggle') }}">Se déconnecter</a>
@endsection