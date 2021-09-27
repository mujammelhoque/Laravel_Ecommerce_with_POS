@extends('layout.front')
@section('title')
    {{ $item->name }}
@endsection
@section('style')

@endsection
@section('content')
    <!-- Single Product - start -->

    <div class="prod-wrap single_product">
        <!-- Product Images -->
        <div class="prod-slider-wrap">
            <div class="prod-slider">
                <ul class="prod-slider-car">
                    @foreach ($images as $p_i)

                        <li>
                            <a data-fancybox-group="product" class="fancy-img" href="{{ asset($p_i->note) }}">
                                <img src="{{ asset($p_i->note) }}" alt="">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="prod-thumbs">
                <ul class="prod-thumbs-car">
                    @php
                        $sl = 0;
                    @endphp
                    @foreach ($images as $p_i)
                        <li>
                            <a data-slide-index="{{ $sl++ }}" href="product.html#">
                                <img src="{{ asset($p_i->note) }}" alt="">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Product Description/Info -->
        <div class="prod-cont">
            <div class="prod-cont-txt">
                <h3>{{ $item->name }}</h3>
            </div>
            <p class="prod-actions">
                <a href="{{ url('wishlist/' . $item->id) }}" class="prod-favorites"><i class="fa fa-heart"></i>
                    Wishlist</a>
                <a href="product.html#" class="prod-compare"><i class="fa fa-bar-chart"></i> Compare</a>
            </p>

            <div class="prod-info">
                <p class="prod-price">
                    <b class="item_current_price">{{ $item->unit_price }}</b>
                </p>
                <p class="prod-qnt">
                    <input id="qty" value="1" type="text">
                    <a href="product.html#" class="prod-plus"><i class="fa fa-angle-up"></i></a>
                    <a href="product.html#" class="prod-minus"><i class="fa fa-angle-down"></i></a>
                </p>
                <p class="prod-addwrap">
                    @if ($item->quantity <= 0)
                        <h5 class="text-danger">Out Of Stock</h5>
                    @else
                        <a id="cart" href="javascript:void(0)" data-id="{{ $item->id }}"
                            id="{{ route('add.cart', ['id' => $item->id]) }}" class="prod-add" rel="nofollow">Add to
                            cart</a>
                    @endif

                </p>
            </div>
            <ul class="prod-i-props">
                <li>
                    <b>SKU</b> {{ $item->sku }}
                </li>
            </ul>
        </div>

        <!-- Product Tabs -->
        <div class="prod-tabs-wrap">
            <ul class="prod-tabs">
                <li><a data-prodtab-num="1" class="active" href="product.html#"
                        data-prodtab="#prod-tab-1">Description</a></li>
                <li><a data-prodtab-num="2" id="prod-props" href="product.html#" data-prodtab="#prod-tab-2">Features</a>
                </li>
                <li><a data-prodtab-num="3" href="product.html#" data-prodtab="#prod-tab-3">Video</a></li>
                <li><a data-prodtab-num="4" href="product.html#" data-prodtab="#prod-tab-4">Articles (6)</a></li>
                <li><a data-prodtab-num="5" href="product.html#" data-prodtab="#prod-tab-5">Reviews (3)</a></li>
            </ul>
            <div class="prod-tab-cont">

                <p data-prodtab-num="1" class="prod-tab-mob active" data-prodtab="#prod-tab-1">Description</p>
                <div class="prod-tab stylization" id="prod-tab-1">
                    {{ $item->description }}
                </div>
                <p data-prodtab-num="2" class="prod-tab-mob" data-prodtab="#prod-tab-2">Features</p>
                <div class="prod-tab prod-props" id="prod-tab-2">
                    <table>
                        <tbody>
                            <tr>
                                <td>SKU</td>
                                <td>05464207</td>
                            </tr>
                            <tr>
                                <td>Material</td>
                                <td>Nylon</td>
                            </tr>
                            <tr>
                                <td>Pattern Type</td>
                                <td>Solid</td>
                            </tr>
                            <tr>
                                <td>Wash</td>
                                <td>Colored</td>
                            </tr>
                            <tr>
                                <td>Style</td>
                                <td>Sport</td>
                            </tr>
                            <tr>
                                <td>Color</td>
                                <td>Blue</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>Unisex</td>
                            </tr>
                            <tr>
                                <td>Rain Cover</td>
                                <td>No</td>
                            </tr>
                            <tr>
                                <td>Exterior</td>
                                <td>Solid Bag</td>
                            </tr>
                            <tr>
                                <td>Closure Type</td>
                                <td>Zipper</td>
                            </tr>
                            <tr>
                                <td>Handle/Strap Type</td>
                                <td>Soft Handle</td>
                            </tr>
                            <tr>
                                <td>Size</td>
                                <td>33cm x 18cm x 48cm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p data-prodtab-num="3" class="prod-tab-mob" data-prodtab="#prod-tab-3">Video</p>
                <div class="prod-tab prod-tab-video" id="prod-tab-3">
                    <iframe width="853" height="480" src="https://www.youtube.com/embed/kaOVHSkDoPY?rel=0&amp;showinfo=0"
                        allowfullscreen></iframe>
                </div>
                <p data-prodtab-num="4" class="prod-tab-mob" data-prodtab="#prod-tab-4">Articles (6)</p>
                <div class="prod-tab prod-tab-articles" id="prod-tab-4">
                    <div class="flexslider post-rel-wrap" id="post-rel-car">
                        <ul class="slides">
                            <li class="posts-i">
                                <a class="posts-i-img" href="post.html"><span
                                        style="background: url(img/blog/blog1.jpg)"></span></a>
                                <time class="posts-i-date" datetime="2017-01-01 08:18"><span>09</span> Feb</time>
                                <div class="posts-i-info">
                                    <a class="posts-i-ctg" href="blog.html">Articles</a>
                                    <h3 class="posts-i-ttl"><a href="post.html">Adipisci corporis velit</a></h3>
                                </div>
                            </li>
                            <li class="posts-i">
                                <a class="posts-i-img" href="post.html"><span
                                        style="background: url(img/blog/blog2.jpg)"></span></a>
                                <time class="posts-i-date" datetime="2017-01-01 08:18"><span>05</span> Jan</time>
                                <div class="posts-i-info">
                                    <a class="posts-i-ctg" href="blog.html">Reviews</a>
                                    <h3 class="posts-i-ttl"><a href="post.html">Excepturi ducimus recusandae</a></h3>
                                </div>
                            </li>
                            <li class="posts-i">
                                <a class="posts-i-img" href="post.html"><span
                                        style="background: url(img/blog/blog3.jpg)"></span></a>
                                <time class="posts-i-date" datetime="2017-01-01 08:18"><span>17</span> Apr</time>
                                <div class="posts-i-info">
                                    <a class="posts-i-ctg" href="blog.html">Reviews</a>
                                    <h3 class="posts-i-ttl"><a href="post.html">Consequuntur minus numquam</a></h3>
                                </div>
                            </li>
                            <li class="posts-i">
                                <a class="posts-i-img" href="post.html"><span
                                        style="background: url(img/blog/blog4.jpg)"></span></a>
                                <time class="posts-i-date" datetime="2017-01-01 08:18"><span>21</span> May</time>
                                <div class="posts-i-info">
                                    <a class="posts-i-ctg" href="blog.html">Articles</a>
                                    <h3 class="posts-i-ttl"><a href="post.html">Non ex sapiente excepturi</a></h3>
                                </div>
                            </li>
                            <li class="posts-i">
                                <a class="posts-i-img" href="post.html"><span
                                        style="background: url(img/blog/blog5.jpg)"></span></a>
                                <time class="posts-i-date" datetime="2017-01-01 08:18"><span>24</span> Jan</time>
                                <div class="posts-i-info">
                                    <a class="posts-i-ctg" href="blog.html">Articles</a>
                                    <h3 class="posts-i-ttl"><a href="post.html">Veritatis officiis</a></h3>
                                </div>
                            </li>
                            <li class="posts-i">
                                <a class="posts-i-img" href="post.html"><span
                                        style="background: url(img/blog/blog6.jpg)"></span></a>
                                <time class="posts-i-date" datetime="2017-01-01 08:18"><span>08</span> Sep</time>
                                <div class="posts-i-info">
                                    <a class="posts-i-ctg" href="blog.html">Reviews</a>
                                    <h3 class="posts-i-ttl"><a href="post.html">Ratione magni laudantium</a></h3>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <p data-prodtab-num="5" class="prod-tab-mob" data-prodtab="#prod-tab-5">Reviews (3)</p>
                <div class="prod-tab" id="prod-tab-5">
                    <ul class="reviews-list">
                        <li class="reviews-i existimg">
                            <div class="reviews-i-img">
                                <img src="img/reviews/1.jpg" alt="Averill Sidony">
                                <div class="reviews-i-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <time datetime="2017-12-21 12:19:46" class="reviews-i-date">21 May 2017</time>
                            </div>
                            <div class="reviews-i-cont">
                                <p>Numquam aliquam maiores ratione dolores ducimus, laborum hic similique delectus. Neque
                                    saepe nobis omnis laudantium itaque tempore voluptate harum error, illum nemo,
                                    reiciendis architecto, quam tenetur amet sit quisquam cum.<br>Pariatur cum tempore eius
                                    nulla impedit cumque odit quos porro iste a voluptas, optio alias voluptate minima
                                    distinctio facere aliquid quasi, vero illum tenetur sed temporibus eveniet obcaecati.
                                </p>
                                <span class="reviews-i-margin"></span>
                                <h3 class="reviews-i-ttl">Averill Sidony</h3>
                                <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show
                                        answer</span> <i class="fa fa-angle-down"></i></p>
                            </div>
                            <div class="reviews-i-answer">
                                <p>Thanks for your feedback!<br>
                                    Nostrum voluptate autem, eaque mollitia sed rem cum amet qui repudiandae libero quaerat
                                    veniam accusantium architecto minima impedit. Magni illo illum iure tempora vero
                                    explicabo, esse dolores rem at dolorum doloremque iusto laboriosam repellendus.
                                    <br>Numquam eius voluptatum sint modi nihil exercitationem dolorum asperiores maiores
                                    provident repellat magnam vitae, consequatur omnis expedita, accusantium voluptas odit
                                    id.
                                </p>
                                <span class="reviews-i-margin"></span>
                            </div>
                        </li>
                        <li class="reviews-i existimg">
                            <div class="reviews-i-img">
                                <img src="img/reviews/3.jpg" alt="Araminta Kristeen">
                                <div class="reviews-i-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <time datetime="2017-12-21 12:19:46" class="reviews-i-date">14 February 2017</time>
                            </div>
                            <div class="reviews-i-cont">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                <span class="reviews-i-margin"></span>
                                <h3 class="reviews-i-ttl">Araminta Kristeen</h3>
                                <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show
                                        answer</span> <i class="fa fa-angle-down"></i></p>
                            </div>
                            <div class="reviews-i-answer">
                                Benjy, hi!<br>
                                Officiis culpa quos, quae optio quia.<br>
                                Amet sunt dolorem tempora, pariatur earum quidem adipisci error voluptates tempore iure,
                                nobis optio temporibus voluptatum delectus natus accusamus incidunt provident sapiente
                                explicabo vero labore hic quo?
                                <span class="reviews-i-margin"></span>
                            </div>
                        </li>
                        <li class="reviews-i">
                            <div class="reviews-i-cont">
                                <time datetime="2017-12-21 12:19:46" class="reviews-i-date">21 May 2017</time>
                                <div class="reviews-i-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                <span class="reviews-i-margin"></span>
                                <h3 class="reviews-i-ttl">Jeni Margie</h3>
                                <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show
                                        answer</span> <i class="fa fa-angle-down"></i></p>
                            </div>
                            <div class="reviews-i-answer">
                                Hello, Jeni Margie!<br>
                                Nostrum voluptate autem, eaque mollitia sed rem cum amet qui repudiandae libero quaerat
                                veniam accusantium architecto minima impedit. Magni illo illum iure tempora vero explicabo,
                                esse dolores rem at dolorum doloremque iusto laboriosam repellendus. <br>Numquam eius
                                voluptatum sint modi nihil exercitationem dolorum asperiores maiores provident repellat
                                magnam vitae, consequatur omnis expedita, accusantium voluptas odit id.
                                <span class="reviews-i-margin"></span>
                            </div>
                        </li>
                    </ul>
                    <div class="prod-comment-form">
                        <h3>Add your review</h3>
                        <form method="POST" action="product.html#">
                            <input type="text" placeholder="Name">
                            <input type="text" placeholder="E-mail">
                            <textarea placeholder="Your review"></textarea>
                            <div class="prod-comment-submit">
                                <input type="submit" value="Submit">
                                <div class="prod-rating">
                                    <i class="fa fa-star-o" title="5"></i><i class="fa fa-star-o" title="4"></i><i
                                        class="fa fa-star-o" title="3"></i><i class="fa fa-star-o" title="2"></i><i
                                        class="fa fa-star-o" title="1"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="prod-items section-items">
        @if (count($related_product))
            <div>
               
                <h3 style="font-size:30px !important">Related Product</h3>
            </div>
            <hr>
        @endif

        @forelse ($related_product as $r_p)

            <div class="prod-i">

                <div class="prod-i-top">
                    <a href="{{ url('product/' . $r_p->id) }}" class="prod-i-img">
                        <!-- NO SPACE --><img width="width: 225px;" src="{{ asset($r_p->baseimage) }}" alt="Adipisci aperiam commodi">
                        <!-- NO SPACE -->
                    </a>
                    <p class="prod-i-info">
                        <a href="{{ route('add.withlist', ['id' => $r_p->id]) }}"
                            class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>

                        <a class="prod-i-compare" href="catalog-gallery.html#"><span>Compare</span><i
                                class="fa fa-bar-chart"></i></a>
                    </p>
                    <a href="{{ url('product/' . $r_p->id) }}" class="prod-i-buy">Add to cart</a>
                    <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>

                    <div class="prod-i-properties">
                        <dl>
                            <dt>Exterior</dt>
                            <dd>Silt Pocket<br></dd>
                            <dt>Material</dt>
                            <dd>PU<br></dd>
                            <dt>Occasion</dt>
                            <dd>Versatile<br></dd>
                            <dt>Shape</dt>
                            <dd>Casual Tote<br></dd>
                            <dt>Pattern Type</dt>
                            <dd>Solid<br></dd>
                            <dt>Style</dt>
                            <dd>American Style<br></dd>
                            <dt>Hardness</dt>
                            <dd>Soft<br></dd>
                            <dt>Decoration</dt>
                            <dd>None<br></dd>
                            <dt>Closure Type</dt>
                            <dd>Zipper<br></dd>
                        </dl>
                    </div>
                </div>
                <h3>
                    <a href="{{ url('product/' . $r_p->id) }}">{{ $r_p->name }}</a>
                </h3>
                <p class="prod-i-price">
                    <b>{{ $r_p->unit_price }}</b>
                </p>

            </div>
        @empty

        @endforelse
    </div>

    <!-- Single Product - end -->

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("a#cart").click(function() {
                var id = $(this).attr('data-id');
                var qty = $('#qty').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('add.cart', ['id' => $item->id]) }}",
                    method: 'POST',
                    data: {
                        id: id,
                        qty: qty
                    },
                    success: function(response) {
                        if (response == 'ok') {
                            toastr.success("Product Added To Cart")
                            setInterval(function() {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                });
            });
        });
    </script>

@endsection
