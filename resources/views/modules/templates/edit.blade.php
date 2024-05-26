@extends('layout.master')

@section('title','Update Template')

@section('content')

<!-- Update Template -->
<div class="row">
    <div class="col-12">
        <form action="{{ route('mailTemplates.update', $mailTemplate->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card m-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <b class="card-title">Update Template</b>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="form-group input-group-sm mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name') ?? $mailTemplate->name }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group input-group-sm mb-3">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" value="{{ old('subject') ?? $mailTemplate->subject }}">
                        @error('subject')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group input-group-sm">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" placeholder="Enter Mail Content" class="form-control">{{ old('content') ?? $mailTemplate->content }}</textarea>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
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
