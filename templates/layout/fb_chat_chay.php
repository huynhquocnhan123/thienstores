<html lang="vi" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <!--Begin Css mesessge. -->
    <link rel="stylesheet" id="messenger-css" href="messenger/messenger.css" type="text/css" media="all">
    <style type="text/css">

        .chatHead{
            background: #0075FF url(http://e-web.vn/wp-content/plugins/facebook-messenger/frontend/images/facebook-messenger.svg) center center no-repeat;
            background-size: 50% auto;
        }
        .drag-wrapper .thing .circle {
            background: #0075FF;
        }
        .nj-facebook-messenger {
            background: #0075FF url(http://e-web.vn/wp-content/plugins/facebook-messenger/frontend/images/facebook-messenger.svg) 15px center no-repeat;
            background-size: auto 55%;
            padding: 8px 15px;
            color: #fff !important;
            border-radius: 3px;
            padding-left: 40px;
            display: inline-block;
            margin-top: 5px;
        }

        .nj-facebook-messenger:hover {
            opacity: 0.8;
        }

    </style>
    <!--End Css mesessge. -->

    <!--Begin Java mesessge-->
    <script type="text/javascript" src="messenger/jquery-migrate.min.js"></script>
<!-- <script type="text/javascript" src="messenger/crayon.min.js"></script>
    <script type="text/javascript" src="messenger/js.min.js"></script> -->

    <!--End java message-->
</head>

<body>

    <!--Begin Form chat message---->
    <div class="drag-wrapper">
      <div data-drag="data-drag" class="thing" style="transform: translate(1306px, 39px);">
         <div class="circle facebook-messenger-avatar">
            <img class="facebook-messenger-avatar" src="messenger/facebook-messenger.svg">
        </div>
        <div class="content" style="max-height: 491px; display: none;">
            <div class="inside">
            <div class="fb-page fb_iframe_widget" data-width="310" data-height="310" data-href="<?=$company['fanpage']?>" data-tabs="messages" data-small-header="true" data-hide-cover="false" data-show-facepile="true" data-adapt-container-width="true" fb-xfbml-state="rendered" fb-iframe-plugin-query=""><span style="vertical-align: bottom; width: 310px; height: 310px;"><iframe name="f3c6198c6873254" width="310px" height="310px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.5/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fbz-D0tzmBsw.js%3Fversion%3D42%23cb%3Df205dcfc8f22d8%26domain%3De-web.vn%26origin%3Dhttp%253A%252F%252Fe-web.vn%252Ff12c4417413966c%26relation%3Dparent.parent&amp;container_width=0&amp;height=310&amp;hide_cover=false&amp;href=<?=$company['fanpage']?>%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=true&amp;tabs=messages&amp;width=310" class="" style="border: none; visibility: visible; width: 310px; height: 310px;"></iframe></span></div>
           </div>
       </div>
   </div>
   <div class="magnet-zone" style="margin-left: 0px; margin-bottom: 0px;">
     <div class="magnet"></div>
 </div>
</div>
<!--End form chat-->
<!--Begin java massge2-->
<script type="text/javascript" src="messenger/jquery.event.move.js"></script>
<script type="text/javascript" src="messenger/rebound.min.js"></script>
<script type="text/javascript" src="messenger/index.js"></script>
<!--End java mesage2-->


</body>
</html>