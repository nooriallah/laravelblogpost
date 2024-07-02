<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Services </h1>
        <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have
            suffered alteration</p>
        <div class="services_section_2">
            <div class="row">

                @php($count = 0)

                @foreach ($posts as $post)
                    @if ($count < 3)
                        <div class="col-md-4">
                            <div>
                                <img src="{{ asset("postimages/$post->image") }}" style="width: 350px; height: 400px"
                                    class="s ervices_img">
                            </div>
                            <h1 style="font-size: 20px; margin-top: 30px">{{ \Illuminate\Support\Str::limit($post->title, 30, '...')  }}</h1>
                            <div class="btn_main ">
                                <a href="{{ route('singlepostpage', $post->id) }}">Read more</a>
                            </div>
                        </div>
                    @endif
                    @php($count++)
                @endforeach


            </div>
        </div>
    </div>
</div>
