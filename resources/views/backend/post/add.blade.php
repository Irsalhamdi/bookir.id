@extends('admin.admin_master')

@section('admin')

    <div class="container-full">
        <section class="content">
		    <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Blog Post</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{ route('store.blog.post') }}" method="POST" enctype="multipart/form-data">
                                    @csrf   
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Category</h5>
                                                <div class="controls">
                                                    <select name="category_id" required class="form-control">
                                                        <option value="" selected="" disabled="">
                                                            Select Category
                                                        </option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Title</h5>
                                                <input type="text" class="form-control" name="title" required>
                                            </div>
                                        </div>
                                    </div>     
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Description</h5>
                                                <textarea id="editor1" name="description" class="form-control" cols="30" rows="10" required>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>               
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Thumbnail</h5>
                                                <input type="file" name="image" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">                            
                                                <div class="text-xs-right">
                                                    <button type="submit" class="btn btn-rounded btn-success mb-5">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
		</section>
	</div>     

@endsection
