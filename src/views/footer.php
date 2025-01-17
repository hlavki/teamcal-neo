<?php
if (!defined('VALID_ROOT')) exit('');
/**
 * Footer View
 *
 * @author George Lewe <george@lewe.com>
 * @copyright Copyright (c) 2014-2023 by George Lewe
 * @link https://www.lewe.com
 *
 * @package TeamCal Neo
 * @subpackage Views
 * @since 3.0.0
 */
?>

<!-- ====================================================================
view.footer
-->
<footer class="footer">
  <div class="container">
    <div class="row">

      <div class="col-lg-4">
        <ul class="list-unstyled">
          <?php
          $footerCopyright = "";
          if ($copyright = $C->read("footerCopyright")) {
            $footerCopyright .= "&copy; " . date('Y') . " by ";
            if ($copyrightUrl = $C->read("footerCopyrightUrl")) {
              $footerCopyright .= '<a href="' . $copyrightUrl . '" target="_blank">' . $copyright . '</a>';
            } else {
              $footerCopyright .= $copyright;
            }
          }
          ?>
          <li><?= $footerCopyright ?></li>
        </ul>
      </div>

      <div class="col-lg-4">
        <ul class="list-unstyled">
          <li><a href="index.php"><?= $LANG['footer_home'] ?></a></li>
          <?php if ($docLink = $C->read("userManual")) { ?>
            <li><a href="<?= urldecode($docLink) ?>" target="_blank"><?= $LANG['footer_help'] ?></a></li>
          <?php } ?>
          <li><a href="index.php?action=about"><?= $LANG['footer_about'] ?></a></li>
          <li><a href="index.php?action=imprint"><?= $LANG['footer_imprint'] ?></a></li>
          <li><a href="index.php?action=dataprivacy"><?= $LANG['footer_dataprivacy'] ?></a></li>
        </ul>
      </div>

      <div class="col-lg-4 text-end">
        <?php if ($urls = $C->read("footerSocialLinks") and strlen($urls)) {
          $urlArray = explode(';', $urls);
          foreach ($urlArray as $url) {
            if (strlen($url)) { ?>
              <span class="social-icon"><a href="<?= $url ?>" target="_blank"><i class="fab fa-lg"></i></a></span>
            <?php }
          }
        } ?>
      </div>
    </div>
  </div>

  <!-- As per the license agreement, you are not allowed to change or remove the following block! -->
  <div class="container" style="margin-top: 40px">
    <div class="col-lg-12 text-end text-italic xsmall">
      <?= APP_POWERED ?><br>
      <?php if ($C->read("footerViewport")) { ?><i id="size" class="text-italic xsmall"></i><?php } ?>
    </div>
  </div>

</footer>

<script>
  $(document).ready(function () {
    <?php if (MAGNIFICPOPUP) { ?>
    //
    // Magnific Popup
    //
    $('.image-popup').magnificPopup({
      type: 'image',
      closeOnContentClick: true,
      closeBtnInside: false,
      fixedContentPos: true,
      mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
      image: {
        verticalFit: true
      },
      zoom: {
        enabled: true,
        duration: 300 // don't forget to change the duration also in CSS
      }
    });

    $('.image-popup-vertical-fit').magnificPopup({
      type: 'image',
      closeOnContentClick: true,
      mainClass: 'mfp-img-mobile',
      image: {
        verticalFit: true
      }
    });

    $('.image-popup-fit-width').magnificPopup({
      type: 'image',
      closeOnContentClick: true,
      image: {
        verticalFit: false
      }
    });
    <?php } ?>

    //
    // Tooltip
    //
    $('[data-bs-toggle="tooltip"]').each(function () {
      var options = {
        html: true
      };
      if ($(this)[0].hasAttribute('data-type')) {
        options['template'] =
            '<div class="tooltip ' + $(this).attr('data-type') + '" role="tooltip">' +
            '	<div class="tooltip-arrow"></div>' +
            '	<div class="tooltip-inner"></div>' +
            '</div>';
      }
      $(this).tooltip(options);
    });

  });

  //
  // Back to Top Icon
  //
  $(function () {
    var btn = $('#top-link-block');
    $(window).scroll(function () {
      if ($(window).scrollTop() > 400) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });
    btn.on('click', function (e) {
      e.preventDefault();
      $('html, body').animate({
        scrollTop: 0
      }, '400');
    });
  });

  <?php if ($C->read("footerViewport")) { ?>
  /**
   * Window size in footer
   */
  $(window).on('resize', showSize);
  showSize();

  function showSize() {
    $('#size').html($(window).width() + ' x ' + $(window).height());
  }
  <?php } ?>

</script>

</body>

</html>
