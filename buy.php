<!DOCTYPE html>
<html>
  <head>
  <title>Food Shop</title>
  <!-- jQuery mobile, jQuery UI, custom stylesheets -->
  
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- jQuery, jQuery UI, jQuery mobile, custom scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="js/script.js"></script>
    <script>
      $(function(){
        $('.date').each(function(){
          $(this).datepicker();
        });
      });
    </script>
  </head>
  <body>
    <!-- #home Page -->
    <div data-role="page" id="home">
      <header data-role="header" data-theme="b">
        <h1>Food Shop</h1>
      </header>
      
      <div data-role="navbar">
        <ul>
          <li><a href="index.php" data-transition="none" data-icon="home">Inicio</a></li>
          <li><a href="#add" data-transition="none" data-icon="grid">Productos</a></li>
          <li><a href="#edit" data-transition="none" data-icon="star">Favoritos</a></li>
        </ul>
      </div>
      
      <div data-role="content">
        <ul data-role="listview" data-inset="true">
        <?php
          $id = $_GET['id'];
           $productosURL = "http://pymesv.com/datos06w/Grupo6/API/datos/productos/".$id."";

                            $productosJSON = file_get_contents($productosURL);


                            $jproductos = json_decode($productosJSON);
                            $html = "";
                            $i = 1;
                            foreach($jproductos as $jprod) {
                                    $html .= '<li class="table-view-cell">';
                                    $html .= ''.$jprod->nombre.'';
                                    $html .= '<p>'.$jprod->descripcion.' $'.$jprod->precio.'.99</p>';
                                    $html .= '<a href="#" class="ui-btn ui-corner-all ui-icon-check ui-btn-icon-left">Comprar</a>';
                                    $html .= '</li>';
                                    $i++;
                                
                            }

                            echo $html;
        ?>
     </ul>
      </div>
    
      <footer data-role="footer" data-theme="b">
        <h4>Food Shop 2016</h4>
      </footer>
    </div>
    
    <!-- ADD PAGE -->
    <div data-role="page" id="add">
      <header data-role="header" data-theme="b">
        <h1>Food Shop</h1>
      </header>
      
      <div data-role="navbar">
        <ul>
          <li><a href="index.php" data-transition="none" data-icon="home">Inicio</a></li>
          <li><a href="#add" data-transition="none" data-icon="grid">Productos</a></li>
          <li><a href="#edit" data-transition="none" data-icon="star">Favoritos</a></li>
        </ul>
      </div>
      
      <div data-role="content">
        <form class="ui-filterable">
    <input id="filterBasic-input" data-type="search">
</form>
        <ul data-role="listview" data-filter="true" data-input="#filterBasic-input" data-inset="true">
         <?php
                             
                            $productosURL = "http://pymesv.com/datos06w/Grupo6/API/datos/productos/lista";

                            $productosJSON = file_get_contents($productosURL);


                            $jproductos = json_decode($productosJSON);
                            $html = "";
                            $i = 1;
                            foreach($jproductos as $jprod) {
                                    $html .= '<li class="table-view-cell media">';
                                    $html .= '<a class="navigate-right" href="buy.php?id='.$i.'" data-transition="slide-in"> ';
                                    $html .= '<img class="media-object pull-left" src="http://placehold.it/64x64" alt="Placeholder image">';
                                    $html .= '<div class="media-body">';
                                    $html .= '<strong class="name">'.$jprod->nombre.'</strong>';
                                    $html .= '<p>'.$jprod->descripcion.'</p>';
                                    $html .= '</div>';
                                    $html .= '</a>';
                                    $html .= '</li>';
                                    $i++;
                                
                            }

                            echo $html;
                        ?> 
                        </ul>
      </div>
    
      <footer data-role="footer" data-theme="b">
        <h4>Food Shop 2016</h4>
      </footer>
    </div>
    
    <!-- EDIT PAGE -->
    <div data-role="page" id="edit">
      <header data-role="header" data-theme="b">
        <h1>Food Shop</h1>
      </header>
      
      <div data-role="navbar">
        <ul>
          <li><a href="index.php" data-transition="none" data-icon="home">Inicio</a></li>
          <li><a href="#add" data-transition="none" data-icon="grid">Productos</a></li>
          <li><a href="#edit" data-transition="none" data-icon="star">Favoritos</a></li>
        </ul>
      </div>
      
      <div data-role="content">
      <ul data-role="listview" data-inset="true">
                <?php
                             
                            $productosURL = "http://pymesv.com/datos06w/Grupo6/API/datos/productos/lista";

                            $productosJSON = file_get_contents($productosURL);


                            $jproductos = json_decode($productosJSON);
                            $html = "";
                            $i = 1;
                            foreach($jproductos as $jprod) {
                                    if($i <= 3):
                                    $html .= '<li class="table-view-cell media">';
                                    $html .= '<a class="navigate-right" href="buy.php?id='.$i.'" data-transition="slide-in"> ';
                                    $html .= '<img class="media-object pull-left" src="http://placehold.it/64x64" alt="Placeholder image">';
                                    $html .= '<div class="media-body">';
                                    $html .= ''.$jprod->nombre.'';
                                    $html .= '<p>'.$jprod->descripcion.'</p>';
                                    $html .= '</div>';
                                    $html .= '</a>';
                                    $html .= '</li>';
                                    endif;
                                    $i++;
                                
                            }

                            echo $html;
                        ?> 
        </ul>
      </div>
    
      <footer data-role="footer" data-theme="b">
        <h4>Food Shop 2016</h4>
      </footer>
    </div>
  </body>
</html>