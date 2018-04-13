@extends ('frontend.layaut')
@section('title', "Galeria -")

@section('tit-cabecera')


@section ('content')

	<div class="container">
			
		<div class="col pt-3">
			<h2 class="font-italic">{{ $galerias->nombre }}</h2>
		</div>
		<hr>

        <div class="col p-0 m-0">       

            <ul id="lightgallery" class="cards cards-galery text-center list-unstyled row">

                @foreach($imagenes as $imagen)
                <li class=" card py-2" data-responsive="{{ asset('public/img/galeria/'.$imagen->url) }}" data-src="{{ asset('public/img/galeria/'.$imagen->url) }}" data-sub-html="{{ $imagen->nombre }}" {{-- data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1" --}}>
                    <a href="">
                        <img class="img-fluid" src="{{ asset('public/img/galeria/'.$imagen->url) }}" alt="{{ $imagen->nombre }}">
                    </a>
                </li>
                @endforeach

            </ul>
   
        </div>  
    </div>


		<script src="{{ asset('public/js/lightgallery.js') }}"></script>
         <script src="{{ asset('public/js/minigrid.min.js') }}"></script>
        <script>
            lightGallery(document.getElementById('lightgallery'));
        </script>

    <script>

    (function(){
        var grid;
        function init() {
            grid = new Minigrid({
              container: '.cards',
              item: '.card',
              gutter: 18
            });
            grid.mount();
        }
  
      // mount
      function update() {
        grid.mount();
      }

    document.addEventListener('DOMContentLoaded', init);
    window.addEventListener('resize', update);

    })();

    </script>

		
		
	

@endsection
