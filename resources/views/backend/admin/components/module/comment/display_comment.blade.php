@foreach($comments as $comment)
    <div class="d-flex flex-start mb-4 {{ $comment->is_replay ? 'ms-5' :'' }}">
        <img class="rounded-circle shadow-1-strong me-3"
             src="{{ asset($comment->user->image) ?? defaultImage() }}" alt="avatar" width="40"
             height="40" />
        <div class="flex-grow-1 flex-shrink-1">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-1">
                        {{ $comment->user->name }} <span class="small">- {{ $comment->created_at->diffForhumans() }}</span>
                    </p>
                    <div>
                        <a href="javascript:void(0)" onclick="replayButton({{ $comment->id }})"  data-id="{{ $comment->id }}">
                            <i class="mdi mdi-reply"></i>
                            <span class="small"> reply</span>
                        </a>
                        @if(request('is_delete'))
                            <a href="{{ route('delete.blog_comment', $comment->id) }}" class="ms-2">
                                <i class="mdi mdi-trash-can"></i>
                            </a>
                        @endif
                    </div>
                </div>
                <p class="small mb-0">
                    {!! $comment->message !!}
                </p>
                @if($comment->image)
                    <a href="{{  asset($comment->image) ?? '' }}">
                        <div class="" style="width: 65px;height: 50px;overflow: hidden;border-radius: 5px;">
                            <img src="{{ asset($comment->image) ?? defaultImage() }}" alt="" style="width: 100%;height: 100%;">
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </div>
    @include('backend.admin.components.module.comment.display_comment', ['comments' => $comment->replayComments])
@endforeach
