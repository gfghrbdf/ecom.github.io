@php

$tag_eng = App\Models\Product::groupBy('product_tags_eng')->select('product_tags_eng')->get();

$tag_hin = App\Models\Product::groupBy('product_tags_hin')->select('product_tags_hin')->get();



@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
          <h3 class="section-title">Product tags</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="tag-list">

            @foreach($tag_eng as $data) 





              
              <a class="item" title="Phone" href="{{url('product/tag/'.$data->product_tags_eng)}}">{{str_replace('.',' ',$data->product_tags_eng)}}</a>

              @endforeach


               </div>
            <!-- /.tag-list --> 
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>