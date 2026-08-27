@extends('layouts.app')
@section('content')
<section class="section-head"><div><p class="eyebrow">The edit</p><h1>New season, <em>new rhythm.</em></h1><p class="lead">Everyday pieces with a little more intention.</p></div>@auth @can('manage-products')<a class="button" href="{{ route('products.create') }}">+ Add product</a>@endcan @endauth</section>
<div class="product-grid">@forelse ($products as $product)<a class="product-card" href="{{ route('products.show', $product) }}"><div class="product-image" @if($product->image_url) style="background-image:url('{{ $product->image_url }}')" @endif><span>{{ $product->category->name }}</span></div><div class="product-info"><div><h3>{{ $product->name }}</h3><p>{{ $product->color }} / {{ $product->size }}</p></div><strong>${{ number_format($product->price, 2) }}</strong></div></a>@empty<div class="empty"><h2>The rail is waiting.</h2><p>No products yet. An admin can add the first piece.</p></div>@endforelse</div>
{{ $products->links() }}
@endsection
