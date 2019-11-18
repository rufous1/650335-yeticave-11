<li class="lots__item lot">
  <div class="lot__image">
    <img src="<?= htmlspecialchars($lot['image']); ?>" width="350" height="260" alt="">
  </div>
  <div class="lot__info">
    <span class="lot__category"><?= htmlspecialchars($lot['category']); ?></span>
    <h3 class="lot__title"><a class="text-link" href="/lot.php?id=<?=$lot['id']; ?>"><?= htmlspecialchars($lot['title']); ?></a></h3>
    <div class="lot__state">
      <div class="lot__rate">
        <span class="lot__amount">Стартовая цена</span>
        <span class="lot__cost"><?= formatPrice(htmlspecialchars($lot['starting_price'])); ?></span>
      </div>
      <div class="lot__timer timer<?php if (lotTimeRemaining($lot['date_end'])['hours'] < 1) echo ' timer--finishing' ?>">
        <?= implode(' : ', lotTimeRemaining($lot['date_end'])); ?>
      </div>
    </div>
  </div>
</li>
