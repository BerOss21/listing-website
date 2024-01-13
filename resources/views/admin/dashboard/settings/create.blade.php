@extends('admin.layouts.main')
@section('content')

<section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="">Settings</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h4>Settings</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12 col-sm-12 col-md-2">
                              <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">General Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">Logo and Favicon Settings</a>
                                </li>

                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Pusher Settings</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="appearace-tab5" data-toggle="tab" href="#appearace-settings" role="tab" aria-controls="appearace-settings" aria-selected="false">Appearance Settings</a>
                                  </li>

                              </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-10">
                              <div class="tab-content no-padding" id="myTab2Content">
                                @include('admin.dashboard.settings.partials.general')
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>

        </div>
    </section>
@endsection
