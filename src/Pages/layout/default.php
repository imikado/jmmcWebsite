<!DOCTYPE html>
<html>

<head>
  <?php

  use MyWebsite\Conf\Colors;
  ?>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="/css/materialize.min.css" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8">

  <style>
    body {
      background-color: <?php echo Colors::BACKGROUND; ?>;
    }

    h1,
    h2,
    h3,
    h4 {
      color: <?php echo Colors::TITLE_TEXT; ?>;
    }
  </style>
</head>

<body>


  <?php echo $this->paramList['nav']->render() ?>

  <div class="container">
    <?php foreach ($this->paramList['contentList'] as $contentLoop) : ?>
      <?php echo $contentLoop->render(); ?>
    <?php endforeach; ?>
  </div>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="/js/materialize.min.js"></script>
</body>

</html>