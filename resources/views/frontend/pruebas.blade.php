@extends ('frontend.layaut')

@section('title', "Nosotros -")

@section('tit-cabecera', "Nosotros")

@section ('cabecera')
  @include ('frontend.cabecera')
    
@endsection

@section ('content')



 <?php



// //saco el numero de elementos
$longitud = count($productos);


//dd($longitud);
$max= 3;
$bloq=0;
for ($i=0; $i < $longitud ; $i++) { 
  
  if ($bloq < $max) {
    echo $productos[$i]->titulo;
    echo "<br>";
    echo "<br>";

    $bloq++;
  }
  else{
    echo "====== <br>";
    echo $productos[$i]->titulo;
    echo "<br>";
    echo "<br>";

    $bloq=0;
  }


}

























// $max = 3;

// //$bloq= 0;
//   // dd($longitud);
// // //Recorro todos los elementos
//  for($i=0; $i<$longitud; $i++)
//    {

//     if ($i < $max) {
//      echo $productos[$i]->titulo." 1";
//    echo "<br>";
//    echo "<br>";
//     }
    
//     if($i > 0){
//  echo $productos[$i]->titulo;
//    echo "<br>";
//    echo "<br>";
//     }
  



 ?>

@endsection

