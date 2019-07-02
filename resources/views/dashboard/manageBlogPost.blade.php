@extends('layouts.admin')

@section("tab-content")
<div id="manageBlogPost" class="tab-pane fade in active">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject sbold uppercase"><h2 style="color:#28B6E9;"><i class="icon-settings"></i><strong>Blogs</strong></h2></span>
                    </div>
                </div>
                <div class="portlet-body" style="overflow: auto">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                    <table class="table table-responsive table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Created at </th>
                                <th> Images </th>
                                <th> Post </th>
                                <th> Link </th>
                                <th> Page Title </th>
                                <th> Header Keywords </th>
                                <th> Body Keywords </th>
                                <th> Body Content </th>
                                <th> Meta Title </th>
                                <th> Meta Description </th>
                                <th> Meta Keywords </th>
                                <th> Edit </th>
                                <th> Delete </th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($blogs as $blog)
                              <tr>
                                  <td> {{ $blog->id }} </td>
                                  <td> {{ $blog->created_at->format('Y-m-d / H:i:s') }} </td>
                                  <td>
                                    <ul>
                                      @foreach(json_decode($blog->blog_image) as $path)
                                          <li style="margin-bottom: 5px;"><a href="{{ URL::asset('/' . $path) }}" target="_blank"><img src="{{ URL::asset('/' . $path) }}" height="20" align="middle" style="display: block; margin:auto;" alt=""></a></li>
                                      @endforeach
                                    </ul>
                                  </td>
                                  <td> {{ str_limit($blog->blog_post, 80) }} </td>
                                  <td> {{ $blog->blog_link }} </td>
                                  <td> {{ $blog->page_title }} </td>
                                  <td> {{ $blog->header_keywords }} </td>
                                  <td> {{ $blog->body_keywords }} </td>
                                  <td> {{ str_limit($blog->body_content, 80) }} </td>
                                  <td> {{ $blog->meta_title }} </td>
                                  <td> {{ $blog->meta_description }} </td>
                                  <td> {{ $blog->meta_keywords }} </td>
                                  <td>
                                      <form action="{{ url('update_blog') }}" id="update-form-blog-{{ $blog->id }}" method="get">
                                          <input type="hidden" name="update_id" value="{{ $blog->id }}"/>
                                          <input type="hidden" name="update_name" value="blog"/>
                                      </form>
                                      <a class="fa fa-edit" href="{{ url('update_blog') }}" onclick="event.preventDefault();
                                          document.getElementById('update-form-blog-{{ $blog->id }}').submit();">
                                      </a>
                                  </td>
                                  <td>
                                      <a href="#" data-href="{{ url('del_blog') }}" data-toggle="modal" data-target="#confirm-blog-delete-{{ $blog->id }}" class="fa fa-times"></a>

                                      <div class="modal fade" id="confirm-blog-delete-{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: grey;">
                                          <div class="modal-dialog">
                                              <div style="margin: 40px;">
                                                  <form action="{{ url('del_blog') }}" id="delete-form-blog-{{ $blog->id }}" method="post">
                                                      {{ csrf_field() }}
                                                      <input type="hidden" name="blog_del_id" value="{{ $blog->id }}"/>
                                                  </form>
                                                  <p>
                                                      <strong style="font-size: 1.3em; color: #fff;">Are you sure you want to DELETE this Blog ? </strong>
                                                  </p>
                                                  <br/>
                                                  <div class="row">
                                                      <div class="col-md-5">
                                                          <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">No</button>
                                                      </div>
                                                      <div class="col-md-5">
                                                          <a class="btn btn-danger btn-block btn-ok" href="{{ url('view_blog') }}"    onclick="event.preventDefault();
                                                          document.getElementById('delete-form-blog-{{ $blog->id }}').submit();">Yes</a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>
@endsection
