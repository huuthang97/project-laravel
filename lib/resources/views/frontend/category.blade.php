@extends('frontend.master')
@section('title','Danh mục')
@section('main')
<link rel="stylesheet" href="css/category.css">
<div id="wrap-inner">
	<div class="products">
		<h3>{{ $category->cate_name }}</h3>
		<div class="product-list row">
			@foreach ($products as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="#"><img src="{{ asset('lib/storage/app/avatar/'.$item->prod_img) }}" class="img-thumbnail"></a>
				<p><a href="#">{{ $item->prod_name }}</a></p>
				<p class="price">{{ number_format($item->prod_price) }} VND</p>	  
				<div class="marsk">
					<a href="{{ asset('detail/'.$item->id.'/'.$item->prod_slug.'.html') }}">Xem chi tiết</a>
				</div>                                    
			</div>
			@endforeach
		</div>                	                	
	</div>

	<div id="pagination">
		{{ $products->links() }}
	</div>
</div>
<!-- end main -->
@stop