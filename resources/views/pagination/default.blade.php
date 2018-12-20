@if($paginator->hasPages())
<div class="text-center">
   <div class="pagination pagination-minimal">
       <ul>
           @if($paginator->onFirstPage())
               <li class="previous disabled"><span><i class="ion-chevron-left"></i></span></li>
           @else
               <li class="previous "><a href="{{$paginator->previousPageUrl()}}" rel="prev"><i class="ion-chevron-left"></i></a></li>
           @endif

           @foreach($elements as $element )
              @if(is_string($element))
                  <li class="disabled"><span>{{ $element }}</span></li>
              @endif

              @if(is_array($element))
                  @foreach($element as $page=>$url)
                      @if($paginator->currentPage())
                          <li class="active"><span>{{$page}}</span></li>
                      @else
                          <li><a href="{{$url}}">{{$page}}</a></li>
                      @endif
                   @endforeach
              @endif
           @endforeach

           @if($paginator->hasMorePages())
                   <li class="next "><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="ion-chevron-right"></i></a></li>
           @else
                   <li class="next disabled"><span><i class="ion-chevron-right"></i></span></li>
           @endif
       </ul>
   </div>
</div>
@endif