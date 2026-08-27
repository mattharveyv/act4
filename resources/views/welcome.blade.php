@extends('layouts.app')
@section('content')
<section class="hero"><div class="hero-copy"><p class="eyebrow">StyleHub / 2026 collection</p><h1>Wear the<br><em>everyday</em> well.</h1><p class="hero-lead">Considered clothing for the pace of real life. Easy layers, honest materials, and a point of view.</p><a class="button" href="{{ route('products.index') }}">Explore the collection <span>-></span></a></div><div class="hero-art"><div class="hero-sticker">Made for<br>the in-between.</div><div class="hero-shape"></div></div></section>
<section class="feature-strip"><div><span class="metric">01</span><strong>Quiet confidence</strong><p>Pieces that speak softly and last longer.</p></div><div><span class="metric">02</span><strong>Good by design</strong><p>Useful details, thoughtful silhouettes.</p></div><div><span class="metric">03</span><strong>Find your fit</strong><p>Browse the edit and make it yours.</p></div></section>
@endsection
