<div class="sidebar-widget product-tag wow fadeInUp">
  <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="tag-list"> 

        @php
          $tags = App\Models\Product::groupBy('tags')->select('tags')->get();
        @endphp

        @foreach ($tags as $tags)
          <a class="item active" title="Phone" href="{{ route('product.tags', $tags->tags) }}">
            {{ $tags->tags }}
          </a>
        @endforeach 

    </div>
  </div>
</div>