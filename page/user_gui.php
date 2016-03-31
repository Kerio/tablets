<?php
//  import locales for translation website
require '../control/view.php';
require '../control/benefit.php';

echo $head.
     '<body>'
    .$navbar.

    '<!-- center of page -->

    <!-- tab bar -->
    <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#benefit1">'.$phrase[$locale]['mobile'].'</a></li>
                <li><a data-toggle="tab" href="#benefit2">'.$phrase[$locale]['tablet'].'</a></li>
                <li><a data-toggle="tab" href="#benefit3">Benefit3</a></li>
            </ul>
    
        <div class="tab-content">
            <div id="benefit1" class="tab-pane fade in active">'
                .$mobile.
            '</div>
    
            <div id="benefit2" class="tab-pane fade">'
                .$tablet.
            '</div>
    
            <div id="benefit3" class="tab-pane fade">
                <h3>benefit3</h3>
            </div>
        </div>
    </div>'
    .$foot.
    '</body>
</html>';

