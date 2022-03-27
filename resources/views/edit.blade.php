@extends('base')
@section('content')
<div class="container mt-3">
    <div class="row">


        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                        <div class="card border border-2">
                            <div class="card-body">
                                <h4>Cover:</h4>
                        <form action="/deletecover/{{ $posts->id }}" method="post">
                        <button class="btn text-danger">X</button>
                        @csrf
                        @method('delete')
                        </form>
                        <img src="/cover/{{ $posts->cover }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                        <br>
                            </div>
                        </div>
            
            
                        <hr>
                        @if (count($posts->images)>0)
                        <h4>Images:</h4>
                        <div class="card border border-2">
                            <div class="card-body">
                                @foreach ($posts->images as $img)
                        <form action="/deleteimage/{{ $img->id }}" method="post">
                            <button class="btn text-danger">X</button>
                            @csrf
                            @method('delete')
                            </form>
                        <img src="/images/{{ $img->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                        @endforeach
                            </div>
                        </div>
                        @endif
            
                    </div>
                </div>
       </div>


        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-danger border border-warning border-3"><b>Udate Post Detals</b> </h3>
            <div class="form-group">
                <form action="/update/{{ $posts->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                 <input type="text" name="title" class="form-control m-2" placeholder="title" value="{{ $posts->title }}">
                 <input type="text" name="author" class="form-control m-2" placeholder="author" value="{{ $posts->author }}">
                 <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="body">{{ $posts->body }}</Textarea>
                 <label class="m-2">Cover Image</label>
                 <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">

                 <label class="m-2">Images</label>
                 <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>

                <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                </form>
           </div>
                </div>
            </div>
        </div>
</div>
@endsection