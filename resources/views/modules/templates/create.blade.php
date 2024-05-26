@extends('layout.master')

@section('title','Create Template')

@section('content')

<!-- Create Template -->
<div class="row">
    <div class="col-12">
        <form action="{{ route('mailTemplates.store') }}" method="post">
            @csrf
            <div class="card m-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <b class="card-title">Create Template</b>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="form-group input-group-sm mb-3">
                        <label for="name" class="mb-1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group input-group-sm mb-3">
                        <label for="subject" class="mb-1">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" value="{{ old('subject') }}">
                        @error('subject')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group input-group-sm mb-3">
                        <label for="content" class="mb-1">Content</label>
                        <textarea name="content" id="content" placeholder="Enter Mail Content" class="form-control">{{ old('content') }}</textarea>
                        @error('content')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group input-group-sm">
                        <input type="checkbox" name="is_public" id="is_public" value="1" class="form-control" checked>
                        <label for="is_public">Make Public</label>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create( document.querySelector( '#content' ),{
        ckfinder: {
            uploadUrl: '/test',
        }
    }).catch( error => {
        console.error( error );
    });


</script>
@endsection
