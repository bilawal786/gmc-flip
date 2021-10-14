<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{$flips->name}}</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Flipbook StyleSheet -->
  <link href="{{asset('dflip/css/dflip.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Icons Stylesheet -->
  <link href="{{asset('dflip/css/themify-icons.min.css')}}" rel="stylesheet" type="text/css">
    <style>
        .mdn{
            display: none;
        }
        @media only screen and (max-width: 600px) {
            .mdsdn{
                display: none; !important;
            }
            .mdn{
                display: block;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid">

  <div class="row">

      <div class="col-md-3 col-xs-12 mdsdn"style="background-image:url('{{asset($flips->image)}}'); background-repeat: no-repeat; background-size: 100% 100%; text-align: center; padding: 0px !important;">
          <div class="row" style="margin-top: 200px; padding: 10px; background: rgba(78,91,78,0.3) ">
              @if(Session::has('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Succès! </strong> {{ Session::get('message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              @endif
              <div class="col-md-12">
                  <form method="post" action="{{route('form.front.submit')}}">
                      @csrf
                      <div class="form-group">
                          <input type="text" required class="form-control" id="email" name="fname" placeholder="Prenom">
                      </div>
                      <div class="form-group">
                          <input type="text" required class="form-control" id="pwd" name="lname" placeholder="Nom">
                      </div>
                      <div class="form-group">
                          <input type="text" required class="form-control" id="pwd" name="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="pwd" name="phone" placeholder="Telephone (facultatif)">
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="pwd" name="company" placeholder="Nom de la societe (facultatif)">
                      </div>
                      <input type="hidden" name="catalog" value="{{$flips->name}}">

                      <div class="checkbox">
                          <input type="checkbox" required> J'accepte de recevoir des offres de GMC
                      </div>
                      <br>
                      <button type="submit" class="btn btn-primary btn-sm">Envoyer</button>
                  </form>
              </div>
          </div>
      </div>
    <div class="col-md-9 col-xs-12" style="padding: 0px !important;">
        <div id="flipbookContainer"></div>
    </div>
      <div class="col-md-3 col-xs-12 mdn"style="background-image:url('{{asset($flips->image)}}'); background-repeat: no-repeat; background-size: 100% 100%; text-align: center; padding: 0px !important;">
          <div class="row" style="margin-top: 100px; padding: 10px; background: rgba(78,91,78,0.3) ">
              <div class="col-md-12">
                  <form method="post" action="{{route('form.front.submit')}}">
                      @csrf
                      <div class="form-group">
                          <input type="text" required class="form-control" id="email" name="fname" placeholder="Prenom">
                      </div>
                      <div class="form-group">
                          <input type="text" required class="form-control" id="pwd" name="lname" placeholder="Nom">
                      </div>
                      <div class="form-group">
                          <input type="text" required class="form-control" id="pwd" name="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="pwd" name="phone" placeholder="Telephone (facultatif)">
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="pwd" name="company" placeholder="Nom de la societe (facultatif)">
                      </div>
                      <input type="hidden" name="catalog" value="{{$flips->name}}">
                      <div class="checkbox">
                          <input type="checkbox" required> J'accepte de recevoir des offres de GMC
                      </div>
                      <br>
                      <button type="submit" class="btn btn-primary btn-sm">Envoyer</button>
                  </form>
              </div>
          </div>
      </div>

  </div>
</div>

<!-- jQuery  -->
<script src="{{asset('dflip/js/libs/jquery.min.js')}}" type="text/javascript"></script>
<!-- Flipbook main Js file -->
<script src="{{asset('dflip/js/dflip.min.js')}}" type="text/javascript"></script>
<script>

    //best to start when the document is loaded
    jQuery(document).ready(function () {

//uses source from online(make sure the file has CORS access enabled if used in cross domain)
        var pdf = '{{asset($flips->pdf)}}';

        var options = {
            duration: 800,
            backgroundColor: "{{asset($flips->color)}}",
            height: '100vh',
            webgl: true,
            forceFit: true,
            // TRANSLATION text to be displayed
            text: {

                toggleSound: "Activer / désactiver le son",
                toggleThumbnails: "Basculer les vignettes",
                toggleOutline: "Toggle Contour/Signet",
                previousPage: "Page précédente",
                nextPage: "Page suivante",
                toggleFullscreen: "Basculer en plein écran",
                zoomIn: "Agrandir",
                zoomOut: "Dézoomer",
                toggleHelp: "Basculer l'aide",

                singlePageMode: "Mode page unique",
                doublePageMode: "Mode double page",
                downloadPDFFile: "Télécharger le fichier PDF",
                gotoFirstPage: "Aller à la première page",
                gotoLastPage: "Aller à la dernière page",
                play: "Démarrer la lecture automatique",
                pause: "Suspendre la lecture automatique",

                share: "Partager"
            },
        };

        var flipBook = $("#flipbookContainer").flipBook(pdf, options);

    });
</script>
</body>
</html>
