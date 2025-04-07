
@if(!empty($list)) 

{{-- {!! $list->content !!} --}}
{!! Purifier::clean($list->content) !!}
@elseif(!empty($pdf))
{!! Purifier::clean($pdf) !!}
@endif

