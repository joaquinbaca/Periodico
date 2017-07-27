 <aside id="sidebar">
        <div id="sidebar-publicidad">
            <?php
                $newsController->publicidad();
            ?>
        </div>

        <div class="n-relacionadas">
            <?php
            $newsController->noticiasRelacionadas();

                ?>
        </div>

     <div id="sidebar-publicidad">
         <?php
         $newsController->publicidad();
         $newsController->publicidad();
         $newsController->publicidad();

         ?>
     </div>
</aside>