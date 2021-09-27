<!-- Topmenu - start -->
<div class="header-bottom">
    <div class="container">
        <nav class="topmenu">
            <!-- Catalog menu - start -->
            <div class="topcatalog">
                <a class="topcatalog-btn" href="#"><span>All</span> catalog</a>
                <ul class="topcatalog-list">


                    @php
                        $categories = \App\models\Category::where('parent_id', 0)->get();
                    @endphp
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('single.category', ['id' => $category->id]) }}">
                                {{ $category->name }}
                            </a>
                            <i class="fa fa-angle-right"></i>
                            <ul>
                                @php
                                    $sub_categories = \App\models\Category::where('parent_id', $category->id)->get();
                                @endphp
                                @if ($sub_categories)
                                    @foreach ($sub_categories as $item)
                                        <li>
                                            <a href="{{ route('single.category', ['id' => $item->id]) }}">
                                                {{ $item->name }}
                                            </a>
                                            <i class="fa fa-angle-right"></i>
                                            <ul>
                                                @php
                                                    $sub_subcategories = \App\models\Category::where('parent_id', $item->id)->get();
                                                @endphp
                                                @if ($sub_subcategories)
                                                    @foreach ($sub_subcategories as $item)
                                                        <li>
                                                            <a
                                                                href="{{ route('single.category', ['id' => $item->id]) }}">
                                                                {{ $item->name }}
                                                            </a>
                                                            <i class="fa fa-angle-right"></i>
                                                            @php
                                                                $last_cat = \App\Models\Category::where('parent_id', $item->id)->get();
                                                            @endphp
                                                            @if ($last_cat)
                                                                <ul>
                                                                    @foreach ($last_cat as $item)
                                                                        <li><a
                                                                                href="{{ route('single.category', ['id' => $item->id]) }}">
                                                                                {{ $item->name }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>

                                                    @endforeach

                                                @endif

                                            </ul>
                                        </li>
                                    @endforeach

                                @endif

                            </ul>
                        </li>
                    @endforeach


                </ul>
            </div>
            <!-- Catalog menu - end -->

            <!-- Main menu - start -->
            <button type="button" class="mainmenu-btn">Menu</button>

            <ul class="mainmenu">
                <li>
                    <a href="{{ url('/') }}" class="active">
                        Home
                    </a>
                </li>
                <li class="">
                    <a href=" {{ url('/shop') }}">
                    Shop
                    </a>
                </li>
                <li>
                    <a href="{{ url('/blog') }}">
                        Blog
                    </a>
                </li>
                <li class="mainmenu-more">
                    <span>...</span>
                    <ul class="mainmenu-sub"></ul>
                </li>
            </ul>
            <!-- Main menu - end -->

            <!-- Search - start -->
            <div class="topsearch">
                <a id="topsearch-btn" class="topsearch-btn" href="index.html#"><i class="fa fa-search"></i></a>
                <form class="topsearch-form" action="" method="get">
                    {{-- @csrf --}}
                    <input id="search" type="text" name="search" placeholder="Search products">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <!-- Search - end -->

        </nav>
    </div>
</div>
<!-- Topmenu - end -->
