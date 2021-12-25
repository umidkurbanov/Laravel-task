@extends('layouts.layout')

@section('content')

<div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">JSON DATA</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Data &nbsp;
                                <button type="button" class="btn btn-success waves-effect waves-light" onclick="load();">
                                    Load Data via AJAX & JSON
                                </button>
                            </h4>

                            <div class="table-responsive" id="div-data">
                                <ul id="tree1">
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function load()
        {
            event.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{ route('load-ajax') }}",
                dataType: "json",
                beforeSend: function() 
                {
                    start_loader("tree1");
                },
                success: function (response)
                {
                    $.each(response.data, function (key, item)
                    {
                        var text = "<li>";
                        text += item.title;

                            text += "<ul>";
                            for (const brand of item.brands)
                            {
                                text += "<li>";
                                    text += brand.title;
                                    
                                    text += "<ul>";
                                        for (const product of item.products)
                                        {
                                            if (product.brand_id == brand.id)
                                            {
                                                var bg = "";
                                                if (product.is_rgb)
                                                    bg = "<div style='float:left; width: 15px; height: 15px; background-color: rgba(" + product.background + ")'></div>&nbsp;";
                                                else
                                                    bg = "<img width='20' src='public/images/products/"+ product.background + "'>&nbsp;";
                                                text += "<li>";
                                                    text += bg + product.title;
                                                text += "</li>";
                                            }
                                        }
                                    text += "</ul>";

                                text += "</li>";
                            }
                            text += "</ul>";

                        text += "</li>";

                        $("#tree1").append(text);
                    });

                    console.log(response.data);
                },
                error: function(data){
                    console.log(data);
                },
                complete: function() 
                {
                    stop_loader("tree1");
                }
            });
        }



        function start_loader(element_id)
            {
                $("#" + element_id).html("");
                $("#" + element_id).html("<div class='loader'></div> <p class='text-muted loader-text' style='padding-top: 10px; margin-top: 6px !important;'>Pleas, wait. Data is being loaded...</p>");
            }

            function stop_loader(element_id)
            {
                var element = document.querySelector('#' + element_id);
                var loader = element.querySelector('.loader');
                var loader_text = element.querySelector('.loader-text');

                loader.style.display = 'none';
                loader_text.style.display = 'none';
            }

            $.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        /* initialize each of the top levels */
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this);
            branch.prepend("");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        /* fire event from the dynamically added icon */
        tree.find('.branch .indicator').each(function(){
            $(this).on('click', function () {
                $(this).closest('li').click();
            });
        });
        /* fire event to open branch if the li contains an anchor instead of text */
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        /* fire event to open branch if the li contains a button instead of text */
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});
/* Initialization of treeviews */
$('#tree1').treed();
    </script>
@endsection

