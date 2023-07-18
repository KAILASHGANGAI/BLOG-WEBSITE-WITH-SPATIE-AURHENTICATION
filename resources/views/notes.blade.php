@extends('./layouts.app')

@section('content')
    <style>
        /*job category area*/
        #left_tab_nav .nav-pills .nav-link {
            position: relative;
            margin-top: 2px;
            transition: none;
        }

        #left_tab_nav .nav-pills .nav-link.active:after,
        .nav-pills .show>.nav-link:after {
            content: "";
            position: absolute;
            left: 100%;
            top: 50%;
            margin-top: -13px;
            border-left: 0;
            border-bottom: 13px solid transparent;
            border-top: 13px solid transparent;
            border-left: 10px solid #081e5b;
        }

        #left_tab_nav .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color:

                #fff;
            background:

                #081e5b;
        }

        #left_tab_nav .nav-pills .nav-link:hover:after {
            content: "";
            position: absolute;
            left: 100%;
            top: 50%;
            margin-top: -13px;
            border-left: 0;
            border-bottom: 13px solid transparent;
            border-top: 13px solid transparent;
            border-left: 10px solid #081e5b;
        }

        #left_tab_nav .nav-pills .nav-link:hover {
            color:

                #fff;
            background:

                #081e5b;
        }

        /*button style*/

        /*section-banner start*/
        .section-banner {
            width: 100%;
            background: linear-gradient(45deg,
                    rgba(0, 0, 0, 0),
                    rgba(0, 0, 0, 0)),
                url("./image/banner/bg-notes.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 400px;
            padding-top: 70px;
            padding-bottom: 80px;
            padding-left: 60px;
            padding-right: 60px;
        }

        .main_search_outer {
            /* margin-top: -100px;*/
            z-index: 99;
            padding: 25px;
            border-radius: 5px;
            box-shadow: 0 0 2px 0px rgba(0, 0, 0, 0.3);
            background-color:

                rgba(255, 255, 255, 0.7);
        }


        /*======================================
                //--//-->   BUTTON
                ======================================*/

        .btn {
            transition: 0.5s ease;
        }

        .btn.btn-b {
            border-radius: 0;
            padding: 0.7rem 1.8rem;
            letter-spacing: 0.05rem;
            border-radius: 4px;
        }

        .btn.btn-b {
            background-color:

                #081e5b;
            color:

                #fff;
        }

        .btn.btn-b:hover {
            background-color:

                #000000;
            color:

                #ffffff;
        }
        .card-big-shadow {
          
            position: relative;
        }

        .coloured-cards .card {
            margin-top: 30px;
        }

        .card[data-radius="none"] {
            border-radius: 0px;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);
            background-color: #FFFFFF;
            color: #252422;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }


        .card[data-background="image"] .title,
        .card[data-background="image"] .stats,
        .card[data-background="image"] .category,
        .card[data-background="image"] .description,
        .card[data-background="image"] .content,
        .card[data-background="image"] .card-footer,
        .card[data-background="image"] small,
        .card[data-background="image"] .content a,
        .card[data-background="color"] .title,
        .card[data-background="color"] .stats,
        .card[data-background="color"] .category,
        .card[data-background="color"] .description,
        .card[data-background="color"] .content,
        .card[data-background="color"] .card-footer,
        .card[data-background="color"] small,
        .card[data-background="color"] .content a {
            color: #FFFFFF;
        }

        .card.card-just-text .content {
            padding: 50px 65px;
            text-align: center;
        }

        .card .content {
            padding: 20px 20px 10px 20px;
        }

        .card[data-color="blue"] .category {
            color: #7a9e9f;
        }

        .card .category,
        .card .label {
            font-size: 14px;
            margin-bottom: 0px;
        }

        .card-big-shadow:before {
            background-image: url("http://static.tumblr.com/i21wc39/coTmrkw40/shadow.png");
            background-position: center bottom;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            bottom: -12%;
            content: "";
            display: block;
            left: -12%;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 0;
        }

        .card .description {
            font-size: 16px;
            color: #66615b;
        }

        .content-card {
            margin-top: 30px;
        }

        a:hover,
        a:focus {
            text-decoration: none;
        }

        /*======== COLORS ===========*/
        .card[data-color="blue"] {
            background: #b8d8d8;
        }

        .card[data-color="blue"] .description {
            color: #506568;
        }

        .card[data-color="green"] {
            background: #d5e5a3;
        }

        .card[data-color="green"] .description {
            color: #60773d;
        }

        .card[data-color="green"] .category {
            color: #92ac56;
        }

        .card[data-color="yellow"] {
            background: #ffe28c;
        }

        .card[data-color="yellow"] .description {
            color: #b25825;
        }

        .card[data-color="yellow"] .category {
            color: #d88715;
        }

        .card[data-color="brown"] {
            background: #d6c1ab;
        }

        .card[data-color="brown"] .description {
            color: #75442e;
        }

        .card[data-color="brown"] .category {
            color: #a47e65;
        }

        .card[data-color="purple"] {
            background: #baa9ba;
        }

        .card[data-color="purple"] .description {
            color: #3a283d;
        }

        .card[data-color="purple"] .category {
            color: #5a283d;
        }

        .card[data-color="orange"] {
            background: #ff8f5e;
        }

        .card[data-color="orange"] .description {
            color: #772510;
        }

        .card[data-color="orange"] .category {
            color: #e95e37;
        }
    </style>
    <section class="section-banner">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 pt-5 mx-auto">
                    <div class="col-md-12   main_search_outer  ">
                        <h3>I'm Looking For E-Notes
                        </h3>
                        <form action="" method="post">
                            <div class="row">

                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="Type">Faculty / Class / Grade</label>

                                        <select class="form-control form-control-lg form-control-a" id="Type">
                                            <option value="0">---Select Faculty---</option>
                                            <option value="1">0+ to 1 Year</option>
                                            <option value="2">1+ to 2 Years</option>
                                            <option value="3">2+ to 5 Years</option>
                                            <option value="4">5+ to 7 Years</option>
                                            <option value="5">7+ to 10 Years</option>
                                            <option value="6">10+ to 15 Years</option>
                                            <option value="7">More than 15 Years</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="Type">Subjects</label>
                                        <select class="form-control form-control-lg form-control-a" id="Type" required>
                                            <option value="0">---Select Subjects---</option>
                                            <option value="1">0+ to 1 Year</option>
                                            <option value="2">1+ to 2 Years</option>
                                            <option value="3">2+ to 5 Years</option>
                                            <option value="4">5+ to 7 Years</option>
                                            <option value="5">7+ to 10 Years</option>
                                            <option value="6">10+ to 15 Years</option>
                                            <option value="7">More than 15 Years</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 pt-4">
                                    <button type="submit" class="btn btn-b"><span class="fa fa-search"
                                            aria-hidden="true"></span> Advance Search </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container bootstrap snippets bootdeys">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="py-4">Recently Uploaded Notes</h2>
                    <div class="card bg-info-subtle">

                        <div class="card-body">
                            <div class="text-section">
                                <h5 class="card-title fw-bold">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card's content.</p>
                            </div>
                            <div class="cta-section">
                                <div>$129.00</div>
                                <div>Paid</div>
                                <a href="#" class="btn btn-success float-end mx-2">Buy Now</a>
                                <a href="#" class="btn btn-info float-end">Download</a>
                            </div>
                        </div>

                    </div>
                    <a href="#">see More..</a>

                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 content-card">
                            <div class="card-big-shadow">
                                <div class="card card-just-text" data-background="color" data-color="blue"
                                    data-radius="none">
                                    <div class="content">
                                        <h6 class="category">Best cards</h6>
                                        <h4 class="title"><a href="#">Blue Card</a></h4>
                                        <p class="description"> it relevant to the moment. </p>
                                    </div>
                                </div> <!-- end card -->
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 content-card">
                            <div class="card-big-shadow">
                                <div class="card card-just-text" data-background="color" data-color="green"
                                    data-radius="none">
                                    <div class="content">
                                        <h6 class="category">Best cards</h6>
                                        <h4 class="title"><a href="#">Green Card</a></h4>
                                        <p class="description"> it relevant to the moment. </p>
                                    </div>
                                </div> <!-- end card -->
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 content-card">
                            <div class="card-big-shadow">
                                <div class="card card-just-text" data-background="color" data-color="yellow"
                                    data-radius="none">
                                    <div class="content">
                                        <h6 class="category">Best cards</h6>
                                        <h4 class="title"><a href="#">Yellow Card</a></h4>
                                        <p class="description"> it relevant to the moment. </p>
                                    </div>
                                </div> <!-- end card -->
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 content-card">
                            <div class="card-big-shadow">
                                <div class="card card-just-text" data-background="color" data-color="brown"
                                    data-radius="none">
                                    <div class="content">
                                        <h6 class="category">Best cards</h6>
                                        <h4 class="title"><a href="#">Brown Card</a></h4>
                                        <p class="description">to the moment. </p>
                                    </div>
                                </div> <!-- end card -->
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container my-4 py-5">
        <div class="row">
            <div class="col-sm-4">
                <h2 class="text-center py-3">Avalilabe Notes </h2>
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">Subheading</a></div>
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">Subheading</a></div>
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">Subheading</a></div>
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                </ol>
            </div>
            <div class="col-sm-4">
                <h2 class="text-center py-3">Loke Shewa Aayog </h2>
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">Subheading</a></div>
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">Subheading</a></div>
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">Subheading</a></div>
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                </ol>
            </div>
            <div class="col-sm-4">
                <h2 class="text-center py-3">Others </h2>
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">Subheading</a></div>
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">Subheading</a></div>
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">Subheading</a></div>
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                </ol>
            </div>
        </div>
    </section>
@endsection
