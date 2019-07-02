@extends('layouts.admin')

@section("tab-content")
<div id="manageNews" class="tab-pane fade in active">
    <h2 class="text-center">News Section</h2>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h5 class="skin-color">Add News Letter</h5>
            <form action="{{ route('admin.addNews') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="heading">Heading</label>
                        <input type="text" name="heading" class="input-text full-width" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="news">News</label>
                        <textarea class="form-control" rows="5" name="news"></textarea required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="input-text full-width" required>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn-block" id="add_continent">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
