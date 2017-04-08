@extends('app')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="">{{ trans('custom.home') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="/products">{{ trans('products.titles.index') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>{{ trans('products.titles.new') }}</span>
        </li>
    </ul>
</div>

<h3 class="page-title">
    {{ trans('products.titles.new') }}
</h3>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"></div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <form action="/products/store" method="post" id="form_products" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("products.fields.rfc") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="rfc" value="{{old("rfc")}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("products.fields.name") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="name" value="{{old("name")}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("products.fields.quantity") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="quantity" value="{{old("quantity")}}" class="form-control" id="quantity"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("products.fields.price") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="price" value="{{old("price")}}" class="form-control" id="price"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("products.fields.total") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="total" value="{{old("total")}}" class="form-control" id="total"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                <a href="/products" class="btn default">{{ trans('products.buttons.cancel') }}</a>
                            </label>
                            <div class="col-md-4">
                                <button type="submit" class="btn green">Create</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

 $(document).ready(function() {
    $("#quantity").on("focusout", function(){
      var quantity = $("#quantity").val();
      var price = $("#price").val();
      var total = 0.00

      total = parseFloat(quantity)*parseFloat(price);

      if(isNaN(total)){
        $("#total").val(0.00);
      }else{
        $("#total").val(total);
      }
    });
    $("#price").on("focusout", function(){
      var quantity = $("#quantity").val();
      var price = $("#price").val();
      var total = 0.00

      total = parseFloat(quantity)*parseFloat(price);

      if(isNaN(total)){
        $("#total").val(0.00);
      }else{
        $("#total").val(total);
      }
    });

  });
</script>
@stop

@section('javascript_page')
<script>
    jQuery(document).ready(function($) {

      alert("sssssssssss");
        var app = new Admin();

        var rules = {
            rfc: {
                required: true,
                maxlength: 13,
                minlength: 12
            },
            name: {
                required: true
            },
            quantity: {
                required: true
            },
            price: {
                required: true
            },
            total: {
                required: true
            }
        };

        var messages = {
            rfc: {
                required: "<?php echo trans("products.validations.required") ?>",
                maxlength: "<?php echo trans("products.validations.maxlength") ?>",
                minlength: "<?php echo trans("products.validations.minlength") ?>"
            },
            name: {
                required: "<?php echo trans("products.validations.required") ?>"
            },
            quantity: {
                required: "<?php echo trans("products.validations.required") ?>"
            },
            price: {
                required: "<?php echo trans("products.validations.required") ?>"
            },
            total: {
                required: "<?php echo trans("products.validations.required") ?>"
            }
        };

        app.formValidate('#form_products', rules, messages);

        $("#quantity").on("focusout", function(){
          alert("ssss");

        });

    });
</script>
@stop