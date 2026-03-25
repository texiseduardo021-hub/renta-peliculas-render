<?php
class ProblemDetailsException extends Exception {
  public function __construct(
    public int $status,
    public string $title,
    public string $type,
    public string $detail
  ) {
    parent::__construct($detail);
  }
}
