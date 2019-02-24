<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {

  const STATUS = [
    1 => [ 'label' => '未着手', 'class' => 'label-danger' ],
    2 => [ 'label' => '着手中', 'class' => 'label-info' ],
    3 => [ 'label' => '完了', 'class' => '' ],
  ];

  /**
   * status_label　アクセサ
   * @return string
   */
  public function getStatusLabelAttribute() {
    $status = $this->attributes['status'];

    if (!isset(self::STATUS[$status])) {
        return '';
    }

    return self::STATUS[$status]['label'];
  }

  /**
   * status_class アクセサ
   * @return string
  */
  public function getStatusClassAttribute() {
    $status = $this->attributes['status'];

    if (!isset(self::STATUS[$status])) {
        return '';
    }

    return self::STATUS[$status]['class'];
  }

  /**
   * formatted_due_date アクセサ
   * @return string
  */
  public function getFormattedDueDateAttribute() {
    // Carbonクラス使用
    return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
                 ->format('Y/m/d');
  }
}
