@extends('frontend.layouts.main')
@section('content')
<div id="breadcrumb_part"  style="background: url({{$listings[0]?->category?->background }});">
    <div class="bread_overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center text-white">
                    <h4>listing</h4>
                    <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> listing </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="listing_grid" class="grid_view">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <form>
                    <div class="listing_grid_sidbar">
                        <div class="sidebar_line">
                            <input type="text" placeholder="Search">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </div>
                        <div class="sidebar_line_select">
                            <select class="select_2" name="state">
                                <option value="">categorys</option>
                                <option value="">category 1</option>
                                <option value="">category 2</option>
                                <option value="">category 3</option>
                                <option value="">category 4</option>
                                <option value="">category 5</option>
                            </select>
                        </div>
                        <div class="sidebar_line_select">
                            <select class="select_2" name="state">
                                <option value="">location</option>
                                <option value="">location 1</option>
                                <option value="">location 2</option>
                                <option value="">location 3</option>
                                <option value="">location 4</option>
                                <option value="">location 5</option>
                            </select>
                        </div>
                        <div class="wsus__pro_check">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate4">
                                <label class="form-check-label" for="flexCheckIndeterminate4">
                                    Heating
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate5">
                                <label class="form-check-label" for="flexCheckIndeterminate5">
                                    Smoking Allow
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate6">
                                <label class="form-check-label" for="flexCheckIndeterminate6">
                                    Icon
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate7">
                                <label class="form-check-label" for="flexCheckIndeterminate7">
                                    Parking
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    Air Condition
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate1">
                                <label class="form-check-label" for="flexCheckIndeterminate1">
                                    Internet
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate2">
                                <label class="form-check-label" for="flexCheckIndeterminate2">
                                    Terrace
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate3">
                                <label class="form-check-label" for="flexCheckIndeterminate3">
                                    Wi-Fi
                                </label>
                            </div>
                        </div>
                        <button class="read_btn" type="submit">search</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    @forelse($listings as $listing)
                    <div class="col-xl-4 col-sm-6">
                        <x-frontend.listing-card :listing="$listing"/>
                    </div>
                    @empty
                    <div class="alert alert-warning text-center">No listing avaible</div>
                    @endforelse

                    @if ($listings->total() > 6)
                        <div class="col-12">
                            <div id="pagination">
                                <nav aria-label="">
                                    <ul class="pagination">
                                        @if ($listings->onFirstPage())
                                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                        </li>
                                        @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $listings->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                        </li>
                                        @endif

                                        @foreach ($listings->getUrlRange(1, $listings->lastPage()) as $page => $url)
                                            @if ($page == $listings->currentPage())
                                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                            @else
                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach

                                        @if ($listings->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $listings->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                                        </li>
                                        @else
                                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                        </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

