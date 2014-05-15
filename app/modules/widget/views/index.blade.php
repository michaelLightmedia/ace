@extends('layouts.back')

@section('section-top')
  <h1 class="page-title">
      <span>Widgets</span>
  </h1>
@stop

@section('content')

    <div class="section section--top">
        <div class="section-left">
            <ul class="action-list">
                <li>
                    <a href="{{ URL::to('admin/widget?widget=0') }}" class="btn btn-success">
                        <span>Create new widget</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    {{ Site::system_messages() }}
    

        
  

    <div class="section section--box mt-58px">

        {{ Form::open(array('method' => 'get')) }}

       
        <div class="clearfix mb-15px">
            <div class="pull-left">
                <div class="selectpicker-full selectpicker-full--2nd">
                    {{ Form::select('widget', $widgets ,Input::get('widget'), array('class' => 'selectpicker')) }}
                </div>
            </div>
            <div class="pull-left">
                {{ Form::button('<i class="fa fa-edit mr-5px"></i><span>Select</span>', array('type' => 'submit', 'class' => 'btn btn-default')) }}
            </div>

        </div>

        {{ Form::close() }}

        <div class="row">
            <div class="col-lg-8 col-md-12">
                 {{ Form::open() }}
                 {{ Form::hidden('action', 'update') }}
                 {{ Form::hidden('term_taxonomy_id', $item['widget']) }}
                <div class="panel">
                    
                    <div class="panel__heading panel__heading--omega">
                        <div class="row">
                            <div class="col-lg-5 col-sm-6">
                                <div class="selectpicker-full p-7px">
                                    {{ Form::text('term_name', $item['widget_text'], array('class' => 'form-control', 'placeholder' => 'Enter widget name here')) }}
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="pull-right">
                                    <ul class="list-inline list-pretty--2nd">
                                        <li>
                                            {{ Form::button('<i class="fa fa-edit mr-5px"></i><span>Save</span>', array('type' => 'submit', 'class' => 'btn btn-default')) }}
                                        </li>
                                        <li>
                                            <a onclick="return confirm('Continue delete?');" href="{{ URL::to('admin/widget?action=delete&widget='.$item['widget'].'&_token='.csrf_token()) }}">
                                                <i class="fa fa-minus mr-5px"></i>
                                                <span>Delete</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel__content">
                        <div class="cf nestable-lists">

                            <div class="dd" id="nestable">
                                {{ Site::widgets(0, $item['widget']) }}
                                
                            </div>

                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
            <div class="col-lg-4 col-md-12">
                {{ Form::open() }}
                {{ Form::hidden('widget', $item['widget']) }}
                {{ Form::hidden('action', 'add-to-widget') }}
                  <div class="panel-group" id="accordion">
                    
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-customlinks" class="panel-heading">
                           <span class="panel-title">HTML Widget</span>
                        </a>
                      <div id="collapse-customlinks" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row stroke-bottom block--spread">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('post_title', 'Title') }}
                                        <div class="numbers-row">
                                            {{ Form::text('widget-item[-1][_widget_item_title]', Input::get('post_title'), array(
                                            'class'     => 'form-control form-pretty',
                                            )) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('post_title', 'Body') }}
                                        <div class="numbers-row">
                                            {{ Form::textarea('widget-item[-1][_widget_item_description]', Input::get('post_excerpt'), array(
                                            'class'     => 'form-control form-pretty',
                                            'cols'      => 5,
                                            'rows'      => 10,
                                            )) }}
                                            {{ Form::hidden('widget-item[-1][_widget_item_object]', 'custom') }}
                                            {{ Form::hidden('widget-item[-1][_widget_item_type]', 'custom') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                             {{ Form::submit('Add to Widget', array('class' => 'btn btn-default add-to-widget' )) }}
                        </div>
                      </div>
                    </div>
                  </div>
                  {{ Form::close() }}
            </div>
        </div>
    </div>

<!-- Main Footer -->


<script src="{{ URL::to('assets/admin/js/plugins/jquery.nestable.js') }}"></script>

<script>

$(document).ready(function()
{   
    function build_multi_level_nav(item, parent)
    {
        

        if(typeof item != undefined)
        {
            for(var i = 0; i < item.length; i++)
            {
                var current     = item[i]['id'];
                var children    = item[i]['children'];

                $('#widget-item-parent-'+current).val(parent);
                $('#widget-item-order-'+current).val(i);

                if( typeof children == 'object' )
                {
                    build_multi_level_nav(children, current);
                }
            }
        }
    }


    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
            var item = list.nestable('serialize');
            build_multi_level_nav(item, 0);
            
           // console.log(item.length);
        if (window.JSON) {

            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1,
        maxDepth:1
    })
    .on('change', updateOutput);
    
    // activate Nestable for list 2
    // $('#nestable2').nestable({
    //     group: 1
    // })
    //.on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));
    //updateOutput($('#nestable2').data('output', $('#nestable2-output')));

    $('#nestable-widget').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    //$('#nestable3').nestable();


});

</script>

<script>
    $(window).load(function(){
        //gy.jsMenuItem.init();
    });
</script>
@stop