@extends('layouts.admin')

@section("page-level-style")
<style>
  #ViewDocuments {
      background-color: #474e5d;
      font-family: Helvetica, sans-serif;
      box-sizing: border-box;
  }

  /* The actual timeline (the vertical ruler) */
  .timeline {
      position: relative;
      max-width: 1200px;
      margin: 0 auto;
  }

  /* The actual timeline (the vertical ruler) */
  .timeline::after {
      content: '';
      position: absolute;
      width: 6px;
      background-color: white;
      top: 0;
      bottom: 0;
      left: 50%;
      margin-left: -3px;
  }

  /* Container around content */
  .timeline > .container {
      padding: 10px 40px;
      position: relative;
      background-color: inherit;
      width: 50%;
  }

  /* The circles on the timeline */
  .timeline > .container::after {
      content: '';
      position: absolute;
      width: 25px;
      height: 25px;
      right: -17px;
      background-color: white;
      border: 4px solid #FF9F55;
      top: 15px;
      border-radius: 50%;
      z-index: 1;
  }

  /* Place the container to the left */
  .left {
      left: -25.5%;
  }

  /* Place the container to the right */
  .right {
      left: 25.5%;
  }

  /* Add arrows to the left container (pointing right) */
  .left::before {
      content: " ";
      height: 0;
      position: absolute;
      top: 22px;
      width: 0;
      z-index: 1;
      right: 30px;
      border: medium solid white;
      border-width: 10px 0 10px 10px;
      border-color: transparent transparent transparent white;
  }

  /* Add arrows to the right container (pointing left) */
  .right::before {
      content: " ";
      height: 0;
      position: absolute;
      top: 22px;
      width: 0;
      z-index: 1;
      left: 30px;
      border: medium solid white;
      border-width: 10px 10px 10px 0;
      border-color: transparent white transparent transparent;
  }

  /* Fix the circle for containers on the right side */
  .right::after {
      left: -16px;
  }

  /* The actual content */
  .timeline .content {
      padding: 20px 30px;
      background-color: white;
      position: relative;
      border-radius: 6px;
  }

  /* Media queries - Responsive timeline on screens less than 600px wide */
  @media screen and (max-width: 600px) {
    /* Place the timelime to the left */
    .timeline::after {
      left: 31px;
    }

    /* Full-width containers */
    .timeline > .container {
      width: 100%;
      padding-left: 70px;
      padding-right: 25px;
    }

  /* Make sure that all arrows are pointing leftwards */
  .timeline > .container::before {
    left: 60px;
    border: medium solid white;
    border-width: 10px 10px 10px 0;
    border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
    left: 15px;
  }

  /* Make all right containers behave like the left ones */
  .right {
    left: 0%;
  }
}

.containerDoc {
    position: relative;
    width: 100%;
    max-width: 400px;
}

.containerDoc img {
    width: 100%;
    height: auto;
}

.containerDoc .btn {
    position: absolute;
    left: 10%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    cursor: pointer;
}


</style>

<link rel="stylesheet" href="{{ URL::asset('css/cubeportfolio.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/portfolio.min.css') }}">
@endsection

@section("tab-content")
<div id="ViewDocuments" class="tab-pane fade in active">
    <div class="timeline">
        @foreach ($documents as $value)
            <div class="container left">
                <div class="content">
                    <h2 class="text-center" style="background-color: #fdb714; padding:20px; border-radius: 10px; color:#fff; font-weight: bold;">{{ $value->created_at->format('Y-m-d / H:i:s') }}</h2>
                    <p class="text-center" style="color: #fdb714; font-size:1.5em;">CNIC</p>
                    @foreach(json_decode($value->cnic) as $path)
                      <div class="containerDoc">
                          <img src="{{ URL::asset('/' . $path) }}" alt="CNIC" style="width:100%; border-top: 1px solid #fdb714;">
                          <a href="{{ URL::asset('/' . $path) }}" target="_blank" class="cbp-lightbox cbp-l-caption-button btn btn-primary" style="left:50%" >View larger</a>
                      </div>
                      <br>
                    @endforeach
                </div>
            </div>
            <div class="container right">
                <div class="content">
                    <h2 class="text-center" style="background-color: #fdb714; padding:20px; border-radius: 10px; color:#fff; font-weight: bold;">{{ $value->created_at->format('Y-m-d / H:i:s') }}</h2>
                    <p class="text-center" style="color: #fdb714; font-size:1.5em;">Passport</p>
                    @foreach(json_decode($value->passport) as $path)
                      <div class="containerDoc">
                          <img src="{{ URL::asset('/' . $path) }}" alt="Passport" style="width:100%; border-top: 1px solid #fdb714;">
                          <a href="{{ URL::asset('/' . $path) }}" target="_blank" class="cbp-lightbox cbp-l-caption-button btn btn-primary" style="left:50%" >View larger</a>
                      </div>
                      <br>
                    @endforeach
                </div>
            </div>
            <div class="container left">
                <div class="content">
                    <h2 class="text-center" style="background-color: #fdb714; padding:20px; border-radius: 10px; color:#fff; font-weight: bold;">{{ $value->created_at->format('Y-m-d / H:i:s') }}</h2>
                    <p class="text-center" style="color: #fdb714; font-size:1.5em;">Visa</p>
                    <div class="containerDoc">
                        <img src="{{ URL::asset('/' . $value->visa) }}" alt="VISA" style="width:100%; border-top: 1px solid #fdb714;">
                        <a href="{{ URL::asset('/' . $value->visa) }}" target="_blank" class="cbp-lightbox cbp-l-caption-button btn btn-primary" style="left:50%" >View larger</a>
                    </div>
                    <br>
                </div>
            </div>
            <div class="container right">
                <div class="content">
                    <h2 class="text-center" style="background-color: #fdb714; padding:20px; border-radius: 10px; color:#fff; font-weight: bold;">{{ $value->created_at->format('Y-m-d / H:i:s') }}</h2>
                    <p class="text-center" style="color: #fdb714; font-size:1.5em;">Picture</p>
                    <div class="containerDoc">
                        <img src="{{ URL::asset('/' . $value->picture) }}" alt="Picture" style="width:100%; border-top: 1px solid #fdb714;">
                        <a href="{{ URL::asset('/' . $value->picture) }}" target="_blank" class="cbp-lightbox cbp-l-caption-button btn btn-primary" style="left:50%" >View larger</a>
                    </div>
                    <br>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
