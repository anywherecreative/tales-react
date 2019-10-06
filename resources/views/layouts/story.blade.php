<li>
    <span class="rank">{{ $key+1 }}</span>
    <div class="header-box">
      <h2>
        <a href="{{ route('story.view',['story'=>$story]) }}">{{ $story->title}}</a>
      </h2>
      <p class="added-by">Added by {{ $story->author->pen_name }}</p>
      {{ $story->description}}
    </div>
    <div class="box">
        {{ $story->lines()->latest()->first()->first()->content }}
    </div>
</li>