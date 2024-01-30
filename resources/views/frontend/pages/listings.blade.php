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
                <x-frontend.filter-sidebar/>
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

