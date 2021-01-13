<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php if($head_load){ echo $head_load; } ?>
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
    <!-- Head Navbar -->
    <?php if($header){ echo $header; } ?>

    <!-- Content -->
    <?php if($content){ echo $content; } ?>

    <!-- Footer -->
    <?php if($footer){ echo $footer; } ?>

    <!-- Required script -->
    <?php if($foot_load){ echo $foot_load; } ?>
</body>
</html>