<?php

$config = [];
$config['mainTemplate'] = 'desktop';
$config['skin'] = '';
$config['rewriteBase'] = '/bladeerp-docs/_wireframe';

$config['sidebarItems'] = [
  '' => ['text' => 'Domov', 'icon' => 'fas fa-home', 'cssStyle' => 'margin-left:10px;' ],
  "contacts" => ["text" => "Kontakty", 'icon' => 'fas fa-phone', 'cssStyle' => 'margin-left:10px;' ],
  "countries" => ["text" => "Krajiny", 'icon' => 'fas fa-globe', 'cssStyle' => 'margin-left:10px;' ],
  "categories" => ["text" => "Kategorie", 'icon' => 'fas fa-address-book', 'cssStyle' => 'margin-left:10px;' ],
  "itemSellings" => ["text" => "Sklad", 'icon' => 'fas fa-warehouse', 'cssStyle' => 'margin-left:10px;' ],
  "items" => ["text" => "Predmety", 'icon' => 'fas fa-pallet', 'cssStyle' => 'margin-left:10px;' ],
  "packages" => ["text" => "Balíky", 'icon' => 'fas fa-box', 'cssStyle' => 'margin-left:10px;' ],
];