<?php

global $errors, $fields;

if (count($errors) !== 0 || !count($_POST)) { ?>

  <form class="form form--add-lot container <?php if (count($errors)) echo ' form--invalid' ?>"
        enctype="multipart/form-data" action="/add" method="post">
    <h2>Добавление лота</h2>
    <div class="form__container-two">
      <div class="form__item <?= (isset($errors['lot-name'])) ? 'form__item--invalid' : '' ?>"> <!-- form__item--invalid -->
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота"
               value="<?= $fields['lot-name'] ?>">
        <span class="form__error"><?= $errors['lot-name'] ?? '' ?></span>
      </div>
      <div class="form__item <?= (isset($errors['category'])) ? 'form__item--invalid' : '' ?>">
        <label for="category">Категория</label>
        <select id="category" name="category" required>
          <option><?= $fields['category'] ?? 'Выберите категорию' ?></option>
          <?php foreach ($data['categories'] as $val) { ?>
            <option> <?= $val ?> </option>
          <?php } ?>
        </select>
        <span class="form__error"><?= $errors['category'] ?? '' ?></span>
      </div>
    </div>
    <div class="form__item form__item--wide <?= (isset($errors['message'])) ? 'form__item--invalid' : '' ?>">
      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота"><?= $fields['message'] ?></textarea>
      <span class="form__error"><?= $errors['message'] ?? '' ?></span>
    </div>
    <div class="form__item form__item--file"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="/HTML_Academy/img/avatar.jpg" width="113" height="113" alt="Изображение лота">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" accept="image/*" name="image" type="file" id="photo2" value="">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
    </div>
    <div class="form__container-three">
      <div class="form__item form__item--small <?= (isset($errors['lot-rate'])) ? 'form__item--invalid' : '' ?>">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="text" name="lot-rate" placeholder="0" value="<?= $fields['lot-rate'] ?>">
        <span class="form__error"><?= $errors['lot-rate'] ?? '' ?></span>
      </div>
      <div class="form__item form__item--small <?= (isset($errors['lot-step'])) ? 'form__item--invalid' : '' ?>">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?= $fields['lot-step'] ?>">
        <span class="form__error"><?= $errors['lot-step'] ?? '' ?></span>
      </div>
      <div class="form__item <?= (isset($errors['lot-date'])) ? 'form__item--invalid' : '' ?>">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?= $fields['lot-date'] ?>">
        <span class="form__error"><?= $errors['lot-date'] ?? '' ?></span>
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме:
      <?php
      $errorsForStr = [];
      foreach ($errors as $field => $error) {
        if (is_array($error)){
          $errorsForStr[$error[0]] = '';
        } else {
          $errorsForStr[$error] = '';
        }
      }
      echo implode(', ', array_keys($errorsForStr));
      ?>
    </span>
    <button type="submit" class="button">Добавить лот</button>
  </form>

<?php } else { ?>
  <h1><?= $fields['lot-name'] ?></h1>
  <h4>Категория: <?= $fields['category'] ?></h4>
  <p><?= $fields['message'] ?></p>
  <img src="<?= $fields['image'] ?>"/>
  <p>Начальная ставка: <?= $fields['lot-rate'] ?></p>
  <p>Минимальный шаг: <?= $fields['lot-step'] ?></p>
  <p>Дата: <?= $fields['lot-date'] ?></p>
<?php } ?>