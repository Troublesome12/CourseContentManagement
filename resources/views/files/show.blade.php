@extends('master')

@section('title', "$file->title")

@section('navbar')
    @include('partials.navbar')
@endsection

@section('content')
	<div class="file-container"></div>
	@if($file->type == 1)	{{-- image file --}}
    <center>
    <img src="{{ URL::to('src/files/'.$file->file_path) }}" class="img img-responsive">
	</center>
	@else 		{{-- pdf file --}}		
	<div class="embed-responsive embed-responsive-4by3">
        <iframe src="{{ URL::to('src/files/'.$file->file_path)."#zoom=140" }}" class="embed-responsive-item"></iframe>
    </div>
	@endif
    <div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comment title">
				<span class="fa fa-comment fa-lg"></span>
				 {{ $file->comments()->count() }} Comments
			</h3>
			@foreach ($file->comments as $comment)
				<div class="comment">
					<div class="author-info">
						<img src="{{ "https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->user->email)))
						."?s=50&d=mm" }}" class="author-image">
						<div class="author-name">
							<h4>{{ $comment->user->name }}</h4>
							<p class="author-time">{{ $comment->created_at->diffForHumans() }}</p>
						</div>
					</div>
					<div class="comment-content">
						{{ $comment->comment }}
					</div>
				</div>
			@endforeach
		</div>
		<hr>
	</div>

	@if(Auth::check())
	<div class="row" style="margin-top: 50px">
		<div class="col-md-8 col-md-offset-2">
			<form action="{{ route('comment.store', $file->id) }}" method="post" data-parsley-validate>
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="comment">Comment</label>
							<textarea type="text" name="comment" class="form-control message" rows="5" data-parsley-required maxlength="1000"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Comment" class="btn btn-success btn-block btn-h1-spacing">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	@endif
@endsection