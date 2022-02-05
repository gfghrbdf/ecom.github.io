        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">

             @php 

             $categorys = App\Models\Category::orderBy('category_name_eng','ASC')->get();

             @endphp


      @foreach($categorys as $category)


      


              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>

                 @if(Session()->get('language') == 'hindi')

     {{$category->category_name_hin}}

    @else

     {{$category->category_name_eng}}

    @endif

               </a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">

                 @php 

              $subCategorys = App\Models\subcategory::orderBy('sub_category_eng','ASC')->get()->where('category_id',$category->id);



              @endphp

              @foreach($subCategorys as  $subCategory)


              



                      <div class="col-sm-12 col-md-3">

                  <a href="{{url('subcategory/product').'/'.$subCategory->sub_category_eng_slug.'/'.$subCategory->id}}">
                   

                <h2 class="title">


                    @if(Session()->get('language') == 'hindi')

             {{$subCategory->sub_category_hin}}

            @else

             {{$subCategory->sub_category_eng}}

            @endif
                          


             </h2>

                  </a>


                @php 

              $subsubCategorys = App\Models\subsubcategory::orderBy('subsubcategory_eng','ASC')->get()->where('subcategory_id',$subCategory->id);



              @endphp


              @foreach($subsubCategorys as $subsubCategory)

              <ul class="links list-unstyled">
                          <li><a href="{{url('subsubcategory/product').'/'.$subsubCategory->subsubcategory_slug_eng.'/'.$subsubCategory->id}}">

                 @if(Session()->get('language') == 'hindi')

             {{$subsubCategory->subsubcategory_hin}}

            @else

              {{$subsubCategory->subsubcategory_eng}}

            @endif



                           


                          </a></li>
                          
                        </ul>


              @endforeach


                        
                      </div>

                      @endforeach
                      <!-- /.col -->
                     
                      <!-- /.col -->
                     
                      <!-- /.col -->
                      
                      <!-- /.col --> 
                    </div>
                    <!-- /.row --> 
                  </li>

                  

                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->

              @endforeach
              
              
              
             
              
            
              
             
              
             
              
             
             
              
              
             
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>