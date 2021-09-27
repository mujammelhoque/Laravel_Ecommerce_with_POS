@extends('layout.front')
@section('style')

@endsection
@section('content')
        <ul class="b-crumbs">
            <li>
                <a href="{{url('/')}}">
                    Home
                </a>
            </li>
            <li>
                <span>Blog</span>
            </li>
        </ul>
        <h1 class="main-ttl main-ttl-categs"><span>Blog</span></h1>
        <!-- Blog Categories -->

        <!-- Blog Posts - start -->
        <div class="posts-list blog-page">
            <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
                <a class="posts-i-img" href="post.html"><span style="background: url({{asset('front')}}/img/blog/blog1.jpg)"></span></a>
                <time class="posts-i-date" datetime="2017-01-01 12:00"><span>09</span> Jan</time>
                <h3 class="posts-i-ttl"><a href="post.html">Animi quaerat at</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At fugit obcaecati quod veritatis vero!</p>		<a href="post.html" class="posts-i-more">Read more...</a>
            </div>
            <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
                <a class="posts-i-img" href="post.html"><span style="background: url({{asset('front')}}/img/blog/blog2.jpg)"></span></a>
                <time class="posts-i-date" datetime="2017-01-01 12:00"><span>15</span> Feb</time>
                <h3 class="posts-i-ttl"><a href="post.html">Ex atque commodi</a></h3>
                <p>Obcaecati ratione, illo qui dignissimos excepturi non earum, sed tempore, amet at labore ullam unde delectus</p>		<a href="post.html" class="posts-i-more">Read more...</a>
            </div>
            <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
                <a class="posts-i-img" href="post.html"><span style="background: url({{asset('front')}}/img/blog/blog3.jpg)"></span></a>
                <time class="posts-i-date" datetime="2017-01-01 12:00"><span>21</span> Mar</time>
                <h3 class="posts-i-ttl"><a href="post.html">Hic quod maxime deserunt</a></h3>
                <p>Aliquam soluta eveniet voluptas, nesciunt eius libero officiis officia eos consectetur ut velit natus</p>		<a href="post.html" class="posts-i-more">Read more...</a>
            </div>
            <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
                <a class="posts-i-img" href="post.html"><span style="background: url({{asset('front')}}/img/blog/blog4.jpg)"></span></a>
                <time class="posts-i-date" datetime="2017-01-01 12:00"><span>08</span> Apr</time>
                <h3 class="posts-i-ttl"><a href="post.html">Ipsum dolor sit amet</a></h3>
                <p>Porro incidunt reprehenderit eaque? Sit nihil culpa ex quaerat nostrum ab</p>		<a href="post.html" class="posts-i-more">Read more...</a>
            </div>
            <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
                <a class="posts-i-img" href="post.html"><span style="background: url({{asset('front')}}/img/blog/blog5.jpg)"></span></a>
                <time class="posts-i-date" datetime="2017-01-01 12:00"><span>18</span> Jun</time>
                <h3 class="posts-i-ttl"><a href="post.html">Lorem ipsum dolor sit amet</a></h3>
                <p>Nihil vel quod laboriosam perspiciatis nostrum nam quis optio, vitae autem, architecto pariatur quo</p>		<a href="post.html" class="posts-i-more">Read more...</a>
            </div>
            <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
                <a class="posts-i-img" href="post.html"><span style="background: url({{asset('front')}}/img/blog/blog6.jpg)"></span></a>
                <time class="posts-i-date" datetime="2017-01-01 12:00"><span>29</span> Jul</time>
                <h3 class="posts-i-ttl"><a href="post.html">Adipisci corporis velit</a></h3>
                <p>Id vero tenetur sunt eligendi sequi adipisci similique sint corporis praesentium aliquam iusto maxime tempora eos non culpa</p>		<a href="post.html" class="posts-i-more">Read more...</a>
            </div>
            <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
                <a class="posts-i-img" href="post.html"><span style="background: url({{asset('front')}}/img/blog/blog7.jpg)"></span></a>
                <time class="posts-i-date" datetime="2017-01-01 12:00"><span>04</span> Aug</time>
                <h3 class="posts-i-ttl"><a href="post.html">Beatae nisi blanditiis</a></h3>
                <p>Asperiores minus ipsam eaque saepe repellat libero earum mollitia cum tempore sint autem, magni, ducimus</p>		<a href="post.html" class="posts-i-more">Read more...</a>
            </div>
            <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
                <a class="posts-i-img" href="post.html"><span style="background: url({{asset('front')}}/img/blog/blog8.jpg)"></span></a>
                <time class="posts-i-date" datetime="2017-01-01 12:00"><span>14</span> Sep</time>
                <h3 class="posts-i-ttl"><a href="post.html">Dolorum vero mollitia</a></h3>
                <p>Aliquid nesciunt amet officiis nemo numquam perferendis ipsam dolor ratione rerum quasi repellat officia distinctio quos</p>		<a href="post.html" class="posts-i-more">Read more...</a>
            </div>
            <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
                <a class="posts-i-img" href="post.html"><span style="background: url({{asset('front')}}/img/blog/blog9.jpg)"></span></a>
                <time class="posts-i-date" datetime="2017-01-01 12:00"><span>21</span> Oct</time>
                <h3 class="posts-i-ttl"><a href="post.html">Quasi corporis recusandae</a></h3>
                <p>Officiis atque facilis corporis ipsum, sint totam doloremque quas laborum asperiores doloribus voluptatum</p>		<a href="post.html" class="posts-i-more">Read more...</a>
            </div>
            <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
                <a class="posts-i-img" href="post.html"><span style="background: url({{asset('front')}}/img/blog/blog10.jpg)"></span></a>
                <time class="posts-i-date" datetime="2017-01-01 12:00"><span>02</span> Nov</time>
                <h3 class="posts-i-ttl"><a href="post.html">Sit deleniti placeat quia aspernatur</a></h3>
                <p>Sit nihil culpa ex quaerat nostrum ab. Aliquid nesciunt amet officiis nemo numquam perferendis ipsam dolor ratione</p>		<a href="post.html" class="posts-i-more">Read more...</a>
            </div>
            <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
                <a class="posts-i-img" href="post.html"><span style="background: url({{asset('front')}}/img/blog/blog11.jpg)"></span></a>
                <time class="posts-i-date" datetime="2017-01-01 12:00"><span>09</span> Dec</time>
                <h3 class="posts-i-ttl"><a href="post.html">Odit reprehenderit</a></h3>
                <p>Id distinctio cum laboriosam sint atque culpa laborum eaque, quod porro esse hic, consectetur assumenda optio</p>		<a href="post.html" class="posts-i-more">Read more...</a>
            </div>
            <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
                <a class="posts-i-img" href="post.html"><span style="background: url({{asset('front')}}/img/blog/blog12.jpg)"></span></a>
                <time class="posts-i-date" datetime="2017-01-01 12:00"><span>22</span> Jan</time>
                <h3 class="posts-i-ttl"><a href="post.html">Quibusdam officiis quas</a></h3>
                <p>Suscipit alias cumque, totam iure ipsam voluptatibus ratione sed quam minima non laudantium</p>		<a href="post.html" class="posts-i-more">Read more...</a>
            </div>
        </div>
        <!-- Blog Posts - end -->

        <!-- Pagination - start -->
        <ul class="pagi">
            <li class="active"><span>1</span></li>
            <li><a href="blog-2.html#">2</a></li>
            <li><a href="blog-2.html#">3</a></li>
            <li><a href="blog-2.html#">4</a></li>
            <li class="pagi-next"><a href="blog-2.html#"><i class="fa fa-angle-double-right"></i></a></li>
        </ul>
        <!-- Pagination - end -->
@endsection
@section('script')

@endsection
