<aside class="sidebar">
  <div class="sidebar__block">
    <div class="sidebar__block_content">
      <?php echo do_shortcode( '[bvi text="Версия сайта для слабовидящих"]' ); ?>
    </div>
  </div>

  <div class="sidebar__block">
    <strong class="sidebar__block_title">Поиск по сайту:</strong>
    <div class="sidebar__block_content">
      <form class="search-form">
        <input type="text" class="input search-input" placeholder="Введите запрос...">
        <input type="submit" value="" class="search-submit">
      </form>
    </div>
  </div>

  <div class="sidebar__block">
    <strong class="sidebar__block_title">Последние комментарии</strong>
    <div class="sidebar__block_content">
      <ul class="recent-comments">
        <?php kama_recent_comments("limit=10&ex=40"); ?>
      </ul>
    </div>
  </div>

  <div class="sidebar__block">
    <strong class="sidebar__block_title">Календарь</strong>
    <div class="sidebar__block_content">
      <div class="datepicker-here"></div>
    </div>
  </div>

  <div class="sidebar__block sidebar__block_polls">
    <div class="sidebar__block_content">
      <?php if ( function_exists( 'vote_poll' ) && ! in_pollarchive() ): ?>
        <ul class="polls__list">
            <li><?php get_poll();?></li>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</aside>