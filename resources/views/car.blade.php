@extends("layouts/master")

@section('head')
    <title>Tesell | {{ $car -> year}} {{ $car -> modelName }}</title>
@endsection

@section("content")

<div id="car">

    <section id="car-media">

        @include("layouts.header")

        <div class="car-images">
            <a class="img-arrows invinsible" href="#" data-type="0">
                <svg width="40" height="40" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="24" cy="24" r="24" fill="#C4C4C4"/>
                    <path d="M19.8757 33.8992L29.7749 24L19.8757 14.1008L18.2249 15.7505L26.4756 24L18.2249 32.2495L19.8757 33.8992Z" fill="#404040"/>
                    </svg>
            </a>


            <a class="img-arrows invinsible" href="#" data-type="1">
                <svg width="40" height="40" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="24" cy="24" r="24" transform="rotate(-180 24 24)" fill="#C4C4C4"/>
                    <path d="M28.1243 14.1008L18.2251 24L28.1243 33.8992L29.7751 32.2495L21.5244 24L29.7751 15.7505L28.1243 14.1008Z" fill="#404040"/>
                    </svg>
            </a>
        <img
            src="https://static-assets.tesla.com/configurator/compositor?context=design_studio_2&options=$BP02,$HC00,$ADPX2,$GLFR,$AU00,$APF2,$APH3,$APPF,$X028,$BTX5,$BS00,$BCMB,$CH05,$CW00,$COUS,$X040,$IDBA,$X027,$DRLH,$DU00,$AF00,$FMP6,$FG02,$DCF0,$FR04,$TD00,$X007,$X011,$INBTB,$PI00,$IX00,$X001,$LP01,$LT1B,$MI03,$X037,$MDLS,$DV4W,$X025,$X003,$ZCST,$PBSB,$PS01,$PK00,$X031,$PX00,$PF00,$X043,$TM00,$BR04,$RENA,$RFP2,$USSB,$X014,$ME02,$QTTB,$SR07,$SP00,$X021,$SC04,$SU01,$TR00,$TIG4,$DSHG,$MT75A,$UTPB,$WTAS,$WR01,$YFCC,$CPF0&view=STUD_SEAT_ALTA&model=ms&size=1441&bkba_opt=2&version=v0028d202110280433&crop=0,0,0,0&version=v0028d202110280433"
            alt="{{ $car -> modelName }}"
            loading="lazy"
        />
    </div>

    </section>

    <section id="car-information">


        <div>
            <svg width="32" height="20" viewBox="0 0 32 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.444092 3.51918L15.9999 19.075L31.5558 3.51918L28.9634 0.925015L15.9999 13.8903L3.03642 0.925015L0.444092 3.51918Z" fill="#404040"/>
            </svg>
        </div>




        <h3>{{ $car -> year }} {{ $car -> modelName }} {{ explode(" ", $car -> typeModel)[0] }}</h3>
        <h4>{{ $car -> typeModel }}</h4>


        <ul class="car-specs">

            <li>
                <h5>{{ $car -> range }}<span>km</span></h5>
                <p>Range</p>
                <p>(EPA est.)</p>
            </li>

            <li>
                <h5>{{ $car -> topSpeed }}<span>kph</span></h5>
                <p>Top speed</p>
            </li>

            <li>
                <h5>{{ $car -> accel }}<span>s</span></h5>
                <p>0-100 kph</p>
            </li>
        </ul>

        <ul>
            <li><p>Used Vehicule</p></li>
            <li><p>{{ number_format($car -> odometer) }} km odometer</p></li>
            <li><p>White Color</p></li>
            <li><p>Located in Zaventem</p></li>
        </ul>


        <h3>Key Features</h3>

        <ul id="car-features">
            @foreach ($features as $item)
                <li><p>{{ $item -> feature_name }}</p></li>
            @endforeach
        </ul>


        <h3>Seller details</h3>

        <figure>
            <a href="#">
                <img src="https://i.pinimg.com/736x/37/f8/3f/37f83f96dbc08d1b8e57f3cbac5918c1.jpg" alt="Elon Musk's profile picture">
            </a>
            <figcaption>
              Elon Musk
            </figcaption>
          </figure>


          <button class="btn-primary">Contact Seller</button>
    </section>


</div>


<script src="{{ asset("assets/js/car.js") }}"></script>
@endsection
