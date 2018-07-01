<?php
function renderPage($layout, $data) {
  return requireToVar($layout, $data);
}