@extends('layouts.app')
@section('content')<section class="form-page"><p class="eyebrow">Admin studio</p><h1>Add a product</h1>@include('products.form', ['product' => null, 'formAction' => route('products.store'), 'formMethod' => 'POST'])</section>@endsection
