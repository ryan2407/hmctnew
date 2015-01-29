@extends('layouts.main')

@section('content')

    <div class="container admin">
        <h1>Create a product</h1>

        {{ Form::open(['method' => 'POST', 'url' => 'products']) }}

            <div>
                {{ Form::label('product_name', 'Product Name' ) }}
                {{ Form::text('product_name') }}
            </div>

            <div>
                {{ Form::label('excerpt', 'Product Excerpt') }}
                {{ Form::textarea('excerpt', null, ['cols' => '20', 'id' => 'excerpt']) }}
            </div>

            <div>
                {{ Form::label('product_description', 'Product Description' ) }}
                {{ Form::textarea('product_description', '', ['cols' => '20', 'id' => 'editor']) }}
            </div>

            <div>
                {{ Form::label('product_cost', 'Product Cost Per Night' ) }}
                {{ Form::text('product_cost') }}
            </div>

            <div>
                {{ Form::label('category', 'Select a category' ) }}
                {{ Form::select('category', ['campers' => 'Campers', 'addons' => 'Add ons']) }}
            </div>

                <div id="uploader" class="btn btn-success">
                    <div class="js-browse">
                        <span class="btn-txt">Browse</span>
                        <input type="file" name="filedata">
                    </div>
                    <div class="js-files">
                        <div class="js-file-tpl" data-id="<%=uid%>">
                            <div class="file-preview"></div>
                            <div data-fileapi="file.remove" class="btn btn-sm btn-danger">Remove file</div>
                            <p><%-name%></p>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="js-upload" style="display: none">
                        <div class="progress" style="margin-bottom:0;">
                            <div class="js-progress progress-bar progress-bar-info"></div>
                        </div>
                        <span class="btn-txt">Uploading (<span class="js-size"></span>)</span>
                    </div>
                </div>

            {{ Form::submit('Create product') }}

        {{ Form::close() }}
     </div>
</div>

@endsection
