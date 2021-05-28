@extends('layout.app')
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-container">
            <div class="breadcrumbs-row">
                <div class="breadcrumbs-col">
                    <div class="breadcrumbs-content">
                        <a href="https://bridal.theiacouture.com/">Trang chủ</a>
                        <span class="separator">/</span>
                        <span class="current">
                            @if(@$nameSlug == 'bridal-product')
                             Bộ Váy Cưới
                             @endif
                             @if(@$nameSlug == 'new-product')
                              Sản phẩm mới
                             @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-posts">
        <div class="blog-posts-container">
            <div class="blog-posts-posts">
                @foreach($product as $item)
                <article class="post-7300 bridal type-bridal status-publish hentry color-silver">
                    <a href="/{{@$nameSlug}}/details/{{@$item->slug}}/{{@$item->id}}" class="entry-image-anchor entry-image-anchor-color">
                        <img width="540" height="810" class="attachment-540w size-540w lzy" alt="" loading="lazy" sizes="(max-width: 575.98px) 265px, (max-width: 1199.98px) 225px, 300px" data-src="{{ @$item->img_path[0] }}" data-srcset="{{ @$item->img_path[0] }}" />                                      <img width="540" height="810" class="attachment-540w size-540w lzy" alt="" loading="lazy" sizes="(max-width: 575.98px) 265px, (max-width: 1199.98px) 225px, 300px" data-src="{{@$item->img_path[1]}}" />                              </a>
                    <h2 class="entry-title-heading"><a href="/{{@$nameSlug}}/details/{{@$item->slug}}/{{@$item->id}}">{{@$item->name}}</a></h2>
{{--                    <div class="entry-style"><a href="/hot-product/details/{{@$item->slug}}/{{@$item->id}}">Style #890709</a></div>--}}
                </article>
                @endforeach
            </div>
        </div>
    </div>
@endsection
