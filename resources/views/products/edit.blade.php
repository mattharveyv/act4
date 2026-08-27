@extends('layouts.app')
@section('content')<section class="form-page"><p class="eyebrow">Admin studio</p><h1>Edit product</h1>@include('products.form', ['formAction' => route('products.update', $product), 'formMethod' => 'PUT'])</section>@endsection
