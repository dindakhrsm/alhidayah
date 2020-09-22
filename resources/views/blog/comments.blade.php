<article class="post-comments post-shadow" id="post-comments">
    <?php $commentsNumber = $post->comments->count() ?>
    <h3><i class="fa fa-comments"></i> {{$commentsNumber}} {{str_plural('Comment', $commentsNumber)}}</h3>

    <div class="comment-body padding-10">
        <ul class="comments-list">

            @foreach($postComments as $comment)
            <li class="comment-item">
                <div class="comment-heading clearfix">
                    <div class="comment-author-meta">
                        <h4>{{$comment->author_name}} <small>&nbsp; {{$comment->created_at}}</small>
                            {{--<small>&nbsp; {{$comment->date}}</small>--}}
                        </h4>
                    </div>
                </div>
                <div class="comment-content">
                  {{--  <p>{{ $comment->body }}</p>--}}
                    <p>{!! $comment->body_html !!}</p>
                </div>
            </li>
                @endforeach
        </ul>

        <nav>
            {!! $postComments->links() !!}
        </nav>
    </div>


    <div class="comment-footer padding-10">
        <h3>Leave a comment</h3>

        @if(session('message'))
            <div class="alert alert-info">
                {{session('message')}}
            </div>
            @endif

        {!! Form::open(['route'=> ['blog.comments' , $post->id]]) !!}
            <div class="form-group required {{$errors->has('author_name') ? 'has-error' : ''}}">
                <label for="name">Name</label>
                {!! Form::text('author_name', null, ['class' => 'form-control']) !!}
                @if($errors->has('author_name'))
                    <span class="help-block"> </span>
                    <strong>{{ $errors->first('author_name') }}</strong>
                    @endif
            </div>

            <div class="form-group required {{$errors->has('author_email') ? 'has-error' : ''}}">
                <label for="email">Email</label>
                {!! Form::text('author_email', null, ['class' => 'form-control']) !!}
                @if($errors->has('author_email'))
                    <span class="help-block"> </span>
                    <strong>{{ $errors->first('author_email') }}</strong>
                @endif
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                {!! Form::text('author_url', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group required {{$errors->has('body') ? 'has-error' : ''}}">
                <label for="comment">Comment</label>
               {!! Form::textarea('body' , null, ['row' => 6, 'class' => 'form-control']) !!}
                @if($errors->has('body'))
                    <span class="help-block"> </span>
                    <strong>{{ $errors->first('body') }}</strong>
                @endif
            </div>

            <div class="clearfix">
                <div class="pull-left">
                    <button type="submit" class="btn btn-lg btn-success">Submit</button>
                </div>

                <div class="pull-right">
                    <p class="text-muted">
                        <span class="required">*</span>
                        <em>Indicates required fields</em>
                    </p>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

</article>