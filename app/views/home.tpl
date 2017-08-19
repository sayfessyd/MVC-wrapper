<? if ( Auth::check() ): ?>
<? foreach ( $this->variables as $post ): ?>
<div class="ui-block-a">
          <span><?= $post['title'] ?></span>
          <p><?= $post['content']; ?></p>
          <div class="ui-controlgroup ui-controlgroup-horizontal ui-corner-all">
            <div class="ui-controlgroup-controls ">
              <a href="#" class="ui-btn ui-icon-heart ui-btn-icon-left ui-first-child">3260</a>
              <a href="#" class="ui-btn ui-icon-recycle ui-btn-icon-left">100</a>
              <a href="#" class="ui-btn ui-icon-forbidden ui-btn-icon-left ui-last-child">1300</a>
            </div>
          </div>
</div>
<? endforeach ?>
<? endif ?>
