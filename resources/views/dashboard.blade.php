@extends('layouts.app')
@section('content')
<section class="dashboard-head"><div><p class="eyebrow">Member dashboard</p><h1>Good to see you, {{ auth()->user()->name }}.</h1><p class="lead">You are signed in as a {{ auth()->user()->role }}.</p></div><a class="button" href="{{ route('products.index') }}">Browse the collection</a></section>
<section class="dashboard-grid"><article><span class="metric">01</span><h3>Authentication</h3><p>Your account is protected by Laravel session authentication and the auth middleware.</p></article><article><span class="metric">02</span><h3>Relationships</h3><p>Products connect to their owner and category through Eloquent relationships.</p></article><article><span class="metric">03</span><h3>Authorization</h3><p>{{ auth()->user()->isAdmin() ? 'As an admin, you can manage products.' : 'Product management is reserved for admins.' }}</p></article></section>
@endsection
