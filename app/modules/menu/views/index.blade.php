@extends('layouts.back')

@section('section-top')
  <div class="navbar-left">
      <h1 class="page-title">
          <span>Navigations</span>
      </h1>
  </div>
@stop
@section('content')
<!-- Main Content -->

<div class="section section--top">
    <div class="section-left">
        <ul class="action-list">
            <li>
                <a href="{{ URL::to('admin/menu?menu=0') }}" class="btn btn-success">
                    <span>Create new menu</span>
                </a>
            </li>
        </ul>
    </div>
</div>

    {{ Site::system_messages() }}
    

        
  

    <div class="section section--box">
      {{ Form::open(array('method' => 'get')) }}

        <div class="clearfix mb-15px">
            <div class="pull-left">
                <div class="selectpicker-full selectpicker-full--2nd">
                    {{ Form::select('menu', $menus ,Input::get('menu'), array('class' => 'selectpicker')) }}
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
                 {{ Form::hidden('term_taxonomy_id', $item['menu']) }}
                <div class="panel">
                    
                    <div class="panel__heading panel__heading--omega">
                        <div class="row">
                            <div class="col-lg-5 col-sm-6">
                                <div class="selectpicker-full p-7px">
                                    {{ Form::text('term_name', $item['menu_text'], array('class' => 'form-control', 'placeholder' => 'Enter menu name here')) }}
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="pull-right">
                                    <ul class="list-inline list-pretty--2nd">
                                        <li>
                                            {{ Form::button('<i class="fa fa-edit mr-5px"></i><span>Save</span>', array('type' => 'submit', 'class' => 'btn btn-default')) }}
                                        </li>
                                        <li>
                                            <a onclick="return confirm('Continue delete?');" href="{{ URL::to('admin/menu?action=delete&menu='.$item['menu'].'&_token='.csrf_token()) }}">
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
                                
                                {{ Site::multi_level_navigation(0, $item['menu']) }}
                                
                            </div>

                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
            <div class="col-lg-4 col-md-12">
                {{ Form::open() }}
                {{ Form::hidden('menu', $item['menu']) }}
                {{ Form::hidden('action', 'add-to-menu') }}
                  <div class="panel-group" id="accordion">
                    <?php $index = 1 ?>
                    @foreach($posts as $post_type => $arr) 
                    <div class="panel panel-default">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $post_type }}" class="panel-heading">
                       <span class="panel-title">{{ ucwords(str_replace('-', ' ', $post_type)) }}</span>
                      </a>
                      <div id="collapse-{{ $post_type }}" class="panel-collapse collapse">
                        <div class="panel-body panel-body-unoffset">
                            <ul class="list-group list-group--ugly list-group--small list-group--scroll">
                              @foreach($arr as $id => $post_title)
                              <li class="list-group-item">
                                  <label>
                                     {{ Form::checkbox('menu-item[-'.$index.'][_menu_item_object_id]', $id) }}{{ $post_title }}
                                     {{ Form::hidden('menu-item[-'.$index.'][_menu_item_object]', $post_type) }}
                                     {{ Form::hidden('menu-item[-'.$index.'][_menu_item_type]', 'post') }}                                     
                                  </label>
                              </li>
                               <?php $index++ ?>
                              @endforeach
                            </ul>
                            <div class="panel-button stroke-top pt-10px">
                              {{ Form::submit('Add to Menu', array('class' => 'btn btn-default add-to-menu' )) }}
                            </div>
                        </div>
                      </div>
                    </div>

                    @endforeach
                    
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-customlinks" class="panel-heading">
                           <span class="panel-title">Custom Links</span>
                        </a>
                      <div id="collapse-customlinks" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row stroke-bottom block--spread">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('_menu_item_url', 'URL') }}
                                        <div class="numbers-row">
                                            {{ Form::text('menu-item[-'.$index.'][_menu_item_url]', 'http://', array(
                                            'class'     => 'form-control form-pretty',
                                            )) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('post_title', 'Link Text') }}
                                        <div class="numbers-row">
                                            {{ Form::text('menu-item[-'.$index.'][_menu_item_title]', Input::get('post_title'), array(
                                            'class'     => 'form-control form-pretty',
                                            )) }}
                                            {{ Form::hidden('menu-item[-'.$index.'][_menu_item_object]', 'custom') }}
                                            {{ Form::hidden('menu-item[-'.$index.'][_menu_item_type]', 'custom') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                             {{ Form::submit('Add to Menu', array('class' => 'btn btn-default add-to-menu' )) }}
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

                $('#menu-item-parent-'+current).val(parent);
                $('#menu-item-order-'+current).val(i);

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
        group: 1
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

    $('#nestable-menu').on('click', function(e)
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


});

</script>

<script>
    $(window).load(function(){
        //gy.jsMenuItem.init();
    });
</script>
@stop