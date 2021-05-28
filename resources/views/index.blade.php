@extends('layout.app')
@section('content')
    <div class="sections">
        <div class="section-slideshow slides">
            <div class="section-slideshow-container">
                <div class="section-slideshow-row">
                    <div class="section-slideshow-col">
                        <div class="section-slideshow-content">
                            <div class="slideshow-lg" data-duration="5" data-transition="swipe">
                                @foreach($slide as $item)
                                <div class="slideshow-slide">
                                    <a href="/new-product/" class="cover">
                                        <img src="{{$item->img_path}}" alt="" class="cover-img">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <div class="slideshow-xs" data-duration="5" data-transition="swipe">
                                @foreach($slide as $item)
                                <div class="slideshow-slide">
                                    <div href="/new-product/" class="cover">
                                        <img src="{{$item->img_path}}" alt="" class="cover-img">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-text">
            <div class="section-text-container">
                <div class="section-text-row">
                    <div class="section-text-col">
                        <div class="section-text-content">
                            <h2 style="text-align: center;">Câu Chuyện</h2>
                            <p style="text-align: center;">Inspired by the Greek Goddess of Light, the THEIA collection was created to bring out women’s inner light and beauty. THEIA possessed the magical power to create light, and as the mother of the sun, the moon, and the dawn, her children illuminate the world in which we live today.</p>
                            <p style="text-align: center;">The bridal collection embodies the spirit of THEIA in all aspects; luminous, radiant and ethereal designs that combine sophisticated and elegant styling using fluid silks, soft Spanish tulles, luxurious crepes, Chantilly and Guipure laces and of course THEIA’s signature exquisite beading and embroideries. Each piece is meticulously stitched together to create heirloom gowns that fit beautifully and flow around the body. The THEIA Collection caters to a nontraditional bride looking for an exquisite gown as individual and unique as she is.</p>
                            <p style="text-align: center;">With a sprinkle of magic from THEIA, our brides inner light shines brightly for all to see, amplified with pure love, a beautiful breathtaking bride, radiating total happiness on her wedding day.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-image-links">
            <div class="section-image-links-container">
                <div class="section-image-links-row right">
                    <div class="section-image-links-col">
                        <div class="section-image-links-content">
                            @foreach($category as $item)
                            <div class="image-link">
                                <a href="/{{@$item->name}}/" class="image-link-anchor">
                                    <img width="1440" height="1900" class="attachment-1440w size-1440w lzy" alt=""
                                         loading="lazy" sizes="(max-width: 575.98px) 100vw, (max-width: 767.98px) 370px, (max-width: 991.98px) 480px, (max-width: 1199.98px) 585px, 50vw"
                                         data-src="{{$item->img_category}}" data-srcset="" /> <div class="overlay">
                                        <div class="overlay-content">
                                            <div class="overlay-container">
                                                <h3 class="image-link-heading">{{@$item->name}}</h3>
                                                <div class="image-link-subheading">Xem Bộ Sản Phẩm</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-text">
            <div class="section-text-container">
                <div class="section-text-row">
                    <div class="section-text-col">
                        <div class="section-text-content">
                            <h2 style="text-align: center;">Sản Phẩm Mới</h2>
                            <p style="text-align: center;"> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-weddings">
            <div class="section-weddings-container">
                <div class="section-weddings-row">
                    <div class="section-weddings-col">
                        <div class="section-weddings-content">
                            @foreach($product as $item)
                            <div class="wedding-link">
                                <a href="/new-product/{{$item->id}}" class="wedding-link-anchor">
                                    <img width="1120" height="748" class="attachment-1120w size-1120w lzy" alt="" loading="lazy" sizes="(max-width: 575.98px) 550px, (max-width: 767.98px) 250px, (max-width: 991.98px) 325px, (max-width: 1199.98px) 400px, 33.33vw" data-src="{{ $item->img_path }}" data-srcset="" />              <div class="overlay">
                                        <div class="overlay-content">
                                            <div class="overlay-container">
                                                <h3 class="wedding-link-heading">{{ $item->name }}</h3>
                                                <div class="wedding-link-subheading">Xem sản phẩm</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
