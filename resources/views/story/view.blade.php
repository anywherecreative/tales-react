@extends('layouts.app')
@section('meta.title', $story->title . " by " . $story->author->pen_name)
@section('meta.description', $story->description )
@section('content')
<div class="wrapper">
	<div class="box">
        <dl>
            <dt>Title</dt>
            <dd>{{ $story->title }}</dd>

            <dt>Author</dt>
            <dd>{{ $story->author->pen_name }}</dd>

            <dt>Description</dt>
            <dd>{{ $story->description }}</dd>
            <dt>Satisfactor</dt>
            <dd class="satisfactor"><a class="upvote {!! (($userSatisfactor == App\Satisfactor::UPVOTE) ? "selected":"") !!}" href="{!! route('story.upvote',['story'=>$story]) !!}"><i class="fas fa-arrow-circle-up"></i></a> <span>{{ $story->total_satisfactor }}</span> <a class="downvote {!! (($userSatisfactor == App\Satisfactor::DOWNVOTE) ? "selected":"") !!}" href="{!! route('story.downvote',['story'=>$story]) !!}"><i class="fas fa-arrow-circle-down"></i></a></dd>
        </dl>
        <h2>Lines</h2>
        <div class="container-fluid lines">
            @foreach($story->lines as $line)
            <div class="row">
                <div class="col-sm-1">
                <p class="author-thumb"><span>{{ implode($line->author->pen_name_letters) }}</span></p>
                </div>
                <div class="col-sm-11">
                        {!! $line->showContent() !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @if(Auth::check())
    <form action="{!! route('story.add', ['story'=>$story]) !!}" method="post" id="addline">
        <textarea name="line"></textarea>
        @csrf
        <button class="btn btn-success">Add Line</button>
    </form>
    @else
    <p class="emphasized">
        <a href="{{ route('register') }}"><b>Join Today</b></a> or <a href="{{ route('login') }}">log in</a> and tell your part of the story!
    </p>
    @endif
</div>

@endsection

@section('js.bottom')
<script>
    checking = false;
    lastLine = {{ $story->lines()->latest()->first()->id }}
    $(document).ready(function() {
        $('.satisfactor .upvote').click(function(e) {
            e.preventDefault()
            $.getJSON($(this).attr('href'),function (data) {
                if(!checkSuccess(data)) {
                    return;
                }
                $('.satisfactor A').removeClass('selected');
                if(data.userSatisfactor == {!! App\Satisfactor::UPVOTE !!}) {
                    $('.satisfactor .upvote').addClass('selected');
                }
                $('.satisfactor SPAN').text(data.satisfactor);
            });
        })

        $('.satisfactor .downvote').click(function(e) {
            e.preventDefault();
            $.getJSON($(this).attr('href'),function (data) {
                if(!checkSuccess(data)) {
                    return;
                }
                $('.satisfactor A').removeClass('selected');
                if(data.userSatisfactor == {!! App\Satisfactor::DOWNVOTE !!}) {
                    $('.satisfactor .downvote').addClass('selected');
                }
                $('.satisfactor SPAN').text(data.satisfactor);
            });
        })

        function checkSuccess(data) {
            if(data.status == 'SUCCESS') {
                return true;
            }
            else {
                if(data.reason == "LOGIN") {
                    $('#login-box .message').text(data.message);
                    $('#login-box').modal();
                    return false;
                }
            }
        }

        setInterval(() => {
            if(checking) {
                return;
            }
            pollnew();
        }, 5000);

        $('#addline').submit(function(e) {
            e.preventDefault();
            line = $('[name=line]',this).val();
            $('[name=line]',this).val("");
            $('[name=line]',this).attr('disabled','disabled');
            $('BUTTON',this).attr('disabled','disabled');
            $.post($(this).attr('action'), {'line':line},function() {
                $('#addline [name=line]').removeAttr('disabled');
                $('#addline BUTTON').removeAttr('disabled');
                if(!checking) {
                    pollnew();
                }
            });
        });

        function pollnew() {
            checking = true;
            $.getJSON("{{ route('story.newlines',['story'=>$story])}}",{'lastline':lastLine},function (data) {
                if(data.status = "SUCCESS") {
                    $.each(data.lines,function(key,line) {
                        $(".lines").append("\
                            <div class='row newline'>\
                                <div class='col-md-2'>\
                                    <span class='author'>" + line.pen_name + "</span>\
                                </div>\
                                <div class='col-md-10'>\
                                    <p>" + line.content + "</p>\
                                </div>\
                            </div>\
                        ");
                    });
                }
                lastLine = data.lastline;
                $(".lines .newline").slideDown().removeClass('newline');
                checking = false;
            });
        }

        $('.author-box').popover();
        
    });
</script>
@endsection
@section('css.top')
<style>
    .satisfactor A {
        color:inherit;
        opacity: .5;
    }
    .satisfactor .selected {
        opacity:1;
    }

    .satisfactor .downvote.selected,
    .satisfactor .downvote:hover {
        color:#c00;
    }
    .satisfactor .upvote.selected,
    .satisfactor .upvote:hover {
        color:#63f;
    }
    .newline {
        display:none;
    }
</style>
@endsection