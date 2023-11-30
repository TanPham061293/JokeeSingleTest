<div class="main_title">
    <p class='_title'>A joke a day keeps the doctor away</p>
    <p>If you joke wrong way, your teeth have to pay. (Serious)</p>
</div>
<div class="main_content">
    <div class="_content">
        <div class="_text">
            @if (isset($jokeeSingle))
                {{ isset($jokeeSingle->content) ? $jokeeSingle->content : $jokeeSingle }}
            @endif
        </div>
        <input type="hidden" id="hidden" name="id" value="{{ isset($jokeeSingle->id) ? $jokeeSingle->id : '' }}">
        <div class="_button">
            <button class="btn btn-primary " onclick='changeJokee(0)'>This is Funny!</button>
            <button class="btn btn-success " onclick='changeJokee(1)'>This is not funny!</button>
        </div>
    </div>
</div>
