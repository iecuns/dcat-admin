<div class="hidden">
    <div class="right-side-filter-container" style="{!! $style !!}"  id="{{ $filterID }}">
        <form action="{!! $action !!}" class="form-horizontal" pjax-container method="get">
            <div class="mb-1" style="height: 55px">
                <div class="p-1 position-fixed d-flex justify-content-between header">
                    <div>
                        <button type="submit" class=" btn btn-sm btn-primary submit">
                            <i class="feather icon-search"></i> &nbsp;{{ __('admin.search') }}
                        </button>&nbsp;
                        @if(!$disableResetButton)
                            <a href="{!! $action !!}" class="reset btn btn-sm btn-white">
                                <i class="feather icon-rotate-ccw"></i> &nbsp;{{ __('admin.reset') }}
                            </a>
                        @endif
                    </div>

                    <a href="#" class="close-slider customizer-close" style="top: 12px;right: 10px;">
                        <i class="feather icon-x"></i>
                    </a>
                </div>
            </div>

            @foreach($layout->columns() as $column)
                @foreach($column->filters() as $filter)
                    {!! $filter->render() !!}
                @endforeach
            @endforeach
        </form>
    </div>
</div><?php
