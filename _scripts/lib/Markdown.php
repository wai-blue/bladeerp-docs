<?php

/* This is a helper class for reading the content of the markdown files. */

class Markdown {
  public string $file = '';
  public string $content = '';

  public function __construct(string $file)
  {
    $this->file = $file;

    if (!is_file($file)) throw new \Exception("Markdown file not found. {$file}");

    $this->content = file_get_contents($this->file);
  }

  public function findTableByColumns(array $columns): ?array
  {
    $reHeader = ' *?\|';
    
    foreach ($columns as $column) {
      $reHeader .= ' *?' . preg_quote($column) . ' *?\|';
    }

    $reHeaderDivider = ' *?\|' . '( *?[-:]+ *?\|){' . count($columns) . '}';
    $reRow = ' *?\|' . '(.*?\|){' . count($columns) . '}';

    $reTable =
      ''
      . '(' . $reHeader . ' *?\r?\n' . ')'
      . '(' . $reHeaderDivider . ' *?\r?\n' . ')'
      . '(' . $reRow . ' *?\r?\n' .')*'
    ;

    preg_match('/' . $reTable . '/', $this->content, $m);

    $tableMd = $m[0] ?? '';

    $tableContentMd = $tableMd;
    $tableContentMd = str_replace($m[1] ?? '', '', $tableContentMd);
    $tableContentMd = str_replace($m[2] ?? '', '', $tableContentMd);

    $rowCount = substr_count($tableMd, "\n") - 2;
    
    preg_match_all('/' . $reRow . '/', $tableContentMd, $rowLines);

    if (!is_array($rowLines[0])) $rowLines[0] = [];

    $rows = [];
    foreach ($rowLines[0] as $rowLine) {
      $tmpRow = explode('|', trim($rowLine, '|'));
      foreach ($tmpRow as $k => $v) $tmpRow[$k] = trim($v);
      $rows[] = $tmpRow;
    };

    return $rows;
  }

  public function hasHeading(string $heading, int $level = 1): bool
  {
    $headingHashes = str_repeat('#', $level);
    $re = '/' . '\n? *?' . $headingHashes . ' +' . $heading . '/s';
    return preg_match($re, $this->content, $m) === 1;
  }

  public function hasH1(string $heading): bool
  {
    return $this->hasHeading($heading, 1);
  }

  public function hasH2(string $heading): bool
  {
    return $this->hasHeading($heading, 2);
  }

  public function hasH3(string $heading): bool
  {
    return $this->hasHeading($heading, 3);
  }

  public function findContentByHeading(string $heading, int $level = 1): ?string
  {
    $content = NULL;

    $headingHashes = str_repeat('#', $level);

    $reContent = '\n? *?' . $headingHashes . ' +' . $heading . '(.*?)\n *?' . $headingHashes . ' ';

    preg_match('/' . $reContent . '/s', $this->content, $m);

    if (is_array($m)) $content = trim($m[1] ?? '');
    else $content = NULL;

    return $content;
  }

  public function findContentByH2(string $heading): ?string
  {
    return $this->findContentByHeading($heading, 2);
  }

  public function findContentByH3(string $heading): ?string
  {
    return $this->findContentByHeading($heading, 3);
  }
}