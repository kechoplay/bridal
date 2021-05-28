@extends('layout.app')
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-container">
            <div class="breadcrumbs-row">
                <div class="breadcrumbs-col">
                    <div class="breadcrumbs-content">
                        <a href="/">Home</a>
                        <span class="separator">/</span>
                        <span class="current">Sản phẩm đặc biệt</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sections">
        <div class="section-hero-image">
            <div class="section-hero-image-container">
                <div class="section-hero-image-row">
                    <div class="section-hero-image-col">
                        <div class="section-hero-image-content">
                            <div class="hero-image-lg">
                                <img width="1280" height="500" class="hero-img lzy" alt="" loading="lazy" sizes="(max-width: 1280px) 100vw, 1280px" data-src="https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-1280x500.jpg" data-srcset="https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway.jpg 1280w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-300x117.jpg 300w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-768x300.jpg 768w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-1024x400.jpg 1024w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-540x211.jpg 540w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-705x275.jpg 705w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-730x285.jpg 730w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-750x293.jpg 750w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-900x352.jpg 900w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-1080x422.jpg 1080w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-1120x438.jpg 1120w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-1170x457.jpg 1170w" />      </div>
                            <div class="hero-image-xs">
                                <img width="1280" height="500" class="hero-img lzy" alt="" loading="lazy" sizes="(max-width: 1280px) 100vw, 1280px" data-src="https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-1280x500.jpg" data-srcset="https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway.jpg 1280w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-300x117.jpg 300w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-768x300.jpg 768w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-1024x400.jpg 1024w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-540x211.jpg 540w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-705x275.jpg 705w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-730x285.jpg 730w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-750x293.jpg 750w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-900x352.jpg 900w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-1080x422.jpg 1080w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-1120x438.jpg 1120w, https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/uploads/2017/07/runway-1170x457.jpg 1170w" />      </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-runway-galleries">
            <div class="section-runway-galleries-container">
                <div class="section-runway-galleries-row">
                    <div class="section-runway-galleries-col">
                        <div class="section-runway-galleries-content">
                            <h2 class="gallery-heading tabs-heading">Mẫu Đặc Biệt</h2>
                            <div class="gallery-tabs">
                                <div class="tab-content runway-tab-content">
                                    <div class="tab-pane fade show active" id="gallery-f2020" role="tabpanel">
                                        <div class="runway-images-container">
                                            <div class="runway-images-row runway-gallery">
                                       @foreach($product as $item)
                                                <div class="runway-image">
                                                    <div class="runway-image-anchor" href="{{$item->img_path[0]}}" data-sub-html="#caption{{$item->id}}">
                                                        <img width="730" height="1094" class="attachment-730w size-730w lzy" alt="" loading="lazy" sizes="(max-width: 575.98px) 545px, (max-width: 991.98px) 255px, (max-width: 1199.98px) 305px, 365px" data-src="{{$item->img_path[0]}}" data-srcset="{{$item->img_path[0]}}" />                        <div class="overlay">
                                                            <div class="overlay-content">
                                                                <div class="overlay-container">
                                                                    <h3 class="runway-heading">{{$item->name}}</h3>
{{--                                                                    <div class="runway-subheading">{{$item->code}}</div>--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="runway-caption-wrap" id="caption{{$item->id}}" width="730" height="1094">
                                                        <div class="runway-caption" style="text-align: center">
                                                            <div class="runway-caption-container" >
                                                                <div class="runway-caption-content" style="margin-left: 5%" >
                                                                    <h3 class="caption-heading" >{{$item->name}}</h3>
{{--                                                                    <div class="caption-subheading" >Mã sản phẩm: {{$item->code}}</div>--}}
                                                                    <div class="runway-share">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
