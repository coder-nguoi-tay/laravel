@extends('layout.layout-client.layout-client')
@section('content-titel', 'Sản Phẩm')
@section('content')
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">
                        <div class="widget catagory mb-50">
                            <h6 class="widget-title mb-30">Danh mục</h6>
                            <div class="catagories-menu">
                                <ul class="sub-menu collapse show" id="clothing">
                                    @foreach ($danhmuc as $item)
                                        <li><a href="{{ route('fill_danhmuc', $item->id) }}">{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget price mb-50">
                            <h6 class="widget-title mb-30">Lọc Theo Giá</h6>
                            <p class="widget-title2 mb-30">Tiền</p>
                            <div class="widget-desc">
                                <div class="slider-range">
                                    <div data-min="49" data-max="360" data-unit="$"
                                        class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                        data-value-min="49" data-value-max="360" data-label-result="Range:">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range-price">Range: $49.00 - $360.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="widget color mb-50">
                            <p class="widget-title2 mb-30">kích thước</p>

                            @foreach ($kichthuoc as $item)
                                <a href="{{ route('kichthuoc', $item->id) }}"><button
                                        class="btn btn-wraning">{{ $item->name }}</button></a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <div class="total-products">

                                        @if ($id == null)
                                            <p><span>{{ count($product) }}</span> Sản phẩm</p>
                                        @elseif($id == 2)
                                            <p><span>{{ count($fill_danhmuc) }}</span> Sản phẩm</p>
                                        @elseif ($j == 1)
                                            <p><span>{{ count($fill_kichthuoc) }}</span> Sản phẩm</p>
                                        @endif

                                    </div>
                                    <div class="product-sorting d-flex">
                                        <p>Sắp xếp</p>
                                        <form action="#" method="get">
                                            <select name="select" id="sortByselect">
                                                <option value="value">Highest Rated</option>
                                                <option value="value">Newest</option>
                                                <option value="value">Price: $$ - $</option>
                                                <option value="value">Price: $ - $$</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @if ($id == 2)
                                @foreach ($fill_danhmuc as $item)
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <div class="single-product-wrapper">
                                            <form action="{{ route('giohang_create', $item) }}" method="POST">
                                                @csrf
                                                <div class="product-img">
                                                    <img src="{{ asset($item->avatar_product) }}" alt=""
                                                        style="height: 250px;width: 250px;">

                                                    <div class="product-favourite">
                                                        <a href="#" class="favme fa fa-heart"></a>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="so_luong" value="1">
                                                <div class="product-description" style="text-align: center">
                                                    <span>{{$item->danhmuc->name}}</span>
                                                    <a href="{{ route('sanpham_detail', $item->id) }}">
                                                        <h6>{{ $item->name }}</h6>
                                                    </a>
                                                    @if ($item->khuyen_mai != null)
                                                        <p class="product-price"><span class="old-price">
                                                                {{ number_format($item->don_gia, 0, ',', '.') }}đ</span>
                                                            {{ number_format($item->khuyen_mai, 0, ',', '.') }}đ</p>
                                                    @else
                                                        <p class="product-price">
                                                            {{ number_format($item->don_gia, 0, ',', '.') }}đ</p>
                                                    @endif


                                                    <div class="hover-content">
                                                        <div class="add-to-cart-btn">
                                                            <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @elseif($id == null)
                                @foreach ($product as $item)
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <div class="single-product-wrapper">
                                            <form action="{{ route('giohang_create', $item) }}" method="post">
                                                @csrf
                                                <div class="product-img">
                                                    <img src="{{ asset($item->avatar_product) }}" alt=""
                                                        style="height: 250px;width: 250px;">

                                                    <div class="product-favourite">
                                                        <a href="#" class="favme fa fa-heart"></a>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="so_luong" value="1">
                                                <div class="product-description" style="text-align: center">
                                                    <span>{{$item->danhmuc->name}}</span>
                                                    <a href="{{ route('sanpham_detail', $item->id) }}">
                                                        <h6>{{ $item->name }}</h6>
                                                    </a>
                                                    @if ($item->khuyen_mai != null)
                                                        <p class="product-price"><span class="old-price">
                                                                {{ number_format($item->don_gia, 0, ',', '.') }}đ</span>
                                                            {{ number_format($item->khuyen_mai, 0, ',', '.') }}đ</p>
                                                    @else
                                                        <p class="product-price">
                                                            {{ number_format($item->don_gia, 0, ',', '.') }}đ</p>
                                                    @endif


                                                    <div class="hover-content">
                                                        <div class="add-to-cart-btn" style="text-align: center">
                                                            <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @elseif($j == 1)
                                @foreach ($fill_kichthuoc as $item)
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <div class="single-product-wrapper">
                                            <form action="{{ route('giohang_create', $item) }}" method="post">
                                                @csrf
                                                <div class="product-img">
                                                    <img src="{{ asset($item->avatar_product) }}" alt=""
                                                        style="height: 250px;width: 250px;">

                                                    <div class="product-favourite">
                                                        <a href="#" class="favme fa fa-heart"></a>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="so_luong" value="1">
                                                <div class="product-description" style="text-align: center">
                                                    <span>{{$item->danhmuc->name}}</span>
                                                    <a href="{{ route('sanpham_detail', $item->id) }}">
                                                        <h6>{{ $item->name }}</h6>
                                                    </a>
                                                    @if ($item->khuyen_mai != null)
                                                        <p class="product-price"><span class="old-price">
                                                                {{ number_format($item->don_gia, 0, ',', '.') }}đ</span>
                                                            {{ number_format($item->khuyen_mai, 0, ',', '.') }}đ</p>
                                                    @else
                                                        <p class="product-price">
                                                            {{ number_format($item->don_gia, 0, ',', '.') }}đ</p>
                                                    @endif

                                                    <div class="hover-content">
                                                        <!-- Add to Cart -->
                                                        <div class="add-to-cart-btn">
                                                            <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <nav aria-label="navigation">
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection