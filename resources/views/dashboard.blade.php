@extends('layout.app')
@section('title', 'Dashboard')
@section('breadcrumb')
<li>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-3.5"><path d="m9 18 6-6-6-6" /></svg>
</li>
<li class="inline-flex items-center gap-1.5">
    <a href="{{ route('dashboard') }}" class="text-foreground">Dashboard</a>
</li>
@endsection
@section('content')

@endsection