@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Seo Setting Page </h4>
                </div>
                <div class="box-body">
                    <form method="post" action="{{ route('update.seo.setting') }}" >
                        @csrf
                        <input type="hidden" name="id" value="{{ $seo->id }}">
                        <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                                    <h5>Meta Title <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meta_title" class="form-control" value="{{ $seo->meta_title }}" > 
                                                    </div>
                                    </div>
                                    <div class="form-group">
                                                    <h5>Meta Author <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meta_author" class="form-control"  value="{{ $seo->meta_author }}"  > 
                                                    </div>
                                    </div>
                                    <div class="form-group">
                                                    <h5>Meta Keyword <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meta_keyword" class="form-control" value="{{ $seo->meta_keyword }}">
                                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Meta Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="meta_description" id="textarea" class="form-control" required>
                                                {{ $seo->meta_description }}
                                            </textarea>     
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Google Analytics <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                                        <textarea name="google_analytics" id="textarea" class="form-control" required>
                                                            {{ $seo->google_analytics }}
                                                        </textarea>     
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
                                    </div>
                                </div> 
                        </div>       
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection