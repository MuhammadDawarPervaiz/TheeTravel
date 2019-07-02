@extends('layouts.admin')

@section("page-level-style")
<script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=v4bs0b54utk23j924z647170peonefh69rgcfks7pssm9uda'></script>
<script>
  tinymce.init({
    selector: '.text-editor',  // change this value according to your HTML
    plugins : 'advlist autolink link lists charmap print preview code textcolor',
    relative_urls : 0,
    remove_script_host : 0,
    toolbar: 'undo redo | forecolor backcolor | fontselect fontsizeselect | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | link code | bullist numlist outdent indent blockquote'
  });
</script>
@endsection

@section("tab-content")
<div id="manageNews" class="tab-pane fade in active">
    <h2 class="text-center">Blog Section</h2>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h5 class="skin-color">Add Blog Post</h5>
            <form action="
                @if($update_data['blog']['id'])
                    addBlogPost/{{ $update_data['blog']['id'] }}
                @else
                    {{ route('admin.addBlogPost') }}
                @endif"
                method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="image">Blog Image (multiple)</label>
                        <input type="file" name="blog_image[]" class="input-text full-width" multiple @if(!$update_data['blog']['id']) required @endif>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="news">Blog Post</label>
                        <textarea class="form-control text-editor" rows="5" name="blog_post">@if($update_data['blog']['blog_post']){{ $update_data['blog']['blog_post'] }}@endif</textarea required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="link">Link to landing page</label>
                        <input type="url" name="blog_link" class="input-text full-width" placeholder="e.g. https://theetravel.com" value="{{ $update_data['blog']['blog_link'] }}" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="page_title">Page Title</label>
                        <input type="text" name="page_title" class="input-text full-width" placeholder="Type here..." value="{{ $update_data['blog']['page_title'] }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="header_keywords">Header Keywords</label>
                        <textarea name="header_keywords" rows="3" class="input-text full-width text-editor" placeholder="Type here..." >@if($update_data['blog']['header_keywords']){{ $update_data['blog']['header_keywords'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="body_keywords">Body Keywords</label>
                        <textarea name="body_keywords" rows="3" class="input-text full-width text-editor" placeholder="Type here...">@if($update_data['blog']['body_keywords']){{ $update_data['blog']['body_keywords'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="body_content">Body Content</label>
                        <textarea name="body_content" rows="3" class="input-text full-width text-editor" placeholder="Type here...">@if($update_data['blog']['body_content']){{ $update_data['blog']['body_content'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="meta_title">Meta Title</label>
                        <textarea name="meta_title" rows="3" class="input-text full-width" placeholder="Type here...">@if($update_data['blog']['meta_title']){{ $update_data['blog']['meta_title'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="input-text full-width" placeholder="Type here...">@if($update_data['blog']['meta_description']){{ $update_data['blog']['meta_description'] }}@endif</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="input-text full-width" placeholder="Type here...">@if($update_data['blog']['meta_keywords']){{ $update_data['blog']['meta_keywords'] }}@endif</textarea>
                    </div>
                </div>
                <div class="form-group">
                    @if(!$update_data['blog']['id'])
                        <button class="btn-block">ADD</button>
                    @else
                        <button class="btn-medium btn-danger">Update</button>
                        <button class="btn-medium btnCancel" type="button"><a href="{{ url('manageBlogPost') }}">Cancel</a></button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
