<nav class="nav">
  <ul class="nav__list container">
    <?php foreach ($categories as $value): ?>
    <li class="nav__item">
      <a href="all-lots.html"><?= $value['title']; ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
</nav>
<?php foreach ($lots as $lot): ?>
<section class="lot-item container">
  <h2><?= $lot['title']; ?></h2>
  <div class="lot-item__content">
    <div class="lot-item__left">
      <div class="lot-item__image">
        <img src="<?= $lot['image']; ?>" width="730" height="548" alt="Сноуборд">
      </div>
      <p class="lot-item__category">Категория: <span><?= $lot['category']; ?></span></p>
      <p class="lot-item__description"><?= $lot['description']; ?></p>
    </div>
    <div class="lot-item__right">
      <div class="lot-item__state">
        <div class="lot-item__timer timer<?php if (lotTimeRemaining($lot['date_end'])['hours'] < 1) echo ' timer--finishing' ?>">
          <?= implode(' : ', lotTimeRemaining($lot['date_end'])); ?>
        </div>
        <div class="lot-item__cost-state">
          <div class="lot-item__rate">
            <span class="lot-item__amount">Текущая цена</span>
            <span class="lot-item__cost"><?= formatPrice($lot['starting_price']); ?></span>
          </div>
          <div class="lot-item__min-cost">
            Мин. ставка <span><?= formatPrice($lot['starting_price'] + $lot['step']); ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endforeach; ?>
