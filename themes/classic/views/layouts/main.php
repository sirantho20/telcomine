<!DOCTYPE html>
<html>
  <head>
    <title><?php echo Yii::app()->name; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   <?php
    $cs        = Yii::app()->clientScript;
    $themePath = Yii::app()->theme->baseUrl;

    /**
     * StyleSHeets
     */
    $cs->registerCssFile($themePath . '/css/bootstrap.min.css');

    /**
     * JavaScripts
     */
    $cs->registerCoreScript('jquery', CClientScript::POS_END);
    $cs->registerCoreScript('jquery.ui', CClientScript::POS_END);
    $cs->registerScriptFile($themePath . '/js/bootstrap.min.js', CClientScript::POS_END);
    $cs->registerScript('tooltip', "$('[data-toggle=\"tooltip\"]').tooltip();$('[data-toggle=\"popover\"]').tooltip()", CClientScript::POS_READY);
?>
   
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  <link href="css/main.css" rel="stylesheet">
  </head>
  <body>
      <div class="row">
          
      <?php
      include('nav.php');
            echo $content;
      ?>
      </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>
</html>